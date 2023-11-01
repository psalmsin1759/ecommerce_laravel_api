@extends("master")
@section("body")


 <!-- Body: Body -->       
 <div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Coupons Add</h3>
                </div>
            </div>
        </div> <!-- Row end  -->
        <form method="POST" action="{{url("/coupon/add")}}" >
            {{ csrf_field() }}
        <div class="row clearfix g-3">
            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                        <h6 class="m-0 fw-bold">Coupon Status</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="1" checked>
                            <label class="form-check-label">
                                Active
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="0" name="status">
                            <label class="form-check-label">
                                In Active
                            </label>
                        </div>
                        
                    </div>
                </div>
                <div class="card">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                        <h6 class="m-0 fw-bold">Date Schedule</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-12">
                                <label class="form-label">Start Date</label>
                                <input name="startdate" type="date" class="form-control w-100" required="">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">End Date</label>
                                <input name="enddate" type="date"  class="form-control w-100" required="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                        <h6 class="m-0 fw-bold">Coupon Information</h6>
                    </div>
                    <div class="card-body">
                       
                            <div class="row g-3 align-items-center">
                                <div class="col-md-6">
                                    <label class="form-label">Coupons Name</label>
                                    <input type="text" class="form-control" name="couponname" required="">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Coupons Code</label>
                                    <input type="text" class="form-control" name="code" required="">
                                </div>
                                

                                
                                <div class="col-md-12">
                                    <label class="form-label">Coupons Types</label>
                                    
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="percentage" name="type" checked>
                                        <label class="form-check-label">
                                            Percentage
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="fixedamount" name="type">
                                        <label class="form-check-label">
                                            Fixed Amount
                                        </label>
                                    </div>
                                </div>

                                <div id="discountdiv" class="col-md-12">
                                    <label class="form-label">Discount(%)</label>
                                    <input type="number" name="discount" class="form-control" required="" value="0">
                                </div>
                                <div id="amountdiv" class="col-md-12">
                                    <label class="form-label">Total Amount</label>
                                    <input type="number" name="totalamount" class="form-control" value="0">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 text-uppercase px-5">Submit</button>
                       
                    </div>
                </div>
            </div>
        </div><!-- Row End -->
    </form>
    </div>
</div>


@endsection