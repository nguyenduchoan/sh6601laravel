@php use Illuminate\Support\Facades\Auth; @endphp
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
            name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>Biolife - Organic Food</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}"/>
{{--    <link href="https://fonts.googleapis.com/css?family=Cairo:400,600,700&amp;display=swap" rel="stylesheet">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Poppins:600&amp;display=swap" rel="stylesheet">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400i,700i" rel="stylesheet">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Ubuntu&amp;display=swap" rel="stylesheet">--}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}"/>
{{--    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('assets/css/slick.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('assets/css/main-color04.css')}}">--}}
</head>
<body class="bg-gray-100">
<div class="container h-screen mx-auto">
    <nav class="flex justify-between h-[50px] items-center mx-10">
        <span class="text-2xl">LARAVEL</span>
        @if(!Auth::guard('web')->check())
            <!--Nếu chưa đăng nhập-->
            <div>
                <a href="{{route('customer.login')}}" class="px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-300 hover:text-red-500">Login</a>
                <a href="{{route('customer.register')}}" class="px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-300 hover:text-red-500">Register</a>
            </div>
        @else
            <!--Nếu đã đăng nhập-->
            <div class="relative">
                <button class="flex items-center text-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        id="user-menu" aria-haspopup="true">
                    <span>{{ Auth::guard('web')->user()->name }}</span>
                    <svg class="ml-2 -mr-0.5 h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                        <path fill-rule="evenodd" d="M3 6a2 2 0 114 0 2 2 0 01-4 0zM13 6a2 2 0 114 0 2 2 0 01-4 0z"/>
                    </svg>
                </button>

                <div class="hidden absolute z-50 right-0 mt-2 w-48 bg-white rounded-md shadow-lg overflow-hidden"
                        aria-labelledby="user-menu" role="menu">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                role="menuitem">Logout</button>
                    </form>
                </div>
            </div>
        @endif
    </nav>
    @yield('main');
</div>

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