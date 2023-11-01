@extends("master")
@section("body")


 <!-- Body: Body -->       
 <div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Newsletter</h3>
                    
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
                                    <th>Email</th>
                                    <th>Status</th>  
                                    <th>Subscription Date</th>  
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                {{-- @php
                                    $color = null;
                                    $value = null;
                                @endphp



                                @foreach($newsletter as $item)

                                @if ($item->status == 1)
                                    @php $color = "success";$value = "Enabled"; @endphp
                                @else
                                    @php $color = "danger";$value = "Disabled"; @endphp
                            
                                @endif


                                <tr>
                                    
                                    <td>
                                        {{$item->email}}
                                    </td>
                                    <td>
                                        <div class="badge bg-{{$color}} rounded px-3 py-1">
                                            {{$value}}
                                        </div>
                                    </td>
                                    <td class="text-center p-3">{{$item->created_at}}</td>
                                    
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a type="button" class="btn btn-outline-secondary edit-subscription"  data-bs-toggle="modal" data-bs-target="#expedit" data-id="{{$item->id}}" data-name="{{$item->email}}"  ><i class="icofont-edit text-success"></i></a>
                                           
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




<!-- Edit Expence-->
<div class="modal fade" id="expedit" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title  fw-bold" id="expeditLabel"> Enable/Disable</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST"  action="{{url("/vendor/newsletter")}}" >
            {{ csrf_field() }}
        <div class="modal-body">
           
              
            <div class="deadline-form">
                
                <input type="hidden" class="form-control" name="subscriptionid" id="subscriptionid">
                    <div class="row g-3 mb-3">
                        <div class="col-sm-12">
                            <label for="depone" class="form-label">Title</label>
                            <input type="text" class="form-control" id="subscriptionemail" name="subscriptionemail" placeholder="Name" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label for="exampleInputPassword1">Status</label>
                                <select name="subscriptionstatus"  class="form-select form-control">
                                    <option value="1"> Enable </option>
                                    <option value="2"> Disable</option>
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