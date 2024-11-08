<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Product Management')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

</head>
<body>
    @include('includes.navbar')

    @yield('content')

    @include('includes.footer')

    @yield('scripts')
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>
</html>
