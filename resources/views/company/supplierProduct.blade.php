@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row col-md-12 col-md-offset-0 custyle">
            <table class="table table-striped custab">
                <thead>
                <h1>Supplier Product List</h1>
                <tr>
                    <th>PRODUCT NAME</th>
                    <th>PRODUCT CODE</th>
                    <th>PRODUCT IMAGE</th>
                    <th>PRICE</th>
                    <th>AVAILABLE</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                @foreach($supplierProduct as $order)
                    <tr>
                        <td>{{ $order->product_name }}</td>
                        <td>{{ $order->product_code }}</td>
                        <td><img class="img-fluid img-thumbnail" style="height: 50px; width: 50px;" src="{{ asset('storage/productImage/' . $order->product_image) }}"></td>
                        <td>{{ $order->product_price }} Taka</td>
                        <td>{{ $order->available_product }} Piece</td>
                        <td class="text-center">
                            <a class='btn btn-primary btn-xs' href="{{ route('product.createOrder',$order->id) }}"><span class="glyphicon glyphicon-edit"></span>ORDER</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            <a type="button" class="btn btn-primary" href="{{ route('company') }}">Home</a>
        </div>
    </div>
@endsection