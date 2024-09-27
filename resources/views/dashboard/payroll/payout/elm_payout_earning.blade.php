@push('css')
    <style>
        .hidden {
            display: none;
        }
    </style>
@endPush
<form id="overview-form" method="post" action="">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-1 xl:grid-cols-1 gap-5 mt-4">
        <div>
            {{-- <div class="mb-7">
                <x-form.button type="button" id="add-earning-row" label="Add New Earning" style="tertiary">
                </x-form.button>
            </div> --}}
            <div class="card-body">
                <div
                    class="relative mb-4 mt-2 rounded-[0.6rem] border border-slate-200/80 dark:border-darkmode-400 mr-5">
                    <div class="absolute left-0 -mt-2 ml-4 bg-white px-3 text-xs uppercase text-slate-500">
                        <div class="-mt-px">Earning</div>
                    </div>
                    <div class="mt-2 flex flex-col gap-3.5 px-5 py-5">
                        <div class="preview relative [&amp;.hide]:overflow-hidden [&amp;.hide]:h-0">
                            <div class="overflow-x-auto">
                                <table class="w-full text-left table-earning-editable table-edits">
                                    <thead class="bg-slate-200/60 dark:bg-slate-200">
                                        <tr>
                                            <th
                                                class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                                Component</th>
                                            <th
                                                class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                                Amount</th>
                                            <th
                                                class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                                <i data-lucide="settings" class="inline-block h-5 w-5 mr-2"></i>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="editable-earning-table">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div
                    class="relative mb-4 mt-4 rounded-[0.6rem] border border-slate-200/80 dark:border-darkmode-400 mr-5">
                    <div class="absolute left-0 -mt-2 ml-4 bg-white px-3 text-xs uppercase text-slate-500">
                        <div class="-mt-px">Deduction</div>
                    </div>
                    <div class="mt-2 flex flex-col gap-3.5 px-5 py-5">
                        <div class="preview relative [&amp;.hide]:overflow-hidden [&amp;.hide]:h-0">
                            <div class="overflow-x-auto">
                                <table class="w-full text-left table-earning-editable table-edits">
                                    <thead class="bg-slate-200/60 dark:bg-slate-200">
                                        <tr>
                                            <th
                                                class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                                Component</th>
                                            <th
                                                class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                                Amount</th>
                                            <th
                                                class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                                <i data-lucide="settings" class="inline-block h-5 w-5 mr-2"></i>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="editable-deduction-table">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-5 mt-4">

    </div>
    <div class="mb-6 mt-4 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
        Totals
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-4">
        <x-form.input id="gross_pay" label="Gross Pay" name="Rp 0,00" readonly />
        <input type="hidden" id="gross_pay_hidden" required />

        <x-form.input id="total_deduction" label="Total Deduction" name="total_deduction" readonly />
        <input type="hidden" id="total_deduction_hidden" required />

        <x-form.input id="net_pay" label="Net Pay" name="Rp 0,00" readonly />
        <input type="hidden" id="net_pay_hidden" required />
    </div>

