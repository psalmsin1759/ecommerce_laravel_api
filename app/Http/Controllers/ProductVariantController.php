<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductVariantRequest;
use \App\Models\ProductVariant;
use Illuminate\Support\Facades\DB;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productVariant = ProductVariant::all();

        return response()->json([
            'success'   => true,
            'message'   => "success",
            "data" => $productVariant
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductVariantRequest $request)
    {
        $data = $request->validated();
        $productVariant = ProductVariant::create($data);

        return response()->json([
            'success'   => true,
            'message'   => "success",
            "data" => $productVariant
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ProductVariant::destroy($id);

        return response()->json([
            'success'   => true,
            'message'   => "success",
        ]);
    }


    public function getFilter(){

        $options = DB::table('product_variants')
        ->select('option', 'value')
        ->distinct()
        ->get();

        return response()->json([
            'success'   => true,
            'message'   => "success",
            'data' => $options
        ]);
    
    }
}
