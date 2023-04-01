@extends('layouts.master') <!-- Kế thừa master.blade.php -->
@section('main')
<h2>Chỉnh sửa danh mục danh mục: {{$cat->name}}</h2>
<form action="{{ route('category.update',$cat->id) }}" method="POST" role="form">
    @csrf @method('PUT')
    <div class="form-group">
        <label for="">Tên danh mục</label>
        <input class="form-control" name="name" value="{{$cat->name}}">
        @error('name')
        <small class="help-block text-danger">{{$message}}</small>
        @enderror
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
