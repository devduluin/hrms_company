@props([
    'label',
    'option1',
    'option2',
])

<div class="flex flex-col box col-span-4 rounded-[0.6rem p-5 shadow-sm md:col-span-2 xl:col-span-1">
    <div class="flex items-center justify-between gap-10 sm:col-span-1">
        <div class="  flex pr-12">
            <div class="font-medium mt-1.5 text-xl">
                {{ $label }}
            </div>
        </div>
        <div class="select-with-icon">
            <select data-tw-merge="" class="align-self-stretch ml-auto  flex flex-col gap-x-3 gap-y-2 sm:ml-auto sm:flex-row disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1 mt-2 flex-1">
                <option value="This Month">
                    {{ $option1 ?? '' }}
                </option>
                <option value="Last Month">
                    {{ $option2 ?? '' }}
                </option>
            </select>
        </div>
    </div>
    <div class="card-body d-flex justify-content-center align-items-center">
        <canvas class="donut-chart"  width="300" height="300"></canvas>
    </div>
</div>

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('dist/js/components/donut_chart.js') }}"></script>

<script>
    $(document).ready(function() {
        let a = $(".donut-chart");
        if (a.length) {
            a.each(function() {
                let r = $(this)[0].getContext("2d"),
                    e = [15, 10, 65, 25],
                    t = () => ['#FF9C66', '#00E396', '#008FFB', '#FEB019'],
                    o = new Chart(r, { 
                        type: "doughnut", 
                        data: { 
                            labels: ["Legend1", "Legend2", "Legend3"], 
                            datasets: [{
                                data: e, 
                                backgroundColor: t(), 
                                hoverBackgroundColor: t(), 
                                borderWidth: 5, 
                                borderColor: "#FFFFFF" 
                            }] 
                        }, 
                        options: { 
                            maintainAspectRatio: false, 
                            plugins: { 
                                legend: { 
                                    position: 'right',
                                    labels: { 
                                        color: "#64748B",
                                        usePointStyle: true,  
                                        pointStyle: 'circle'
                                    } 
                                } 
                            }, 
                            cutout: "60%" 
                        } 
                    });
            });
        }
    });
</script>

@endpush