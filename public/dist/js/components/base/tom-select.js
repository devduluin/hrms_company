function initializeTomSelect() {
    (function () {
        ("use strict");
        $(".tom-select").each(function () {
            let title = $(this).data("title");
            let url = $(this).data("url");
            let api = $(this).data("api") ?? "";
            let company_id = localStorage.getItem("company");
            let selectType = $(this).attr("data-selectType");
            let selectedId = $(this).attr("data-selected");
            const keysData = $(this).attr("data-attributes");
            const appToken = localStorage.getItem("app_token");

            try {
                selectType = JSON.parse(selectType);
            } catch (e) {
                selectType = null;
            }

            let e = {
                valueField: "id",
                labelField: "name",
                searchField: "name",
                selectOnTab: true,
                plugins: {
                    dropdown_input: {},
                },
                create: true,
                load: function (query, callback) {
                    if (!query.length) return callback();

                    if (api && selectType.length > 0) {
                        const payload = {
                            draw: 0,
                            start: 0,
                            length: 10,
                            search: query,
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

                        $.ajax({
                            url: api,
                            type: "POST",
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
                                callback(options);

                                const tomSelectInstance = $(this)[0].tomselect;
                                if (tomSelectInstance && selectedId) {
                                    const selectedOption = options.find(
                                        (option) => option.id === selectedId
                                    );

                                    if (selectedOption) {
                                        tomSelectInstance.addOption({
                                            value: selectedOption.id,
                                            text: selectedOption.name,
                                        });
                                        tomSelectInstance.setValue(
                                            selectedOption.id
                                        );
                                    }
                                }
                            },
                            error: function (xhr, status, error) {
                                console.error("Error fetching data:", error);
                                callback();
                            },
                        });
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
                },
            };

            $(this).data("placeholder") &&
                (e.placeholder = $(this).data("placeholder"));
            $(this).attr("multiple") !== void 0 &&
                (e = {
                    ...e,
                    plugins: {
                        ...e.plugins,
                        remove_button: {
                            title: "Remove this item",
                        },
                    },
                    persist: !1,
                    create: !0,
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
                (e = {
                    ...e,
                    plugins: {
                        ...e.plugins,
                        dropdown_header: {
                            title: $(this).data("header"),
                        },
                    },
                });

            new TomSelect(this, e);
        });
    })();
}

window.initializeTomSelect = initializeTomSelect;
