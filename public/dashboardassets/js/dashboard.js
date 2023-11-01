$(document).ready(function() {

    $('.select2').select2();

    $('#myDataTable')
        .addClass('nowrap')
        .dataTable({
            responsive: true,
            columnDefs: [
                { targets: [-1, -3], className: 'dt-body-right' }
            ]
        });

    //populate option table 
    $("#addoption").click(function(e) {
        e.preventDefault();

        //alert("click");

        var optionname = $('#optionname').val();
        var optionquantity = $('#optionquantity').val();

        if (optionquantity != "") {
            var tr = "<tr><td id='tdoptionname'>" + optionname + "</td><td id='tdoptionquanity'>" + optionquantity + "</td><td><a  href='#'><i class='icofont-ui-delete text-danger'></i></a></td/</tr>";
            $("#optiontable").append(tr);
        }

        $('#optionquantity').val("");

        getOptionsTableValue();



    });

    function getOptionsTableValue() {

        var result = [];

        var final = "";

        $('#optiontable tr').not(':first').each(function() {
            var tdoptionname = $(this).find("#tdoptionname").html();
            var tdoptionquanity = $(this).find("#tdoptionquanity").html();

            var output = tdoptionname + ":" + tdoptionquanity;
            final = final + output + ",";
            result.push(output)



        });

        final = final.substring(0, final.length - 1);

        console.log(final);


        $("#optionsj").val(final);


    }

    $('#optiontable').on('click', 'td i', function(e) {
        e.preventDefault();
        $(this).parents('tr').remove();

        getOptionsTableValue();
    });



    //edit category 
    $(document).on('click', '.edit-category', function() {

        $('#fid').val($(this).data('id'));
        $('#editcategoryname').val($(this).data('name'));
        $('#editsortorder').val($(this).data('sort'));

    });


    //delete category
    // delete filter
    $(".delete-category").click(function(e) {
        e.preventDefault();

        var ele = $(this);

        var id = ele.attr("data-id");
        //console.log(id);


        if (confirm("Are you sure")) {
            $.ajax({
                url: '{{ url("delete-vendor-category") }}',
                method: "POST",
                data: { _token: '{{ csrf_token() }}', id: ele.attr("data-id") },
                success: function(response) {
                    console.log(response);
                    window.location.reload();
                }
            });
        }
    });

    //delete subcategory
    $(".delete-subcategory").click(function(e) {
        e.preventDefault();

        var ele = $(this);

        var id = ele.attr("data-id");
        //console.log(id);


        if (confirm("Are you sure")) {
            $.ajax({
                url: '{{ url("delete-vendor-subcategory") }}',
                method: "POST",
                data: { _token: '{{ csrf_token() }}', id: ele.attr("data-id") },
                success: function(response) {
                    console.log(response);
                    window.location.reload();
                }
            });
        }
    });

    // delete slider
    $(".delete-slider").click(function(e) {
        e.preventDefault();

        var ele = $(this);

        if (confirm("Are you sure")) {
            $.ajax({
                url: '{{ url("delete-vendor-slider") }}',
                method: "POST",
                data: { _token: '{{ csrf_token() }}', id: ele.attr("data-id") },
                success: function(response) {
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
    $(".delete-newin").click(function(e) {
        e.preventDefault();

        var ele = $(this);

        var id = ele.attr("data-id");
        console.log(id);

        if (confirm("Are you sure")) {
            $.ajax({
                url: '{{ url("delete-vendor-newin") }}',
                method: "POST",
                data: { _token: '{{ csrf_token() }}', id: ele.attr("data-id") },
                success: function(response) {
                    console.log(response);
                    window.location.reload();
                }
            });
        }
    });

    // delete featured
    $(".delete-featured").click(function(e) {
        e.preventDefault();

        var ele = $(this);

        var id = ele.attr("data-id");
        console.log(id);

        if (confirm("Are you sure")) {
            $.ajax({
                url: '{{ url("delete-vendor-featured") }}',
                method: "POST",
                data: { _token: '{{ csrf_token() }}', id: ele.attr("data-id") },
                success: function(response) {
                    console.log(response);
                    window.location.reload();
                }
            });
        }
    });

    // delete best seller
    $(".delete-bestseller").click(function(e) {
        e.preventDefault();

        var ele = $(this);

        var id = ele.attr("data-id");
        console.log(id);

        if (confirm("Are you sure")) {
            $.ajax({
                url: '{{ url("delete-vendor-bestseller") }}',
                method: "POST",
                data: { _token: '{{ csrf_token() }}', id: ele.attr("data-id") },
                success: function(response) {
                    console.log(response);
                    window.location.reload();
                }
            });
        }
    });

    // delete toprated
    $(".delete-toprated").click(function(e) {
        e.preventDefault();

        var ele = $(this);

        var id = ele.attr("data-id");
        console.log(id);

        if (confirm("Are you sure")) {
            $.ajax({
                url: '{{ url("delete-vendor-toprated") }}',
                method: "POST",
                data: { _token: '{{ csrf_token() }}', id: ele.attr("data-id") },
                success: function(response) {
                    console.log(response);
                    window.location.reload();
                }
            });
        }
    });


    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#editorabout'))
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#editorterms'))
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#editorpolicy'))
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#editorprivacy'))
        .catch(error => {
            console.error(error);
        });

    //Datatable
    $('#myCartTable')
        .addClass('nowrap')
        .dataTable({
            responsive: true,
            columnDefs: [
                { targets: [-1, -3], className: 'dt-body-right' }
            ]
        });
    $('.deleterow').on('click', function() {
        var tablename = $(this).closest('table').DataTable();
        tablename
            .row($(this)
                .parents('tr'))
            .remove()
            .draw();

    });
    //Multiselect


    $('#optgroup').multiSelect({ selectableOptgroup: true });

    $('#amountdiv').hide();
    $('input[type=radio][name=type]').change(function() {
        if (this.value == 'percentage') {
            $('#discountdiv').show();
            $('#amountdiv').hide();
        } else if (this.value == 'fixedamount') {
            $('#discountdiv').hide();
            $('#amountdiv').show();
        }
    });

    // delete coupon
    $(".delete-coupon").click(function(e) {
        e.preventDefault();

        var ele = $(this);

        var id = ele.attr("data-id");

        if (confirm("Are you sure")) {
            $.ajax({
                url: '{{ url("delete-vendor-coupon") }}',
                method: "POST",
                data: { _token: '{{ csrf_token() }}', id: ele.attr("data-id") },
                success: function(response) {
                    console.log(response);
                    window.location.reload();
                }
            });
        }
    });

    $('#pickcustomer').hide();
    $('#specificemail').hide();
    $('#destination').change(function() {
        if ($('#destination').val() == 'newsletter') {
            $('#pickcustomer').hide();
            $('#specificemail').hide();
        } else if ($('#destination').val() == 'allcustomer') {
            $('#pickcustomer').hide();
            $('#specificemail').hide();
        } else if ($('#destination').val() == 'customer') {
            $('#pickcustomer').show();
            $('#specificemail').hide();
        } else if ($('#destination').val() == 'specificemail') {
            $('#pickcustomer').hide();
            $('#specificemail').show();
        } else {
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

    $("#shippingcountry").change(function() {
        var selectedCountry = $(this).children("option:selected").val();
        //alert("You have selected the country - " + selectedCountry);
        loadState(selectedCountry);
    });

    $("#shippingstate").change(function() {
        var selectedState = $(this).children("option:selected").val();
        //alert("You have selected the country - " + selectedCountry);
        loadCity(selectedState);
    });

    loadState($("#shippingcountry").val());

    //loadCity($("#shippingstate").val());


    function loadState(countryid) {

        $.ajax({
            url: '{{ url("shipping-vendor-getstate") }}',
            method: "post",
            data: { _token: '{{ csrf_token() }}', id: countryid },
            success: function(response) {
                //console.log(response);

                $('#shippingstate').empty();
                $('#shippingstate').append($('<option>', {
                    value: null,
                    text: "-Select State-"
                }));

                $.each(response.states, function(i, item) {

                    $('#shippingstate').append($('<option>', {
                        value: item.id,
                        text: item.state_name
                    }));
                });
            }
        });
    }

    function loadCity(stateid) {

        $.ajax({
            url: '{{ url("shipping-vendor-getcity") }}',
            method: "post",
            data: { _token: '{{ csrf_token() }}', id: stateid },
            success: function(response) {
                console.log(response);

                $('#shippingcity').empty();
                $('#shippingcity').append($('<option>', {
                    value: null,
                    text: "-Select City-"
                }));

                $.each(response.city, function(i, item) {

                    $('#shippingcity').append($('<option>', {
                        value: item.id,
                        text: item.city_name
                    }));
                });
            }
        });
    }


    // delete slider
    $(".delete-blog").click(function(e) {
        e.preventDefault();

        var ele = $(this);

        if (confirm("Are you sure")) {
            $.ajax({
                url: '{{ url("delete-blog") }}',
                method: "POST",
                data: { _token: '{{ csrf_token() }}', id: ele.attr("data-id") },
                success: function(response) {
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
    $(".delete-admin").click(function(e) {
        e.preventDefault();

        var ele = $(this);


        if (confirm("Are you sure")) {
            $.ajax({
                url: '{{ url("delete-vendor-admin") }}',
                method: "POST",
                data: { _token: '{{ csrf_token() }}', id: ele.attr("data-id") },
                success: function(response) {
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
    $(".delete-filter").click(function(e) {
        e.preventDefault();

        var ele = $(this);

        var id = ele.attr("data-id");

        if (confirm("Are you sure")) {
            $.ajax({
                url: '{{ url("vendor-filterdescription") }}',
                method: "POST",
                data: { _token: '{{ csrf_token() }}', id: id },
                success: function(response) {
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
    $(".delete-option").click(function(e) {
        e.preventDefault();

        var ele = $(this);
        var id = ele.attr("data-id");

        if (confirm("Are you sure")) {
            $.ajax({
                url: '{{ url("vendor-option") }}',
                method: "POST",
                data: { _token: '{{ csrf_token() }}', id: id },
                success: function(response) {
                    //console.log(response);
                    window.location.reload();
                }
            });
        }
    });

    // delete option
    $(".delete-optiondetails").click(function(e) {
        e.preventDefault();

        var ele = $(this);
        var id = ele.attr("data-id");

        if (confirm("Are you sure")) {
            $.ajax({
                url: '{{ url("vendor-optiondetails") }}',
                method: "POST",
                data: { _token: '{{ csrf_token() }}', id: id },
                success: function(response) {
                    //console.log(response);
                    window.location.reload();
                }
            });
        }
    });


    // delete address
    $(".delete-address").click(function(e) {
        e.preventDefault();

        var ele = $(this);

        var id = ele.attr("data-id");
        console.log(id);

        if (confirm("Are you sure")) {
            $.ajax({
                url: '{{ url("delete-store-address") }}',
                method: "POST",
                data: { _token: '{{ csrf_token() }}', id: ele.attr("data-id") },
                success: function(response) {
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

    $("#printbutton").click(function(e) {

        $.print("#printdiv");

    });

    $("#printreceiptbutton").click(function(e) {

        $.print("#receiptdiv");

    });

    // delete option
    $(".delete-returns").click(function(e) {
        e.preventDefault();

        var ele = $(this);
        var id = ele.attr("data-id");

        if (confirm("Are you sure")) {
            $.ajax({
                url: '{{ url("delete-returns") }}',
                method: "POST",
                data: { _token: '{{ csrf_token() }}', id: id },
                success: function(response) {
                    //console.log(response);
                    window.location.reload();
                }
            });
        }
    });

    // delete purchase
    $(".delete-purchase").click(function(e) {
        e.preventDefault();

        var ele = $(this);
        var id = ele.attr("data-id");

        if (confirm("Are you sure")) {
            $.ajax({
                url: '{{ url("delete-purchase") }}',
                method: "POST",
                data: { _token: '{{ csrf_token() }}', id: id },
                success: function(response) {
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
            url: '{{ url("product-options") }}',
            method: "POST",
            data: { _token: '{{ csrf_token() }}', id: productID },
            success: function(response) {
                //console.log(response);
                var html = "";


                $.each(response.optioncount, function(key, value) {
                    var optionName = value.optionName;

                    var option = "";

                    $.each(response.data, function(key, value) {
                        if (value.optionName == optionName) {
                            var output = "<option value='" + optionName + ":" + value.optionValueName + "'>" + value.optionValueName + "</option>";

                        }
                        option = option + output;

                    });



                    html = "<div class='col-sm-6'>" +
                        "<label class='form-label><span class='text-danger'>" + optionName + "</span></label>" +
                        "<select class='form-select options'>" +

                        option +


                        "</select></div>";


                    $("#optiondiv").append(html);

                });







            }
        });

    });


    //populate product table 
    $("#addproduct").click(function(e) {
        e.preventDefault();

        //alert("click");

        var optionname = $('#productname').val();
        var optionquantity = $('#productquantity').val();

        var options = "";

        $("select.options").each(function() {
            var opt = this.value;
            options = options + opt + ";";

        });
        if (options != "") {
            options.slice(0, -1);
            console.log("option: " + options);
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

        if (optionquantity != "") {

            var tr = "<tr><td><input type='hidden' id='tdproductid' value='" + productID + "' /></td><td id='mytdproductname'>" + optionname + "</td><td id='myoptions'>" + options + "</td><td id='mytdproductquanity'>" + optionquantity + "</td><td id='tdprice'>" + price + "</td><td id='tdsubtotal'>" + subTotal + "</td><td><a class='deleterowproduct' href='#'><i class='icofont-ui-delete text-danger'></i></a></td/</tr>";
            $(".offlinetable").append(tr);

            $('#productquantity').val("");

            getProductTableValue();

        }





    });

    function getProductTableValue() {

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

    $('.offlinetable').on('click', 'td i', function(e) {
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
    $('#deliverycheckbox').change(function() {
        if (this.checked)
            $('#deliverycontainer').fadeIn('slow');
        else
            $('#deliverycontainer').fadeOut('slow');

    });

    $('#shippingcity').on('change', function() {

        var cityid = this.value;

        $.ajax({
            url: '{{ url("offline-shippingestimate") }}',
            method: "POST",
            data: { _token: '{{ csrf_token() }}', cityid: cityid },
            success: function(response) {
                console.log(response.fee);
                var totalAmount = $("#total").text();
                var grandtotal = parseInt(totalAmount) + response.fee;

                $("#deliverycost").text(response.fee);

                getProductTableValue();



            }
        });

    });

});