@props([
    'id',
    'class' => '',
    'thead' => '',
    'serverSide' => '',
    'method' => 'GET',
    'filter' => [],
    'url',
    'trigger',
    'order' => [[0, 'ASC']],
    'downloadOptions' => false,
    'dtcomponent' => 'true',
    'dtheight' => '400',
    'company_id' => '',
    'customButton' => 'false',
    'customButtonText' => '',
    'customButtonFunction' => '',
])

<div class="relative overflow-x-auto sm:rounded-lg">
    <table id="{{ $id }}" style="width:100%"
        {{ $attributes->merge(['class' => 'min-w-full divide-y divide-gray-200 text-sm text-left text-gray-500 ' . $class])->except(['id', 'trigger']) }}>
        <!-- Tailwind styled thead -->
        <thead class="bg-[#e6e6e6] text-xs text-gray-700 tracking-wider border border-[#aaa]">
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
        let buttonsConfig = [{
                extend: 'copyHtml5',
                exportOptions: {
                    orthogonal: 'export'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    orthogonal: 'export'
                }
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    orthogonal: 'export'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    orthogonal: 'export'
                }
            }
        ];

        if ({{ $customButton }}) {
            buttonsConfig.unshift({
                text: `{{ $customButtonText }}`,
                action: function(e, dt, node, config) {
                    // `{{ $customButtonFunction }}`
                },
                className: 'custom-btn'
            });
        }

        $.extend($.fn.dataTable.defaults, {
            deferRender: true,
            scroller: true,
            // stateSave: true,
            responsive: true,
            autoWidth: true,
            selected: true,
            scrollX: true,
            scrollY: {{ $dtheight }},
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, 'All'],
            ],
            pageLength: 25,
            buttons: buttonsConfig,

            dom: '@if ($dtcomponent == 'true') <"grid grid-cols-2 gap-4 mb-4"Bf> @endif<"grid grid-cols-1 gap-4 mb-4"t>@if ($dtcomponent == 'true')<"grid grid-cols-3 gap-4 mb-4"lip>@endif',
            language: {
                search: 'Search: ',
                searchPlaceholder: 'keywoard...',
                lengthMenu: '<span class="me-3">Show:</span> _MENU_',
                paginate: {
                    'first': 'First',
                    'last': 'Last',
                    'next': document.dir == "rtl" ? '&larr;' : '&rarr;',
                    'previous': document.dir == "rtl" ? '&rarr;' : '&larr;'
                }
            }
        });

        if ({{ $id }}) {
            let {{ $id }}Columns = $({{ $id }}).find('thead tr th');
            let {{ $id }}TableColumns = [];
            const appToken = localStorage.getItem('app_token');

            $.each({{ $id }}Columns, function(idx, item) {
                var orderable = $(item).attr('orderable') || 'false';
                var searchable = $(item).attr('searchable') !== 'false' || $(item).attr('searchable') === undefined;
                var visible = $(item).attr('visible') !== 'false' || $(item).attr('visible') === undefined;
                var render = $(item).data('render');
                let tmp = {};
                if ($(item).data('value') == 'id') {
                    tmp = {
                        data: null, // Data is null as we want to auto-generate the index
                        orderable: false, // Set to false if you don't want this column to be orderable
                        searchable: false, // Set to false as it does not need to be searchable
                        render: function(data, type, row, meta) {
                            return `<input type="checkbox" name="selected_employees[]" value='${JSON.stringify(row)}'>`;
                        }
                    }
                } else if ($(item).data('value') == 'no') {
                    tmp = {
                        data: null, // Data is null as we want to auto-generate the index
                        orderable: false, // Set to false if you don't want this column to be orderable
                        searchable: false, // Set to false as it does not need to be searchable
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart +
                                1; // Display the row number (1-based index)
                        }
                    }
                } else {
                    tmp = {
                        data: $(item).data('value'),
                        orderable: orderable,
                        searchable: searchable,
                        visible: visible,
                    };
                }

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
                    // console.log(d);
                    let filters = {};
                    @if (count($filter) > 0)
                        @foreach ($filter as $name => $elem)
                            if ($('{{ $elem }}').val() != '') {

                                if ($('{{ $elem }} option:selected').text() != 'All Department') {
                                    filters.{{ $name }} = $('{{ $elem }}').val();
                                }
                            }
                        @endforeach
                    @endif

                    // Add query parameters from URL
                    const urlParams = new URLSearchParams(window.location.search);
                    urlParams.forEach((value, key) => {
                        filters[key] = value;
                    });

                    let searchableColumns = {{ $id }}TableColumns
                        .filter(col => col.searchable === true && col
                            .data) // Ensure `searchable: true` and `data` is not empty
                        .map(function(col, index) {
                            return {
                                data: col.data,
                                searchable: col.searchable,
                                orderable: col.orderable
                            };
                        });

                    return {
                        draw: d.draw,
                        start: d.start,
                        length: d.length,
                        order: d.order,
                        columns: searchableColumns,
                        search: d.search ? d.search.value : '',
                        company_id: localStorage.getItem("company"),
                        ...filters
                    };
                },
                beforeSend: function() {
                    $('.dt-input').addClass(
                        'disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type=`file`]]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 rounded-[0.5rem] pl-9 sm:w-64'
                    );
                },
                dataSrc: function(response) {
                    if (response.message === "Data not found") {
                        return [];
                    } else {
                        return response.data;
                    }
                },
                error: function(xhr, status, error) {
                    $('#{{ $id }}_processing').hide();
                    console.error('AJAX request failed:', error);
                },
                complete: function(response) {
                    
                    $('#{{ $id }}_processing').hide();
                    if (response.responseJSON.message === "Data not found") {
                        $('#{{ $id }} tbody').html(
                            '<tr><td colspan="10" class="text-center">No data found</td></tr>'
                        );


                    }
                }
            }

            if ($.fn.DataTable.isDataTable('#{{ $id }}')) {
                $('#{{ $id }}').DataTable().destroy();
            }

            // console.log("Disini : ", @json($order));

            {{ $id }} = $({{ $id }}).DataTable({
                order: @json($order),
                processing: true,
                serverSide: true,
                ajax: ajax,
                columns: {{ $id }}TableColumns,


                @if ($downloadOptions)
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                @endif
                render: function(data, type, row, meta) {

                },
                createdRow: function(row, data, index) {
                    //$('td', row).eq(-1).addClass('text-center');
                },
                initComplete: function() {

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
