@extends('layouts.master')
<!-- Kế thừa master.blade.php -->
@section('main')
    <h2>Thêm mới sản phẩm</h2>
    <form action="{{ route('product.createToDB') }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Tên danh mục</label>
            <input class="form-control" name="name" placeholder="Tên sản phẩm">
            @error('name')
                <small class="help-block text-danger">{{ $message }}</small>
            @enderror

        </div>
        <div class="form-group">
            <label for="">Giá sản phẩm</label>
            <input class="form-control" name="price" placeholder="Giá sản phẩm">
        </div>
        <div class="form-group">
            <label for="">Giá sale</label>
            <input class="form-control" name="sale_price" placeholder="Giá sản phẩm">
        </div>

        <div class="form-group">
            <label for="">Chọn ảnh</label>
            <input type="file" class="form-control" name="upload" placeholder="Ten danh mục">
            @error('upload')
                <small class="help-block text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Giá sale</label>
            <input class="form-control" name="content" placeholder="Nội dung">
        </div>

        <div class="form-group">
            <label for="">Giá sale</label>
            <input class="form-control" name="category_id" placeholder="Danh mục ID">
        </div>

        <div class="form-group">
            <label for="">Trạng thái</label>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="1" checked>
                    Hiển thị
                </label>
                <label>
                    <input type="radio" name="status" value="0">
                    Ẩn
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
    </form>
@stop()
