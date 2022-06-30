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
                    <h4 class="box-title">Add New Product</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('store.product') }}" enctype="multipart/form-data">
                                @csrf
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
                                                                <option value="{{ $brand->id }}">
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
                                                                <option value="{{ $category->id }}">
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
                                                        <input type="text" name="product_name" class="form-control">
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
                                                        <input type="text" name="product_code" class="form-control">
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
                                                        <input type="text" name="product_qty" class="form-control">
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
                                                            value="Lorem,Ipsum,Amet" data-role="tagsinput">
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
                                                            value="Lorem,Ipsum,Amet" data-role="tagsinput">
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
                                                            value="Lorem,Ipsum,Amet" data-role="tagsinput">
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
                                                        <input type="text" name="selling_price" class="form-control">
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
                                                        <input type="text" name="discount_price" class="form-control">
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
                                                <div class="form-group">
                                                    <h5>Product Main Thumb <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="product_thumb" class="form-control"
                                                            onchange="mainThumbUrl(this)">
                                                        @error('product_thumb')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                        <img src="" id="mainThumb">
                                                    </div>
                                                </div>
                                            </div><!-- 1st col md 4 -->

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Product Image<span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="multi_img[]" class="form-control"
                                                            multiple="" id="multiImg">
                                                        @error('multi_img')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                        <div class="row" id="preview_img"></div>
                                                    </div>
                                                </div>
                                            </div><!-- 2nd col md 4 -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Short Description<span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_desc" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>

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
												Write here</textarea>
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
                                                        value="1">
                                                    <label for="checkbox_2">Hot Deals</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_3" name="featured"
                                                        value="1">
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
                                                        value="1">
                                                    <label for="checkbox_4">Special Offer</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_5" name="special_deals"
                                                        value="1">
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
