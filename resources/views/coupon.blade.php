@extends("master")
@section("body")

 <!-- Body: Body -->       
 <div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Coupons</h3>
                    <div class="col-auto d-flex w-sm-100">
                        <a href="{{url("coupon/add")}}" class="btn btn-primary btn-set-task w-sm-100"><i class="icofont-plus-circle me-2 fs-6"></i>Add Coupons</a>
                    </div>
                </div>
            </div>

        </div> <!-- Row end  -->
        <div class="row clearfix g-3">
        <div class="col-sm-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Coupon Name</th>
                                    <th>Code</th>
                                    <th>Type</th>
                                    <th>Discount</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                               {{--  @foreach($coupon as $item)

                                <tr>
                                    <td><span class="fw-bold ms-1">{{$item->coupon_name}}</span></td>
                                    <td><span class="fw-bold ms-1">{{$item->code}}</span></td>
                                    <td>{{$item->type}}</td>
                                    <td>{{$item->discount}}</td>
                                    <td>{{$item->total_amount}}</td>
                                    @php
                                    if ($item->status == 1){
                                        echo '<td>Enable</td>';
                                    }else if ($item->status == 0){
                                        echo '<td>Disable</td>';
                                    }
                                    @endphp
                                    <!--td><span class="badge bg-success">Active</span></td>-->
                                    <td>{{$item->start_date}}</td>
                                    <td>{{$item->end_date}}</td>
                                    <td>
                                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                <a href="{{url("/vendor/coupon/edit/" . $item->id)}}" class="btn btn-outline-secondary"><i class="icofont-edit text-success"></i></a>
                                                <button type="button" class="btn btn-outline-secondary delete-coupon" data-id="{{$item->id}}" ><i class="icofont-ui-delete text-danger"></i></button>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach --}}

                           
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
        </div><!-- Row End -->
    </div>
</div>

@endsection