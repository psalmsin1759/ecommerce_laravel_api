@extends("master")
@section("body")


 <!-- Body: Body -->       
 <div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Stock List</h3>
                    
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row clearfix g-3">
            <div class="col-sm-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <table id="myDataTable" class="table table-hover align-middle mb-0" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SKU</th>
                                    <th>Product</th>
                                    <th>Date Added</th>
                                    <th>In Stock</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>


                                {{-- @php $color = null; $value = null; @endphp

                                @foreach($product as $item)

                                @if ($item->quantity == 0)
                                    @php $color = "danger"; $value="Out of stock" @endphp
                                @else
                                    @php $color = "success"; $value="Sell" @endphp
                    
                                @endif

                                <tr>
                                    
                                    <td>
                                        <b>{{$item->sku}} </b>
                                    </td>
                                    <td><a href="{{url("vendor/product/" . $item->id)}}" class="fw-bold"><img src="{{asset("images/products/" . $item->base_image_path)}}" class="avatar lg rounded me-2" alt="profile-image"><span> {{$item->name}} </span></a></td>
                                    
                                    
                                    <td>
                                        {{$item->created_at}} 
                                    </td>
                                    <td>
                                        {{$item->quantity}} 
                                    </td>
                                    <td>
                                        {{ Session::get('eszCurrencySymbol')}} {{$item->price}} 
                                    </td>
                                    <td><span class="badge bg-{{$color}}"> {{$value}}</span></td>
                                    
                                    
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
    <form method="POST"  action="{{url("/vendor/purchase/add")}}" >
        {{ csrf_field() }}
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title  fw-bold" id="expaddLabel"> Add Purchase</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
            <div class="deadline-form">
                          
                    <div class="row g-3 mb-3">
                        <div class="col-sm-12">
                        <label for="abc11" class="form-label">Item</label>
                        <input type="text" class="form-control" name="item" id="abc11" placeholder="Item" required>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-sm-6">
                            <label for="abc11" class="form-label">Total</label>
                            <input type="number" class="form-control" name="total" id="abc11" placeholder="Total" required>
                        </div>

                        <div class="col-sm-6">
                            <label for="abc11" class="form-label">Paid</label>
                            <input type="number" class="form-control" name="paid" id="abc11" placeholder="Paid" required>
                        </div>

                    </div>

                    <div class="row g-3 mb-3">
                        
                        <div class="col-sm-6">
                            <label for="abc" class="form-label">Purchase Status</label>
                            <select name="purchasestatus" class="form-select">
                                <option value="1">Item Recived</option>
                                <option value="0">Not Recived</option>
                            </select>
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