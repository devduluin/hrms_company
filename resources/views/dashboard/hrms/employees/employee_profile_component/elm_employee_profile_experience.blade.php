<div class="card-body">
    <div class="mt-2 flex flex-col px-2 py-2">
        <div class="preview relative">
            <div class="overflow-x-auto">
                <table class="w-full text-left table-experience-editable table-edits">
                    <thead class="bg-slate-200/60 dark:bg-slate-200">
                        <tr>
                            <th
                                class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                No</th>
                            <th
                                class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                Company</th>
                            <th
                                class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                Designation</th>
                            <th
                                class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                Salary</th>
                            <th
                                class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                Address</th>
                            <th
                                class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                <i data-lucide="settings" class="inline-block h-5 w-5 mr-2"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="editable-experience-table"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="mb-7 mt-4">
    <x-form.button type="button" id="add-experience-row" label="Add New Row" style="tertiary"></x-form.button>
</div>
@push('js')
    <script>
        let experienceRowCount = 0;

        function createExperienceTableRow(rowId, tableId, data = null) {
            let rowNumber = document.querySelectorAll('#' + tableId + ' tr').length + 1;

            const id = data ? data.id : '';
            const company = data ? data.company : '';
            const designation = data ? data.designation : '';
            const salary = data ? data.salary : '0';
            const address = data ? data.address : '';

            return `
        <tr id="${rowId}">
            <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">${rowNumber}</td>
            <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">
                <input type="hidden" name="experience_id" id="experience_id" value="${id}" />
                <x-form.input id="company" value="${company}" name="company" placeholder="Company" />
            </td>
            <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">
                <x-form.input id="designation" value="${designation}" name="designation" placeholder="Designation" />
            </td>
            <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">
                <x-form.input type="number" id="salary" value="${salary}" name="salary" placeholder="Salary" />
            </td>
            <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">
                <x-form.input type="text" id="address" value="${address}" name="address" placeholder="Address" />
            </td>
            <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">
                <button type="button" class="btn-save transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-xs py-1.5 px-2 bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80 w-24 w-24 mr-2" onclick="saveExperienceRow('${rowId}', '${tableId}')">Save</button>
                <button type="button" class="btn-delete transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-xs py-1.5 px-2 bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80 w-24 w-24 mr-2" onclick="deleteRow('${rowId}', '${tableId}')">Delete</button>
            </td>
        </tr>`;
            // $('#' + tableId).append(rowHtml);
        }

        function handleGetExperience() {
            const appToken = localStorage.getItem("app_token");
            let employeeId = $("#employee_id").val();

            $.ajax({
                url: 'http://apidev.duluin.com/api/v1/employees/employee_job_experience/all',
                method: 'POST',
                data: JSON.stringify({
                    "company_id": localStorage.getItem("company"),
                    "employee_id": employeeId,
                }),
                contentType: 'application/json',
                dataType: 'json',
                headers: {
                    Authorization: `Bearer ${appToken}`,
                    "X-Forwarded-Host": `${window.location.protocol}//${window.location.hostname}`,
                },
                success: function(response) {
                    if (response.success && response.data.length > 0) {
                        response.data.forEach((education, index) => {
                            let rowId = `education-row-${index + 1}`;
                            addExperienceRowToTable('editable-experience-table', 'experienceRowCount',
                                education);
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching education data:", error);
                }
            });
        }

        function saveExperienceRow(rowId, tableId) {
            const appToken = localStorage.getItem("app_token");
            let employeeId = $("#employee_id").val();
            let $row = $('#' + rowId);
            let experienceId = $row.find("input[name=experience_id]").val();
            let company = $row.find('input[name="company"]').val();
            let designation = $row.find('input[name="designation"]').val();
            let salary = $row.find('input[name="salary"]').val();
            let address = $row.find('input[name="address"]').val();
            let urlData;
            let method;

            let postData = {
                company: company,
                designation: designation,
                salary: salary,
                address: address,
                company_id: localStorage.getItem("company"),
                employee_id: employeeId,
                employee_rel_id: employeeId,
                id: experienceId,
            };

            if (experienceId) {
                urlData = `http://apidev.duluin.com/api/v1/employees/employee_job_experience/${experienceId}`;
                method = 'PUT';
            } else {
                urlData = `http://apidev.duluin.com/api/v1/employees/employee_job_experience`;
                method = 'POST';
            }

            $.ajax({
                url: urlData,
                type: method,
                data: JSON.stringify(postData),
                headers: {
                    Authorization: `Bearer ${appToken}`,
                    "X-Forwarded-Host": `${window.location.protocol}//${window.location.hostname}`,
                },
                contentType: 'application/json',
                success: function(response) {
                    alert('Row saved successfully!');
                    console.log(response);
                    $row.find("input[name=experience_id]").val(response.data.id)
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while saving the row.');
                    console.error(xhr.responseText);
                }
            });
        }

        function addExperienceRowToTable(tableId, rowCountVar, data = null) {
            if (typeof window[rowCountVar] === 'undefined' || isNaN(window[rowCountVar])) {
                window[rowCountVar] = 0;
            }
            const tableBody = document.getElementById(tableId);
            const rowId = `${tableId}-row-${++window[rowCountVar]}`;
            tableBody.insertAdjacentHTML('beforeend', createExperienceTableRow(rowId, tableId, data));
        }

        function deleteRow(rowId, tableId, data = null) {
            // if (data != null) {
            //     $.ajax({
            //         url: `http://apidev.duluin.com/api/v1/structure_earning_deductions/structure_earning_deduction/${data}`,
            //         method: 'DELETE',
            //         headers: {
            //             Authorization: `Bearer ${localStorage.getItem("app_token")}`,
            //             "X-Forwarded-Host": `${window.location.protocol}//${window.location.hostname}`,
            //         },
            //         success: function(response) {
            //             toastr.success("Earning Deduction deleted successfully");
            //             document.getElementById(rowId).remove();
            //             updateRowNumbers(tableId);
            //         },
            //         error: function(xhr, status, error) {
            //             console.error("Error deleting salary component:", error);
            //         }
            //     });
            // } else {
            //     document.getElementById(rowId).remove();
            //     updateRowNumbers(tableId);
            // }
        }

        function updateRowNumbers(tableId) {
            const rows = document.querySelectorAll(`#${tableId} tr`);
            rows.forEach((row, index) => {
                row.querySelector('td:first-child').innerText = index + 1;
            });
        }

        document.getElementById('add-experience-row').addEventListener('click', function() {
            addExperienceRowToTable('editable-experience-table', 'experienceRowCount');
        });

        function editRow(rowId) {
            alert('Edit functionality is not yet implemented!');
        }

        handleGetExperience();
    </script>
@endpush
