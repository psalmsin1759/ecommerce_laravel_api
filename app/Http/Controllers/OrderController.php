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
use Illuminate\Support\Facades\Mail;
use \App\Mail\OrderConfirmationMailHelper;
use \App\Mail\MailHelper;
use App\Jobs\SendOrderConfirmationEmail;
use Illuminate\Support\Facades\Queue;
use App\Models\Store;


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
                $customerCheck = Customer::where("email", $data["email"])->first();
                if (!$customerCheck){
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

           
            $this->sendOrderEmail($order, "Order Confirmation");

            $this->sendAdminNotification($order);
    
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
            'message'   => "success",
            'data' => 'duplicate'
        ]);

        


    }



    private function sendOrderEmail($order, $subject){

        $orderItems = DB::table('order_items')
        ->join('products', 'product_id', '=', 'products.id')
        ->leftJoin('product_images', function ($join) {
            $join->on('products.id', '=', 'product_images.product_id')
                ->whereRaw('product_images.id = (select id from product_images where product_id = products.id order by id limit 1)');
        })
        ->select('products.name', 'products.price', 'order_items.quantity as itemquantity', 'order_items.options', 'product_images.path')
        ->where("order_items.order_id", $order->id)
        ->get();
        

        //SendOrderConfirmationEmail::dispatch("Order Confirmation", $order, $orderItems)->onQueue('emails'); 
       

        Mail::to($order->email)->send(new OrderConfirmationMailHelper($subject, $order, $orderItems));
       

    }

    private function sendAdminNotification($order){

        $body = $this->adminOrderText($order);

        $store = Store::find(1);
        $adminEmail = $store ? $store->email : "samson_ude@yahoo.com";

        Mail::to($adminEmail)->send(new MailHelper("New Order", $body));

    }

    private function adminOrderText ($order){

        $body = "Hello Admin,<br/>
        
        You have new order with id #" . $order->orderid . " from  " . $order->first_name . " (". $order->email . ")<br/>

        Login to the backend <a href='https://admin.houseofeppagelia.com'>https://admin.houseofeppagelia.com</a> to process this order 

        Best regards";

        return $body;

    }

    public function getOrderItems($orderid){
        $orderItems = DB::table('order_items')
        ->join('products', 'product_id', '=', 'products.id')
        ->leftJoin('product_images', function ($join) {
            $join->on('products.id', '=', 'product_images.product_id')
                ->orderBy('product_images.id', 'asc');
        })
        ->select('products.name', 'products.price', 'order_items.quantity as itemquantity', 'order_items.options', 'product_images.path')
        ->where("order_items.order_id", $orderid)
        ->get();

        return response()->json([
            'success'   => true,
            'message'   => "success",
            'data' => $orderItems
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

    public function changeOrderStatus(Request $request){
        $orderid = $request->orderid;
        $orderstatus = $request->orderstatus;

        $order = Order::find($orderid);
        $order->status = $orderstatus;
        $order->save();

        //send email
        if ($orderstatus != "Success"){
            $this->sendOrderEmail($order, "Your order is " . $orderstatus);
        }
       
        

        return redirect ("order/" . $orderid)->with('success','Order status updated to ' . $orderstatus);
    }
}
