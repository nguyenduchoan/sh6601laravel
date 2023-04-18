<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Css/detail.css') }}">
    <title>Product Detail Page</title>
</head>
<body>
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
                <button></button>
        </div>
    </div>
    
</body>

</html>