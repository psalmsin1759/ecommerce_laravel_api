@extends("master")
@section("body")


  <!-- Body: Body -->
  <div class="body d-flex py-3">
    <div class="container-xxl">

        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Products Detail</h3>
                </div>
            </div>
        </div> <!-- Row end  -->  

        <div class="row g-3 mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="product-details">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="product-details-image mt-50">
                                        <div class="product-thumb-image">
                                            <div class="product-thumb-image-active nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                                @foreach ($productImages as $item)

                                                    <a class="single-thumb" id="{{$item->id}}" data-bs-toggle="pill" href="#{{$item->id}}" role="button" aria-controls="{{$item->id}}" >
                                                        <img  src="{{asset("images/product/" . $item->path)}}" alt="">
                                                    </a>

                                                @endforeach
                                                    
                                               
                                              
                                               
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <div class="product-image-active tab-content" id="v-pills-tabContent">
                                                
                                                @foreach ($productImages as $item)
                                                <a class="single-image tab-pane fade" id="{{$item->id}}" role="tabpanel" aria-labelledby="{{$item->id}}">
                                                    <img src="{{asset("images/product/" . $item->path)}}" alt="">
                                                </a>
                                                @endforeach
                                               
                                               
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="product-details-content mt-45">
                                        <h2 class="fw-bold fs-4">{{$product->name}}</h2>
                                        <div class="my-3">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <span class="text-muted ms-3"></span>
                                        </div>

                                                {{-- @php $count = 0;@endphp
                                                @foreach ($optionCount as $item)
                                                    @php
                                                        $count++;
                                                    @endphp

                                                <div class="product-items flex-wrap">
                                                    <h6 class="item-title fw-bold">Select {{$item->optionName}}</h6>
                                                    <div class="items-wrapper" id="select-item-1">
                                                        <select class="form-control" name="{{"option" . $count}}" required>
                                                            
                                                            @foreach ($productOption as $subItem)
                                                                @if($item->optionName == $subItem->optionName) 
                                                                    <option value="{{$item->optionName}}: {{$subItem->optionValueName}},">{{$subItem->optionValueName}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select> 
                                                    </div>
                                                </div>
                                                    
                                                @endforeach --}}

                            
                                        
                                        <div class="product-price">
                                            <h6 class="price-title fw-bold">Price</h6>

                                            @php
                                                if ($product->discounted_price != 0){
                                                    echo '<p class="sale-price">' . Session::get('eszCurrencySymbol') . $product->discounted_price . '</p>
                                                    <p class="regular-price text-danger">' .  Session::get('eszCurrencySymbol')  . $product->price . '</p>';
                                                }else{
                                                    echo '<p class="sale-price">' . Session::get('eszCurrencySymbol') . $product->price . '</p>';
                                                }
                                            @endphp

                                            


                                        </div>
                                        <p>{{$product->short_description}}</p>
                                        <div class="product-btn mb-5">
                                            <div class="d-flex flex-wrap">
                                                <div class="mt-2 mt-sm-0  me-1">
                                                    <div class="input-group">
                                                        <input type="number" value="{{$product->quantity}}" class="form-control" placeholder="1" min="1" max="5" readonly>
                                                        <span class="input-group-text"><i class="fa fa-sort"></i></span>
                                                    </div>
                                                </div>
                                                <a href="{{url("/product/edit/" . $product->id)}}"  class="btn btn-primary mx-1 mt-2  mt-sm-0"><i class="fa fa-edit me-1"></i> Edit Product Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Row end  -->  

        <div class="row g-3 mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs tab-body-header rounded  d-inline-flex" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#descriptions" role="tab">Descriptions</a></li>
                            <li class="nav-item"><a class="nav-link " data-bs-toggle="tab" href="#review" role="tab">Reviews</a></li>
                            
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="review">
                            <div class="card-body">
                                <div class="row clearfix g-3">
                                    
                                    <div class="col-lg-12 col-md-12">
                                        <ul class="list-unstyled mb-4">

                                           {{--  @foreach ($productReview as $item)

                                            <li class="card mb-2">
                                                <div class="card-body p-lg-4 p-3">
                                                    <div class="d-flex mb-3 pb-3 border-bottom flex-wrap">
                                                        <img class="avatar rounded" src="{{asset("dashboardassets/images/xs/avatar9.svg")}}" alt="">
                                                        <div class="flex-fill ms-3 text-truncate">
                                                            <h6 class="mb-0"><span>{{$item->name}}</span></h6>
                                                            <span class="text-muted">{{$item->created_at}}</span>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <span class="mb-2 me-3">
                                                                <a href="#" class="rating-link active"><i class="bi bi-star-fill text-warning"></i></a>
                                                                <a href="#" class="rating-link active"><i class="bi bi-star-fill text-warning"></i></a>
                                                                <a href="#" class="rating-link active"><i class="bi bi-star-fill text-warning"></i></a>
                                                                <a href="#" class="rating-link active"><i class="bi bi-star-fill text-warning"></i></a>
                                                                <a href="#" class="rating-link active"><i class="bi bi-star-half text-warning"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="timeline-item-post">
                                                        <h6 class=""></h6>
                                                        <p> {{$item->comment}}</p>
                                                    </div>
                                                </div>
                                            </li> <!-- .Card End -->

                                            @endforeach --}}

                                          
                                        </ul>
                                        <nav aria-label="...">
                                            <!-- paginate -->
                                        </nav>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <form method="POST" action="{{url("/vendor/product/addreview")}}" >
                                            {{ csrf_field() }}
                                            
                                            <input type="hidden" name="productid" value="{{$product->id}}" />
        
                                            <div class="row">
                                                <div class="col-12">
                                                    <h5>Add your review:</h5>
                                                </div>
                                                <div class="col-12 mt-4">
                                                    <h6 class="small fw-bold">Your Rating:</h6>
                                                    <a href="javascript:void(0)" class="d-inline-block me-3">
                                                        <ul class="list-unstyled mb-0 small">
                                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star-outline text-warning"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star-outline text-warning"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star-outline text-warning"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star-outline text-warning"></i></li>
                                                        </ul>
                                                    </a>
        
                                                    <a href="javascript:void(0)" class="d-inline-block me-3">
                                                        <ul class="list-unstyled mb-0 small">
                                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star-outline text-warning"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star-outline text-warning"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star-outline text-warning"></i></li>
                                                        </ul>
                                                    </a>
        
                                                    <a href="javascript:void(0)" class="d-inline-block me-3">
                                                        <ul class="list-unstyled mb-0 small">
                                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star-outline text-warning"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star-outline text-warning"></i></li>
                                                        </ul>
                                                    </a>
        
                                                    <a href="javascript:void(0)" class="d-inline-block me-3">
                                                        <ul class="list-unstyled mb-0 small">
                                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star-outline text-warning"></i></li>
                                                        </ul>
                                                    </a>
        
                                                    <a href="javascript:void(0)" class="d-inline-block">
                                                        <ul class="list-unstyled mb-0 small">
                                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                        </ul>
                                                    </a>
                                                </div>
        
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label"> Stars <span class="text-danger">*</span></label>
                                                        <select class="form-control" name="stars" data-placeholder="Select a stars" >
                                                           <option value="5">5</option>
                                                           <option value="4">4</option>
                                                           <option value="3">3</option>
                                                           <option value="2">2</option>
                                                           <option value="1">1</option>
                                                        </select>
                                                    </div>
                                                </div><!--end col-->
        
                                                <div class="col-md-12 mt-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">Your Review:</label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="message-circle" class="fea icon-sm icons"></i>
                                                            <textarea id="message" placeholder="Your Comment" rows="5" name="comment" class="form-control ps-5" required=""></textarea>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->
            
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Name <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                                            <input id="name" name="name" type="text" placeholder="Name" class="form-control ps-5" required="">
                                                        </div>
                                                    </div>
                                                </div><!--end col-->
            
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="mail" class="fea icon-sm icons"></i>
                                                            <input id="email" type="email" placeholder="Email" name="email" class="form-control ps-5" required="">
                                                        </div>
                                                    </div>
                                                </div><!--end col-->
            
                                                <div class="col-md-12">
                                                    <div class="send d-grid">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form><!--end form-->
                                    </div><!--end col-->
                                </div><!-- Row End -->
                            </div>
                        </div>

                        <div class="tab-pane fade show active" id="descriptions">
                            <div class="card-body">
                                <p>
                                    @php
                                        echo $product->description;
                                    @endphp
                                    
                                </p>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div><!-- Row end  -->  

    </div>
</div>    


<!-- Edit Expence-->
<div class="modal fade" id="expedit" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title  fw-bold" id="expeditLabel"> Edit Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{url("/vendor/product/editinfo")}}" >
        <div class="modal-body">
        
                {{ csrf_field() }}
            <div class="col-md-12 mt-4 mt-sm-0">

                <div class="row">

                    <input type="hidden" name="productid" value="{{$product->id}}" /> 

                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label"> Name <span class="text-danger">*</span></label>
                            <input value="{{$product->name}}" required type="text" class="form-control" name="productname" placeholder="Product Name">
                        </div>
                    </div><!--end col-->

                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label"> SKU <span class="text-danger">*</span></label>
                            <input value="{{$product->sku}}" required type="text" class="form-control" name="sku" placeholder="SKU">
                        </div>
                    </div><!--end col-->


                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label"> Short Description <span class="text-danger">*</span></label>
                            <textarea  id="summernote" class="form-control" name="shortdescription" required>{{$product->short_description}}</textarea>
                        </div>
                    </div><!--end col-->

                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label"> Description <span class="text-danger">*</span></label>
                            <textarea id="summernote" class="form-control" name="description" required>{{$product->description}}</textarea>
                        </div>
                    </div><!--end col-->

                    


                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label"> Price: </label>
                            <div class="input-group mb-3">
                                <span class="input-group-text border bg-transparent" id="basic-addon1">$</span>
                                <input value="{{$product->price}}" type="number" min="0" class="form-control"  name="price" placeholder="Price" aria-label="Price" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label"> Discounted Price: </label>
                            <div class="input-group mb-3">
                                <span class="input-group-text border bg-transparent" id="basic-addon1">$</span>
                                <input value="{{$product->discounted_price}}" type="number" min="0" class="form-control" name="discountedprice" placeholder="Discounted Price" aria-label="Price" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label"> Quantity <span class="text-danger">*</span></label>
                            <input value="{{$product->quantity}}" required type="number" class="form-control" name="quantity" placeholder="Quantity">
                        </div>
                    </div><!--end col-->

                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label"> Sort Order <span class="text-danger">*</span></label>
                            <input value="{{$product->sort_order}}" required type="number" class="form-control" name="sortorder" placeholder="Sort Order">
                        </div>
                    </div><!--end col-->

                    

                   

                   
                </div>

            </div>
       
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Done</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
    </div>
    </div>
</div>

@endsection