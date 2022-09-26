@extends('Admin.admin_master')
@section('admin')
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Search By Date</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <form method="post" action="{{ route('searchby.date') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-8">

                                                <div class="form-group">
                                                    <h5>Select Date<span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="date" class="form-control">
                                                        @error('date')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>

                                            </div>

                                        </div>



                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-success">Search</button>
                                </div>
                            </form>



                        </div>
                        <!-- /.box-body -->


                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>
                <!-- /.col -->

                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Search By Month</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <form method="post" action="{{ route('searchby.month') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">

                                            <div class="col-md-8">

                                                <div class="form-group">
                                                    <h5>Select Month<span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <select name="month" class="form-control">
                                                            <option label="Select Any" disabled></option>
                                                            <option value="January">January</option>
                                                            <option value="February">February</option>
                                                            <option value="March">March</option>
                                                            <option value="April">April</option>
                                                            <option value="May">May</option>
                                                            <option value="June">June</option>
                                                            <option value="July">July</option>
                                                            <option value="August">August</option>
                                                            <option value="September">September</option>
                                                            <option value="October">October</option>
                                                            <option value="November">November</option>
                                                            <option value="December">December</option>

                                                        </select>
                                                        @error('month')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <h5>Select Year<span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <select name="year_no" class="form-control">
                                                            <option label="Select Any" disabled></option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>

                                                        </select>
                                                        @error('year_no')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>

                                            </div>


                                        </div>

                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-success">Search</button>
                                </div>
                            </form>



                        </div>
                        <!-- /.box-body -->


                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>
                <!-- /.col -->

                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Select Year</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <form method="post" action="{{ route('searchby.year') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-8">

                                                <div class="form-group">
                                                    <h5>Select Year<span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <select name="year" class="form-control">
                                                            <option label="Select Any" disabled></option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>

                                                        </select>
                                                        @error('year')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>

                                            </div>

                                        </div>



                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-success">Search</button>
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
