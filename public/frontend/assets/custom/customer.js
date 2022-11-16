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
        | customer details update
        |--------------------------------------------------------------------------
        */
        $(document).on('submit', '#customer_details_form', function (e) {
            e.preventDefault();
            let f_name = $('#customer_details_form input[name="first_name"]').val();
            let l_name = $('#customer_details_form input[name="last_name"]').val();
            let phone = $('#customer_details_form input[name="phone"]').val();
            let email = $('#customer_details_form input[name="email"]').val();
            let country = $('#customer_details_form select[name="country"]').val();
            let region = $('#customer_details_form select[name="region"]').val();
            let msg = `<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Your account details saved successfully !</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;
            let msg2 = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Phone or email ia already exist !</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

            if (f_name == '') {
                $(".first_name_msg").html(
                    fieldRequre("The first name field is requred !", "danger")
                );
            } else {
                $(".first_name_msg").html('');
            }
            if (l_name == '') {
                $(".last_name_msg").html(
                    fieldRequre("The last name field is requred !", "danger")
                );
            } else {
                $(".last_name_msg").html('');
            }
            if (phone == '') {
                $(".phone_msg").html(
                    fieldRequre("The phone field is requred !", "danger")
                );
            } else if (validatePhone(phone) == false) {
                $(".phone_msg").html('');
                $(".phone_check").html(
                    fieldRequre("The phone is invallid !", "danger")
                );
            } else {
                $(".phone_check").html('');
                $(".phone_msg").html('');
            }

            if (email == "") {
                $(".email_msg").html(
                    fieldRequre("The email address is requred !", "danger")
                );
            } else if (validateEmail(email) == false) {
                $(".email_msg").html('');
                $(".email_check").html(
                    fieldRequre("The email format is not vallid !",
                        "danger"
                    )
                );
            } else {
                $(".email_check").html('');
                $(".email_msg").html('');
            }
            if (country == '') {
                $(".country_msg").html(
                    fieldRequre("The country name field is requred !", "danger")
                );
            } else {
                $(".country_msg").html('');
            }
            if (region == '') {
                $(".region_msg").html(
                    fieldRequre("The region name field is requred !", "danger")
                );
            } else {
                $(".region_msg").html('');
            }
            if (f_name != '' && l_name != '' && phone != '' && email != '' && country != '' && region != '') {
                $.ajax({
                    url: "/customer/account/details",
                    method: "post",
                    contentType: false,
                    processData: false,
                    data: new FormData(this),
                    success: function (response) {

                        if (response.check == 'exist') {
                            $('.msg').html(msg2);
                        } else {
                            toastr.success("Account details updated successfully!");
                        }


                    },
                });
            }
        })
        /*
        |--------------------------------------------------------------------------
        | customer password change
        |--------------------------------------------------------------------------
        */
        $(document).on('submit', '#customer_password_change_form', function (e) {
            e.preventDefault();
            let cur_password = $('#customer_password_change_form input[name="cur_password"]').val();
            let new_password = $('#customer_password_change_form input[name="new_password"]').val();
            let conf_password = $('#customer_password_change_form input[name="conf_password"]').val();

            if (cur_password == '') {
                $(".cur_password_msg").html(
                    fieldRequre("The current password field is requred !", "danger")
                );
            } else {
                $(".cur_password_msg").html('');
            }
            if (new_password == '') {
                $(".new_password_msg").html(
                    fieldRequre("The new password field is requred !", "danger")
                );
            } else {
                $(".new_password_msg").html('');
            }
            if (new_password != conf_password) {
                $(".conf_password_msg").html(
                    fieldRequre("The confirm password didn't match with new password !", "danger")
                );
            } else {
                $(".conf_password_msg").html('');
            }

            if (cur_password != '' && new_password != '' && conf_password != '' && new_password == conf_password) {
                $.ajax({
                    url: "/customer/password/change",
                    method: "post",
                    contentType: false,
                    processData: false,
                    data: new FormData(this),
                    success: function (response) {

                        if (response.password == 'not match') {
                            $('.cur_password_msg').html(fieldRequre("The current password is not correct!", "danger"));
                        } else {
                            $('.cur_password_msg').html('');

                        }

                        if (response.update == 'done') {
                            toastr.success("Your password is changed successfully !");
                            $('#customer_password_change_form')[0].reset();
                        }



                    },
                });
            }
        })



        //.............
    });
})(jQuery);