</form>
@push('js')
    <script>
        $(document).ready(function() {
            function revertToText($row) {
                $row.find('.editable-text').removeClass('hidden');
                $row.find('.editable-input, .editable-select').addClass('hidden');
                $row.find('.editable-deduction-text').removeClass('hidden');
                $row.find('.editable-deduction-input, .editable-deduction-select').addClass('hidden');
                $row.find('.edit').removeClass('hidden');
                $row.find('.save').addClass('hidden');
                $row.find('.edit-deduction').removeClass('hidden');
                $row.find('.save-deduction').addClass('hidden');

                let inputValue = $row.find('.editable-input').val();
                let formattedValue = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(inputValue);

                $row.find('.editable-text').html(formattedValue);

                let inputDeductionValue = $row.find('.editable-deduction-input').val();
                let formattedDeductionValue = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(inputDeductionValue);

                $row.find('.editable-deduction-text').html(formattedDeductionValue);
            }

            $(document).on('click', '.editable-text, .edit', function() {
                var $cell = $(this).closest('tr');
                $cell.find('.edit').addClass('hidden');
                $cell.find('.save').removeClass('hidden');
                $cell.find('.editable-text').addClass('hidden');
                $cell.find('.editable-input').removeClass('hidden');
            });

            $(document).on('click', '.editable-deduction-text, .edit-deduction', function() {
                var $cell = $(this).closest('tr');
                $cell.find('.edit-deduction').addClass('hidden');
                $cell.find('.save-deduction').removeClass('hidden');
                $cell.find('.editable-deduction-text').addClass('hidden');
                $cell.find('.editable-deduction-input').removeClass('hidden');
            });

            // Simpan Perubahan dengan tombol Edit
            $(document).on('click', '.save', function(e) {
                //e.stopPropagation();
                var $row = $(this).closest('tr');
                var id = $row.data('id');
                var name = $row.find('input.editable-input').val();
                var amount = $row.find('select.editable-select').val();
                $row.find('.editable-input, .editable-select').addClass('hidden');
                $row.find('.editable-text').removeClass('hidden');
                let inputValue = $row.find('.editable-input').val();
                $row.find('.edit').removeClass('hidden');
                $row.find('.save').addClass('hidden');
                let formattedValue = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(inputValue);

                $row.find('.editable-text').html(formattedValue);

                // Sum the 'amount' column
                let totalEarningAmount = 0;
                $('.editable-input').each(function() {
                    let value = parseFloat($(this).val()) || 0;
                    totalEarningAmount += value;
                });
                console.log("Total amount : ", totalEarningAmount);
                $("#gross_pay_hidden").val(totalEarningAmount);
                // Display the total sum somewhere on the page
                $('#gross_pay').val(new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(totalEarningAmount));
            });

            $(document).on('click', '.save-deduction', function(e) {
                //e.stopPropagation();
                var $row = $(this).closest('tr');
                var id = $row.data('id');
                var name = $row.find('input.editable-deduction-input').val();
                var amount = $row.find('select.editable-deduction-select').val();
                $row.find('.editable-deduction-input, .editable-deduction-select').addClass('hidden');
                $row.find('.editable-deduction-text').removeClass('hidden');
                let inputValue = $row.find('.editable-deduction-input').val();
                $row.find('.edit-deduction').removeClass('hidden');
                $row.find('.save-deduction').addClass('hidden');
                let formattedValue = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(inputValue);

                $row.find('.editable-deduction-text').html(formattedValue);

                // Sum the 'amount' column
                let totalDeductionAmount = 0;
                $('.editable-deduction-input').each(function() {
                    let value = parseFloat($(this).val()) || 0;
                    totalDeductionAmount += value;
                });
                console.log("Total amount : ", totalDeductionAmount);
                $("#total_deduction_hidden").val(totalDeductionAmount);
                // Display the total sum somewhere on the page
                $('#total_deduction').val(new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(totalDeductionAmount));
            });

            $(document).on('click', function(e) {
                // e.preventDefault();
                if (!$(e.target).closest('.table-earning-editable').length) {
                    $('.table-earning-editable tbody tr').each(function() {
                        revertToText($(this));
                    });
                }

                if (!$(e.target).closest('.table-deduction-editable').length) {
                    $('.table-deduction-editable tbody tr').each(function() {
                        revertToText($(this));
                    });
                }
            });

            $(document).on('click', '.delete', function(e) {
                e.preventDefault();
                if (confirm('Are you sure you want to delete this row?')) {
                    $(this).closest('tr').remove();
                }
            });

            $('#add-earning-row').on('click', function() {
                var newRow = ``;
                $('#editable-earning-table').append(newRow);
            });

            $('#add-deduction-row').on('click', function() {
                var newRow = ``;
                $('#editable-deduction-table').append(newRow);
            });
        });
    </script>
@endPush
