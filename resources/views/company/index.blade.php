@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row col-md-12 col-md-offset-0 custyle">
            <table class="table table-striped custab">
                <thead>
                <h1>Company Product View</h1>
                <a type="button" class="btn btn-primary" style="position: absolute;right: 15px;width: 108px;height: 39px; border: 3px solid green" href="{{ route('supplier.product') }}">Order product</a>
                <tr>
                    <th>#No</th>
                    <th>PRODUCT NAME</th>
                    <th>PRODUCT CODE</th>
                    <th>PRODUCT IMAGE</th>
                    <th>PRICE</th>
                    <th>AVAILABLE IN STOCK</th>
                    <th>QUANTITY</th>
                    <th>STATUS</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                @foreach($orderedProduct as $ordered)
                    <tr>
                        <td>{{ $ordered->id }}</td>
                        <td>{{ $ordered->product_order->product_name }}</td>
                        <td>{{ $ordered->product_order->product_code }}</td>
                        <td><img class="img-fluid img-thumbnail" style="height: 50px; width: 50px;" src="{{ asset('storage/productImage/' . $ordered->product_order->product_image) }}"></td>
                        <td>{{ $ordered->product_order->product_price }} TK</td>
                        <td>{{ $ordered->product_order->available_product }} Piece</td>
                        <td>{{ $ordered->quantity }}</td>
                        @if($ordered->is_delivered == 0)
                            <td>Pending</td>
                        @else
                            <td>Delivered</td>
                        @endif
                        <td class="text-center">
                            <a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                            <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Delelte</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="text-center">
                {{ $orderedProduct->links() }}
            </div>
        </div>
    </div>
@endsection