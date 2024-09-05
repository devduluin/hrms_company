@props([
    'label',
    'icon',
    'url' => ''
])

<div class="text-left ">
    <a class="flex items-center box p-4 hover:bg-blue-500 hover:text-white" href="{{ $url }}">
        <i data-tw-merge="" data-lucide="{{ $icon }}" class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
        <div class="font-medium mr-2">{{ $label ?? '' }}</div>
    </a>    
</div>