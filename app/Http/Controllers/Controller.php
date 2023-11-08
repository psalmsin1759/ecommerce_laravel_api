<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Banner;
use App\Models\Store;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function login(){
        return view("login");
    }

    public function index(){


        $totalRevenue = Order::sum("total_price");
        $orderCount = Order::count();
        $customerCount = Customer::count();
        $productCount = Product::count();
        $today = now()->toDateString();
        $todayRevenue = Order::whereDate("created_at", $today)->sum('total_price');


        $topSellingProducts = DB::table('products')
        ->select('products.name',  DB::raw('SUM(order_items.quantity) as quantity_sold'))
        ->join('order_items', 'products.id', '=', 'order_items.product_id')
        ->groupBy('products.name')
        ->orderBy('quantity_sold', 'desc')
        ->take(3) // Get the top 3 selling products
        ->get();

       

        $latestOrders = Order::orderBy("created_at", "desc")->take(10)->get();

         //graph
         $label = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

         $orderReturnValue = $this->totalOrderSumByMonth();
 
         $orderValue = array(0,0,0,0,0,0,0,0,0,0,0,0);
 
         foreach($orderReturnValue as $item){
 
             $orderValue[$item->month - 1] = $item->total;
 
         }

         $orderChartjs = app()->chartjs
         ->name('orderSummaryBar')
         ->type('bar')
         ->labels($label)
         ->datasets([
             
           
             [
                 "label" => "Total Sales",
                 'backgroundColor' => "rgba(69,102,216,0.9)",
                 'borderColor' => "rgba(60,141,188,0.8)",
                 'pointRadius'  => false,
                 'pointColor'   =>      '#3b8bba',
                 'pointStrokeColor'   => 'rgba(60,141,188,1)',
                 'pointHighlightFill' => '#fff',
                 'pointHighlightStroke' => 'rgba(60,141,188,1)',
                 "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                 "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                 "pointHoverBackgroundColor" => "#fff",
                 "pointHoverBorderColor" => "rgba(220,220,220,1)",
                 'data' => $orderValue
             ]
             
         ])
         ->options([]);

         $topSell = $this->getTopSellers();

            //dd($topSell);

            $productName = array();
            $productQuantity = array();
            
            foreach($topSell as $item){

                $productName[] = $item->name;
                $productQuantity[] = $item->total;
    
            }


            $chartjsPie = app()->chartjs
            ->name('pieChartTest')
            ->type('pie')
            ->size(['width' => 400, 'height' => 200])
            ->labels($productName)
            ->datasets([
                [
                    'backgroundColor' => ['#FF6384', '#36A2EB', '#FFF3CD','#D1E7DD'],
                    'hoverBackgroundColor' => ['#FF6384', '#36A2EB','#FFF3CD','#D1E7DD'],
                    'data' => $productQuantity
                ]
            ])
            ->options([]);

        //$totalRevenue = DB::table('orders')->sum('total_price');
        //$orderCount = DB::table('orders')->count();

        return view("index", compact ('totalRevenue', 'orderCount', 'customerCount', 'productCount', 'todayRevenue', 'topSellingProducts', 'latestOrders', 'orderChartjs', 'chartjsPie'));
    }

    public static function totalOrderSumByMonth(){
        $order = DB::table('orders')
            ->select(DB::raw('SUM(total_price) as total, MONTH(created_at) as month'))
            ->groupBy(DB::raw('YEAR(created_at) ASC, MONTH(created_at) ASC'))
            ->where('status', 'Success')
            ->get()
            ->toArray();

        return $order;
    }

    public static function getTopSellers(){

        $sales = DB::table('order_items')
            ->join('products','product_id','=','products.id')
            ->join('orders','order_id','=','orders.id')
            ->select(DB::raw('products.name, sum(order_items.quantity) as total'))
            ->groupBy('order_items.product_id', 'products.name')
            ->orderBy('total','desc')
            ->take(5)
            ->get();

            return $sales;
           
    }

    public function category(){
        $categories = Category::orderBy("sort_order", "asc")->get();
        $parents = Category::where("parent_id", 0)->get();
        return view("categories", compact("categories", "parents"));
    }

   

    public function slider(){

        $sliders = Slider::orderBy("sort_order", "asc")->get();

        return view("slider", compact("sliders"));
    }

    public function banner(){

        $banners = Banner::orderBy("sort_order", "asc")->get();
        return view("banner", compact('banners'));
    }

    public function featuredproduct(){

        $products = Product::orderBy("created_at", "desc")->get();
        $featuredProducts = Product::where("featured", 1)
            ->orderBy("sort_order", "asc")
            ->with('images') 
            ->get();
        return view ("featured", compact("products", "featuredProducts"));
    }

    public function product(){

        $products = Product::orderBy("sort_order", "asc")->get();

        return view ("product", compact("products"));
    }

    public function addProduct(Request $request){

        $categories = Category::orderBy("sort_order")->get();

        $products = Product::orderBy("sort_order")->get();

        return view ("addproduct", compact("categories", "products"));
    }

    public function options(){
        return view("options");
    }

    public function order(){

        $orders = Order::orderBy("created_at", "desc")->get();

        return view ("order", compact("orders"));
    }

    public function customer(){

        $customers = Customer::orderBy("created_at", "desc")->get();

        return view ("customer", compact("customers"));
    }

    public function coupon(){
        return view ("coupon");
    }

    public function addCoupon(){
        return view("addcoupon");
    }

    public function mail(){
        return view ("mail");
    }

    public function newsletter(){
        return view ("newsletter");
    }

    public function stocklist(){
        return view ("stocklist");
    }

    public function returns(){
        return view ("returns");
    }

    public function details(){
        $store = Store::first();
        return view ("store", compact("store"));
    }

    public function address(){
        return view ("address");
    }

    public function about(){
        $store = Store::first();
        return view ("about", compact("store"));
    }

    public function profile(){
        return view ("profile");
    }

    public function admin(){
        return view ("admin");
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect("/login");
    }
}
