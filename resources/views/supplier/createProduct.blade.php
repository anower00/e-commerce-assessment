@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="form-sec">
            <h4>CREATE PRODUCT</h4>
            <form name="qryform" id="qryform" method="post" action="{{ route('productSupplier.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Product Name:</label>
                    <input type="text" class="form-control @error('productName') is-invalid @enderror" id="name"                                    placeholder="Enter product name" name="productName">
                    @error('productName')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Product Code:</label>
                    <input type="text" class="form-control @error('productCode') is-invalid @enderror" id="name" placeholder="product code" name="productCode">
                    @error('productCode')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Product Price:</label>
                    <input type="text" class="form-control @error('productPrice') is-invalid @enderror" id="phone" placeholder="product price" name="productPrice">
                    @error('productPrice')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Available Product:</label>
                    <input type="text" class="form-control @error('availableProduct') is-invalid @enderror" id="name" placeholder="Available product" name="availableProduct">
                    @error('availableProduct')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('productImage') is-invalid @enderror" id="inputGroupFile01"
                               aria-describedby="inputGroupFileAddon01" name="productImage">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                    @error('productImage')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <br>
                <button type="submit" class="btn btn-success">Submit</button>
                <a type="button" class="btn btn-primary" href="{{ route('productSupplier.index') }}">Home</a>
            </form>
        </div>
    </div>
@endsection