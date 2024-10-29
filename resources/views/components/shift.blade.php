

<div data-tw-merge="" data-tw-placement="bottom-end" class="dropdown relative inline-block"><button data-tw-merge="" data-tw-toggle="dropdown" aria-expanded="false" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&:hover:not(:disabled)]:bg-secondary/20 [&:hover:not(:disabled)]:dark:bg-darkmode-100/10 w-full sm:w-auto">
    <svg class="mr-2 h-4 w-4 stroke-[1.3]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-list-restart"><path d="M21 6H3"/><path d="M7 12H3"/><path d="M7 18H3"/><path d="M12 18a5 5 0 0 0 9-3 4.5 4.5 0 0 0-4.5-4.5c-1.33 0-2.54.54-3.41 1.41L11 14"/><path d="M11 10v4h4"/></svg>
        Update Shift Assignment</button>
    <div data-transition="" data-selector=".show" data-enter="transition-all ease-linear duration-150" data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1" data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150" data-leave-from="!mt-1 visible opacity-100 translate-y-0" data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">
        <div data-tw-merge="" class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600">
            <div class="p-2">
                <div>
                    <div class="text-left text-slate-500">
                        Select Shift
                    </div>
                    <select data-tw-merge="" onchange="getShiftId(this.value)" id="shift" class="shift-type disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1 mt-2 flex-1">
                
                    </select>
                </div>
                <div class="mt-4 flex items-center">
                    <button type="button" data-tw-merge="" 
                        class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80 ml-auto w-32">
                        Close
                    </button>
                    <form id="updateShiftAssignment">
                        <button id="submitButton" type="submit" data-tw-merge="" 
                            class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary ml-2 w-32">
                            Apply
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="preview relative [&.hide]:overflow-hidden [&.hide]:h-0">
    <div class="text-center">
        <div id="success-notification-content"
            class="py-5 pl-5 pr-14 bg-white border border-slate-200/60 rounded-lg shadow-xl dark:bg-darkmode-600 dark:text-slate-300 dark:border-darkmode-600 hidden flex">
            <i data-tw-merge="" data-lucide="check-circle" class="stroke-[1] w-5 h-5 text-success"></i>
            <div class="ml-4 mr-4">
                <div class="font-medium" id="success-title">...</div>
                <div class="mt-1 text-slate-500" id="success-message">
                    ...
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var shiftTypeId = "";
    $(document).ready(function () {
        loadDataShiftType()
    });

    async function loadDataShiftType() {
        let companyId = localStorage.getItem('company');
        var param = {
            url: "http://apidev.duluin.com/api/v1/companies/shift-type",
            method: "GET",
            data: {
                company_id: localStorage.getItem('company'),
            }
        }

        await transAjax(param).then((result) => {
        let shift = result.data;
        let selectElements = document.getElementsByClassName("shift-type");

        Array.from(selectElements).forEach(selectElement => {
        selectElement.innerHTML = "";

        const defaultOption = document.createElement("option");
        defaultOption.value = "";
        defaultOption.textContent = "--select--";
        defaultOption.disabled = true;
        defaultOption.selected = true;
        selectElement.appendChild(defaultOption);

        shift.forEach((shift) => {
            const option = document.createElement("option");
            option.value = shift.id;
            option.textContent = shift.shift_type_name;
            selectElement.appendChild(option);
            });
        });
        }).catch((error) => {
            console.log(error);
        });
    }

    function getShiftId(value) {
        shiftTypeId = value;
    }
    //shift assignment
    $('#updateShiftAssignment').submit(async function(e) {
        e.preventDefault();

        const checkedEmployeeIds = [];
        document.querySelectorAll('input[name="employee_id"]:checked').forEach(checkbox => {
            checkedEmployeeIds.push(checkbox.value);
        });
        
        console.log(checkedEmployeeIds);
        
        if(checkedEmployeeIds.length <= 0) {
            return alert('Employee cannot be null');
        }

        
        var param = {
            url: "http://apidev.duluin.com/api/v1/attendance/shift-assignment/bulkupdate",
            method: "PUT",
            data: JSON.stringify({
                employee_ids: checkedEmployeeIds,
                shift_type_id: shiftTypeId,
                company_id: localStorage.getItem('company'),
                }
            ),
            processData: false,
            contentType: false,
            cache: false,
        }

        submitButton(true);
        await transAjax(param).then((result) => {
            submitButton(false);
            showSuccessNotification("Shift Assignment", "This shift was successfully implemented.");
            $('#loading').show();
            loadDataShiftAssignment();
        }).catch((err) => {
            submitButton(false);
            console.log(err);
        })
    });

    function submitButton(state) {
        if(state) {
            $("#submitButton").html('Apply...');
            $("#submitButton").attr('disabled', 'disabled');
        }else {
            $("#submitButton").html('Apply');
            $("#submitButton").removeAttr('disabled');
        }
    }
    function showSuccessNotification(title, message) {
        var notificationContent = document.getElementById("success-notification-content");
        document.getElementById("success-title").textContent = title;
        document.getElementById("success-message").textContent = message;

        Toastify({
            node: $("#success-notification-content")
                .clone()
                .removeClass("hidden")[0],
            duration: 3000,
            newWindow: true,
            close: true,
            gravity: "top",
            position: "right",
            stopOnFocus: true,
        }).showToast();
    }
</script>


