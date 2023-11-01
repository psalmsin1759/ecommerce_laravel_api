@extends("master")
@section("body")

 <!-- Body: Body -->       
 <div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Customers Information</h3>
                    <!--<div class="col-auto d-flex w-sm-100">
                        <button type="button" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#expadd"><i class="icofont-plus-circle me-2 fs-6"></i>Add Customers</button>
                    </div>-->
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
                                    
                                    <th>Customers</th> 
                                    <th>Register  Date</th>
                                    <th>Mail</th>
                                    <th>Phone</th> 
                                    <th>State</th> 
                                    <th>Country</th>
                                    <th>Actions</th>  
                                </tr>
                            </thead>
                            <tbody>

                             @foreach($customers as $item)

                                <tr>
                                    <td>
                                            <a href="{{url("/customer/" . $item->id)}}">
                                                <img class="avatar rounded" src="{{asset("dashboardassets/images/xs/avatar1.svg")}}" alt="">
                                                <span class="fw-bold ms-1">{{$item->first_name}} {{$item->last_name}}</span>
                                            </a>
                                    </td>
                                    <td>
                                        {{$item->created_at}}
                                    </td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->state}}</td>
                                    <td>{{$item->country}}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <button type="button" class="btn btn-outline-secondary"  data-bs-toggle="modal" data-bs-target="#expedit"><i class="icofont-edit text-success"></i></button>
                                            <button type="button" class="btn btn-outline-secondary deleterow"><i class="icofont-ui-delete text-danger"></i></button>
                                        </div>
                                    </td>
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



@endsection