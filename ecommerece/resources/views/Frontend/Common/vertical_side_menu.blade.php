@php
$category = App\Models\Category::orderBy('category_name', 'ASC')->get();

@endphp




<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">

            @foreach ($category as $category)
                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon {{ $category->category_icon }}"
                            aria-hidden="true"></i>{{ $category->category_name }}</a>
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">
                                <!--Getting subcategory data -->
                                @php
                                    $subcategory = App\Models\SubCategory::where('category_id', $category->id)
                                        ->orderBy('subcategory_name', 'ASC')
                                        ->get();
                                @endphp

                                @foreach ($subcategory as $subcategory)
                                    <!-- <h2 class="title"></h2> -->


                                    <div class="col-sm-12 col-md-3">
                                        <a
                                            href="{{ url('subcategory/product/' . $subcategory->id . '/' . $subcategory->subcategory_slug) }}">
                                            <h2 class="title">
                                                {{ $subcategory->subcategory_name }}
                                            </h2>
                                        </a>

                                        <!--Getting sub subcategory data -->
                                        @php
                                            $sub_subcategory = App\Models\Sub_SubCategory::where('subcategory_id', $subcategory->id)
                                                ->orderBy('sub_subcategory_name', 'ASC')
                                                ->get();
                                        @endphp

                                        @foreach ($sub_subcategory as $sub_subcategory)
                                            <ul class="links list-unstyled">
                                                <li><a
                                                        href="{{ url('sub_subcategory/product/' . $sub_subcategory->id . '/' . $sub_subcategory->sub_subcategory_slug) }}">{{ $sub_subcategory->sub_subcategory_name }}</a>
                                                </li>

                                            </ul>
                                        @endforeach
                                    </div>
                                    <!-- /.col -->
                                @endforeach



                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                    </ul>
                    <!-- /.dropdown-menu -->
                </li>
                <!-- /.menu-item -->
            @endforeach

        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>
