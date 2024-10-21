@extends('layouts.dashboard.app') 
@section('content')
<link rel="stylesheet" href="{{ asset('dist/css/vendors/tom-select.css') }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
    @include('layouts.dashboard.menu')

    <div id="contents-page" class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
        <div class="container">
            <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                <div class="col-span-12">
                    <div class="mt-1.5 flex flex-col">
                        <div class="box flex flex-col p-5">
                            <div class="flex flex-col mb-4 gap-y-3 md:h-10 md:flex-row md:items-center">
                                <div class="text-base font-medium group-[.mode--light]:text-white">
                                    {{ $page_title }}
                                </div>
                                <div class="flex flex-col gap-x-1 sm:flex-row md:ml-auto" id="assignShiftContainer">
                                    <a href="{{ route('hrms.shift-assignment') }}" type="button" class="btn btn-primary transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary shadow-md w-100">
                                        <svg class="mr-2 h-4 w-4 stroke-[1.3]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                                        Back</a>
                                    <x-create_shift></x-create_shift>
                                </div>
                            </div>
                            <x-datatable id="employeeTable"
                                url="$apiUrl"
                                method="POST" class="display">
                                <x-slot:thead>
                                    <th data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 w-5 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500">
                                        <input id="selectAll" data-tw-merge="" type="checkbox" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">
                                    </th>
                                    <th data-value="employee_id_rel" data-render="getEmployee">Employee Name</th>
                                    <th data-value="salaryStructureAssignment.salaryStructure.name">Company</th>
                                    <th data-value="salaryStructureAssignment.salaryStructure.is_active"
                                        data-render="getStatus">Department
                                    </th>
                                    <th data-value="status" data-render="status">Designation</th>
                                </x-slot:thead>
                            </x-datatable>
                        </div>
                        <div class=" fixed z-10 flex items-center justify-center " id="modalOverlay" >
                            <div class="modal fade box p-4 inset-0 z-50 hidden" id="assignShiftModal"  tabindex="-1" aria-labelledby="assignShiftModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered bg-white rounded-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="assignShiftModalLabel">Assign Shift</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="post" tabindex="-1" >
                                                @csrf
                                                <div class="grid grid-cols-1 gap-5 mt-2 mb-2">
                                                    <x-form.select name="shift" id="shift" label="Select Shift" class="w-full" data-placeholder="Select Shift" required>
                                                        <option value="">Select Shift</option>
                                                        <option value="shift_1">Shift 1</option>
                                                        <option value="shift_2">Shift 2</option>
                                                    </x-form.select>                        
                                                </div>  
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-primary text-primary dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-100"  data-bs-dismiss="modal">Close</button>
                                            <button type="submit"  class="btn btn-secondary transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary shadow-md w-100" form="overview-form">Save Shift</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('dist/js/vendors/tab.js') }}"></script> 
<script src="{{ asset('dist/js/vendors/tom-select.js') }}"></script>
<script src="{{ asset('dist/js/components/base/tom-select.js') }}"></script> 


<script>
      $('#selectAll').on('click', function() {
            $('tbody input[type="checkbox"]').prop('checked', this.checked);
        });
        
        function getCheckbox(data, type, row, meta) {
            return `<input id="selectAll"  type="checkbox" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50">`;
        }

        function getCompany(data, type, row, meta) {
            if (data !== null) {
                return data?.company_name ?? 'N/A';
            }
            return 'N/A';
        }

        function getDesignation(data, type, row, meta) {
            if (data !== null) {
                return data?.designation_name ?? 'N/A';
            }
            return 'N/A';
        }

        function getDepartment(data, type, row, meta) {
            if (data !== null) {
                return data?.department_name ?? 'N/A';
            }
            return 'N/A';
        }

        function getActionBtn(data, type, row, meta) {
            const url = `{{ url('dashboard/hrms/employee/edit_employee') }}/${data}`;
            console.log(url);
            return `
            <div data-tw-merge data-tw-placement="bottom-end" class="dropdown relative">
                <button data-tw-merge data-tw-toggle="dropdown" aria-expanded="false" class="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6h.01M12 12h.01M12 18h.01" />
                    </svg>
                </button>
                <div data-transition data-selector=".show" data-enter="transition-all ease-linear duration-150" data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1" data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150" data-leave-from="!mt-1 visible opacity-100 translate-y-0" data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">
                    <div data-tw-merge class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 w-40">
                        <a class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge data-lucide="printer" class="stroke-[1] w-5 h-5 w-4 h-4 mr-2 w-4 h-4 mr-2"></i>
                            Detail</a>
                        <a href="` + url + `" class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge data-lucide="external-link" class="stroke-[1] w-5 h-5 w-4 h-4 mr-2 w-4 h-4 mr-2"></i>
                            Edit</a>
                        <a class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge data-lucide="file-text" class="stroke-[1] w-5 h-5 w-4 h-4 mr-2 w-4 h-4 mr-2"></i>
                            Hapus</a>
                    </div>
                </div>
            </div>`;
        }

        

        initializeContent();


    // // Fungsi untuk mengirim data ke server
    // function sendSelectedEmployeesToServer() {
    //     const selectedEmployees = getCheckedEmployees(); // Mengambil employee yang dipilih
        
    //     if (selectedEmployees.length > 0) {
    //         // Mengirim data ke server menggunakan fetch (POST request)
    //         fetch('URL_ENDPOINT_KAMU', {
    //             method: 'POST',
    //             headers: {
    //                 'Content-Type': 'application/json'
    //             },
    //             body: JSON.stringify({ employees: selectedEmployees }) // Mengirim data employee sebagai JSON
    //         })
    //         .then(response => response.json())
    //         .then(data => {
    //             console.log('Success:', data);
    //         })
    //         .catch((error) => {
    //             console.error('Error:', error);
    //         });
    //     } else {
    //         console.log('Tidak ada karyawan yang dipilih.');
    //     }
    // }

    // // Tambahkan event listener untuk tombol kirim
    // document.querySelector('#submit-button').addEventListener('click', sendSelectedEmployeesToServer);
    });
</script>

@endsection
