@extends("master")
@section("body")



 <!-- Body: Body --> 
 <div class="body d-flex py-3">  
    <div class="container-xxl"> 
        <div class="row align-items-center"> 
            <div class="border-0 mb-4"> 
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Order Details: #Order-{{$order->orderid}}</h3>
                   {{--  <div class="col-auto d-flex btn-set-task w-sm-100 align-items-center">
                        <select class="form-select" aria-label="Default select example">
                            <option selected="">Select Order Id</option>
                            <option value="1">Order-78414</option>
                            <option value="2">Order-78415</option>
                            <option value="3">Order-78416</option>
                            <option value="4">Order-78417</option>
                            <option value="5">Order-78418</option>
                            <option value="6">Order-78419</option>
                            <option value="7">Order-78420</option>
                        </select>
                    </div> --}}
                </div>
            </div>
        </div> <!-- Row end  -->
        <div>
            @include('flash-message')
        </div>
        <div class="row g-3 mb-3 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
            <div class="col">
                <div class="alert-success alert mb-0">
                    <div class="d-flex align-items-center">
                        <div class="avatar rounded no-thumbnail bg-success text-light"><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i></div>
                        <div class="flex-fill ms-3 text-truncate">
                            <div class="h6 mb-0">Order Date</div>
                            <span class="small">{{$order->created_at}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="alert-danger alert mb-0">
                    <div class="d-flex align-items-center">
                        <div class="avatar rounded no-thumbnail bg-danger text-light"><i class="fa fa-user fa-lg" aria-hidden="true"></i></div>
                        <div class="flex-fill ms-3 text-truncate">
                            <div class="h6 mb-0">Name</div>
                            <span class="small">{{$order->first_name}} {{$order->last_name}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="alert-warning alert mb-0">
                    <div class="d-flex align-items-center">
                        <div class="avatar rounded no-thumbnail bg-warning text-light"><i class="fa fa-envelope fa-lg" aria-hidden="true"></i></div>
                        <div class="flex-fill ms-3 text-truncate">
                            <div class="h6 mb-0">Email</div>
                            <span class="small">{{$order->email}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="alert-info alert mb-0">
                    <div class="d-flex align-items-center">
                        <div class="avatar rounded no-thumbnail bg-info text-light"><i class="fa fa-phone-square fa-lg" aria-hidden="true"></i></div>
                        <div class="flex-fill ms-3 text-truncate">
                            <div class="h6 mb-0">Contact No</div>
                            <span class="small">{{$order->phone}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row g-3 mb-3 row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 row-deck"> 
            <div class="col">
                <div class="card auth-detailblock">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Delivery Address</h6>
                        <a href="#" class="text-muted"></a>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label col-6 col-sm-5">Name:</label>
                                <span><strong>{{strtoupper($order->first_name)}}</strong></span>
                            </div>
                            <div class="col-12">
                                <label class="form-label col-6 col-sm-5">Address:</label>
                                <span><strong>{{$order->shipping_address}},{{$order->shipping_city}}, {{$order->shipping_state}},  {{$order->shipping_country}}</strong></span>
                            </div>
                            <div class="col-12">
                                <label class="form-label col-6 col-sm-5">Phone:</label>
                                <span><strong>{{$order->phone}}</strong></span>
                            </div>
                            <div class="col-12">
                                <label class="form-label col-6 col-sm-5">Delivery Status:</label>
                                <span><strong><a href="#" class="text-muted">{{$order->status}}</a></strong></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="col">
                <div class="card">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Invoice Details</h6>
                       {{--  <a href="{{url("/vendor/invoice/" . $order->id)}}" class="text-muted">View</a> --}}
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label col-6 col-sm-5">Number:</label>
                                <span><strong>#{{$order->orderid}}</strong></span>
                            </div>
                            <div class="col-12">
                                <label class="form-label col-6 col-sm-5">Payment Gateway :</label>
                                <span><strong>{{$order->payment_gateway}}</strong></span>
                            </div>
                            <div class="col-12">
                                <label class="form-label col-6 col-sm-5">Transaction Reference :</label>
                                <span><strong>{{$order->transaction_ref}}</strong></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row g-3 mb-3">
            <div class="col-xl-8 col-xxl-8">
                <div class="card">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Order Summary</h6>
                    </div>
                    <div class="card-body">
                        <div class="product-cart">
                            <div class="checkout-table table-responsive">
                                <table id="myCartTable" class="table display dataTable table-hover align-middle" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="product">Product Image</th>
                                            <th>Product Name</th>
                                            <th class="quantity">Quantity</th>
                                            <th class="price">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($orderDetails as $item)

                                        <tr>
                                            <td>
                                                <img src="{{asset("images/product/" . $item->image_path)}}" class="avatar rounded lg" alt="Product">
                                            </td>
                                            <td>
                                                <h6 class="title">{{$item->name}} <span class="d-block fs-6 text-primary">{{$item->options}}</span></h6>
                                            </td>
                                            <td>
                                                {{$item->qty}}
                                            </td>
                                            <td>
                                                <p class="price">{{$item->price}}</p>
                                            </td>
                                        </tr>

                                        @endforeach 
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                            <div class="checkout-coupon-total checkout-coupon-total-2 d-flex flex-wrap justify-content-end">
                                <div class="checkout-total">
                                    <!--<div class="single-total">
                                        <p class="value">Subotal Price:</p>
                                        <p class="price">$1096.00</p>
                                    </div>-->
                                    <div class="single-total">
                                        <p class="value">Shipping(+):</p>
                                        <p class="price">{{ Session::get('eszCurrencySymbol')}} {{$order->shipping_price}}</p>
                                    </div>

                                    <div class="single-total">
                                        <p class="value">Discount(-):</p>
                                        <p class="price">{{ Session::get('eszCurrencySymbol')}} {{$order->discount}}</p>
                                    </div>
                                    
                                    <div class="single-total total-payable">
                                        <p class="value">Total Payable:</p>
                                        <p class="price">{{ Session::get('eszCurrencySymbol')}} {{$order->total_price}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>     
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-xxl-4">
                <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Status Orders</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{url("/order/status")}}" >
                            {{ csrf_field() }}
                            <div class="row g-3 align-items-center">

                                <input type="hidden" name="orderid" value="{{$order->id}}" />
                                
                                <div class="col-md-12">
                                    <label  class="form-label">Order Status</label>
                                    <select name="orderstatus" class="form-select" aria-label="Default select example">
                                        <option value="Pending">Pending </option>
                                        <option value="Processing">Processing </option>
                                        <option value="Processed">Processed </option>
                                        <option value="Shipped">Shipped </option>
                                        <option value="Refunded">Refunded </option>
                                        <option value="Success">Completed </option>
                                        <option value="Canceled">Canceled </option>
                                    </select>
                                </div>
                                
                                
                               
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 text-uppercase">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- Row end  -->
    </div>
</div>

@endsection