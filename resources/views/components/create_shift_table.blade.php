@props([
    'id'=> '' , 
    'class' => '',
    'h1',
    'h2' => '',
    'h3' => '',
    'h4' => '',
    'h5' => '',
    'h6' => '',
    'h7' => '',
    'h8' => '',
    'body1' => '',
    'body2' => '',
    'body3' => '',
    'apiUrl' => ''
])

<style>
    .table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #e0e0e0;
        border-radius: 20px;
        background-color: black;
    }
    
    .table th, .table td {
        padding-right: auto;
        padding-left: 12px;
        padding-bottom: 12px;
        padding-top: 12px;
        text-align: left;
    }
    
    .table th {
        background-color: #F2F4F7;
    }
    .table td {
        border-bottom: 1px solid #e0e0e0;
    }

</style>

<div class="table-responsive relative overflow-x-auto sm:rounded-lg">
    <table data-tw-merge="" class="w-full text-left border-b border-slate-200/60">
        <thead data-tw-merge="" class="">
            <tr data-tw-merge="" class="">
                <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 w-5 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500">
                    <input id="selectAll" data-tw-merge="" type="checkbox" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50">
                </td>
                <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500">
                    Employee Name
                </td>
                <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500">
                    Company
                </td>
                <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500">
                   Department
                </td>
                <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500">
                    Designantion
                </td>
                {{-- <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 w-36 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500">
                    Action
                </td> --}}
            </tr>
        </thead>
        <tbody id="employeeTable">
            <tr id="loading">
                <td colspan="6">
                    <div class="col-span-6 flex flex-col items-center justify-end sm:col-span-3 xl:col-span-2">
                        <span class="h-8 w-8">
                            <svg class="h-full w-full" width="20" viewBox="0 0 135 140" xmlns="http://www.w3.org/2000/svg" fill="#64748b">
                                <rect y="10" width="15" height="120" rx="6">
                                    <animate values="120;110;100;90;80;70;60;50;40;140;120" attributeName="height" begin="0.5s" dur="1s" calcMode="linear" repeatCount="indefinite"></animate>
                                    <animate values="10;15;20;25;30;35;40;45;50;0;10" attributeName="y" begin="0.5s" dur="1s" calcMode="linear" repeatCount="indefinite"></animate>
                                </rect>
                                <rect x="30" y="10" width="15" height="120" rx="6">
                                    <animate values="120;110;100;90;80;70;60;50;40;140;120" attributeName="height" begin="0.25s" dur="1s" calcMode="linear" repeatCount="indefinite"></animate>
                                    <animate values="10;15;20;25;30;35;40;45;50;0;10" attributeName="y" begin="0.25s" dur="1s" calcMode="linear" repeatCount="indefinite"></animate>
                                </rect>
                                <rect x="60" width="15" height="140" rx="6">
                                    <animate values="120;110;100;90;80;70;60;50;40;140;120" attributeName="height" begin="0s" dur="1s" calcMode="linear" repeatCount="indefinite"></animate>
                                    <animate values="10;15;20;25;30;35;40;45;50;0;10" attributeName="y" begin="0s" dur="1s" calcMode="linear" repeatCount="indefinite"></animate>
                                </rect>
                                <rect x="90" y="10" width="15" height="120" rx="6">
                                    <animate values="120;110;100;90;80;70;60;50;40;140;120" attributeName="height" begin="0.25s" dur="1s" calcMode="linear" repeatCount="indefinite"></animate>
                                    <animate values="10;15;20;25;30;35;40;45;50;0;10" attributeName="y" begin="0.25s" dur="1s" calcMode="linear" repeatCount="indefinite"></animate>
                                </rect>
                                <rect x="120" y="10" width="15" height="120" rx="6">
                                    <animate values="120;110;100;90;80;70;60;50;40;140;120" attributeName="height" begin="0.5s" dur="1s" calcMode="linear" repeatCount="indefinite"></animate>
                                    <animate values="10;15;20;25;30;35;40;45;50;0;10" attributeName="y" begin="0.5s" dur="1s" calcMode="linear" repeatCount="indefinite"></animate>
                                </rect>
                            </svg>
                        </span>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(async function () {
        var param = {
            url: "{{ $apiUrl }}",
            method: "POST",
            data: JSON.stringify({
                "company_id": localStorage.getItem('company'),
            }),
        }

        await transAjax(param).then((result) => {
            let employees = result.data;
            let employeeTable = document.getElementById('employeeTable');
            let loading = document.getElementById('loading');
            
            employees.forEach(employee => {
                const row = `
                  <tr data-tw-merge="" class="[&_td]:last:border-b-0">
                <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-dashed py-4 dark:bg-darkmode-600">
                    <input type="checkbox" name="employee_id" value="${employee.id}" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50">
                </td>
                <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-dashed py-4 dark:bg-darkmode-600">
                    <div class="flex items-center">
                        <a class="whitespace-nowrap font-medium" href="#">
                            ${employee.first_name + ' ' + employee.last_name}
                        </a>
                    </div>
                </td>
                <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-dashed py-4 dark:bg-darkmode-600">
                    <div class="flex items-center">
                        <a class="whitespace-nowrap font-medium" href="#">
                            ${employee.company_id_rel.company_name}
                        </a>
                    </div>
                </td>
                <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-dashed py-4 dark:bg-darkmode-600">
                    <div class="flex items-center">
                        <a class="whitespace-nowrap font-medium" href="#">
                           ${employee.department_id_rel?.department_name ? employee.department_id_rel.department_name : 'N/A'}
                        </a>
                    </div>
                </td>
                <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-dashed py-4 dark:bg-darkmode-600">
                    <div class="flex items-center">
                        <a class="whitespace-nowrap font-medium" href="#">
                           ${employee.designation_id_rel?.designation_name ? employee.designation_id_rel?.designation_name : 'N/A'}
                        </a>
                    </div>
                </td>
            </tr>
            `;
            employeeTable.innerHTML += row;
            $('#loading').hide();
        });
        }).catch((error) => {
            console.log(error);
        });
    });
</script>



