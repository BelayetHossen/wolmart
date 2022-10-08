(function ($) {
    $(document).ready(function () {
        // trashed product table to data table
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
        $("#trashed_posts_table").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/admin/posts/trashed",
            },
            columns: [
                {
                    data: "sl",
                    name: "sl",
                },
                {
                    data: "photo",
                    name: "photo",
                },
                {
                    data: "title",
                    name: "title",
                },
                {
                    data: "category",
                    name: "category",
                },
                {
                    data: "brand",
                    name: "brand",
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

        /*
        |--------------------------------------------------------------------------
        | Order status change system
        |--------------------------------------------------------------------------
        */
       $(document).on('click', '.order_status_btn', function(e){
            e.preventDefault();
            let id = $(this).attr('order_status_id');
            let value = $(this).attr('value');
            $.ajax({
                url: '/admin/order/status/'+id+'/'+value,
                success: function(response){
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

       //



















        //
    });
})(jQuery);
