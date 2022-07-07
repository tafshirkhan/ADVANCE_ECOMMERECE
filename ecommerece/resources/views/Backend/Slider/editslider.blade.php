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
                            <h3 class="box-title">Edit Slider</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <form method="post" action="{{ route('slider.update') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $slider->id }}">
                                <input type="hidden" name="old_image" value="{{ $slider->slider_image }}">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Title<span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="title" class="form-control"
                                                            value="{{ $slider->title }}">


                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Description<span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="desc" class="form-control"
                                                            value="{{ $slider->desc }}">


                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="slider_image" class="form-control">
                                                        @error('slider_image')
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
