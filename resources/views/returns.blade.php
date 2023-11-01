@extends("master")
@section("body")


 <!-- Body: Body -->       
 <div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Returns</h3>
                    <div class="col-auto d-flex w-sm-100">
                        <button type="button" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#expadd"><i class="icofont-plus-circle me-2 fs-6"></i>Add Returns</button>
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
                                    <th>Item</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phone</th>
                                    <th>Return Date</th>
                                    <th>Purchase Date</th>
                                    <th>Amount</th>
                                    <th>Actions</th>  
                                </tr>
                            </thead>
                            <tbody>

                                {{-- @foreach($returns as $item)

                                <tr>
                                    
                                    <td>
                                        {{$item->productname}} 
                                    </td>
                                    <td>
                                        <img class="avatar rounded" src="{{asset("dashboardassets/images/xs/avatar4.svg")}}" alt="">
                                        <span class="fw-bold ms-1">{{$item->customer_name}} </span>
                                        
                                    </td>
                                    <td>
                                        {{$item->customer_phone}} 
                                    </td>
                                    <td>
                                        {{$item->return_date}} 
                                    </td>
                                    <td>
                                        {{$item->purchase_date}} 
                                    </td>
                                    <td>
                                        {{$item->amount}} 
                                    </td>
                                    
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <!--<a type="button" class="btn btn-outline-secondary edit-category"  data-bs-toggle="modal" data-bs-target="#expedit" data-id="{{$item->id}}" data-name="{{$item->customer_name}}" data-sort="{{$item->customer_phone}}" ><i class="icofont-edit text-success"></i></a>-->
                                            <a type="button" class="btn btn-outline-secondary delete-returns" data-id="{{$item->id}}"><i class="icofont-ui-delete text-danger"></i></a>
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
    <form method="POST"  action="{{url("/vendor/returns/add")}}" >
        {{ csrf_field() }}
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title  fw-bold" id="expaddLabel"> Add Return Item</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
            <div class="deadline-form">
                

                   
                    <div class="row g-3 mb-3">
                        <div class="col-sm-12">
                        <label for="abc11" class="form-label">Product</label>
                        <select name="product" class="form-control" data-placeholder="Select Product(s)">
                          {{--   @foreach($product as $item)
                                <option value="{{$item->id}}">{{$item->name}} </option>
                            @endforeach --}}
                              
                        </select>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-sm-6">
                            <label for="abc11" class="form-label">Customer Name</label>
                            <input type="text" class="form-control" name="name" id="abc11" placeholder="Name" required>
                        </div>

                        <div class="col-sm-6">
                            <label for="abc11" class="form-label">Customer Phone</label>
                            <input type="number" class="form-control" name="phone" id="abc11" placeholder="Phone" required>
                        </div>
                    </div>

                    

                    <div class="row g-3 mb-3">
                        <div class="col-sm-6">
                            <label for="abc" class="form-label">Purchase Date</label>
                            <input type="date" name="purchasedate" class="form-control w-100" id="abc" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="abc" class="form-label">Return Date</label>
                            <input type="date" name="returndate" class="form-control w-100" id="abc" required>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-sm-12">
                        <label for="abc11" class="form-label">Amount</label>
                        <input type="text" name="amount" class="form-control" id="abc11" placeholder="Amount" required>
                        </div>
                    </div>
                    
               
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Done</button>
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </div>
    </div>
</form>
</div>

<!-- Edit Expence-->
<div class="modal fade" id="expedit" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title  fw-bold" id="expeditLabel"> Edit Return Item</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="item1" class="form-label">Item</label>
                <input type="text" class="form-control" id="item1" value="Cloth"> 
            </div>
            <div class="deadline-form">
                <form>
                    <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <label  class="form-label">Customer</label>
                        <select class="form-select">
                            <option selected>Joan Dyer</option>
                            <option value="1">Ryan Randall</option>
                            <option value="2">Phil Glover</option>
                            <option value="3">Victor Rampling</option>
                            <option value="4">Sally Graham</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="abc1" class="form-label">Return Date</label>
                        <input type="date" class="form-control w-100" id="abc1" value="2021-03-12">
                    </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-sm-12">
                        <label for="abc11edit" class="form-label" >Total</label>
                        <input type="text" class="form-control" id="abc11edit" value="$1551">
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Done</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
    </div>
</div>

@endsection