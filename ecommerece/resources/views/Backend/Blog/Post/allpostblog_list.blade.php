@extends('Admin.admin_master')
@section('admin')
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">



                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Blog List <span
                                    class="badge badge-pill badge-danger">{{ count($blogpost) }}</span></h3>
                            <a href="{{ route('add.post') }}" class="btn btn-success" style="float: right">Add Post</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Blog Category</th>
                                            <th>Blog Title</th>
                                            <th>Blog Image</th>
                                            <th>Blog Details</th>

                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogpost as $post)
                                            <tr>
                                                <td>{{ $post->blogCategory->blog_category }}</td>
                                                <td>{{ $post->post_title }}</td>
                                                <td><img src="{{ asset($post->post_image) }}"
                                                        style="width: 60px; height:60px;">
                                                </td>
                                                <td>{!! $post->post_details !!}</td>


                                                <td style="width: 20%">
                                                    <a href="{{ route('blogpost.edit', $post->id) }}"
                                                        class="btn btn-info">Edit</a>
                                                    <a href="{{ route('blogpost.delete', $post->id) }}"
                                                        class="btn btn-danger" id="delete">Delete</a>


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
        </section>
        <!-- /.content -->

    </div>
@endsection
