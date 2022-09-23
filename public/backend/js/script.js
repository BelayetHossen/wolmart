/* INDEX
|--------------------------------------------------------------------------
1.  requred function
2.  Email validate function
3.  phone validate function
4.  All rolse load
5.  Role add system
6.  Role trash system
7.  Role trash system
8.  Role delete system
9.  Role edit
10. Role update
11. Single Role view
12. Role status update

13. Active User Table -> Convert to datatable
14. Trashed user table -> Convert to datatable
15. Admin User add system
16. User status update
17. User edit
18. User update
19. User trash system
20. User restore system
21. User delete system
22. Single user view

23. All Brand load
24. Brand add system
25. Brand status update
26. Brand edit
27. preview user edit logo
28. Brand update
29. Brand trash system
30. Brand restore system
31. Brand delete system
32. Tag all system
33. Tag store system
34. Tag delete system
35. category icon type select
36. main category table to data table
37. main category store system
38. main category status change system
39. main category edit
40. main category update system
41. main category trash-restore system
42. main category delete system
43. second product category table to data table
44.
45.
|--------------------------------------------------------------------------
*/

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

        /*
        |--------------------------------------------------------------------------
        | 4.All rolse load
        |--------------------------------------------------------------------------
        */
        loadRoles();
        function loadRoles() {
            $.ajax({
                url: "all-roles",
                success: function (data) {
                    $("#role_list").html(data);
                },
            });
        }

        /*
        |--------------------------------------------------------------------------
        | 5.Role add system
        |--------------------------------------------------------------------------
        */
        $(document).on("submit", "#role_add_form", function (e) {
            e.preventDefault();
            let name = $('#role_add_form input[name="name"]').val();

            if (name == "") {
                $(".name-check-msg").html("");
                $(".name-msg").html(
                    fieldRequre("The name field is requred !", "danger")
                );
            } else {
                $(".name-msg").html("");
                $.ajax({
                    url: "add-role",
                    method: "post",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.f == "Hi") {
                            $(".name-check-msg").html(
                                fieldRequre(
                                    "The name is already exist !",
                                    "warning"
                                )
                            );
                        } else {
                            $(".name-check-msg").html("");
                            loadRoles();
                            $("#role_add_form")[0].reset();
                            $("#role_add_modal").modal("hide");

                            function successAlert() {
                                Swal.fire({
                                    position: "top-end",
                                    type: "success",
                                    title: "New Role Add To Your System !",
                                    showConfirmButton: !1,
                                    timer: 3000,
                                });
                            }
                            successAlert();
                        }
                    },
                });
            }
        });

        /*
        |--------------------------------------------------------------------------
        | 6.Role trash system
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".role_trash_btn", function (e) {
            e.preventDefault();

            let id = $(this).attr("trash_id");

            $.ajax({
                url: "trash-restore-role/" + id,
                success: function (data) {
                    loadRoles();
                    function successAlert() {
                        Swal.fire({
                            position: "top-end",
                            type: "success",
                            title: "The role is move to trash successfully !",
                            showConfirmButton: !1,
                            timer: 3000,
                        });
                    }
                    successAlert();
                },
            });
        });

        /*
        |--------------------------------------------------------------------------
        | 7.Role restore system
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".role_restore_btn", function (e) {
            e.preventDefault();

            let id = $(this).attr("restore_id");

            $.ajax({
                url: "trash-restore-role/" + id,
                success: function (data) {
                    loadRoles();
                    function successAlert() {
                        Swal.fire({
                            position: "top-end",
                            type: "success",
                            title: "The role is restored successfully !",
                            showConfirmButton: !1,
                            timer: 3000,
                        });
                    }
                    successAlert();
                },
            });
        });

        /*
        |--------------------------------------------------------------------------
        | 8.Role delete system
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".role_delete_btn", function (e) {
            e.preventDefault();

            let id = $(this).attr("delete_id");

            swal({
                title: "Are you sure?",
                text: "Role deleted, you will not be able to recover this role!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "delete-role/" + id,
                        success: function (data) {
                            loadRoles();
                        },
                    });
                    swal("Great ! The role has been permanently deleted !", {
                        icon: "success",
                    });
                } else {
                    swal("Great ! Your role data is safe !", {
                        icon: "success",
                    });
                }
            });
        });

        /*
        |--------------------------------------------------------------------------
        | 9.Role edit
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".role_edit_btn", function (e) {
            e.preventDefault();
            let id = $(this).attr("role_edit_id");
            $.ajax({
                url: "edit-role/" + id,
                success: function (data) {
                    $('#role_edit_form input[name="name"]').val(data.name);
                    $('#role_edit_form input[name="id"]').val(data.id);
                    $("#role_edit_permission").html(data.permission);

                    $("#role_edit_modal").modal("show");
                },
            });
        });

        /*
        |--------------------------------------------------------------------------
        | 10.Role update
        |--------------------------------------------------------------------------
        */
        $(document).on("submit", "#role_edit_form", function (e) {
            e.preventDefault();
            let id = $('#role_edit_form input[name="id"]').val();

            $.ajax({
                url: "update-role/" + id,
                method: "post",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    loadRoles();
                    $("#role_edit_modal").modal("hide");
                    function successAlert() {
                        Swal.fire({
                            position: "top-end",
                            type: "success",
                            title: "Role update successfully !",
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
        | 11.Single Role view
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".view_role_btn", function (e) {
            e.preventDefault();
            let id = $(this).attr("role_view_id");
            $.ajax({
                url: "view-role/" + id,
                success: function (data) {
                    $("#role_show_msg").html(
                        '<p class="text-danger">আরে ভাই, রোল এর আবার দেখার কি আছে?</p>'
                    );

                    $("#role_show_modal").modal("show");
                },
            });
        });

        /*
        |--------------------------------------------------------------------------
        | 12.Role status update
        |--------------------------------------------------------------------------
        */
        $(document).on("change", "#role_status_btn", function (e) {
            e.preventDefault();
            $.ajax({
                url: "role-status/" + this.value,
                success: function (data) {
                    loadRoles();
                    function successAlert() {
                        Swal.fire({
                            position: "top-end",
                            type: "success",
                            title: "One Role Status Updated successfully !",
                            showConfirmButton: !1,
                            timer: 2500,
                        });
                    }
                    successAlert();
                },
            });
        });

        // Admin User script

        /*
        |--------------------------------------------------------------------------
        | 13.Active User Table -> Convert to datatable
        |--------------------------------------------------------------------------
        */
        $("#user_table").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "admin-user",
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
                    data: "role",
                    name: "role",
                },
                {
                    data: "phone",
                    name: "phone",
                },
                {
                    data: "photo",
                    name: "photo",
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
        | 14.Trashed user table -> Convert to datatable
        |--------------------------------------------------------------------------
        */
        $("#trash_users").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "trashed-users",
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
                    data: "role",
                    name: "role",
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
                    data: "photo",
                    name: "photo",
                },
                {
                    data: "action",
                    name: "action",
                },
            ],
        });

        /*
        |--------------------------------------------------------------------------
        | 15.Admin User add system
        |--------------------------------------------------------------------------
        */
        $(document).on("submit", "#user_add_form", function (e) {
            e.preventDefault();

            let name = $('#user_add_form input[name="name"]').val();
            let phone = $('#user_add_form input[name="phone"]').val();
            let username = $('#user_add_form input[name="username"]').val();
            let email = $('#user_add_form input[name="email"]').val();

            if (name == "") {
                $(".name-msg").html(
                    fieldRequre("The name field is requred !", "danger", "0")
                );
            } else {
                $(".name-msg").html("");
            }

            if (phone == "") {
                $(".phone-msg").html(
                    fieldRequre("The phone field is requred !", "danger", "0")
                );
            } else if (validatePhone(phone) == false) {
                $(".phone-msg").html("");
                $(".phone-check").html(
                    fieldRequre("The phone is not valied !", "danger", "0")
                );
            } else {
                $(".phone-msg").html("");
                $(".phone-check").html("");
            }

            if (username == "") {
                $(".username-msg").html(
                    fieldRequre(
                        "The username field is requred !",
                        "danger",
                        "0"
                    )
                );
            } else {
                $(".username-msg").html("");
            }

            if (email == "") {
                $(".email-msg").html(
                    fieldRequre("The email field is requred !", "danger", "0")
                );
            } else if (validateEmail(email) == false) {
                $(".email-msg").html("");
                $(".email-check").html(
                    fieldRequre("The email is not valied !", "danger", "0")
                );
            } else {
                $(".email-msg").html("");
                $(".email-check").html("");
            }

            if (
                name != "" &&
                phone != "" &&
                username != "" &&
                email != "" &&
                validateEmail(email) == true &&
                validatePhone(phone) == true
            ) {
                $.ajax({
                    url: "admin-user-add",
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
                            $("#user_add_form")[0].reset();
                            $("#user_add_modal").modal("hide");
                            $("#user_table").DataTable().ajax.reload();
                            function successAlert() {
                                Swal.fire({
                                    position: "top-end",
                                    type: "success",
                                    title: "A New User is successfully Added To Your System !",
                                    showConfirmButton: !1,
                                    timer: 3000,
                                });
                            }
                            successAlert();
                        }
                    },
                });
            }
        });

        /*
        |--------------------------------------------------------------------------
        | 16.User status update
        |--------------------------------------------------------------------------
        */
        $(document).on("change", "#user_status_btn", function (e) {
            e.preventDefault();
            $.ajax({
                url: "user-status/" + this.value,
                success: function (data) {
                    $("#user_table").DataTable().ajax.reload();
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
        | 17.User edit
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".user_edit_btn", function (e) {
            e.preventDefault();
            let id = $(this).attr("user_edit_id");
            $.ajax({
                url: "user-edit/" + id,
                success: function (data) {
                    $('#user_edit_form input[name="name"]').val(data.name);
                    $('#user_edit_form input[name="username"]').val(
                        data.username
                    );
                    $('#user_edit_form input[name="email"]').val(data.email);
                    $('#user_edit_form input[name="phone"]').val(data.phone);
                    $('#user_edit_form input[name="old_photo"]').val(
                        data.old_photo
                    );
                    $('#user_edit_form input[name="edit_id"]').val(data.id);
                    $("#user_edit_photo_preview").attr(
                        "src",
                        data.photo_path + "/" + data.old_photo
                    );
                    $(".user_edit_role").html(data.role);
                    $(".user_gender_edit").html(data.gender);

                    $("#user_edit_modal").modal("show");
                },
            });
        });

        // preview user edit photo
        $('#user_edit_form input[name="new_photo"]').change(function (e) {
            let image = URL.createObjectURL(e.target.files[0]);
            $("#user_edit_photo_preview").attr("src", image);
        });

        /*
        |--------------------------------------------------------------------------
        | 18.User update
        |--------------------------------------------------------------------------
        */
        $(document).on("submit", "#user_edit_form", function (e) {
            e.preventDefault();
            let name = $('#user_edit_form input[name="name"]').val();
            let phone = $('#user_edit_form input[name="phone"]').val();
            let username = $('#user_edit_form input[name="username"]').val();
            let email = $('#user_edit_form input[name="email"]').val();

            if (name == "") {
                $(".name-msg").html(
                    fieldRequre("The name field is requred !", "danger", "0")
                );
            } else {
                $(".name-msg").html("");
            }

            if (phone == "") {
                $(".phone-msg").html(
                    fieldRequre("The phone field is requred !", "danger", "0")
                );
            } else if (validatePhone(phone) == false) {
                $(".phone-msg").html("");
                $(".phone-check").html(
                    fieldRequre("The phone is not valied !", "danger", "0")
                );
            } else {
                $(".phone-msg").html("");
                $(".phone-check").html("");
            }

            if (username == "") {
                $(".username-msg").html(
                    fieldRequre(
                        "The username field is requred !",
                        "danger",
                        "0"
                    )
                );
            } else {
                $(".username-msg").html("");
            }

            if (email == "") {
                $(".email-msg").html(
                    fieldRequre("The email field is requred !", "danger", "0")
                );
            } else if (validateEmail(email) == false) {
                $(".email-msg").html("");
                $(".email-check").html(
                    fieldRequre("The email is not valied !", "danger", "0")
                );
            } else {
                $(".email-msg").html("");
                $(".email-check").html("");
            }

            if (
                name != "" &&
                phone != "" &&
                username != "" &&
                email != "" &&
                validateEmail(email) == true &&
                validatePhone(phone) == true
            ) {
                $.ajax({
                    url: "user-update",
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
                            $("#user_edit_modal").modal("hide");
                            $("#user_table").DataTable().ajax.reload();
                            //$('#user_edit_form input[name="new_photo"]')[0].reset();

                            function successAlert() {
                                Swal.fire({
                                    position: "top-end",
                                    type: "success",
                                    title: "User is updated successfully !",
                                    showConfirmButton: !1,
                                    timer: 3000,
                                });
                            }
                            successAlert();
                        }
                    },
                });
            }
        });

        /*
        |--------------------------------------------------------------------------
        | 19.User trash system
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".user_trash_btn", function (e) {
            e.preventDefault();

            let id = $(this).attr("user_trash_id");

            $.ajax({
                url: "user-trash-restore/" + id,
                success: function (data) {
                    $("#user_table").DataTable().ajax.reload();
                    function successAlert() {
                        Swal.fire({
                            position: "top-end",
                            type: "success",
                            title: "The user is move to trash successfully !",
                            showConfirmButton: !1,
                            timer: 3000,
                        });
                    }
                    successAlert();
                },
            });
        });

        /*
        |--------------------------------------------------------------------------
        | 20.User restore system
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".user_restore_btn", function (e) {
            e.preventDefault();

            let id = $(this).attr("user_restore_id");

            $.ajax({
                url: "user-trash-restore/" + id,
                success: function (data) {
                    $("#trash_users").DataTable().ajax.reload();
                    function successAlert() {
                        Swal.fire({
                            position: "top-end",
                            type: "success",
                            title: "The user is back to restored successfully !",
                            showConfirmButton: !1,
                            timer: 3000,
                        });
                    }
                    successAlert();
                },
            });
        });

        /*
        |--------------------------------------------------------------------------
        | 21.User delete system
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".user_delete_btn", function (e) {
            e.preventDefault();

            let username = $(this).attr("user_delete_id");

            swal({
                title: "Are you sure?",
                text: "User delete, you will not be able to recover this role!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "user-delete/" + username,
                        success: function (data) {
                            $("#trash_users").DataTable().ajax.reload();
                        },
                    });
                    swal("Great ! The user has been permanently deleted !", {
                        icon: "success",
                    });
                } else {
                    swal("Great ! Your user data is safe !", {
                        icon: "success",
                    });
                }
            });
        });

        /*
        |--------------------------------------------------------------------------
        | 22.Single user view
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".view_user_btn", function (e) {
            e.preventDefault();
            let id = $(this).attr("user_view_id");
            $.ajax({
                url: "user-view/" + id,
                success: function (data) {
                    $(".user_photo_view").html(data.photo);
                    $("#single_user_info").html(data.user_info);

                    $("#user_show_modal").modal("show");
                },
            });
        });

        // Brand Script

        /*
        |--------------------------------------------------------------------------
        | 23.All Brand load
        |--------------------------------------------------------------------------
        */
        loadBrands();
        function loadBrands() {
            $.ajax({
                url: "all-brands",
                success: function (data) {
                    $("#brand_list").html(data);
                },
            });
        }

        /*
        |--------------------------------------------------------------------------
        | 24.Brand add system
        |--------------------------------------------------------------------------
        */
        $(document).on("submit", "#brand_add_form", function (e) {
            e.preventDefault();
            let name = $('#brand_add_form input[name="name"]').val();

            if (name == "") {
                $(".name-check-msg").html("");
                $(".name-msg").html(
                    fieldRequre("The name field is requred !", "danger")
                );
            } else {
                $(".name-msg").html("");
                $.ajax({
                    url: "brand",
                    method: "post",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.f == "Hi") {
                            $(".name-check-msg").html(
                                fieldRequre(
                                    "The name is already exist !",
                                    "danger"
                                )
                            );
                        } else if (data.logo == "empty") {
                            $(".logo-check-msg").html(
                                fieldRequre(
                                    "Please upload brand logo !",
                                    "danger"
                                )
                            );
                        } else {
                            $(".name-check-msg").html("");
                            $(".logo-check-msg").html("");
                            loadBrands();
                            $("#brand_add_form")[0].reset();
                            $("#brand_add_modal").modal("hide");

                            function successAlert() {
                                Swal.fire({
                                    position: "top-end",
                                    type: "success",
                                    title: "New brand Add To Your System !",
                                    showConfirmButton: !1,
                                    timer: 3000,
                                });
                            }
                            successAlert();
                        }
                    },
                });
            }
        });

        /*
        |--------------------------------------------------------------------------
        | 25.Brand status update
        |--------------------------------------------------------------------------
        */
        $(document).on("change", "#brand_status_btn", function (e) {
            e.preventDefault();

            $.ajax({
                url: "brand-status/" + this.value,
                success: function (data) {
                    loadBrands();
                    function successAlert() {
                        Swal.fire({
                            position: "top-end",
                            type: "success",
                            title: "One brand Status Updated successfully !",
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
        | 26.Brand edit
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".brand_edit_btn", function (e) {
            e.preventDefault();
            let id = $(this).attr("brand_edit_id");
            $.ajax({
                url: "brand-edit/" + id,
                success: function (data) {
                    $('#brand_edit_form input[name="name"]').val(data.name);
                    $('#brand_edit_form input[name="id"]').val(data.id);
                    $('#brand_edit_form input[name="old_logo"]').val(
                        data.old_logo
                    );
                    $("#brand_edit_logo_preview").attr(
                        "src",
                        data.photo_path + "/" + data.old_logo
                    );

                    $("#brand_edit_modal").modal("show");
                },
            });
        });

        // 27.preview user edit logo
        $('#brand_edit_form input[name="new_logo"]').change(function (e) {
            let image = URL.createObjectURL(e.target.files[0]);
            $("#brand_edit_logo_preview").attr("src", image);
        });

        /*
        |--------------------------------------------------------------------------
        | 28.Brand update
        |--------------------------------------------------------------------------
        */
        $(document).on("submit", "#brand_edit_form", function (e) {
            e.preventDefault();
            let name = $('#brand_edit_form input[name="name"]').val();
            let id = $('#brand_edit_form input[name="id"]').val();

            if (name == "") {
                $(".name-msg").html(
                    fieldRequre("The name field is requred !", "danger", "0px")
                );
            } else {
                $(".name-msg").html("");
                $.ajax({
                    url: "brand-update/" + id,
                    method: "post",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.f == "Hi") {
                            $(".name-check-msg").html(
                                fieldRequre(
                                    "The name is already exist !",
                                    "danger",
                                    "0px"
                                )
                            );
                        } else {
                            $(".name-check-msg").html("");
                            loadBrands();
                            $("#brand_edit_modal").modal("hide");

                            function successAlert() {
                                Swal.fire({
                                    position: "top-end",
                                    type: "success",
                                    title: "Brand Updated successfully !",
                                    showConfirmButton: !1,
                                    timer: 3000,
                                });
                            }
                            successAlert();
                        }
                    },
                });
            }
        });

        /*
        |--------------------------------------------------------------------------
        | 29.Brand trash system
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".brand_trash_btn", function (e) {
            e.preventDefault();

            let id = $(this).attr("brand_trash_id");

            $.ajax({
                url: "brand-trash-restore/" + id,
                success: function (data) {
                    loadBrands();
                    function successAlert() {
                        Swal.fire({
                            position: "top-end",
                            type: "success",
                            title: "The brand is move to trash successfully !",
                            showConfirmButton: !1,
                            timer: 3000,
                        });
                    }
                    successAlert();
                },
            });
        });

        /*
        |--------------------------------------------------------------------------
        | 30.Brand restore system
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".brand_restore_btn", function (e) {
            e.preventDefault();

            let id = $(this).attr("brand_restore_id");

            $.ajax({
                url: "brand-trash-restore/" + id,
                success: function (data) {
                    loadBrands();
                    function successAlert() {
                        Swal.fire({
                            position: "top-end",
                            type: "success",
                            title: "The brand is back to restored successfully !",
                            showConfirmButton: !1,
                            timer: 3000,
                        });
                    }
                    successAlert();
                },
            });
        });

        /*
        |--------------------------------------------------------------------------
        | 31.Brand delete system
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".brand_delete_btn", function (e) {
            e.preventDefault();

            let id = $(this).attr("brand_delete_id");

            swal({
                title: "Are you sure ?",
                text: "Brand delete, you will not be able to recover this role!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "brand-delete/" + id,
                        success: function (data) {
                            loadBrands();
                        },
                    });
                    swal("Great ! The brand has been permanently deleted !", {
                        icon: "success",
                    });
                } else {
                    swal("Great ! Your brand data is safe !", {
                        icon: "success",
                    });
                }
            });
        });

        /*
        |--------------------------------------------------------------------------
        | 32.Tag all system
        |--------------------------------------------------------------------------
        */
        allProductTags();
        function allProductTags() {
            $.ajax({
                url: "product-tag-all",
                success: function (data) {
                    $("#product_tag_list").html(data);
                },
            });
        }

        /*
        |--------------------------------------------------------------------------
        | 33.Tag store system
        |--------------------------------------------------------------------------
        */
        $(document).on("submit", "#tag_add_form", function (e) {
            e.preventDefault();

            let name = $('#tag_add_form input[name="name"]').val();

            if (name == "") {
                $(".name-msg").html(
                    fieldRequre("The name field is required !", "danger")
                );
            } else {
                $(".name-msg").html("");
                $.ajax({
                    url: "product-tag-store",
                    method: "post",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.name_check == "exist") {
                            $(".name-check-msg").html(
                                fieldRequre(
                                    "The tag name is already exist !",
                                    "danger"
                                )
                            );
                        } else {
                            $(".name-check-msg").html("");
                            $("#tag_add_form")[0].reset();
                            $("#tag_add_modal").modal("hide");

                            allProductTags();

                            function successAlert() {
                                Swal.fire({
                                    position: "top-end",
                                    type: "success",
                                    title: "A new tag added successfully !",
                                    showConfirmButton: !1,
                                    timer: 3000,
                                });
                            }
                            successAlert();
                        }
                    },
                });
            }
        });

        /*
        |--------------------------------------------------------------------------
        | 34.Tag delete system
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".tag_delete_btn", function (e) {
            e.preventDefault();
            let id = $(this).attr("tag_delete_id");

            swal({
                title: "Are you sure ?",
                text: "Tag delete, you will not be able to recover this role!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "product-tag-delete/" + id,
                        success: function (data) {
                            allProductTags();
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

        /*
        |--------------------------------------------------------------------------
        | 36.main category table to data table
        |--------------------------------------------------------------------------
        */
        $("#main_category_table").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "main-category-all",
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
                    data: "slug",
                    name: "slug",
                },
                {
                    data: "photo",
                    name: "photo",
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
        | 37.main category store system
        |--------------------------------------------------------------------------
        */
        $(document).on("submit", "#main_category_add_form", function (e) {
            e.preventDefault();
            let name = $('#main_category_add_form input[name="name"]').val();
            let photo = $('#main_category_add_form input[name="photo"]').val();

            if (name == "") {
                $(".name-msg").html(
                    fieldRequre("Name field is requred !", "danger", "0px")
                );
            } else {
                $(".name-msg").html("");
            }

            if (photo == "") {
                $(".photo-msg").html(
                    fieldRequre("Set a photo must !", "danger", "0px")
                );
            } else {
                $(".photo-msg").html("");
            }

            if (name != "" && photo != "") {
                $.ajax({
                    url: "product-categoryMain-store",
                    method: "post",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.name_check == "exist") {
                            $(".name-check-msg").html(
                                fieldRequre(
                                    "Category name is already exist !",
                                    "danger",
                                    "0px"
                                )
                            );
                        } else {
                            $(".name-check-msg").html("");
                        }

                        $("#main_category_table").DataTable().ajax.reload();
                        $("#main_category_add_modal").modal("hide");
                        $("#main_category_add_form")[0].reset();
                        function successAlert() {
                            Swal.fire({
                                position: "top-end",
                                type: "success",
                                title: "A new category added successfully !",
                                showConfirmButton: !1,
                                timer: 3000,
                            });
                        }
                        successAlert();
                    },
                });
            }
        });

        // preview main category photo
        $(document).on(
            "change",
            '#main_category_add_form input[name="photo"]',
            function (e) {
                let image = URL.createObjectURL(e.target.files[0]);
                $(".photo_preview").attr("src", image);
            }
        );

        /*
        |--------------------------------------------------------------------------
        | 38.main category status change system
        |--------------------------------------------------------------------------
        */
        $(document).on("change", "#grand_cat_status_btn", function (e) {
            let id = $(this).val();
            $.ajax({
                url: "product-categoryMain-statusUpdate/" + id,
                success: function (data) {
                    $("#main_category_table").DataTable().ajax.reload();
                    function successAlert() {
                        Swal.fire({
                            position: "top-end",
                            type: "success",
                            title: "Category status change successfully !",
                            showConfirmButton: !1,
                            timer: 3000,
                        });
                    }
                    successAlert();
                },
            });
        });

        /*
        |--------------------------------------------------------------------------
        | 39.main category edit
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".grand_cat_edit_btn", function (e) {
            e.preventDefault();
            let id = $(this).attr("grand_cat_edit_id");
            $.ajax({
                url: "product-categoryMain-edit/" + id,
                success: function (data) {
                    $(".category_icon_type_show")
                        .html(`<label for="icon">Icon <small>(png, svg 150*150)</small></label>
                    <input id="icon" class="form-control" name="photo_icon" type="file">`);

                    $('#main_category_edit_form input[name="name"]').val(
                        data.data.name
                    );
                    $('#main_category_edit_form input[name="id"]').val(
                        data.data.id
                    );
                    $('#main_category_edit_form input[name="old_photo"]').val(
                        data.data.photo
                    );
                    $("#main_cat_edit_photo_preview").attr(
                        "src",
                        data.photo_path
                    );
                    $("#main_category_edit_modal").modal("show");
                },
            });
        });

        // preview main category photo
        $(document).on(
            "change",
            '#main_category_edit_form input[name="new_photo"]',
            function (e) {
                let image = URL.createObjectURL(e.target.files[0]);
                $("#main_cat_edit_photo_preview").attr("src", image);
            }
        );

        /*
        |--------------------------------------------------------------------------
        | 40.main category update system
        |--------------------------------------------------------------------------
        */
        $(document).on("submit", "#main_category_edit_form", function (e) {
            e.preventDefault();
            let name = $('#main_category_edit_form input[name="name"]').val();
            let photo = $('#main_category_edit_form input[name="photo"]').val();

            if (name == "") {
                $(".name-msg").html(
                    fieldRequre("Name field is requred !", "danger", "0px")
                );
            } else {
                $(".name-msg").html("");
            }

            if (name != "") {
                $.ajax({
                    url: "product-categoryMain-update",
                    method: "post",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.f == "Hi") {
                            $(".name-check-msg").html(
                                fieldRequre(
                                    "Category name is already exist !",
                                    "danger",
                                    "0px"
                                )
                            );
                        } else {
                            $(".name-check-msg").html("");
                            $("#main_category_edit_modal").modal("hide");
                            function successAlert() {
                                Swal.fire({
                                    position: "top-end",
                                    type: "success",
                                    title: "A category updated successfully !",
                                    showConfirmButton: !1,
                                    timer: 3000,
                                });
                            }
                            successAlert();

                            $("#main_category_table").DataTable().ajax.reload();
                        }
                    },
                });
            }
        });

        /*
        |--------------------------------------------------------------------------
        | 41.main category trash-restore system
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".grand_cat_trash_btn", function (e) {
            e.preventDefault();
            let id = $(this).attr("grand_cat_trash_id");
            $.ajax({
                url: "product-categoryMain-trashRestore/" + id,
                success: function (data) {
                    $("#main_category_table").DataTable().ajax.reload();
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
        | 42.main category delete system
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".grand_cat_delete_btn", function (e) {
            e.preventDefault();
            let id = $(this).attr("grand_cat_delete_id");
            swal({
                title: "Are you sure ?",
                text: "Category delete, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "product-categoryMain-delete/" + id,
                        success: function (data) {
                            $("#main_category_table").DataTable().ajax.reload();
                        },
                    });
                    swal(
                        "Great ! The category has been permanently deleted !",
                        {
                            icon: "success",
                        }
                    );
                } else {
                    swal("Great ! Your category data is safe !", {
                        icon: "success",
                    });
                }
            });
        });

        /*
        |--------------------------------------------------------------------------
        | 43.second product category table to data table
        |--------------------------------------------------------------------------
        */
        $("#second_productCategory_table").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "product-categorySecond-all",
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
                    data: "mainCat",
                    name: "mainCat",
                },
                {
                    data: "photo",
                    name: "photo",
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
        | 44.second product category store
        |--------------------------------------------------------------------------
        */
        $(document).on(
            "submit",
            "#second_productCategory_add_form",
            function (e) {
                e.preventDefault();
                let main_id = $(
                    '#second_productCategory_add_form select[name="main_cat_id"]'
                ).val();
                let name = $(
                    '#second_productCategory_add_form input[name="name"]'
                ).val();
                let font_icon = $(
                    '#second_productCategory_add_form input[name="font_icon"]'
                ).val();
                let photo_icon = $(
                    '#second_productCategory_add_form input[name="photo_icon"]'
                ).val();
                let photo = $(
                    '#second_productCategory_add_form input[name="photo"]'
                ).val();

                if (main_id == "") {
                    $(".main-cat-msg").html(
                        fieldRequre(
                            "Please select main category !",
                            "danger",
                            "0px"
                        )
                    );
                } else {
                    $(".main-cat-msg").html("");
                }

                if (name == "") {
                    $(".name-msg").html(
                        fieldRequre("Name field is requred !", "danger", "0px")
                    );
                } else {
                    $(".name-msg").html("");
                }

                if (photo == "") {
                    $(".photo-msg").html(
                        fieldRequre("Set a photo must !", "danger", "0px")
                    );
                } else {
                    $(".photo-msg").html("");
                }

                if (name != "" && photo != "" && main_id != "") {
                    $.ajax({
                        url: "product-categorySecond-store",
                        method: "post",
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            if (data.name_check == "exist") {
                                $(".name-check-msg").html(
                                    fieldRequre(
                                        "Category name is already exist !",
                                        "danger",
                                        "0px"
                                    )
                                );
                            } else {
                                $(".name-check-msg").html("");
                                $("#second_productCategory_table")
                                    .DataTable()
                                    .ajax.reload();
                                $("#second_productCategory_add_modal").modal(
                                    "hide"
                                );
                                $(
                                    "#second_productCategory_add_form"
                                )[0].reset();
                                function successAlert() {
                                    Swal.fire({
                                        position: "top-end",
                                        type: "success",
                                        title: "A new category added successfully !",
                                        showConfirmButton: !1,
                                        timer: 3000,
                                    });
                                }
                                successAlert();
                            }
                        },
                    });
                }
            }
        );

        // preview second category photo
        $(document).on(
            "change",
            '#second_productCategory_add_form input[name="photo"]',
            function (e) {
                let image = URL.createObjectURL(e.target.files[0]);
                $(".photo_preview").attr("src", image);
            }
        );

        /*
        |--------------------------------------------------------------------------
        | 45.second category status change system
        |--------------------------------------------------------------------------
        */
        $(document).on("change", "#second_cat_status_btn", function (e) {
            let id = $(this).val();
            $.ajax({
                url: "product-categorySecond-statusUpdate/" + id,
                success: function (data) {
                    $("#second_productCategory_table")
                        .DataTable()
                        .ajax.reload();
                    function successAlert() {
                        Swal.fire({
                            position: "top-end",
                            type: "success",
                            title: "Category status change successfully !",
                            showConfirmButton: !1,
                            timer: 3000,
                        });
                    }
                    successAlert();
                },
            });
        });

        /*
        |--------------------------------------------------------------------------
        | 46.second category edit
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".second_cat_edit_btn", function (e) {
            e.preventDefault();
            let id = $(this).attr("second_cat_edit_id");
            $.ajax({
                url: "product-categorySecond-edit/" + id,
                success: function (data) {
                    $(".category_icon_type_show")
                        .html(`<label for="icon">Icon <small>(png, svg 150*150)</small></label>
                    <input id="icon" class="form-control" name="photo_icon" type="file">`);

                    $(".main_cat_select").html(data.main_cat_list);
                    $('#second_category_edit_form input[name="name"]').val(
                        data.data.name
                    );
                    $('#second_category_edit_form input[name="id"]').val(
                        data.data.id
                    );
                    $('#second_category_edit_form input[name="old_photo"]').val(
                        data.data.photo
                    );
                    $("#second_cat_edit_photo_preview").attr(
                        "src",
                        data.photo_path
                    );
                    $("#second_category_edit_modal").modal("show");
                },
            });
        });

        // preview second category photo
        $(document).on(
            "change",
            '#second_category_edit_form input[name="new_photo"]',
            function (e) {
                let image = URL.createObjectURL(e.target.files[0]);
                $("#second_cat_edit_photo_preview").attr("src", image);
            }
        );

        /*
        |--------------------------------------------------------------------------
        | 47.second category update system
        |--------------------------------------------------------------------------
        */
        $(document).on("submit", "#second_category_edit_form", function (e) {
            e.preventDefault();
            let name = $('#second_category_edit_form input[name="name"]').val();
            let photo = $(
                '#second_category_edit_form input[name="photo"]'
            ).val();

            if (name == "") {
                $(".name-msg").html(
                    fieldRequre("Name field is requred !", "danger", "0px")
                );
            } else {
                $(".name-msg").html("");
            }

            if (photo == "") {
                $(".photo-msg").html(
                    fieldRequre("Set a photo must !", "danger", "0px")
                );
            } else {
                $(".photo-msg").html("");
            }

            if (name != "") {
                $.ajax({
                    url: "product-categorySecond-update",
                    method: "post",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.f == "Hi") {
                            $(".name-check-msg").html(
                                fieldRequre(
                                    "Category name is already exist !",
                                    "danger",
                                    "0px"
                                )
                            );
                        } else {
                            $(".name-check-msg").html("");
                            $("#second_category_edit_modal").modal("hide");
                            function successAlert() {
                                Swal.fire({
                                    position: "top-end",
                                    type: "success",
                                    title: "Category updated successfully !",
                                    showConfirmButton: !1,
                                    timer: 3000,
                                });
                            }
                            successAlert();
                            $("#second_productCategory_table")
                                .DataTable()
                                .ajax.reload();
                        }
                    },
                });
            }
        });

        /*
        |--------------------------------------------------------------------------
        | 48.second category trash-restore system
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".second_cat_trash_btn", function (e) {
            e.preventDefault();
            let id = $(this).attr("second_cat_trash_id");
            $.ajax({
                url: "product-categorySecond-trashRestore/" + id,
                success: function (data) {
                    $("#second_productCategory_table")
                        .DataTable()
                        .ajax.reload();
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
        | 49.second category delete system
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".second_cat_delete_btn", function (e) {
            e.preventDefault();
            let id = $(this).attr("second_cat_delete_id");
            swal({
                title: "Are you sure ?",
                text: "Category delete, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "product-categorySecond-delete/" + id,
                        success: function (data) {
                            $("#second_productCategory_table")
                                .DataTable()
                                .ajax.reload();
                        },
                    });
                    swal(
                        "Great ! The category has been permanently deleted !",
                        {
                            icon: "success",
                        }
                    );
                } else {
                    swal("Great ! Your category data is safe !", {
                        icon: "success",
                    });
                }
            });
        });

        /*
        |--------------------------------------------------------------------------
        | 50.third category (select second category system)
        |--------------------------------------------------------------------------
        */
        $(document).on("change", "#main_cat_select", function (e) {
            e.preventDefault();
            let main_cat_id = $(this).val();
            $.ajax({
                url: "product-categorysecond-select/" + main_cat_id,
                success: function (data) {
                    $(".select_second_category").html(data);
                },
            });
        });

        /*
        |--------------------------------------------------------------------------
        | 51.third product category store
        |--------------------------------------------------------------------------
        */
        $(document).on(
            "submit",
            "#third_productCategory_add_form",
            function (e) {
                e.preventDefault();
                let main_id = $(
                    '#third_productCategory_add_form select[name="main_cat_id"]'
                ).val();
                let second_id = $(
                    '#third_productCategory_add_form select[name="second_cat_id"]'
                ).val();
                let name = $(
                    '#third_productCategory_add_form input[name="name"]'
                ).val();
                let photo = $(
                    '#third_productCategory_add_form input[name="photo"]'
                ).val();

                if (main_id == "") {
                    $(".main-cat-msg").html(
                        fieldRequre(
                            "Please select main category !",
                            "danger",
                            "0px"
                        )
                    );
                } else {
                    $(".main-cat-msg").html("");
                }
                if (second_id == "") {
                    $(".second-cat-msg").html(
                        fieldRequre(
                            "Please select second category !",
                            "danger",
                            "0px"
                        )
                    );
                } else {
                    $(".second-cat-msg").html("");
                }

                if (name == "") {
                    $(".name-msg").html(
                        fieldRequre("Name field is requred !", "danger", "0px")
                    );
                } else {
                    $(".name-msg").html("");
                }

                if (photo == "") {
                    $(".photo-msg").html(
                        fieldRequre("Set a photo must !", "danger", "0px")
                    );
                } else {
                    $(".photo-msg").html("");
                }

                if (
                    name != "" &&
                    photo != "" &&
                    main_id != "" &&
                    second_id != ""
                ) {
                    $.ajax({
                        url: "product-categoryThird-store",
                        method: "post",
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            if (data.name_check == "exist") {
                                $(".name-check-msg").html(
                                    fieldRequre(
                                        "Category name is already exist !",
                                        "danger",
                                        "0px"
                                    )
                                );
                            } else {
                                $(".name-check-msg").html("");
                                $("#third_productCategory_add_modal").modal(
                                    "hide"
                                );
                                $("#third_productCategory_add_form")[0].reset();
                                function successAlert() {
                                    Swal.fire({
                                        position: "top-end",
                                        type: "success",
                                        title: "A new category added successfully !",
                                        showConfirmButton: !1,
                                        timer: 3000,
                                    });
                                }
                                successAlert();
                                $("#third_productCategory_table")
                                    .DataTable()
                                    .ajax.reload();
                            }
                        },
                    });
                }
            }
        );

        // preview second category photo
        $(document).on(
            "change",
            '#third_productCategory_add_form input[name="photo"]',
            function (e) {
                let image = URL.createObjectURL(e.target.files[0]);
                $(".photo_preview").attr("src", image);
            }
        );

        /*
        |--------------------------------------------------------------------------
        | 52.third product category table to data table
        |--------------------------------------------------------------------------
        */
        $("#third_productCategory_table").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "product-categoryThird-all",
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
                    data: "secondCat",
                    name: "secondCat",
                },
                {
                    data: "mainCat",
                    name: "mainCat",
                },
                {
                    data: "photo",
                    name: "photo",
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
        | 46.third category edit
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".third_cat_edit_btn", function (e) {
            e.preventDefault();
            let id = $(this).attr("third_cat_edit_id");
            $.ajax({
                url: "product-categoryThird-edit/" + id,
                success: function (data) {
                    $(".main_cat_select").html(data.main_cat_list);
                    $(".second_cat_select").html(data.second_cat_list);
                    $('#third_category_edit_form input[name="name"]').val(
                        data.data.name
                    );
                    $('#third_category_edit_form input[name="id"]').val(
                        data.data.id
                    );
                    $('#third_category_edit_form input[name="old_photo"]').val(
                        data.data.photo
                    );
                    $(".photo_preview").attr("src", data.photo_path);
                    $("#third_category_edit_modal").modal("show");
                },
            });
        });

        /*
        |--------------------------------------------------------------------------
        | 53.third category status change system
        |--------------------------------------------------------------------------
        */
        $(document).on("change", "#third_cat_status_btn", function (e) {
            let id = $(this).val();
            $.ajax({
                url: "product-categorythird-statusUpdate/" + id,
                success: function (data) {
                    $("#third_productCategory_table").DataTable().ajax.reload();
                    function successAlert() {
                        Swal.fire({
                            position: "top-end",
                            type: "success",
                            title: "Category status change successfully !",
                            showConfirmButton: !1,
                            timer: 3000,
                        });
                    }
                    successAlert();
                },
            });
        });

        /*
        |--------------------------------------------------------------------------
        | 54.third category trash-restore system
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".third_cat_trash_btn", function (e) {
            e.preventDefault();
            let id = $(this).attr("third_cat_trash_id");
            $.ajax({
                url: "product-categoryThird-trashRestore/" + id,
                success: function (data) {
                    $("#third_productCategory_table").DataTable().ajax.reload();
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
        | 55.third category delete system
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".third_cat_delete_btn", function (e) {
            e.preventDefault();
            let id = $(this).attr("third_cat_delete_id");
            swal({
                title: "Are you sure ?",
                text: "Category delete, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "product-categoryThird-delete/" + id,
                        success: function (data) {
                            $("#third_productCategory_table")
                                .DataTable()
                                .ajax.reload();
                        },
                    });
                    swal(
                        "Great ! The category has been permanently deleted !",
                        {
                            icon: "success",
                        }
                    );
                } else {
                    swal("Great ! Your category data is safe !", {
                        icon: "success",
                    });
                }
            });
        });

        /*
        |--------------------------------------------------------------------------
        | Product script
        |--------------------------------------------------------------------------
        */

        // product table to data table
        $("#products_table").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "all-products",
            },
            columns: [
                {
                    data: "sl",
                    name: "sl",
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
        $("#trashed_products_table").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/trashed-products",
            },
            columns: [
                {
                    data: "sl",
                    name: "sl",
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

        /*
        |--------------------------------------------------------------------------
        | product trash-restore system
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".product_trash_btn", function (e) {
            e.preventDefault();
            let id = $(this).attr("product_trash_id");

            $.ajax({
                url: "/product-trashRestore/" + id,
                success: function (data) {
                    $("#products_table").DataTable().ajax.reload();
                    $("#trashed_products_table").DataTable().ajax.reload();
                    if (data.key == "back") {
                        function successAlert() {
                            Swal.fire({
                                position: "top-end",
                                type: "success",
                                title: "The product has been restored successfully !",
                                showConfirmButton: !1,
                                timer: 3000,
                            });
                        }
                        successAlert();
                    } else {
                        function successAlert() {
                            Swal.fire({
                                position: "top-end",
                                type: "danger",
                                title: "The product has been trashed successfully !",
                                showConfirmButton: !1,
                                timer: 3000,
                            });
                        }
                        successAlert();
                    }
                },
            });
        });
    });
})(jQuery);
