@props([
    'type' => 'submit',
    'id',
    'label',
    'style',
    'icon',
    'url',
])
@if ($style == 'primary')
    <button type="{{ $type }}" id="{{ $id }}" url="{{ $url ?? '' }}"
        class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary shadow-md w-100">
        @if (isset($icon))
            <i data-tw-merge="" data-lucide="{{ $icon }}" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
        @endif
        {{ $label }}
    </button>
@endif
@if ($style == 'secondary')
    <button type="{{ $type }}" id="{{ $id }}" url="{{ $url ?? '' }}"
        class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-primary text-primary dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-100">
        @if (isset($icon))
            <i data-tw-merge="" data-lucide="{{ $icon }}" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
        @endif
        {{ $label }}
    </button>
@endif
@if ($style == 'tertiary')
    <button type="{{ $type }}" id="{{ $id }}" url="{{ $url ?? '' }}"
        class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium text-xs cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-slate-200 text-slate-700 dark:border-danger shadow-md w-100">
        @if (isset($icon))
            <i data-tw-merge="" data-lucide="{{ $icon }}" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
        @endif
        {{ $label }}
    </button>
@endif
