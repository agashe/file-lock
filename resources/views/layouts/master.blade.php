<!DOCTYPE html>
<html lang="en">
<head>
    <title>FileLock</title>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- [Favicon] -->
    <link rel="shortcut icon" href="{{ asset('assets/images/lock-icon.png') }}" type="image/x-icon">
    <!-- [Favicon] -->

    <!-- [CSS] -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- [CSS] -->
</head>
<body>
    <header>
        <h1><span>File</span>Lock</h1>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>FileLock &copy; {{ date('Y') }}</p>
    </footer>

    <!-- [JS] -->
    <script src="{{ asset('assets/js/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- [JS] -->
</body>
</html>