@extends('layouts.dashboard.app')
@section('content')

<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
@include('layouts.dashboard.menu')
    <div class="content transition-[margin,width] duration-100 px-5 pt-[56px] pb-16 relative z-20 content--compact xl:ml-[275px] [&amp;.content--compact]:xl:ml-[91px]">
        <div class="container mt-[65px]">
            <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                <div class="text-base font-medium group-[.mode--light]:text-white">
                    {{ $page_title ?? '' }}
                </div>
                <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                    <button onclick="history.go(-1)"
                        class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-24">
                        <i data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Back
                    </button>
                    <button id="btnBanned" data-tw-merge 
                            class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-danger focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-danger border-danger text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><i
                                data-tw-merge="" data-lucide="trash" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                                <span id="">Banned</span>
                    </button>
                    <button id="submitBtn" data-tw-merge=""
                            class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-blue-theme border-blue-theme text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><i
                                data-tw-merge="" data-lucide="save" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                            <span id="loadingText">Save Changes</span>
                    </button>
                </div>
            </div>
            <div class="mt-3.5 grid grid-cols-12 gap-x-6 gap-y-10">
                <!-- <div class="relative col-span-12 xl:col-span-3">
                    <div class="sticky top-[104px]">
                        @include('components._asside_company')
                    </div>
                </div> -->
                <div class="col-span-12 flex flex-col gap-y-7 sm:col-span-12 xl:col-span-12">
                    <form id="form-submit" method="post" action="{{ $apiUrl }}">
                        <div class="box box--stacked flex flex-col p-5">
                            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-4">
                                <input type="hidden" name="host" value="{{ url('/') }}">
                                <div class="gap-x-6 gap-y-10 ">
                                <x-form.select id="company_id" name="company_id" data-method="POST" label="Company Name" url="{{ url('dashboard/hrms/company/new_company') }}" required="true" 
                                    apiUrl="{{ $apiCompanyUrl }}" columns='["company_name"]' :selected="$company"
                                    :keys="[
                                        'company_id' => $company,
                                    ]">
                                    <option value="">Select Company</option>
                                </x-form.select>
                                </div>
                                <div class="gap-x-6 gap-y-10 ">
                                <x-form.input id="name" name="name" label="Name" required="true" placholder="" value="{{request()->get('item')}}"/>
                                </div>
                                <div class="gap-x-6 gap-y-10 ">
                                    <x-form.input id="phone" name="phone" label="Phone Number" required="true" placholder="" value=""/>
                                </div>
                                <div class="gap-x-6 gap-y-10 ">
                                    <x-form.input id="email" name="email" label="Email" required="true" placholder="" value=""/>
                                </div>
                                <div class="gap-x-6 gap-y-10 ">
                                    <x-form.input id="email_verified_at" readonly name="" label="Email Verified At" placholder="" value=""/>
                                </div>
                                <div class="gap-x-6 gap-y-10 ">
                                    <x-form.input id="last_login" readonly name="" label="Last Login" placholder="" value=""/>
                                </div>
                                <div class="gap-x-6 gap-y-10 ">
                                    <x-form.input id="last_login_ip" readonly name="" label="Last Login IP" placholder="" value=""/>
                                </div>
                                <div class="gap-x-6 gap-y-10 ">
                                    <x-form.input id="banned_reason" readonly name="" label="Banned Reason" placholder="" value=""/>
                                </div>
                               
                                <div class="py-2">
                                    <x-checkbox id="xbanned"
                                        label="Is Banned"
                                        name="x"
                                        disabled
                                        guidelines="If checked, user will not be able to sign in" />
                                    </div>
                                    <div class="py-2">
                                    <x-checkbox id="send_email"
                                        label="Is Email Verified"
                                        name="send_email"
                                        disabled
                                        guidelines="If checked, user account already activated" />
                                    </div>
                            
                            </div>
                                
                            </div>
                             
                        </form>
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
<div data-tw-backdrop="" aria-hidden="true" tabindex="-1" id="modal-banned" class="modal group bg-gradient-to-b from-theme-1/50 via-theme-2/50 to-black/50 transition-[visibility,opacity] w-screen h-screen fixed left-0 top-0 [&:not(.show)]:duration-[0s,0.2s] [&:not(.show)]:delay-[0.2s,0s] [&:not(.show)]:invisible [&:not(.show)]:opacity-0 [&.show]:visible [&.show]:opacity-100 [&.show]:duration-[0s,0.4s]">
    <div data-tw-merge class="w-[90%] mx-auto bg-white relative rounded-md shadow-md transition-[margin-top,transform] duration-[0.4s,0.3s] -mt-16 group-[.show]:mt-16 group-[.modal-static]:scale-[1.05] dark:bg-darkmode-600 sm:w-[460px]">
        <div class="flex items-center px-5 py-3 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 id="titleBanned" class="mr-auto text-base font-medium">
                Deactivated User
            </h2>
            <a class="absolute right-0 top-0 mr-3 mt-3" data-tw-dismiss="modal" href="#">
                <i data-tw-merge data-lucide="x" class="stroke-[1] w-5 h-5 h-8 w-8 text-slate-400 h-8 w-8 text-slate-400"></i>
            </a>
             
        </div>
        <form id="form-banned" method="post" action="{{ $apiUrl.'/banned' }}">
        <div data-tw-merge class="p-5 grid grid-cols-12 gap-4 gap-y-3">
            <div class="col-span-12 sm:col-span-12">
            
            <div>
                <div class="flex items-center my-2">
                    <input type="checkbox" id="banned" name="banned" class="form-checkbox transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;[type='radio']]:checked:bg-primary [&amp;[type='radio']]:checked:border-primary [&amp;[type='radio']]:checked:border-opacity-10 [&amp;[type='checkbox']]:checked:bg-primary [&amp;[type='checkbox']]:checked:border-primary [&amp;[type='checkbox']]:checked:border-opacity-10 [&amp;:disabled:not(:checked)]:bg-slate-100 [&amp;:disabled:not(:checked)]:cursor-not-allowed [&amp;:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&amp;:disabled:checked]:opacity-70 [&amp;:disabled:checked]:cursor-not-allowed [&amp;:disabled:checked]:dark:bg-darkmode-800/50">

                    <label for="banned" class="ml-2 block text-sm text-gray-900">
                        I understand, deactivated.
                    </label>
                        </div>
                <div class="mt-1.5 mr-5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                    this user will not be able to sign into system
                </div>
            </div>
            
            
            </div>
            
        </div>
        <div class="px-5 py-3 text-right border-t border-slate-200/60 dark:border-darkmode-400">
            <button data-tw-merge data-tw-dismiss="modal" type="button" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&:hover:not(:disabled)]:bg-secondary/20 [&:hover:not(:disabled)]:dark:bg-darkmode-100/10 mr-1 w-20 mr-1 w-20">Cancel</button>
            <button id="banned-button" disabled data-tw-merge type="submit" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-danger border-danger text-white dark:border-danger w-40 w-40">Save Changes</button>
        </div>
        </form>
    </div>
