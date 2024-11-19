function initializeTomSelect() {
    (function () {
        "use strict";
        $(".tom-select").each(function () {
            let element = $(this);
            let title = element.data("title");
            let url = element.data("url");
            let method = element.data("method") || "POST";
            let api = element.data("api") || "";
            let detail_api = element.data("detail-api") || "";
            let detailKeys = element.data("detail-attributes") || "";
            let company_id = localStorage.getItem("company");
            let selectType = element.attr("data-selectType");
            let selectedId = element.data("selected");
            let keysData = element.attr("data-attributes");
            let appToken = localStorage.getItem("app_token");
            let dependant = element.data("dependant");
            let parent = element.data("parent");
            console.log(parent);

            try {
                selectType = JSON.parse(selectType);
            } catch (e) {
                selectType = null;
            }

            let config = {
                allowEmptyOption: true,
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
                                    return { id: item.id, name: name };
                                });
                                console.log(options);
                                if(options){
                                    callback(options);
                                }
                                
                            },
                            error: function (xhr, status, error) {
                                console.error("Error fetching data:", error);
                                callback();
                            },
                        });
                    }
                },
                onChange: function (value) {
                    if (dependant) {
                        // Fetch employee details based on selected employee_id
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
                                        dependantElement.load((callback) => {
                                            console.log(callback);
                                            $.ajax({
                                                url: $(this).data("api"),
                                                type: method,
                                                contentType: "application/json",
                                                headers: {
                                                    Authorization: `Bearer ${appToken}`,
                                                    "X-Forwarded-Host": `${window.location.protocol}//${window.location.hostname}`,
                                                },
                                                data: JSON.stringify({
                                                    company_id: value,
                                                }),
                                                success: function (response) {
                                                    console.log(response);
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
                                                        setTimeout(() => {
                                                            dependantElement.setValue(
                                                                approverId
                                                            );
                                                        }, 200); // Adjust delay as needed
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
                                        });
                                    }
                                });
                            },
                            error: function (xhr, status, error) {
                                console.error(
                                    "Error fetching employee details:",
                                    error
                                );
                            },
                        });
                    }
                },
                onLoad: function () {
                    const tomSelectInstance = this;
                    if (selectedId) {
                        tomSelectInstance.setValue(selectedId);
                    }
                    
                },
                render: {
                    option_create: function (data, escape) {
                        if (url) {
                            return `<div class="create" onclick="window.location.href='${url}?item=${encodeURIComponent(
                                data.input
                            )}'> + Add ${title} <strong>${escape(
                                data.input
                            )}</strong> </div>`;
                        }
                    },
                    no_results: function (data, escape) {
                        if (url) {
                            return `<div class="no-results">No results found. <a href="${url}?item=${encodeURIComponent(
                                data.input
                            )}">Click here to add ${title}</a></div>`;
                        }
                    },
                    loading: function () {
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
                        remove_button: { title: "Remove this item" },
                    },
                    persist: false,
                    create: true,
                    onDelete: (values) =>
                        confirm(
                            values.length > 1
                                ? `Are you sure you want to remove these ${values.length} items?`
                                : `Are you sure you want to remove "${values[0]}"?`
                        ),
                });
            $(this).data("header") &&
                (config = {
                    ...config,
                    plugins: {
                        ...config.plugins,
                        dropdown_header: { title: $(this).data("header") },
                    },
                });

            const tomSelectInstance = new TomSelect(this, config);
            if (!parent) {
                tomSelectInstance.load("");
            }
        });
    })();
}

window.initializeTomSelect = initializeTomSelect;
