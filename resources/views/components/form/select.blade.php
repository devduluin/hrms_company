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

{{-- @dump($selected) --}}

<div class="mt-3 flex-row xl:items-center">
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
            <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3"></div>
        </div>
    </div>
    <div class="flex-1 sm:w-full w-96 mt-3 xl:mt-0">
        <select id="{{ $name }}" name="{{ $name }}"
            {{ $attributes->merge(['class' => 'mt-3 tom-select w-full'])->except(['id', 'name', 'tags', 'filter']) }}
            data-placeholder="{{ $label }}" data-title="{{ $label }}"
            @if (isset($url)) data-url="{{ $url }}" @endif
            @if (isset($method)) data-method="{{ $method }}" @endif
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
        $(document).ready(function() {
            initializeTomSelect();
        });
    </script>
@endpushOnce
