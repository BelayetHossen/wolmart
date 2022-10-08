



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
        | currency table to data table
        |--------------------------------------------------------------------------
        */
        $('#admin_currency_table').dataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/admin/currency/all",
            },
            columns: [
                {
                    name: "sl",
                    data: "id",
                },
                {
                    name: "name",
                    data: "name",
                },
                {
                    name: "symbol",
                    data: "symbol",
                },
                {
                    name: "value",
                    data: "value",
                },
                {
                    name: "action",
                    data: "action",
                },
            ],

        });

        /*
        |--------------------------------------------------------------------------
        | currency add
        |--------------------------------------------------------------------------
        */
        $(document).on('submit', '#currency_add_form', function (e) {
            e.preventDefault();
            let name = $('#currency_add_form input[name="name"]').val();
            let symbol = $('#currency_add_form input[name="symbol"]').val();
            let value = $('#currency_add_form input[name="value"]').val();
            if (name.trim() == "") {
                $(".name-msg").html(
                    fieldRequre("The name is requred !", "danger")
                );
            } else {
                $(".name-msg").html("");
            }
            if (symbol.trim() == "") {
                $(".symbol-msg").html(
                    fieldRequre("The symbol is requred !", "danger")
                );
            } else {
                $(".symbol-msg").html("");
            }
            if (value.trim() == "") {
                $(".value-msg").html(
                    fieldRequre("The value is requred !", "danger")
                );
            } else {
                $(".value-msg").html("");
            }
            if (name != '' && symbol != '' && value != '') {
                $.ajax({
                    url: "/admin/currency/add",
                    method: "post",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.name == "exist") {
                            $(".name-check").html(
                                fieldRequre("The name is exist !", "danger")
                            );
                        } else {
                            $(".name-check").html("");
                            $('#admin_currency_table')
                                .DataTable()
                                .ajax.reload();
                            $("#currency_add_modal").modal("hide");
                            $("#currency_add_form")[0].reset();
                            Swal.fire({
                                position: "top-end",
                                type: "success",
                                title: "A new currency added successfully !",
                                showConfirmButton: !1,
                                timer: 2000,
                            });
                        }
                    },
                });
            }
        })

        /*
        |--------------------------------------------------------------------------
        | currency edit system
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".currency_edit_btn", function (e) {
            e.preventDefault();
            let id = $(this).attr("currency_edit_id");
            $.ajax({
                url: "/admin/currency/edit/" + id,
                success: function (response) {
                    $('#currency_edit_form input[name="id"]').val(
                        response.id
                    );
                    $('#currency_edit_form input[name="name"]').val(
                        response.name
                    );
                    $('#currency_edit_form input[name="symbol"]').val(
                        response.symbol
                    );
                    $('#currency_edit_form input[name="value"]').val(
                        response.value
                    );
                    $("#currency_edit_modal").modal("show");
                },
            });
        });
        /*
        |--------------------------------------------------------------------------
        | currency update system
        |--------------------------------------------------------------------------
        */
        $(document).on('submit', '#currency_edit_form', function (e) {
            e.preventDefault();
            let name = $('#currency_edit_form input[name="name"]').val();
            let symbol = $('#currency_edit_form input[name="symbol"]').val();
            let value = $('#currency_edit_form input[name="value"]').val();
            if (name.trim() == "") {
                $(".name-msg").html(
                    fieldRequre("The name is requred !", "danger")
                );
            } else {
                $(".name-msg").html("");
            }
            if (symbol.trim() == "") {
                $(".symbol-msg").html(
                    fieldRequre("The symbol is requred !", "danger")
                );
            } else {
                $(".symbol-msg").html("");
            }
            if (value.trim() == "") {
                $(".value-msg").html(
                    fieldRequre("The value is requred !", "danger")
                );
            } else {
                $(".value-msg").html("");
            }
            if (name != '' && symbol != '' && value != '') {
                $.ajax({
                    url: "/admin/currency/update",
                    method: "post",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.name == "exist") {
                            $(".name-check").html(
                                fieldRequre("The name is exist !", "danger")
                            );
                        } else {
                            $(".name-check").html("");
                            $('#admin_currency_table')
                                .DataTable()
                                .ajax.reload();
                            $("#currency_edit_modal").modal("hide");
                            Swal.fire({
                                position: "top-end",
                                type: "success",
                                title: "Currency updated successfully !",
                                showConfirmButton: !1,
                                timer: 2000,
                            });
                        }
                    },
                });
            }

        })
        /*
        |--------------------------------------------------------------------------
        | currency delete system
        |--------------------------------------------------------------------------
        */
        $(document).on('click', '.currency_delete_btn', function (e) {
            e.preventDefault();
            let id = $(this).attr('currency_delete_id');
            swal({
                title: "Are you sure ?",
                text: "Currency delete, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "/admin/currency/delete/" + id,
                        success: function (response) {
                            $('#admin_currency_table')
                                .DataTable()
                                .ajax.reload();
                            $("#currency_edit_modal").modal("hide");
                            Swal.fire({
                                position: "top-end",
                                type: "success",
                                title: "Currency deleted successfully !",
                                showConfirmButton: !1,
                                timer: 2000,
                            });
                        },
                    });

                } else {
                    swal("Great ! Your currency data is safe !", {
                        icon: "success",
                    });
                }
            });



        })


        //
    });
})(jQuery);
