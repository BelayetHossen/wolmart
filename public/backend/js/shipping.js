(function ($) {
    $(document).ready(function () {
        /*
        |--------------------------------------------------------------------------
        | requred function
        |--------------------------------------------------------------------------
        */
        function fieldRequre(msg, type, margin = "-15px") {
            return `<p class="text-${type}" style="margin-top: ${margin};">${msg}</p>`;
        }
        /*
        |--------------------------------------------------------------------------
        | Shipping in data table
        |--------------------------------------------------------------------------
        */
        $("#shipping_table").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/admin/shipping/all",
            },
            columns: [
                {
                    name: "sl",
                    data: "id",
                },
                {
                    name: "title",
                    data: "title",
                },
                {
                    name: "duration",
                    data: "duration",
                },
                {
                    name: "status",
                    data: "status",
                },
                {
                    name: "action",
                    data: "action",
                },
            ],
        });
        /*
        |--------------------------------------------------------------------------
        | Shipping add system
        |--------------------------------------------------------------------------
        */
        $(document).on("submit", "#shipping_add_form", function (e) {
            e.preventDefault();
            let title = $('#shipping_add_form input[name="title"]').val();
            let duration = $('#shipping_add_form input[name="duration"]').val();
            if (title == "") {
                $(".title-msg").html(
                    fieldRequre("Title field is requred!", "danger")
                );
            } else {
                $(".title-msg").html("");
            }
            if (duration == "") {
                $(".duration-msg").html(
                    fieldRequre("Duration field is requred!", "danger")
                );
            } else {
                $(".duration-msg").html("");
            }
            if (title != "" && duration != "") {
                $.ajax({
                    url: "/admin/shipping/create",
                    method: "post",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.exist == "yes") {
                            $(".title-check-msg").html(
                                fieldRequre(
                                    "The title is already exist !",
                                    "danger",
                                    "-15px"
                                )
                            );
                        } else {
                            $(".title-check-msg").html("");
                            $("#shipping_table").DataTable().ajax.reload();
                            $("#shipping_add_modal").modal("hide");
                            $("#shipping_add_form")[0].reset();
                            Swal.fire({
                                position: "top-end",
                                type: "success",
                                title: "A new shipping added successfully !",
                                showConfirmButton: !1,
                                timer: 1500,
                            });
                        }
                    },
                });
            }
        });

        /*
        |--------------------------------------------------------------------------
        | Shipping edit system
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".shipping_edit_btn", function (e) {
            e.preventDefault();
            let id = $(this).attr("shipping_edit_id");
            $.ajax({
                url: "/admin/shipping/edit/" + id,
                success: function (data) {
                    $('#shipping_edit_form input[name="title"]').val(
                        data.title
                    );
                    $('#shipping_edit_form input[name="duration"]').val(
                        data.duration
                    );
                    $('#shipping_edit_form input[name="dha_price"]').val(
                        data.dha_price
                    );
                    $('#shipping_edit_form input[name="bari_price"]').val(
                        data.bari_price
                    );
                    $('#shipping_edit_form input[name="chit_price"]').val(
                        data.chit_price
                    );
                    $('#shipping_edit_form input[name="khul_price"]').val(
                        data.khul_price
                    );
                    $('#shipping_edit_form input[name="mym_price"]').val(
                        data.mym_price
                    );
                    $('#shipping_edit_form input[name="raj_price"]').val(
                        data.raj_price
                    );
                    $('#shipping_edit_form input[name="rang_price"]').val(
                        data.rang_price
                    );
                    $('#shipping_edit_form input[name="syl_price"]').val(
                        data.syl_price
                    );
                    $('#shipping_edit_form input[name="id"]').val(data.id);
                    $("#shipping_edit_modal").modal("show");
                },
            });
        });
        /*
        |--------------------------------------------------------------------------
        | Shipping update system
        |--------------------------------------------------------------------------
        */
        $(document).on("submit", "#shipping_edit_form", function (e) {
            e.preventDefault();
            let title = $('#shipping_edit_form input[name="title"]').val();
            let duration = $(
                '#shipping_edit_form input[name="duration"]'
            ).val();
            if (title == "") {
                $(".title-msg").html(
                    fieldRequre("Title field is requred!", "danger")
                );
            } else {
                $(".title-msg").html("");
            }
            if (duration == "") {
                $(".duration-msg").html(
                    fieldRequre("Duration field is requred!", "danger")
                );
            } else {
                $(".duration-msg").html("");
            }
            if (title != "" && duration != "") {
                $.ajax({
                    url: "/admin/shipping/update",
                    method: "post",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.exist == "yes") {
                            $(".title-check-msg").html(
                                fieldRequre(
                                    "The title is already exist !",
                                    "danger",
                                    "-15px"
                                )
                            );
                        } else {
                            $(".title-check-msg").html("");
                            $("#shipping_table").DataTable().ajax.reload();
                            $("#shipping_edit_modal").modal("hide");
                            Swal.fire({
                                position: "top-end",
                                type: "success",
                                title: "Shipping updated successfully !",
                                showConfirmButton: !1,
                                timer: 1500,
                            });
                        }
                    },
                });
            }
        });
        /*
        |--------------------------------------------------------------------------
        | Shipping status change system
        |--------------------------------------------------------------------------
        */
        $(document).on("change", "#shipping_status_btn", function (e) {
            let id = $(this).val();
            $.ajax({
                url: "/admin/shipping/status/" + id,
                success: function (data) {
                    $("#shipping_table").DataTable().ajax.reload();
                    Swal.fire({
                        position: "top-end",
                        type: "success",
                        title: "Shipping status change successfully !",
                        showConfirmButton: !1,
                        timer: 1500,
                    });
                },
            });
        });
        /*
        |--------------------------------------------------------------------------
        | Shipping delete system
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".shipping_delete_btn", function (e) {
            let id = $(this).attr("shipping_delete_id");
            swal({
                title: "Are you sure?",
                text: "Shipping delete, you will not be able to recover this role!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "/admin/shipping/delete/" + id,
                        success: function (data) {
                            $("#shipping_table").DataTable().ajax.reload();
                            Swal.fire({
                                position: "top-end",
                                type: "success",
                                title: "Shipping deleted successfully !",
                                showConfirmButton: !1,
                                timer: 1500,
                            });
                        },
                    });
                } else {
                    swal("Great ! Your data is safe !", {
                        icon: "success",
                    });
                }
            });
        });

        //
    });
})(jQuery);
