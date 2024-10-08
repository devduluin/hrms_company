@include('vendor-common.dropzone')
@props([
    'type' => 'text',
    'id',
    'name',
    'label' => null,
    'required' => '' ?? false,
    'guidelines',
    'action',
    'folder',
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
<form data-single="true" action="{{ $action }}" data-folder="{{ $folder }}"
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
@push('js')
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
                        init: function() {
                            this.on("sending", (file, xhr, formData) => {
                                const folder = dropzoneElement.attr("data-folder") ||
                                    "employees";
                                formData.append("folder", folder);
                                console.log("Folder added to request:", folder);
                            });

                            this.on("success", (file, response) => {
                                console.log("File successfully uploaded");
                                console.log("Response from server:", response);
                                if (response.success) {
                                    console.log("Message:", response.message);
                                    console.log("File URL:", response.file);
                                    $("#avatar").val(response.file);
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
@endpush
