@props([
    'h1',
    'h2' => '',
    'h3' => '',
    'body1' => '',
    'body2' => '',
    'body3' => '',
])

<style>
    .table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .table th, .table td {
        padding: 12px;
        text-align: left;
    }
    
    .table thead {
        background-color: #f9f9f9;
    }
    .table th {
        background-color: #f9f9f9;
    }
    
    .table td {
        border-bottom: 1px solid #e0e0e0;
    }

</style>


<div class="table-responsive relative overflow-x-auto sm:rounded-lg">
    <table class="table w-full">
        <thead>
            <tr>
                <th>
                    <input type="checkbox" aria-label="Select all" />
                </th>
                <th>{{ $h1 }}</th>
                <th>{{ $h2 }}</th>
                <th>{{ $h3 }}</th>
            </tr>
        </thead>
    </table>
</div>
@include('vendor-common.datatables')
