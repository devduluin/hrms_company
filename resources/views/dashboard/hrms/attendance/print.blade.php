<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}">
    <title>Print</title>
</head>
<body>
    <div class="container">
        <div class="grid grid-cols-12 gap-x-6 gap-y-10">
            <div class="col-span-12">
                <div class="mt-1.5 flex flex-col">
                    <div class="box flex flex-col p-5">
                        <div class="table-responsive relative overflow-x-auto sm:rounded-lg">
                            <table data-tw-merge="" class="w-full text-left border-b border-slate-200/60">
                                <thead data-tw-merge="" class="">
                                    <tr data-tw-merge="" class="" id="daysHeader">
                                        <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-bold text-slate-500">
                                            No.
                                        </td>
                                        <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-bold text-slate-500">
                                            ID
                                        </td>
                                        <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-bold text-slate-500">
                                            Employee Name
                                        </td>
                                    </tr>
                                </thead>
                                <tbody id="attendanceBody">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    const appToken = localStorage.getItem('app_token');
    async function transAjax(data) {
        html = null;
        data.headers = {
            'Authorization': `Bearer ${appToken}`,
            'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`,
            'Content-Type': 'application/json',
        }
        await $.ajax(data).done(function(res) {
                html = res;
            })
            .fail(function() {
                return false;
            })
        return html
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        function generateYears() {
            let currentYear = new Date().getFullYear();
            let years = [];
            for (let i = currentYear - 10; i <= currentYear + 10; i++) {
                years.push(i);
            }
            return years;
        }

        function generateDays(month, year) {
            let date = new Date(year, month, 1);
            let days = [];
            const dayNames = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
            while (date.getMonth() === month) {
                days.push({
                    day: date.getDate(),
                    dayName: dayNames[date.getDay()]
                });
                date.setDate(date.getDate() + 1);
            }
            return days;
        }

        let companyId = localStorage.getItem("company");
        async function generateEmployeeData() {
            var param = {
                url: "{{ $apiReportAttendance }}"+`?company_id=${companyId}&month=10&year=2024`,
                method: "GET"
            }

            return await transAjax(param).then((result) => {
                var repotAttendace = [];
                var response = result.data;
                response.forEach((data, index) => {
                    repotAttendace.push({
                        no: index + 1,
                        id: data.employee_id_rel.employee_id,
                        name: data.employee_id_rel.first_name + ' ' + data.employee_id_rel.last_name,
                        shift: data.shift,
                        attendance: data.attendance
                    });
                });
                return repotAttendace;
            });
        }

        function populateYears() {
            const yearSelect = $('#yearSelect');
            const years = generateYears();
            years.forEach(year => {
                yearSelect.append(`<option value="${year}">${year}</option>`);
            });
        }

        async function populateTable(month, year) {
            const days = generateDays(month, year);
            const employees = await generateEmployeeData();
            
            let daysHeader = $('#daysHeader');
            let attendanceBody = $('#attendanceBody');
            
            daysHeader.find('th:gt(3)').remove(); // Remove existing day headers, keep first 4 columns
            
            days.forEach(day => {
                daysHeader.append(`<th class="py-2 px-4 border-b border-t border-slate-200/60 ${day.dayName == "Sat" ? 'bg-red-300' : 'bg-slate-50'} ${day.dayName == "Sun" ? 'bg-red-300' : 'bg-slate-50'} py-4 font-bold text-slate-500">${day.day} ${day.dayName}</th>`);
            });
            
            attendanceBody.empty(); // Clear existing data
            
            employees.forEach(employee => {
                let row = `<tr>
                    <td class="py-2 px-4 border-b">${employee.no}</td>
                    <td class="py-2 px-4 border-b">${employee.id}</td>
                    <td class="py-2 px-4 border-b">${employee.name}</td>`;
                days.forEach(day => {
                    let attendanceStatus = employee.attendance[day.day]; // Accessing attendance data by day
                    row += `<td class="py-2 px-4 border-b ${day.dayName == "Sat" ? 'bg-red-100' : ''} ${day.dayName == "Sun" ? 'bg-red-100' : ''} ${attendanceStatus == 'P' ? 'text-green-800'  : 'text-red-800'} font-bold">
                                ${attendanceStatus || ''}
                            </td>`;
                });
                row += `</tr>`;
                attendanceBody.append(row);
            });
            window.print();
        }

        $('#monthSelect, #yearSelect').change(function() {
            let selectedMonth = $('#monthSelect').val();
            let selectedYear = $('#yearSelect').val();
            populateTable(parseInt(selectedMonth), parseInt(selectedYear));
        });

        populateYears();
        populateTable(new Date().getMonth(), new Date().getFullYear());

    });
</script>
</html>
