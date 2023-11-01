@extends("master")
@section("body")


 <!-- Body: Body -->
 <div class="body d-flex py-3">
    <div class="container-xxl">
        <form method="POST" enctype="multipart/form-data"  action="{{url("/vendor/store/edit")}}" >
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
                                    <input {{-- value="{{$store->store_name}}" --}} required type="text" class="form-control" name="storename" placeholder="Store Name">
                                </div>
                                <div class="col-md-12">
                                    <label  class="form-label">Address</label>
                                    <input {{-- value="{{$store->address}}"  --}} required type="text" class="form-control" name="address" placeholder="Address">
                                </div>
                                <div class="col-md-6">
                                    <label  class="form-label">State</label>
                                    <input {{--  value="{{$store->state}}" --}} required type="text" class="form-control" name="state" placeholder="State" readonly>
                                </div>

                                <div class="col-md-6">
                                    <label  class="form-label">Country</label>
                                    <input {{-- value="{{$store->country}}" --}} required type="text" class="form-control" name="state" placeholder="State" readonly>
                                </div>

                                <div class="col-md-6">
                                    <label  class="form-label">Email</label>
                                    <input {{-- value="{{$store->email}}" --}} required type="email" class="form-control" name="email" placeholder="Email">
                                </div>

                               

                                <div class="col-md-6">
                                    <label  class="form-label">Alternative Email</label>
                                    <input {{-- value="{{$store->second_email}}" --}}  type="email" class="form-control" name="alternativeemail" placeholder="Email">
                                </div>

                                <div class="col-md-6">
                                    <label  class="form-label">Phone Number</label>
                                    <input {{-- value="{{$store->phone_one}}" --}}  required type="number" class="form-control" name="phone1" placeholder="Phone Number">
                                </div>

                                <div class="col-md-6">
                                    <label  class="form-label">Alternate Phone (optional)</label>
                                    <input {{-- value="{{$store->phone_two}}"  --}} type="number" class="form-control" name="phone2" placeholder="Phone Number">
                                </div>

                                <div class="col-md-12">
                                    <label  class="form-label">Opening Times</label>
                                    <textarea   name="openingtimes" class="form-control" rows="3" placeholder="Opening Times">{{-- {{$store->opening_times}} --}}</textarea>
                                </div>

                                <div class="col-md-6">
                                    <label  class="form-label">Location Latitude (For Contact Page Google Map)</label>
                                    <input {{-- value="{{$store->geocode_latitude}}" --}} type="text" class="form-control" name="latitude" placeholder="Latitude">
                                </div>

                                <div class="col-md-6">
                                    <label  class="form-label">Location Longitude (For Contact Page Google Map)</label>
                                    <input {{-- value="{{$store->geocode_longitude}}" --}}  type="text" class="form-control" name="longitude" placeholder="Longitude">
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
                                    <label class="form-label">Select Store Logo ( 200 x 70)</label>
                                    <img {{-- src="{{url("https://www.nodirectmessage.com/images/logos/" . $store->logo_path)}}" --}} height="70" width="200"/><br/>
                                    <small class="d-block text-muted mb-2">Select Store Logo ( 200 x 70))</small>
                                    <input type="file"  name="storelogo" id="input-file-to-destroy" class="dropify"  data-max-file-size="2M" data-max-height="2000" >
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Select Footer Logo ( 200 x 70)</label>
                                    <img {{-- src="{{url("https://www.nodirectmessage.com/images/logos/" . $store->footer_logo_path)}}" --}} height="70" width="200"/><br/>
                                    <small class="d-block text-muted mb-2">Select Footer Logo ( 200 x 70)</small>
                                    <input type="file" name="footerlogo" id="input-file-to-destroy" class="dropify"  data-max-file-size="2M" data-max-height="2000">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Select Store Favicon (16 X 16)</label>
                                    <img {{-- src="{{url("https://www.nodirectmessage.com/images/logos/" . $store->favicon_path)}}" --}} height="30" width="30"/><br/>
                                    <small class="d-block text-muted mb-2">Select Product Image (800x950)</small>
                                    <input type="file" name="favicon" id="input-file-to-destroy" class="dropify" data-max-file-size="2M" data-max-height="2000">
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
                                    <input {{-- value="{{$store->meta_title}}" --}} type="text"   class="form-control" name="metatitle" placeholder="Meta Title">
                                </div>
                                <div class="col-md-12">
                                    <label  class="form-label">Meta Description </label>
                                    <textarea   name="metadescription" class="form-control" rows="3" placeholder="Meta Description">{{-- {{$store->meta_description}} --}}</textarea>
                                </div>

                                <div class="col-md-12">
                                    <label  class="form-label">Meta tag keywords</label>
                                    <textarea type="text" class="form-control" name="metatagkeywords" placeholder="Meta tag keywords">{{-- {{$store->meta_tag_keywords}} --}}</textarea>
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
                                    <input {{-- value="{{$store->facebook_link}}" --}} type="text"   class="form-control" name="facebook" placeholder="Facebook Link">
                                </div>
                                <div class="col-md-12">
                                    <label  class="form-label">Instagram Link</label>
                                    <input {{--  value="{{$store->instagram_link}}"  --}}  type="text" class="form-control" name="instagram" placeholder="Instagram Link">
                                </div>
                                <div class="col-md-12">
                                    <label  class="form-label">Twitter Link</label>
                                    <input {{-- value="{{$store->twitter_link}}" --}}   type="text" class="form-control" name="twitter" placeholder="Twitter Link">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                            <h6 class="m-0 fw-bold">Payment</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-12">
                                    <label  class="form-label">Flutterwave Key</label>
                                    <input {{-- value="{{$store->flutterwave_key}}" --}} type="text"   class="form-control secret" name="flutterwavekey" placeholder="Flutterwave Key">
                                </div>
                                <div class="col-md-12">
                                    <label  class="form-label">Flutterwave Secret</label>
                                    <input {{-- value="{{$store->flutterwave_secret}}"  --}}  type="text" class="form-control secret" name="flutterwavesecret" placeholder="Flutterwave Secret">
                                </div>
                                <div class="col-md-12">
                                    <label  class="form-label">Paystack Key</label>
                                    <input {{-- value="{{$store->paystack_key}}"  --}}  type="text" class="form-control secret" name="paystackkey" placeholder="Paystack Key">
                                </div>
                                <div class="col-md-12">
                                    <label  class="form-label">Paystack Secret</label>
                                    <input {{-- value="{{$store->paystack_secret}}"  --}}  type="text" class="form-control secret" name="paystacksecret" placeholder="Paystack Secret">
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