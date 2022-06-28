@extends('Admin.admin_master')
@section('admin')
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
                            <form novalidate>
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
                                                        <input type="file" name="product_thumb" class="form-control">
                                                        @error('product_thumb')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div><!-- 1st col md 4 -->

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Product Image<span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="multi_img[]" class="form-control">
                                                        @error('multi_img')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
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
@endsection
