@extends("master")
@section("body")


 <!-- Body: Body -->       
 <div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Store Address</h3>
                    <div class="col-auto d-flex w-sm-100">
                        <button type="button" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#expadd"><i class="icofont-plus-circle me-2 fs-6"></i>Add Address</button>
                    </div>
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row clearfix g-3">
            <div class="col-sm-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <table class="table table-hover align-middle mb-0" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center border-bottom p-3">Street</th>
                                    <th class="text-center border-bottom p-3">State</th>
                                    <th class="text-center border-bottom p-3">Country</th>
                                    <th class="text-center border-bottom p-3">Phone</th>
                                    <th class="text-center border-bottom p-3">Email</th>
                                    <th class="text-center border-bottom p-3">Sort Order</th>
                                    <th class="text-center border-bottom p-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                               {{--  @foreach($address as $item)

                                <tr>
                                    
                                    <td class="text-center p-3">{{$item->street}} </td>
                                    <td class="text-center p-3">{{$item->state}}</td>
                                    <td class="text-center p-3">{{$item->country}}</td>
                                    <td class="text-center p-3">{{$item->phone}}</td>
                                    <td class="text-center p-3">{{$item->email}}</td>
                                    <td class="text-center p-3">{{$item->sort_order}}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a type="button" class="btn btn-outline-secondary edit-address"  data-bs-toggle="modal" data-bs-target="#expedit" data-id="{{$item->id}}" data-name="{{$item->street}}" data-sort="{{$item->sort_order}}" data-phone="{{$item->phone}}" data-email="{{$item->email}}" ><i class="icofont-edit text-success"></i></a>
                                            <a type="button" class="btn btn-outline-secondary delete-address" data-id="{{$item->id}}"><i class="icofont-ui-delete text-danger"></i></a>
                                        </div>
                                    </td>
                                </tr>

                                @endforeach --}}

                               
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- Row End -->
    </div>
</div>



<!-- Add Expence-->
<div class="modal fade" id="expadd" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title  fw-bold" id="expaddLabel"> Add Address</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{url("/vendor/address/add")}}" >
        <div class="modal-body">
           
            <div class="deadline-form">
              
                    {{ csrf_field() }}

                    <div class="row g-3 mb-3">
                        <div class="col-sm-12">
                            <label for="exampleInputEmail1">Street</label>
                                <div class="form-icon position-relative">
                                    <input type="text" class="form-control" name="street" placeholder="Street">
                                </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="abc" class="form-label">Country</label>
                            <select class="form-select form-control"  name="country" id="shippingcountry">
                               {{--  @foreach ($country as $item)
                                    @if ($item->country_name == "Nigeria")
                                        <option selected="selected" value="{{$item->country_name}}">{{$item->country_name}}</option>                
                                    @else
                                        <option value="{{$item->country_name}}">{{$item->country_name}}</option>
                                    @endif
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="abc" class="form-label">State</label>
                            {{-- <select class="form-select form-control" name="state" id="state">
                                @foreach ($states as $item)
                                    <option value="{{$item->id}}">{{$item->state_name}}</option>
                                @endforeach
                            </select> --}}
                        </div>
                        <div class="col-sm-6">
                            <label for="abc" class="form-label">Phone(s)</label>
                            <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                        </div>
                        <div class="col-sm-6">
                            <label for="abc" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="col-sm-6">
                            <label for="abc" class="form-label">Sort Order</label>
                            <input type="number" class="form-control" name="sortorder" placeholder="Sort Order">
                        </div>
                        
                    </div>
                    
                    
                    
                   
               
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Done</button>
            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Add</button>
        </div>
    </form>
    </div>
    </div>
</div>

<!-- Edit Expence-->
<div class="modal fade" id="expedit" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title  fw-bold" id="expeditLabel"> Edit Address</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST"  action="{{url("/vendor/address/edit")}}" >
        <div class="modal-body">

                {{ csrf_field() }}
            <div class="deadline-form">
                
                <input type="hidden" class="form-control" name="addressid" id="addressid">
                    <div class="row g-3 mb-3">
                        <div class="col-sm-12">
                            <label for="exampleInputEmail1">Street</label>
                                <div class="form-icon position-relative">
                                    <input type="text" class="form-control" id="street" name="street" placeholder="Street">
                                </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="abc" class="form-label">Country</label>
                            <select class="form-select form-control"  name="country" id="shippingcountry">
                               {{--  @foreach ($country as $item)
                                    @if ($item->country_name == "Nigeria")
                                        <option selected="selected" value="{{$item->country_name}}">{{$item->country_name}}</option>                
                                    @else
                                        <option value="{{$item->country_name}}">{{$item->country_name}}</option>
                                    @endif
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="abc" class="form-label">State</label>
                            <select class="form-select form-control" name="state" id="state">
                               {{--  @foreach ($states as $item)
                                    <option value="{{$item->state_name}}">{{$item->state_name}}</option>
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="abc" class="form-label">Phone(s)</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number">
                        </div>
                        <div class="col-sm-6">
                            <label for="abc" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="col-sm-6">
                            <label for="abc" class="form-label">Sort Order</label>
                            <input type="number" class="form-control" name="sortorder" id="sortorder" placeholder="Sort Order">
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