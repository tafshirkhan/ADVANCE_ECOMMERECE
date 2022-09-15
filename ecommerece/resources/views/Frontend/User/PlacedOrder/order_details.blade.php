@extends('Frontend.master')

@section('main_content')
    <div class="body-content">
        <div class="container">
            <div class="row">

                @include('Frontend.Common.usersidebar')

                <div class="col-md-5">
                    <div class="card">
                        <div class="caed-header">
                            <h4>Shipping Details</h4>
                        </div>
                        <hr>
                        <div class="card-body" style="background: rgb(227, 227, 234)">
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
                </div>



                <div class="col-md-5">
                    <div class="card">
                        <div class="caed-header">
                            <h4>Order Details
                                <strong class="text-danger">Invoice :{{ $order->invoice_no }}</strong>
                            </h4>
                        </div>
                        <hr>
                        <div class="card-body" style="background: rgb(227, 227, 234)">
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
                </div>

                <!--Order item-->
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-10">
                        <div class="table-responsive">
                            <br>
                            <table class="table">
                                <tbody>
                                    <tr style="background: rgb(204, 190, 190)">
                                        <td class="col-md-1">
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
                                                <label for=""><img
                                                        src="{{ asset($item->products->product_thumb) }}" height="60px;"
                                                        width="60px;"></label>
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
                </div> <!-- End order item row-->















            </div>
        </div>
    </div>
@endsection
