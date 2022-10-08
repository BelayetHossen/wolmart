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




        // all customers table to data table
        $("#all_customer_table").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/admin/customer/all",
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


        // trashed customers table to data table
        $("#trashed_customer_table").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/admin/trashrd/customer/all",
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
        | Customer add system
        |--------------------------------------------------------------------------
        */
        $(document).on('submit', '#cusomer_add_form', function (e) {
            e.preventDefault();
            let fname = $('#cusomer_add_form input[name="first_name"]').val();
            let lname = $('#cusomer_add_form input[name="last_name"]').val();
            let username = $('#cusomer_add_form input[name="username"]').val();
            let phone = $('#cusomer_add_form input[name="phone"]').val();
            let email = $('#cusomer_add_form input[name="email"]').val();
            let region = $('#cusomer_add_form select[name="region"]').val();
            let password = $('#cusomer_add_form input[name="password"]').val();

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
                $(".phone-check-msg").html(fieldRequre("The phone field is requred !", "danger", "5px"));
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

            if (region.trim() == '') {
                $(".region-msg").html(fieldRequre("The region is requred !", "danger", "5px"));
            } else {
                $(".region-msg").html("");
            }
            if (password.trim() == '') {
                $(".password-msg").html(fieldRequre("The password is requred !", "danger", "5px"));
            } else {
                $(".password-msg").html("");
            }

            if (fname.trim() == "" || lname.trim() == "" || username.trim() == "" || phone.trim() == "" || email.trim() == "" || region.trim() == '' || password.trim() == '') {

            } else {
                $.ajax({
                    url: "/admin/customer/add",
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
                            $("#cusomer_add_form")[0].reset();
                            $("#customer_add_modal").modal("hide");
                            $("#all_customer_table").DataTable().ajax.reload();
                            Swal.fire({
                                position: "top-end",
                                type: "success",
                                title: "A New customer has been added successfully !",
                                showConfirmButton: !1,
                                timer: 3000,
                            });
                        }
                    },
                });
            }

        })


        /*
         |--------------------------------------------------------------------------
         | Customer status update
         |--------------------------------------------------------------------------
         */
        $(document).on("change", "#customer_status_btn", function (e) {
            e.preventDefault();
            $.ajax({
                url: "/admin/customer/status/" + this.value,
                success: function (data) {
                    $("#all_customer_table").DataTable().ajax.reload();
                    function successAlert() {
                        Swal.fire({
                            position: "top-end",
                            type: "success",
                            title: "One User Status Updated successfully !",
                            showConfirmButton: !1,
                            timer: 2500,
                        });
                    }
                    successAlert();
                },
            });
        });

        /*
        |--------------------------------------------------------------------------
        | customer edit
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".customer_edit_btn", function (e) {
            e.preventDefault();
            let id = $(this).attr("customer_edit_id");
            $.ajax({
                url: "/admin/customer/edit/" + id,
                success: function (data) {

                    $('#customer_edit_form input[name="id"]').val(data.customer.id);
                    $('#customer_edit_form input[name="first_name"]').val(data.customer.f_name);
                    $('#customer_edit_form input[name="last_name"]').val(data.customer.l_name);
                    $('#customer_edit_form input[name="username"]').val(data.customer.username);
                    $('#customer_edit_form input[name="phone"]').val(data.customer.phone);
                    $('#customer_edit_form input[name="email"]').val(data.customer.email);

                    $(".region_list").html(data.region_list);

                    $("#customer_edit_modal").modal("show");
                },
            });
        });

        /*
        |--------------------------------------------------------------------------
        | Customer edit system
        |--------------------------------------------------------------------------
        */
        $(document).on('submit', '#customer_edit_form', function (e) {
            e.preventDefault();
            let fname = $('#customer_edit_form input[name="first_name"]').val();
            let lname = $('#customer_edit_form input[name="last_name"]').val();
            let username = $('#customer_edit_form input[name="username"]').val();
            let phone = $('#customer_edit_form input[name="phone"]').val();
            let email = $('#customer_edit_form input[name="email"]').val();
            let region = $('#customer_edit_form select[name="region"]').val();
            let password = $('#customer_edit_form input[name="password"]').val();

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
                $(".phone-check-msg").html(fieldRequre("The phone field is requred !", "danger", "5px"));
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

            if (region.trim() == '') {
                $(".region-msg").html(fieldRequre("The region is requred !", "danger", "5px"));
            } else {
                $(".region-msg").html("");
            }
            if (password == '') {
                $(".password-msg").html(fieldRequre("The password is requred !", "danger", "5px"));
            } else {
                $(".password-msg").html("");
            }

            if (fname.trim() == "" || lname.trim() == "" || username.trim() == "" || phone.trim() == "" || email.trim() == "" || region.trim() == '' || password == '') {

            } else {
                $.ajax({
                    url: "/admin/customer/update",
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
                            $("#customer_edit_modal").modal("hide");
                            $("#all_customer_table").DataTable().ajax.reload();
                            Swal.fire({
                                position: "top-end",
                                type: "success",
                                title: "Customer has been updated successfully !",
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
        | customer trash restore system
        |--------------------------------------------------------------------------
        */
        $(document).on('click', '.customer_trash_btn', function (e) {
            e.preventDefault();
            let id = $(this).attr('customer_trash_id');
            $.ajax({
                url: '/admin/customer/trash/restore/' + id,
                success: function (response) {
                    if (response == 'trash') {
                        Swal.fire({
                            position: "top-end",
                            type: "success",
                            title: "Customer move to trash successfully !",
                            showConfirmButton: !1,
                            timer: 1000,
                        });
                    } else {
                        Swal.fire({
                            position: "top-end",
                            type: "success",
                            title: "Customer restore from trash successfully !",
                            showConfirmButton: !1,
                            timer: 1000,
                        });
                    }
                    $("#all_customer_table").DataTable().ajax.reload();
                    $("#trashed_customer_table").DataTable().ajax.reload();
                }
            });
        })
        /*
        |--------------------------------------------------------------------------
        | customer delete system
        |--------------------------------------------------------------------------
        */
        $(document).on('click', '.customer_delete_btn', function (e) {
            e.preventDefault();
            let id = $(this).attr('customer_delete_id');
            swal({
                title: "Are you sure?",
                text: "Customer delete, all orders under this customer will be delete!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '/admin/customer/delete/' + id,
                        success: function (response) {
                            Swal.fire({
                                position: "top-end",
                                type: "success",
                                title: "Customer move to trash successfully !",
                                showConfirmButton: !1,
                                timer: 1000,
                            });
                            $("#trashed_customer_table").DataTable().ajax.reload();
                        }
                    });
                } else {
                    swal("Great ! Your customer data is safe !", {
                        icon: "success",
                    });
                }
            });

        })




        //
    });
})(jQuery);
