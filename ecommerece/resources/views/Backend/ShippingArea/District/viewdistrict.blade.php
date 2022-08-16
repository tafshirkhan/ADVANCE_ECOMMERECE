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
                        <h3 class="box-title">District List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>District Name</th>
                                        <th>Division Name</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($shippingdistrict as $item)
                                        <tr>
                                            <td>{{ $item->district_name }}</td>
                                            <td>{{ $item->division->division_name }}</td>


                                            <td>
                                                <a href="{{ route('edit.district', $item->id) }}"
                                                    class="btn btn-info">Edit</a>
                                                <a href="{{ route('delete.district', $item->id) }}" class="btn btn-danger"
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
