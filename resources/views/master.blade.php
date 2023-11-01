
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Dashboard </title>
 {{--    <link rel="apple-touch-icon" sizes="180x180" href="{{asset("/assets/images/favicon/apple-touch-icon.png")}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset("/assets/images/favicon/favicon-32x32.png")}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset("/assets/images/favicon/favicon-16x16.png")}}">
        <link rel="manifest" href="{{asset("/assets/images/favicon/site.webmanifest")}}">
        <link rel="mask-icon" href="{{asset("/assets/images/favicon/safari-pinned-tab.svg")}}" color="#4566D8"> --}}
        <meta name="msapplication-TileColor" content="#4566D8">
        <meta name="theme-color" content="#ffffff">

    <!-- plugin css file  -->
    <link rel="stylesheet" href="{{asset("/dashboardassets/plugin/datatables/responsive.dataTables.min.css")}}">
    <link rel="stylesheet" href="{{asset("dashboardassets/plugin/datatables/dataTables.bootstrap5.min.css")}}">

    <link rel="stylesheet" href="{{asset("dashboardassets/plugin/multi-select/css/multi-select.css")}}"><!-- Multi Select Css -->
    <link rel="stylesheet" href="{{asset("dashboardassets/plugin/bootstrap-tagsinput/bootstrap-tagsinput.css")}}"><!-- Bootstrap Tagsinput Css -->
    <link rel="stylesheet" href="{{asset("dashboardassets/plugin/cropper/cropper.min.css")}}"><!--Cropperer Css -->   
    <link rel="stylesheet" href="{{asset("dashboardassets/plugin/dropify/dist/css/dropify.min.css")}}"/><!-- Dropify Css -->


      <!-- Select2 -->
      <link rel="stylesheet" href="{{asset("dashboardassets/css/select2.min.css")}}">

    <!-- project css file  -->
    <link rel="stylesheet" href="{{asset("dashboardassets/css/ebazar.style.min.css")}}">
