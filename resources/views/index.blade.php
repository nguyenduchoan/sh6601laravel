@extends('layouts.main')
@section('main')
    <div class="page-contain">

        <!-- Main content -->
        <div id="main-content" class="main-content">

            <!--Block 01: Vertical Menu And Main Slide-->
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 hidden-sm hidden-xs">
                        <div class="biolife-vertical-menu none-box-shadow  ">
                            <div class="vertical-menu vertical-category-block always ">
                                <div class="block-title">
                                    <span class="menu-icon">
                                        <span class="line-1"></span>
                                        <span class="line-2"></span>
                                        <span class="line-3"></span>
                                    </span>
                                    <span class="menu-title">All categories</span>
                                    <span class="angle" data-tgleclass="fa fa-caret-down"><i class="fa fa-caret-up"
                                                aria-hidden="true"></i></span>
                                </div>
                                <div class="wrap-menu">
                                    <ul class="menu clone-main-menu">
                                        @foreach($cats as $cat)
                                            <li class="menu-item">
                                                <a href="{{ route('category',['id'=>$cat->id]) }}" class="menu-name"
                                                        data-title="{{ $cat->name }}">{{ $cat->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-12">
                        {{--                    @yield('products')--}}
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-md-3">
                                    <div class="thumbnail">
                                        <img src="{{asset('assets/images/products/p-01.jpg')}}" alt="">
                                        <div class="caption">
                                            <h3>{{ $product->name }}</h3>
                                            <p>{{ $product->price }} $</p>
                                            <p><a href="#" class="btn btn-primary" role="button">View</a>
                                                <a href="#" class="btn btn-default" role="button">Add to cart</a></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="biolife-panigations-block" style="border: none; margin-bottom: 20px; margin-top: 0; padding-top: 10px">
                            <ul class="panigation-contain">
                                <li><a href="{{Request::url().'?page='.($currentPage-1)}}" class="link-page prev @if($currentPage === 1) hidden @endif"><i class="fa fa-angle-left"
                                                aria-hidden="true"></i></a></li>
                                @for($i = 1; $i <= $totalPage;$i++)
                                    <li><a href="{{ Request::url().'?page='.$i }}" class="link-page @if($currentPage === $i) current-page @endif">{{$i}}</a></li>
                                @endfor
                                <li><a href="{{Request::url().'?page='.($currentPage+1)}}" class="link-page next @if($currentPage === $totalPage) hidden @endif"><i class="fa fa-angle-right"
                                                aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection