@php
$all_tags = App\Models\Product::groupBy('product_tag')
    ->select('product_tag')
    ->get();
@endphp


<!-- ============================================== PRODUCT TAGS ============================================== -->
<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">

        <div class="tag-list">

            @foreach ($all_tags as $tags)
                <a class="item active" title="Phone"
                    href="{{ url('product/tag/' . $tags->product_tag) }}">{{ str_replace(',', ' ', $tags->product_tag) }}</a>
            @endforeach
        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>
<!-- /.sidebar-widget -->
<!-- ============================================== PRODUCT TAGS : END ============================================== -->
