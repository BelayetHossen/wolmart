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
        // discount type change
        $(document).on("change", ".discount_type", function () {
            let type = $(this).val();
            if (type == 1) {
                $(".percentage").addClass("hide");
                $(".flat").removeClass("hide");
            } else if (type == 2) {
                $(".flat").addClass("hide");
                $(".percentage").removeClass("hide");
            } else if (type == 0) {
                $(".flat").addClass("hide");
                $(".percentage").addClass("hide");
            }
        });

        /*
        |--------------------------------------------------------------------------
        | Code validate function
        |--------------------------------------------------------------------------
        */
        function validatCode(code) {
            let cd = /^[a-zA-Z0-9]+$/i;
            return cd.test(code);
        }
        /*
        |--------------------------------------------------------------------------
        | All coupons show to table system
        |--------------------------------------------------------------------------
        */
        function allCoupons() {
            $.ajax({
                url: "/admin/coupon/all",
                success: function (data) {
                    $("#coupon_list").html(data);
                },
            });
        }
        allCoupons();
        /*
        |--------------------------------------------------------------------------
        | coupon create system
        |--------------------------------------------------------------------------
        */
        $(document).on("submit", "#coupon_add_form", function (e) {
            e.preventDefault();
            let title = $('#coupon_add_form input[name="title"]').val();
            let code = $('#coupon_add_form input[name="code"]').val();
            let dis_type = $('#coupon_add_form select[name="dis_type"]').val();
            let amount = $('#coupon_add_form input[name="amount"]').val();
            let percentage = $(
                '#coupon_add_form input[name="percentage"]'
            ).val();
            let start_date = $(
                '#coupon_add_form input[name="start_date"]'
            ).val();
            let end_date = $('#coupon_add_form input[name="end_date"]').val();
            if (title.trim() == "") {
                $(".title-msg").html(
                    fieldRequre("The title is requred !", "danger")
                );
            } else {
                $(".title-msg").html("");
                title_check = true;
            }

            if (code.trim() == "") {
                $(".code-msg").html(
                    fieldRequre("The code is requred !", "danger")
                );
            } else if (validatCode(code) == false) {
                $(".code-msg").html("");
                $(".code-check").html(
                    fieldRequre("Code must be without space !", "danger")
                );
            } else {
                $(".code-msg").html("");
                $(".code-check").html("");
                code_check = true;
            }
            if (dis_type == 0) {
                $(".dis-type-msg").html(
                    fieldRequre("Select discount type !", "danger")
                );
            } else {
                dis_type_check = true;
                $(".dis-type-msg").html("");
                if (dis_type == 1) {
                    if (amount == "") {
                        $(".amount-msg").html(
                            fieldRequre("The amount is requred !", "danger")
                        );
                    } else {
                        $(".amount-msg").html("");
                        discount = true;
                    }
                } else if (dis_type == 2) {
                    if (percentage == "") {
                        $(".percentage-msg").html(
                            fieldRequre("The percentage is requred !", "danger")
                        );
                    } else {
                        $(".percentage-msg").html("");
                        discount = true;
                    }
                }
            }
            if (start_date.trim() == "") {
                $(".start-date-msg").html(
                    fieldRequre("The start date is requred !", "danger")
                );
            } else {
                $(".start-date-msg").html("");
                start_date_check = true;
            }
            if (end_date.trim() == "") {
                $(".end-date-msg").html(
                    fieldRequre("The end date is requred !", "danger")
                );
            } else {
                $(".end-date-msg").html("");
                end_date_check = true;
            }
            if (
                title_check == true &&
                code_check == true &&
                dis_type_check == true &&
                discount == true &&
                discount == true &&
                start_date_check == true &&
                end_date_check == true
            ) {
                $.ajax({
                    url: "/admin/coupon/create",
                    method: "post",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.title == "exist") {
                            $(".title-check").html(
                                fieldRequre("The title is exist !", "danger")
                            );
                        } else if (response.code == "exist") {
                            $(".title-check").html("");
                            $(".code-check").html(
                                fieldRequre("The code is exist !", "danger")
                            );
                        } else {
                            $(".title-check").html("");
                            $(".code-check").html("");
                            $("#coupon_add_modal").modal("hide");
                            $("#coupon_add_form")[0].reset();
                            allCoupons();
                            Swal.fire({
                                position: "top-end",
                                type: "success",
                                title: "A new coupon added successfully !",
                                showConfirmButton: !1,
                                timer: 2000,
                            });
                        }
                    },
                });
            }
        });
        /*
        |--------------------------------------------------------------------------
        | coupon edit system
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".coupon_edit_btn", function (e) {
            e.preventDefault();
            let id = $(this).attr("coupon_edit_id");
            $.ajax({
                url: "/admin/coupon/edit/" + id,
                success: function (response) {
                    $('#coupon_edit_form input[name="title"]').val(
                        response.coupon.title
                    );
                    $('#coupon_edit_form input[name="id"]').val(
                        response.coupon.id
                    );
                    $('#coupon_edit_form input[name="code"]').val(
                        response.coupon.code
                    );
                    $(".discount_type").html(response.type);
                    if (response.show == 1) {
                        $(".percentage").addClass("hide");
                        $(".flat").removeClass("hide");
                    } else if (response.show == 2) {
                        $(".flat").addClass("hide");
                        $(".percentage").removeClass("hide");
                    }
                    $('#coupon_edit_form input[name="amount"]').val(
                        response.coupon.amount
                    );
                    $('#coupon_edit_form input[name="percentage"]').val(
                        response.coupon.percentage
                    );
                    $('#coupon_edit_form input[name="start_date"]').val(
                        response.coupon.start_date
                    );
                    $('#coupon_edit_form input[name="end_date"]').val(
                        response.coupon.end_date
                    );
                    $("#coupon_edit_modal").modal("show");
                },
            });
        });
        /*
        |--------------------------------------------------------------------------
        | coupon update system
        |--------------------------------------------------------------------------
        */
        $(document).on("submit", "#coupon_edit_form", function (e) {
            e.preventDefault();
            let title = $('#coupon_edit_form input[name="title"]').val();
            let code = $('#coupon_edit_form input[name="code"]').val();
            let dis_type = $('#coupon_edit_form select[name="dis_type"]').val();
            let amount = $('#coupon_edit_form input[name="amount"]').val();
            let percentage = $(
                '#coupon_edit_form input[name="percentage"]'
            ).val();
            let start_date = $(
                '#coupon_edit_form input[name="start_date"]'
            ).val();
            let end_date = $('#coupon_edit_form input[name="end_date"]').val();
            if (title.trim() == "") {
                $(".title-msg").html(
                    fieldRequre("The title is requred !", "danger")
                );
            } else {
                $(".title-msg").html("");
                title_check = true;
            }

            if (code.trim() == "") {
                $(".code-msg").html(
                    fieldRequre("The code is requred !", "danger")
                );
            } else if (validatCode(code) == false) {
                $(".code-msg").html("");
                $(".code-check").html(
                    fieldRequre("Code must be without space !", "danger")
                );
            } else {
                $(".code-msg").html("");
                $(".code-check").html("");
                code_check = true;
            }
            if (dis_type == 0) {
                $(".dis-type-msg").html(
                    fieldRequre("Select discount type !", "danger")
                );
            } else {
                dis_type_check = true;
                $(".dis-type-msg").html("");
                if (dis_type == 1) {
                    if (amount == "") {
                        $(".amount-msg").html(
                            fieldRequre("The amount is requred !", "danger")
                        );
                    } else {
                        $(".amount-msg").html("");
                        discount = true;
                    }
                } else if (dis_type == 2) {
                    if (percentage == "") {
                        $(".percentage-msg").html(
                            fieldRequre("The percentage is requred !", "danger")
                        );
                    } else {
                        $(".percentage-msg").html("");
                        discount = true;
                    }
                }
            }
            if (start_date.trim() == "") {
                $(".start-date-msg").html(
                    fieldRequre("The start date is requred !", "danger")
                );
            } else {
                $(".start-date-msg").html("");
                start_date_check = true;
            }
            if (end_date.trim() == "") {
                $(".end-date-msg").html(
                    fieldRequre("The end date is requred !", "danger")
                );
            } else {
                $(".end-date-msg").html("");
                end_date_check = true;
            }
            if (
                title_check == true &&
                code_check == true &&
                dis_type_check == true &&
                discount == true &&
                discount == true &&
                start_date_check == true &&
                end_date_check == true
            ) {
                $.ajax({
                    url: "/admin/coupon/update",
                    method: "post",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.title == "exist") {
                            $(".title-check").html(
                                fieldRequre("The title is exist !", "danger")
                            );
                        } else if (response.code == "exist") {
                            $(".title-check").html("");
                            $(".code-check").html(
                                fieldRequre("The code is exist !", "danger")
                            );
                        } else {
                            $(".title-check").html("");
                            $(".code-check").html("");
                            $("#coupon_edit_modal").modal("hide");
                            allCoupons();
                            Swal.fire({
                                position: "top-end",
                                type: "success",
                                title: "Coupon updated successfully !",
                                showConfirmButton: !1,
                                timer: 2000,
                            });
                        }
                    },
                });
            }
        });
        /*
        |--------------------------------------------------------------------------
        | coupon status change system
        |--------------------------------------------------------------------------
        */
        $(document).on("change", "#coupon_status_btn", function () {
            let id = $(this).val();
            $.ajax({
                url: "/admin/coupon/status/" + id,
                success: function (response) {
                    if (response.status == true) {
                        Swal.fire({
                            position: "top-end",
                            type: "success",
                            title: "Coupon status active successfully !",
                            showConfirmButton: !1,
                            timer: 2000,
                        });
                    } else {
                        Swal.fire({
                            position: "top-end",
                            type: "success",
                            title: "Coupon status inactive successfully !",
                            showConfirmButton: !1,
                            timer: 2000,
                        });
                    }
                    allCoupons();
                },
            });
        });

        /*
        |--------------------------------------------------------------------------
        | coupon delete system
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".coupon_delete_btn", function (e) {
            e.preventDefault();
            let id = $(this).attr("coupon_delete_id");

            swal({
                title: "Are you sure ?",
                text: "Coupon delete, you will not be able to recover this role!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "/admin/coupon/delete/" + id,
                        success: function (data) {
                            allCoupons();
                        },
                    });
                    swal("Great ! The tag has been permanently deleted !", {
                        icon: "success",
                    });
                } else {
                    swal("Great ! Your tag data is safe !", {
                        icon: "success",
                    });
                }
            });
        });

        //
    });
})(jQuery);
