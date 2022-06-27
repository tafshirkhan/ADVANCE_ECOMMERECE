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
                        <h3 class="box-title">Sub Category List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>SubCategory Name</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sub_subcategory as $sub_subcategory)
                                        <tr>
                                            <td>{{ $sub_subcategory['category']['category_name'] }}</td>
                                            <!--Here category is the functiom name which is comes from Sub_SubCategory model -->
                                            <td>{{ $sub_subcategory['subcategory']['subcategory_name'] }}</td>
                                            <!--Here subcategory is the functiom name which is comes from Sub_SubCategory model -->


                                            <td>{{ $sub_subcategory->sub_subcategory_name }}</td>


                                            <td>
                                                <a href="{{ route('sub_subcategory.edit', $sub_subcategory->id) }}"
                                                    class="btn btn-info">Edit</a>
                                                <a href="{{ route('sub_subcategory.delete', $sub_subcategory->id) }}"
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
