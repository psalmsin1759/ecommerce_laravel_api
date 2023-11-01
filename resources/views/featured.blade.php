@extends("master")
@section("body")


 <!-- Body: Body -->
 <div class="body d-flex py-3">  
    <div class="container-xxl"> 
        <div class="row align-items-center"> 
            <div class="border-0 mb-4"> 
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Featured</h3>
                </div>
            </div>
        </div> <!-- Row end  -->

        <div class="row g-3 mb-3"> 

            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="sticky-lg-top">
                   
                    <div class="card mb-3">
                        <div class="categories">
                            <div class="filter-title">
                                <a class="title"  href="#category" role="button" >Add Product As Featured</a>
                            </div>

                            <div class="collapse show" id="category" >

                                <form method="POST"  action="{{url("featuredproduct/add")}}" >
                                    {{ csrf_field() }}

                                    <div class="row g-3 mb-3">
                                        <div class="col-sm-12">
                                            <label for="depone" class="form-label">Select Product</label>
                                            <select name="products[]" class="form-select select2" multiple="multiple" data-placeholder="Select Product(s)">
                                              @foreach($products as $item)
                                                    <option value="{{$item->id}}">{{$item->name}} </option>
                                                @endforeach 
                                                  
                                            </select>
                                        </div>
                                        
                                        <div class="col-12 mt-4">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>

                                </form>
                                
                                
                               
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="col-md-12">
                <div class="card"> 
                    <div class="card-body"> 
                        <table id="myDataTable" class="table table-hover align-middle mb-0" style="width: 100%;">  
                            <thead>
                                <tr>
                                    <th ></th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Sort Order</th>
                                </tr>
                            </thead>
                            <tbody>


                                 @foreach($featuredProducts as $item)

                                <tr>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a type="button" class="btn btn-outline-secondary delete-featured" data-id="{{$item->id}}"><i class="icofont-ui-delete text-danger"></i></a>
                                        </div>
                                    </td>
                                    @if($item->images->count() > 0)
                                    <td><img src="{{asset("images/product/" . $item->images->first()->path)}}" class="avatar lg rounded me-2" alt="profile-image"><span> {{$item->name}} </span></td>         
                                    @else
                                    <td><img src="{{asset("images/product/")}}" class="avatar lg rounded me-2" alt="profile-image"><span> {{$item->name}} </span></td>           
                                    @endif
                                    <td>
                                        {{$item->price}}
                               
                                        @php
                                            if ($item->discounted_price != 0){
                                                echo ' <del class="text-danger ms-2">' . 
                                            $item->discounted_price . '
                                                </del>'; 
                                            
                                            }
                                        @endphp
                                    </td>
                                    <td>{{$item->quantity}}</td>
                                    <td>
                                        {{$item->sort_order}}
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





@endsection