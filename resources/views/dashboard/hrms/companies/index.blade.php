@extends('layouts.dashboard.app')
@section('content')
    <div
        class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')


        <div id="contents-page"
            class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <div class="mt-[45px] col-span-12 w-full">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                            <div class="ml-2 text-lg font-medium group-[.mode--light]:text-white">
                                {{ $title }}
                            </div>

                            <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                <button onclick="history.go(-1)"
                                    class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-24">
                                    <i data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Back
                                </button>
                                <x-form.button id="new_company" label="Add New Company" style="primary" icon="plus" url="{{ route('hrms.company.create') }}" ></x-button>
                
                                
                            </div>
                        </div>
                        <div class="mt-3.5 mb-5 ">
                            
                            <div class="box box--stacked flex flex-col p-5">
                                <x-datatable id="companiesTable" :url="$apiUrl.'/datatables'" method="POST" class="display border-b border-slate-200/60" dtheight="250">
                                    <x-slot:thead>
                                        <th data-value="no" width="80px">No.</th>
                                        <th data-value="company_name" data-render="getCompany">Company Name</th>
                                        <th data-value="default_currency">Currency</th>
                                        <th data-value="time_zone">Timezone</th>
                                        <th data-value="domain">Domain</th>
                                        <th data-value="null" data-render="getActionBtn" width="10%">Action</th>
                                    </x-slot:thead>
                                </x-datatable>
                                </div>
                            </div>
                                
                            </div>
                        </div>
                        <div class="mt-5 ml-2 text-lg font-medium group-[.mode--light]:text-white">
                            More Action
                            </div>
                        <div class="box p-4 mt-6">
                             
                                <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 gap-5 mt-4">
                                    <x-action  label="HR Setting" icon="settings" url="{{ route('hrms.hr_setting') }}" />
                                    <x-action  label="Branch" icon="split" url="{{ route('hrms.branch') }}" />
                                    <x-action  label="Designation" icon="clipboard" url="{{ route('hrms.designation') }}" />                                   
                                    <x-action  label="Department" icon="layout-template" url="{{ route('hrms.department') }}" />                                   
                                                                       
                                    <x-action  label="Employee Grade" icon="album" url="{{ route('hrms.grade') }}" />
                                    <!-- <x-action  label="Job" icon="briefcase" url="{{ route('hrms.jobs') }}" /> -->
                                    <x-action  label="Leave Type" icon="git-branch" url="{{ route('hrms.leave-type') }}" />
                                    
                                    <x-action  label="Shift Type" icon="door-open" url="{{ route('hrms.attendance.shifttype') }}" />
                                </div>
                        </div>
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
@endsection
@push('js')
    <script type="text/javascript">
       function getActionBtn(data, type, row, meta) {
            //console.log(data);
            
            return `<div data-tw-merge data-tw-placement="bottom-end" class="dropdown relative"><button data-tw-merge data-tw-toggle="dropdown" aria-expanded="false" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none  [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-xs py-1.5 px-2 w-20">
            <i class="fa-solid fa-list text-base"></i></button>
                <div data-transition data-selector=".show" data-enter="transition-all ease-linear duration-150" data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1" data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150" data-leave-from="!mt-1 visible opacity-100 translate-y-0" data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">
                    <div data-tw-merge class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 w-40">
                       
                        <a onClick="action('show', '`+data['id']+`')" class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge data-lucide="external-link" class="stroke-[1] w-5 h-5 w-4 h-4 mr-2 w-4 h-4 mr-2"></i>
                            Open</a>
                       
                        
                    </div>
                </div>
            </div>`;
        }

        function action(action, id){
            
            if(action === 'delete'){
                const path    = `{{ $apiUrl }}/`+id;
                Swal.fire({
                    title: "Are you sure?",
                    //text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        destroy(action, path)
                    }else{
                        branchTable.ajax.reload();
                    }
                });
            }else{
                location.href = '{{ url("/dashboard/hrms/company") }}/'+action+'/'+id;
            }
        }

        $(document).ready(function () {
            const table = $('#companiesTable').DataTable();
            table.on('xhr', function (e, settings, json) {
                console.log(json); // Log the fetched data
            });
        });
    </script>
@endpush
