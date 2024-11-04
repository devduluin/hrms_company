    <script src="{{ asset('dist/js/vendors/tailwind-merge.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/lucide.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/dayjs.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/tiny-slider.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/popper.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/dropdown.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/tippy.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/simplebar.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/transition.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/chartjs.js') }}"></script>
    <script src="{{ asset('dist/js/vendors/modal.js') }}"></script>
    <script src="{{ asset('dist/js/components/base/theme-color.js') }}"></script>
    <script src="{{ asset('dist/js/components/base/lucide.js') }}"></script>
    <script src="{{ asset('dist/js/components/base/tiny-slider.js') }}"></script>
    <script src="{{ asset('dist/js/utils/colors.js') }}"></script>
    <script src="{{ asset('dist/js/utils/helper.js') }}"></script>
    <script src="{{ asset('dist/js/components/report-line-chart.js') }}"></script>
    <script src="{{ asset('dist/js/components/report-donut-chart-3.js') }}"></script>
    <script src="{{ asset('dist/js/components/base/tippy.js') }}"></script>
    <script src="{{ asset('dist/js/themes/hurricane.js') }}"></script>
    <script src="{{ asset('dist/js/components/quick-search.js') }}"></script>
    <script src="{{ asset('dist/js/components/quick-search.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="{{ asset('dist/js/vendors/toastify.js') }}"></script>
    <script>
        initializeDropdown();
    </script>
    <script type="text/javascript">
        const appToken = localStorage.getItem('app_token');
        async function transAjax(data) {
            html = null;
            data.headers = {
                'Authorization': `Bearer ${appToken}`,
                'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`,
                'Content-Type': 'application/json',
            }
            await $.ajax(data).done(function(res) {
                    html = res;
                })
                .fail(function() {
                    return false;
                })
            return html
        }

        //sementara
        async function transAjaxx(data) {
            html = null;
            data.headers = {
                'Authorization': `Bearer xN9P6a8sL2bV3iR4fC5J6Q7kT8yU9wZ0`,
                'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`,
                'Content-Type': 'application/json',
            }
            await $.ajax(data).done(function(res) {
                    html = res;
                })
                .fail(function() {
                    return false;
                })
            return html
        }
    </script>
    @stack('js')
    </body>

    </html>
