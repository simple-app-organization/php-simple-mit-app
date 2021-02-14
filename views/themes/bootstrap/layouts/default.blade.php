<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
    <div id="layout-jumbotron" class="layout container-fluid">
        <header>
            @include('includes.header')
        </header>
        
        <div role="main" class="page">
            @yield('content')
        </div>

        <footer id="footer" class="bg-dark">
            @include('includes.footer')
        </footer>
    </div>
</body>
</html>