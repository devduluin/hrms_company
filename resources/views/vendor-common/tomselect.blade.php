@pushonce('css')
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/tom-select.css') }}">
@endpushonce
@pushonce('js')
    <script src="{{ asset('dist/js/vendors/tom-select.js') }}"></script>
    <script src="{{ asset('dist/js/components/base/tom-select.js') }}"></script>
    <script>
        initializeTomSelect();
    </script>
@endpushonce
