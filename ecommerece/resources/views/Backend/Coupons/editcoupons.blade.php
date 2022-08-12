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
                            <h3 class="box-title">Update Coupons</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <form method="post" action="{{ route('update.coupon', $coupon->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Name<span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="coupon_name" class="form-control"
                                                            value="{{ $coupon->coupon_name }}">
                                                        @error('coupon_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Discount Amount<span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="coupon_discount" class="form-control"
                                                            value="{{ $coupon->coupon_discount }}">
                                                        @error('coupon_discount')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Validity<span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="coupon_validity" class="form-control"
                                                            min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                                            value="{{ $coupon->coupon_validity }}">
                                                        @error('coupon_validity')
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
