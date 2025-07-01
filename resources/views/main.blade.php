<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('SITE_NAME')}}</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/icon.png') }}">
    <meta property="og:image" content="{{ asset('assets/img/og.png') }}">
    <meta name="description" content="{{env('SITE_DESCRIPTION')}}">
    <meta name="author" content="innovativa.com.mx">
    <meta property="og:description" content="{{env('SITE_DESCRIPTION')}}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://navegartours.com.mx">




    @vite(['resources/scss/app.scss', 'resources/js/app.js', 'resources/js/header.js','resources/js/book.js', 'resources/css/landing.css'])
    <script preload src="https://kit.fontawesome.com/d544c5e79c.js" crossorigin="anonymous"></script>

</head>

<body class="h-100">

    @include("components.header")

    @yield('content')

    @include("components.footer")



</body>

</html>