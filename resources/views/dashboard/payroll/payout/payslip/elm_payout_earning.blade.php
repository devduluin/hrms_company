@push('css')
    <style>
        .hidden {
            display: none;
        }
    </style>
@endPush
<div class="grid grid-cols-1 md:grid-cols-1 xl:grid-cols-1 gap-5 mt-4">
    <div>
        <div class="mb-7">
            {{-- <x-form.button type="button" id="add-earning-row" label="Add New Earning" style="tertiary"></x-form.button> --}}
            <button type="button" id="add-earning-row"
                class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium text-xs cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-slate-200 text-slate-700 dark:border-danger shadow-md w-100">Add
                New Earning</button>
        </div>
        <div class="card-body">
            <div class="relative mb-4 mt-2 rounded-[0.6rem] border border-slate-200/80 dark:border-darkmode-400 mr-5">
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
        <div class="mb-7">
            <button type="button" id="add-deduction-row"
                class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium text-xs cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-slate-200 text-slate-700 dark:border-danger shadow-md w-100">Add
                New Deduction</button>
        </div>
        <div class="card-body">
            <div class="relative mb-4 mt-4 rounded-[0.6rem] border border-slate-200/80 dark:border-darkmode-400 mr-5">
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
    <x-form.input id="gross_pay" label="Gross Pay" name="gross_pay" readonly />
    <input type="hidden" id="gross_pay_hidden" name="gross_pay_hidden" required />

    <x-form.input id="total_deduction" label="Total Deduction" name="total_deduction" readonly />
    <input type="hidden" id="total_deduction_hidden" name="total_deduction_hidden" required />

    <x-form.input id="net_pay" label="Net Pay" name="net_pay" readonly />
    <input type="hidden" id="net_pay_hidden" name="net_pay_hidden" required />
