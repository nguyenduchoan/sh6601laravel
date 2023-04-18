<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Css/slide.css') }}">
    <link rel="stylesheet" href="{{ asset('Css/reset.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="nav">
        <ul>
            <li><a href="!">Title</a></li>
            <li><a href="!" class="active">Home</a></li>
            <li><a href="!">Mo dau</a></li>
        </ul>
    </div>

    <div class="content">
        <div class="list_product">
            @foreach ($data as $product)
            {{-- {{dd($product->image)}} --}}
            <div class="item">
                <img src="{{ asset($product->image) }}" alt="" class="item_product_img">
                <p class="title">{{ $product->title }}</p>
                <p class="price">price: {{$product->price}}</p>
                <div class="button">
                    <button class="View__btn">View</button>
                    <button class="Add__btn">Add Cart</button>
                </div>
            </div>
            @endforeach
        </div>
        
    </div>
</body>
</html>