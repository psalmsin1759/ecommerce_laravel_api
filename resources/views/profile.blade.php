@extends("master")
@section("body")


<!-- Body: Body -->
<div class="body d-flex py-3">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Admin Profile</h3>
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row g-3">
            @include('flash-message')
            <div class="col-xl-4 col-lg-5 col-md-12">
                <div class="card profile-card flex-column mb-3">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Profile</h6>
                    </div>
                    <div class="card-body d-flex profile-fulldeatil flex-column">
                        <div class="profile-block text-center w220 mx-auto">
                            <a href="#">
                                <img src="{{asset("/images/lg/avatar4.svg")}}" alt="" class="avatar xl rounded img-thumbnail shadow-sm">
                            </a>
                            <button class="btn btn-primary" style="position: absolute;top:15px;right: 15px;" data-bs-toggle="modal" data-bs-target="#editprofile"><i class="icofont-edit"></i></button>
                            
                        </div>
                        <div class="profile-info w-100">
                            <h6  class="mb-0 mt-2  fw-bold d-block fs-6 text-center">{{$admin->first_name}} {{$admin->last_name}}</h6>
                            <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted text-center mx-auto d-block">{{$admin->role}}</span>
                            <div class="row g-2 pt-2">
                                
                                <div class="col-xl-12">
                                    <div class="d-flex align-items-center">
                                        <i class="icofont-email"></i>
                                        <span class="ms-2">{{$admin->email}} </span>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-xl-8 col-lg-7 col-md-12">
                <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Profile Settings</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST"  action="{{url("/profile/edit")}}" >
                            {{ csrf_field() }}
                            <input name="id" type="hidden" value="{{$admin->id}}" />

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">First Name <span class="text-danger">*</span></label>
                                    <input name="firstname" id="first" value=" {{$admin->first_name}}" type="text" class="form-control" placeholder="First Name :">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                    <input name="lastname" id="first" value=" {{$admin->last_name}}" type="text" class="form-control" placeholder="Last Name :">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Email <span class="text-danger">*</span></label>
                                    <input name="email" value=" {{$admin->email}} " id="email" type="email" class="form-control" placeholder="Your email :" readonly>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Role <span class="text-danger">*</span></label>
                                    <input name="role" value=" {{$admin->role}} "  id="role" type="text" class="form-control" placeholder="Role :" readonly>
                                </div>
                            </div>
                            
                           
                           
                            
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary text-uppercase px-5">SAVE</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card auth-detailblock">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Change Password</h6>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#authchange"><i class="icofont-edit"></i></button>
                    </div>
                    <div class="card-body">
                        <form method="POST"  action="{{url("/profile/password")}}" >
                            {{ csrf_field() }}
                            <input name="id" type="hidden" value="{{$admin->id}}" />
                           
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">New password <span class="text-danger">*</span></label>
                                    <input type="password" name="newpassword" class="form-control ps-5" placeholder="New password" required="">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Re-type New password <span class="text-danger">*</span></label>
                                    <input type="password" name="confirmpassword" class="form-control ps-5" placeholder="Re-type New password" required="">
                                </div>
                            </div>
                            
                           
                           
                            
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary text-uppercase px-5">SAVE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection