@extends("master")
@section("body")



 <!-- Body: Body -->
 <div class="body d-flex py-3">
    <div class="container-xxl">

        <div class="row g-3 mb-3 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
            <div class="col">
                <div class="alert-success alert mb-0">
                    <div class="d-flex align-items-center">
                        <div class="avatar rounded no-thumbnail bg-success text-light"><i class="fa fa-dollar fa-lg"></i></div>
                        <div class="flex-fill ms-3 text-truncate">
                            <div class="h6 mb-0">Revenue</div>
                            <span class="small">{{$totalRevenue}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="alert-danger alert mb-0">
                    <div class="d-flex align-items-center">
                        <div class="avatar rounded no-thumbnail bg-danger text-light"><i class="fa fa-credit-card fa-lg"></i></div>
                        <div class="flex-fill ms-3 text-truncate">
                            <div class="h6 mb-0">Expense</div>
                            <span class="small">0</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="alert-warning alert mb-0">
                    <div class="d-flex align-items-center">
                        <div class="avatar rounded no-thumbnail bg-warning text-light"><i class="fa fa-smile-o fa-lg"></i></div>
                        <div class="flex-fill ms-3 text-truncate">
                            <div class="h6 mb-0">Customers</div>
                            <span class="small">{{$customerCount}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="alert-info alert mb-0">
                    <div class="d-flex align-items-center">
                        <div class="avatar rounded no-thumbnail bg-info text-light"><i class="fa fa-shopping-bag" aria-hidden="true"></i></div>
                        <div class="flex-fill ms-3 text-truncate">
                            <div class="h6 mb-0">New Orders</div>
                            <span class="small">{{$orderCount}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Row end  -->

        <div class="row g-3">
            <div class="col-lg-12 col-md-12">
                <div class="tab-filter d-flex align-items-center justify-content-between mb-3 flex-wrap">
                    <ul class="nav nav-tabs tab-card tab-body-header rounded  d-inline-flex w-sm-100">
                        <!--<li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#summery-today" >Today</a></li>-->
                    </ul>
                    
                </div>
                <div class="tab-content mt-1">
                    <div class="tab-pane fade show active" id="summery-today">
                        <div class="row g-1 g-sm-3 mb-3 row-deck">
                            
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                        <div class="left-info">
                                            <span class="text-muted">Total Products</span>
                                            <div><span class="fs-6 fw-bold me-2">{{$productCount}}</span></div>
                                        </div>
                                        <div class="right-icon">
                                            <i class="icofont-bag fs-3 color-light-orange"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                        <div class="left-info">
                                            <span class="text-muted">Returns</span>
                                            <div><span class="fs-6 fw-bold me-2">0</span></div>
                                        </div>
                                        <div class="right-icon">
                                            <i class="icofont-sign-out fs-3 color-santa-fe"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                        <div class="left-info">
                                            <span class="text-muted">Today Sale</span>
                                            <div><span class="fs-6 fw-bold me-2">{{$todayRevenue}}</span></div>
                                        </div>
                                        <div class="right-icon">
                                            <i class="icofont-clock-time fs-3 color-santa-fe"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!--<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                        <div class="left-info">
                                            <span class="text-muted">Visitors</span>
                                            <div><span class="fs-6 fw-bold me-2">0</span></div>
                                        </div>
                                        <div class="right-icon">
                                            <i class="icofont-users-social fs-3 color-light-success"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            
                            
                           
                        </div> <!-- row end -->
                    </div>
                   

                </div>
            </div>
        </div><!-- Row end  -->

        <div class="row g-3 mb-3">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                        <h6 class="m-0 fw-bold">Sales</h6>
                    </div>
                    <div class="card-body">
                         {!! $orderChartjs->render() !!} 
                    </div>
                </div>
            </div>
        </div><!-- Row end  -->

        <div class="row g-3 mb-3">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                        <h6 class="m-0 fw-bold">Top Seller</h6>
                    </div>
                    <div class="card-body">
                         {!! $chartjsPie->render() !!} 
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                        <h6 class="m-0 fw-bold">Top Sellers</h6>
                    </div>

                    <div class="card-body">

                        <table class="table table-hover align-middle mb-0" style="width: 100%;">  
                            <thead>
                                <tr>
                                <th>Product Name</th>
                                <th>Quantity Sold</th>
                                </tr>
                            </thead>
                            <tbody>

                                 @foreach($topSellingProducts as $item)

                                <tr>
                                    <td><strong>{{$item->name}}</strong></td>
                                    <td>{{$item->quantity_sold}}</td>
                                </tr>

                                @endforeach 
                            </tbody>


                        </table>
                        
                    </div>
                    
                </div>
            </div>

        </div><!-- Row end  -->

        

        
        <!--<div class="row g-3 mb-3">
            <div class="col-xxl-12 col-xl-12">
                <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                        <h6 class="m-0 fw-bold">Shopping Status</h6>
                    </div>
                    <div class="card-body">
                        <div class="ac-line-transparent" id="apex-shoppingstatus"></div>
                    </div>
                </div>
                
            </div>
            
        </div>Row end  -->

       

        <div class="row g-3 mb-3"> 
            <div class="col-md-12">
                <div class="card"> 
                    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                        <h6 class="m-0 fw-bold">Recent Transactions</h6>
                    </div>
                    <div class="card-body"> 
                        <table id="myDataTable" class="table table-hover align-middle mb-0" style="width: 100%;">  
                            <thead>
                                <tr>
                                <th>OrderID.</th>
                                <th>Customer Name</th>
                                <th>Order Status</th>
                                <th>Total</th>
                                <th>Shipping Method</th>
                                <th>Order Date</th>
                                <th>Preview</th>
                                </tr>
                            </thead>
                            <tbody>

                               @php $color = null; @endphp

                                @foreach($latestOrders as $item)

                                @if ($item->order_status == "Pending")
                                    @php $color = "danger"; @endphp
                                @elseif ($item->order_status == "Shipped")
                                    @php $color = "warning"; @endphp
                                @elseif ($item->status == "Success")
                                    @php $color = "success"; @endphp
                                    @else
                                    @php $color = "danger"; @endphp
                                @endif


                                <tr>
                                    <td><strong>#Order-{{$item->orderid}}</strong></td>
                                    <td><img class="avatar rounded" src="{{asset("dashboardassets/images/xs/avatar2.svg")}}" alt="">{{$item->first_name}} {{$item->last_name}}</td>
                                    <td><span class="badge bg-{{$color}}">{{$item->status}}</span></td>
                                    <td>{{ Session::get('eszCurrencySymbol')}}{{$item->total_price}}</td>
                                    <td>{{$item->payment_method}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>
                                        <a href="{{url("order/" . $item->id)}}" data-id="{{$item->id}}" class="btn btn-sm btn-primary show-order">Preview</a>
                                    </td>
                                </tr>


                                @endforeach 

                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- Row end  -->
        
    </div>
</div>

@endsection
