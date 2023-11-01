@extends("master")
@section("body")


 <!-- Body: Body -->
 <div class="body d-flex py-3">
    <div class="container-xxl">
        <form method="POST" enctype="multipart/form-data"  action="{{url("/vendor/about")}}" >
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

            <div class="col-xl-12 col-lg-12">
                <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold "></h6>
                    </div>
                    <div class="card-body">

                        @include('flash-message')
                        
                            <div class="row g-3 align-items-center">

                                <div class="col-md-12">
                                    <label  class="form-label">About Store</label>
                                    <textarea id="editorabout" name="about">
                                       {{--  {{$store->aboutus}} --}}
                                    </textarea>
                                </div>


                                <div class="col-md-12">
                                    <label  class="form-label">Terms and Conditions</label>
                                    <textarea id="editorterms" name="terms">
                                       {{--  {{$store->terms}} --}}
                                    </textarea>
                                </div>


                                <div class="col-md-12">
                                    <label  class="form-label">Return Policy</label>
                                    <textarea id="editorpolicy" name="policy">
                                      {{--   {{$store->policy}} --}}
                                    </textarea>
                                </div>


                                <div class="col-md-12">
                                    <label  class="form-label">Privacy</label>
                                    <textarea id="editorprivacy" name="privacy">
                                       {{--  {{$store->privacy}} --}}
                                    </textarea>
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