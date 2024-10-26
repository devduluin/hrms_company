(() => {
    (function () {
        "use strict";
        let e = $(".report-bar-chart-5");
        e.length &&
            e.each(function () {
                let a = $(this)[0].getContext("2d"),
                    r = new Chart(a, {
                        type: "bar",
                        data: {
                            labels: [
                                1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14,
                                15,
                            ],
                            datasets: [
                                {
                                    categoryPercentage: 0.4,
                                    barPercentage: 0.8,
                                    borderRadius: 2,
                                    data: [
                                        500, 300, 700, 200, 600, 900, 250, 450,
                                        800, 120, 750, 340, 600, 420, 780,
                                    ],
                                    borderWidth: 1,
                                    borderColor: "rgba(0, 123, 255, 0.7)", // Color example for 'primary'
                                    backgroundColor: "rgba(0, 123, 255, 0.35)", // Background color for 'primary'
                                },
                                {
                                    categoryPercentage: 0.4,
                                    barPercentage: 0.8,
                                    borderRadius: 2,
                                    data: [
                                        350, 620, 450, 780, 390, 560, 230, 670,
                                        480, 290, 530, 690, 410, 350, 600,
                                    ],
                                    borderWidth: 1,
                                    borderColor: "rgba(40, 167, 69, 0.7)", // Color example for 'success'
                                    backgroundColor: "rgba(40, 167, 69, 0.35)", // Background color for 'success'
                                },
                            ],
                        },
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
                                        autoSkipPadding: 15,
                                        color: getColor("slate.500", 0.9),
                                        beginAtZero: !0,
                                    },
                                    grid: { color: getColor("slate.200", 0.7) },
                                    border: { display: !1 },
                                },
                            },
                        },
                    });
            });
    })();
})();
