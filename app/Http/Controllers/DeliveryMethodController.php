<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeliveryMethodRequest;
use App\Http\Requests\UpdateDeliveryMethodRequest;
use App\Models\DeliveryMethod;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class DeliveryMethodController extends Controller
{

    public function showView (){

        $deliveryMethods = DeliveryMethod::where("status", 1)->orderBy("sort_order")->get();

        return view ("delivery", compact("deliveryMethods"));

    }

    public function addDeliveryMethod(Request $request){
        $name = $request->name;
        $description = $request->description;
        $amount = $request->amount;
        $sortorder = $request->sortorder;

        DeliveryMethod::create([
            "name" => $name,
            "description" => $description,
            "amount" => $amount,
            "sort_order" => $sortorder,
        ]);

        return redirect ("delivery");
    }

    public function editDeliveryMethod(Request $request){

        $id = $request->editdeliveryid;
        $name = $request->editname;
        $description = $request->editdescription;
        $amount = $request->editamount;
        $sortorder = $request->editsortorder;
        $default = $request->default;

        if ($default == 1){
            DeliveryMethod::query()->update(['default_method' => 0]);
        }

        $delivery =  DeliveryMethod::find($id);
        $delivery->name = $name;
        $delivery->description = $description;
        $delivery->amount = $amount;
        $delivery->sort_order = $sortorder;
        $delivery->default_method = $default;
        $delivery->save();

        return redirect ("delivery");

    }

    public function deleteDeliveryMethod(Request $request){

        $id = $request->id;
        DeliveryMethod::destroy($id);

    }

    public function getDeliveryMethods(){
        $deliveryMethods = DeliveryMethod::orderBy("sort_order")->get();
        $deliveryMethod = DeliveryMethod::where("default_method", 1)->first();

        if ($deliveryMethod){
            $default = $deliveryMethod->id;
        }else{
            $delivery = $deliveryMethods->first();
            $default = $delivery->id;
        }
       

        return response()->json([
            'success'   => true,
            'message'   => "success",
            'default'  => $default,
            "data" => $deliveryMethods
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
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
