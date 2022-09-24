@extends('Frontend.master')

@section('main_content')
    <div class="body-content">
        <div class="container">
            <div class="row">

                @include('Frontend.Common.usersidebar')
                <div class="col-md-2">
                </div>

                <div class="col-md-8">
                    <div class="table-responsive">
                        <br>
                        <table class="table">
                            <tbody>
                                <tr style="background: rgb(204, 190, 190)">
                                    <td class="col-md-1">
                                        <label for="">Date</label>
                                    </td>
                                    <td class="col-md-3">
                                        <label for="">Total</label>
                                    </td>
                                    <td class="col-md-3">
                                        <label for="">Payment</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Invoice</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Order</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label for="">Action</label>
                                    </td>

                                </tr>


                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="col-md-1">
                                            <label for="">{{ $order->order_date }}</label>
                                        </td>
                                        <td class="col-md-3">
                                            <label for="">{{ $order->amount }}</label>
                                        </td>
                                        <td class="col-md-3">
                                            <label for="">{{ $order->payment_method }}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">{{ $order->invoice_no }}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">
                                                <span class="badge badge-pill badge-warning"
                                                    style="background: rgb(219, 9, 6)">{{ $order->status }}</span>
                                                <br><br>
                                                <span class="badge badge-pill badge-warning"
                                                    style="background: rgb(6, 10, 236)">Return Request</span>

                                            </label>
                                        </td>
                                        <td class="col-md-1">
                                            <a href="{{ url('user/order_details/' . $order->id) }}"
                                                class="btn btn-sm btn-primary"><i class="fa fa-eye"></i>View</a>
                                            <a target="_blank" href="{{ url('user/download_invoice/' . $order->id) }}"
                                                class="btn btn-sm btn-success" style="margin-top: 5px"><i
                                                    class="fa fa-download"></i>Invoice</a>

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
