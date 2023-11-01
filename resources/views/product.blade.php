@extends("master")
@section("body")


<!-- Body: Body -->
<div class="body d-flex py-3">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Products</h3>
                    {{-- <div class="btn-group group-link btn-set-task w-sm-100">
                        <a href="{{url("vendor/productgrid")}}" class="btn d-inline-flex align-items-center" aria-current="page"><i class="icofont-wall px-2 fs-5"></i>Grid View</a>
                        <a href="{{url("vendor/product")}}" class="btn active d-inline-flex align-items-center"><i class="icofont-listing-box px-2 fs-5"></i> List View</a>
                    </div> --}}
                </div>
            </div>
        </div> <!-- Row end  -->

        <div class="row g-3 mb-3"> 
            <div class="col-md-12">
                <div class="card"> 
                    <div class="card-body"> 
                        <table id="myDataTable" class="table table-hover align-middle mb-0" style="width: 100%;">  
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Product</th>
                                    <th>Price ({{ Session::get('eszCurrencySymbol')}})</th>
                                    <th>Qty</th>
                                    <th>Status</th>
                                    <th>Sort Order</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                            @php
                                $color = null;
                                $value = null;
                            @endphp

                            @foreach($products as $item)

                                @if ($item->status == "Selling")
                                    @php $color = "success";$value = "Enabled"; @endphp
                                @else
                                    @php $color = "danger";$value = "Disabled"; @endphp
                            
                                @endif

                                <tr>
                                    <td></td>
                                    @if($item->images->count() > 0)
                                        <td><img style="width: 67px; height: 100px" src="{{asset("images/product/" . $item->images->first()->path)}}" class="avatar lg rounded me-2" alt="profile-image"><span> {{$item->name}} </span></td>         
                                    @else
                                        <td><img style="width: 67px; height: 100px" src="https://placehold.co/67x100.png" class="avatar lg rounded me-2" alt="profile-image"><span> {{$item->name}} </span></td>           
                                    @endif
                                    <td> @php
                                        if ($item->discounted_price != 0){
                                            
                                            echo ' <del class="text-danger ms-2">' . 
                                           $item->price . '
                                             </del>' . $item->discounted_price; 
                                        
                                        }else{
                                            echo $item->price;
                                        }
                                    @endphp
                                    </td>
                                    <td> {{$item->quantity}}</td>
                                    <td>
                                        <div class="badge bg-{{$color}}">
                                            {{$value}}
                                        </div>
                                    </td>
                                    <td>{{$item->sort_order}}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a type="button" class="btn btn-outline-secondary delete-product"  data-bs-toggle="modal" data-bs-target="#expedit" data-id="{{$item->id}}" data-name="{{$item->name}}"><i class="icofont-ui-delete text-danger"></i></a>
                                        </div>
                                    </td>
                                </tr>


                            @endforeach
                                
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- Row end  -->
    </div>
</div>


<!-- Edit Expence-->
<div class="modal fade" id="expedit" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title  fw-bold" id="expeditLabel"> Delete Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST"  action="{{url("product/delete")}}" >
        <div class="modal-body">
           
                {{ csrf_field() }}
            <div class="deadline-form">
                
                <input type="hidden" class="form-control" name="id" id="id">

                    <div class="row g-3 mb-3">
                        <div class="col-sm-12">
                            <label for="depone" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productname" name="productname" placeholder="Name" readonly>
                        </div>
                        
                    </div>
                   
                
            </div>
       
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Done</button>
            <button type="submit" class="btn btn-primary">Delete</button>
        </div>
    </form>
    </div>
    </div>
</div>


@endsection