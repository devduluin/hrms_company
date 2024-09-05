@props([
    'label',
    'amount',
    'icon',
    'percentage',
    'period',
])

<div class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
    <div class="text-base text-slate-500">{{ $label ?? '' }}</div>
    <div class="mt-1.5 text-2xl font-medium text-right">{{ $amount }}</div>
    <div class="col-2">
        <div class="flex justify-end gap-2">
            <div class="mt-2 flex rounded-full border border-danger/10 bg-danger/10 py-[2px] pl-[7px] pr-8 text-xs font-medium text-danger">
                <i data-tw-merge="" data-lucide="{{ $icon }}" class="ml-px mr-2 h-4 w-4 stroke-[1.5] side-menu__link_icon"></i>
                {{ $percentage }}
            </div>
            <div class="pt-3 whitespace-nowrap text-xs text-slate-500">
                {{ $period }}
            </div>
        </div>
    </div>
</div>