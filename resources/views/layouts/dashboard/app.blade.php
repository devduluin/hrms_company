<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="opacity-0" lang="en"><!-- BEGIN: Head -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" value="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>{{ $title }} - {{ $page_title }}</title>

    <link rel="icon" href="{{ asset('img/logo/duluin.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('img/logo/duluin.png') }}" sizes="16x16" type="image/png">
    <!-- BEGIN: CSS Assets-->

    <link rel="stylesheet" href="{{ asset('dist/css/vendors/litepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/tiny-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/tippy.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/themes/hurricane.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/toastify.css') }}">
    @stack('css')
    @include('vendor-common.fontawesome')
     
    <script src="{{ asset('dist/js/vendors/dom.js') }}"></script>
    <script> let apiUrl = "{{ config('apiendpoints.gateway') }}"; </script>
</head>
<!-- END: Head -->

<body>
    @include('layouts.dashboard.toastify')
    @yield('content')
    @include('layouts.dashboard.footer')
