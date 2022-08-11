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
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
        <br>
        <br>
        @include('Frontend.Body.brand')
    </div>




@endsection
