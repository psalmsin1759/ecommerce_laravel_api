@extends("master")
@section("body")


  <!-- Body: Body -->
  <div class="body d-flex py-3">  
    <div class="container-xxl"> 
        <div class="row align-items-center"> 
            <div class="border-0 mb-4"> 
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Orders List</h3>
                </div>
            </div>
        </div> <!-- Row end  -->

        <div class="row g-3 mb-3"> 
            <div class="col-md-12">
                <div class="card"> 
                    <div class="card-body"> 
                        <table id="myDataTable" class="table table-hover align-middle mb-0" style="width: 100%;">  
                            <thead>
                                <tr>
                                    <th >OrderID</th>
                                    <th >Order Status</th>
                                    <th >Total</th>
                                    <th >Payment Method</th>
                                    <th >Order Date</th>
                                    <th ></th>
                                </tr>
                            </thead>
                            <tbody>

                          @php $color = null; @endphp

                            @foreach($orders as $item)

                                @if ($item->status == "Pending")
                                    @php $color = "danger"; @endphp
                                @elseif ($item->status == "Shipped")
                                    @php $color = "warning"; @endphp
                                @elseif ($item->status == "Success")
                                    @php $color = "success"; @endphp
                                @else
                                    @php $color = "danger"; @endphp
                                @endif

                                <tr>
                                    <td><a href="{{url("order/" . $item->id)}}"><strong>#Order-{{$item->orderid}}</strong></a></td>
                                    <td><span class="badge bg-{{$color}}"> {{$item->status}}</span></td>
                                    <td>{{$item->total_price}}</td>
                                    <td>{{$item->payment_method}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td></td>
                                </tr>

                            @endforeach 
                                
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- Row end  -->
    </div>
</div>

@endsection