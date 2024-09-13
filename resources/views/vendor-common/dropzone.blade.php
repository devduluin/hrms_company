@pushOnce('css')
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/highlight.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/themes/dagger.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}">
@endPushOnce
@pushOnce('js')
    <script src="{{ asset('dist/js/vendors/dropzone.js') }}"></script>
    {{-- <script src="{{ asset('dist/js/components/base/dropzone.js') }}"></script> --}}
@endPushOnce
