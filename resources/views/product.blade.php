@extends('layouts.master')

@section('main')
    <div class="container">
        <h1>Danh sách sản phẩm</h1>
        <hr>

    @section('main')
        <h1>Danh sách sản phẩm</h1>
        <hr>
        <form action="" method="GET" class="form-inline" role="form">
            <div class="form-group">
                <input name="name" class="form-control"  placeholder="Nhập tên">
            </div>

            <div class="form-group">
                <select name="order" class="form-control">
                    <option value="">Mặc định</option>
                    <option value="name-ASC">Sắp xếp tên từ a - z</option>
                    <option value="name-DESC">Sắp xếp tên từ z - a</option>
                    <option value="price-ASC">Sắp xếp giá từ thấp - cao</option>
                    <option value="price-DESC">Sắp xếp giá từ cao - thấp</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form>

        <div class="row">

            <div class="col-md-3">
                <div class="jumbotron text-center" style="padding:10px">
                    <h2>{{ $totalRow }}</h2>
                    <p>Tổng số sản phẩm</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="jumbotron text-center" style="padding:10px">
                    <h2>{{ number_format($totalPrice) }}</h2>
                    <p>Tổng Giá</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="jumbotron text-center" style="padding:10px">
                    <h2>{{ number_format($maxPrice) }}</h2>
                    <p>Giá cao nhất</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="jumbotron text-center" style="padding:10px">
                    <h2>{{ number_format($minPrice) }}</h2>
                    <p>Giá thấp nhất</p>
                </div>
            </div>
        </div>
        <hr>


        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá/ giá KM</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $pro)
                    <tr>
                        <td>{{ $pro->id }}</td>
                        <td>{{ $pro->name }}</td>
                        <td>{{ $pro->price }}/ {{ $pro->sale_price }}</td>
                        <td>{{ $pro->status }}</td>
                        <td>{{ $pro->created_at }}</td>
                        <td>

                            <a href="" class="btn btn-danger btn-sm">Xóa</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>

        <ul class="pagination">
            <li><a href="{{ route('product.index', ['page' => 1]) }}">&laquo;</a></li>
            @for ($i = 1; $i <= $totlPage; $i++)
                <li class=""><a href="{{ route('product.index', ['page' => $i]) }}">{{ $i }}</a></li>
            @endfor
            <li><a href="{{ route('product.index', ['page' => $totlPage]) }}">&raquo;</a></li>
        </ul>

    </div>
@stop()
