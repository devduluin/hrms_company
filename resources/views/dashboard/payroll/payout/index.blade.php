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
                            <div class="box box--stacked flex flex-col p-5">
                                <div class="grid grid-cols-4 gap-5">
                                    <x-kpi_card label="Total Declaration Submitted" amount="457,204"  icon="arrow-down" percentage="3%" period="this month"/>
                                    <x-kpi_card label="Total Salary Structure" amount="122,721"  icon="arrow-down" percentage="3%" period="this month"/>
                                    <x-kpi_card label="Total Incentive Given" amount="489,223"  icon="arrow-down" percentage="3%" period="this month"/>
                                    <x-kpi_card label="Total Outgoing Salary" amount="489,223"  icon="arrow-down" percentage="3%" period="this month"/>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <x-chart.line  label="Total Payroll" option1="This Month" option2="Last Month" />
                                <div class="flex flex-col box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                    <x-percentage_bar/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gap-5 mt-6 p-4 box">
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5  ">
                        <div class="text-left text-lg font-medium mt-2">
                            More Actions
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-4  text-blue-900">
                        <x-action label="Create Salary Slip" icon="arrow-up-right" url="{{ url('/dashboard/hrms/payout/salary_slip') }}"/>
                        <x-action label="Payroll Setting" icon="arrow-up-right" url="{{ url('/dashboard/hrms/payout/settings') }}"/>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-4  text-blue-900">
                        <x-action label="Income Tax Slab List" icon="arrow-up-right" url="{{ url('/dashboard/hrms/payout/tax_slab_list') }}"/>
                        <x-action label="New Income Tax Slab" icon="arrow-up-right" url="{{ url('/dashboard/hrms/payout/income_tax') }}"/>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-4  text-blue-900">
                        <x-action label="Employee Benefit Claim List" icon="arrow-up-right" url="{{ url('/dashboard/hrms/payout/benefit_list') }}"/>
                        <x-action label="New Employee Benefit Claim" icon="arrow-up-right" url="{{ url('/dashboard/hrms/payout/benefit_claim') }}"/>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-4  text-blue-900">
                        <x-action label="Salary Component" icon="arrow-up-right" url="{{ url('/dashboard/hrms/payout/salary_component/list_component') }}"/>
                        <x-action label="Payroll Period" icon="arrow-up-right" url="{{ url('/dashboard/hrms/payout/payroll_period') }}"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
