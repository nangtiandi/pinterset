<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="{{asset('img/logo.svg')}}" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery Store</title>
    <meta name="title" content="Gallery Store - CM Developer">
    <meta name="description" content="Only image can be upload in this website.It is testing for my laravel project.Please advice me.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://socialite.cmprogrammer.com">
    <meta property="og:title" content="Gallery Store - CM Developer">
    <meta property="og:description" content="Only image can be upload in this website.It is testing for my laravel project.Please advice me.">
    <meta property="og:image" content="{{asset('img/logo.svg')}}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://socialite.cmprogrammer.com">
    <meta property="twitter:title" content="Gallery Store - CM Developer">
    <meta property="twitter:description" content="Only image can be upload in this website.It is testing for my laravel project.Please advice me.">
    <meta property="twitter:image" content="{{asset('img/logo.svg')}}">
    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/theme.css')}}">
{{--    <link rel="stylesheet" href="{{asset('css/app.css')}}">--}}
{{--    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">--}}
<!-- Primary Meta Tags -->

</head>
<body>
@include('user.nav')
<main role="main">
    @yield('content')
</main>

@include('user.footer')
