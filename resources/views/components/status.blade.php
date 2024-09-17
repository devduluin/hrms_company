@props([
    'status',
])
@if ($status == 'active')
    <div class="flex items-center rounded-md border border-success/10 bg-success/10 px-1.5 py-px text-xs font-medium text-success">
        <span class="-mt-px">
            Active
        </span>
    </div>
@endif
@if ($status == 'inactive')
    <div class="flex items-center rounded-md border border-danger/10 bg-danger/10 px-1.5 py-px text-xs font-medium text-danger">
        <span class="-mt-px">
            Inactive
        </span>
    </div>
@endif
