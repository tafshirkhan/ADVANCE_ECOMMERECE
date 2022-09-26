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
                        <h3 class="box-title">All Category <span
                                class="badge badge-pill badge-danger">{{ count($category) }}</span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Category Icon</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $category)
                                        <tr>
                                            <td>{{ $category->category_name }}</td>
                                            <td>
                                                <span><i class="{{ $category->category_icon }}"></i></span>
                                            </td>
                                            <td>
                                                <a href="{{ route('category.edit', $category->id) }}"
                                                    class="btn btn-info">Edit</a>
                                                <a href="{{ route('category.delete', $category->id) }}"
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
        <!--   </section> -->
        <!-- /.content -->

    </div>
@endsection
