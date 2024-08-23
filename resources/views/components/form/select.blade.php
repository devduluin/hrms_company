@props([
    'label',
    'name',
    'tags' => false,
    'filter' => false,
    'url',
    'guidelines',
    'required' => '' ?? false,
    'apiUrl',
    'columns',
    'selected' => '',
    'keys' => [],
])
<div class="mt-2 flex-row xl:items-center">
    <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-4">
        <div class="text-left">
            <div class="flex items-center">
                @if (isset($label))
                    <div class="font-medium">{{ $label }}</div>
                @endif
                @if ($required)
                    <div
                        class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                        Required
                    </div>
                @endif
            </div>
            <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">

            </div>
        </div>
    </div>
    <div class="flex-1 sm:w-full mt-3 xl:mt-0">
        <select id="{{ $name }}" name="{{ $name }}" class="disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1"
            {{ $attributes->merge(['class' => 'tom-select w-full'])->except(['id', 'name', 'tags', 'filter']) }}
            data-placeholder="{{ $label }}" data-title="{{ $label }}"
            @if (isset($url)) data-url="{{ $url }}" @endif
            @if (isset($apiUrl)) data-api="{{ $apiUrl }}" @endif
            @if (isset($columns)) data-selectType="{{ $columns }}" @endif
            @if (isset($selected)) data-selected="{{ $selected }}" @endif
            @if (!empty($keys)) data-attributes="{{ json_encode($keys) }}" @endif
            data-placeholder="{{ $label }}" data-title="{{ $label }}"
            @error($name) border-danger @enderror">
            @if (isset($slot))
                {{ $slot }}
            @endif
        </select>
        @if (isset($guidelines))
            <div class="mt-1.5 mr-5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                {{ $guidelines }}
            </div>
        @endif
    </div>
</div>
@include('vendor-common.tomselect')
@pushOnce('js')
    <script>
        initializeTomSelect();
    </script>
@endpushOnce
