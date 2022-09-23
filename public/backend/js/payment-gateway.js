



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
        | type select in currency add form
        |--------------------------------------------------------------------------
        */
       $(document).on('change', '.payment_type', function(){
            let type = $(this).val();
            if (type == 'autometic') {
                $('.type-option').removeClass('hide');
                $('.type-option').addClass('show');
            } else {
                $('.type-option').removeClass('show');
                $('.type-option').addClass('hide')
            }
       })

       /*
        |--------------------------------------------------------------------------
        | currency table to data table
        |--------------------------------------------------------------------------
        */
        $('#admin_payment_table').dataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/admin/payment/all",
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
                    name: "title",
                    data: "title",
                },
                {
                    name: "sub_title",
                    data: "sub_title",
                },
                {
                    name: "action",
                    data: "action",
                },
            ],

       });
        /*
        |--------------------------------------------------------------------------
        | pament gateway add
        |--------------------------------------------------------------------------
        */
        $(document).on('submit', '#payment_add_form', function(e){
            e.preventDefault();
            let name = $('#payment_add_form input[name="name"]').val();
            let title = $('#payment_add_form input[name="title"]').val();
            let sub_title = $('#payment_add_form input[name="sub_title"]').val();
            let details = $('#payment_add_form textarea[name="details"]').val();
            let type = $('#payment_add_form select[name="type"]').val();
            let client_id = $('#payment_add_form input[name="client_id"]').val();
            let client_secret = $('#payment_add_form input[name="client_secret"]').val();
            let currency = $('#payment_add_form input[name="currency"]').val();
            if (type == 'autometic') {
                if (client_id.trim() == "") {
                    $(".client-id-msg").html(
                        fieldRequre("The Client id is requred !", "danger")
                    );
                } else {
                    $(".client-id-msg").html("");
                }
                if (client_secret.trim() == "") {
                    $(".client-secret-msg").html(
                        fieldRequre("The Client secret is requred !", "danger")
                    );
                } else {
                    $(".client-secret-msg").html("");
                }
            }
            if (name.trim() == "") {
                $(".name-msg").html(
                    fieldRequre("The name is requred !", "danger")
                );
            } else {
                $(".name-msg").html("");
            }
            if (title.trim() == "") {
                $(".title-msg").html(
                    fieldRequre("The title is requred !", "danger")
                );
            } else {
                $(".title-msg").html("");
            }
            if (sub_title.trim() == "") {
                $(".sub-title-msg").html(
                    fieldRequre("The sub title is requred !", "danger")
                );
            } else {
                $(".sub-title-msg").html("");
            }
            if (details.trim() == "") {
                $(".details-msg").html(
                    fieldRequre("The details is requred !", "danger")
                );
            } else {
                $(".details-msg").html("");
            }
            if (type== "") {
                $(".type-msg").html(
                    fieldRequre("The type is requred !", "danger")
                );
            } else {
                $(".type-msg").html("");
            }
            if (currency == "") {
                $(".currency-msg").html(
                    fieldRequre("The currency is requred !", "danger")
                );
            } else {
                $(".currency-msg").html("");
            }
            if (name != '') {
                $.ajax({
                    url: "/admin/payment/add",
                    method: "post",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.title == "exist") {
                            $(".title-check").html(
                                fieldRequre("The title is exist !", "danger")
                            );
                        } else {

                            $(".title-check").html("");
                            $('#admin_payment_table')
                            .DataTable()
                            .ajax.reload();
                            $("#payment_add_modal").modal("hide");
                            $("#payment_add_form")[0].reset();
                            Swal.fire({
                                position: "top-end",
                                type: "success",
                                title: "A new payment gateway added successfully !",
                                showConfirmButton: !1,
                                timer: 1000,
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
        $(document).on("click", ".payment_edit_btn", function (e) {
            e.preventDefault();
            let id = $(this).attr("payment_edit_id");
            $.ajax({
                url: "/admin/payment/edit/" + id,
                success: function (response) {
                    // console.log(response);
                    $('#payment_edit_form input[name="id"]').val(
                        response.data.id
                    );
                    $('#payment_edit_form input[name="title"]').val(
                        response.data.title
                    );
                    $('#payment_edit_form input[name="name"]').val(
                        response.data.name
                    );
                    $('#payment_edit_form input[name="sub_title"]').val(
                        response.data.sub_title
                    );
                    $('#payment_edit_form textarea[name="details"]').val(
                        response.data.details
                    );
                    $('.payment_type').html(
                        response.type_cont
                    );
                    if (response.data.type == 'autometic') {
                        $('.type-option').removeClass('hide');
                        $('.type-option').addClass('show');
                        $('#payment_edit_form input[name="client_id"]').val(
                            JSON.parse(response.data.information).client_id
                        );
                        $('#payment_edit_form input[name="client_secret"]').val(
                            JSON.parse(response.data.information).client_secret
                        );
                    } else {
                        $('.type-option').removeClass('show');
                        $('.type-option').addClass('hide');
                        $('#payment_edit_form input[name="client_id"]').val('');
                        $('#payment_edit_form input[name="client_secret"]').val('');
                    }
                    $('.default_check').html(
                        response.default_check
                    );
                    $('.currency_cont').html(
                        response.currency_cont
                    );
                    $("#payment_edit_modal").modal("show");
                },
            });
        });
        /*
        |--------------------------------------------------------------------------
        | pament gateway update
        |--------------------------------------------------------------------------
        */
        $(document).on('submit', '#payment_edit_form', function(e){
            e.preventDefault();
            let name = $('#payment_edit_form input[name="name"]').val();
            let title = $('#payment_edit_form input[name="title"]').val();
            let sub_title = $('#payment_edit_form input[name="sub_title"]').val();
            let details = $('#payment_edit_form textarea[name="details"]').val();
            let type = $('#payment_edit_form select[name="type"]').val();
            let client_id = $('#payment_edit_form input[name="client_id"]').val();
            let client_secret = $('#payment_edit_form input[name="client_secret"]').val();
            let currency = $('#payment_edit_form input[name="currency"]').val();
            if (type == 'autometic') {
                if (client_id.trim() == "") {
                    $(".client-id-msg").html(
                        fieldRequre("The Client id is requred !", "danger")
                    );
                } else {
                    $(".client-id-msg").html("");
                }
                if (client_secret.trim() == "") {
                    $(".client-secret-msg").html(
                        fieldRequre("The Client secret is requred !", "danger")
                    );
                } else {
                    $(".client-secret-msg").html("");
                }
            }
            if (name.trim() == "") {
                $(".name-msg").html(
                    fieldRequre("The name is requred !", "danger")
                );
            } else {
                $(".name-msg").html("");
            }
            if (title.trim() == "") {
                $(".title-msg").html(
                    fieldRequre("The title is requred !", "danger")
                );
            } else {
                $(".title-msg").html("");
            }
            if (sub_title.trim() == "") {
                $(".sub-title-msg").html(
                    fieldRequre("The sub title is requred !", "danger")
                );
            } else {
                $(".sub-title-msg").html("");
            }
            if (details.trim() == "") {
                $(".details-msg").html(
                    fieldRequre("The details is requred !", "danger")
                );
            } else {
                $(".details-msg").html("");
            }
            if (type== "") {
                $(".type-msg").html(
                    fieldRequre("The type is requred !", "danger")
                );
            } else {
                $(".type-msg").html("");
            }
            if (currency == "") {
                $(".currency-msg").html(
                    fieldRequre("The currency is requred !", "danger")
                );
            } else {
                $(".currency-msg").html("");
            }
            if (name != '') {
                $.ajax({
                    url: "/admin/payment/update",
                    method: "post",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.title == "exist") {
                            $(".title-check").html(
                                fieldRequre("The title is exist !", "danger")
                            );
                        } else {
                            $("#payment_edit_modal").modal("hide");
                            $(".title-check").html("");
                            $('#admin_payment_table')
                            .DataTable()
                            .ajax.reload();
                            Swal.fire({
                                position: "top-end",
                                type: "success",
                                title: "Payment gateway updated successfully !",
                                showConfirmButton: !1,
                                timer: 1000,
                            });
                        }
                    },
                });
            }
        })
        /*
        |--------------------------------------------------------------------------
        | payment delete system
        |--------------------------------------------------------------------------
        */
       $(document).on('click', '.payment_delete_btn', function(e){
        e.preventDefault();
            let id = $(this).attr('payment_delete_id');

            swal({
                title: "Are you sure ?",
                text: "Payment gateway delete, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "/admin/payment/delete/" +id,
                        success: function (response) {
                            $('#admin_payment_table')
                            .DataTable()
                            .ajax.reload();
                            Swal.fire({
                                position: "top-end",
                                type: "success",
                                title: "Payment gateway has been deleted successfully !",
                                showConfirmButton: !1,
                                timer: 1000,
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
