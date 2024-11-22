(() => {
    (function () {
        "use strict";
        $(".datepicker").each(function () {
            let e = {
                autoApply: !1,
                singleMode: !1,
                numberOfColumns: 2,
                numberOfMonths: 2,
                showWeekNumbers: !0,
                format: "YYYY-MM-DD",
                dropdowns: {
                    minYear: 2000,
                    maxYear: null,
                    months: !0,
                    years: !0,
                },
            };

            // Check for singleMode and format
            if ($(this).data("single-mode")) {
                e.singleMode = !0;
                e.numberOfColumns = 1;
                e.numberOfMonths = 1;
            }
            if ($(this).data("format")) {
                e.format = $(this).data("format");
            }

            // Set default value if none is present
            if (!$(this).val()) {
                const now = dayjs();
                const oneMonthBefore = now.subtract(1, "month").format(e.format);
                const currentDate = now.format(e.format);
                const defaultRange = e.singleMode
                    ? currentDate
                    : `${oneMonthBefore} - ${currentDate}`;
                $(this).val(defaultRange);
            }

            // Initialize the date picker
            new Litepicker({ element: this, ...e });
        });
    })();
})();
