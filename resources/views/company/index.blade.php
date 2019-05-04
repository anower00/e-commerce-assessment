@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row col-md-12 col-md-offset-0 custyle">
            <table class="table table-striped custab">
                <thead>
                <h1>Company view Product</h1>
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
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><img class="img-fluid img-thumbnail" style="height: 150px; width: 155px" src=""></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-center">
                            <a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                            <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Delelte</a>
                        </td>
                    </tr>
            </table>
        </div>
    </div>
@endsection