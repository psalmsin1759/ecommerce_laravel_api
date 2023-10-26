<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
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
}
