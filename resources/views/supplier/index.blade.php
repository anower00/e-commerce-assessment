@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row col-md-12 col-md-offset-0 custyle">
            <table class="table table-striped custab">
                <thead>
                <h1>supplier view Product</h1>
                <a type="button" class="btn btn-success" style="height: 40px; width: 90px; position: absolute; right: 147px;"
                   href="{{ route('product.orderList') }}">Order List</a>
                <a type="button" class="btn btn-primary" style="position: absolute;right: 15px;width: 108px;height: 39px; border: 3px solid green" href="{{ route('productSupplier.create') }}">Add product</a>
                <tr>
                    <th>#No</th>
                    <th>PRODUCT NAME</th>
                    <th>PRODUCT CODE</th>
                    <th>PRODUCT IMAGE</th>
                    <th>PRICE</th>
                    <th>AVAILABLE</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->product_code }}</td>
                        <td><img class="img-fluid img-thumbnail" style="height: 150px; width: 155px" src="{{ asset('storage/productImage/' . $product->product_image) }}"></td>
                        <td>{{ $product->product_price }} Taka</td>
                        <td>{{ $product->available_product }}</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-remove"></span> EDIT</a>
                            <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="text-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection