<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" datatarget="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    arialabel="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!—Nếu chưa đăng nhập -->
                            @if (!Auth::guard('cus')->check())
                                <li class="nav-item">
                                    <a class="navlink" href="{{ route('customer.login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="navlink" href="{{ route('customer.register') }}">{{ __('Register') }}</a>
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
                                        <a class="nav-link" href="">{{ __('Logout') }}</a>
                                    </li>
                                    </li>
                            @endif
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
