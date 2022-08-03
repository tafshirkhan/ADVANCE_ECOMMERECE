<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
        rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Toastr-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    <!--Header -->
    @include('Frontend.Body.header')
    <!--End Header -->
    <!-- ============================================== HEADER : END ============================================== -->


    @yield('main_content')


    <!-- /#top-banner-and-menu -->

    <!-- ============================================================= FOOTER ============================================================= -->
    <!--Footer -->

    @include('Frontend.Body.footer')

    <!--End Footer -->
    <!-- ============================================================= FOOTER : END============================================================= -->

    <!-- For demo purposes – can be removed on production -->

    <!-- For demo purposes – can be removed on production : End -->

    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    <script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>

    {{-- toastr --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;

                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;

                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>


    <!-- Add to cart product Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><span id="productname"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-4">
                            <!-- Card for product image-->
                            <div class="card" style="width: 18rem;">
                                <img src="" class="card-img-top" alt=""
                                    style="height: 160px; width:160px;" id="productimage">

                            </div>
                        </div>


                        <div class="col-md-4">
                            <!-- List-group -->
                            <ul class="list-group">
                                <li class="list-group-item"><b>Price: </b> $<strong id="prosellprice"
                                        style="color: red"></strong>
                                    <del id="prodisprice">$</del>
                                </li>
                                <li class="list-group-item"><b>Code:</b> <strong
                                        id="productcode"style="color: red"></strong>
                                </li>
                                <li class="list-group-item"><b>Category:</b> <strong
                                        id="productcategory"style="color: red"></strong></li>
                                <li class="list-group-item"><b>Brand: </b> <strong id="productbrand"
                                        style="color: red"></strong>
                                </li>
                                <li class="list-group-item" style="color: rgb(76, 0, 255)">Stock:
                                    <span class="badge badge-pill badge-sueccess" id="available"
                                        style="background: rgb(2, 255, 171); color:rgb(37, 148, 192)"></span>
                                    <span class="badge badge-pill badge-danger" id="available"
                                        style="background: rgb(255, 2, 2); color:rgb(255, 255, 255)"></span>

                                </li>
                            </ul>
                        </div>

                        <div class="col-md-4">
                            <!-- Select option -->
                            <div class="form-group" id="sizeArea">
                                <label for="exampleFormControlSelect1">Select Size</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="size">


                                </select>
                            </div>


                            <div class="form-group" id="colorArea">
                                <label for="exampleFormControlSelect1">Select Color</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="color">


                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Quantity</label>
                                <input type="number" class="form-control" id="exampleFormControlInput1"
                                    value="1" min="1">
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Add to cart</button>

                        </div>
                    </div>

                </div>
                <!--End modal body -->
            </div>
        </div>
    </div>
    <!-- End Add to cart product Modal -->

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        //Start productView() modal
        function productView(id) {
            //alert(id)
            $.ajax({
                type: 'GET',
                url: '/product/view/modal/' + id,
                dataType: 'json',
                success: function(data) {
                    //console.log(data)
                    $('#productname').text(data.product.product_name);
                    //product comes from IndexController ProductViewAjax() method
                    $('#productprice').text(data.product.selling_price);
                    $('#productcode').text(data.product.product_code);
                    //for showing category name we create a realtionship in Product model see it first
                    $('#productcategory').text(data.product.category.category_name);
                    //for showing brand name we create a realtionship in Product model see it first

                    $('#productbrand').text(data.product.brand.brand_name);
                    $('#productimage').attr('src', '/' + data.product.product_thumb);

                    //product price information
                    if (data.product.discount_price == null) {
                        $('#prosellprice').text('');
                        $('#prodisprice').text('');
                        $('#prosellprice').text(data.product.selling_price);

                    } else {
                        $('#prosellprice').text(data.product.discount_price);
                        $('#prodisprice').text(data.product.selling_price);
                    }


                    //Product Stock information 
                    if (data.product.product_qty > 0) {
                        $('#available').text('')
                        $('#stockout').text('')
                        $('#available').text('available')
                    } else {
                        $('#available').text('')
                        $('#stockout').text('')
                        $('#stockout').text('stockout')
                    }

                    //product size
                    $('select[name="size"]').empty();
                    $.each(data.size, function(key, value) {
                        $('select[name="size"]').append('<option value="' + value + '">' + value +

                            '</option>')
                        //checking whether size is available or not if size is n available than it hide the select form
                        if (data.size == "") {
                            $('#sizeArea').hide();

                        } else {
                            $('#sizeArea').show();

                        }
                    });

                    //product color
                    $('select[name="color"]').empty();
                    $.each(data.color, function(key, value) {
                        $('select[name="color"]').append('<option value="' + value + '">' + value +
                            '</option>')
                        //checking whether color is available or not if color is not available than it will hide the select form
                        if (data.size == "") {
                            $('#colorArea').hide();

                        } else {
                            $('#colorArea').show();

                        }
                    })








                }
            })
        }
    </script>

</body>

</html>
