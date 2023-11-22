<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    public function applyCoupon($couponCode){

        

         $coupon = Coupon::where('code', $couponCode)->first();
         $currentDate = Carbon::now();

         if (!$coupon) {
            return response()->json([
                'success'   => false,
                'message'   => "Coupon not found",
            ]);
         }
 
         if ($currentDate < $coupon->start_date || $currentDate > $coupon->end_date) {
            return response()->json([
                'success'   => false,
                'message'   => "Coupon is not valid for the current date",
            ]);
         }

         return response()->json([
            'success'   => true,
            'message'   => "success",
            'data' => $coupon
        ]);
    

    }

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::orderBy("created_at", "desc")->get();

        return response()->json([
            'success'   => true,
            'message'   => "success",
            "data" => $coupons
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCouponRequest $request)
    {
        $data = $request->validated();
        $coupon = Coupon::create($data);

        return response()->json([
            'success'   => true,
            'message'   => "success",
            "data" => $coupon
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $coupon = Coupon::find($id);
        return response()->json([
            'success'   => true,
            'message'   => "success",
            "data" => $coupon
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCouponRequest $request, string $id)
    {
        
        $data = $request->validated();

        $coupon = Coupon::find($id);
        $coupon->code = $data["code"];
        $coupon->start_date = $data["start_date"];
        $coupon->end_date = $data["end_date"];
        $coupon->type = $data["type"];
        $coupon->value = $data["value"];
        $coupon->status = $data["status"];
        $coupon->save();

        return response()->json([
            'success'   => true,
            'message'   => "success",
        ]);

        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Coupon::destroy($id);

        return response()->json([
            'success'   => true,
            'message'   => "success",
        ]);
    }


    public function addNewCoupon(Request $request){
        
        $code = $request->code;
        $type = $request->type;
        $value = $request->value;
        
       
      
        $status = $request->status;
        $startdate = $request->startdate;
        $enddate = $request->enddate;
       
        $startdate = date("Y-m-d", strtotime($startdate));
        $enddate = date("Y-m-d", strtotime($enddate));

        $coupon = new Coupon();
        $coupon->code = $code;
        $coupon->type = $type;
        $coupon->value = $value;
        $coupon->status = $status;
        $coupon->start_date = $startdate;
        $coupon->end_date = $enddate;
        $coupon->save();

        return redirect("coupon");
    }


    public function deleteNewCoupon(Request $request){
        $id = $request->id;

        Coupon::destroy($id);
        return redirect("coupon");
    }
}
