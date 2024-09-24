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
