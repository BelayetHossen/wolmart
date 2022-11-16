(function ($) {
    $(document).ready(function () {
        // order table to data table
        $("#vendor_order_table").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/vendor/orders/all",
            },
            columns: [
                {
                    data: "sl",
                    name: "sl",
                },
                {
                    data: "contact",
                    name: "contact",
                },
                {
                    data: "ordernumber",
                    name: "ordernumber",
                },
                {
                    data: "qty",
                    name: "qty",
                },
                {
                    data: "price",
                    name: "price",
                },
                {
                    data: "status",
                    name: "status",
                },
                {
                    data: "action",
                    name: "action",
                },

            ],
        });






        //
    });
})(jQuery);
