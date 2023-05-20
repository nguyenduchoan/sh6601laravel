@extends('layouts.master') <!-- Kế thừa master.blade.php -->
@section('main')
<h2>Form Upload</h2>
<!-- Hiển thị flash message khi upload thành công -->
@if(Session::has('success'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{Session::get('success')}}
</div>
@endif
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Chọn ảnh</label>
        <input type="file" class="form-control" name="uploads[]" placeholder="Ten danh mục" multiple>
        @error('upload')
        <small class="help-block text-danger">{{$message}}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Upload</button>
</form>
@stop()
