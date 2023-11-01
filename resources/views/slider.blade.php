@extends("master")
@section("body")


 <!-- Body: Body -->       
 <div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Slider</h3>
                    <div class="col-auto d-flex w-sm-100">
                        <button type="button" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#expadd"><i class="icofont-plus-circle me-2 fs-6"></i>Add Slider</button>
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
                                <th class="text-center border-bottom p-3">Title</th>
                                <th class="text-center border-bottom p-3">Sub Title</th>
                                <th class="text-center border-bottom p-3">Sort Order</th>
                                <th class="text-center border-bottom p-3"></th>
                                

                                </tr>
                            </thead>
                            <tbody>

                                 @foreach($sliders as $item)

                                <tr>
                                    
                                    
                                    

                                    <td> <img style="width: 249px; height: 150px" src="{{asset("images/slider/" . $item->image_path)}}" width="20px" height="20px"/>  </td>
                                    <td class="text-center p-3">{{$item->title}} </td>
                                    <td class="text-center p-3">{{$item->subtitle}} </td>
                                    <td class="text-center p-3">{{$item->sort_order}} </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a type="button" class="btn btn-outline-secondary edit-slider"  data-bs-toggle="modal" data-bs-target="#editslider" data-id="{{$item->id}}" data-title="{{$item->title}}" data-subtitle="{{$item->subtitle}}" data-sort="{{$item->sort_order}}"  data-created="{{$item->created_at}}" ><i class="icofont-edit text-success"></i></a>
                                            <a type="button" class="btn btn-outline-secondary delete-slider" data-id="{{$item->id}}"><i class="icofont-ui-delete text-danger"></i></a>
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



<!-- Add Expence-->
<div class="modal fade" id="expadd" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title  fw-bold" id="expaddLabel"> Add Slider</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" enctype="multipart/form-data"  action="{{url("/slider/add")}}" >
        <div class="modal-body">
           
            <div class="deadline-form">
              
                    {{ csrf_field() }}

                    <div class="row g-3 mb-3">
                        <div class="col-sm-12">
                            <label for="depone" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Title">
                        <div class="col-sm-12">
                            <label for="abc" class="form-label">Sub Title</label>
                            <input type="text" class="form-control" name="subtitle" placeholder="Sub Title">
                        </div>
                         {{-- <div class="col-sm-12">
                            <label for="taxtno" class="form-label">Category</label>
                            <select class="form-control form-select" name=categoryid>
                               @foreach($productCategory as $item)
                                    <option value="{{$item->id}}">{{$item->category_name}} </option>
                                @endforeach 
                                
                            </select>
                        </div> --}}
                        <div class="col-sm-12">
                            <label for="taxtno" class="form-label">Sort Order</label>
                            <input type="number" class="form-control" name="sortorder" placeholder="Sort Order">
                        </div>
                        <div class="col-sm-12">
                            <label for="taxtno" class="form-label">Select Banner Image (1024x400)</label>
                            <input  class="form-control" type="file" id="sliderimage" name="sliderimage" accept="image/*" >
                        </div>
                    </div>
                    
                    
                    
                   
               
            </div>
            </div> 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Add</button>
        </div>
    </form>
    </div>
    </div>
</div>

<!-- Edit Expence-->
<div class="modal fade" id="editslider" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title  fw-bold" id="editsliderLabel"> Edit Slider Info</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" enctype="multipart/form-data"  action="{{url("slider/edit")}}" >
        <div class="modal-body">
           
                {{ csrf_field() }}
            <div class="deadline-form">
                
                <input type="hidden" class="form-control" name="editsliderid" id="fid">
                    <div class="row g-3 mb-3">
                        <div class="col-sm-12">
                            <label for="depone" class="form-label">Title</label>
                            <input type="text" class="form-control" id="edittitle" name="edittitle" placeholder="Name" required>
                        </div>

                        <div class="col-sm-12">
                            <label for="depone" class="form-label">Sub Title</label>
                            <input type="text" class="form-control" id="editsubtitle" name="editsubtitle" placeholder="Name" required>
                        </div>

                        <div class="col-sm-12">
                            <label for="abc" class="form-label">Sort Order</label>
                            <input type="number" class="form-control" id="editsortorder" name="editsortorder" placeholder="Sort Order" required>
                        </div>

                        <div class="col-sm-12">
                            <label for="taxtno" class="form-label">Select Banner Image (825x550)</label>
                            <input  class="form-control" type="file" id="sliderimage" name="editsliderimage" accept="image/*" >
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