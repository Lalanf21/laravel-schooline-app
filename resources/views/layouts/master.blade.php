<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title')
    </title>

    {{-- style --}}
    @stack('before-style')
    @include('includes.style')
    @stack('after-style')

</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            @include('includes.navbar')
            @include('includes.sidebar')

            {{-- main content --}}
            <div class="main-content">
                @yield('content')
            </div>

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; <?= date('Y') ?> <div class="bullet"></div>
                    <div class="footer-right">
                        Nurul L Az zahra
                    </div>
            </footer>

        </div>
    </div>

    @stack('before-script')
    @include('includes.script')
    @stack('after-script')



</body>
</html>

