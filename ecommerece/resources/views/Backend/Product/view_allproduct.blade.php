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
                        <h3 class="box-title">All Product List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Thumb Image</th>
                                        <th>Product Code</th>
                                        <th>Price</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $product)
                                        <tr>
                                            <td>{{ $product->product_name }}</td>
                                            <td>
                                                <img src="{{ asset($product->product_thumb) }}"
                                                    style="width: 50px; height:50px">
                                            </td>
                                            <td>{{ $product->product_code }}</td>
                                            <td>{{ $product->selling_price }}</td>
                                            <td>
                                                <a href="" class="btn btn-info">Edit</a>
                                                <a href="" class="btn btn-danger" id="delete">Delete</a>


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
