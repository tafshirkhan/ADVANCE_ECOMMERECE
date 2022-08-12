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
                        <h3 class="box-title">All The Coupons List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Discount</th>
                                        <th>Validity</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coupons as $coupons)
                                        <tr>
                                            <td>{{ $coupons->coupon_name }}</td>
                                            <td>{{ $coupons->coupon_discount }}%</td>
                                            <td>
                                                {{ Carbon\Carbon::parse($coupons->coupon_validity)->format('D, d F Y') }}


                                            <td>
                                                @if ($coupons->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-warning">Inactive</span>
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{ route('edit.coupons', $coupons->id) }}"
                                                    class="btn btn-info">Edit</a>
                                                <a href="{{ route('delete.coupons', $coupons->id) }}" class="btn btn-danger"
                                                    id="delete">Delete</a>


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
