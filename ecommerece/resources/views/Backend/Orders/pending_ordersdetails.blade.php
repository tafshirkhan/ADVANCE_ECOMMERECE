@extends('Admin.admin_master')
@section('admin')
    <div class="container-full">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Order Details</h3>
                    <div class="d-inline-block align-items-center">

                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="row">

                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Shipping Details</strong></h4>
                        </div>
                        <table class="table">
                            <tr>
                                <th>Shipping Name:</th>
                                <th>{{ $order->name }}</th>
                            </tr>
                            <tr>
                                <th>Shipping Phone:</th>
                                <th>{{ $order->phone }}</th>
                            </tr>
                            <tr>
                                <th>Shipping Email:</th>
                                <th>{{ $order->email }}</th>
                            </tr>
                            <tr>
                                <th>Division:</th>
                                <th>{{ $order->division->division_name }}</th>
                            </tr>
                            <tr>
                                <th>District:</th>
                                <th>{{ $order->district->district_name }}</th>
                            </tr>
                            <tr>
                                <th>State:</th>
                                <th>{{ $order->state->state_name }}</th>
                            </tr>
                            <tr>
                                <th>Post Code:</th>
                                <th>{{ $order->post_code }}</th>
                            </tr>

                        </table>
                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4>Order Details
                                <strong class="text-info">Invoice :{{ $order->invoice_no }}</strong>
                            </h4>
                        </div>
                        <table class="table">
                            <tr>
                                <th>Name:</th>
                                <th>{{ $order->user->name }}</th>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <th>{{ $order->user->phone }}</th>
                            </tr>
                            <tr>
                                <th>Payment Type:</th>
                                <th>{{ $order->payment_method }}</th>
                            </tr>
                            <tr>
                                <th>Transaction</th>
                                <th>{{ $order->transaction_id }}</th>
                            </tr>
                            <tr>
                                <th>District:</th>
                                <th>{{ $order->district->district_name }}</th>
                            </tr>
                            <tr>
                                <th>Order Total:</th>
                                <th>{{ $order->amount }}</th>
                            </tr>
                            <tr>
                                <th>Order:</th>
                                <th><span class="badge badge-pill badge-warning"
                                        style="background: rgb(219, 9, 6)">{{ $order->status }}</span></th>
                            </tr>

                        </table>
                    </div>
                </div>

                <div class="col-md-12 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">Product Information<strong></strong> </h4>
                        </div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td style="width: 10%">
                                        <label for="">Image</label>
                                    </td>
                                    <td class="col-md-3">
                                        <label for="">Product Name</label>
                                    </td>
                                    <td class="col-md-3">
                                        <label for="">Code</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Color</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Size</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label for="">Quantity</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label for="">Price</label>
                                    </td>

                                </tr>

                                @foreach ($orderItem as $item)
                                    <tr>
                                        <td class="col-md-1">
                                            <label for=""><img src="{{ asset($item->products->product_thumb) }}"
                                                    height="60px;" width="60px;"></label>
                                        </td>
                                        <td class="col-md-3">
                                            <label for="">{{ $item->products->product_name }}</label>
                                        </td>
                                        <td class="col-md-3">
                                            <label for="">{{ $item->products->product_code }}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">{{ $item->color }}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">{{ $item->size }}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">{{ $item->qty }}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">{{ $item->price }}
                                                ({{ $item->price * $item->qty }})
                                            </label>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
