@extends('layouts.master')

@section('main')
<div class="product-box">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category Name</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <!-- Hiển thị tên danh mục theo phương thức JOIN đã hasOne trong Product model -->
                <td>{{$product->cat->name}}</td>
                <td>{{$product->price}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop()