</div>
@push('js')
    <script>
        $(document).ready(function() {
            let earningRowCount = 0;
            let deductionRowCount = 0;
            // Function to add a new row to either earnings or deductions
            function addRow(type, rowCountVar) {
                const tableBody = type === 'earning' ? '#editable-earning-table' : '#editable-deduction-table';
                let rowNumber = document.querySelectorAll(tableBody + ' tr').length + 1;
                console.log("row number: " + rowNumber);
                const rowId = `editable-${type}-table-row-${rowNumber}`;

                if (type == 'earning') {
                    const rowHtml = `
                <tr id="${rowId}" data-id="${rowNumber}">
                    <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">
                        <span class="editable-component-text"></span>
                        <select name="salary_component_id" class="editable-select disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1" id="getComponent-editable-${type}-table-${rowNumber}" onclick="handleGetComponent('${rowNumber}', '${type}')">
                            <option value="">Select Salary Component</option>
                        </select>
                    </td>
                    <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">
                        <span class="editable-text"></span>
                        <input id="amount" name="salary_component_amount" type="number" class="editable-input disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10" placeholder="0">
                    </td>
                    <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">
                        <button type="button" data-tw-merge
                            class="save transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80">Save</button>
                        <button type="button" data-tw-merge
                            class="edit transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80 hidden">Edit</button>
                            <button type="button" data-tw-merge
                            class="delete transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80 hidden">delete</button>
                    </td>
                </tr>`;
                    $(tableBody).append(rowHtml);
                } else {
                    const rowHtml = `
                <tr id="${rowId}" data-id="${rowNumber}">
                    <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">
                        <span class="editable-component-text"></span>
                        <select name="salary_component_id" class="editable-select disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1" id="getComponent-editable-${type}-table-${rowNumber}" onclick="handleGetComponent('${rowNumber}', '${type}')">
                            <option value="">Select Salary Component</option>
                        </select>
                    </td>
                    <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">
                        <span class="editable-deduction-text"></span>
                        <input id="amount" name="salary_component_amount" type="number" class="editable-deduction-input disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10" placeholder="0">
                    </td>
                    <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">
                        <button type="button" data-tw-merge
                            class="save transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80">Save</button>
                        <button type="button" data-tw-merge
                            class="edit transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80 hidden">Edit</button>
                            <button type="button" data-tw-merge
                            class="delete transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80 hidden">delete</button>
                    </td>
                </tr>`;
                    $(tableBody).append(rowHtml);
                }
            }

            // Handle click to add earning or deduction rows
            $('#add-earning-row').on('click', function() {
                addRow('earning', 'earningRowCount');
            });
            $('#add-deduction-row').on('click', function() {
                addRow('deduction', 'deductionRowCount');
            });

            // Toggle edit mode
            function toggleEditMode($row, editMode) {
                $row.find('.editable-text, .editable-deduction-text').toggleClass('hidden', editMode);
                $row.find('.editable-input, .editable-deduction-input, .editable-select').toggleClass('hidden', !
                    editMode);
                // console.log("selected value : ", $row.find('.editable-select').val());
                if ($row.find('.editable-select').val() == '') {
                    showErrorNotification('error', 'Please select salary component');
                } else {
                    $row.find('.editable-component-text').toggleClass('hidden', editMode);
                    $row.find('.editable-component-text').text($row.find('.editable-select option:selected')
                        .text());
                }

                if ($row.find('.editable-input').val() == '') {
                    showErrorNotification('error', 'Please enter value');
                } else {
                    $row.find('.editable-text').text(formatCurrency($row.find('.editable-input').val()));
                }

                if ($row.find('.editable-deduction-input').val() == '') {
                    showErrorNotification('error', 'Please enter value');
                } else {
                    $row.find('.editable-deduction-text').text(formatCurrency($row.find('.editable-deduction-input')
                        .val()));
                }

                $row.find('.edit').toggleClass('hidden', editMode);
                $row.find('.save').toggleClass('hidden', !editMode);
                $row.find('.delete').toggleClass('hidden', editMode);
            }

            // Format currency in IDR
            function formatCurrency(value) {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(value || 0);
            }

            // Save and update totals on Save button click
            $(document).on('click', '.save', function() {
                const $row = $(this).closest('tr');
                let inputValue = parseFloat($row.find('.editable-input').val()) || 0;

                $row.find('.editable-text').text(formatCurrency(inputValue));
                toggleEditMode($row, false);
                calculateTotals();
            });

            // delete row and adjust calculation
            // Event: Delete row and recalculate totals
            $(document).on('click', '.delete', function() {
                const $row = $(this).closest('tr');
                $row.remove(); // Remove row from DOM
                calculateTotals(); // Adjust totals
            });

            // Add new row

            // Calculate totals for earnings and deductions
            function calculateTotals() {
                let grossPay = 0,
                    totalDeduction = 0;

                $('#editable-earning-table .editable-input').each(function() {
                    grossPay += parseFloat($(this).val()) || 0;
                });
                $('#editable-deduction-table .editable-deduction-input').each(function() {
                    totalDeduction += parseFloat($(this).val()) || 0;
                });

                $('#gross_pay').val(formatCurrency(grossPay));
                $('#total_deduction').val(formatCurrency(totalDeduction));
                $('#net_pay').val(formatCurrency(grossPay - totalDeduction));
            }

            // Switch to edit mode on Edit button click
            $(document).on('click', '.edit', function() {
                toggleEditMode($(this).closest('tr'), true);
            });
        });

        function handleGetComponent(rowId, tableId, data = null) {
            console.log(tableId);
            const appToken = localStorage.getItem("app_token");
            const componentType = tableId;
            // const tableId = `#editable-${componentType}-table`;
            const $selectElement = $(`#getComponent-editable-${componentType}-table-${rowId}`);
            // console.log(`#getComponent-${tableId}-${rowId}`);
            const $preloader = $('#preloader-editable-' + componentType + '-table-' + rowId);
            if ($selectElement.find('option').length > 1) {
                return;
            }

            $preloader.show();

            $.ajax({
                url: 'http://apidev.duluin.com/api/v1/salary_components/salary_component/datatables',
                method: 'POST',
                data: JSON.stringify({
                    company_id: localStorage.getItem("company"),
                    "type": componentType,
                    "draw": 0,
                    "start": 0,
                    "length": 10,
                }),
                contentType: 'application/json',
                dataType: 'json',
                headers: {
                    Authorization: `Bearer ${appToken}`,
                    "X-Forwarded-Host": `${window.location.protocol}//${window.location.hostname}`,
                },
                success: function(response) {
                    const salaryComponents = response.data;
                    const $selectElement = $('#getComponent-editable-' + componentType + '-table-' +
                        rowId);
                    $selectElement.html('<option value="">Select Salary Component</option>');
                    $.each(salaryComponents, function(index, component) {
                        $selectElement.append($('<option>', {
                            value: component.id,
                            text: component.name,
                            // selected: selectedId === component.id
                        }));
                    });
                    $preloader.hide();
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching salary components:", error);
                    $preloader.hide();
                }
            });
        }
    </script>
@endpush

{{-- @push('js')
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

                countTotalNetPay(totalEarningAmount, $("#total_deduction_hidden").val());
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

                countTotalNetPay($("#gross_pay_hidden").val(), totalDeductionAmount);
            });

            function countTotalNetPay(grossPay, totalDeduction) {
                let netPay = parseFloat(grossPay) - parseFloat(totalDeduction);
                $("#net_pay_hidden").val(netPay);
                // Display the total sum somewhere on the page
                $('#net_pay').val(new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(netPay));
            }

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
                console.log("earning row clicked");
                // check if employee, salary structure are empty
                if (($("#employee_id").val() === "") || ($("#salary_stucture").val() === "")) {
                    showErrorNotification('error', 'Please select employee and salary structure');
                }
                var newRow = ``;
                $('#editable-earning-table').append(newRow);
            });

            $('#add-deduction-row').on('click', function() {
                // check if employee, salary structure are empty
                if (($("#employee_id").val() === "") || ($("#salary_stucture").val() === "")) {
                    showErrorNotification('error', 'Please select employee and salary structure');
                }
                var newRow = ``;
                $('#editable-deduction-table').append(newRow);
            });
        });
    </script>
@endPush --}}
