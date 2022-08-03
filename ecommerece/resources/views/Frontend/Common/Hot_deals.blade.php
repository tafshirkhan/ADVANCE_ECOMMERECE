@php
$hotdeals = App\Models\Product::where('hot_deals', 1)
    ->where('discount_price', '!=', null)
    ->orderBy('id', 'DESC')
    ->limit(2)
    ->get();
@endphp

<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">Hot deals</h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

        @foreach ($hotdeals as $hotproduct)
            <div class="item">
                <div class="products">
                    <div class="hot-deal-wrapper">
                        <div class="image">
                            <a
                                href="{{ url('product/details_info/' . $hotproduct->id . '/' . $hotproduct->product_slug) }}">
                                <img src="{{ asset($hotproduct->product_thumb) }}" alt="">
                            </a>

                        </div>

                        @php
                            $amount = $hotproduct->selling_price - $hotproduct->discount_price;
                            $discount = ($amount / $hotproduct->selling_price) * 100;
                        @endphp

                        @if ($hotproduct->discount_price == null)
                            <div style="background-color: rgb(4, 82, 3)" class="sale-offer-tag">
                                <span>new</span>
                            </div>
                        @else
                            <div style="background-color: rgb(208, 6, 6)" class="sale-offer-tag">
                                <span>{{ round($discount) }}%<br>
                                    off</span>
                            </div>
                        @endif



                        <div class="timing-wrapper">
                            <div class="box-wrapper">
                                <div class="date box"> <span class="key">120</span>
                                    <span class="value">DAYS</span>
                                </div>
                            </div>
                            <div class="box-wrapper">
                                <div class="hour box"> <span class="key">20</span>
                                    <span class="value">HRS</span>
                                </div>
                            </div>
                            <div class="box-wrapper">
                                <div class="minutes box"> <span class="key">36</span>
                                    <span class="value">MINS</span>
                                </div>
                            </div>
                            <div class="box-wrapper hidden-md">
                                <div class="seconds box"> <span class="key">60</span>
                                    <span class="value">SEC</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.hot-deal-wrapper -->

                    <div class="product-info text-left m-t-20">
                        <h3 class="name"><a
                                href="{{ url('product/details_info/' . $hotproduct->id . '/' . $hotproduct->product_slug) }}">{{ $hotproduct->product_name }}</a>
                        </h3>
                        <div class="rating rateit-small"></div>

                        @if ($hotproduct->discount_price == null)
                            <div class="product-price"> <span class="price">
                                    {{ $hotproduct->selling_price }} </span>
                            </div>
                        @else
                            <div class="product-price"> <span class="price">
                                    {{ $hotproduct->discount_price }} </span>
                                <span class="price-before-discount">{{ $hotproduct->selling_price }}</span>
                            </div>
                        @endif


                        <!-- /.product-price -->

                    </div>
                    <!-- /.product-info -->

                    <div class="cart clearfix animate-effect">
                        <div class="action">
                            <div class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                    <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to
                                    cart</button>
                            </div>
                        </div>
                        <!-- /.action -->
                    </div>
                    <!-- /.cart -->
                </div>
            </div>
        @endforeach


    </div>
    <!-- /.sidebar-widget -->
</div>
