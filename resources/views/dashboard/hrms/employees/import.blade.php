@extends('layouts.dashboard.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/dropzone.css') }}">
@endPush
@section('content')
    <div
        class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
        <div id="contents-page"
            class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <div class="container">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class="flex flex-col mb-4 gap-y-3 md:h-10 md:flex-row md:items-center">
                            <div class="text-base font-medium group-[.mode--light]:text-white">
                                {{ $page_title }}
                            </div>
                            <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                <button onclick="history.go(-1)"
                                    class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-24">
                                    <i data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Back
                                </button>
                            </div>
                        </div>
                        <div class="box box--stacked flex flex-col p-5 mb-6 progressBarBox">
                            <div class="preview-component">
                                <div
                                    class="mb-5 flex flex-col border-b border-dashed border-slate-300/70 pb-5 sm:flex-row sm:items-center">
                                    <div class="text-[0.94rem] font-medium">
                                        Employee Import Progress <span id="autoReloadComponent"></span>
                                    </div>
                                </div>
                                <div>
                                    <div data-tw-merge class="w-full h-2 bg-slate-200 rounded dark:bg-black/20 h-4">
                                        <div data-tw-merge role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                            id="progressBar" aria-valuemax="100"
                                            class="bg-primary h-full rounded text-xs text-white flex justify-center items-center w-0">
                                            <span id="progressValue">0</span>%
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box box--stacked flex flex-col p-5">
                            <div class="preview-component">
                                <div>
                                    <p class="leading-relaxed">
                                        Drop your Employee file in .xls or .xlsx format. it will automatically importing
                                        your
                                        employee data.
                                    </p>
                                    <div
                                        class="relative mb-4 mt-7 rounded-[0.6rem] border border-slate-200/80 dark:border-darkmode-400">
                                        <div class="preview relative [&amp;.hide]:overflow-hidden [&amp;.hide]:h-0">
                                            <form data-single="true"
                                                action="http://duluin-hris-account.test/api/users/employees/import"
                                                class="[&amp;.dropzone]:border-2 [&amp;.dropzone]:border-dashed dropzone [&amp;.dropzone]:border-slate-300/70 [&amp;.dropzone]:bg-slate-50 [&amp;.dropzone]:cursor-pointer [&amp;.dropzone]:dark:bg-darkmode-600 [&amp;.dropzone]:dark:border-white/5 dz-clickable">

                                                <div class="dz-message" data-dz-message="">
                                                    <div class="text-lg font-medium">
                                                        Drop files here or click to upload.
                                                    </div>
                                                </div>
                                            </form>
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
    @include('vendor-common.toastr')
    @push('js')
        <script src="{{ asset('dist/js/vendors/dropzone.js') }}"></script>
    @endPush
    @push('js')
        <script type="text/javascript">
            console.log("initial dropzone");
            (() => {
                (function() {
                    "use strict";
                    Dropzone.autoDiscover = false;

                    $(".dropzone").each(function() {
                        const dropzoneElement = $(this);
                        const appToken = localStorage.getItem('app_token');

                        let t = {
                            url: "http://apidev.duluin.com/api/users/employees/import",
                            headers: {
                                'Authorization': `Bearer ${appToken}`,
                                'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                            },
                            accept: (file, done) => {
                                const acceptedMimeTypes = [
                                    'application/vnd.ms-excel',
                                    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                                ];

                                if (!acceptedMimeTypes.includes(file.type)) {
                                    showErrorNotification('error',
                                        "Error! Only Excel files are accepted.");
                                } else {
                                    console.log("Uploaded");
                                    done();
                                }
                            },
                            maxFilesize: 5,
                            init: function() {
                                this.on("sending", (file, xhr, formData) => {
                                    const folder = dropzoneElement.attr("data-folder") ||
                                        "employees_document";
                                    formData.append("folder", folder);
                                });

                                this.on("success", (file, response) => {
                                    if (response.success) {
                                        localStorage.removeItem("importKey");
                                        localStorage.setItem("importKey", response.importKey);
                                        checkProgress(response.importKey);
                                    } else {
                                        showErrorNotification('error',
                                            response.message);
                                    }
                                });

                                this.on("error", (file, message) => {
                                    if (file.size > this.options.maxFilesize * 1024 * 1024) {
                                        showErrorNotification('error',
                                            "Error! File too large.");
                                        this.removeFile(file);
                                    } else {
                                        showErrorNotification('error', message);
                                    }
                                });

                                this.on("maxfilesexceeded", (file) => {
                                    showErrorNotification('error', "No more files please!");
                                    this.removeFile(file);
                                });
                            }
                        };

                        dropzoneElement.data("single") && (t.maxFiles = 1);

                        dropzoneElement.data("file-types") &&
                            (t.accept = (file, done) => {
                                const acceptedTypes = dropzoneElement
                                    .data("file-types")
                                    .split("|");
                                if (acceptedTypes.indexOf(file.type) === -1) {
                                    showErrorNotification('error',
                                        "Error! Files of this type are not accepted");
                                    done("Error! Files of this type are not accepted");
                                } else {
                                    console.log("Uploaded");
                                    done();
                                }
                            });

                        new Dropzone(this, t);
                    });
                })();
            })();

            function checkProgress(importkey) {
                $("#progressBarBox").removeClass("hidden");
                const key = importkey;
                fetch(`http://apidev.duluin.com/api/users/employees/import-progress/${key}`, {
                        headers: {
                            'Authorization': `Bearer ${appToken}`,
                            'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        const progress = Math.round(data.progress);

                        $('#progressValue').html(progress);
                        $('#progressBar').val(progress);
                        $('#progressBar').css('width', `${progress}%`);

                        if (progress < 100) {
                            $('#autoReloadComponent').html(`Import is ${progress}% completed. Please wait...`);
                            setTimeout(() => checkProgress(importkey), 1000);
                        } else {
                            $('autoReloadComponent').html('Import completed successfully!');
                            showSuccessNotification('success', 'Import completed!');
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching progress:', error);
                        $('#autoReloadComponent').html('Error occurred while processing. Please try again.');
                    });
            }
        </script>
    @endpush
