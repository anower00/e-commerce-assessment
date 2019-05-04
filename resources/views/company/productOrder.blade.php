@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="form-sec">
            <h4>CREATE ORDER</h4>
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            <table class="table table-striped custab text-center">
                <thead>
                <tr>
                    <th>PRODUCT NAME</th>
                    <th>PRODUCT CODE</th>
                    <th>PRODUCT IMAGE</th>
                    <th>AVAILABLE PRODUCT</th>
                </tr>
                </thead>
                <tr>
                    <td>{{ $productOrder->product_name }}</td>
                    <td>{{ $productOrder->product_code }}</td>
                    <td><img class="img-fluid img-thumbnail" style="height: 50px; width: 50px;" src="{{ asset('storage/productImage/' . $productOrder->product_image) }}"></td>
                    <td>{{ $productOrder->available_product }}</td>
                </tr>
            </table>
            <form method="post" action="{{ route('product.orderStore') }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $productOrder->id }}">
                <div class="form-group">
                    <label>Quantity:</label>
                    <input type="text" class="form-control @error('productCode') is-invalid @enderror" placeholder="Quantity" name="productQuantity">
                    @error('productQuantity')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <br>
                <button type="submit" class="btn btn-success">Submit</button>
                <a type="button" class="btn btn-primary" href="{{ route('supplier.product') }}">BACK</a>
            </form>
        </div>
    </div>
@endsection