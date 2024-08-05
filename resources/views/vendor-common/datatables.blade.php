@pushOnce('css')
    <link href="{{ asset('dist/js/vendors/datatables/Buttons-2.3.5/css/buttons.bootstrap5.css') }}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/2.1.3/css/dataTables.tailwindcss.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endPushOnce

@pushOnce('js')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('dist/js/vendors/datatables/JSZip-2.5.0/jszip.min.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/datatables/pdfmake-0.1.36/vfs_fonts.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/datatables/Buttons-2.3.6/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/datatables/Buttons-2.3.6/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/datatables/Buttons-2.3.6/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/datatables/Buttons-2.3.6/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/datatables/Responsive-2.4.1/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/datatables/Responsive-2.4.1/js/responsive.bootstrap5.js') }}"></script>
@endPushOnce
