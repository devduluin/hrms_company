@props([
    'apiUrl',
    'label',
    'option1',
    'option2',
    'itemData',
])

<div class="flex flex-col box box--stacked col-span-4 rounded-[0.6rem p-5 shadow-sm md:col-span-2 xl:col-span-1 mb-5">
    <div class="flex items-center justify-between gap-10 sm:col-span-1">
        <div class="flex pr-12">
            <div class="text-base font-medium mt-1.5">
                {{ $label }}
            </div>
        </div>
        <div class="select-with-icon">
            <!-- <select class="transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8">
                <option value="This Month">
                    {{ $option1 ?? '' }}
                </option>
                <option value="Last Month">
                    {{ $option2 ?? '' }}
                </option>
            </select> -->
        </div>
    </div>
    <div class="card-body d-flex justify-content-center align-items-center">
    <canvas
            class="donut-chart"
            width="300"
            height="300"
            data-api="{{ $apiUrl }}"
            data-item="{{ $itemData }}"
        ></canvas>
    </div>
</div>
@pushOnce('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('dist/js/components/donut-chart.js') }}"></script>
@endPushOnce
