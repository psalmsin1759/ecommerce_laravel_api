@extends("master")
@section("body")


 <!-- Body: Body -->
 <div class="body d-flex py-3">
    <div class="container-xxl">
        <form method="POST" enctype="multipart/form-data"  action="{{url("/store/edit")}}" >
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Store Details</h3>
                    <button type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">Save</button>
                </div>
            </div>
        </div> <!-- Row end  -->  
   
            {{ csrf_field() }}
        <div class="row g-3 mb-3">

            <div class="col-xl-8 col-lg-8">
                <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Basic information</h6>
                    </div>
                    <div class="card-body">

                        @include('flash-message')
                        
                            <div class="row g-3 align-items-center">
                                <div class="col-md-12">
                                    <label  class="form-label">Store Name</label>
                                    <input  value="{{ $store ? $store->name : '' }}"  required type="text" class="form-control" name="name" placeholder="Store Name">
                                </div>
                                <div class="col-md-12">
                                    <label  class="form-label">Address</label>
                                    <input  value="{{$store ? $store->address : ''}}"  required type="text" class="form-control" name="address" placeholder="Address">
                                </div>
                                <div class="col-md-6">
                                    <label  class="form-label">State</label>
                                    <input   value="{{$store ? $store->state : ''}}"  required type="text" class="form-control" name="state" placeholder="State">
                                </div>

                                <div class="col-md-6">
                                    <label  class="form-label">Country</label>
                                    <input  value="{{$store ? $store->country : ''}}"  required type="text" class="form-control" name="country" placeholder="country" >
                                </div>

                                <div class="col-md-6">
                                    <label  class="form-label">Email (Receive order notification with this email)</label>
                                    <input value="{{$store ? $store->email : ''}}"  required type="email" class="form-control" name="email" placeholder="Email">
                                </div>

                               

                                <div class="col-md-6">
                                    <label  class="form-label">Phone Number</label>
                                    <input  value="{{$store ? $store->phone : ''}}"   required type="number" class="form-control" name="phone" placeholder="Phone Number">
                                </div>

                              

                                <div class="col-md-12">
                                    <label  class="form-label">Opening Times</label>
                                    <textarea   name="opening_times" class="form-control" rows="3" placeholder="Opening Times"> {{$store ? $store->opening_times : ''}} </textarea>
                                </div>

                                <div class="col-md-6">
                                    <label  class="form-label">Location Latitude (For Contact Page Google Map)</label>
                                    <input  value="{{$store ? $store->geocode_latitude : ''}}"  type="text" class="form-control" name="geocode_latitude" placeholder="Latitude">
                                </div>

                                <div class="col-md-6">
                                    <label  class="form-label">Location Longitude (For Contact Page Google Map)</label>
                                    <input  value="{{$store ? $store->geocode_longitude : ''}}"   type="text" class="form-control" name="geocode_longitude" placeholder="Longitude">
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
                                    <label class="form-label">Select Store Logo ( 160 x 60)</label>
                                    <img  src="{{ $store ? asset("images/store/" . $store->logo_path) : url("https://placehold.co/160x60.png") }}" height="60" width="160"/><br/>
                                    <small class="d-block text-muted mb-2">Select Store Logo ( 160 x 60))</small>
                                    <input type="file"  name="storelogo" id="input-file-to-destroy" class="dropify"  data-max-file-size="2M" data-max-height="2000" >
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Select Footer Logo ( 160 x 60)</label>
                                    <img  src="{{ $store ? asset("images/store/" . $store->footer_logo_path) : url("https://placehold.co/160x60.png") }}"  height="60" width="160"/><br/>
                                    <small class="d-block text-muted mb-2">Select Footer Logo ( 160 x 60)</small>
                                    <input type="file" name="footerlogo" id="input-file-to-destroy" class="dropify"  data-max-file-size="2M" data-max-height="2000">
                                </div>

                               
                                
                                

                                <div class="col-md-12">

                                    <div class="row">
                            
                                        
            
                                    </div><!--end row-->

                                </div>
                                
                                
                                
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        
            <div class="col-xl-4 col-lg-4">
                <div class="sticky-lg-top">
                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                            <h6 class="m-0 fw-bold">SEO</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-12">
                                    <label  class="form-label">Meta Title </label>
                                    <input  value="{{$store ? $store->meta_title : ''}}"  type="text"   class="form-control" name="meta_title" placeholder="Meta Title">
                                </div>
                                <div class="col-md-12">
                                    <label  class="form-label">Meta Description </label>
                                    <textarea   name="meta_description" class="form-control" rows="3" placeholder="Meta Description"> {{$store ? $store->meta_description : ''}} </textarea>
                                </div>

                                <div class="col-md-12">
                                    <label  class="form-label">Meta tag keywords</label>
                                    <textarea type="text" class="form-control" name="meta_tag_keywords" placeholder="Meta tag keywords"> {{$store ? $store->meta_tag_keywords : ''}} </textarea>
                                </div>
                                

                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                            <h6 class="m-0 fw-bold">Social</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-12">
                                    <label  class="form-label">Facebook Link</label>
                                    <input  value="{{$store ? $store->facebook_link : ''}}"  type="text"   class="form-control" name="facebook_link" placeholder="Facebook Link">
                                </div>
                                <div class="col-md-12">
                                    <label  class="form-label">Instagram Link</label>
                                    <input   value="{{$store ? $store->instagram_link : ''}}"    type="text" class="form-control" name="instagram_link" placeholder="Instagram Link">
                                </div>
                                <div class="col-md-12">
                                    <label  class="form-label">Twitter Link</label>
                                    <input  value="{{$store ? $store->twitter_link : ''}}"    type="text" class="form-control" name="twitter_link" placeholder="Twitter Link">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                            <h6 class="m-0 fw-bold">Payment Gateway</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-12">
                                    <label  class="form-label">Publishable Key</label>
                                    <input value="{{$store ? $store->payment_pub_key : ''}}"  type="text"   class="form-control secret" name="payment_pub_key" placeholder="Publishable Key">
                                </div>
                                <div class="col-md-12">
                                    <label  class="form-label">Secret Key</label>
                                    <input value="{{$store ? $store->payment_secret_key : ''}}"   type="text" class="form-control secret" name="payment_secret_key" placeholder="Secret Key">
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    
                   
                </div>
            </div>
           
       
        </div><!-- Row end  --> 
    </form>
        
    </div>
</div> 

@endsection