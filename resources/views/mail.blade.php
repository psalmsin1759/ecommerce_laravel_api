@extends("master")
@section("body")


 <!-- Body: Body -->
 <div class="body d-flex py-3">
    <div class="container-xxl">
        @include('flash-message')

    <form method="POST"  action="{{url("/vendor/mail/send")}}" >
        {{ csrf_field() }}
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Mail</h3>
                </div>
            </div>
        </div> <!-- Row end  -->  
   
            
        <div class="row g-3 mb-3">
        
          
            <div class="col-xl-12 col-lg-12">
                <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Send Mail</h6>
                    </div>
                    <div class="card-body">
                        
                            <div class="row g-3 align-items-center">
                                <div class="col-md-12">
                                    <label  class="form-label">From</label>
                                    <input required type="text" class="form-control" name="productname" value="" placeholder="From:" readonly >
                                </div>
                               
                                
                                <div class="col-md-12">
                                    <label for="to">To:</label>
                                    <select name="destination" id="destination" class="form-control" required>      
                                        <option value="" selected="selected">- Select -</option>    
                                        <option value="newsletter" >All Newsletter Subscriber</option>   
                                        <option value="allcustomer" >All Customer</option> 
                                        <option value="customer" >Customers</option> 
                                        <option value="specificemail" >Specific Email</option>                  
                                    </select>
                                </div>

                                <div id="pickcustomer" class="col-12">
                                    
                                        <label for="exampleInputEmail1">Pick Customer(s)</label>
                                        <select name="customers[]" class="select2" multiple="multiple" data-placeholder="Pick Customer" style="width: 100%;">
                                           {{--  @foreach($customers as $item)
                                                <option value="{{$item->email}}">{{$item->first_name}} {{$item->last_name}} </option>
                                            @endforeach --}}
                                                        
                                        </select>
                                   
                                </div>
            
                                <div id="specificemail" class="col-12">
                                   
                                        <label for="from">Email:</label>
                                        <input name="specificemail" class="form-control" placeholder="Enter Email Address:">
                                   
                                </div>
            
                                <div class="col-12">
                                    
                                        <label for="to">Subject:</label>
                                         <input class="form-control" name="subject" placeholder="Subject:" required>
                                   
                                </div>
            
            
                                <div class="col-12">
                                   
                                       
                                        <div id="editor" name="description">
                                            <h4>Enter Body Here</h4>
                                        </div>
                                   
                                </div>
            
                   
                
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope"></i> Send</button>
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