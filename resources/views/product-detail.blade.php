@extends('master.home')

@section('main')

<h2>Chi tiết sản phẩm</h2>
<div class="row products">
    <div class="col-md-5">
        <img src="https://image.kacana.vn/images/product/gio-xach-dep-hang-hieu-tui-nu-fsm-2303-4013216754.jpg" alt="" style="width:100%">
    </div>
    <div class="col-md-7">
        <h3>{{ $product->name }}</h3>
        <p style="font-size: 18px">
            <s>Giá gốc: {{ $product->price }}</s>
            <b>Giá mới: {{ $product->sale_price }}</b>
        </p>
        <p>
        <form action="{{ route('cart.add', $product->id) }}" method="GET" class="form-inline" role="form">
            <div class="form-group">
                <input type="number" class="form-control" name="quantity" placeholder="Input quantity">
            </div>
            <button type="submit" class="btn btn-success">Add To Cart</button>
        </form>
        </p>
    </div>

</div>
<hr>
<!-- Kiểm tra xem người dùng đã đăng nhập chưa  -->
@if (auth('cus')->check())
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
<!-- Nếu chwua đăng nhập thì thông báo  -->
<div class="alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Chưa đăng nhập</strong> bạn hãy <a href="{{ route('home.login') }}">click vào đây</a> để đăng nhập
</div>


@endif
<hr>
<div class="comments">
    @foreach($product->comments as $comment)
    <div class="media">
        <a class="pull-left" href="#">
            <img width="60" class="media-object" src="https://haycafe.vn/wp-content/uploads/2022/03/Avatar-TikTok-anh-dai-dien-TikTok.jpg" alt="Image">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->user->name}}</h4>
            <p>{{$comment->content}}</p>
            @if (auth('cus')->check() && auth('cus')->user()->can('change-comment', $comment))
            <a href="{{ route('home.deleteComment', $comment->id) }}" class="label label-danger">Xóa</a>
            <a href="" class="label label-default">Sửa</a>
            @endif

        </div>
    </div>
    @endforeach
</div>
<hr>
@stop()