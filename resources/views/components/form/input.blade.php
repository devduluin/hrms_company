@props([
    'type' => 'text',
    'id',
    'name',
    'label' => null,
    'required' => '' ?? false,
    'guidelines',
    'readonly' => '' ?? false,
    'placeholder' => null,
    'value' => null,
])
@php
    if ($label != null) {
        $margin = 'mt-2';
    } else {
        $margin = 'mt-0';
    }
@endphp
<div {{ $attributes->merge(['class' => $margin . ' flex-row xl:items-center'])->except(['id', 'label', 'name']) }}>
    @if ($label != null)
        <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-4">
            <div class="text-left">
                <div class="flex items-center">
                    @if (isset($label))
                        <div class="font-medium" for="{{ $id }}">{{ $label }}</div>
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
    @endif
    <div class="flex-1 sm:w-full gap-1 {{ $margin }} xl:mt-0">
        <input id="{{ $id }}" type="{{ $type }}" name="{{ $name }}" value="{{ $value }}"
            placeholder="{{ $label == null ? $placeholder : $label }}" @if ($readonly) readonly @endif
            class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 @error($name) border-danger @enderror">
        @if ($required)
            @error($name)
                <div data-tw-merge="" class="text-xs text-slate-500 mt-2 @error($name) text-danger @enderror">
                    {{ $errors->messages()[$name][0] }}
                </div>
            @enderror
        @endif
        @if (isset($guidelines))
            <div data-tw-merge="" class="mt-1.5 mr-5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                {{ $guidelines }}
            </div>
        @enderror
</div>
</div>
