@extends('layouts.dashboard.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<style>.show{display:block;}</style>
<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
        <div id="contents-page" class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class="mt-3.5  gap-8">
                            <div class="box box--stacked p-5">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                                    <x-kpi_card  label="Expense Claim" amount="457,204" icon="arrow-down" percentage="3%" period="this month" />
                                    <x-kpi_card  label="Approve Claim" amount="457,204" icon="arrow-down" percentage="3%" period="this month" />
                                    <x-kpi_card  label="Reject Claim" amount="457,204" icon="arrow-down" percentage="3%" period="this month" />
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <x-chart.line  label="Expense Claim Frequency" option1="This Month" option2="Last Month" />
                                <x-chart.donut  label="Claims by Type" option1="This Month" option2="Last Month" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box p-4">
                    <div class="text-m font-medium">
                        More Action
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5 mt-4">
                        <x-action  label="Expense Claim Summary" icon="arrow-up-right" url="{{ url('/dashboard/hrms/claim/summary') }}" />
                        <x-action  label="Employee Travel List" icon="arrow-up-right" url="{{ url('/dashboard/hrms/claim/travel_list') }}" />
                        <x-action  label="Add Travel Request" icon="arrow-up-right" url="{{ url('/dashboard/hrms/claim/travel_request') }}" />
                    </div>
                </div>    
        </div>
    </div>
</div>

@endsection