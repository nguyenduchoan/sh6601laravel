@extends('master.home')
@section('main')
<h2>Sản phẩm mới nhất</h2>
<div class="row products">
    @foreach($products as $pro)
    <div class="col-md-3">
        <div class="thumbnail">
            <img src="https://image.kacana.vn/images/product/gio-xach-dep-hang-hieu-tui-nu-fsm-2303-4013216754.jpg"
                alt="">
            <div class="caption">
                <h3>{{ $pro->name }}</h3>
                <p>
                    <s>Giá gốc: {{ $pro->price }}</s>
                    <b>Giá mới: {{ $pro->sale_price }}</b>
                </p>
                <p>
                    <a href="{{ route('home.product_detail', $pro->id) }}" class="btn btn-primary">View</a>
                    <a href="#" class="btn btn-default">Add To Cart</a>
                </p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@stop()
