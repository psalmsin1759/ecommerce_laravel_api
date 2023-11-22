<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeliveryMethodRequest;
use App\Http\Requests\UpdateDeliveryMethodRequest;
use App\Models\DeliveryMethod;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class DeliveryMethodController extends Controller
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
    //public function store(StoreDeliveryMethodRequest $request)
    public function store(Request $request) : RedirectResponse
    {
       $validate = $request->validate([
            "name" => "required|string",
            "description" => "required|string",
            "amount" => "required|numeric"
       ]);

       return response()->json([
            "status" => "success"
       ]);
       
    }

    /**
     * Display the specified resource.
     */
    public function show(DeliveryMethod $deliveryMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeliveryMethod $deliveryMethod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeliveryMethodRequest $request, DeliveryMethod $deliveryMethod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeliveryMethod $deliveryMethod)
    {
        //
    }
}
