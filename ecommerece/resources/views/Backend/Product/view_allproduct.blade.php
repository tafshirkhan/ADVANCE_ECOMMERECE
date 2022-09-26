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
                        <h3 class="box-title">All Product List <span
                                class="badge badge-pill badge-danger">{{ count($product) }}</span></h3>
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
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Discount</th>

                                        <th>Status</th>
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
                                            <td>{{ $product->product_qty }}</td>
                                            <td>{{ $product->selling_price }}</td>

                                            <td>
                                                @if ($product->discount_price == null)
                                                    <span class="badge badge-warning">No Discount</span>
                                                @else
                                                    @php
                                                        $amount = $product->selling_price - $product->discount_price;
                                                        $percentage = ($amount / $product->selling_price) * 100;
                                                    @endphp
                                                    <span class="badge badge-primary">{{ round($percentage) }}%</span>
                                                @endif
                                            </td>

                                            <td>
                                                @if ($product->status == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-warning">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-success">View</a>

                                                <a href="{{ route('product.edit', $product->id) }}"
                                                    class="btn btn-info">Edit</a>
                                                <a href="{{ route('product.delete', $product->id) }}" class="btn btn-danger"
                                                    id="delete">Delete</a>

                                                @if ($product->status == 1)
                                                    <a href="{{ route('product.inactive', $product->id) }}"
                                                        class="btn btn-danger" title="Inactive"><i
                                                            class="fa fa-arrow-down"></i></a>
                                                @else
                                                    <a href="{{ route('product.active', $product->id) }}"
                                                        class="btn btn-info" title="Active"><i
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
