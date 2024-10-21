<div class="card-body">
    <div class="mt-2 flex flex-col px-2 py-2">
        <div class="preview relative">
            <div class="overflow-x-auto">
                <table class="w-full text-left table-education-editable table-edits">
                    <thead class="bg-slate-200/60 dark:bg-slate-200">
                        <tr>
                            <th
                                class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                No</th>
                            <th
                                class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                School/University</th>
                            <th
                                class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                Qualification</th>
                            <th
                                class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                Level</th>
                            <th
                                class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                Year of Graduate</th>
                            <th
                                class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                <i data-lucide="settings" class="inline-block h-5 w-5 mr-2"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="editable-education-table"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="mb-7 mt-4">
    <x-form.button type="button" id="add-education-row" label="Add New Row" style="tertiary"></x-form.button>
</div>
@push('js')
    <script>
        let educationRowCount = 0;

        function createEducationTableRow(rowId, tableId, data = null) {
            let rowNumber = document.querySelectorAll('#' + tableId + ' tr').length + 1;

            console.log(data);

            const id = data ? data.id : '';
            const schoolUniversity = data ? data.school_university : '';
            const qualification = data ? data.qualification : '';
            const level = data ? data.level : 'graduate';
            const yearOfPassing = data ? data.year_of_passing : '';

            return `
        <tr id="${rowId}">
            <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">${rowNumber}</td>
            <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">
                <input type="hidden" name="education_id" id="education_id" value="${id}" />
                <x-form.input id="school_university" value="${schoolUniversity}" name="school_university" placeholder="School/University" />
            </td>
            <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">
                <x-form.input id="qualification" value="${qualification}" name="qualification" placeholder="Qualification" />
            </td>
            <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">
                <select data-tw-merge="" name="level" id="getLevel-${tableId}-${rowId}" class="disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1 mt-2 flex-1">
                    <option value="high_school" ${level === 'high_school' ? 'selected' : ''}>High School</option>
                    <option value="under_graduate" ${level === 'under_graduate' ? 'selected' : ''}>Under Graduate</option>
                    <option value="graduate" ${level === 'graduate' ? 'selected' : ''}>Graduate</option>
                    <option value="post_graduate" ${level === 'post_graduate' ? 'selected' : ''}>Post Graduate</option>
                </select>
            </td>
            <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">
                <x-form.input type="number" id="graduation_year" value="${yearOfPassing}" name="graduation_year" placeholder="Graduation Year" />
            </td>
            <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">
                <button type="button" class="btn-save transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-xs py-1.5 px-2 bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80 w-24 w-24 mr-2" onclick="saveEducationRow('${rowId}', '${tableId}')">Save</button>
                <button type="button" class="btn-delete transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-xs py-1.5 px-2 bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80 w-24 w-24 mr-2" onclick="deleteRow('${rowId}', '${tableId}')">Delete</button>
            </td>
        </tr>`;
            // $('#' + tableId).append(rowHtml);
        }

        function handleGetEducation() {
            const appToken = localStorage.getItem("app_token");
            let employeeId = $("#employee_id").val();

            $.ajax({
                url: 'http://apidev.duluin.com/api/v1/employees/employee_education/all',
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
                            addEducationRowToTable('editable-education-table', 'educationRowCount',
                                education);
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching education data:", error);
                }
            });
        }

        function saveEducationRow(rowId, tableId) {
            const appToken = localStorage.getItem("app_token");
            let employeeId = $("#employee_id").val();
            let $row = $('#' + rowId);
            let educationId = $row.find("input[name=education_id]").val();
            let schoolUniversity = $row.find('input[name="school_university"]').val();
            let qualification = $row.find('input[name="qualification"]').val();
            let level = $row.find('select[name="level"]').val();
            let graduationYear = $row.find('input[name="graduation_year"]').val();
            let urlData;
            let method;

            let postData = {
                school_university: schoolUniversity,
                qualification: qualification,
                level: level,
                year_of_passing: graduationYear,
                company_id: localStorage.getItem("company"),
                employee_id: employeeId,
                employee_rel_id: employeeId,
                id: educationId,
            };

            console.log("eduation id : ", educationId);

            if (educationId) {
                urlData = `http://apidev.duluin.com/api/v1/employees/employee_education/${educationId}`;
                method = 'PUT';
            } else {
                urlData = `http://apidev.duluin.com/api/v1/employees/employee_education`;
                method = 'POST';
            }

            console.log("education ID : ", educationId);

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
                    $row.find("input[name=education_id]").val(response.data.id)
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while saving the row.');
                    console.error(xhr.responseText);
                }
            });
        }

        function addEducationRowToTable(tableId, rowCountVar, data = null) {
            if (typeof window[rowCountVar] === 'undefined' || isNaN(window[rowCountVar])) {
                window[rowCountVar] = 0;
            }
            const tableBody = document.getElementById(tableId);
            const rowId = `${tableId}-row-${++window[rowCountVar]}`;
            tableBody.insertAdjacentHTML('beforeend', createEducationTableRow(rowId, tableId, data));
        }

        function deleteRow(rowId, tableId, data = null) {
            if (data != null) {
                $.ajax({
                    url: `http://apidev.duluin.com/api/v1/structure_earning_deductions/structure_earning_deduction/${data}`,
                    method: 'DELETE',
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem("app_token")}`,
                        "X-Forwarded-Host": `${window.location.protocol}//${window.location.hostname}`,
                    },
                    success: function(response) {
                        toastr.success("Earning Deduction deleted successfully");
                        document.getElementById(rowId).remove();
                        updateRowNumbers(tableId);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error deleting salary component:", error);
                    }
                });
            } else {
                document.getElementById(rowId).remove();
                updateRowNumbers(tableId);
            }
        }

        function updateRowNumbers(tableId) {
            const rows = document.querySelectorAll(`#${tableId} tr`);
            rows.forEach((row, index) => {
                row.querySelector('td:first-child').innerText = index + 1;
            });
        }

        document.getElementById('add-education-row').addEventListener('click', function() {
            addEducationRowToTable('editable-education-table', 'educationRowCount');
        });

        function editRow(rowId) {
            alert('Edit functionality is not yet implemented!');
        }

        handleGetEducation();
    </script>
@endpush
