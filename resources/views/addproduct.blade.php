@extends("master")
@section("body")


 <!-- Body: Body -->
 <div class="body d-flex py-3">
    <div class="container-xxl">
    <form method="POST" enctype="multipart/form-data"  action="{{url("/product/add")}}" >
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Products Add</h3>
                    <button type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">Save</button>
                </div>
            </div>
        </div> <!-- Row end  -->  
   
            {{ csrf_field() }}
        <div class="row g-3 mb-3">
        
            <div class="col-xl-4 col-lg-4">
                <div class="sticky-lg-top">
                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                            <h6 class="m-0 fw-bold">Pricing Info</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-12">
                                    <label  class="form-label">Product Price  </label>
                                    <input required type="number" class="form-control" name="price" placeholder="Price">
                                </div>
                                <div class="col-md-12">
                                    <label  class="form-label">Product Discount Price </label>
                                    <input required type="number" class="form-control" name="discountedprice" placeholder="Discounted Price" value="0">
                                </div>

                                <div class="col-md-12">
                                    <label  class="form-label">Product Cost Price</label>
                                    <input required type="number" class="form-control" name="costprice" placeholder="Cost Price" value="0">
                                </div>
                                

                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                            <h6 class="m-0 fw-bold">Inventory Info</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-12">
                                    <label  class="form-label">SKU</label>
                                    <input required type="text" class="form-control" name="sku" placeholder="SKU e.g SHIRT-WHITE-12">
                                </div>
                                <div class="col-md-12">
                                    <label  class="form-label">Total Stock Quantity</label>
                                    <input required type="number" class="form-control" name="quantity" placeholder="Quantity">
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                            <h6 class="m-0 fw-bold">Visibility Status</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" checked value="Selling">
                                <label class="form-check-label">
                                    Published
                                </label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="Not Selling">
                                <label class="form-check-label">
                                    Hidden
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                            <h6 class="m-0 fw-bold">Categories</h6>
                        </div>
                        <div class="card-body">
                            <label  class="form-label">Connect Product To Category(s)</label>
                            <select name="category[]" class="select2" multiple="multiple" data-placeholder="Choose Product Category(s)" style="width: 100%;" required>
                                @foreach($categories as $item)
                                    <option value="{{$item->id}}">{{$item->name}} </option>
                                @endforeach 
                            </select>
                        </div>
                    </div>

                  

                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                            <h6 class="m-0 fw-bold">Related Product(s) </h6>
                        </div>
                        <div class="card-body">
                            <label  class="form-label">Connect Product(s)</label>
                            <select name="related[]" class="select2" multiple="multiple" data-placeholder="Related Product(s)" style="width: 100%;">
                             @foreach($products as $item)
                                    <option value="{{$item->id}}">{{$item->name}} </option>
                                @endforeach 
                                
                            </select>
                        </div>
                    </div>

                    
                    
                   
                </div>
            </div>
            <div class="col-xl-8 col-lg-8">
                <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Basic information</h6>
                    </div>
                    <div class="card-body">
                        
                            <div class="row g-3 align-items-center">
                                <div class="col-md-6">
                                    <label  class="form-label">Name</label>
                                    <input required type="text" class="form-control" name="productname" placeholder="Product Name">
                                </div>
                                <div class="col-md-6">
                                    <label  class="form-label">Sort Order</label>
                                    <input required type="number" class="form-control" name="sortorder" placeholder="Sort Order" value="0">
                                </div>
                                
                                <div class="col-md-12">
                                    <label class="form-label"> Product Description</label>
                                    <textarea id="editor" name="description">
                                        <p>Enter Product Description Here</p>
                                    </textarea>
                                </div>

                               

                            </div>
                      
                    </div>
                </div>
                
                <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Images</h6>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row g-3 align-items-center">
                                <div class="col-md-12">
                                    <label class="form-label">Product Images</label>
                                    <small class="d-block text-muted mb-2">Select Product Image (1000x1500)</small>
                                    <input type="file"  name="imageproductimage" id="input-file-to-destroy" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000" required>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Additional Product Images (Optional)</label>
                                    <small class="d-block text-muted mb-2">Select Product Image (1000x1500)</small>
                                    <input type="file" name="imageproductimageone" id="input-file-to-destroy" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Additional Product Images (Optional)</label>
                                    <small class="d-block text-muted mb-2">Select Product Image (1000x1500)</small>
                                    <input type="file" name="imageproductimagetwo" id="input-file-to-destroy" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000">
                                </div>
                                

                                <div class="col-md-12">

                                    <div class="row">
                            
                                        <div class="col-lg-12 mt-4 mt-lg-0 pt-2 pt-lg-0">
                                               
                                                
                                                <div class="row">
                                                    <br/>
                                                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                                        <h6 class="mb-0 fw-bold ">Add Product Option(s)</h6>
                                                    </div>
                                                    <br/>
            
                                                    <input id="optionsj" name="options" type="hidden">
                                                   
                                                    
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label"> Product Option <span class="text-danger">*</span></label>
                
                                                            <div class="form-icon position-relative">
                                                                <input type="text" class="form-control" id="optionname" placeholder="Option Name e.g Size">
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->

                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label"> Option Value <span class="text-danger">*</span></label>
                
                                                            <div class="form-icon position-relative">
                                                                <input type="text" class="form-control" id="optionvalue" placeholder="Option Value e.g XL">
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->
            
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Quantity <span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                                <input type="number" class="form-control" id="optionquantity" placeholder="Quantity">
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->
            
                                                    <div class="col-lg-4">
                                                        <button id="addoption" type="button" class="btn btn-primary">Add</button><br/><br/>
                                                    </div>
                                                    
            
                                                    <table id="optiontable"  class="table display dataTable table-hover align-middle " style="width:100%">
                                                    
                                                        <thead>
                                                            <tr>
                                                              <th>Option</th>
                                                              <th>Value</th>
                                                              <th>Quantity</th>
                                                              <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                    
                    
                                                        </tbody>
                                                        <!--<tfoot>
                                                            <tr>
                                                                <th>Option</th>
                                                                <th>Quantity</th>
                                                            </tr>
                                                        </tfoot>-->
                    
                                                    </table>
                
                                                    
                                                </div><!--end row-->
                                           
                                        </div><!--end col-->

                                       

            
                                        
            
                                    </div><!--end row-->

                                </div>
                                
                                
                                
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
       
        </div><!-- Row end  --> 
    </form>
        
    </div>
</div> 

@endsection