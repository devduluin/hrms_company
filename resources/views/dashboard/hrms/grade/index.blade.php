@extends('layouts.dashboard.app')
@section('content')

<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
@include('layouts.dashboard.menu')
    <div class="content transition-[margin,width] duration-100 px-5 pt-[56px] pb-16 relative z-20 content--compact xl:ml-[275px] [&amp;.content--compact]:xl:ml-[91px]">
        <div class="mt-[65px] col-span-12 w-full">
            <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                <div class="text-lg font-medium group-[.mode--light]:text-white">
                    {{ $title ?? '' }}
                </div>
                <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                    <button onclick="history.go(-1)"
                        class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-24">
                        <i data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Back
                    </button>
                <x-form.button id="new_grade" label="Add New Grade" style="primary" icon="plus" url="{{ route('hrms.grade.create') }}" ></x-button>
                </div>
            </div>
            <div class="mt-3.5  gap-x-6 gap-y-10">
                <!-- <div class="relative col-span-12 xl:col-span-3">
                    <div class="sticky top-[104px]">
                        @include('components._asside_company')
                    </div>
                </div> -->
                <div class="col-span-12 flex flex-col gap-y-7 xl:col-span-9">
                    <div class="box box--stacked flex flex-col p-5">
                        <x-datatable id="gradeTable" :url="$apiUrl.'/datatables'" method="POST" class="display small">
                            <x-slot:thead>
                                <th data-value="no" width="60px">No.</th>
                                <th data-value="employee_grade_name">Grade name</th>
                                <th data-value="createdAt" data-render="dateFormat">Created at</th>
                                <th data-value="null" data-render="getActionBtn" width="10%">Action</th>
                            </x-slot:thead>
                        </x-datatable>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="preview relative [&.hide]:overflow-hidden [&.hide]:h-0">
    <div class="text-center">
        <div id="success-notification-content" class="py-5 pl-5 pr-14 bg-white border border-slate-200/60 rounded-lg shadow-xl dark:bg-darkmode-600 dark:text-slate-300 dark:border-darkmode-600 hidden flex">
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

<!-- BEGIN: Modal Content -->
<div data-tw-backdrop="" aria-hidden="true" tabindex="-1" id="modal-create" class="modal group bg-gradient-to-b from-theme-1/50 via-theme-2/50 to-black/50 transition-[visibility,opacity] w-screen h-screen fixed left-0 top-0 [&:not(.show)]:duration-[0s,0.2s] [&:not(.show)]:delay-[0.2s,0s] [&:not(.show)]:invisible [&:not(.show)]:opacity-0 [&.show]:visible [&.show]:opacity-100 [&.show]:duration-[0s,0.4s]">
    <div data-tw-merge class="w-[90%] mx-auto bg-white relative rounded-md shadow-md transition-[margin-top,transform] duration-[0.4s,0.3s] -mt-16 group-[.show]:mt-16 group-[.modal-static]:scale-[1.05] dark:bg-darkmode-600 sm:w-[600px] ">
        <div class="flex items-center px-5 py-3 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 id="titleForm" class="mr-auto text-base font-medium">
                ...
            </h2>
            <a class="absolute right-0 top-0 mr-3 mt-3" data-tw-dismiss="modal" href="#">
                <i data-tw-merge data-lucide="x" class="stroke-[1] w-5 h-5 h-8 w-8 text-slate-400 h-8 w-8 text-slate-400"></i>
            </a>
             
        </div>
        <form id="form-create" method="post" action="{{ $apiUrl }}">
        <div data-tw-merge class="p-5 grid grid-cols-12 gap-4 gap-y-3">
            <div class="col-span-12 sm:col-span-12">
            
            <div>
                 
                <div class="gap-x-6 gap-y-10 mb-5">
                    <x-form.input id="branch_name" label="Branch Name" name="branch_name" value="{{request()->get('item')}}" required />
                </div>
            </div>
            
            
            </div>
            
        </div>
        <div class="grid grid-cols-2 gap-2 items-stretch">
        <div class="px-5 py-3 text-left border-t border-slate-200/60 dark:border-darkmode-400">
            <a href="{{ route('hrms.branch.create') }}" data-tw-merge data-tw-dismiss="modal" type="button" class="transition duration-200 shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&:hover:not(:disabled)]:bg-secondary/20 [&:hover:not(:disabled)]:dark:bg-darkmode-100/10 mr-1">
            Full Form</a>
            
        </div>
        <div class="px-5 py-3 text-right border-t border-slate-200/60 dark:border-darkmode-400">
            <button id="submitBtn" data-tw-merge type="submit" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-blue-theme border-blue-theme text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200">
            <i data-tw-merge="" data-lucide="save" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Save Changes</button>
        </div>
        </div>
        </form>
    </div>
