@props([
    'label',
    'icon',
    'url' => '',
    'status' => ''
])

<div class="text-left ">
    <a class="flex items-center box p-4 text-black hover:bg-blue-500 hover:text-white" href=" @if($status != 'comming_soon') {{ $url }} @else {{ $url }}  @endif">
        <i data-tw-merge="" data-lucide="{{ $icon }}" class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
        <div class="font-medium mr-2">{{ $label ?? '' }}</div>
        @if($status == 'comming_soon')
            <div class="ml-2.5 rounded-md border bg-blue-young bg-blue-theme px-2 py-0.5 text-xs text-white dark:bg-darkmode-300 dark:text-slate-400 items-end">
                Comming Soon
            </div>
        @endif
    </a>    
</div>