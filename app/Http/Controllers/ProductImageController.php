<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\ProductImage;

class ProductImageController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productImage = ProductImage::all();

        return response()->json([
            'success'   => true,
            'message'   => "success",
            "data" => $productImage
        ]);
    }


     /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ProductImage::destroy($id);

        return response()->json([
            'success'   => true,
            'message'   => "success",
        ]);
    }
}
