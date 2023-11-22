@extends("master")
@section("body")


 <!-- Body: Body -->
 <div class="body d-flex py-3">
    <div class="container-xxl">
   
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Edit Product</h3>
                </div>
            </div>
        </div> <!-- Row end  -->  
   
           
        <div class="row g-3 mb-3">
        
           
            <div class="col-xl-12 col-lg-12">
                <div class="card mb-3">

                    @include('flash-message')

                    <form method="POST" enctype="multipart/form-data"  action="{{url("/product/edit")}}" name="form1" >
                        {{ csrf_field() }}

                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Basic information</h6>
                    </div>
                    <div class="card-body">
                        
                            <div class="row g-3 align-items-center">

                                <input type="hidden" name="productid" value="{{$product->id}}" />

                                <div class="col-md-6">
                                    <label  class="form-label">Name</label>
                                    <input required type="text" value="{{$product->name}}" class="form-control" name="productname" placeholder="Product Name">
                                </div>
                                <div class="col-md-6">
                                    <label  class="form-label">Sort Order</label>
                                    <input required type="number" value="{{$product->sort_order}}" class="form-control" name="sortorder" placeholder="Sort Order" value="0">
                                </div>
                                
                                <div class="col-md-12">
                                    <label class="form-label"> Product Description</label>
                                    <textarea id="editor" name="description">
                                        @php
                                            echo $product->description;
                                        @endphp
                                    </textarea>
                                </div>

                                <div class="col-md-6">
                                    <label  class="form-label">Quantity</label>
                                    <input required type="number" value="{{$product->quantity}}" class="form-control" name="quantity" placeholder="Sort Order" value="0">
                                </div>

                                <div class="col-md-6">
                                    <label  class="form-label">SKU</label>
                                    <input required type="text" value="{{$product->sku}}" class="form-control" name="sku" placeholder="Product Name">
                                </div>

                                <div class="col-md-6">
                                    <label  class="form-label">Price</label>
                                    <input required type="number" value="{{$product->price}}" class="form-control" name="price" placeholder="Sort Order" value="0">
                                </div>

                                <div class="col-md-6">
                                    <label  class="form-label">Discounted Price</label>
                                    <input required type="number" value="{{$product->discounted_price}}" class="form-control" name="discountedprice" placeholder="Discounted Price" value="0">
                                </div>

                                <div class="col-md-12">
                                    <label  class="form-label">Cost Price</label>
                                    <input required type="number" value="{{$product->cost_price}}" class="form-control" name="costprice" placeholder="Cost Price" value="0">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label"></label>
                                    <div class="form-check">
                                        @if ($product->new_arrival == 1)
                                            <input class="form-check-input" type="checkbox" checked name="new">
                                        @else
                                            <input class="form-check-input" type="checkbox"  name="new">
                                        @endif
                                        
                                        <label class="form-check-label">
                                            set as NEW
                                        </label>
                                    </div>
                                   
                                </div>
                               
                                <div class="col-md-6">

                                    @if (isset($productImages[0]))
                                        <img style="width: 200px; height: 300px" src="{{asset("images/product/" . $productImages[0]->path)}}" alt="product_small_img1" />
                   
                                    @endif
                                    
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Change Images</label>
                                    <small class="d-block text-muted mb-2">Select Product Image (800x950)</small>
                                    <input type="file"  name="imageproductimage" id="input-file-to-destroy" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" >
                                </div>

                                <div class="col-md-6">
                                    @if (isset($productImages[1]))
                                        <img style="width: 200px; height: 300px" src="{{asset("images/product/" . $productImages[1]->path)}}" alt="product_small_img1" />
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Change Additional Product Images (Optional)</label>
                                    <small class="d-block text-muted mb-2">Select Product Image (800x950)</small>
                                    <input type="file" name="imageproductimageone" id="input-file-to-destroy" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000">
                                </div>

                                <div class="col-md-6">
                                    @if (isset($productImages[2]))
                                    <img style="width: 200px; height: 300px" src="{{asset("images/product/" . $productImages[2]->path)}}" alt="product_small_img1" />
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Change Additional Product Images (Optional)</label>
                                    <small class="d-block text-muted mb-2">Select Product Image (800x950)</small>
                                    <input type="file" name="imageproductimagetwo" id="input-file-to-destroy" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000">
                                </div>

                                

                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </div>
                      
                    </div>
                    </form>
                </div>
                
                <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Product Options</h6>
                    </div>
                    <div class="card-body">

                        <table class="table table-hover align-middle mb-0" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Option Name</th>
                                    <th>Value</th>  
                                    <th>Quantity</th>  
                                    <th>Actions</th>  
                                </tr>
                            </thead>
                            <tbody>

                                 @foreach($productVariants as $item)

                                <tr>
                                    
                                    <td>
                                        {{$item->option}} 
                                    </td>
                                    <td>
                                        {{$item->value}} 
                                    </td>

                                    <td>
                                        {{$item->quantity}} 
                                    </td>

                                  
                                    
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a type="button" class="btn btn-outline-secondary edit-editoption"  data-bs-toggle="modal" data-bs-target="#expedit" data-id="{{$item->id}}" data-name="{{$item->option}}" data-value="{{$item->value}}" data-quantity="{{$item->quantity}}" data-product="{{$item->product_id}}"  ><i class="icofont-edit text-success"></i></a>
                                            <a type="button" class="btn btn-outline-secondary delete-editoption" data-id="{{$item->id}}"><i class="icofont-ui-delete text-danger"></i></a>
                                        </div>
                                    </td>
                                </tr>

                                @endforeach 

                               
                              
                            </tbody>
                        </table>
                        
                       
                            <div class="row g-3 align-items-center">

                                
                                

                                <div class="col-md-12">

                                    <div class="row">
                            
                                        <div class="col-lg-12 mt-4 mt-lg-0 pt-2 pt-lg-0">
                                             
                                            <form method="POST" action="{{url("/product/edit/optionadd")}}" name="form2">
                                                {{ csrf_field() }}
                                                
                                                <div class="row">
                                                    <br/>
                                                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                                        <h6 class="mb-0 fw-bold ">Add Product Option(s)</h6>
                                                    </div>
                                                    <br/>
            
                                                    <input  name="optionproductid" type="hidden" value="{{$product->id}}" >
                                                   
                                                    
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">  Product Option <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" required name="option" placeholder="Option">
                                                        </div>
                                                    </div><!--end col-->

                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">  Value <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" required name="value" placeholder="Value">
                                                        </div>
                                                    </div><!--end col-->
            
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Quantity <span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                                <input type="number" class="form-control" id="myoptionquantity" name="myoptionquantity" required ="Quantity">
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            
                                                        </div>
                                                    </div><!--end col-->
            
                                                    <div class="col-lg-4">
                                                        <button type="submit" class="btn btn-primary">Add Option</button>
                                                    </div>
                                                    
            
                                                  
                
                                                    
                                                </div><!--end row-->

                                            </form>
                                           
                                        </div><!--end col-->
            
                                        
            
                                    </div><!--end row-->

                                </div>
                                
                                
                                
                            </div>
                       
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Related Product</h6>
                    </div>
                    <div class="card-body">

                        <table class="table table-hover align-middle mb-0" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Actions</th>  
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($relatedProduct as $item)

                                <tr>
                                    
                                    <td>
                                       {{--  <img src="{{asset("images/products/" . $item->image_path)}}" class="avatar lg rounded me-2" alt="profile-image"> --}}<span> {{$item->related_product_name}} </span>
                                    </td>
                                                  
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                           <a type="button" class="btn btn-outline-secondary delete-editrelated" data-id="{{$item->relatedid}}"><i class="icofont-ui-delete text-danger"></i></a>
                                        </div>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                        
                       
                            <div class="row g-3 align-items-center">

                                
                                

                                <div class="col-md-12">

                                    <div class="row">
                            
                                        <div class="col-lg-12 mt-4 mt-lg-0 pt-2 pt-lg-0">
                                             
                                            <form method="POST" action="{{url("/product/editrelatedadd")}}" name="form2">
                                                {{ csrf_field() }}
                                                
                                                <div class="row">
                                                    <br/>
                                                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                                        <h6 class="mb-0 fw-bold ">Add Related Product(s)</h6>
                                                    </div>
                                                    <br/>
            
                                                    <input  name="rproductid" type="hidden" value="{{$product->id}}" >
                                                   
                                                    
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label"> Choose Product  <span class="text-danger">*</span></label>
                                                            <select name="related[]" class="select2" multiple="multiple" data-placeholder="Related Product(s)" style="width: 100%;">
                                                                @foreach($allProductExcept as $item)
                                                                    <option value="{{$item->id}}">{{$item->name}} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div><!--end col-->

                                                    
            
                                                    <div class="col-lg-4">
                                                        <button type="submit" class="btn btn-primary">Add Related Product</button>
                                                    </div>
                                                    
            
                                                  
                
                                                    
                                                </div><!--end row-->

                                            </form>
                                           
                                        </div><!--end col-->
            
                                        
            
                                    </div><!--end row-->

                                </div>
                                
                                
                                
                            </div>
                       
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Category</h6>
                    </div>
                    <div class="card-body">

                        <table class="table table-hover align-middle mb-0" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Actions</th>  
                                </tr>
                            </thead>
                            <tbody>

                                 @foreach($categoryProduct as $item)

                                <tr>
                                    
                                    <td>
                                        {{$item->name}}
                                    </td>

                                   
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                           <a type="button" class="btn btn-outline-secondary delete-editproductcategory" data-id="{{$item->cpid}}"><i class="icofont-ui-delete text-danger"></i></a>
                                        </div>
                                    </td>
                                </tr>

                                @endforeach

                               
                              
                            </tbody>
                        </table>
                        
                       
                            <div class="row g-3 align-items-center">

                                
                                

                                <div class="col-md-12">

                                    <div class="row">
                            
                                        <div class="col-lg-12 mt-4 mt-lg-0 pt-2 pt-lg-0">
                                             
                                            <form method="POST" action="{{url("/product/editcategoryadd")}}" name="form2">
                                                {{ csrf_field() }}
                                                
                                                <div class="row">
                                                    <br/>
                                                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                                        <h6 class="mb-0 fw-bold ">Add Category(s) To Product</h6>
                                                    </div>
                                                    <br/>
            
                                                    <input  name="rproductid" type="hidden" value="{{$product->id}}" >
                                                   
                                                    
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label"> Choose Category  <span class="text-danger">*</span></label>
                                                            <select name="category[]" class="select2" multiple="multiple" data-placeholder=" Category(s)" style="width: 100%;">
                                                                @foreach($category as $item)
                                                                    <option value="{{$item->id}}">{{$item->name}} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div><!--end col-->

                                                    
            
                                                    <div class="col-lg-4">
                                                        <button type="submit" class="btn btn-primary">Add Product To Category</button>
                                                    </div>
                                                    
            
                                                  
                
                                                    
                                                </div><!--end row-->

                                            </form>
                                           
                                        </div><!--end col-->
            
                                        
            
                                    </div><!--end row-->

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
        <form method="POST"  action="{{url("option/editquantity")}}" >
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="expeditLabel"> Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        
            <div class="modal-body">
            
                    {{ csrf_field() }}
                <div class="deadline-form">
                    
                    <input type="hidden" class="form-control" name="optionid" id="editoptionid">
                    <input type="hidden" class="form-control" name="productid" id="productid">
                        <div class="row g-3 mb-3">
                            <div class="col-sm-6">
                                <label for="depone" class="form-label">Option Name</label>
                                <input type="text" class="form-control" id="editoptionname" name="optionname" placeholder="Name" readonly>
                            </div>
                            <div class="col-sm-6">
                                <label for="abc" class="form-label">Option Value</label>
                                <input type="text" class="form-control" id="editoptionvalue" name="optionvalue" placeholder="Sort Order" readonly>
                            </div>
                            <div class="col-sm-12">
                                <label for="abc" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="editquantity" name="quantity" placeholder="Quantity">
                            </div>

                            
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