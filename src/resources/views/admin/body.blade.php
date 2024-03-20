<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bit Fighting</title>

    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/css/vendor.bundle.base.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/js/select.dataTables.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/admin/css/vertical-layout-light/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<style>
    .select2-selection__choice{
        padding: 10px 0px 10px 35px !important;
    }

    .select2-selection__choice__remove {
        padding: 10px !important;
    }
</style>

<body>
    @yield('box-content')
</body>

<script src="{{ asset('assets/admin/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets/admin/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/admin/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('assets/admin/js/template.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/jquery/jquery-3.7.1.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ asset('assets/admin/vendors/jquery-steps/jquery.steps.min.js') }}"></script>

@yield('scripts')

</html>
