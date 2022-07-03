@extends('Admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Product</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('update.product') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <!-- 1st row -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Brand<span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <select name="brand_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select
                                                                Brand </option>

                                                            @foreach ($brand as $brand)
                                                                <option value="{{ $brand->id }}"
                                                                    {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                                                    {{ $brand->brand_name }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                        @error('brand_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>


                                            </div><!-- 1st col md 4 -->

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Category<span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select
                                                                Category </option>

                                                            @foreach ($category as $category)
                                                                <option value="{{ $category->id }}"
                                                                    {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                                    {{ $category->category_name }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                        @error('category_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div><!-- 2nd col md 4 -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Sub Category<span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <select name="subcategory_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select Sub
                                                                Category </option>
                                                            @foreach ($subcategory as $subcategory)
                                                                <option value="{{ $subcategory->id }}"
                                                                    {{ $subcategory->id == $product->subcategory_id ? 'selected' : '' }}>
                                                                    {{ $subcategory->subcategory_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('subcategory_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div><!-- 3rd col md 4 -->
                                        </div> <!-- end 1st row -->



                                        <div class="row">
                                            <!-- 2nd row -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Sub-Category List<span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <select name="sub_subcategory_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select
                                                            </option>
                                                            @foreach ($sub_subcategory as $sub_subcategory)
                                                                <option value="{{ $sub_subcategory->id }}"
                                                                    {{ $sub_subcategory->id == $product->sub_subcategory_id ? 'selected' : '' }}>
                                                                    {{ $sub_subcategory->sub_subcategory_name }}
                                                                </option>
                                                            @endforeach



                                                        </select>
                                                        @error('sub_subcategory_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>


                                            </div><!-- 1st col md 4 -->

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Product <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name" class="form-control"
                                                            value="{{ $product->product_name }}">
                                                        @error('product_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div><!-- 2nd col md 4 -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Code <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_code" class="form-control"
                                                            value="{{ $product->product_code }}">
                                                        @error('product_code')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div><!-- 3rd col md 4 -->
                                        </div> <!-- end 2nd row -->




                                        <div class="row">
                                            <!-- 3rd row -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Quantity <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_qty" class="form-control"
                                                            value="{{ $product->product_qty }}">
                                                        @error('product_qty')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div><!-- 1st col md 4 -->

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Product Tag <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_tag" class="form-control"
                                                            data-role="tagsinput" value="{{ $product->product_tag }}">
                                                        @error('product_tag')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div><!-- 2nd col md 4 -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Size <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_size" class="form-control"
                                                            data-role="tagsinput" value="{{ $product->product_size }}">
                                                        @error('product_size')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div><!-- 3rd col md 4 -->
                                        </div> <!-- end 3rd row -->


                                        <div class="row">
                                            <!-- 4th row -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Color <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_color" class="form-control"
                                                            data-role="tagsinput"
                                                            value="{{ $product->product_color }}">
                                                        @error('product_color')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div><!-- 1st col md 4 -->

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Selling Price <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="selling_price" class="form-control"
                                                            value="{{ $product->selling_price }}">
                                                        @error('selling_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div><!-- 2nd col md 4 -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Discount Price <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="discount_price" class="form-control"
                                                            value="{{ $product->discount_price }}">
                                                        @error('discount_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div><!-- 3rd col md 4 -->
                                        </div> <!-- end 4th row -->


                                        <div class="row">
                                            <!-- 5th row -->
                                            <div class="col-md-4">

                                            </div><!-- 1st col md 4 -->

                                            <div class="col-md-4">


                                            </div><!-- 2nd col md 4 -->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Short Description<span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_desc" id="textarea" class="form-control" required placeholder="Textarea text">
                                                            {!! $product->short_desc !!}
                                                        </textarea>

                                                    </div>
                                                </div>
                                            </div><!-- 3rd col md 4 -->
                                        </div> <!-- end 5th row -->



                                        <div class="row">
                                            <!-- 6th row -->
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <h5>Long Description <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor1" name="long_desc" rows="10" cols="80">
												{!! $product->long_desc !!}</textarea>
                                                    </div>
                                                </div>
                                            </div><!-- 1st col md 4 -->
                                        </div> <!-- end 6th row -->

                                    </div>

                                </div>

                                <hr>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_2" name="hot_deals"
                                                        value="1" {{ $product->hot_deals == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_2">Hot Deals</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_3" name="featured"
                                                        value="1" {{ $product->featured == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_3">Featured</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_4" name="special_offer"
                                                        value="1"
                                                        {{ $product->special_offer == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_4">Special Offer</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_5" name="special_deals"
                                                        value="1"
                                                        {{ $product->special_deals == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_5">Special Deals</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn btn-info">Submit</button>
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->

        <!-- /Multiplr Image Option -->
        <section class="content">
            <div class="row">
                <div class="col-md-10">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Multiple Image <strong></strong></h4>
                        </div>
                        <br>

                        <form method="post" action="{{ route('productupdate.multiimage') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row row-sm">
                                @foreach ($multiImage as $multiImage)
                                    <div class="col-md-3">
                                        <div class="card">
                                            <img src="{{ asset($multiImage->photo_name) }}" class="card-img-top"
                                                style="height: 100px; width:150px;">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <a href="{{ route('deleteproduct.multiimage', $multiImage->id) }}"
                                                        class="btn btn-sm btn-danger" id="delete" title="Delete"><i
                                                            class="fa fa-trash"></i></a>
                                                </h5>
                                                <p class="card-text">
                                                <div class="form-group">
                                                    <label class="form-control-label"><span
                                                            style="color: rgb(65, 225, 196)">Changes Image</span></label>
                                                    <input class="form-control" type="file"
                                                        name="multi_img[{{ $multiImage->id }}]">
                                                </div>
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-info mb-5" value="Submit">

                            </div>
                            <br>
                        </form>


                    </div>
                </div>
            </div>
        </section>







        <!-- /Thumb Image Option -->
        <section class="content">
            <div class="row">
                <div class="col-md-10">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Thumb Image <strong></strong></h4>
                        </div>
                        <br>

                        <form method="post" action="{{ route('productupdate.thumb') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="old_img" value="{{ $product->product_thumb }}">
                            <div class="row row-sm">

                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{ asset($product->product_thumb) }}" class="card-img-top"
                                            style="height: 100px; width:150px;">
                                        <div class="card-body">

                                            <p class="card-text">
                                            <div class="form-group">
                                                <label class="form-control-label"><span
                                                        style="color: rgb(65, 225, 196)">Changes Image</span></label>
                                                <input type="file" name="product_thumb" class="form-control"
                                                    onchange="mainThumbUrl(this)">
                                                <img src="" id="mainThumb">
                                            </div>
                                            </p>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-info mb-5" value="Submit">

                            </div>
                            <br>
                        </form>


                    </div>
                </div>
            </div>
        </section>
    </div>














    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/category/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="sub_subcategory_id"]').html('');
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            }); /* Category & SubCategort end */








            $('select[name="subcategory_id"]').on('change', function() {
                var subcategory_id = $(this).val();
                if (subcategory_id) {
                    $.ajax({
                        url: "{{ url('/category/sub_subcategory/ajax') }}/" + subcategory_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="sub_subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="sub_subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .sub_subcategory_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            }); /* SubCategory & Sub_SubCategort end */
        });
    </script>
    <script type="text/javascript">
        /* This script for showing the thumb image while choosing */
        function mainThumbUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThumb').attr('src', e.target.result).width(50).height(50);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script type="text/javascript">
        /* This script for showing multiple image */
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input chnages
                if (window.File && window.FileReader && window.FileList && window.Blob) {
                    var data = $(this)[0].files //this file data

                    $.each(data, function(index, file) { //loop through each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file
                            var fRead = new FileReader(); //new file reader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                        e.target.result).width(50).height(50);
                                    $('#preview_img').append(
                                        img) //append image to output element

                                };

                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data
                        }
                    });
                } else {
                    alert("Your browser dosen't support file API!")
                }
            });
        });
    </script>
@endsection
