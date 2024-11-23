@props([
    'label',
    'name',
    'tags' => false,
    'class' => '',
    'filter' => false,
    'url',
    'guidelines',
    'required' => '' ?? false,
    'apiUrl',
    'detailApiUrl' => null,
    'columns',
    'selected' => '',
    'keys' => [],
    'data' => [],
    'detailApiColumns' => null,
    'customfunction' => null,
])

        <select id="{{ $name }}" name="{{ $name }}" 
            {{ $attributes->merge(['class' => $class . ' tom-select w-full'])->except(['id', 'name', 'tags', 'filter']) }}
            data-placeholder="{{ $label }}" data-title="{{ $label }}"
            @if (isset($url)) data-url="{{ $url }}" @endif
            @if (isset($method)) data-method="{{ $method }}" @endif
            @if (isset($apiUrl)) data-api="{{ $apiUrl }}" @endif
            @if (isset($detailApiUrl)) data-detail-api="{{ $detailApiUrl }}" @endif
            @if (isset($columns)) data-selectType="{{ $columns }}" @endif
            @if (isset($selected)) data-selected="{{ $selected }}" @endif
            @if (isset($customfunction)) data-function="{{ $customfunction }}" @endif
            @if (!empty($keys)) data-attributes="{{ json_encode($keys) }}" @endif
            @if (!empty($detailApiColumns)) data-detail-attributes="{{ $detailApiColumns }}" @endif
            @if (!empty($data)) data-dependant="{{ json_encode($data) }}" @endif
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
     
@include('vendor-common.tomselect')

@pushOnce('js')
    <script>
        initializeTomSelect();
    </script>
@endpushOnce
