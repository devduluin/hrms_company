<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="opacity-0" lang="en"><!-- BEGIN: Head -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>{{  $data['title'] }} - {{  $data['page_title'] }}</title>
    <!-- BEGIN: CSS Assets-->
 
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/litepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/tiny-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/tippy.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/themes/hurricane.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}"> 
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<!-- END: Head -->
<body>
 
@yield('content')
@include('layouts.dashboard.footer')