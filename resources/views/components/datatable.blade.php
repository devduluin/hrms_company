@props([
    'id',
    'class' => '',
    'thead' => '',
    'serverSide' => '',
    'method' => 'GET',
    'filter' => [],
    'url',
    'trigger',
    'order' => '' ?? [[0, 'ASC']],
    'downloadOptions' => false,
    'company_id' => '',
])


<div class="relative overflow-x-auto sm:rounded-lg">
    <table id="{{ $id }}"
        {{ $attributes->merge(['class' => 'min-w-full divide-y divide-gray-200 text-sm text-left text-gray-500 ' . $class])->except(['id', 'trigger']) }}>
        <!-- Tailwind styled thead -->
        <thead class="bg-[#e6e6e6] text-xs text-gray-700 uppercase tracking-wider border border-[#aaa]">
            <tr class="text-left text-sm leading-4 font-medium">
                <!-- Apply additional styles for header cells -->
                {{ $thead }}
            </tr>
        </thead>
    </table>
</div>
@include('vendor-common.datatables')

@push('js')
    <script>
        let {{ $id }} = $('#{{ $id }}');
        if ({{ $id }}) {
            let {{ $id }}Columns = $({{ $id }}).find('thead tr th');
            let {{ $id }}TableColumns = [];
            const appToken = localStorage.getItem('app_token');

            $.each({{ $id }}Columns, function(idx, item) {
                var orderable = $(item).attr('orderable') !== 'false' || $(item).attr('orderable') === undefined;
                var searchable = $(item).attr('searchable') !== 'false' || $(item).attr('searchable') === undefined;
                var visible = $(item).attr('visible') !== 'false' || $(item).attr('visible') === undefined;
                var render = $(item).data('render');

                let tmp = {
                    data: $(item).data('value'),
                    orderable: orderable,
                    searchable: searchable,
                    visible: visible,
                };

                if (typeof render !== 'undefined') {
                    tmp.render = function(data, type, row, meta) {
                        if (typeof window[render] === 'function') {
                            return window[render](data, type, row, meta);
                        } else {
                            console.error('Render function is not defined or is not a function.');
                            return data;
                        }
                    };
                }
                {{ $id }}TableColumns.push(tmp);
            });

            let ajax = {
                url: '{{ $url }}',
                method: "{{ $method }}",
                headers: {
                    'Authorization': `Bearer ${appToken}`,
                    'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                },
                data: function(d) {
                    let filters = {};
                    @if (count($filter) > 0)
                        @foreach ($filter as $name => $elem)
                            filters.{{ $name }} = $('{{ $elem }}').val();
                        @endforeach
                    @endif

                    return {
                        draw: d.draw,
                        start: d.start,
                        length: d.length,
                        order: d.order,
                        search: d.search ? d.search.value : '',
                        company_id: localStorage.getItem("company"),
                        ...filters
                    };
                },
            }

            if ($.fn.DataTable.isDataTable('#{{ $id }}')) {
                $('#{{ $id }}').DataTable().destroy();
            }

            {{ $id }} = $({{ $id }}).DataTable({
                deferRender: true,
                scroller: true,
                stateSave: true,
                processing: true,
                serverSide: true,
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, 'All'],
                ],
                ajax: ajax,
                columns: {{ $id }}TableColumns,
                order: @json($order),
                language: {
                    searchPlaceholder: "Search here", // Add placeholder to the search input
                    search: "", // Remove default label for search
                },
                @if ($downloadOptions)
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                @endif
                initComplete: function() {
                    // Style the search input
                    $('.dataTables_filter input').addClass(
                        'px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500'
                    );

                    // Modify page length dropdown with the provided structure and classes
                    $('.dataTables_length').addClass(
                        'block sm:flex flex-col items-start xl:flex-row xl:items-center gap-y-2 mb-4');
                    $('.dataTables_length label').addClass(
                        'inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right mr-3 whitespace-nowrap');
                    $('.dataTables_length select').addClass(
                        'bg-[length:20px_auto] disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 bg-chevron-black transition duration-200 ease-in-out w-full text-sm border-slate-300/60 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 flex-1'
                    );
                },
            });

            @if (isset($trigger))
                @foreach ($trigger as $key => $func)
                    {{ $id }}.on('click', '{{ $key }}', function(e) {
                        window['{{ $func }}'](e, $(this));
                    });
                @endforeach
            @endif
        }
    </script>
@endpush
