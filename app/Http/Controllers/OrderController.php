<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function  placeOrder(CheckoutRequest $request){

        $data = $request->validated();

        $orderCheck = Order::where("orderid", $data["orderid"])->first();
        if (!$orderCheck){

            $order = Order::create([
                'orderid' => $data["orderid"],
                'first_name' => $data["first_name"],
                'last_name' => $data["last_name"],
                'email' => $data["email"],
                'phone' => $data["phone"],
                'payment_method' => $data["payment_method"],
                'total_price' => $data["total_price"],
                'payment_gateway' => $data["payment_gateway"],
                'transaction_ref' => $data["transaction_ref"],
                'tax' => $data["tax"],
                'status' => $data["status"],
                'discount' => $data["discount"],
                'currency' => $data["currency"],
                'shipping_price' => $data["shipping_price"],
                'shipping_address' => $data["shipping_address"],
                'shipping_postalcode' => $data["shipping_postalcode"],
                'shipping_city' => $data["shipping_city"],
                'shipping_state' => $data["shipping_state"],
                'shipping_country' => $data["shipping_country"]
    
            ]);
    
           // $order = Order::create($data);
            $orderID = $order->id;
    
            if ($data["create_account"] == "true"){
                $customer = Customer::create([
                    'first_name' => $data["first_name"],
                    'last_name' => $data["last_name"],
                    'email' => $data["email"],
                    'phone' => $data["phone"],
                    'password' => bcrypt($data["password"]),
                    'code' =>  md5($data["email"]),
                    'status' => 1,
                    'address' => $data["shipping_address"],
                    'city' => $data["shipping_city"],
                    'postal_code' => $data["shipping_postalcode"],
                    'state' => $data["shipping_state"],
                    'country' => $data["shipping_country"],
                ]);
            }
    
            $orderIDString = $order->orderid;
            $purchaseDate = Carbon::parse($order->created_at)->format('d M, Y');
            $total = $order->total_price;
    
            $cartItems = $data["cart_items"];
            if ($cartItems != null){
                 foreach ($cartItems as $cartItem) {
                     $product_id = $cartItem['product_id'];
                     $quantity = $cartItem['quantity'];
                     $options = $cartItem["options"];
         
                     $orderItem = new OrderItem();
                     $orderItem->order_id = $orderID;
                     $orderItem->product_id = $product_id;
                     $orderItem->quantity = $quantity;
                     $orderItem->options = $options;
                     $orderItem->save();
     
                     $this->decreaseProductQuantity ($product_id, $quantity);
                     /* if ($options != ""){
                         $this->decreaseProductOptionQuantity($product_id, $options, $quantity);
                     } */
                     
                 }
             }
    
             return response()->json([
                'success'   => true,
                'message'   => "success",
                'orderid' => $orderIDString,
                'purchasedate' => $purchaseDate,
                'total' => $total
            ]);

        }

        return response()->json([
            'success'   => true,
            'message'   => "success"
        ]);

        


    }


    private function decreaseProductQuantity ($productID, $soldQuantity){
        $product = Product::find($productID);
        $productQty = $product->quantity;
        $updatedQuantity = $productQty - $soldQuantity;
        $product->quantity = $updatedQuantity;
        $product->save();
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $data = $request->validated();
        $order = Order::create($data);

        return response()->json([
            'success'   => true,
            'message'   => "success",
            "data" => $order
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $customeremail)
    {
        $orders = Order::where("email", $customeremail)->get();

        return response()->json([
            'success'   => true,
            'message'   => "success",
            "data" => $orders
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $status = $request->status;

        $order = Order::find($id);
        $order->status = $status;
        $order->save();

        return response()->json([
            'success'   => true,
            'message'   => "success",
            "data" => $order
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function orderDetails($id){

        $order = Order::where("id", $id)->orderBy("created_at", "desc")->first();

        $orderDetails = DB::table('order_items')
        ->join('products', 'product_id', '=', 'products.id')
        ->join('product_images', function($join) {
            $join->on('products.id', '=', 'product_images.product_id')
                ->whereRaw('product_images.id = (SELECT MIN(id) FROM product_images WHERE product_id = products.id)');
        })
        ->select('order_items.*', 'order_items.quantity as qty', 'products.*', 'product_images.path as image_path')
        ->where("order_items.order_id", $id)
        ->get();
    

        return view ("orderdetails", compact("order", "orderDetails"));
    }


    public function getOrdersByCustomer($customerID){

        $customerEmail = Customer::find($customerID)->email;

        $order = Order::where("email", $customerEmail)->orderBy("created_at", "desc")->get();

        return response()->json([
            'success'   => true,
            'message'   => "success",
            "data" => $order
        ]);

    }

    public function getOrdersByOrderID($orderID){
        $order = Order::where("orderid", $orderID)->orderBy("created_at", "desc")->first();
        return response()->json([
            'success'   => true,
            'message'   => "success",
            "data" => $order
        ]);
    }

    public function getOrderItemFromID($orderID){

        $order = Order::where("orderid", $orderID)->orderBy("created_at", "desc")->first();
        $id = $order->id;
        $orderDetails = DB::table('order_items')
        ->join('products', 'product_id', '=', 'products.id')
        ->join('product_images', function($join) {
            $join->on('products.id', '=', 'product_images.product_id')
                ->whereRaw('product_images.id = (SELECT MIN(id) FROM product_images WHERE product_id = products.id)');
        })
        ->select('order_items.*', 'order_items.quantity as qty', 'products.*', 'product_images.path as image_path')
        ->where("order_items.order_id", $id)
        ->get();

        return response()->json([
            'success'   => true,
            'message'   => "success",
            "item" => $orderDetails
        ]);

    }
}
