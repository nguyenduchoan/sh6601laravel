<!DOCTYPE htm>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container">
            
                
            
            <a class="navbar-brand" href="#">My Shopping</a>
            {{-- <ul class="nav navbar-nav"> --}}
            {{-- @foreach ($cates as $cate)
                <li><a href="{{ route('home.index') }}">Home</a></li>
                <li><a href="#">{{$cate->name}}</a></li>
            @endforeach</ul> --}}
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!—Nếu chưa đăng nhập -->
                        @if (!Auth::guard('cus')->check())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('customer.login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('customer.register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <!—Nếu đã đăng nhập -->
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre>
                                        {{ Auth::guard('cus')->user()->name }} <span class="caret"></span>
                                    </a>
                                <li class="nav-item">
                                    <a class="nav-link" href="#!">{{ __('Logout') }}</a>
                                </li>
                                </li>
                        @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('main')
    </div>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
