<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\RelatedProduct;
use App\Models\ProductImage;


class ProductController extends Controller
{


    public function getfeaturedproduct(){
        $products = Product::query()
        ->with('images', 'variants')
        ->where("featured", 1)
        ->orderBy("sort_order", "asc")
        ->take(8)
        ->get();

        return response()->json([
            'success'   => true,
            'message'   => "success",
            "data" => $products
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()
        ->with('images', 'variants')
        ->orderBy("sort_order", "asc")
        ->get();

        return response()->json([
            'success'   => true,
            'message'   => "success",
            "data" => $products
        ]);
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
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $product = Product::create($data);

        // Handle images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Store each image and associate it with the product
                $path = $data["images"]->storeAs('public/products', $filename);
                //$imagePath = $image->store('image_path', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'path' => $path,
                ]);
            }
        }

        // Handle variants
        if ($request->has('variants')) {
            foreach ($data['variants'] as $variantData) {
                ProductVariant::create([
                    'product_id' => $product->id,
                    'option' => $variantData['option'],
                    'value' => $variantData['value'],
                    'quantity' => $variantData['quantity'],
                ]);
            }
        }

        // Handle related products
        if ($request->has('relatedproducts')) {
            foreach ($data['relatedproducts'] as $relatedProductId) {
                RelatedProduct::create([
                    'product_id' => $product->id,
                    'related_product_id' => $relatedProductId,
                ]);
            }
        }

        return response()->json([
            'success'   => true,
            'message'   => "success",
            "data" => $product
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::query()
        ->with('images', 'variants')
        ->where("status", "Selling")
        ->where("id", $id)
        ->orderBy("sort_order", "asc")
        ->first();

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
                'data' => null
            ]);
        }

       
        $relatedProducts = RelatedProduct::where("product_id", $id)
            ->get();

      
        foreach ($relatedProducts as $relatedProduct) {
            $relatedProductData = Product::find($relatedProduct->related_product_id);
            
            if ($relatedProductData) {
                $relatedProduct->name = $relatedProductData->name;
                $relatedProduct->sku = $relatedProductData->sku;
                $relatedProduct->quantity = $relatedProductData->quantity;
                $relatedProduct->description = $relatedProductData->description;
                $relatedProduct->price = $relatedProductData->price;
                $relatedProduct->discounted_price = $relatedProductData->discounted_price;
                $relatedProduct->new_arrival = $relatedProductData->new_arrival;
              
                // Include other attributes you want to retrieve
                // Fetch images for the related product
                $relatedProduct->images = ProductImage::where('product_id', $relatedProductData->id)->get();
            }
        }

        $product->relatedproducts = $relatedProducts;

        return response()->json([
            'success' => true,
            'message' => 'success',
            'data' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $data = $request->validated();

        $product = Product::find($id);
        $product->name = $data["name"];
        $product->quantity = $data["quantity"];
        $product->description = $data["description"];
        $product->price = $data["price"];
        $product->discounted_price = $data["discounted_price"];
        $product->status = $data["status"];
        $product->featured = $data["featured"];
        $product->new_arrival = $data["new_arrival"];
        $product->sort_order = $data["sort_order"];
        $product->save();

        return response()->json([
            'success'   => true,
            'message'   => "success",
            'data' => $product
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);

        return response()->json([
            'success'   => true,
            'message'   => "success",
        ]);
    }
}
