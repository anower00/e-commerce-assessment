@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row col-md-12 col-md-offset-0 custyle">
            <table class="table table-striped custab">
                <thead>
                <h1>supplier Order List</h1>
                <tr>
                    <th>#No</th>
                    <th>PRODUCT NAME</th>
                    <th>PRODUCT CODE</th>
                    <th>PRODUCT IMAGE</th>
                    <th>PRICE</th>
                    <th>AVAILABLE</th>
                    <th>QUANTITY</th>
                    <th>STATUS</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                @foreach($orderList as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->order_list->product_name }}</td>
                        <td>{{ $order->order_list->product_code }}</td>
                        <td><img class="img-fluid img-thumbnail" style="height: 150px; width: 155px" src="{{ asset('storage/productImage/' . $order->order_list->product_image) }}"></td>
                        <td>{{ $order->order_list->product_price }} Taka</td>
                        <td>{{ $order->order_list->available_product }}</td>
                        <td>{{ $order->quantity }}</td>
                        @if($order->is_delivered == 0)
                            <td>Pending</td>
                        @else
                            <td>Delivered</td>
                        @endif
                        <td class="text-center">
                            @if($order->is_delivered == false)
                                <form method="post" id="submit-form-{{ $order->id }}"
                                      action="{{ route('product.orderDelivery',$order->id) }}" style="display: none">
                                    @csrf
                                </form>
                                <a style="cursor: pointer;" onclick="
                                        if(confirm('Are You Sure? Do You Want Delivered This Product??'))
                                        {
                                        event.preventDefault();
                                        document.getElementById('submit-form-{{ $order->id }}').submit();
                                        }
                                        else
                                        {
                                        event.preventDefault();
                                        }
                                        "><i class="btn btn-primary btn-xs">Delivery</i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="text-center">
                {{ $orderList->links() }}
            </div>
            <br>
            <a class='btn btn-success btn-xs' style="height: 35px; width: 80px; position: absolute;right: 65px;" href="{{ route('productSupplier.index') }}"><span class=""></span>HOME</a>
        </div>
    </div>
@endsection