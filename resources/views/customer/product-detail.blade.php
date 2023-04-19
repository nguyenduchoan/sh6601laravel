@extends('master.home')
@section('main')
<link rel="stylesheet" href="{{ asset('Css/detail.css') }}">
<style>
    ul.navbar-nav.ml-auto {
    position: absolute;
    right: 200px;
    top: 13px;
}
a.nav-link {
    padding-left: 20px;
}
    .alert {
    position: relative;
    padding: .75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    background: antiquewhite;
    border-radius: .25rem;
}
.bg-white {
    background-color: #dee2e6!important;
}
.media {
    display: -ms-flexbox;
    display: flex;
    gap: 20px;
    padding: 10px 20px;
    -ms-flex-align: start;
    align-items: flex-start;
}
</style>

<div class="product-container">
    <div class="product-image">
        <img src="{{$product->image}}" alt="Product Image">
    </div>
    <div class="product-info">
        <h1 class="product-name">{{$product->name}}</h1>
        <p class="product-price">Giá mới : ${{$product->price}}</p>
        <p class="product-price">Giá cũ : ${{$product->sale_price}}</p>
        <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce euismod est eu
            ex fringilla sagittis. Sed nec hendrerit magna, a bibendum nisi. Sed sed justo at sapien mollis rutrum.
            Fusce in metus lobortis, euismod lacus quis, auctor tellus. Praesent euismod metus quam, nec eleifend mi
            consectetur nec.</p>
            <input type="number" name="" id="">
            <button>Add Cart</button>
    </div>
</div>

<!-- Kiểm tra xem người dùng đã đăng nhập chưa -->
@if (Auth::guard('cus')->check())
    <form action="{{ route('home.product_comment', $product->id) }}" method="POST" role="form">
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <legend>Bình luận sản phẩm</legend>
        @csrf
        @if (Session::has('ok'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{ Session::get('ok') }}!</strong>
            </div>
        @endif
        <div class="form-group">
            <label for="">Nội dung bình luận</label>
            <textarea name="content" class="form-control" placeholder="Nội dung bình luận"></textarea>
            @error('content') {{ $message }} @enderror
        </div>
        <button type="submit" class="btn btn-primary">Gửi bình luận</button>
    </form>
@else
    <!-- Nếu chwua đăng nhập thì thông báo -->
    <div class="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Chưa đăng nhập</strong> bạn hãy <a href="{{ route('customer.login') }}">click vào đây</a> để đăng nhập
    </div>
@endif
<hr>
<div class="comments">
@foreach($product->comments as $comment)
<div class="media">
<a class="pull-left" href="#">
<img width="60" class="media-object" src="https://ih1.redbubble.net/image.12480674.3146/raf,750x1000,075,t,heather_grey.u1.jpg" alt="Image">
</a>
<div class="media-body">
<h4 class="media-heading">{{$comment->user->name}}</h4>
<p>{{$comment->content}}</p>
@if (auth('cus')->check() && auth('cus')->user()->can('change-comment', 
$comment))
<a href="{{ route('home.deleteComment', $comment->id) }}" class="label label-danger">Xóa</a>
<a href="" class="label label-default">Sửa</a>
@endif

</div>
</div>
@endforeach
</div>
@endsection

