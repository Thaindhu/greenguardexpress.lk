<!DOCTYPE html>
<html>

<head>
    <title>Invoice - greenguardexpress.lk</title>
</head>

<body>
<div id="content" class="col-sm-9">
                <h2 class="title">Order Information</h2>
                @if ($message = Session::get('success'))
                    <div class="alert alert-primary icons-alert">
                        <p><strong>Success!</strong> {{ $message }}
                        </p>
                    </div>
                @endif
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td colspan="2" class="text-left">Order Details</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 50%;" class="text-left"> <b>Order ID:</b> #{{ $order->invoice_number }}
                                <br>
                                <b>Date Added:</b> {{ $order->created_at }}
                            </td>
                            <td style="width: 50%;" class="text-left"> <b>Payment Method:</b>
                                @if ($order->payment_type == 'cod')
                                    Cash on Delivery
                                @elseif ($order->payment_type == 'bank_pay')
                                    Bank Transfer
                                @elseif ($order->payment_type == 'online')
                                    VISA / Master
                                @endif
                                <br>
                                <b>Delivery Method:</b>
                                @if ($order->deliver_type == 'delivery')
                                    Home Delivery
                                @elseif ($order->deliver_type == 'pickup')
                                    Store Pickup
                                @endif
                                <br>
                                <b>Order Status:</b>
                                @if ($order->status == 0)
                                    <label class="label label-warning">Processing</label>
                                @elseif($order->status == 1)
                                    <label class="label label-primary">Desptached</label>
                                @elseif($order->status == 2)
                                    <label class="label label-danger">Canceled</label>
                                @elseif($order->status == 3)
                                    <label class="label label-danger">Returned</label>
                                @elseif($order->status == 4)
                                    <label class="label label-success">Completed</label>
                                @endif
                                <br>
                                <b>Tracking ID:</b>
                                {{ $order->delivery_number ? $order->delivery_number : 'n/a' }} <br>
                                @if ($order->delivery_number)
                                    <a target="_blank" href="https://fardardomestic.com/">Click Here to Track</a>
                                @endif

                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td style="width: 50%; vertical-align: top;" class="text-left">Payment Address</td>
                            <td style="width: 50%; vertical-align: top;" class="text-left">Shipping Address</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-left">
                                {{ $order->first_name }} {{ $order->last_name }}, <br>
                                {{ $order->address_1 }},<br>{{ $order->address_2 }},
                                {{ $order->loc_name }},<br>{{ $order->postal_code }}
                            </td>
                            <td class="text-left">{{ $order->first_name }} {{ $order->last_name }},<br>
                                {{ $order->address_1 }},<br>{{ $order->address_2 }},
                                {{ $order->loc_name }},<br>{{ $order->postal_code }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td class="text-left">Product Name</td>
                                <td class="text-left">Brand</td>
                                <td class="text-right">Quantity</td>
                                <td class="text-right">Price</td>
                                <td class="text-right">Total</td>
                                <td style="width: 20px;"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order_details as $item)
                                <tr>
                                    @php
                                        $varies = json_decode($item->variations);
                                    @endphp
                                    <td class="text-left">{{ $item->title }}
                                        @if ($varies)
                                            <ul>
                                                @foreach ($varies as $vr)
                                                    <li>{{ $vr->type }} -
                                                        {{ $vr->value }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </td>
                                    <td class="text-left"></td>
                                    <td class="text-right">{{ $item->qty }}</td>
                                    <td class="text-right">Rs.{{ number_format($item->unit_price, 2) }}</td>
                                    <td class="text-right">Rs.{{ number_format($item->total_amount, 2) }}</td>
                                    <td style="white-space: nowrap;" class="text-right"> <a class="btn btn-primary"
                                            title="" data-toggle="tooltip"
                                            href="{{ route('user.view.product', [$item->product_id, $item->metaname]) }}"
                                            data-original-title="Reorder"><i class="fa fa-shopping-cart"></i></a>
                                        {{-- <a class="btn btn-danger" title="" data-toggle="tooltip" href="return.html"
                                    data-original-title="Return"><i class="fa fa-reply"></i></a> --}}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3"></td>
                                <td class="text-right"><b>Sub-Total</b>
                                </td>
                                <td class="text-right">Rs.{{ number_format($order->total_amount, 2) }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td class="text-right"><b>Shipping Charges</b>
                                </td>
                                <td class="text-right">Rs.{{ number_format($diliveryFree, 2) }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td class="text-right"><b>Total</b>
                                </td>
                                <td class="text-right">
                                    Rs.{{ number_format($order->total_amount + $diliveryFree, 2) }}</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <h3>Order Status</h3>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td class="text-left">Date</td>
                            <td class="text-left">Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-left">Processing</td>
                            <td class="text-left">{{ $order->created_at }}</td>

                        </tr>
                        <tr>
                            <td class="text-left">Shipped</td>
                            <td class="text-left">{{ $order->shipped_date ? $order->shipped_date : 'Pending' }}</td>

                        </tr>
                        @if ($order->status == 3)
                            <tr>
                                <td class="text-left">Returned</td>
                                <td class="text-left">{{ $order->returned_date }}</td>
                            </tr>
                        @endif
                        @if ($order->status == 2)
                            <tr>
                                <td class="text-left">Canceled by Customer</td>
                                <td class="text-left">{{ $order->canceled_date }}</td>
                            </tr>
                        @endif
                        <tr>
                            <td class="text-left">Order Completed</td>
                            <td class="text-left">{{ $order->completed_date ? $order->completed_date : 'Pending' }}</td>
                        </tr>
                    </tbody>
                </table>
                @if ($order->status == 0 && !Auth::user())
                    <div class="buttons clearfix">
                        <div class="pull-right"><a class="btn btn-danger" onclick="cancelOrder({{ $order->id }})"
                                href="#">Cancel Order</a>
                        </div>
                    </div>
                @endif



            </div>
    <p>Our support agent will reach out you soon.</p>
    <p>This is an auto generated email. Please do not reply</p>
    <p>Thank you!</p>

</body>

</html>