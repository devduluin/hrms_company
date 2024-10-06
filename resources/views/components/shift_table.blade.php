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
                <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-bold text-slate-500">
                    Employee Name
                </td>
                <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-bold text-slate-500">
                    Company
                </td>
                <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-bold text-slate-500">
                   Shift Type
                </td>
                <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-bold text-slate-500">
                    Status
                </td>
                {{-- <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 w-36 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500">
                    Action
                </td> --}}
            </tr>
        </thead>
        <tbody id="shiftAssigmentTable">
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
        loadDataShiftAssignment();
    });

    async function loadDataShiftAssignment() {
        var page = 1;
        var perPage = 10;
        var param = {
            url: "{{ $apiUrl }}",
            method: "GET",
            data: {
                company_id: localStorage.getItem('company'),
                page: page,
                limit: perPage
            }
        }

        await transAjax(param).then((result) => {
            let shiftAssigments = result.data;
            let shiftAssigmentTable = document.getElementById('shiftAssigmentTable');
            let loading = document.getElementById('loading');
            if(shiftAssigments && shiftAssigments.length > 1) {
                var row = "";
                shiftAssigments.forEach(shiftAssignment => {
                row += 
                    `
                    <tr data-tw-merge="" class="[&_td]:last:border-b-0">
                    <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-dashed py-4 dark:bg-darkmode-600">
                        <input data-tw-merge="" type="checkbox" name="employee_id" value="${shiftAssignment.employee_id}" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50">
                    </td>
                    <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-dashed py-4 dark:bg-darkmode-600">
                        <div class="flex items-center">
                            <a class="whitespace-nowrap font-medium" href="#">
                                ${shiftAssignment.employee_id_rel.first_name + ' ' + shiftAssignment.employee_id_rel.last_name}
                            </a>
                        </div>
                    </td>
                    <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-dashed py-4 dark:bg-darkmode-600">
                        <div class="flex items-center">
                            <a class="whitespace-nowrap font-medium" href="#">
                                ${shiftAssignment.company_id_rel.company_name}
                            </a>
                        </div>
                    </td>
                    <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-dashed py-4 dark:bg-darkmode-600">
                        <div class="flex items-center">
                            <a class="whitespace-nowrap font-medium" href="#">
                            ${shiftAssignment.shift_type_id_rel?.shift_type_name ? shiftAssignment.shift_type_id_rel.shift_type_name : 'N/A'}
                            </a>
                        </div>
                    </td>
                    <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-dashed py-4 dark:bg-darkmode-600">
                        <div class="flex items-center">
                            <a class="whitespace-nowrap font-medium" href="#">
                                ${shiftAssignment.status}
                            </a>
                        </div>
                    </td>
                </tr>
                `;
                $("#shiftAssigmentTable").html(row);
                $('#loading').hide();
                });
            }else {
                $('#loading').hide();
                $("#shiftAssigmentTable").html(`
                    <tr id="loading">
                        <td colspan="6" class="text-center">
                            <div class="col-span-6 flex flex-col items-center justify-end sm:col-span-3 xl:col-span-2">
                            <span class="h-50">
                                <svg  style="width: 96px; height: 96px" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12.983 8.978c3.955 -.182 7.017 -1.446 7.017 -2.978c0 -1.657 -3.582 -3 -8 -3c-1.661 0 -3.204 .19 -4.483 .515m-2.783 1.228c-.471 .382 -.734 .808 -.734 1.257c0 1.22 1.944 2.271 4.734 2.74"></path>
                                    <path d="M4 6v6c0 1.657 3.582 3 8 3c.986 0 1.93 -.067 2.802 -.19m3.187 -.82c1.251 -.53 2.011 -1.228 2.011 -1.99v-6"></path>
                                    <path d="M4 12v6c0 1.657 3.582 3 8 3c3.217 0 5.991 -.712 7.261 -1.74m.739 -3.26v-4"></path>
                                    <line x1="3" y1="3" x2="21" y2="21"></line>
                                </svg>
                            </span>
                                <div class="mt-2 text-center">
                                    <p class="text-base">Data not found</p>
                                    <a href="http://127.0.0.1:8000/dashboard/hrms/attendance/shift-assignment/cretae" type="button" class="btn btn-primary transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary shadow-md w-100">
                                    <svg class="mr-2 h-4 w-4 stroke-[1.3]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="M12 5v14"></path></svg>
                                    Try Shift Assignment</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                `)
            }
        }).catch((error) => {
            console.log(error);
        });
    }
</script>



