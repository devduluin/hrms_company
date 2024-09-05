@extends('layouts.dashboard.app') 
@section('content')
<link rel="stylesheet" href="{{ asset('dist/css/vendors/tom-select.css') }}">

<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
    @include('layouts.dashboard.menu')

    <div id="contents-page" class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
        <div class="container">
            <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                <div class="col-span-12">
                    <div class="flex flex-col mb-4 gap-y-3 md:h-10 md:flex-row md:items-center">
                        <div class="text-base font-medium group-[.mode--light]:text-white">
                            Income Tax Slab List
                        </div>
                        <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                            <x-form.button label="New Income Tax Slab   " id="overview-btn" style="primary" type="button" icon="plus"/>
                        </div>
                    </div>  
                    <div class="mt-1.5 flex flex-col">
                    <div class="box box--stacked flex flex-col p-5">
                        <x-datatable id="applicantTable" :url="'http://localhost:4444/api/v1/branch/datatable'" method="POST" class="display">
                            <x-slot:thead>
                                <th data-value="tax_name">Name</th>
                                <th data-value="company">Company</th>
                                <th data-value="effective_from">Effective From</th>
                                <th data-value="tax_exemption" >Standard Tax Exemption Amount</th>
                            </x-slot:thead>
                        </x-datatable>
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
    initializeTomSelect();
</script>

@endsection