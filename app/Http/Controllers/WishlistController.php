<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWishlistRequest;
use App\Http\Requests\UpdateWishlistRequest;
use App\Models\Wishlist;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
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
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required',
            'customer_id' => 'required',
        ]);

        $wishlist = Wishlist::where("product_id", $data["product_id"])->where("customer_id", $data["customer_id"])->first();

        if (!$wishlist){
            $wishlist = Wishlist::create($data);
        }
        

        return response()->json([
            'success'   => true,
            'message'   => "success",
            "data" => $wishlist
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $data = DB::table('wishlists')
            ->join('products', 'product_id', '=', 'products.id')
            ->join('customers', 'customer_id', '=', 'customers.id')
            ->join('product_images', function($join) {
                $join->on('products.id', '=', 'product_images.product_id')
                    ->whereRaw('product_images.id = (SELECT MIN(id) FROM product_images WHERE product_id = products.id)');
            })
            ->select('products.*',  'product_images.path as image_path', 'wishlists.id as wishlistid')
            ->where("wishlists.customer_id", $id)
            ->orderBy("wishlists.created_at", "desc")
            ->get();

            return response()->json([
                'success'   => true,
                'message'   => "success",
                "data" => $data
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWishlistRequest $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Wishlist::destroy($id);

        return response()->json([
            'success'   => true,
            'message'   => "success",
        ]);
    }
}
