@props([
    'id'=> '' , 
    'class' => '',
    'h1',
    'h2' => '',
    'h3' => '',
    'h4' => '',
    'h5' => '',
    'h6' => '',
    'h7' => '',
    'h8' => '',
    'body1' => '',
    'body2' => '',
    'body3' => '',
])

<style>
    .table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #e0e0e0;
        border-radius: 20px;
        background-color: black;
    }
    
    .table th, .table td {
        padding-right: auto;
        padding-left: 12px;
        padding-bottom: 12px;
        padding-top: 12px;
        text-align: left;
    }
    
    .table th {
        background-color: #F2F4F7;
    }
    
    
    .table td {
        border-bottom: 1px solid #e0e0e0;
    }

</style>


<div class="table-responsive relative overflow-x-auto sm:rounded-lg">
    <table class="table w-full" id="{{ $id }}">
        <thead class="bg-slate-700">
            <tr>
                <th >
                    <input type="checkbox" aria-label="Select all" />
                </th>
                <th>{{ $h1 }}</th>
                <th>{{ $h2 }}</th>
                <th>{{ $h3 }}</th>
                <th>{{ $h4 ?? '' }}</th>
                <th>{{ $h5 ?? '' }}</th>
                <th>{{ $h6 ?? '' }}</th>
                <th>{{ $h7 ?? '' }}</th>
                <th>{{ $h8 ?? '' }}</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>


@include('vendor-common.datatables')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Fungsi untuk cek semua checkbox
        $('#selectAll').on('click', function() {
            $('tbody input[type="checkbox"]').prop('checked', this.checked);
            toggleAssignShiftButton();
        });

        // Event listener untuk setiap checkbox di dalam tbody
        $('tbody').on('change', 'input[type="checkbox"]', function() {
            toggleAssignShiftButton();
        });

        // Fungsi untuk menampilkan atau menyembunyikan tombol Assign Shift
        function toggleAssignShiftButton() {
            // Hitung jumlah checkbox yang dicentang
            var checkedCount = $('tbody input[type="checkbox"]:checked').length;

            if (checkedCount > 0) {
                $('#assignShiftContainer').fadeIn(); // Munculkan tombol jika ada yang dicentang
            } else {
                $('#assignShiftContainer').fadeOut(); // Sembunyikan tombol jika tidak ada yang dicentang
            }
        }
    });
</script>

