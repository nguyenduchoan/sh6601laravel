@extends('master.home')

@section('main')

<div class="row">
    <div class="col-md-6">
        <h2>Thông tin giỏ hàng </h2>
    </div>
    <div class="col-md-6">
        <h2>Số lượng: {{ $cart->totalQuantity }}, Tổng tiền: {{ number_format($cart->totalPrice) }} đ </h2>
    </div>
</div>

@if (count($cart->items) > 0)

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th class="text-center">STT</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Sub Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($cart->items as $item)
        <tr>
            <td class="text-center">{{$loop->index + 1}}</td>
            <td>{{$item->name}}</td>
            <td>{{ number_format($item->price) }} đ</td>
            <td>
                <form action="{{ route('cart.update', $item->id) }}">
                    <input type="number" name="quantity" value="{{$item->quantity}}" style="width:80px; text-align: center">
                    <button class="btn btn-sm btn-success">Update</button>
                </form>
            </td>
            <td>{{ number_format($item->quantity * $item->price) }} đ</td>
            <td>
                <a href="{{ route('cart.delete', $item->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc không?')">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="text-center">
    <a href="{{ route('home.index') }}" class="btn btn-sm btn-primary">Tiếp tục mua hàng</a>
    <a href="{{ route('cart.clear') }}" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc không?')">Xóa
        hết</a>
    <a href="{{ route('home.index') }}" class="btn btn-sm btn-success">Đặt hàng</a>
</div>
@else

<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Giỏ hàng rỗng</strong> Giỏ hàng đang rỗng, <a href="{{ route('home.index') }}">hãy click vào đây</a> để tiếp
    tục mua hàng
</div>

@endif
@stop()