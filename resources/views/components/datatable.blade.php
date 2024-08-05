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
    'company_id' => '',
])
<div class="relative overflow-x-auto">
    <table id="{{ $id }}" {{ $attributes->merge(['class' => 'display'])->except(['id', 'trigger']) }}>
        <thead>
            <tr>
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

            {{ $id }} = $({{ $id }}).DataTable({
                processing: true,
                serverSide: true,
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, 'All'],
                ],
                ajax: ajax,
                columns: {{ $id }}TableColumns,
                order: @json($order),
                @if ($downloadOptions)
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                @endif
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
