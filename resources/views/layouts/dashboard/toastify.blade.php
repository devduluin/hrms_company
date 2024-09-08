<!-- Toastify -->
<div class="preview relative [&.hide]:overflow-hidden [&.hide]:h-0">
    <div class="text-center">
        <div id="error-notification-content"
            class="py-5 pl-5 pr-14 bg-white border border-slate-200/60 rounded-lg shadow-xl dark:bg-darkmode-600 dark:text-slate-300 dark:border-darkmode-600 hidden flex">
            <i data-tw-merge="" data-lucide="x-circle" class="stroke-[1] w-5 h-5 text-danger"></i>
            <div class="ml-4 mr-4">
                <div class="font-medium" id="error-title">...</div>
                <div class="mt-1 text-slate-500" id="error-message">
                    ...
                </div>
            </div>
        </div>
    </div>
</div>

<div class="preview relative [&.hide]:overflow-hidden [&.hide]:h-0">
    <div class="text-center">
        <div id="success-notification-content"
            class="py-5 pl-5 pr-14 bg-white border border-slate-200/60 rounded-lg shadow-xl dark:bg-darkmode-600 dark:text-slate-300 dark:border-darkmode-600 hidden flex">
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
<!-- End Toastify -->
@push('js')
    <script>
        function showSuccessNotification(title, message) {
            var notificationContent = document.getElementById("success-notification-content");
            document.getElementById("success-title").textContent = title;
            document.getElementById("success-message").textContent = message;

            Toastify({
                node: $("#success-notification-content")
                    .clone()
                    .removeClass("hidden")[0],
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
            }).showToast();
        }

        function showErrorNotification(title, message) {
            var notificationContent = document.getElementById("error-notification-content");
            document.getElementById("error-title").textContent = title;
            document.getElementById("error-message").textContent = message;

            Toastify({
                node: $("#error-notification-content")
                    .clone()
                    .removeClass("hidden")[0],
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
            }).showToast();
        }
    </script>
@endpush
