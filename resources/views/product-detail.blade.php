@php use Illuminate\Support\Str; @endphp
        <!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biolife - Organic Food</title>
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400i,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&amp;display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main-color04.css')}}">
</head>
<body class="biolife-body">

<!-- Preloader -->
<div id="biof-loading">
    <div class="biof-loading-center">
        <div class="biof-loading-center-absolute">
            <div class="dot dot-one"></div>
            <div class="dot dot-two"></div>
            <div class="dot dot-three"></div>
        </div>
    </div>
</div>

<!-- HEADER -->
<header id="header" class="header-area style-01 layout-03">
    <div class="header-top bg-main hidden-xs">
        <div class="container">
            <div class="top-bar left">
                <ul class="horizontal-menu">
                    <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>Organic@company.com</a></li>
                    <li><a href="#">Free Shipping for all Order of $99</a></li>
                </ul>
            </div>
            <div class="top-bar right">
                <ul class="social-list">
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                </ul>
                <ul class="horizontal-menu">
                    <li><a href="login.html" class="login-link"><i
                                    class="biolife-icon icon-login"></i>Login/Register</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header-middle biolife-sticky-object ">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-2 col-md-6 col-xs-6">
                    <a href="index-2.html" class="biolife-logo"><img src="{{asset('assets/images/organic-3.png')}}"
                                alt="biolife logo" width="135" height="34"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom hidden-sm hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="vertical-menu vertical-category-block">

                        <div class="block-title">
                                <span class="menu-icon">
                                    <span class="line-1"></span>
                                    <span class="line-2"></span>
                                    <span class="line-3"></span>
                                </span>
                            <span class="menu-title">All departments</span>
                            <span class="angle" data-tgleclass="fa fa-caret-down"><i class="fa fa-caret-up"
                                        aria-hidden="true"></i></span>
                        </div>
                        <div class="wrap-menu">
                            <ul class="menu clone-main-menu">
                                @foreach($cats as $cat)
                                    <li class="menu-item">
                                        <a href="{{route('category', ['id'=>$cat->id])}}" class="menu-name"
                                                data-title="{{ $cat->name }}">{{ $cat->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 padding-top-2px">
                    <nav class="biolife-nav" style="margin: 20px">
                        <ul>
                            <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
                            <li class="nav-item"><a href="{{route('category',['id'=>$category[0]['id']])}}"
                                        class="permal-link">{{ $category[0]['name'] }}</a></li>
                            <li class="nav-item"><span class="current-page">{{$product->name}}</span></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

<!--Hero Section-->

<!--Navigation section-->


<div class="page-contain single-product">
    <div class="container">

        <!-- Main content -->
        <div id="main-content" class="main-content">

            <!-- summary info -->
            <div class="sumary-product single-layout">
                <div class="media">
                    <ul class="biolife-carousel slider-for"
                            data-slick='{"arrows":false,"dots":false,"slidesMargin":30,"slidesToShow":1,"slidesToScroll":1,"fade":true,"asNavFor":".slider-nav"}'>
                        @foreach($images as $image)
                            <li><img src="{{asset('assets/images/products/'.$image->image)}}" alt="" width="500"
                                        height="500"></li>
                        @endforeach
                    </ul>
                    <ul class="biolife-carousel slider-nav"
                            data-slick='{"arrows":false,"dots":false,"centerMode":false,"focusOnSelect":true,"slidesMargin":10,"slidesToShow":4,"slidesToScroll":1,"asNavFor":".slider-for"}'>
                        @foreach($images as $image)
                            <li><img src="{{asset('assets/images/products/'.$image->image)}}" alt="" width="88"
                                        height="88"></li>
                        @endforeach
                    </ul>
                </div>
                <div class="product-attribute">
                    <h3 class="title">{{$product->name}}</h3>
                    <div class="rating">
                        <p class="star-rating"><span style="width: {{ $avgStar*20 }}%;"></span></p>
                        <span class="review-count">({{$totalReviewOfProduct}} Reviews)</span>
                        <span class="qa-text">Q&amp;A</span>
                        <b class="category">By: {{$category[0]['name']}}</b>
                    </div>
                    <span class="sku">Sku: #76584HH</span>
                    <p class="excerpt">{{$product->description}}</p>
                    <div class="price">
                        <ins><span class="price-amount"><span class="currencySymbol">$</span>{{$product->price}}</span>
                        </ins>
                    </div>
                    <div class="shipping-info">
                        <p class="shipping-day">3-Day Shipping</p>
                        <p class="for-today">Pree Pickup Today</p>
                    </div>
                </div>
                <div class="action-form">
                    <div class="quantity-box">
                        <span class="title">Quantity:</span>
                        <div class="qty-input">
                            <input type="text" name="qty12554" value="1" data-max_value="20" data-min_value="1"
                                    data-step="1">
                            <a href="#" class="qty-btn btn-up"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                            <a href="#" class="qty-btn btn-down"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="buttons">
                        <a href="#" class="btn add-to-cart-btn">add to cart</a>
                        <p class="pull-row">
                            <a href="#" class="btn wishlist-btn">wishlist</a>
                            <a href="#" class="btn compare-btn">compare</a>
                        </p>
                    </div>
                    <div class="location-shipping-to">
                        <span class="title">Ship to:</span>
                        <select name="shipping_to" class="country">
                            <option value="-1">Select Country</option>
                            <option value="america">America</option>
                            <option value="france">France</option>
                            <option value="germany">Germany</option>
                            <option value="japan">Japan</option>
                        </select>
                    </div>
                    <div class="social-media">
                        <ul class="social-list">
                            <li><a href="#" class="social-link"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </li>
                            <li><a href="#" class="social-link"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            </li>
                            <li><a href="#" class="social-link"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            </li>
                            <li><a href="#" class="social-link"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                            </li>
                            <li><a href="#" class="social-link"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="acepted-payment-methods">
                        <ul class="payment-methods">
                            <li><img src="{{asset('assets/images/card1.jpg')}}" alt="" width="51" height="36"></li>
                            <li><img src="{{asset('assets/images/card2.jpg')}}" alt="" width="51" height="36"></li>
                            <li><img src="{{asset('assets/images/card3.jpg')}}" alt="" width="51" height="36"></li>
                            <li><img src="{{asset('assets/images/card4.jpg')}}" alt="" width="51" height="36"></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Tab info -->
            <div class="product-tabs single-layout biolife-tab-contain">
                <div class="tab-head">
                    <ul class="tabs">
                        <li class="tab-element active"><a href="#tab_1st" class="tab-link">Products Descriptions</a>
                        </li>
                        <li class="tab-element"><a href="#tab_4th" class="tab-link">Customer Reviews
                                <sup>({{$totalReviewOfProduct}})</sup></a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="tab_1st" class="tab-contain desc-tab active">
                        <p class="desc">{{$product->description}}</p>
                        <div class="desc-expand">
                            <span class="title">{{$product->name}}</span>
                            <ul class="list">
                                <li>100% real fruit ingredients</li>
                                <li>100 fresh fruit bags individually wrapped</li>
                                <li>Blending Eastern & Western traditions, naturally</li>
                            </ul>
                        </div>
                    </div>
                    <div id="tab_4th" class="tab-contain review-tab" style="border-bottom: 0">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                    <div class="rating-info">
                                        <p class="index"><strong class="rating">@if($avgStar)
                                                    {{round($avgStar, 1)}}
                                                @else
                                                    0
                                                @endif </strong>out of 5
                                        </p>
                                        <div class="rating"><p class="star-rating"><span
                                                        style="width: {{ $avgStar*20 }}%;"></span>
                                            </p></div>
                                        <p class="see-all">See all {{$totalReviewOfProduct}} reviews</p>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                                    <div class="review-form-wrapper">
                                        <span class="title">Submit your review</span>
                                        <form action="#" name="frm-review" method="post">
                                            <div class="comment-form-rating">
                                                <label>1. Your rating of this products:</label>
                                                <p class="stars">
                                                        <span>
                                                            <a class="btn-rating" data-value="star-1" href="#"><i
                                                                        class="fa fa-star-o" aria-hidden="true"></i></a>
                                                            <a class="btn-rating" data-value="star-2" href="#"><i
                                                                        class="fa fa-star-o" aria-hidden="true"></i></a>
                                                            <a class="btn-rating" data-value="star-3" href="#"><i
                                                                        class="fa fa-star-o" aria-hidden="true"></i></a>
                                                            <a class="btn-rating" data-value="star-4" href="#"><i
                                                                        class="fa fa-star-o" aria-hidden="true"></i></a>
                                                            <a class="btn-rating" data-value="star-5" href="#"><i
                                                                        class="fa fa-star-o" aria-hidden="true"></i></a>
                                                        </span>
                                                </p>
                                            </div>
                                            <p class="form-row wide-half">
                                                <input type="text" name="name" value="" placeholder="Your name">
                                            </p>
                                            <p class="form-row wide-half">
                                                <input type="email" name="email" value="" placeholder="Email address">
                                            </p>
                                            <p class="form-row">
                                                <textarea name="comment" id="txt-comment" cols="30" rows="10"
                                                        placeholder="Write your review here..."></textarea>
                                            </p>
                                            <p class="form-row">
                                                <button type="submit" name="submit">submit review</button>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="comments" style="height: 500px; overflow-y: scroll"
                                    class="@if($totalReviewOfProduct === 0) hidden @endif">
                                <ol class="commentlist">
                                    @foreach($comments as $comment)
                                        <li class="review">
                                            <div class="comment-container">
                                                <div class="row">
                                                    <div class="comment-content col-lg-8 col-md-9 col-sm-8 col-xs-12">
                                                        <p class="comment-in"><span
                                                                    class="post-name">{{ Str::limit($comment->content, 20, '...') }}</span><span
                                                                    class="post-date">{{$comment->update_at}}</span></p>
                                                        <div class="rating"><p class="star-rating"><span style="width: {{ $comment->star*20 }}%;"></span></p></div>
                                                        @foreach($users as $user)
                                                            @if($user->id === $comment->user_id)
                                                                <p class="author">by: <b>{{$user->name}}</b></p>
                                                            @endif
                                                        @endforeach
                                                        <p class="comment-text">{{$comment->content}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- related products -->


        </div>
    </div>
</div>

<!-- FOOTER -->
<!--Footer For Mobile-->
<!-- Scroll Top Button -->
<a class="btn-scroll-top"><i class="biolife-icon icon-left-arrow"></i></a>

<script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('assets/js/slick.min.js')}}"></script>
<script src="{{asset('assets/js/biolife.framework.js')}}"></script>
<script src="{{asset('assets/js/functions.js')}}"></script>
</body>

</html>