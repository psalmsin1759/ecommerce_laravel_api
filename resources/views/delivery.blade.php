@extends("master")
@section("body")


 <!-- Body: Body -->       
 <div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Delivery Method</h3>
                    <div class="col-auto d-flex w-sm-100">
                        <button type="button" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#expadd"><i class="icofont-plus-circle me-2 fs-6"></i>Add</button>
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
                                <th class="text-center border-bottom p-3"></th>
                                <th class="text-center border-bottom p-3">Name</th>
                                <th class="text-center border-bottom p-3">Description</th>
                                <th class="text-center border-bottom p-3">Amount</th>
                               {{--  <th class="text-center border-bottom p-3">Status</th> --}}
                                <th class="text-center border-bottom p-3">Order</th>
                                <th class="text-center border-bottom p-3">Default</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php $color = null; @endphp
                                @php $statusText = null; @endphp

                                @php $defaultColor = null; @endphp
                                @php $defaultText = null; @endphp

                                 @foreach($deliveryMethods as $item)

                                <tr>

                                    @if ($item->status == 0)
                                        @php $color = "danger"; @endphp
                                        @php $statusText = "Disabled"; @endphp
                                    @elseif ($item->status == 1)
                                        @php $color = "success"; @endphp
                                        @php $statusText = "Active"; @endphp
                                    @endif

                                    @if ($item->default_method == 1)
                                        @php $defaultColor = "success"; @endphp
                                        @php $defaultText = "Yes"; @endphp
                                    @elseif ($item->default_method == 0)
                                        @php $defaultColor = "warning"; @endphp
                                        @php $defaultText = "No"; @endphp
                                    @endif
                                    
                                    
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <button type="button" class="btn btn-outline-secondary edit-delivery"  data-bs-toggle="modal" data-bs-target="#banneredit" data-id="{{$item->id}}" data-name="{{$item->name}}" data-description="{{$item->description}}"  data-amount="{{$item->amount}}" data-sort="{{$item->sort_order}}"  data-created="{{$item->created_at}}" ><i class="icofont-edit text-success"></i></button>
                                            <a type="button" class="btn btn-outline-secondary delete-delivery" data-id="{{$item->id}}"><i class="icofont-ui-delete text-danger"></i></a>
                                        </div>
                                    </td>

                                    <td class="text-center p-3">{{$item->name}} </td>
                                    <td class="text-center p-3">{{$item->description}} </td>
                                    <td class="text-center p-3">{{$item->amount}} </td>
                                    {{-- <td class="text-center p-3"><span class="p-2 badge bg-{{$color}}"> {{$statusText}}</span></td> --}}
                                    <td class="text-center p-3">{{$item->sort_order}} </td>
                                    <td class="text-center p-3"><span class="p-2 badge bg-{{$defaultColor}}"> {{$defaultText}}</span></td>
                                    
                                </tr>

                                @endforeach

                               
                              
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
            <h5 class="modal-title  fw-bold" id="expaddLabel"> Add</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" enctype="multipart/form-data"  action="{{url("/delivery/add")}}" >
        <div class="modal-body">
           
            <div class="deadline-form">
              
                    {{ csrf_field() }}

                <div class="row g-3 mb-3">
                    <div class="col-sm-12">
                            <label for="depone" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        <div class="col-sm-12">
                            <label for="abc" class="form-label">Description</label>
                            <input type="text" class="form-control" name="description" placeholder="Description">
                        </div>

                        <div class="col-sm-12">
                            <label for="taxtno" class="form-label">Amount</label>
                            <input type="number" class="form-control" name="amount" placeholder="Amount">
                        </div>
                        
                        <div class="col-sm-12">
                            <label for="taxtno" class="form-label">Sort Order</label>
                            <input type="number" class="form-control" name="sortorder" placeholder="Sort Order">
                        </div>
                        
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
<div class="modal fade" id="banneredit" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title  fw-bold" id="editsliderLabel"> Edit Delivery Method</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" enctype="multipart/form-data"   action="{{url("delivery/edit")}}" >
        <div class="modal-body">
           
                {{ csrf_field() }}
            <div class="deadline-form">
                
                <input type="hidden" class="form-control" name="editdeliveryid" id="fid">
                    <div class="row g-3 mb-3">
                        <div class="col-sm-12">
                            <label for="depone" class="form-label">Name</label>
                            <input type="text" class="form-control" id="editname" name="editname" placeholder="Name" required>
                        </div>

                        <div class="col-sm-12">
                            <label for="depone" class="form-label">Description</label>
                            <input type="text" class="form-control" id="editdescription" name="editdescription" placeholder="Description" required>
                        </div>

                        <div class="col-sm-12">
                            <label for="abc" class="form-label">Amount</label>
                            <input type="number" class="form-control" id="editamount" name="editamount" placeholder="Amount" required>
                        </div>

                        <div class="col-sm-12">
                            <label for="abc" class="form-label">Sort Order</label>
                            <input type="number" class="form-control" id="editsortorder" name="editsortorder" placeholder="Sort Order" required>
                        </div>

                        <div class="col-sm-12">
                            <label for="depone" class="form-label">Default</label>
                            <select name="default"  class="form-select" >
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                              </select>
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