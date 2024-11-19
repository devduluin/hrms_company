function initializeTomSelect() {
    (function () {
        "use strict";
        $(".tom-select").each(function () {
            // let element = $(this);
            let title = $(this).attr("data-title");
            let url = $(this).attr("data-url");
            let method = $(this).attr("data-method") || "POST";
            let api = $(this).attr("data-api") || "";
            let detail_api = $(this).attr("data-detail-api") || "";
            let detailKeys = $(this).attr("data-detail-attributes") || "";
            let company_id = localStorage.getItem("company");
            let selectType = $(this).attr("data-selectType");
            let selectedId = $(this).data("selected");
            let keysData = $(this).attr("data-attributes");
            let appToken = localStorage.getItem("app_token");
            let dependant = $(this).attr("data-dependant");
            let customFunction = $(this).attr("data-function");
            let parent = $(this).attr("data-parent");
            console.log(parent);

            try {
                selectType = JSON.parse(selectType);
            } catch (e) {
                selectType = null;
            }

            let config = {
                valueField: "id",
                labelField: "name",
                searchField: "name",
                selectOnTab: true,
                plugins: { dropdown_input: {} },
                create: true,
                load: function (query, callback) {
                    if (api && selectType.length > 0) {
                        let payload = {
                            draw: 0,
                            start: 0,
                            length: 25,
                            search: query || "",
                            order: [{ column: 0, dir: "desc" }],
                        };

                        if (keysData) {
                            try {
                                const jsonObject = JSON.parse(keysData);
                                for (const [key, value] of Object.entries(
                                    jsonObject
                                )) {
                                    payload[key] = value;
                                }
                            } catch (e) {
                                console.error("Error parsing JSON:", e);
                            }
                        }

                        if (typeof data !== "undefined") {
                            Object.entries(data).forEach(([key, selector]) => {
                                payload[key] =
                                    $(selector).val() ||
                                    $(selector).data("selected");
                            });
                        }

                        $.ajax({
                            url: api,
                            type: method,
                            contentType: "application/json",
                            headers: {
                                Authorization: `Bearer ${appToken}`,
                                "X-Forwarded-Host": `${window.location.protocol}//${window.location.hostname}`,
                            },
                            data: JSON.stringify(payload),
                            success: function (response) {
                                const options = response.data.map((item) => {
                                    let name = selectType
                                        .map((field) => item[field] || "")
                                        .join(" ");
                                    return {
                                        id: item.id,
                                        name: name,
                                    };
                                });

                                // Check if selectedId exists in options, otherwise add it manually
                                if (
                                    selectedId &&
                                    !options.some(
                                        (option) => option.id === selectedId
                                    )
                                ) {
                                    // Add the selected option if it does not exist in the loaded options
                                    options.push({
                                        id: selectedId,
                                        name: options.name, // You can customize the name as needed
                                    });
                                }

                                callback(options);
                            },
                            error: function (xhr, status, error) {
                                console.error("Error fetching data:", error);
                                callback();
                            },
                        });
                    }
                },
                onChange: function (value) {
                    if (typeof data !== "undefined") {
                        console.log("disini : ", data);
                        Object.entries(data).forEach(([key, selector]) => {
                            $(selector).val(value);
                            const keysData = $(this).attr("data-attributes");
                            var payload = {
                                draw: 0,
                                start: 0,
                                length: 25,
                                search: "",
                                order: [
                                    {
                                        column: 0,
                                        dir: "desc",
                                    },
                                ],
                            };

                            if (keysData) {
                                try {
                                    const jsonObject = JSON.parse(keysData);
                                    for (const [key, value] of Object.entries(
                                        jsonObject
                                    )) {
                                        payload[key] = value;
                                    }
                                } catch (e) {
                                    console.error("Error parsing JSON:", e);
                                }
                            }

                            payload = {
                                ...payload,
                                company_id: value,
                            };

                            console.log(
                                "API Endpoint : ",
                                $(`${selector}`).attr("data-api")
                            );
                        });
                    }

                    if (dependant) {
                        console.log(dependant, "onChange");
                        // Fetch employee details based on selected employee_id
                        if (detail_api !== null) {
                            $.ajax({
                                url: `${detail_api}/${value}`, // Adjust the URL to your employee detail endpoint
                                type: "GET",
                                headers: {
                                    Authorization: `Bearer ${appToken}`,
                                    "X-Forwarded-Host": `${window.location.protocol}//${window.location.hostname}`,
                                },
                                success: function (jsonData) {
                                    const approverId = eval(
                                        `jsonData.data.${detailKeys}`
                                    );
                                    $(dependant).each(function () {
                                        const dependantElement =
                                            $(this)[0].tomselect;
                                        if (dependantElement) {
                                            console.log("dependant");
                                            console.log(dependantElement);
                                            // dependantElement.clearOptions();
                                            dependantElement.load(
                                                (callback) => {
                                                    console.log(callback);
                                                    $.ajax({
                                                        url: $(this).data(
                                                            "api"
                                                        ),
                                                        type: method,
                                                        contentType:
                                                            "application/json",
                                                        headers: {
                                                            Authorization: `Bearer ${appToken}`,
                                                            "X-Forwarded-Host": `${window.location.protocol}//${window.location.hostname}`,
                                                        },
                                                        data: JSON.stringify({
                                                            company_id: value,
                                                        }),
                                                        success: function (
                                                            response
                                                        ) {
                                                            console.log(
                                                                response
                                                            );
                                                            const options =
                                                                response.data.map(
                                                                    (item) => {
                                                                        let name =
                                                                            selectType
                                                                                .map(
                                                                                    (
                                                                                        field
                                                                                    ) =>
                                                                                        item[
                                                                                            field
                                                                                        ] ||
                                                                                        ""
                                                                                )
                                                                                .join(
                                                                                    " "
                                                                                );
                                                                        return {
                                                                            id: item.id,
                                                                            name: name,
                                                                        };
                                                                    }
                                                                );
                                                            callback(options);

                                                            // Set selected value if approverId matches
                                                            if (
                                                                approverId &&
                                                                options.some(
                                                                    (option) =>
                                                                        option.id ===
                                                                        approverId
                                                                )
                                                            ) {
                                                                setTimeout(
                                                                    () => {
                                                                        dependantElement.setValue(
                                                                            approverId
                                                                        );
                                                                    },
                                                                    2000
                                                                ); // Adjust delay as needed
                                                            }
                                                        },
                                                        error: function (
                                                            xhr,
                                                            status,
                                                            error
                                                        ) {
                                                            console.error(
                                                                "Error fetching data:",
                                                                error
                                                            );
                                                            callback();
                                                        },
                                                    });
                                                }
                                            );
                                        }
                                    });
                                    // console.log(customFunction);
                                    // Check if the custom function exists on the window object and is a function
                                    if (
                                        typeof window[customFunction] ===
                                        "function"
                                    ) {
                                        // Call the function dynamically with the necessary arguments
                                        window[customFunction](
                                            dependant,
                                            approverId
                                        );
                                    } else {
                                        console.error(
                                            `Function "${customFunction}" is not defined or is not a function.`
                                        );
                                    }
                                },
                                error: function (xhr, status, error) {
                                    console.error(
                                        "Error fetching employee details:",
                                        error
                                    );
                                },
                            });
                        }
                    }
                },
                onLoad: function () {
                    const tomSelectInstance = this;

                    // Pre-select the option when TomSelect is initialized
                    if (selectedId) {
                        if (!tomSelectInstance.options[selectedId]) {
                            tomSelectInstance.addOption({
                                value: selectedId,
                                text: selectedId,
                            });
                        }
                        tomSelectInstance.setValue(selectedId);
                    }
                },
                render: {
                    option_create: function (data, escape) {
                        if (url) {
                            return (
                                '<div class="create" onclick="window.location.href=\'' +
                                url +
                                "?item=" +
                                encodeURIComponent(data.input) +
                                "'\"> + Add " +
                                title +
                                " <strong>" +
                                escape(data.input) +
                                "</strong> </div>"
                            );
                        }
                    },
                    no_results: function (data, escape) {
                        if (url) {
                            return (
                                '<div class="no-results">No results found. <a href="' +
                                url +
                                "?item=" +
                                encodeURIComponent(data.input) +
                                '">Click here to add ' +
                                title +
                                "</a></div>"
                            );
                        }
                    },
                    loading: function (data, escape) {
                        return "";
                    },
                },
            };

            $(this).data("placeholder") &&
                (config.placeholder = $(this).data("placeholder"));
            $(this).attr("multiple") !== void 0 &&
                (config = {
                    ...config,
                    plugins: {
                        ...config.plugins,
                        remove_button: {
                            title: "Remove this item",
                        },
                    },
                    persist: false,
                    create: true,
                    onDelete: function (t) {
                        return confirm(
                            t.length > 1
                                ? "Are you sure you want to remove these " +
                                      t.length +
                                      " items?"
                                : 'Are you sure you want to remove "' +
                                      t[0] +
                                      '"?'
                        );
                    },
                });
            $(this).data("header") &&
                (config = {
                    ...config,
                    plugins: {
                        ...config.plugins,
                        dropdown_header: {
                            title: $(this).data("header"),
                        },
                    },
                });

            const tomSelectInstance = new TomSelect(this, config);

            // Load options on page load without typing
            tomSelectInstance.load("");
        });
    })();
}

window.initializeTomSelect = initializeTomSelect;
