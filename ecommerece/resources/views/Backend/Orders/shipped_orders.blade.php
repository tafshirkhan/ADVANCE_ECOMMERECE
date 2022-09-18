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
                        <h3 class="box-title">Shipped Order List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Invoice</th>
                                        <th>Amount</th>
                                        <th>Payment</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $items)
                                        <tr>
                                            <td>{{ $items->order_date }}</td>
                                            <td>{{ $items->invoice_no }}</td>
                                            <td>{{ $items->amount }}</td>
                                            <td>{{ $items->payment_method }}</td>
                                            <td> <span class="badge badge-pill badge-success">{{ $items->status }}</span>
                                            </td>

                                            <td>
                                                <a href="{{ route('pendingorder.details', $items->id) }}"
                                                    class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('invoice.download', $items->id) }}"
                                                    class="btn btn-danger"><i class="fa fa-download"></i></a>
                                                <a href="" class="btn btn-danger" id="delete"><i
                                                        class="fa fa-trash"></i></a>


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
