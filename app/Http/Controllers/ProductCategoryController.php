<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Models\ProductCategory;
use App\Models\Category;
use App\Models\ProductVariant;
use App\Models\ProductImage;
use Illuminate\Support\Facades\DB;

class ProductCategoryController extends Controller
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
    public function store(StoreProductCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $categoryID)
    {
        /* $maxPrice = Product::where("store_id", $storeID)->max('price');
        $minPrice = Product::where("store_id", $storeID)->min('price'); */


        $filterOptions = ProductVariant::select('option', 'value')
        ->distinct()
        ->get();


        $categoryName = Category::find($categoryID)->name;
        //add storeid to category
        $data = DB::table('product_categories')
        ->join('products', 'product_id', '=', 'products.id')
        ->join('categories', 'category_id', '=', 'categories.id')
        ->select('products.*')
        ->where("product_categories.category_id", $categoryID)
        ->orderBy("products.sort_order", "asc")
        ->get();

        foreach ($data as $product) {
            $product->images = ProductImage::where('product_id', $product->id)->get();
            $product->variants = ProductVariant::where('product_id', $product->id)->get();
        }

        return response()->json([
            'success'  => true,
            'message'  => "success",
            'category' => $categoryName,
            /* 'maxprice' => $maxPrice,
            'minprice' => $minPrice, */
            'filteroption' => $filterOptions,
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        //
    }
}
