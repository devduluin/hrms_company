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
                            labels: Array.from(
                                { length: 15 },
                                (o, t) => t + 15
                            ),
                            datasets: [
                                {
                                    categoryPercentage: 0.4,
                                    barPercentage: 0.8,
                                    borderRadius: 2,
                                    data: Array.from({ length: 15 }, (o) =>
                                        _.random(1, 1e3)
                                    ),
                                    borderWidth: 1,
                                    borderColor: getColor("primary", 0.7),
                                    backgroundColor: getColor("primary", 0.35),
                                },
                                {
                                    categoryPercentage: 0.4,
                                    barPercentage: 0.8,
                                    borderRadius: 2,
                                    data: Array.from({ length: 15 }, (o) =>
                                        _.random(1, 1e3)
                                    ),
                                    borderWidth: 1,
                                    borderColor: getColor("success", 0.7),
                                    backgroundColor: getColor("success", 0.35),
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
                helper.watchCssVariables(
                    "html",
                    ["color-primary", "color-success"],
                    (o) => {
                        (r.data.datasets[0].borderColor = getColor(
                            "primary",
                            0.7
                        )),
                            (r.data.datasets[0].backgroundColor = getColor(
                                "primary",
                                0.35
                            )),
                            (r.data.datasets[1].borderColor = getColor(
                                "success",
                                0.7
                            )),
                            (r.data.datasets[1].backgroundColor = getColor(
                                "success",
                                0.35
                            )),
                            r.update();
                    }
                );
            });
    })();
})();
