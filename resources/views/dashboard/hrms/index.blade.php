@extends('layouts.dashboard.app')
@section('content')

<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
       
        
        <div id="contents-page" class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <!-- <div class="container"> -->
            @if (request()->get('initialize') == 'success')
            <div class="flex flex-col gap-2 mb-5">
                <div role="alert" class="alert relative border rounded-md px-5 py-4 bg-primary border-primary text-white dark:border-primary">
                    <div class="flex items-center">
                        <div class="flex items-center text-lg font-medium">
                        <i data-tw-merge data-lucide="alert-circle" class="stroke-[1] w-5 h-5 mr-2 h-6 w-6 mr-2 h-6 w-6"></i>
                            Welcome to the HRMS Dashboard!
                        </div>
                        <div class="ml-auto rounded-md bg-white px-1 text-xs text-slate-700">
                            New
                        </div>
                    </div>
                    <div class="mt-3">
                    We’re thrilled to have you onboard as part of our growing community. This platform is designed to streamline your HR tasks, from employee management to payroll processing, and everything in between.
                    </div>
                </div>
            </div>
            @endif
            @include('dashboard.hrms.elm_hrms')
                <div id="loading-indicator" class="items-center" style="display: none;"></div>
                    
            <!-- </div> -->
        </div>
        
    
</div>
<script>
document.addEventListener('DOMContentLoaded', async function() {
    const menu = document.getElementById("contents-page");
    const content = document.getElementById("contents-page");
    const loadingIndicator = document.getElementById("loading-indicator");
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    getDataChart();

    async function getDataChart()
        {
            var param = {
                url: "{{ $apiChartAttendance }}",
                // url: "http://localhost:4446/api/v1/attendance/report/chart?company_id=c8f745e0-aa6e-458b-bb70-4dda3e2accea",
                method: "GET",
            }

            await transAjax(param).then((result) => {
                const chart = result.data;
                console.log(chart);

                //chart
                let e = $(".report-bar-chart-5");
                e.length &&
                    e.each(function () {
                        let a = $(this)[0].getContext("2d"),
                            r = new Chart(a, {
                                type: "bar",
                                data: chart,
                                options: {
                                    maintainAspectRatio: !1,
                                    plugins: { legend: { display: !1 } },
                                    scales: {
                                        x: {
                                            ticks: {
                                                color: getColor("slate.500", 0.7),
                                            },
                                            grid: { display: !1 },
                                            border: { display: !1 },
                                        },
                                        y: {
                                            ticks: {
                                                autoSkipPadding: 30,
                                                color: getColor("slate.500", 0.9),
                                                beginAtZero: !0,
                                            },
                                            grid: { color: getColor("slate.200", 0.7) },
                                            border: { display: !1 },
                                        },
                                    },
                                    onClick: function (e, elements) {
                                        if (elements.length > 0) {
                                            const firstElement = elements[0]; 
                                            const datasetIndex = firstElement.datasetIndex;
                                            const index = firstElement.index;

                                            const label = r.data.labels[index];
                                            const dataValue = r.data.datasets[datasetIndex].data[index];

                                            // clickable
                                            const baseUrl = '{{ url('dashboard/hrms/attendance/attendance') }}';
                                            window.location.href = `${baseUrl}?attendance_status=${r.data.datasets[datasetIndex].label.toLowerCase()}&attendance_date=${label}`;
                                            // console.log(`You clicked on ${label}: ${dataValue} ${r.data.datasets[datasetIndex].label}`);
                                        }
                                    }
                                },
                            });
                    });
                
            }).catch((error) => {
                console.log(error);
            });

            //user bisa menampilkan data berdasarkan range tanggal yang dipilih
            // $(".litepicker").on("click", ".button-apply", function() {
            //     $("#loading").removeAttr('style', 'display: none');
            // });
        }
    
    const routes = {
      
        duluin_gajian: {
            path: '{{ url('/dashboard/hrms/duluin_gajian') }}',
            element: '{{ url('/dashboard/hrms/elm/duluin_gajian') }}'
        },
       
    };

    async function loadContent(url) {
        try {
            loadingIndicator.style.display = 'block';
            const response = await fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': csrfToken
                }
            });
            const data = await response.text();
            content.innerHTML = data;

        } catch (error) {
            console.error('Error loading content:', error);
        } finally {
            loadingIndicator.style.display = 'none';
        }
    }

    async function initializeContent() {
        const initialPath = window.location.pathname.split('/').pop();
        const route = routes[initialPath];

        if (route) {
            await loadContent(route.element);
            history.replaceState(initialPath, '', route.path);
            setActiveClassByPath();
            updateBreadcrumb();
        }
    }

    menu.addEventListener('click', async function(event) {
    let target = event.target;
        while (target && target.tagName !== 'A') {
            target = target.parentElement;
        }
        
        if (target) {
            const id = target?.id;
            const route = routes[id];            
            if (route) {
                event.preventDefault();
                window.history.pushState(id, '', route.path);
                await loadContent(route.element);
                setActiveClassByPath();
                updateBreadcrumb();
            }
        }
    });

    window.addEventListener('popstate', async function(event) {
        const route = routes[event.state];
        console.log(route);
        if (route) {
            await loadContent(route.element);
            setActiveClassByPath();
            updateBreadcrumb();
        }else {
        
        location.reload();
    }
    });

    function setActiveClassByPath() {
        const currentPath = window.location.pathname.split('/').pop();
        const routeKey = Object.keys(routes).find(key => routes[key].path.endsWith(currentPath));
        
        if (routeKey) {
            const menuItems = menu.querySelectorAll('.menu-item');
            menuItems.forEach(item => item.classList.remove('active'));

            const activeItem = menu.querySelector(`#${routeKey}`);
            if (activeItem) {
                activeItem.classList.add('active');
            }
        }
    }

    await initializeContent();
});

</script>

@endsection
