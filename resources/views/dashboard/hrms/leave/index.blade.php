@extends('layouts.dashboard.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<style>.show{display:block;}</style>
<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
        <div id="contents-page" class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <div class="container">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class="mt-3.5 flex flex-col gap-8">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <x-chart.line  label="Leave Distribution" option1="This Month" option2="Last Month" />
                                <x-chart.donut  label="Leaves by Type" option1="This Month" option2="Last Month" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box box--stacked flex flex-col p-5 mt-6">
                    <x-datatable id="applicantTable" :url="'http://localhost:4444/api/v1/branch/datatable'" method="POST" class="display">
                        <x-slot:thead>
                            <th data-value="employee_name">Employee Name</th>
                            <th data-value="company">Company</th>
                            <th data-value="leave_type">Leave Type</th>
                            <th data-value="leave_date">Date</th>
                        </x-slot:thead>
                    </x-datatable>
                </div>  
        </div>
        </div>
    </div>
</div>

@endsection