@extends('Frontend.master')
@section('main_content')
@section('title')
    Mycart view page
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Wishlist</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">

        <div class="row ">
            <div class="shopping-cart">
                <div class="shopping-cart-table ">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-romove item">Image</th>
                                    <th class="cart-product-name item">Name</th>
                                    <th class="cart-edit item">Color</th>
                                    <th class="cart-qty item">Size</th>
                                    <th class="cart-sub-total item">Quantity</th>
                                    <th class="cart-total last-item">Subtotal</th>
                                    <th class="cart-total last-item">Remove</th>

                                </tr>
                            </thead>
                            <tbody id="mycartPage">


                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-2 col-sm-12 estimate-ship-tax">
                </div>


                <div class="col-md-4 col-sm-12 estimate-ship-tax">
                    @if (Session::has('coupon'))
                    @else
                        <table class="table" id="applyCouponField">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="estimate-title">Discount Coupon</span>
                                        <p>Redeem your coupon if you have any</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control unicase-form-control text-input"
                                                placeholder="You Coupon.." id="coupon_name">
                                        </div>
                                        <div class="clearfix pull-right">
                                            <button type="submit" class="btn-upper btn btn-primary"
                                                onclick="applyCoupon()">APPLY
                                                COUPON</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    @endif
                </div><!-- /.estimate-ship-tax -->

                <div class="col-md-6 col-sm-12 cart-shopping-total">
                    <table class="table">
                        <thead id="couponAmount">

                        </thead><!-- /thead -->
                        <tbody>
                            <tr>
                                <td>
                                    <div class="cart-checkout-btn pull-right">
                                        <button type="submit" class="btn btn-primary checkout-btn">PROCCED TO
                                            CHEKOUT</button>

                                    </div>
                                </td>
                            </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                </div><!-- /.cart-shopping-total -->






            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
        <br>
        <br>
        @include('Frontend.Body.brand')
    </div>




@endsection
