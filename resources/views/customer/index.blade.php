@extends('master.home')
@section('main')
<style>
    ul.navbar-nav.ml-auto {
    position: absolute;
    right: 200px;
    top: 13px;
}
a.nav-link {
    padding-left: 20px;
}
</style>
    <div class="row products">
        @foreach ($products as $pro)
            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="{{$pro->image}}"
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
