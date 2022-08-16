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
                            <h3 class="box-title">Add New District</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <form method="post" action="{{ route('store.district') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Select Division</h5>
                                                    <div class="controls">
                                                        <select name="division_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select
                                                                Division </option>

                                                            @foreach ($shippingdivision as $division)
                                                                <option value="{{ $division->id }}">
                                                                    {{ $division->division_name }}</option>
                                                            @endforeach

                                                        </select>
                                                        @error('division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <h5>District Name<span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="district_name" class="form-control">
                                                        @error('district_name')
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
