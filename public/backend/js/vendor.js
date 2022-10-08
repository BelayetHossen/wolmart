(function ($) {
    $(document).ready(function () {
        /*
        |--------------------------------------------------------------------------
        | 1. requred function
        |--------------------------------------------------------------------------
        */
        function fieldRequre(msg, type, margin = "-15px") {
            return `<p class="text-${type}" style="margin-top: ${margin};">${msg}</p>`;
        }

        /*
        |--------------------------------------------------------------------------
        | 2. Email validate function
        |--------------------------------------------------------------------------
        */
        function validateEmail(email) {
            let re =
                /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            return re.test(email);
        }

        /*
        |--------------------------------------------------------------------------
        | 3.phone validate function
        |--------------------------------------------------------------------------
        */
        function validatePhone(phone) {
            let ph = /(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/i;
            return ph.test(phone);
        }




        // all vendor table to data table
        $("#admin_vendor_table").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/admin/vendor/all",
            },
            columns: [
                {
                    data: "sl",
                    name: "sl",
                },
                {
                    data: "name",
                    name: "name",
                },
                {
                    data: "phone",
                    name: "phone",
                },
                {
                    data: "email",
                    name: "email",
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


        // trashed vendors table to data table
        $("#trashed_vendor_table").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/admin/trashrd/vendor/all",
            },
            columns: [
                {
                    data: "sl",
                    name: "sl",
                },
                {
                    data: "name",
                    name: "name",
                },
                {
                    data: "phone",
                    name: "phone",
                },
                {
                    data: "email",
                    name: "email",
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
        | vendor add system
        |--------------------------------------------------------------------------
        */
        $(document).on('submit', '#vendor_add_form', function (e) {
            e.preventDefault();
            let fname = $('#vendor_add_form input[name="first_name"]').val();
            let lname = $('#vendor_add_form input[name="last_name"]').val();
            let username = $('#vendor_add_form input[name="username"]').val();
            let phone = $('#vendor_add_form input[name="phone"]').val();
            let email = $('#vendor_add_form input[name="email"]').val();
            let store_name = $('#vendor_add_form input[name="store_name"]').val();
            let region = $('#vendor_add_form select[name="region"]').val();
            let zilla = $('#vendor_add_form input[name="zilla"]').val();
            let thana = $('#vendor_add_form input[name="thana"]').val();
            let post = $('#vendor_add_form input[name="post"]').val();
            let post_code = $('#vendor_add_form input[name="post_code"]').val();
            let password = $('#vendor_add_form input[name="password"]').val();

            if (fname.trim() == "") {
                $(".fname-msg").html(fieldRequre("The first name field is requred !", "danger", "5px"));
            } else {
                $(".fname-msg").html("");
            }
            if (lname.trim() == "") {
                $(".lname-msg").html(fieldRequre("The first name field is requred !", "danger", "5px"));
            } else {
                $(".lname-msg").html("");
            }
            if (username.trim() == "") {
                $(".username-msg").html(fieldRequre("The username field is requred !", "danger", "5px"));
            } else {
                $(".username-msg").html("");
            }
            if (phone.trim() == "") {
                $(".phone-msg").html(fieldRequre("The phone field is requred !", "danger", "5px"));
            } else if (!validatePhone(phone)) {
                $(".phone-msg").html("");
                $(".phone-check-msg").html(fieldRequre("The phone is invallid !", "danger", "5px"));
            } else {
                $(".phone-check-msg").html("");
            }

            if (email.trim() == "") {
                $(".email-msg").html(fieldRequre("The email field is requred !", "danger", "5px"));
            } else if (validateEmail(email) == false) {
                $(".email-msg").html("");
                $(".email-check-msg").html(fieldRequre("The email format is wrong !", "danger", "5px"));
            } else {
                $(".email-check-msg").html("");
            }

            if (store_name.trim() == "") {
                $(".store-name-msg").html(fieldRequre("The store name field is requred !", "danger", "5px"));
            } else {
                $(".store-name-msg").html("");
            }

            if (region.trim() == '') {
                $(".region-msg").html(fieldRequre("The region is requred !", "danger", "5px"));
            } else {
                $(".region-msg").html("");
            }

            if (zilla.trim() == '') {
                $(".zilla-msg").html(fieldRequre("The zilla is requred !", "danger", "5px"));
            } else {
                $(".zilla-msg").html("");
            }

            if (thana.trim() == '') {
                $(".thana-msg").html(fieldRequre("The thana is requred !", "danger", "5px"));
            } else {
                $(".thana-msg").html("");
            }

            if (post.trim() == '') {
                $(".post-msg").html(fieldRequre("The post is requred !", "danger", "5px"));
            } else {
                $(".post-msg").html("");
            }

            if (post_code.trim() == '') {
                $(".post-code-msg").html(fieldRequre("The post code is requred !", "danger", "5px"));
            } else {
                $(".post-code-msg").html("");
            }

            if (password.trim() == '') {
                $(".password-msg").html(fieldRequre("The password is requred !", "danger", "5px"));
            } else {
                $(".password-msg").html("");
            }

            if (fname.trim() == "" || lname.trim() == "" || username.trim() == "" || phone.trim() == "" || email.trim() == "" || store_name.trim() == "" || region.trim() == '' || zilla.trim() == '' || thana.trim() == '' || post.trim() == '' || post_code.trim() == '' || password.trim() == '') {

            } else {
                $.ajax({
                    url: "/admin/vendor/add",
                    method: "post",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.phone_check == "phone_exist") {
                            $(".phone-check").html(
                                fieldRequre(
                                    "The number is already exist !",
                                    "danger",
                                    "0"
                                )
                            );
                        } else {
                            $(".phone-check").html("");
                        }
                        if (data.email_check == "email_exist") {
                            $(".email-check").html(
                                fieldRequre(
                                    "The email is already exist !",
                                    "danger",
                                    "0"
                                )
                            );
                        } else {
                            $(".email-check").html("");
                        }
                        if (data.username_check == "username_exist") {
                            $(".username-check").html(
                                fieldRequre(
                                    "The username is already exist !",
                                    "danger",
                                    "0"
                                )
                            );
                        } else {
                            $(".username-check").html("");
                        }
                        if (data.f == false) {
                            $("#vendor_add_form")[0].reset();
                            $("#vendor_add_modal").modal("hide");
                            $("#admin_vendor_table").DataTable().ajax.reload();
                            Swal.fire({
                                position: "top-end",
                                type: "success",
                                title: "A New vendor has been added successfully !",
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
         | vendor status update
         |--------------------------------------------------------------------------
         */
        $(document).on("change", "#vendor_status_btn", function (e) {
            e.preventDefault();
            $.ajax({
                url: "/admin/vendor/status/" + this.value,
                success: function (data) {
                    $("#admin_vendor_table").DataTable().ajax.reload();
                    function successAlert() {
                        Swal.fire({
                            position: "top-end",
                            type: "success",
                            title: "Agent Status Updated successfully !",
                            showConfirmButton: !1,
                            timer: 1000,
                        });
                    }
                    successAlert();
                },
            });
        });

        /*
        |--------------------------------------------------------------------------
        | vendor edit
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".vendor_edit_btn", function (e) {
            e.preventDefault();
            let id = $(this).attr("vendor_edit_id");
            $.ajax({
                url: "/admin/vendor/edit/" + id,
                success: function (data) {

                    $('#vendor_edit_form input[name="id"]').val(data.vendor.id);
                    $('#vendor_edit_form input[name="first_name"]').val(data.vendor.f_name);
                    $('#vendor_edit_form input[name="last_name"]').val(data.vendor.l_name);
                    $('#vendor_edit_form input[name="username"]').val(data.vendor.username);
                    $('#vendor_edit_form input[name="phone"]').val(data.vendor.phone);
                    $('#vendor_edit_form input[name="email"]').val(data.vendor.email);
                    $('#vendor_edit_form input[name="store_name"]').val(data.vendor.store_name);
                    $('#vendor_edit_form input[name="shop_addr"]').val(data.vendor.shop_addr);
                    $('#vendor_edit_form input[name="zilla"]').val(data.vendor.zilla);
                    $('#vendor_edit_form input[name="thana"]').val(data.vendor.thana);
                    $('#vendor_edit_form input[name="post"]').val(data.vendor.post);
                    $('#vendor_edit_form input[name="post_code"]').val(data.vendor.post_code);
                    $('#vendor_edit_form input[name="bank"]').val(data.vendor.bank);

                    $(".region_list").html(data.region_list);

                    $("#vendor_edit_modal").modal("show");
                },
            });
        });

        /*
        |--------------------------------------------------------------------------
        | vendor update system
        |--------------------------------------------------------------------------
        */
        $(document).on('submit', '#vendor_edit_form', function (e) {
            e.preventDefault();
            let fname = $('#vendor_edit_form input[name="first_name"]').val();
            let lname = $('#vendor_edit_form input[name="last_name"]').val();
            let username = $('#vendor_edit_form input[name="username"]').val();
            let phone = $('#vendor_edit_form input[name="phone"]').val();
            let email = $('#vendor_edit_form input[name="email"]').val();
            let store_name = $('#vendor_edit_form input[name="store_name"]').val();
            let region = $('#vendor_edit_form select[name="region"]').val();
            let zilla = $('#vendor_edit_form input[name="zilla"]').val();
            let thana = $('#vendor_edit_form input[name="thana"]').val();
            let post = $('#vendor_edit_form input[name="post"]').val();
            let post_code = $('#vendor_edit_form input[name="post_code"]').val();
            let password = $('#vendor_edit_form input[name="password"]').val();

            if (fname.trim() == "") {
                $(".fname-msg").html(fieldRequre("The first name field is requred !", "danger", "5px"));
            } else {
                $(".fname-msg").html("");
            }
            if (lname.trim() == "") {
                $(".lname-msg").html(fieldRequre("The first name field is requred !", "danger", "5px"));
            } else {
                $(".lname-msg").html("");
            }
            if (username.trim() == "") {
                $(".username-msg").html(fieldRequre("The username field is requred !", "danger", "5px"));
            } else {
                $(".username-msg").html("");
            }
            if (phone.trim() == "") {
                $(".phone-msg").html(fieldRequre("The phone field is requred !", "danger", "5px"));
            } else if (!validatePhone(phone)) {
                $(".phone-msg").html("");
                $(".phone-check-msg").html(fieldRequre("The phone is invallid !", "danger", "5px"));
            } else {
                $(".phone-check-msg").html("");
            }

            if (email.trim() == "") {
                $(".email-msg").html(fieldRequre("The email field is requred !", "danger", "5px"));
            } else if (validateEmail(email) == false) {
                $(".email-msg").html("");
                $(".email-check-msg").html(fieldRequre("The email format is wrong !", "danger", "5px"));
            } else {
                $(".email-check-msg").html("");
            }

            if (store_name.trim() == "") {
                $(".store-name-msg").html(fieldRequre("The store name field is requred !", "danger", "5px"));
            } else {
                $(".store-name-msg").html("");
            }

            if (region.trim() == '') {
                $(".region-msg").html(fieldRequre("The region is requred !", "danger", "5px"));
            } else {
                $(".region-msg").html("");
            }

            if (zilla.trim() == '') {
                $(".zilla-msg").html(fieldRequre("The zilla is requred !", "danger", "5px"));
            } else {
                $(".zilla-msg").html("");
            }

            if (thana.trim() == '') {
                $(".thana-msg").html(fieldRequre("The thana is requred !", "danger", "5px"));
            } else {
                $(".thana-msg").html("");
            }

            if (post.trim() == '') {
                $(".post-msg").html(fieldRequre("The post is requred !", "danger", "5px"));
            } else {
                $(".post-msg").html("");
            }

            if (post_code.trim() == '') {
                $(".post-code-msg").html(fieldRequre("The post code is requred !", "danger", "5px"));
            } else {
                $(".post-code-msg").html("");
            }

            if (password == '') {
                $(".password-msg").html(fieldRequre("The password is requred !", "danger", "5px"));
            } else {
                $(".password-msg").html("");
            }

            if (fname.trim() == "" || lname.trim() == "" || username.trim() == "" || phone.trim() == "" || email.trim() == "" || store_name.trim() == "" || region.trim() == '' || zilla.trim() == '' || thana.trim() == '' || post.trim() == '' || post_code.trim() == '' || password == '') {

            } else {
                $.ajax({
                    url: "/admin/vendor/update",
                    method: "post",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.phone_check == "phone_exist") {
                            $(".phone-check").html(
                                fieldRequre(
                                    "The number is already exist !",
                                    "danger",
                                    "0"
                                )
                            );
                        } else {
                            $(".phone-check").html("");
                        }
                        if (data.email_check == "email_exist") {
                            $(".email-check").html(
                                fieldRequre(
                                    "The email is already exist !",
                                    "danger",
                                    "0"
                                )
                            );
                        } else {
                            $(".email-check").html("");
                        }
                        if (data.username_check == "username_exist") {
                            $(".username-check").html(
                                fieldRequre(
                                    "The username is already exist !",
                                    "danger",
                                    "0"
                                )
                            );
                        } else {
                            $(".username-check").html("");
                        }
                        if (data.f == false) {
                            $("#vendor_edit_modal").modal("hide");
                            $("#admin_vendor_table").DataTable().ajax.reload();
                            Swal.fire({
                                position: "top-end",
                                type: "success",
                                title: "vendor has been updated successfully !",
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
        | vendor trash restore system
        |--------------------------------------------------------------------------
        */
        $(document).on('click', '.vendor_trash_btn', function (e) {
            e.preventDefault();
            let id = $(this).attr('vendor_trash_id');
            $.ajax({
                url: '/admin/vendor/trash/restore/' + id,
                success: function (response) {
                    if (response == 'trash') {
                        Swal.fire({
                            position: "top-end",
                            type: "success",
                            title: "Vendor move to trash successfully !",
                            showConfirmButton: !1,
                            timer: 1000,
                        });
                    } else {
                        Swal.fire({
                            position: "top-end",
                            type: "success",
                            title: "Vendor restore from trash successfully !",
                            showConfirmButton: !1,
                            timer: 1000,
                        });
                    }
                    $("#admin_vendor_table").DataTable().ajax.reload();
                    $("#trashed_vendor_table").DataTable().ajax.reload();
                }
            });
        })
        /*
        |--------------------------------------------------------------------------
        | vendor delete system
        |--------------------------------------------------------------------------
        */
        $(document).on('click', '.vendor_delete_btn', function (e) {
            e.preventDefault();
            let id = $(this).attr('vendor_delete_id');
            swal({
                title: "Are you sure?",
                text: "Vendor delete, all products under this vendor will be delete!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '/admin/vendor/delete/' + id,
                        success: function (response) {
                            Swal.fire({
                                position: "top-end",
                                type: "success",
                                title: "Vendor has been deleted successfully !",
                                showConfirmButton: !1,
                                timer: 1000,
                            });
                            $("#trashed_vendor_table").DataTable().ajax.reload();
                        }
                    });
                } else {
                    swal("Great ! Your vendor data is safe !", {
                        icon: "success",
                    });
                }
            });

        })




        //
    });
})(jQuery);
