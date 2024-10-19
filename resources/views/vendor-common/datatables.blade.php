@pushOnce('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link href="https://cdn.datatables.net/2.1.3/css/dataTables.tailwindcss.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.dataTables.css">
  
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.2/css/buttons.dataTables.min.css">
    
    <style>
        select.dt-input {
            width: 60px;
        }
        div.dt-paging {
            justify-self: end;
        }
    </style>
@endPushOnce

@pushOnce('js')
    
     
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="{{ asset('dist/js/vendors/datatables/DataTables-1.13.3/js/jquery.dataTables.js') }}"></script>
     <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.dataTables.js"></script>
     
     
    <script src="{{ asset('dist/js/vendors/datatables/Buttons-2.3.6/js/dataTables.buttons.min.js') }}"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.dataTables.js"></script> 
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script> 
@endPushOnce

