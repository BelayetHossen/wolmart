(function ($) {
    $(document).ready(function () {
        // trashed product table to data table
        $("#posts_table").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/admin/posts/all",
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
        | post trash-restore system
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".post_trash_btn", function (e) {
            e.preventDefault();
            let id = $(this).attr("post_trash_id");
            $.ajax({
                url: "/post/trashRestore/" + id,
                success: function (data) {
                    $("#posts_table").DataTable().ajax.reload();
                    $("#trashed_posts_table").DataTable().ajax.reload();
                    if (data.key == "back") {
                        function successAlert() {
                            Swal.fire({
                                position: "top-end",
                                type: "success",
                                title: "Category is restored successfully !",
                                showConfirmButton: !1,
                                timer: 3000,
                            });
                        }
                        successAlert();
                    } else {
                        function successAlert() {
                            Swal.fire({
                                position: "top-end",
                                type: "success",
                                title: "Category is move to trash successfully !",
                                showConfirmButton: !1,
                                timer: 3000,
                            });
                        }
                        successAlert();
                    }
                },
            });
        });

        /*
        |--------------------------------------------------------------------------
        | post delete system
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".post_delete_btn", function (e) {
            e.preventDefault();
            let id = $(this).attr("post_delete_id");
            swal({
                title: "Are you sure ?",
                text: "Post delete, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "/post/delete/" + id,
                        success: function (data) {
                            $("#trashed_posts_table").DataTable().ajax.reload();
                        },
                    });
                    swal("Great ! The post has been permanently deleted !", {
                        icon: "success",
                    });
                } else {
                    swal("Great ! Your post data is safe !", {
                        icon: "success",
                    });
                }
            });
        });

        //
    });
})(jQuery);
