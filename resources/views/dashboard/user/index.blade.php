@extends('layouts.dashboard.app')
@section('content')
    <div
        class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
        <div id="contents-page"
            class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <div class="container">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                            <div class="text-base font-medium group-[.mode--light]:text-white">
                                {{ $page_title }}
                            </div>
                        </div>
                        <div class="mt-3.5 flex flex-col gap-8">
                            <div class="box box--stacked flex flex-col">
                                <div class="table gap-y-2 p-5 sm:flex-row sm:items-center">
                                    <div>
                                        {{-- <div class="text-base font-medium group-[.mode--light]:text-white mb-4">
                                            Data Employees
                                        </div> --}}
                                        <x-datatable id="employeeTable" :url="$apiUrl . '/employee/datatables'" method="POST" class="display"
                                            >
                                            <x-slot:thead>
                                                <th data-value="id" data-render="getCheckBox" orderable="false">
                                                    <input type="checkbox" id="select-all" />
                                                </th>
                                                <th data-value="first_name" searchable="true" orderable="true">First Name
                                                </th>
                                                <th data-value="last_name" searchable="true" orderable="true">Last Name</th>
                                                <th data-value="company_id_rel" data-render="getCompany" orderable="false">
                                                    Email
                                                </th>
                                                <th data-value="grade_id_rel" data-render="getGrade" orderable="false">No Handphone
                                                </th>                                                
                                                <th data-value="id" data-render="getActionBtn" orderable="false">Action</th>
                                            </x-slot:thead>
                                        </x-datatable>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
