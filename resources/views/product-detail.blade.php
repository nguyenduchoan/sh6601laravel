@extends('master.home')
@section('main')
    <h2>Chi tiết sản phẩm</h2>
    <div class="row products">
        <div class="col-md-5">
            <img src="https://image.kacana.vn/images/product/gio-xach-dep-hang-hieu-tui-nu-fsm-2303-4013216754.jpg"
                alt="" style="width:100%">
        </div>
        <div class="col-md-7">
            <h3>{{ $product->name }}</h3>
            <p style="font-size: 18px">
                <s>Giá gốc: {{ $product->price }}</s>
                <b>Giá mới: {{ $product->sale_price }}</b>
            </p>
            <p>
            <form action="" method="POST" class="form-inline" role="form">
                <div class="form-group">
                    <input class="form-control" name="quantity" placeholder="Input quantity">
                </div>
                <button type="submit" class="btn btn-success">Add To Cart</button>
            </form>
            </p>
        </div>
    </div>
@stop()
