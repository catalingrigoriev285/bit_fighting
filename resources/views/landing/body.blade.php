<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bit Fighting</title>

    <link rel="stylesheet" href="{{ asset('assets/landing/vendors/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/vendors/owl-carousel/css/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/vendors/aos/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/style.min.css') }}">
</head>

<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
    @include('landing.partials.header')
    @yield('box-content')
</body>

<script src="{{ asset('assets/landing/vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/landing/vendors/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/landing/vendors/owl-carousel/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/landing/vendors/aos/js/aos.js') }}"></script>
<script src="{{ asset('assets/landing/js/landingpage.js') }}"></script>

</html>
