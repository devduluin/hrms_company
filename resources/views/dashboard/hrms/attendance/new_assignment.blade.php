@extends('layouts.dashboard.app') 
@section('content')
<link rel="stylesheet" href="{{ asset('dist/css/vendors/tom-select.css') }}">

<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
    @include('layouts.dashboard.menu')

    <div id="contents-page" class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
        <div class="grid grid-cols-12 gap-x-6 gap-y-10">
            <div class="col-span-12">
                <form id="overview-form" >
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-4">
                    <x-form.select name="shift" id="shift" label="Select Shift" class=" w-full"
                        data-placeholder="Select Shift"  required>
                        <option value="">Select Shift</option>
                        <option value="shift_1">Shift 1</option>
                        <option value="shift_2">Shift 2</option>
                    </x-form.select>                        
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>