</div>
<!-- END: Modal Content -->
@endsection

@push('js')
    <script>
        let company_id = localStorage.getItem('company');
        let headers = {
                        'Authorization': `Bearer ${appToken}`,
                        'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                    };

        function getStatus(data, type, row, meta) {

            if (data === 'active') {
                return `<div class="flex items-center justify-center text-success"><div class="ml-1.5 whitespace-nowrap"><i data-tw-merge data-lucide="check" class="text-success"></i> Active</div></div>`;
            } else {
                return `<div class="flex items-center justify-center text-danger"><div class="ml-1.5 whitespace-nowrap">Inactive</div></div>`;
            }
        }

        //buat format tanggal 2024-09-23 dari tanggal 2024-09-23T14:42:29.000Z
        function dateFormat(data, type, row, meta) {
        // Pastikan 'data' adalah string tanggal valid
        if (data) {
            // Buat objek Date dari string
            const date = new Date(data);

            // Dapatkan bagian tahun, bulan, dan hari dari objek Date
            const year = date.getFullYear();
            const month = ('0' + (date.getMonth() + 1)).slice(-2); // Tambah 1 karena bulan di JavaScript berbasis 0
            const day = ('0' + date.getDate()).slice(-2);

            // Format tanggal menjadi YYYY-MM-DD
            return `${year}-${month}-${day}`;
        }
            return data; // Jika data tidak ada, kembalikan data asli
        }

        function getCompany(data, type, row, meta) {
            if (data !== null) {
                return data?.company_name ?? 'N/A';
            }
            return 'N/A';
        }

        function getActionBtn(data, type, row, meta) {
            //console.log(data);
            
            return `<div data-tw-merge data-tw-placement="bottom-end" class="dropdown relative"><button data-tw-merge data-tw-toggle="dropdown" aria-expanded="false" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none  [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-xs py-1.5 px-2 w-20">
            <i class="fa-solid fa-list text-base"></i></button>
                <div data-transition data-selector=".show" data-enter="transition-all ease-linear duration-150" data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1" data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150" data-leave-from="!mt-1 visible opacity-100 translate-y-0" data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">
                    <div data-tw-merge class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 w-40">
                      
                        <a onClick="action('update', '`+data['id']+`')" class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge data-lucide="external-link" class="stroke-[1] w-5 h-5 w-4 h-4 mr-2 w-4 h-4 mr-2"></i>
                            Update</a>
                        <a onClick="action('delete', '`+data['id']+`')" class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge data-lucide="file-text" class="stroke-[1] w-5 h-5 w-4 h-4 mr-2 w-4 h-4 mr-2"></i>
                            Delete</a>
                        
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
                        gradeTable.ajax.reload();
                    }
                });
            }else{
                location.href = '{{ url("/dashboard/hrms/grade") }}/'+action+'/'+id;
            }
        }

        async function destroy(method, path){
            try {
                const response = await $.ajax({
                    url: path,
                    type: method,
                    contentType: 'application/json',
                    headers: headers,
                    dataType: 'json'
                });

                Swal.fire({
                    title: "Deleted!",
                    //text: response.message,
                    icon: "success"
                });
                gradeTable.ajax.reload();
            } catch (xhr) {
                console.log(xhr);
                if (xhr.status === 422) {
                    const errorString = result.error || 'An error occurred.';
                    showErrorNotification('error', `There were errors. Message : ${result.message}`, errorString);
                } else {
                    showErrorNotification('error', 'An error occurred while processing your request.');
                }
                // activateTab(formId);
            }
        }

        //MODAL
        let modal = document.querySelector("#modal-create");
        let modalInstance = tailwind.Modal.getOrCreateInstance(modal);
        
        $('#new_branch').on('click', function (e) {
            e.preventDefault();
            modalInstance.show(onShow());
        });

        function onShow() {
            $('#titleForm').html('New Branch')
        };

        $('#form-create').submit(async function (e) {
            e.preventDefault();
            let data = $(this).serialize();
            data += '&company_id=' + encodeURIComponent(company_id);
            
            $.ajax({
                url: $(this).attr('action'),  
                type: $(this).attr('method'),
                headers: headers,
                data: data,
                success: function (response) {

                    modalInstance.hide();
                    showSuccessNotification(response.message, "The operation was completed successfully.");
                    gradeTable.ajax.reload();
                },
                error: function (xhr, status, error) {
                    modalInstance.hide();
                }
            });
        });

    </script>
@endpush
@include('vendor-common.sweetalert')
