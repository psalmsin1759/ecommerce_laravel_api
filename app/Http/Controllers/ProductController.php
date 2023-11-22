<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\RelatedProduct;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\FeaturedProduct;
use App\Models\ProductCategory;
use App\Models\Category;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{

    public function addFeaturedProduct(Request $request){

        $products = $request->products;
        if ($products != null){
            foreach($products as $value)    
            {

                $product = Product::find($value);
                $product->featured = 1;
                $product->save();
                
            }
        }

        return redirect("featuredproduct");
    }

    public function removeFromFeatured(Request $request){
        $id = $request->id;

        $product = Product::find($id);
        $product->featured = 0;
        $product->save();

    }

    public function deleteProduct(Request $request){
        $id = $request->id;
        Product::destroy($id);

        return redirect ("/product");
    }


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

    public function addProduct(Request $request){

        $name = $request->productname;
        $sku = $request->sku;
        $description = $request->description;
        $price = $request->price;
        $discountedprice = $request->discountedprice;
        $costprice = $request->costprice;
        $quantity = $request->quantity;
        $status = $request->status;
        $sortorder = $request->sortorder;


        $product = new Product();
        $product->name = $name;
        $product->sku = $sku;
        $product->description = $description;
        $product->price = $price;
        $product->discounted_price = $discountedprice;
        $product->cost_price = $costprice;
        $product->quantity = $quantity;
        $product->status = $status;
        $product->sort_order = $sortorder;
        $product->save();

        $productID = $product->id;

        /* $new = $request->new; 
        if ($new != null){
            $product->new = $new;
        } */
        
        if ($request->hasFile("imageproductimage")){
            $destinationPath = "images/product/";
            $file = $request->imageproductimage;
            $extension = $file->getClientOriginalExtension();
            $fileName = $sku . rand(1111,9999) . "." . $extension;
            $fileName = preg_replace('/\s+/', '', $fileName);
            $file->move($destinationPath, $fileName);

            ProductImage::create([
                "product_id" => $productID,
                "path" => $fileName
            ]);
            
        }

        if ($request->hasFile("imageproductimageone")){
            $destinationPath = "images/product/";
            $file = $request->imageproductimageone;
            $extension = $file->getClientOriginalExtension();
            $fileName = $sku . rand(1111,9999) . "." . $extension;
            $fileName = preg_replace('/\s+/', '', $fileName);
            $file->move($destinationPath, $fileName);

            ProductImage::create([
                "product_id" => $productID,
                "path" => $fileName
            ]);

        }

        if ($request->hasFile("imageproductimagetwo")){
            $destinationPath = "images/product/";
            $file = $request->imageproductimagetwo;
            $extension = $file->getClientOriginalExtension();
            $fileName = $sku . rand(1111,9999) . "." . $extension;
            $fileName = preg_replace('/\s+/', '', $fileName);
            $file->move($destinationPath, $fileName);

            ProductImage::create([
                "product_id" => $productID,
                "path" => $fileName
            ]);

        }

        

        $category = $request->category;    
        if ($category != null){
            foreach($category as $value) 
            {
                
                $cat = new \App\Models\ProductCategory();
                $cat->category_id = $value;
                $cat->product_id = $productID;
                $cat->save();
            }                                                                                                                                                                                                                                                                                                                                                                                                                               
        }
        


        $related = $request->related;
        if ($related != null){
            foreach($related as $value) 
            {
                $cat = new \App\Models\RelatedProduct();
                $cat->product_id = $productID;
                $cat->related_product_id = $value;
                $cat->save();
            }
        }

        $options = $request->options;
        
         if ($options != null){
            
            $optionValueQuanityArray = preg_split ("/\,/", $options); 

            foreach ($optionValueQuanityArray as $item){

                //Size-18/18.5 (XXL):4

                //Color-White:10

            
                $optionValueArray = explode(":", $item);

                $optionValueName = $optionValueArray[0]; //Size-18/18.5 (XXL)
                $optionQuantity = $optionValueArray[1]; //4

                

                //Color-White
                $optionArray = explode("-", $optionValueName);
                $optionName = $optionArray[0]; //Size
                $optionValueName = $optionArray[1]; //18/18.5 (XXL)

                ProductVariant::create([
                    "product_id" => $productID,
                    "option" => $optionName,
                    "value" => $optionValueName,
                    "quantity" => $optionQuantity
                ]);


            }


            
        } 
        

        return redirect("product");
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

    public function productDetails($id){

        
        $product = Product::find($id);

        /* $productOption = DB::table('product_options')
            ->join('option_value', 'option_value_id', '=', 'option_value.id')
            ->join('option', 'option_id', '=', 'option.id')
            ->select('product_options.*', 'option_value.name as optionValueName', 'option.name as optionName')
            ->where('product_options.product_id', $id)
            ->get();   */
          /*   
            $optionCount = DB::table('product_options')
            ->join('option_value', 'option_value_id', '=', 'option_value.id')
            ->join('option', 'option_id', '=', 'option.id')
            ->select(DB::raw('count(option_value.name) as optionValueName'), 'option.name as optionName')
            ->where('product_options.product_id', $id)
            ->groupBy('option.name')
            ->get();   */

        $productImages = ProductImage::where("product_id", $id)->get();
       

        $relatedProduct = DB::table('related_products')
            ->join('products', 'product_id', '=', 'products.id')
            ->select('products.*', 'related_products.related_product_id as relatedid', 'related_products.product_id as productid')
            ->where('related_products.product_id', $id)
            ->get();   

        $allProductExcept   = Product::where("id", "!=", $id)->get();

        //$productReview = ProductReview::where("product_id", $id)->where("store_id", $eszstoreID)->get();

        return view ("productdetails", compact('product', 'relatedProduct', 'allProductExcept', 'productImages'/* , 'productReview', 'productOption', 'optionCount' */));

    }


    public function editProductView($id){

        

        $product = Product::find($id);

        //$options = \App\Models\Option::where("vendor_id", $eszvendorID)->where("store_id", $eszstoreID)->get();

        $category = Category::get();

        //$productSubCategory = \App\Models\ProductSubCategory::where("store_id", $eszstoreID)->get();

       

        $categoryProduct = DB::table('product_categories')
            ->join('categories', 'category_id', '=', 'categories.id')
            ->select('categories.name', 'product_categories.id as cpid')
            ->where('product_categories.product_id', $id)
            ->get(); 
            
        $productVariants = ProductVariant::where("product_id", $id)->get();


        $productImages = ProductImage::where("product_id", $id)->get();

        $relatedProduct = DB::table('related_products')
        ->join('products', 'related_products.related_product_id', '=', 'products.id')
        ->leftJoin('product_images', function ($join) {
            $join->on('products.id', '=', 'product_images.product_id')
                ->whereRaw('product_images.id = (SELECT MIN(id) FROM product_images WHERE product_id = products.id)');
        })
        ->select(
            'products.name as related_product_name',
            'related_products.related_product_id as relatedid',
            'product_images.path as image_path'
        )
        ->where('related_products.product_id', $id)
        ->get();

        $allProductExcept = Product::where("id", "!=", $id)->get();

       
        return view ("editproduct", compact('category', 'product' ,'categoryProduct',  'productVariants', 'product', 'allProductExcept', 'productImages', 'relatedProduct'));
        
    }


    public function editProduct(Request $request){

        $productid = $request->productid;
        $productname = $request->productname;
        $sku = $request->sku;
        $description = $request->description;
        $quantity = $request->quantity;
        $price = $request->price;
        $discountedprice = $request->discountedprice;
        $costprice = $request->costprice;
        $sortorder = $request->sortorder;

        $new = $request->new;

        $showNew = isset($new) ? 1 : 0;

        $product =  Product::find($productid);
        $product->name = $productname;
        $product->sku = $sku;
        $product->description = $description;
        $product->price = $price;
        $product->discounted_price = $discountedprice;
        $product->cost_price = $costprice;
        $product->quantity = $quantity;
        $product->sort_order = $sortorder;
        $product->save();

        
        if ($request->hasFile("imageproductimage")){
            $destinationPath = "images/product/";
            $file = $request->imageproductimage;
            $extension = $file->getClientOriginalExtension();
            $fileName = $sku . rand(1111,9999) . "." . $extension;
            $fileName = preg_replace('/\s+/', '', $fileName);
            $file->move($destinationPath, $fileName);

            ProductImage::where("product_id", $productid)->delete();

            ProductImage::create([
                "product_id" => $productid,
                "path" => $fileName
            ]);
            
        }

        if ($request->hasFile("imageproductimageone")){
            $destinationPath = "images/product/";
            $file = $request->imageproductimageone;
            $extension = $file->getClientOriginalExtension();
            $fileName = $sku . rand(1111,9999) . "." . $extension;
            $fileName = preg_replace('/\s+/', '', $fileName);
            $file->move($destinationPath, $fileName);

           // ProductImage::where("product_id", $product_id)->delete();
            ProductImage::create([
                "product_id" => $productid,
                "path" => $fileName
            ]);

        }

        if ($request->hasFile("imageproductimagetwo")){
            $destinationPath = "images/product/";
            $file = $request->imageproductimagetwo;
            $extension = $file->getClientOriginalExtension();
            $fileName = $sku . rand(1111,9999) . "." . $extension;
            $fileName = preg_replace('/\s+/', '', $fileName);
            $file->move($destinationPath, $fileName);

            //ProductImage::where("product_id", $product_id)->delete();

            ProductImage::create([
                "product_id" => $productid,
                "path" => $fileName
            ]);

        }

        return redirect("product/edit/"  . $productid)->with('success','Product Updated');


    }


    public function editOptionsQuantity(Request $request){

        $productOptionID = $request->optionid;
        $quantity = $request->quantity;
        $productid = $request->productid;

        $productOptionValue =ProductVariant::find($productOptionID);
        $productOptionValue->quantity = $quantity;
        $productOptionValue->save();

        return redirect("product/edit/"  . $productid);

    }

    public function deleteProductOption(Request $request){
        $productVariant = ProductVariant::find ($request->id);
        $productID = $productVariant->product_id;
        $productVariant->delete();
        return redirect("product/edit/"  . $productID);
        
    }

    public function optionAdd(Request $request){
        $optionproductid = $request->optionproductid;
        $option = $request->option;
        $value = $request->value;
        $myoptionquantity = $request->myoptionquantity;

        ProductVariant::create([
            'product_id' => $optionproductid,
            'option' => $option,
            'value' => $value,
            'quantity' => $myoptionquantity
        ]);

        return redirect("product/edit/"  . $optionproductid);
    }

    public function deleteRelatedProduct(Request $request){
        $relatedproductid = $request->id;
        
        $relatedProduct = RelatedProduct::where("related_product_id", $relatedproductid)->first();
        $productid = $relatedProduct->product_id;
        $relatedProduct->delete();
        return redirect("product/edit/"  . $productid);


    }

    public function addRelatedToProduct(Request $request){

        $productID = $request->rproductid;
       
        $related = $request->related;
        if ($related != null){
            foreach($related as $value) 
            {
                $count = RelatedProduct::where("product_id", $productID)->where("related_product_id", $value)->count();

                if ($count == 0){
                    $cat = new RelatedProduct();
                    $cat->product_id = $productID;
                    $cat->related_product_id = $value;
                    $cat->save();
                }
                
            }
        }

        return redirect("product/edit/"  . $productID)->with('success','Related Product Added');

    }

    public function deleteProductCategory(Request $request){
        $id = $request->id;

        $productCateogry = ProductCategory::find($id);
        $productid = $productCateogry->product_id;
        $productCateogry->delete();
        return redirect("product/edit/"  . $productid);

    }

    public function editAddCategory(Request $request){
        $productID = $request->rproductid;
       
        $category = $request->category;
        if ($category != null){
            foreach($category as $value) 
            {
                $count = \App\Models\ProductCategory::where("product_id", $productID)->where("category_id", $value)->count();

                if ($count == 0){
                    $cat = new ProductCategory();
                    $cat->product_id = $productID;
                    $cat->category_id = $value;
                    $cat->save();
                }
                
            }
        }

        return redirect("product/edit/"  . $productID)->with('success','Product Added To Category');

    }
}
