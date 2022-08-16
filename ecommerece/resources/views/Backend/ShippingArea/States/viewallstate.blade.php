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
                        <h3 class="box-title">State List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>District Name</th>
                                        <th>Division Name</th>
                                        <th>State Name</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($states as $item)
                                        <tr>
                                            <td>{{ $item->district->district_name }}</td>
                                            <td>{{ $item->division->division_name }}</td>
                                            <td>{{ $item->state_name }}</td>



                                            <td>
                                                <a href="{{ route('edit.state', $item->id) }}" class="btn btn-info">Edit</a>
                                                <a href="{{ route('delete.state', $item->id) }}" class="btn btn-danger"
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
