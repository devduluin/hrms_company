@extends('layouts.dashboard.app')

@section('content')

<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
    @include('layouts.dashboard.menu')
    <div id="contents-page" class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
        <div class="container">
            <div class="box box--stacked flex flex-col">
                <div class="flex flex-col gap-y-2 p-5 sm:flex-row sm:items-center">
                    <div class="text-base font-medium group-[.mode--light]:text-white">
                        {{ $page_title }}
                    </div>
                </div>
                <div class="box box--stacked flex flex-col">
                    <div class="table gap-y-2 p-5 sm:flex-row sm:items-center">
                        <div class="overflow-auto xl:overflow-visible">
                <!-- <h2>Attendance Report</h2> -->
                            <x-datatable id="shiftTypeTable" :url="$apiUrl" method="POST" class="display">
                                <x-slot:thead>
                                    <!-- Kolom Employee Name di sebelah kiri -->
                                    <th data-value="employee_name">Employee Name</th>

                                    <!-- Kolom hari Senin sampai Minggu -->
                                    <th data-value="monday">Monday</th>
                                    <th data-value="tuesday">Tuesday</th>
                                    <th data-value="wednesday">Wednesday</th>
                                    <th data-value="thursday">Thursday</th>
                                    <th data-value="friday">Friday</th>
                                    <th data-value="saturday">Saturday</th>
                                    <th data-value="sunday">Sunday</th>
                                </x-slot:thead>
                            </x-datatable>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
