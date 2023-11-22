@extends("master")
@section("body")

  <!-- Body: Body -->
  <div class="body d-flex py-3">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Customer Detail</h3>
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row g-3 mb-xl-3">
            <div class="col-xxl-4 col-xl-12 col-lg-12 col-md-12">
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-1 row-deck g-3">
                    <div class="col">
                        <div class="card profile-card">
                            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                <h6 class="mb-0 fw-bold ">Profile</h6>
                            </div>
                            <div class="card-body d-flex profile-fulldeatil flex-column">
                                <div class="profile-block text-center w220 mx-auto">
                                    <a href="#">
                                        <img src="{{asset("images/lg/avatar4.svg")}}" alt="" class="avatar xl rounded img-thumbnail shadow-sm">
                                    </a>
                                
                                </div>
                                <div class="profile-info w-100">
                                    <h6  class="mb-0 mt-2  fw-bold d-block fs-6 text-center"> {{$customer->first_name}} {{$customer->last_name}}</h6>
                                    <div class="row g-2 pt-2">
                                        <div class="col-xl-12">
                                            <div class="d-flex align-items-center">
                                                <i class="icofont-ui-touch-phone"></i>
                                                <span class="ms-2">{{$customer->phone}}</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="d-flex align-items-center">
                                                <i class="icofont-email"></i>
                                                <span class="ms-2">{{$customer->email}}</span>
                                            </div>
                                        </div>
                                       
                                        <div class="col-xl-12">
                                            <div class="d-flex align-items-center">
                                                <i class="icofont-address-book"></i>
                                                <span class="ms-2">{{$customer->address}},{{$customer->state}} {{$customer->country}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
               
            </div>
            <div class="col-xxl-8 col-xl-12 col-lg-12 col-md-12">
                
                <div class="card"> 
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Customer Order</h6>
                    </div>
                    <div class="card-body"> 
                        <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width: 100%;">  
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Order Status</th>
                                    <th>Total</th>
                                    <th>Gateway</th>
                                    <th>Transaction Ref</th>
                                    <th>Order Date</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($order as $item)

                                <tr>
                                    <td><a href="{{url("/order/" . $item->id)}}"><strong>#Order-{{$item->id}}</strong></a></td>
                                    <td>{{$item->status}}</td>
                                    <td>{{$item->total_price}}</td>
                                    <td>{{$item->payment_gateway}}</td>
                                    <td>{{$item->transaction_ref}}</td>
                                    <td>
                                        {{$item->created_at}}
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