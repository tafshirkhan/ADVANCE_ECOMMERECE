@extends('Admin.admin_master')
@section('admin')
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <!--  <section class="content"> -->
        <div class="row">



            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Slider</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Slider Image</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($slider as $slider)
                                        <tr>
                                            <td>
                                                @if ($slider->title == null)
                                                    <span class="badge badge-warning">No title</span>
                                                @else
                                                    {{ $slider->title }}
                                                @endif

                                            </td>
                                            <td>
                                                <img src="{{ asset($slider->slider_image) }}"
                                                    style="width: 60px; height:60px;">
                                            </td>
                                            <td>{{ $slider->desc }}</td>
                                            <td>
                                                @if ($slider->status == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-warning">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('slider.edit', $slider->id) }}"
                                                    class="btn btn-info">Edit</a>
                                                <a href="{{ route('slider.delete', $slider->id) }}" class="btn btn-danger"
                                                    id="delete">Delete</a>

                                                @if ($slider->status == 1)
                                                    <a href="{{ route('slider.inactive', $slider->id) }}"
                                                        class="btn btn-danger" title="Inactive"><i
                                                            class="fa fa-arrow-down"></i></a>
                                                @else
                                                    <a href="{{ route('slider.active', $slider->id) }}"
                                                        class="btn btn-primary" title="Active"><i
                                                            class="fa fa-arrow-up"></i></a>
                                                @endif


                                            </td>

                                        </tr>
                                    @endforeach


                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!--   </section> -->
        <!-- /.content -->

    </div>
@endsection
