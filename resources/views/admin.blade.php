@extends("master")
@section("body")



 <!-- Body: Body -->       
 <div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Administrators</h3>
                    <div class="col-auto d-flex w-sm-100">
                        <button type="button" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#expadd"><i class="icofont-plus-circle me-2 fs-6"></i>Add Admin</button>
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
                                    <th>Name</th>
                                    <th>Email</th>  
                                    <th>Role</th>  
                                    <th>Status</th>  
                                    <th>Actions</th>  
                                </tr>
                            </thead>
                            <tbody>

                               {{--  @foreach($admin as $item)

                                <tr>
                                    
                                    <td >{{$item->full_names}} </td>
                                    <td>{{$item->email}} </td>
                                    <td >{{$item->role}} </td>
                                    <td >{{$item->status}}
                                    </td>
                                    
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a type="button" class="btn btn-outline-secondary edit-admin"  data-bs-toggle="modal" data-bs-target="#expedit" data-id="{{$item->id}}" data-name="{{$item->full_names}}" data-status="{{$item->status}}" data-role="{{$item->role}}"  data-created="{{$item->created_at}}" ><i class="icofont-edit text-success"></i></a>
                                            <a type="button" class="btn btn-outline-secondary delete-admin" data-id="{{$item->id}}"><i class="icofont-ui-delete text-danger"></i></a>
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
            <h5 class="modal-title  fw-bold" id="expaddLabel"> Add Administrator</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{url("/vendor/admin/add")}}" >

        <div class="modal-body">
           
            <div class="deadline-form">
              
                    {{ csrf_field() }}

                    <div class="row g-3 mb-3">
                        <div class="col-sm-12">
                            <label for="depone" class="form-label">Name</label>
                            <input  required type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                        <div class="col-sm-12">
                            <label for="abc" class="form-label">Email</label>
                            <input  required type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="col-sm-12">
                            <label for="abc" class="form-label">Password</label>
                            <input  required type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="col-sm-6">
                            <label for="abc" class="form-label">Role</label>
                            <select class="form-control form-select" name=role required>
                                <option value="Admin">Admin</option>
                                <option value="Content Manager">Content Manager</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="abc" class="form-label">Status</label>
                            <select class="form-control form-select" name=status required>
                                <option value="enable">Enable</option>
                                <option value="disable">Disable</option>
                            </select>
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
            <h5 class="modal-title  fw-bold" id="expeditLabel"> Admin</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST"  action="{{url("/vendor/admin/edit")}}" >
        <div class="modal-body">
           
                {{ csrf_field() }}
            <div class="deadline-form">
                
                <input type="hidden" class="form-control" name="adminid" id="adminid">

                    <div class="row g-3 mb-3">

                        <div class="col-sm-12">
                            <label for="depone" class="form-label">Name</label>
                            <input  type="text" class="form-control" id="editname" placeholder="Name" readonly>
                        </div>

                        <div class="col-sm-12">
                            <label for="depone" class="form-label">Status</label>
                            <select class="form-control form-select" name=status required>
                                <option value="enable">Enable</option>
                                <option value="disable">Disable</option>
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