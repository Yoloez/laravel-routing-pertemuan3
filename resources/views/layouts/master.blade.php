<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'template')</title>
     {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}
</head>
<body>
    @include('components.header')

    <main style="background-color: #FFF0CE; width:100%; border: black 1px solid">
        @yield('content')
    </main>

    @include('components.footer')
</body>
</html>