</head>
<body>
    <div id="ebazar-layout" class="theme-blue">
        
        <!-- sidebar -->

        <div class="sidebar px-4 py-4 py-md-4 me-0">
            <div class="d-flex flex-column h-100">
                <a href="{{url("/index")}}" class="mb-0 brand-icon">
                    <span class="logo-icon">
                        <i class="bi bi-bag-check-fill fs-4"></i>
                    </span>
                    <span class="logo-text">Dashboard</span>
                </a>
                <!-- Menu: main ul -->
                <ul class="menu-list flex-grow-1 mt-3">
                    <li><a class="m-link active" href="{{url("/index")}}"><i class="icofont-home fs-5"></i> <span>Dashboard</span></a></li>
                    
                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#categories" href="#">
                            <i class="icofont-chart-flow fs-5"></i> <span>Categories</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="categories">
                                <li><a class="ms-link" href="{{url("/category")}}">Categories List</a></li>
                               {{--  <li><a class="ms-link" href="{{url("/subcategory")}}">Sub Categories</a></li> --}}
                            </ul>
                    </li>


                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#homepage" href="#">
                            <i class="icofont-ui-home fs-5"></i> <span>Home Page</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="homepage">
                                <li><a class="ms-link" href="{{url("/slider")}}">Slider </a></li>
                                <li><a class="ms-link" href="{{url("/banner")}}">Banner </a></li>
                                 <li><a class="ms-link" href="{{url("/featuredproduct")}}">Featured </a></li>
                               {{--  <li><a class="ms-link" href="{{url("/newin")}}">New In </a></li>
                               
                                <li><a class="ms-link" href="{{url("/bestseller")}}">Best Seller </a></li>
                                <li><a class="ms-link" href="{{url("/toprated")}}">Top Rated </a></li> --}}
                            </ul>
                    </li>
                    
                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-product" href="#">
                            <i class="icofont-truck-loaded fs-5"></i> <span>Products</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="menu-product">
                                <li><a class="ms-link" href="{{url("/product")}}">Product </a></li>
                                <li><a class="ms-link" href="{{url("/product/add")}}">Product Add</a></li>
                            </ul>
                    </li>
                    
                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-order" href="#">
                        <i class="icofont-notepad fs-5"></i> <span>Orders</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="menu-order">
                            <li><a class="ms-link" href="{{url("/order")}}">Orders List</a></li>
                        </ul>
                    </li>

                   {{--  <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-orderoffline" href="#">
                        <i class="icofont-building fs-5"></i> <span>Offline Sales</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="menu-orderoffline">
                            <li><a class="ms-link" href="{{url("/offline")}}">Offline</a></li>
                        </ul>
                    </li> --}}

                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#customers-info" href="#">
                        <i class="icofont-funky-man fs-5"></i> <span>Customers</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="customers-info">
                            <li><a class="ms-link" href="{{url("/customer")}}">Customers List</a></li>
                        </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-sale" href="#">
                        <i class="icofont-sale-discount fs-5"></i> <span>Sales Promotion</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="menu-sale">
                            <li><a class="ms-link" href="{{url("/coupon")}}">Coupons List</a></li>
                            <li><a class="ms-link" href="{{url("/mail")}}">Send Mail</a></li>
                            <li><a class="ms-link" href="{{url("/newsletter")}}">Newsletter Subscribers</a></li>
                        </ul>
                    </li>

                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-inventory" href="#">
                        <i class="icofont-chart-histogram fs-5"></i> <span>Inventory</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="menu-inventory">
                            <li><a class="ms-link" href="{{url("/stocklist")}}">Stock List</a></li>
                            {{-- <li><a class="ms-link" href="{{url("/purchase")}}">Purchase</a></li> --}}
                            <li><a class="ms-link" href="{{url("/returns")}}">Returns</a></li>
                        </ul>
                    </li>
                    {{-- <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Componentsone" href="#"><i
                                class="icofont-ui-calculator"></i> <span>Delivery Fee</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="menu-Componentsone">
                            <li><a class="ms-link" href="{{url("/delivery/country")}}">Set Fee By Country </a></li>
                            <li><a class="ms-link" href="{{url("/delivery/state")}}">Set Fee By State </a></li>
                            <li><a class="ms-link" href="{{url("/shippingestimate")}}">Calculate Shipping Estimate </a></li>
                        </ul>
                    </li> --}}
                   {{--  <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#blog" href="#">
                        <i class="icofont-blogger fs-5"></i> <span>Blog</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="blog">
                            <li><a class="ms-link" href="{{url("/blog")}}">Blog List</a></li>
                            <li><a class="ms-link" href="{{url("/blog/add")}}"> Blog Add</a></li>
                        </ul>
                    </li> --}}

                   {{--  <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#app" href="#">
                        <i class="icofont-credit-card fs-5"></i> <span>Payment</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="app">
                            <li><a class="ms-link" href="{{url("/paymentmethod")}}">Payment Method</a></li>
                            <li><a class="ms-link" href="{{url("/paymentgateway")}}"> Payment Gateway</a></li>
                        </ul>
                    </li> --}}

                 {{--    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#socials" href="#">
                        <i class="icofont-facebook fs-5"></i> <span>Facebook Shop</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="socials">
                            <li><a class="ms-link" href="{{url("/facebook")}}">Export Data</a></li>
                        </ul>
                    </li> --}}

                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#store" href="#">
                        <i class="icofont-settings-alt fs-5"></i> <span>Store</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="store">
                            <li><a class="ms-link" href="{{url("/details")}}">Details</a></li>
                            <li><a class="ms-link" href="{{url("/address")}}"> Store Address</a></li>
                            <li><a class="ms-link" href="{{url("/about")}}"> About/Privacy/Terms</a></li>
                            {{-- <li><a class="ms-link" href="{{url("/referral")}}"> Referral</a></li> --}}
                        </ul>
                    </li>

                   {{--  <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#subscribe" href="#">
                        <i class="icofont-credit-card fs-5"></i> <span>Subscription</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="subscribe">
                            <li><a class="ms-link" href="{{url("/payment")}}">Subscription</a></li>
                        </ul>
                    </li>
 --}}
                   {{--  <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#doc" href="#">
                        <i class="icofont-law-document fs-5"></i> <span>Documentation</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="doc">
                            <li><a class="ms-link" href="{{url("/documentation")}}">Documentation</a></li>
                        </ul>
                    </li> --}}

                   
                   
                </ul>
                <!-- Menu: menu collepce btn 
                <button type="button" class="btn btn-link sidebar-mini-btn text-light">
                    <span class="ms-2"><i class="icofont-bubble-right"></i></span>
                </button>-->
            </div>
        </div>

        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">

            <!-- Body: Header -->
            <div class="header">
                <nav class="navbar py-4">
                    <div class="container-xxl">

                        <!-- header rightbar icon -->
                        <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1">
                            
                            <div class="dropdown notifications">

                              {{--   <div class="row">

                                    <div class="col-lg-6 mt-3">
                                        Expiration:  <b>{{ \Carbon\Carbon::parse($store->next_expiry_date)->format("d M, Y")}}</b>
                
                                    </div>
                
                                    <div class="col-lg-6 mt-3">
                                        Plan:  <b>{{ $store->plan_name}}</b>
                
                
                                        @php
                                            $now = time(); // or your date as well
                                            $your_date = strtotime($store->next_expiry_date);
                                            $datediff = $now - $your_date;
                
                                            $diff =  round($datediff / (60 * 60 * 24));
                                            if ($diff >= -14){
                                                //echo $diff;
                                                $value = '/payment/';
                
                                                echo "<br/><a href='" . $value . "'  class='btn btn-sm btn-primary show-order'>Pay Now</a>";
                                            }
                                           
                                        @endphp 
                
                                    </div>
                
                                </div> --}}

                            </div>
                           
                            
                            <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center zindex-popover">
                                <div class="u-info me-2">
                                    <p class="mb-0 text-end line-height-sm "><span class="font-weight-bold">{{ Session::get('eszStorename')}}</span></p>
                                    <small>{{ Session::get('eszFullNames')}}</small>
                                </div>
                                <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static">
                                    <img class="avatar lg rounded-circle img-thumbnail" src="{{asset("dashboardassets/images/lg/avatar4.svg")}}" alt="profile">
                                </a>
                                <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                                    <div class="card border-0 w280">
                                        <div class="card-body pb-0">
                                            <div class="d-flex py-1">
                                                <img class="avatar rounded-circle" src="{{asset("dashboardassets/images/lg/avatar4.svg")}}" alt="profile">
                                                <div class="flex-fill ms-3">
                                                    <p class="mb-0"><span class="font-weight-bold">{{ Session::get('eszFullNames')}}</span></p>
                                                    <small class="">{{ Session::get('eszEmail')}}</small>
                                                </div>
                                            </div>
                                            
                                            <div><hr class="dropdown-divider border-dark"></div>
                                        </div>
                                        <div class="list-group m-2 ">
                                            <a href="{{url("/profile")}}" class="list-group-item list-group-item-action border-0 "><i class="icofont-ui-user fs-5 me-3"></i>Profile Page</a>
                                            <a href="{{url("/admin")}}" class="list-group-item list-group-item-action border-0 "><i class="icofont-file-text fs-5 me-3"></i>Admin</a>
                                            <a href="{{url("/logout")}}" class="list-group-item list-group-item-action border-0 "><i class="icofont-logout fs-5 me-3"></i>Signout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
        
                        <!-- menu toggler -->
                        <button class="navbar-toggler p-0 border-0 menu-toggle order-3" type="button" data-bs-toggle="collapse" data-bs-target="#mainHeader">
                            <span class="fa fa-bars"></span>
                        </button>
        
                        <!-- main menu Search-->
                        <div class="order-0 col-lg-4 col-md-4 col-sm-12 col-12 mb-3 mb-md-0 ">
                            <div class="input-group flex-nowrap input-group-lg">
                                <input type="search" class="form-control" placeholder="Search" aria-label="search" aria-describedby="addon-wrapping">
                                <button type="button" class="input-group-text" id="addon-wrapping"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
        
                    </div>
                </nav>
            </div>

            @section('body')
            @show
           
        
            
        </div>
    
    </div>

    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>

    <!-- Jquery Core Js -->
    <script src="{{asset("dashboardassets/bundles/libscripts.bundle.js")}}"></script>

    <script src="{{asset("dashboardassets/bundles/dataTables.bundle.js")}}"></script>  

    <!-- ChartJS -->
    <script src="{{asset("/dashboardassets/js/Chart.min.js")}}"></script>

     <!-- print -->
     <script src="{{asset("/dashboardassets/js/jQuery.print.min.js")}}"></script>

   

   
    <!--<script src="{{asset("dashboardassets/js/page/index.js")}}"></script>-->

    <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
    <script src="{{asset("dashboardassets/plugin/multi-select/js/jquery.multi-select.js")}}"></script>
    <script src="{{asset("dashboardassets/plugin/bootstrap-tagsinput/bootstrap-tagsinput.js")}}"></script>  
    <script src="{{asset("dashboardassets/plugin/cropper/cropper.min.js")}}"></script>
    <script src="{{asset("dashboardassets/bundles/dropify.bundle.js")}}"></script>
    <script src="{{asset("dashboardassets/bundles/dataTables.bundle.js")}}"></script>

    <!--<script src="{{asset("dashboardassets/js/dashboard.js")}}"></script>-->

     <script src="{{asset("dashboardassets/js/template.js")}}"></script>

    <!-- Select2 -->
    <script src="{{asset("/dashboardassets/js/select2.full.min.js")}}"></script>

    <script>
        // project data table
        $(document).ready(function() {

            $("#copyButton").click(function (e) {
                e.preventDefault();

                $("#referrallink").select();
                document.execCommand("copy"); 
                alert("Copied On clipboard")


            });

            $('.select2').select2();
           
            $('#myDataTable')
            .addClass( 'nowrap')
            .dataTable( {
                responsive: true,
                columnDefs: [
                    { targets: [-1, -3], className: 'dt-body-right' }
                ]
            });

            //select plan
            $('#plan').on('change', function() {
                //alert( this.value );
                var planID = this.value;

                if (planID == ""){

                    $('#amount').val("");
                    $('#expirydate').val("");

                }else{


                    $.ajax({
                        url: '{{ url('get-plan-amount') }}',
                        method: "post",
                        data: {_token: '{{ csrf_token() }}', id: planID},
                        success: function (response) {
                            //console.log(response);
                            $('#amount').val(response.price);
                            $('#expirydate').val(response.next);
                            
                        }
                    });

                }

                
            });

            // apply coupon
            $("#applycoupon").click(function (e) {
                    e.preventDefault();

                    var ele = $(this);

                    var couponcode = $("#couponcode").val();
                    var planID = $("#plan").val();

                    $.ajax({
                            url: '{{ url('apply-coupon') }}',
                            method: "POST",
                            data: {_token: '{{ csrf_token() }}', couponcode: couponcode, planid: planID},
                            success: function (response) {

                                $("#couponcode").val(" ");


                                var output = response.output;
                                var amount = response.amount


                                if (output == "success"){

                                    $("#amount").val(amount);
                                    $("#couponapplied").val("yes");


                                }else{
                                    $("#couponapplied").val("no");
                                    alert(output);
                                }
                               
                            }
                    });
                });

             //populate option table 
             $("#addoption").click(function (e) {
                        e.preventDefault();     
                        
                        //alert("click");

                        var optionname = $('#optionname').val();
                        var optionvalue = $('#optionvalue').val();
                        var optionquantity = $('#optionquantity').val();

                        if (optionquantity != ""){
                            var tr =  "<tr><td id='tdoptionname'>" + optionname + "</td><td id='tdoptionvalue'>" + optionvalue + "</td><td id='tdoptionquanity'>" + optionquantity + "</td><td><a  href='#'><i class='icofont-ui-delete text-danger'></i></a></td/</tr>";
                            $("#optiontable").append(tr);
                        }

                        $('#optionquantity').val("");
                        
                        getOptionsTableValue();

                        
                        
                });

                function getOptionsTableValue(){

                var result = [];

                var final = "";
                        
                        $('#optiontable tr').not(':first').each(function() {
                            var tdoptionname = $(this).find("#tdoptionname").html(); 
                            var tdoptionvalue = $(this).find("#tdoptionvalue").html(); 
                            var tdoptionquanity = $(this).find("#tdoptionquanity").html();   
                            
                            var output = tdoptionname + "-" + tdoptionvalue + ":" + tdoptionquanity;
                            final = final + output + ",";
                            result.push(output);  
                            
                        });

                        final = final.substring(0, final.length - 1);

                        console.log(final);
                        
                        
                        $("#optionsj").val(final);


                }

                $('#optiontable').on('click','td i',function(e){
                    e.preventDefault();
                    $(this).parents('tr').remove();

                    getOptionsTableValue();
                });


                 //edit category 
            $(document).on('click', ".edit-category", function() {
                    
                    $('#fid').val($(this).data('id'));
                    $('#editcategoryname').val($(this).data('name'));
                    $('#editsortorder').val($(this).data('sort'));
            
                });
                

                //edit option value table 
                $(document).on('click', ".edit-editoption", function() {
                    
                    $('#editoptionid').val($(this).data('id'));
                    $('#editoptionname').val($(this).data('name'));
                    $('#editoptionvalue').val($(this).data('value'));
                    $('#editquantity').val($(this).data('quantity'));
                    $('#editsortorder').val($(this).data('sort'));
                    $('#productid').val($(this).data('product'));
            
                });

                 // delete edit option
                 $(".delete-editoption").click(function (e) {
                    e.preventDefault();

                    var ele = $(this);

                    var id = ele.attr("data-id");
                    //console.log(id);


                    if(confirm("Are you sure")) {
                        $.ajax({
                            url: '{{ url('delete-options-edit') }}',
                            method: "POST",
                            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                            success: function (response) {
                                //console.log(response);
                                window.location.reload();
                            }
                        });
                    }
                });



                $("#editoptionselect").change(function(){
                    var selectedOption = $(this).children("option:selected").val();
                    loadEditOption(selectedOption);
                });

                function loadEditOption(optionid){

                    $.ajax({
                        url: '{{ url('load-option-value') }}',
                        method: "post",
                        data: {_token: '{{ csrf_token() }}', id: optionid},
                        success: function (response) {
                            console.log(response);
                            
                            $('#editoptionvalueselect').empty();
                            $('#editoptionvalueselect').append($('<option>', { 
                                    value: null,
                                    text : "-Select Value-" 
                            }));
                            
                            $.each(response.data, function (i, item) {

                                $('#editoptionvalueselect').append($('<option>', { 
                                    value: item.id,
                                    text : item.name 
                                }));
                            });
                        }
                    });
                }


                // delete edit option
                $(".delete-editrelated").click(function (e) {
                    e.preventDefault();

                    var ele = $(this);

                    var id = ele.attr("data-id");
                    //console.log(id);


                    if(confirm("Are you sure")) {
                        $.ajax({
                            url: '{{ url('delete-related-edit') }}',
                            method: "POST",
                            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                            success: function (response) {
                                //console.log(response);
                                window.location.reload();
                            }
                        });
                    }
                });

                // delete edit category
                $(".delete-editcategory").click(function (e) {
                    e.preventDefault();

                    var ele = $(this);

                    var id = ele.attr("data-id");
                    //console.log(id);


                    if(confirm("Are you sure")) {
                        $.ajax({
                            url: '{{ url('delete-category') }}',
                            method: "POST",
                            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                            success: function (response) {
                                //console.log(response);
                                window.location.reload();
                            }
                        });
                    }
                });

                // delete edit subcategory
                $(".delete-editsubcategory").click(function (e) {
                    e.preventDefault();

                    var ele = $(this);

                    var id = ele.attr("data-id");
                    //console.log(id);


                    if(confirm("Are you sure")) {
                        $.ajax({
                            url: '{{ url('delete-subcategory-edit') }}',
                            method: "POST",
                            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                            success: function (response) {
                                //console.log(response);
                                window.location.reload();
                            }
                        });
                    }
                });

                //delete product 
                $(document).on('click', ".delete-product", function() {
                    
                    $('#id').val($(this).data('id'));
                    $('#productname').val($(this).data('name'));
            
                });


                /*// delete product
                $(".delete-product").click(function (e) {
                    e.preventDefault();

                    var ele = $(this);

                    var id = ele.attr("data-id");
                    //console.log(id);


                    if(confirm("Are you sure")) {
                        $.ajax({
                            url: '{{ url('delete-vendor-product') }}',
                            method: "POST",
                            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                            success: function (response) {
                                console.log(response);
                                window.location.reload();
                            }
                        });
                    }
                });*/

           
            //delete category
                // delete filter
                $(".delete-category").click(function (e) {
                    e.preventDefault();

                    var ele = $(this);

                    var id = ele.attr("data-id");
                    //console.log(id);


                    if(confirm("Are you sure")) {
                        $.ajax({
                            url: '{{ url('delete-category') }}',
                            method: "POST",
                            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                            success: function (response) {
                                console.log(response);
                                window.location.reload();
                            }
                        });
                    }
                });

                //delete subcategory
                $(".delete-subcategory").click(function (e) {
                    e.preventDefault();

                    var ele = $(this);

                    var id = ele.attr("data-id");
                    //console.log(id);


                    if(confirm("Are you sure")) {
                        $.ajax({
                            url: '{{ url('delete-vendor-subcategory') }}',
                            method: "POST",
                            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                            success: function (response) {
                                console.log(response);
                                window.location.reload();
                            }
                        });
                    }
                });

                // delete slider
                $(".delete-slider").click(function (e) {
                    e.preventDefault();

                    var ele = $(this);

                    if(confirm("Are you sure")) {
                        $.ajax({
                            url: '{{ url('delete-slider') }}',
                            method: "POST",
                            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                            success: function (response) {
                                //console.log(response);
                                window.location.reload();
                            }
                        });
                    }
                });

                // delete banner
                $(".delete-banner").click(function (e) {
                    e.preventDefault();

                    var ele = $(this);

                    if(confirm("Are you sure")) {
                        $.ajax({
                            url: '{{ url('delete-banner') }}',
                            method: "POST",
                            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                            success: function (response) {
                                //console.log(response);
                                window.location.reload();
                            }
                        });
                    }
                });

                //edit slider 
                $(document).on('click', '.edit-slider', function() {
                    
                    $('#fid').val($(this).data('id'));
                    $('#edittitle').val($(this).data('title'));
                    $('#editsubtitle').val($(this).data('subtitle'));
                    $('#editsortorder').val($(this).data('sort'));
            
                });

                 //edit newin 
                 $(document).on('click', '.edit-home', function() {
                    
                    $('#fid').val($(this).data('id'));
                    $('#edittitle').val($(this).data('title'));
                    $('#editsortorder').val($(this).data('sort'));
            
                });

                // delete newin
                $(".delete-newin").click(function (e) {
                    e.preventDefault();

                    var ele = $(this);

                    var id = ele.attr("data-id");
                    console.log(id);
                    
                    if(confirm("Are you sure")) {
                        $.ajax({
                            url: '{{ url('delete-vendor-newin') }}',
                            method: "POST",
                            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                            success: function (response) {
                                console.log(response);
                                window.location.reload();
                            }
                        });
                    }
                });

                // delete featured
                $(".delete-featured").click(function (e) {
                    e.preventDefault();

                    var ele = $(this);

                    var id = ele.attr("data-id");
                    console.log(id);
                    
                    if(confirm("Are you sure")) {
                        $.ajax({
                            url: '{{ url('delete-featured') }}',
                            method: "POST",
                            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                            success: function (response) {
                                console.log(response);
                                window.location.reload();
                            }
                        });
                    }
                });

                // delete best seller
                $(".delete-bestseller").click(function (e) {
                    e.preventDefault();

                    var ele = $(this);

                    var id = ele.attr("data-id");
                    console.log(id);
                    
                    if(confirm("Are you sure")) {
                        $.ajax({
                            url: '{{ url('delete-vendor-bestseller') }}',
                            method: "POST",
                            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                            success: function (response) {
                                console.log(response);
                                window.location.reload();
                            }
                        });
                    }
                });

                // delete toprated
                $(".delete-toprated").click(function (e) {
                    e.preventDefault();

                    var ele = $(this);

                    var id = ele.attr("data-id");
                    console.log(id);
                    
                    if(confirm("Are you sure")) {
                        $.ajax({
                            url: '{{ url('delete-vendor-toprated') }}',
                            method: "POST",
                            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                            success: function (response) {
                                console.log(response);
                                window.location.reload();
                            }
                        });
                    }
                });


                ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );

                ClassicEditor
                .create( document.querySelector( '#editorabout' ) )
                .catch( error => {
                    console.error( error );
                } );

                ClassicEditor
                .create( document.querySelector( '#editorterms' ) )
                .catch( error => {
                    console.error( error );
                } );

                ClassicEditor
                .create( document.querySelector( '#editorpolicy' ) )
                .catch( error => {
                    console.error( error );
                } );

                ClassicEditor
                .create( document.querySelector( '#editorprivacy' ) )
                .catch( error => {
                    console.error( error );
                } );
                
                //Datatable
                $('#myCartTable')
                .addClass( 'nowrap' )
                .dataTable( {
                    responsive: true,
                    columnDefs: [
                        { targets: [-1, -3], className: 'dt-body-right' }
                    ]
                });
                $('.deleterow').on('click',function(){
                var tablename = $(this).closest('table').DataTable();  
                tablename
                        .row( $(this)
                        .parents('tr') )
                        .remove()
                        .draw();

                } );
            //Multiselect

            
            $('#optgroup').multiSelect({ selectableOptgroup: true });

            $('#amountdiv').hide();
            $('input[type=radio][name=type]').change(function() {
                if (this.value == 'percentage') {
                    $('#discountdiv').show();
                    $('#amountdiv').hide();
                }
                else if (this.value == 'fixedamount') {
                    $('#discountdiv').hide();
                    $('#amountdiv').show();
                }
            });

            // delete coupon
            $(".delete-coupon").click(function (e) {
                    e.preventDefault();

                    var ele = $(this);

                    var id = ele.attr("data-id");
                    
                    if(confirm("Are you sure")) {
                        $.ajax({
                            url: '{{ url('delete-vendor-coupon') }}',
                            method: "POST",
                            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                            success: function (response) {
                                console.log(response);
                                window.location.reload();
                            }
                        });
                    }
                });

                $('#pickcustomer').hide(); 
                $('#specificemail').hide(); 
                $('#destination').change(function(){
                    if($('#destination').val() == 'newsletter') {
                    $('#pickcustomer').hide(); 
                    $('#specificemail').hide();  
                    }else if($('#destination').val() == 'allcustomer') {
                    $('#pickcustomer').hide(); 
                    $('#specificemail').hide(); 
                    }else if($('#destination').val() == 'customer') {
                    $('#pickcustomer').show(); 
                    $('#specificemail').hide(); 
                    }else if($('#destination').val() == 'specificemail') {
                    $('#pickcustomer').hide(); 
                    $('#specificemail').show(); 
                    }
                    else {
                        $('#row_dim').hide(); 
                    } 
                });

                 //edit newsletter 
                 $(document).on('click', '.edit-subscription', function() {
                    
                    $('#subscriptionid').val($(this).data('id'));
                    $('#subscriptionemail').val($(this).data('name'));
            
                });

                //edit state 
                $(document).on('click', '.edit-statefee', function() {
                    
                    $('#stateid').val($(this).data('id'));
                    $('#editstate').val($(this).data('name'));
            
                });

                //edit city 
                $(document).on('click', '.edit-cityfee', function() {
                    
                    $('#fid').val($(this).data('id'));
                    $('#editcity').val($(this).data('name'));
            
                });

                $("#shippingcountry").change(function(){
                    var selectedCountry = $(this).children("option:selected").val();
                    //alert("You have selected the country - " + selectedCountry);
                    loadState(selectedCountry);
                });

                $("#shippingstate").change(function(){
                    var selectedState = $(this).children("option:selected").val();
                    //alert("You have selected the country - " + selectedCountry);
                    loadCity(selectedState);
                });

                loadState($("#shippingcountry").val());

                //loadCity($("#shippingstate").val());


                function loadState(countryid){

                    $.ajax({
                    url: '{{ url('shipping-vendor-getstate') }}',
                    method: "post",
                    data: {_token: '{{ csrf_token() }}', id: countryid},
                    success: function (response) {
                        //console.log(response);
                        
                        $('#shippingstate').empty();
                        $('#shippingstate').append($('<option>', { 
                                value: null,
                                text : "-Select State-" 
                        }));
                        
                        $.each(response.states, function (i, item) {

                            $('#shippingstate').append($('<option>', { 
                                value: item.id,
                                text : item.state_name 
                            }));
                        });
                    }
                    });
                }

                function loadCity(stateid){

                $.ajax({
                url: '{{ url('shipping-vendor-getcity') }}',
                method: "post",
                data: {_token: '{{ csrf_token() }}', id: stateid},
                success: function (response) {
                    console.log(response);
                    
                    $('#shippingcity').empty();
                        $('#shippingcity').append($('<option>', { 
                                value: null,
                                text : "-Select City-" 
                            }));
                    
                    $.each(response.city, function (i, item) {

                        $('#shippingcity').append($('<option>', { 
                            value: item.id,
                            text : item.city_name 
                        }));
                    });
                }
                });
                }


                // delete slider
                $(".delete-blog").click(function (e) {
                    e.preventDefault();

                    var ele = $(this);

                    if(confirm("Are you sure")) {
                        $.ajax({
                            url: '{{ url('delete-blog') }}',
                            method: "POST",
                            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                            success: function (response) {
                                //console.log(response);
                                window.location.reload();
                            }
                        });
                    }
                });

                //edit payment method
                $(document).on('click', '.edit-paymentmethod', function() {
                
                $('#paymentmethodid').val($(this).data('id'));
                $('#editpaymentname').val($(this).data('name'));
                //$('#editpaymentmethodstatus').val($(this).data('sort'));
        
                });


                //edit admin
                $(document).on('click', '.edit-admin', function() {
                
                $('#adminid').val($(this).data('id'));
                $('#editname').val($(this).data('name'));
                $('#editstatus').val($(this).data('status'));
                $('#editrole').val($(this).data('role'));
                //$('#editpaymentmethodstatus').val($(this).data('sort'));
        
                });

                // delete admin
                $(".delete-admin").click(function (e) {
                    e.preventDefault();

                    var ele = $(this);

                    
                    if(confirm("Are you sure")) {
                        $.ajax({
                            url: '{{ url('delete-vendor-admin') }}',
                            method: "POST",
                            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                            success: function (response) {
                                console.log(response);
                                window.location.reload();
                            }
                        });
                    }
                });


                  //edit filter details
                  $(document).on('click', '.edit-filterdetails', function() {
                            
                            $('#filterid').val($(this).data('id'));
                            $('#editfiltername').val($(this).data('name'));
                            $('#editfiltersortorder').val($(this).data('sort'));
                    
                });

                
                // delete filter
                $(".delete-filter").click(function (e) {
                    e.preventDefault();

                    var ele = $(this);

                    var id = ele.attr("data-id");
                    
                    if(confirm("Are you sure")) {
                        $.ajax({
                            url: '{{ url('vendor-filterdescription') }}',
                            method: "POST",
                            data: {_token: '{{ csrf_token() }}', id: id},
                            success: function (response) {
                                //console.log(response);
                                window.location.reload();
                            }
                        });
                    }
                });

                 //edit options
                 $(document).on('click', '.edit-options', function() {
                            
                            $('#optionid').val($(this).data('id'));
                            $('#editoptionname').val($(this).data('name'));
                            $('#editoptionsortorder').val($(this).data('sort'));
                    
                });

                // delete option
                $(".delete-option").click(function (e) {
                    e.preventDefault();

                    var ele = $(this);
                    var id = ele.attr("data-id");
                    
                    if(confirm("Are you sure")) {
                        $.ajax({
                            url: '{{ url('vendor-option') }}',
                            method: "POST",
                            data: {_token: '{{ csrf_token() }}', id: id},
                            success: function (response) {
                                //console.log(response);
                                window.location.reload();
                            }
                        });
                    }
                });

                // delete option
                $(".delete-optiondetails").click(function (e) {
                    e.preventDefault();

                    var ele = $(this);
                    var id = ele.attr("data-id");
                    
                    if(confirm("Are you sure")) {
                        $.ajax({
                            url: '{{ url('vendor-optiondetails') }}',
                            method: "POST",
                            data: {_token: '{{ csrf_token() }}', id: id},
                            success: function (response) {
                                //console.log(response);
                                window.location.reload();
                            }
                        });
                    }
                });


                // delete address
                $(".delete-address").click(function (e) {
                    e.preventDefault();

                    var ele = $(this);

                    var id = ele.attr("data-id");
                    console.log(id);
                    
                    if(confirm("Are you sure")) {
                        $.ajax({
                            url: '{{ url('delete-store-address') }}',
                            method: "POST",
                            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                            success: function (response) {
                                console.log(response);
                                window.location.reload();
                            }
                        });
                    }
                });

                //address
                $(document).on('click', '.edit-address', function() {
                
                $('#addressid').val($(this).data('id'));
                $('#street').val($(this).data('name'));
                $('#phone').val($(this).data('phone'));
                $('#email').val($(this).data('email'));
                $('#sortorder').val($(this).data('sort'));
                //$('#editpaymentmethodstatus').val($(this).data('sort'));
        
                });

                $("#printbutton").click(function (e) {

                    $.print("#printdiv");

                });

                $("#printreceiptbutton").click(function (e) {

                    $.print("#receiptdiv");

                });

                // delete option
                $(".delete-returns").click(function (e) {
                    e.preventDefault();

                    var ele = $(this);
                    var id = ele.attr("data-id");
                    
                    if(confirm("Are you sure")) {
                        $.ajax({
                            url: '{{ url('delete-returns') }}',
                            method: "POST",
                            data: {_token: '{{ csrf_token() }}', id: id},
                            success: function (response) {
                                //console.log(response);
                                window.location.reload();
                            }
                        });
                    }
                });

                // delete purchase
                $(".delete-purchase").click(function (e) {
                    e.preventDefault();

                    var ele = $(this);
                    var id = ele.attr("data-id");
                    
                    if(confirm("Are you sure")) {
                        $.ajax({
                            url: '{{ url('delete-purchase') }}',
                            method: "POST",
                            data: {_token: '{{ csrf_token() }}', id: id},
                            success: function (response) {
                                //console.log(response);
                                window.location.reload();
                            }
                        });
                    }
                });

                $('#productname').on('change', function() {
                    var productname = this.value;
                    var productID = productname.substring(productname.indexOf(')') + 1);
                    //console.log(productID);

                    $("#optiondiv").empty();

                    $.ajax({
                            url: '{{ url('product-options') }}',
                            method: "POST",
                            data: {_token: '{{ csrf_token() }}', id: productID},
                            success: function (response) {
                                //console.log(response);
                                var html = "";
                                

                                $.each(response.optioncount, function(key,value) {
                                    var optionName = value.optionName;
                                    
                                    var option = "";

                                    $.each(response.data, function(key,value) {
                                            if (value.optionName == optionName){
                                               var output =   "<option value='"  + optionName +  ":" + value.optionValueName + ":" + value.id + "'>" + value.optionValueName + " (" + value.quantity +  " in stock)</option>";
                                               
                                            }
                                            option = option + output;

                                    });

                                    

                                    html = "<div class='col-sm-6'>"+
                                        "<label class='form-label><span class='text-danger'>" + optionName + "</span></label>"+
                                       "<select class='form-select options'>" +

                                        option + 
                                        

                                        "</select></div>";

                                    
                                    $("#optiondiv").append(html);
                                    
                                }); 

                               
                                
                               

                               
                                
                            }
                        });

                });


                //populate product table 
             $("#addproduct").click(function (e) {
                        e.preventDefault();     
                        
                        //alert("click");

                        var optionname = $('#productname').val();
                        var optionquantity = $('#productquantity').val();

                        var options = "";

                        $("select.options").each(function() {
                            var opt = this.value;
                            options = options + opt + ";";
                            
                        });
                        if (options != ""){
                            options.slice(0,-1);
                            console.log("option: " +options);
                        }
                        

                        var allProductIDs = "";
                        var allQuantity = "";
                        var allOptions = "";
                        

                        var price = optionname.substring(optionname.indexOf("(") + 1, optionname.lastIndexOf(")"));
                        price = price.substring(1);

                        var subTotal = optionquantity * price;

                        var productID = optionname.substring(optionname.indexOf(')') + 1);
                        productID = productID + "-" + options;
                        console.log(productID);
                        
                        optionname = optionname.split(')')[0];
                        optionname = optionname + ")";

                        if (optionquantity != ""){

                            var tr =  "<tr><td><input type='hidden' id='tdproductid' value='" + productID + "' /></td><td id='mytdproductname'>" + optionname + "</td><td id='myoptions'>" + options + "</td><td id='mytdproductquanity'>" + optionquantity + "</td><td id='tdprice'>" + price + "</td><td id='tdsubtotal'>" + subTotal + "</td><td><a class='deleterowproduct' href='#'><i class='icofont-ui-delete text-danger'></i></a></td/</tr>";
                            $(".offlinetable").append(tr);

                            $('#productquantity').val("");
                            
                            getProductTableValue();

                        }

                        

                        
                        
                });

                function getProductTableValue(){

                var result = [];

                var final = "";

                var allProductIDs = "";
                var allQuantity = "";
                var allOptions = "";
                var allPrice = "";
                        
                        $('.offlinetable tr').not(':first').each(function() {
                            var tdproductId = $(this).find("#tdproductid").val(); 
                            var tdoptionname = $(this).find("#myoptions").html(); 
                            var tdoptionquanity = $(this).find("#mytdproductquanity").html(); 
                            var tdprice = $(this).find("#tdprice").html();
                            var tdproductid = $(this).find("#tdproductid").html();   
                            //var output = tdoptionname + ":" + tdoptionquanity;
                            final = final + tdproductid + ",";

                            allProductIDs = allProductIDs + tdproductId + ",";
                            allQuantity = allQuantity + tdoptionquanity + ",";
                            allOptions = allOptions + tdoptionname + ",";
                            allPrice = allPrice + tdprice + ",";

                            console.log("id " + allProductIDs);
                            console.log("qty " + allQuantity);
                            console.log("name " + allOptions);

                            result.push(final)
                            
                           
                            
                        });

                        //final = final.substring(0, final.length - 1);

                        
                        
                        //$("#optionsj").val(final);


                        var totalAmount = 0;

                        $('.offlinetable tr').not(':first').each(function() {

                            var tdsubtotal = $(this).find("#tdsubtotal").html();   

                            totalAmount = totalAmount + parseInt(tdsubtotal);

                        });

                        var deliverycost = $("#deliverycost").text();
                        totalAmount = totalAmount + parseInt(deliverycost);

                        $("#total").text(totalAmount);


                        $("#productids").val(allProductIDs);
                        $("#quantities").val(allQuantity);
                        $("#prices").val(allPrice);
                        $("#myproductoptions").val(allOptions);
                        $("#grandtotal").val(totalAmount);
                        $("#delivery").val(deliverycost);



                }

                /*$('.producttable').on('click','td i',function(e){
                    e.preventDefault();
                    $(this).parents('tr').remove();
                });*/

                $('.offlinetable').on('click','td i',function(e){
                    e.preventDefault();
                    $(this).parents('tr').remove();
                    getProductTableValue();
                });

                /*$('.deleterowproduct').on('click',function(){
                console.log("delete");
                var tablename = $(this).closest('.producttable').DataTable();  
                tablename
                        .row( $(this)
                        .parents('tr') )
                        .remove()
                        .draw();

                } );*/
                
                $("#deliverycontainer").hide();
                $('#deliverycheckbox').change(function(){
                    if(this.checked)
                        $('#deliverycontainer').fadeIn('slow');
                    else
                        $('#deliverycontainer').fadeOut('slow');

                });

                $('#shippingcity').on('change', function() {

                    var cityid = this.value;

                    $.ajax({
                            url: '{{ url('offline-shippingestimate') }}',
                            method: "POST",
                            data: {_token: '{{ csrf_token() }}', cityid: cityid},
                            success: function (response) {
                                console.log(response.fee);
                                var totalAmount = $("#total").text();
                                var grandtotal = parseInt(totalAmount) + response.fee;

                                $("#deliverycost").text(response.fee);

                                getProductTableValue();

                                
                               
                            }
                    });

                });

        });

        $(function() {
            $('.dropify').dropify();

            var drEvent = $('#dropify-event').dropify();
            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-dÃ©posez un fichier ici ou cliquez',
                    replace: 'Glissez-dÃ©posez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'DÃ©solÃ©, le fichier trop volumineux'
                }
            });

        });
    </script>
    
    
</body>
</html> 