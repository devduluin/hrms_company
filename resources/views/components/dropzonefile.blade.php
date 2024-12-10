@props([
    'type' => 'text',
    'id',
    'name',
    'label' => null,
    'required' => '' ?? false,
    'guidelines',
    'action',
    'folder',
    'employee'
])
<div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-4">
    <div class="text-left">
        <div class="flex items-center">
            @if (isset($label))
                <div class="font-medium" for="{{ $id }}">{{ $label }}</div>
            @endif
            @if ($required)
                <div
                    class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                    Required
                </div>
            @endif
        </div>
        <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">

        </div>
    </div>
</div>
<form data-single="true" action="{{ $action }}" data-folder="{{ $folder }}" data-employee="{{ $employee }}"
    class="[&.dropzone]:border-2 [&.dropzone]:border-dashed dropzone [&.dropzone]:border-slate-300/70 [&.dropzone]:bg-slate-50 [&.dropzone]:cursor-pointer [&.dropzone]:dark:bg-darkmode-600 [&.dropzone]:dark:border-white/5 dropzone dropzone">
    @csrf
    <div class="fallback">
        <input name="file" type="file">
    </div>
    <div class="dz-message" data-dz-message>
        <div class="text-lg font-medium">
            Drop files here or click to upload.
        </div>
        <div class="text-gray-600">
            This is just a demo dropzone. Selected files are
            <span class="font-medium">not</span> actually
            uploaded.
        </div>
    </div>
</form>
@pushOnce('css')
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/highlight.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/themes/dagger.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}">
@endPushOnce
@pushOnce('js')
    <script src="{{ asset('dist/js/vendors/dropzone.js') }}"></script>
@endPushOnce
@pushonce('js')
    <script type="text/javascript">
        console.log("initial dropzone");
        (() => {
            (function() {
                "use strict";
                Dropzone.autoDiscover = false;

                $(".dropzone").each(function() {
                    const dropzoneElement = $(this);

                    let t = {
                        url: "{{ $action }}",
                        accept: (file, done) => {
                            console.log("Uploaded");
                            done();
                        },
                        maxFilesize: 5, // 5MB limit for files
                        clickable: true,
                        autoProcessQueue: true,
                        addRemoveLinks: true,
                        init: function() {
                            this.on("sending", (file, xhr, formData) => {
                                const folder = dropzoneElement.attr("data-folder") ||
                                    "employees";
                                const employee = dropzoneElement.attr("data-employee") || null;
                                formData.append("folder", folder);
                                if(employee != null) {
                                    formData.append("employee_id", employee);
                                }
                                // console.log("Folder added to request:", folder);
                            });

                            this.on("success", (file, response) => {
                                console.log("File successfully uploaded");
                                console.log("Response from server:", response);
                                if (response.success) {
                                    // console.log("Message:", response.message);
                                    // console.log("File URL:", response.file);
                                    $("input[name=avatar]").val(response.file);
                                    // alert(`File uploaded successfully: ${response.file}`);
                                } else {
                                    console.error("Upload failed:", response.message);
                                }
                            });

                            this.on("error", (file, message) => {
                                if (file.size > this.options.maxFilesize * 1024 * 1024) {
                                    alert("Error! File too large.");
                                    this.removeFile(file);
                                } else {
                                    alert(message);
                                }
                            });

                            this.on("maxfilesexceeded", (file) => {
                                alert("No more files please!");
                                this.removeFile(file);
                            });

                            this.on("removedfile", function (file) {
                                // console.log("delete file");
                                // console.log(file);
                                // console.log($("#avatar").val());
                                const bearerToken = localStorage.getItem("app_token");
                                $.ajax({
                                    url: "http://apidev.duluin.com/api/users/file_delete",
                                    method: "POST",
                                    headers: {
                                        "Authorization": `Bearer ${bearerToken}`,
                                        "Content-Type": "application/json"
                                    },
                                    data: JSON.stringify({
                                        "filename": $("#avatar").val()
                                    }),
                                    success: function(response) {
                                        if (response.success) {
                                            console.log("File deleted successfully:", response.message);
                                            $("#avatar").val("");
                                            showSuccessNotification('success', 'File deleted successfully');
                                        } else {
                                            console.error("Error deleting file:", response.message);
                                            showErrorNotification('error', "Failed to delete the file. " + response.message);
                                        }
                                    },
                                    error: function(xhr, status, error) {
                                        console.error("AJAX error:", status, error);
                                        alert("An error occurred while deleting the file.");
                                    }
                                });
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
                                alert("Error! Files of this type are not accepted");
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
    </script>
@endpushonce
