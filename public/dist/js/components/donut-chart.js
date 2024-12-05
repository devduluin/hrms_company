(() => {
    (function () {
        "use strict";

        let a = $(".donut-chart");

        if (a.length) {
            a.each(function () {
                let method = $(this).data("method") ?? "GET";
                let api = $(this).data("api") ?? ""; 
                let company_id = localStorage.getItem("company");
                let labels = $(this).data("labels") || [];
                let itemData = $(this).data("item") || "";  //ngambil nama atribut, contoh : gender => nama atribut di response
                let r = $(this)[0].getContext("2d");
                labels = Array.isArray(labels) ? labels : JSON.parse(labels);

                let t = () => [
                    getColor("pending", .9),   
                    getColor("warning", .9),   
                    getColor("primary", .9),   
                    getColor("success", .9),   
                    getColor("info", .9),      
                    getColor("danger", .9),    
                    getColor("slate.400", .9), 
                    getColor("indigo.400", .9),
                    getColor("yellow.400", .9),
                    getColor("pink.400", .9),  
                    getColor("cyan.400", .9),  
                    getColor("green.400", .9), 
                    getColor("red.400", .9),   
                    getColor("teal.400", .9),  
                    getColor("blue.400", .9)   
                ];

                let e = [15, 10, 65];

                let o = new Chart(r, {
                    type: "doughnut",
                    data: {
                        labels: labels,
                        datasets: [{
                            data: e,
                            backgroundColor: t(),
                            hoverBackgroundColor: t(),
                            borderWidth: 5,
                            borderColor: getColor("white")
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                labels: {
                                    color: getColor("slate.500", .8)
                                }
                            }
                        },
                        cutout: "80%"
                    }
                });

                helper.watchCssVariables("html", ["color-pending", "color-warning", "color-primary"], n => {
                    o.data.datasets[0].backgroundColor = t();
                    o.data.datasets[0].hoverBackgroundColor = t();
                    o.update(); 
                });

                function fetchDataAndUpdateChart() {
                    if (api) {
                        $.ajax({
                            url: api,
                            type: method,
                            headers: {
                                "Authorization": `Bearer ${localStorage.getItem("app_token")}`,
                                "X-Forwarded-Host": `${window.location.protocol}//${window.location.hostname}`,
                            },
                            success: function (response) {
                                if (response && response.data) {
                                    const groupData = response.data;

                                    const capitalizeWords = (str) => {
                                        if (!str) return "N/A"; 
                                        return str
                                            .split(" ")
                                            .map(word => word.charAt(0).toUpperCase() + word.slice(1))
                                            .join(" ");
                                    };
                
                                    const newLabels = [];
                                    const chartData = [];
                
                                    groupData.forEach(item => {
                                        let labelValue = null;
                
                                        // cek _rel atribut
                                        if (item[`${itemData}_rel`] && typeof item[`${itemData}_rel`] === 'object') {
                                            labelValue = item[`${itemData}_rel`]?.department_name || null; // Example for department_name
                                        }
                
                                        // Fallback to the base attribute if `_rel` does not exist
                                        if (!labelValue) {
                                            labelValue = item[itemData] || "N/A"; // Use "N/A" if neither value is available
                                        }
                
                                        newLabels.push(capitalizeWords(labelValue));
                                        chartData.push(item.count || 0);
                                    });
                
                                    o.data.labels = newLabels;
                                    o.data.datasets[0].data = chartData; 
                                    o.update();
                                } else {
                                    console.error("API response format error or attribute is missing");
                                }
                            },
                            error: function (xhr, status, error) {
                                console.error("Error fetching data:", error);
                            },
                        });
                    } else {
                        console.error("API, labels, or attribute not properly configured");
                    }
                }
                
                

                fetchDataAndUpdateChart();

            });
        }
    })();
})();