</div>
<!-- END: Modal Content -->
@endsection
@push('js')
<script type="text/javascript">
    
    let currentForm = $("#form-submit");
    let id   = '{{$id ?? ''}}';
    let method      = 'POST';
    let path        = currentForm.attr('action')+'/create';
    let reserve = false;
    let headers     = {
                        'Authorization': `Bearer ${appToken}`,
                        'X-Account-Type': `hris_company`,
                        'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                    };

    async function handleGetData(id, currentForm) {
         
        $.ajax({
            url: `{{ $apiUrl }}/`+id,
            type: 'GET',
            headers: headers,
            dataType: 'json',
            success: await
            function(response) {   
                if (response.data) {                    
                    path        = currentForm.attr('action')+'/'+id;
                    method  = 'PATCH';
                    $("#name").val(response.data.name);
                    $("#phone").val(response.data.phone);
                    $("#email").val(response.data.email);
                    $("#company_id").val(response.data.secondary_id);
                     
                    if (response.data.is_banned) {
                        $("#banned").attr("checked", true);
                        $("#xbanned").attr("checked", true);
                        reserve = true;
                    } else {
                        $("xbanned").attr("checked", false);
                        $("#xbanned").attr("checked", false);
                        reserve = false;
                    } 

                    if (response.data.email_verified_at != '') {
                        $("#send_email").attr("checked", true);
                        
                    } else {
                        $("send_email").attr("checked", false);
                       
                    } 
                    
                    const company_idSelect = $('#company_id')[0].tomselect;
                    const company_idValue = response.data.secondary_id;
                     
                    company_idSelect.setValue(company_idValue);

                } else {
                    showErrorNotification('error', response.message);
                }
            },
            error: function(xhr) {
                const response = JSON.parse(xhr.responseText);
                handleErrorResponse(response, currentForm);
            }
        });
        return false;
    }

    $("#form-submit").submit(async function (e) {
        e.preventDefault();
        
        const data = serializeFormData(currentForm);
        if ($("#is_banned").is(":checked")) {
            data.is_banned = true;
        } else {
            data.is_banned = false;
        }
        try {
            const response = await $.ajax({
                url: path,
                type: method,
                contentType: 'application/json',
                headers: headers,
                data: JSON.stringify(data),
                dataType: 'json'
            });

            handleResponse(response);
        } catch (xhr) {
            console.log(xhr);
            if (xhr.status === 422) {
                console.log(xhr.responseText);
                const response = JSON.parse(xhr.responseText);
                handleErrorResponse(response, currentForm);
            } else {
                showErrorNotification('error', xhr.responseJSON.message);
            }
            
        }
        $('#submitBtn').attr('disable', false);
        $('#loadingText').html('Save Changes');
    });

    function serializeFormData(form) {
        const formData = form.serializeArray();
        const data = {};
        formData.forEach(field => {
            data[field.name] = field.value;
        });
        return data;
    }

    function handleResponse(response) {
         
        if (response) {
            showSuccessNotification(response.message, "The operation was completed successfully.");
            handleGetData(id, currentForm)
        } else {
            showErrorNotification('error', response.message);
        }
    }

    function handleErrorResponse(result, tabId) {
        const errorString = result.errors || 'An error occurred.';
        showErrorNotification('error',
            `There were validation errors on tab ${tabId}. Message : ${result.message}`, errorString);
        const errorMessages = errorString.split(', ');

        $('.error-message').remove();

        const errorPattern = /\"([^\"]+)\"/g;
        let match;

        while ((match = errorPattern.exec(errorMessages)) !== null) {
            const field = match[1];
            if (field !== 'employee_id') {
                let fieldName = field.replace(/_/g, " ").replace(/\b\w/g, char => char.toUpperCase());
                const input = $(`[name="${field}"]`);

                input.addClass('is-invalid');
                input.before(
                    `<div class="error-message text-danger mt-1 text-xs sm:ml-auto sm:mt-0 mb-2">${fieldName} is not allowed to be empty</div>`
                );
            }
        }

        const firstErrorField = $('.error-message').first();
        if (firstErrorField.length) {
            $('html, body').animate({
                scrollTop: firstErrorField.offset().top - 100
            }, 500);
        }
    }

    if(id){
        handleGetData(id, currentForm);
    }

    $('#submitBtn').on('click', function (e) {
        e.preventDefault();
        $(this).attr('disable', true);
        $('#loadingText').html('Saving...');
        
        $("#form-submit").submit();
    });

    let modal = document.querySelector("#modal-banned");
    let modalInstance = tailwind.Modal.getOrCreateInstance(modal);

    
    // Enable/disable the save button when the checkbox is toggled
    $('#btnBanned').on('click', function (e) {
        e.preventDefault();
        modalInstance.show(onShow());
    });
    
    function onShow() {
        
    };
    $('#banned').on('change', function () {
       if(reserve == true){
        if ($(this).is(':checked')) {
            $('#banned-button').attr('disabled', true);
        } else {
            $('#banned-button').removeAttr('disabled');
        }
       }else{
        if ($(this).is(':checked')) {
            $('#banned-button').removeAttr('disabled');
        } else {
            $('#banned-button').attr('disabled', true);
        }
       }
        
    });

    
    $('#form-banned').submit(async function (e) {
        e.preventDefault();
        
        $.ajax({
            url: $(this).attr('action')+'/'+id,  // Replace with your server endpoint
            type: method,
            headers: headers,
            data: {
                banned: $('#banned').is(':checked') ?  1: 0
            },
            success: function (response) {
                // Handle success, e.g., close the modal and show a success message
                console.log(response.message);
                modalInstance.hide();
                showSuccessNotification(response.message, "The operation was completed successfully.");
                handleGetData(id, currentForm)
            },
            error: function (xhr, status, error) {
                // Handle error, e.g., display an error message
                //hideModal();
                modalInstance.hide();
                alert('An error occurred: ' + error);
            }
        });
    });
   
    
    </script>
@endpush
@include('vendor-common.sweetalert')