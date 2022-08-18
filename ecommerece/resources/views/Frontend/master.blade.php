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

    {{-- sweetwlert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
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
                                <label for="size">Select Size</label>
                                <select class="form-control" id="size" name="size">


                                </select>
                            </div>


                            <div class="form-group" id="colorArea">
                                <label for="color">Select Color</label>
                                <select class="form-control" id="color" name="color">


                                </select>
                            </div>

                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" class="form-control" id="quantity" value="1"
                                    min="1">
                            </div>

                            <input type="hidden" id="product_id">
                            <button type="submit" class="btn btn-primary mb-2" onclick="addToCart()">Add to
                                cart</button>

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

                    $('#product_id').val(id);
                    $('#quantity').val(1);


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
                        $('#available').text('Available')
                    } else {
                        $('#available').text('')
                        $('#stockout').text('')
                        $('#stockout').text('Stockout')
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
        //EndproductView() modal


        //Start Add To Cart Product
        function addToCart() {
            var productName = $('#productname').text(); //class="modal-title" id
            var id = $('#product_id').val(); //hidden field id.
            var color = $('#color option:selected').text(); //select color field id
            var size = $('#size option:selected').text(); //select size field id
            var quantity = $('#quantity').val(); //Quantity field id

            //Posting all the deatils
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    color: color,
                    size: size,
                    quantity: quantity,
                    productName: productName
                },
                url: "/addcart/data/store/" + id,
                success: function(data) {
                    miniCart();
                    $('#closeModal')
                        .click(); //This is for after pressing the Add To Cart button modal will closed
                    //console.log(data)


                    //Sweet Alert message after successfully added to the cart
                    const sweetAlert = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    if ($.isEmptyObject(data.error)) {
                        sweetAlert.fire({
                            type: 'success',
                            title: data
                                .success //success message will come from CartControler json return
                        })
                    } else {
                        sweetAlert.fire({
                            type: 'error',
                            title: data
                                .error
                        })
                    }
                    //End sweetalert message.

                }
            })


        }

        //End Add To Cart Product
    </script>

    <script type="text/javascript">
        function miniCart() {
            $.ajax({
                type: 'GET',
                url: '/product/mini/cart',
                dataType: 'json',
                success: function(response) {
                    //console.log(data)
                    //from cartSubTotal id comes from Frontend header_blade
                    $('span[id="cartSubTotal"]').text(response
                        .minicartTotal); // this is comes from AddToMiniCart method
                    $('#cartQty').text(response.minicartQty); // this is comes from AddToMiniCart method
                    var miniCart = ""
                    //this data.minicarts will comes from CartController AddToMiniCart method.
                    $.each(response.minicarts, function(key, value) {

                        //below src="/${value.options.image}" will come from CartController AddToCart method
                        //below ${value.name} will come from CartController AddToCart method
                        //below ${value.price} will come from CartController AddToCart method

                        miniCart += `<div class="cart-item product-summary">
                                    <div class="row">

                                            <div class="col-xs-4">
                                                <div class="image"> <a href="detail.html"><img
                                                            src="/${value.options.image}" alt=""></a>
                                                            
                                                </div>
                                            </div>
                                            <div class="col-xs-7">
                                                    <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                                                    <div class="price">${value.price} * ${value.qty}</div>
                                            </div>

                                            <div class="col-xs-1 action"> 
                                                <button type="submit" id="${value.rowId}" onClick="removeMiniCart(this.id)"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                    </div>
                                </div>
                                
                                <!-- /.cart-item -->
                                <div class="clearfix"></div>
                                <hr>`


                    });

                    $('#miniCart').html(miniCart);
                }
            })
        }
        miniCart();


        //Remove product from mini cart
        function removeMiniCart(rowId) {
            $.ajax({
                type: "GET",
                url: '/minicart/remove_product/' + rowId,
                dataType: 'json',
                success: function(data) {
                    miniCart(); //for without loading the page we want remove from the mini cart 

                    //Sweet Alert message after remove from the mini cart
                    const sweetAlert = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    if ($.isEmptyObject(data.error)) {
                        sweetAlert.fire({
                            type: 'success',
                            title: data
                                .success //success message will come from CartControler RemoveFromMiniCart method json return
                        })
                    } else {
                        sweetAlert.fire({
                            type: 'error',
                            title: data
                                .error
                        });
                    }
                    //End sweetalert message.
                }
            });
        }
    </script>

    <!--START WISHLIST  -->
    <script type="text/javascript">
        function addToWishlist(product_id) {
            $.ajax({
                type: "POST",
                url: '/addto/wishlist/' + product_id,
                dataType: 'json',


                success: function(data) {

                    //Sweet Alert message
                    const sweetAlert = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    if ($.isEmptyObject(data.error)) {
                        sweetAlert.fire({
                            type: 'success',
                            icon: 'success',
                            title: data
                                .success //success message will come from CartControler RemoveFromMiniCart method json return
                        })
                    } else {
                        sweetAlert.fire({
                            type: 'error',
                            icon: 'error',
                            title: data
                                .error
                        });
                    }
                    //End sweetalert message.

                }
            });
        }
    </script>
    <!--END WISHLIST  -->

    <!--START FOR LOADING ALL THE WISHLIST  -->

    <script type="text/javascript">
        function wishList() {
            $.ajax({
                type: 'GET',
                //here '/user is the middleware name'
                url: '/user/get/wishlist_product',
                dataType: 'json',
                success: function(response) {

                    var rows = ""
                    //this response will comes from WishController GetWishlistProduct method.
                    $.each(response, function(key, value) {
                        //Below product comes from Wishlist models 'product' method
                        rows += `<tr>
                                    <td class="col-md-2"><img src="/${value.product.product_thumb}" alt="imga"></td>
                                    <td class="col-md-7">
                                        <div class="product-name"><a href="#">${value.product.product_name}</a></div>

                                        <div class="price">
                                            ${value.product.discount_price == null
                                                ?`${value.product.selling_price}`
                                                :
                                                `${value.product.discount_price}<span>${value.product.selling_price}</span>`
                                            
                                            }                             
                                        </div>
                                    </td>
                                    <td class="col-md-2">
                                        <button class="btn btn-primary icon" type="button"
                                                            data-toggle="modal" data-target="#staticBackdrop"
                                                            id="${value.product_id}" onclick="productView(this.id)"
                                                            title="Add Cart">Add to Cart</button>
                                    </td>
                                    <td class="col-md-1 close-btn">
                                        <button type="submit" class="" id="${value.id}" onClick="RemoveFromWishlist(this.id)"><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>`
                        //${value.id} wishlist table id


                    });

                    $('#wishList').html(rows);
                }
            })
        }
        wishList();

        //Start remove product function from wishlist

        function RemoveFromWishlist(id) {
            $.ajax({
                type: "GET",
                //here '/user is the middleware name'
                url: '/user/wishlist/remove_product/' + id,
                dataType: 'json',
                success: function(data) {
                    wishList(); //for without loading the page we want remove from the wishlist

                    //Sweet Alert message after remove from the mini cart
                    const sweetAlert = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 2000
                    })
                    if ($.isEmptyObject(data.error)) {
                        sweetAlert.fire({
                            type: 'success',
                            icon: 'success',
                            title: data
                                .success //success message will come from CartControler RemoveFromMiniCart method json return
                        })
                    } else {
                        sweetAlert.fire({
                            type: 'error',
                            icon: 'error',
                            title: data
                                .error
                        });
                    }
                    //End sweetalert message.
                }
            });
        }
        //End Remove product from wishlist
    </script>

    <!--END FOR LOADING ALL THE WISHLIST PRODUCT  -->



    <!--START MY CART  -->

    <script type="text/javascript">
        function myCart() {
            $.ajax({
                type: 'GET',
                //here '/user is the middleware name' which is check whether the user is logged in not
                url: '/user/get/mycart_product',
                dataType: 'json',
                success: function(response) {

                    var rows = ""
                    //this response.mycarts will comes from MyCartPageController GetMyCartProduct method.
                    $.each(response.mycarts, function(key, value) {
                        //Below product comes from Wishlist models 'product' method
                        //And {options.image} comes from CartController 'AddToCart' method
                        //And {value.name} comes from CartController 'AddToCart' method
                        //And {value.price} comes from CartController 'AddToCart' method
                        rows += `<tr>
                                    <td class="col-md-2"><img src="/${value.options.image}" alt="imga" style="width:70px; height:70px;"></td>
                                    <td class="col-md-2">
                                        <div class="product-name"><a href="#">${value.name}</a></div>

                                        <div class="price">
                                            ${value.price}                             
                                        </div>
                                    </td>

                                    <td class="col-md-2">
                                        <strong>${value.options.color}</strong>
                                    </td>
                                    <br>
                                    <td class="col-md-2">
                                        ${value.options.size == null
                                            ? `<span>..</span>`
                                            :
                                            `<strong>${value.options.size}</strong>`
                                        }
                                    </td>

                                    <td class="col-md-2">
                                        <button type="submit" class="btn btn-primary btn-sm" id="${value.rowId}" onClick="CartIncrement(this.id)">+</button>
                                        <input type="text" value="${value.qty}" min="1" max="100" disabled="" style="width:30px; height:25px;">
                                        ${value.qty > 1
                                            ?`<button type="submit" class="btn btn-danger btn-sm" id="${value.rowId}" onClick="CartDecrement(this.id)">-</button>`
                                            :`<button type="submit" class="btn btn-danger btn-sm" disabled="">-</button>`
                                        }
                                    </td>

                                    <td class="col-md-2">
                                        <strong>${value.subtotal}</strong>
                                    </td>


                                    <td class="col-md-1 close-btn">
                                        <button type="submit" class="" id="${value.rowId}" onClick="RemoveFromMyCart(this.id)"><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>`
                        //${value.subtotal} bumbummn package which calculate the subtotal of the product automativcally
                        //${value.id} wishlist table id


                    });

                    $('#mycartPage').html(rows); //id from mycart_view page
                }
            })
        }
        myCart();

        //Start MyCart remove product function 

        function RemoveFromMyCart(id) {
            $.ajax({
                type: "GET",
                //here '/user is the middleware name'
                url: '/user/mycart/remove/' + id,
                dataType: 'json',
                success: function(data) {

                    myCart(); //for without loading the page we want remove from the cart
                    miniCart(); //for without loading the page we want remove from the minicart
                    calculatedCouponAmount();
                    $('#applyCouponField').show(); //This will show the coupon filed
                    $('#coupon_name').val('');

                    //Sweet Alert message after remove from the mini cart
                    const sweetAlert = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 2000
                    })
                    if ($.isEmptyObject(data.error)) {
                        sweetAlert.fire({
                            type: 'success',
                            icon: 'success',
                            title: data
                                .success //success message will come from CartControler RemoveFromMiniCart method json return
                        })
                    } else {
                        sweetAlert.fire({
                            type: 'error',
                            icon: 'error',
                            title: data
                                .error
                        });
                    }
                    //End sweetalert message.
                }
            });
        }
        //End Remove My Cart product


        //Start CartIncrement
        function CartIncrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/cart/increment/" + rowId,
                dataType: 'json',
                success: function(data) {
                    calculatedCouponAmount();
                    myCart();
                    miniCart();

                }
            });
        }
        //End CartIncrement

        //Start Cart Decrement
        function CartDecrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/cart/decrement/" + rowId,
                dataType: 'json',
                success: function(data) {
                    calculatedCouponAmount();
                    myCart();
                    miniCart();
                }
            });
        }
        //End Cart Decrement
    </script>

    <!--END MY CART -->


    <!--APPLY COUPON START -->
    <script type="text/javascript">
        function applyCoupon() {
            var coupon_name = $('#coupon_name').val(); //from master.blade
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    coupon_name: coupon_name
                },
                url: "{{ url('/applycoupon') }}",
                success: function(data) {
                    calculatedCouponAmount();
                    $('#applyCouponField').hide();

                    //Sweet Alert message after remove from the mini cart
                    const sweetAlert = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 2000
                    })
                    if ($.isEmptyObject(data.error)) {
                        sweetAlert.fire({
                            type: 'success',
                            icon: 'success',
                            title: data
                                .success //success message will come from CartControler RemoveFromMiniCart method json return
                        })
                    } else {
                        sweetAlert.fire({
                            type: 'error',
                            icon: 'error',
                            title: data
                                .error
                        });
                    }
                    //End sweetalert message.

                }

            })
        }

        //CALCULATED COUPON AMOUNT////
        function calculatedCouponAmount() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/calculated/coupon/amount') }}",
                dataType: 'json',
                success: function(data) {
                    //data.total comes from CartController CalculatingCouponAmount method.
                    //This block for without coupon
                    if (data.total) {
                        //thid id #couponAmount from mycart_view 
                        $('#couponAmount').html(
                            `<tr>
                                <th>
                                    <div class="cart-sub-total">
                                        Subtotal<span class="inner-left-md">${data.total}</span>
                                    </div>
                                    <div class="cart-grand-total">
                                        Grand Total<span class="inner-left-md">${data.total}</span>
                                    </div>
                                </th>
                            </tr>`

                        )


                    } else {
                        //This block for witho coupon
                        //data.subtotal comes from CartController CalculatingCouponAmount method.
                        $('#couponAmount').html(
                            `<tr>
                                <th>
                                    <div class="cart-sub-total">
                                        Subtotal:<span class="inner-left-md">${data.subtotal}</span>
                                    </div>

                                    <div class="cart-sub-total">
                                        Coupon name:<span class="inner-left-md">${data.coupon_name}</span>
                                        <button type="submit" onClick="removeCoupon()"><i class="fa fa-times"></i></button>
                                    </div>

                                    <div class="cart-sub-total">
                                        Coupon Discount:<span class="inner-left-md">${data.coupon_discount}</span>
                                    </div>

                                    <div class="cart-sub-total">
                                        Discount:<span class="inner-left-md">${data.discount_amount}</span>
                                    </div>

                                    <div class="cart-grand-total">
                                        Grand Total:<span class="inner-left-md">${data.total_amount}</span>
                                    </div>
                                </th>
                            </tr>`

                        )

                    }

                }
            });
        }

        calculatedCouponAmount();
    </script>

    <!--APPLY COUPON END -->

    <!--START REMOVE COUPON-->
    <script type="text/javascript">
        function removeCoupon() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/remove/coupon') }}",
                dataType: 'json',
                success: function(data) {
                    calculatedCouponAmount(); //for without loading the page coupon will remove.
                    $('#applyCouponField').show(); //This will show the coupon filed
                    $('#coupon_name').val(''); //after removing the coupon the coupon input field beacme empty.
                    //Sweet Alert message after remove from the mini cart
                    const sweetAlert = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 2000
                    })
                    if ($.isEmptyObject(data.error)) {
                        sweetAlert.fire({
                            type: 'success',
                            icon: 'success',
                            title: data
                                .success //success message will come from CartControler RemoveCoupon method json return
                        })
                    } else {
                        sweetAlert.fire({
                            type: 'error',
                            icon: 'error',
                            title: data
                                .error
                        });
                    }
                    //End sweetalert message.

                }
            });
        }
    </script>
    <!--END REMOVE COUPON-->


</body>

</html>
