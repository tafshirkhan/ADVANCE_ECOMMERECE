@extends('Admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">



                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Sub-Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <form method="post" action="{{ route('sub_subcategory.update') }}">
                                @csrf

                                <input type="hidden" name="id" value="{{ $sub_subcategory->id }}">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Category<span class="text-danger">*</span></h5>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <select name="category_id" class="form-control">
                                                                <option value="" selected="" disabled="">Select
                                                                    Category </option>

                                                                @foreach ($category as $category)
                                                                    <option
                                                                        value="{{ $category->id }}"{{ $category->id == $sub_subcategory->category_id ? 'selected' : '' }}>
                                                                        {{ $category->category_name }}</option>
                                                                @endforeach

                                                            </select>
                                                            @error('category_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Sub Category<span class="text-danger">*</span></h5>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <select name="subcategory_id" class="form-control">
                                                                <option value="" selected="" disabled="">Select
                                                                    Sub Category </option>

                                                                @foreach ($subcategory as $subcategory)
                                                                    <option
                                                                        value="{{ $subcategory->id }}"{{ $subcategory->id == $sub_subcategory->subcategory_id ? 'selected' : '' }}>
                                                                        {{ $subcategory->subcategory_name }}</option>
                                                                @endforeach



                                                            </select>
                                                            @error('subcategory_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Sub Category Name<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="sub_subcategory_name"
                                                            class="form-control"
                                                            value="{{ $sub_subcategory->sub_subcategory_name }}">
                                                        @error('sub_subcategory_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </form>



                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
