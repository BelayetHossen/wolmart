(function ($) {
    $(document).ready(function () {
        // order table to data table
        $("#all_order_table").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/admin/order/all",
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

        // trashed product table to data table
        // $("#trashed_posts_table").DataTable({
        //     processing: true,
        //     serverSide: true,
        //     ajax: {
        //         url: "/admin/posts/trashed",
        //     },
        //     columns: [
        //         {
        //             data: "sl",
        //             name: "sl",
        //         },
        //         {
        //             data: "photo",
        //             name: "photo",
        //         },
        //         {
        //             data: "title",
        //             name: "title",
        //         },
        //         {
        //             data: "category",
        //             name: "category",
        //         },
        //         {
        //             data: "brand",
        //             name: "brand",
        //         },
        //         {
        //             data: "status",
        //             name: "status",
        //         },
        //         {
        //             data: "action",
        //             name: "action",
        //         },
        //     ],
        // });

        /*
        |--------------------------------------------------------------------------
        | Order status change system
        |--------------------------------------------------------------------------
        */
        $(document).on('click', '.order_status_btn', function (e) {
            e.preventDefault();
            let id = $(this).attr('order_status_id');
            let value = $(this).attr('value');
            $.ajax({
                url: '/admin/order/status/' + id + '/' + value,
                success: function (response) {
                    Swal.fire({
                        position: "top-end",
                        type: "success",
                        title: "Status has been changed successfully !",
                        showConfirmButton: !1,
                        timer: 1000,
                    });
                    $("#all_order_table").DataTable().ajax.reload();
                }
            });
        })
        /*
        |--------------------------------------------------------------------------
        | Order delete system
        |--------------------------------------------------------------------------
        */
        $(document).on('click', '.order_delete_btn', function (e) {
            e.preventDefault();
            let id = $(this).attr('order_delete_id');
            swal({
                title: "Are you sure ?",
                text: "Order delete, you will not be able to recover this role!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "/admin/order/delete/" + id,
                        success: function (data) {
                            swal("Great ! The order has been permanently deleted !", {
                                icon: "success",
                            });
                            $("#all_order_table").DataTable().ajax.reload();
                        },
                    });
                } else {
                    swal("Great ! Your order data is safe !", {
                        icon: "success",
                    });
                }
            });
        })

        //



















        //
    });
})(jQuery);
