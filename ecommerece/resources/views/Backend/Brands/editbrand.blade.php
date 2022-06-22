@extends('Admin.admin_master')
@section('admin')
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">



                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Brands</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <form method="post" action="{{ route('brand.update', $brand->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $brand->id }}">
                                <input type="hidden" name="previous_image" value="{{ $brand->brand_image }}">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Brand Name<span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="brand_name" class="form-control"
                                                            value="{{ $brand->brand_name }}">
                                                        @error('brand_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Image <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="brand_image" class="form-control">
                                                        @error('brand_image')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-info">Update</button>
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
