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
        <canvas class="line-chart"  width="300" height="300"></canvas>
    </div>
</div>

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('dist/js/components/_chart.js') }}"></script>

<script>
    $(document).ready(function() {
        let a = $(".line-chart");
        if (a.length) {
            a.each(function() {
                let r = $(this)[0].getContext("2d"),
                    e = [15, 10, 65, 15, 10, 65, 15, 10, 65, 15, 10, 65, 15, 10, 65],
                    t = () => ['#B2CCFF', '#B2CCFF', '#B2CCFF', '#B2CCFF'],
                    o = new Chart(r, { 
                        type: "line", 
                        data: { 
                            labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"], 
                            datasets: [{
                                data: e, 
                                backgroundColor: t().map(color => color + '50'), 
                                borderColor: t(), 
                                borderWidth: 2, 
                                fill: true, 
                                tension: 0.1 
                            }] 
                        }, 
                        options: { 
                            maintainAspectRatio: false, 
                            
                            scales: {
                                x: {
                                    beginAtZero: true,
                                    grid: {
                                        color: "#e5e5e5" // Warna grid sumbu X
                                    }
                                },
                                y: {
                                    beginAtZero: true,
                                    grid: {
                                        color: "#e5e5e5" // Warna grid sumbu Y
                                    }
                                }
                            }
                        } 
                    });
            });
        }
    });
</script>


@endpush