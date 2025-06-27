<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js', 'resources/js/header.js','resources/js/book.js', 'resources/css/landing.css'])
    <script preload src="https://kit.fontawesome.com/d544c5e79c.js" crossorigin="anonymous"></script>

</head>

<body class="h-100">

    @include("components.header")

    @yield('content')

    @include("components.footer")



</body>

</html>