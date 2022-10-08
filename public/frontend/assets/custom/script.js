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
        // Product Quick view
        $(document).on("click", ".btn-quickview", function (e) {
            let slug = $(this).attr("product_slug");

            $.ajax({
                beforeSend: function () {
                    $("body").prelodr({
                        prefixClass: "prelodr",
                        show: function () { },
                        hide: function () { },
                    });
                    $("body").prelodr("in", "Processing... ");
                },
                url: "/product/quickview/" + slug,
                success: function (data) {
                    $("#img_slider_cont").html(data.img_slider_cont);
                    $("#img_thamb_cont").html(data.img_thamb_cont);
                    $(".rating-reviews").html(
                        "(" + data.rev_count + " reviews)"
                    );
                    $(".rate_style").css("width", data.evrating);
                    $(".q_pro_brand_img").attr("src", data.brandimg);
                    $(".q_pro_title").html(data.product.title);
                    $(".q_pro_category").html(data.pro_cat);
                    $(".q_pro_price").html(data.price);
                    $(".q_pro_s_desc").html(data.product.short_desc);
                    $(".q_pro_sku").html(data.product.sku);
                    $("#add_to_cart input[name='product_id']").val(
                        data.product.id
                    );
                    $("body").prelodr("out");
                },
            });
        });

        // Add product photo manage
        $(document).on("mouseover", ".img-show", function () {
            $(this).children().children().addClass("show-hide");
        });
        $(document).on("mouseout", ".img-show", function () {
            $(this).children().children().removeClass("show-hide");
        });

        $(document).on("click", ".old_photo_remove", function (e) {
            e.preventDefault();
            $(this).parent().parent().remove();
        });

        // category select
        $(document).on("change", ".main_cat_select", function (e) {
            e.preventDefault();
            let main_cat_id = $(this).val();

            $.ajax({
                url: "/product-categorysecond-select/" + main_cat_id,
                success: function (data) {
                    $(".second_cat_select").html(data);
                },
            });
        });

        $(document).on("change", ".second_cat_select", function (e) {
            e.preventDefault();
            let second_cat_id = $(this).val();

            $.ajax({
                url: "/product-categoryThird-select/" + second_cat_id,
                success: function (data) {
                    $(".third_cat_select").html(data);
                },
            });
        });

        // vendor store setting validation
        $(document).on("click", ".inactive_option", function (e) {
            e.preventDefault();
            $(
                ".alert_msg_store_set"
            ).html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>To active all option, please setup shop setting & account details first!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`);
        });

        // vendor product table to data table
        $("#vendor_product_table").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/vendor/products",
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

        // photo remove in product update
        $(document).on("click", ".old_photo_remove", function (e) {
            e.preventDefault();

            let old_name = this.getAttribute("old_name");
            let id = this.getAttribute("product_id");

            $.ajax({
                url: "/product-img-delete/" + id + "/" + old_name,
                success: function (data) { },
            });

            // Show prelodr
            $("body").prelodr({
                prefixClass: "prelodr",
                show: function () { },
                hide: function () { },
            });
            $("body").prelodr("in", "Processing... Please wait...");
            $("body").prelodr("out", function (done) {
                setTimeout(function () {
                    done();
                }, 500);
            });

            this.closest(".img-show").remove();
        });

        /*
        |--------------------------------------------------------------------------
        | vendor Product delete system
        |--------------------------------------------------------------------------
        */
        $(document).on("click", ".product_delete_btn", function (e) {
            e.preventDefault();
            let id = $(this).attr("product_delete_id");
            swal({
                title: "Are you sure ?",
                text: "Product delete, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "/vendor/products/delete/" + id,
                        success: function (data) {
                            console.log(data);
                            $("#vendor_product_table")
                                .DataTable()
                                .ajax.reload();
                        },
                    });
                    swal("Great ! The product has been permanently deleted !", {
                        icon: "success",
                    });
                } else {
                    swal("Great ! Your product data is safe !", {
                        icon: "success",
                    });
                }
            });
        });

        // product search by category
        $(document).on("click", ".category_search_btn", function (e) {
            e.preventDefault();
            let slug = $(this).attr("cat1_slug");
            $.ajax({
                beforeSend: function () {
                    $("body").prelodr({
                        prefixClass: "prelodr",
                        show: function () { },
                        hide: function () { },
                    });
                    $("body").prelodr("in", "Processing... Please wait...");
                },
                url: "/category/search/" + slug,
                success: function (response) {
                    $("#shop_product_section").load("/category/search/" + slug);
                    $("#brand_product_section").load(
                        "/category/search/" + slug
                    );
                    $("#category_product_section").load(
                        "/category/search/" + slug
                    );

                    $("body").prelodr("out");
                    window.history.pushState(
                        "category",
                        "Title",
                        "/category/" + slug
                    );
                },
            });
        });
        // product search by brand
        $(document).on("click", ".brand_search_btn", function (e) {
            e.preventDefault();
            let slug = $(this).attr("brand_slug");
            $.ajax({
                beforeSend: function () {
                    $("body").prelodr({
                        prefixClass: "prelodr",
                        show: function () { },
                        hide: function () { },
                    });
                    $("body").prelodr("in", "Processing... Please wait...");
                },
                url: "/brand/" + slug,
                success: function (response) {
                    $("#shop_product_section").load("/brand/search/" + slug);
                    $("#brand_product_section").load("/brand/search/" + slug);
                    $("#category_product_section").load(
                        "/brand/search/" + slug
                    );
                    $("body").prelodr("out");
                    window.history.pushState(
                        "brand",
                        "Title",
                        "/brand/" + slug
                    );
                },
            });
        });

        // product show by tags
        $(document).on("click", ".tag_search_btn", function (e) {
            e.preventDefault();
            let slug = $(this).attr("tag_slug");
            let id = $(this).attr("tag_id");
            $(".brand_product_section").load("/tag/search/" + id);
            $(".category_product_section").load("/tag/search/" + id);
            $(".shop_product_section").load("/tag/search/" + id);
            window.history.pushState("brand", "Title", "/tag/" + slug);
        });

        // login modal
        $(document).on("click", ".login_btn", function (e) {
            e.preventDefault();
            $("#login_Modal").modal("show");
        });

        // customer login system
        $(document).on("submit", "#customer_login_form_modal", function (e) {
            e.preventDefault();

            let email = $(
                '#customer_login_form_modal input[name="email"]'
            ).val();
            let password = $(
                '#customer_login_form_modal input[name="password"]'
            ).val();

            if (email == "") {
                $('#customer_login_form_modal input[name="email"]').addClass(
                    "field-validate"
                );
                $(".email-msg").html(
                    fieldRequre(
                        "The email or phone number is requred !",
                        "danger",
                        "0"
                    )
                );
                $(".email-check").html("");
            } else {
                $(".email-msg").html("");
            }
            if (password == "") {
                $('#customer_login_form_modal input[name="password"]').addClass(
                    "field-validate"
                );
                $(".password-msg").html(
                    '<p class="text-danger">The password is requred!</p>'
                );
            } else {
                $(
                    '#customer_login_form_modal input[name="password"]'
                ).removeClass("field-validate");
                $(".password-msg").html("");
            }

            let loginMsg = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Warning !</strong> email or phone or password is not correct
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;

            if (email != "" && password != "") {
                if (
                    validateEmail(email) == false &&
                    validatePhone(email) == false
                ) {
                    $(
                        '#customer_login_form_modal input[name="email"]'
                    ).addClass("field-validate");
                    $(".email-msg").html("");
                    $(".email-check").html(
                        fieldRequre(
                            "The email or phone is not vallid !",
                            "danger",
                            "0"
                        )
                    );
                } else {
                    $(
                        '#customer_login_form_modal input[name="email"]'
                    ).removeClass("field-validate");
                    $(".email-msg").html("");
                    $(".email-check").html("");
                    $.ajax({
                        url: "/customer/login",
                        method: "post",
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            if (response.login == "not") {
                                $(".login_msg").html(loginMsg);
                                $(".email-msg").html("");
                                $(".email-check").html("");
                                $(
                                    '#customer_login_form_modal input[name="email"]'
                                ).removeClass("field-validate");
                            } else {
                                $("#login_Modal").modal("hide");
                                $("#customer_login_form_modal")[0].reset();
                                toastr.success(
                                    "You are logged in as our customer !"
                                );
                                location.reload();
                            }
                        },
                    });
                }
                // Show prelodr
                $("body").prelodr({
                    prefixClass: "prelodr",
                    show: function () { },
                    hide: function () { },
                });
                $("body").prelodr("in", "Checking... Please wait...");
                $("body").prelodr("out", function (done) {
                    setTimeout(function () {
                        done();
                    }, 400);
                });
            }
        });

        // Product review

        // Rating modal
        $(document).on("click", ".pro_review_btn", function (e) {
            e.preventDefault();
            $("#reviewModal").modal("show");
        });

        // Rating select
        $(document).on("click", ".fa-star", function (e) {
            e.preventDefault();
            let rating = $(this).attr("rate");
            $('.product-review-form input[name="rating"]').val(
                parseInt(rating)
            );
        });
        // Rating color
        $(document).on("click mouseover", ".star5", function (e) {
            e.preventDefault();
            $(".star1").addClass("checked");
            $(".star2").addClass("checked");
            $(".star3").addClass("checked");
            $(".star4").addClass("checked");
            $(".star5").addClass("checked");
        });
        $(document).on("click mouseover", ".star4", function (e) {
            e.preventDefault();
            $(".star1").addClass("checked");
            $(".star2").addClass("checked");
            $(".star3").addClass("checked");
            $(".star4").addClass("checked");
            $(".star5").removeClass("checked");
        });
        $(document).on("click mouseover", ".star3", function (e) {
            e.preventDefault();
            $(".star1").addClass("checked");
            $(".star2").addClass("checked");
            $(".star3").addClass("checked");
            $(".star4").removeClass("checked");
            $(".star5").removeClass("checked");
        });
        $(document).on("click mouseover", ".star2", function (e) {
            e.preventDefault();
            $(".star1").addClass("checked");
            $(".star2").addClass("checked");
            $(".star3").removeClass("checked");
            $(".star4").removeClass("checked");
            $(".star5").removeClass("checked");
        });
        $(document).on("click mouseover", ".star1", function (e) {
            e.preventDefault();
            $(".star1").addClass("checked");
            $(".star2").removeClass("checked");
            $(".star3").removeClass("checked");
            $(".star4").removeClass("checked");
            $(".star5").removeClass("checked");
        });

        // create review
        $(document).on("submit", ".product-review-form", function (e) {
            e.preventDefault();
            let rating = $('.product-review-form input[name="rating"]').val();
            let review = $(
                '.product-review-form textarea[name="review"]'
            ).val();

            if (rating == "") {
                $(".rating-msg").html(
                    '<p class="text-danger">Star rating is requred!</p>'
                );
            } else {
                $(".rating-msg").html("");
            }
            if (review == "") {
                $(".review-msg").html(
                    '<p class="text-danger">Review is requred!</p>'
                );
            } else {
                $(".review-msg").html("");
            }

            if (rating != "" && review != "") {
                $.ajax({
                    url: "/product-review-store",
                    method: "post",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        $("#reviewModal").modal("hide");
                        $(".product-review-form")[0].reset();
                        toastr.success("Your review is submitted !");
                    },
                });
            }
        });

        // Password reset system
        //Email form
        $(document).on("submit", ".password_reset_email_form", function (e) {
            e.preventDefault();
            let email = $(
                '.password_reset_email_form input[name="email"]'
            ).val();
            if (email == "") {
                $('.password_reset_email_form input[name="email"]').addClass(
                    "red-color"
                );
                $(".email-msg").html(
                    fieldRequre("The email address is requred !", "danger", "0")
                );
            } else if (validateEmail(email) == false) {
                $('.password_reset_email_form input[name="email"]').addClass(
                    "red-color"
                );
                $(".email-msg").html(
                    fieldRequre(
                        "The email format is not vallid !",
                        "danger",
                        "0"
                    )
                );
            } else {
                $('.password_reset_email_form input[name="email"]').removeClass(
                    "red-color"
                );
                $(".email-msg").html("");
            }

            let msg = `<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Email send successfully !</strong> check your email inbox
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <p>Didn't got an Email? <a href="#" class="resend">Resend</a></p>
                        `;

            if (email != "" && validateEmail(email) != false) {
                $.ajax({
                    beforeSend: function () {
                        $("body").prelodr({
                            prefixClass: "prelodr",
                            show: function () { },
                            hide: function () { },
                        });
                        $("body").prelodr("in", "Sending email... ");
                    },
                    url: "/password/reset",
                    method: "post",
                    contentType: false,
                    processData: false,
                    data: new FormData(this),
                    success: function (response) {
                        if (response.exist == "not") {
                            $(
                                '.password_reset_email_form input[name="email"]'
                            ).addClass("red-color");

                            $(".email-check").html(
                                fieldRequre(
                                    "The email address is not match with our registered user !",
                                    "danger",
                                    "0"
                                )
                            );
                        } else {
                            $(".password_reset_email_form")[0].reset();
                            $(
                                '.password_reset_email_form input[name="email"]'
                            ).addClass("green-color");
                            $(
                                '.password_reset_email_form input[name="email"]'
                            ).removeClass("red-color");
                            $(".email-check").html("");
                            $(".change-pass-content").html(msg);
                        }
                        $("body").prelodr("out");
                    },
                });
            }
        });

        //resend token
        $(document).on("click", ".resend", function (e) {
            e.preventDefault();
            let origin = window.location.origin;
            window.location.replace(origin + "/password/reset");
        });

        //update password
        $(document).on("submit", ".password_reset_update_form", function (e) {
            e.preventDefault();
            let password = $(
                '.password_reset_update_form input[name="password"]'
            ).val();
            let conf_password = $(
                '.password_reset_update_form input[name="conf_password"]'
            ).val();

            if (password == "") {
                $(
                    '.password_reset_update_form input[name="password"]'
                ).addClass("red-color");
                $(".password-conf").html(
                    fieldRequre("The password is requred !", "danger", "0")
                );
            } else if (password) {
            } else {
                $(
                    '.password_reset_update_form input[name="password"]'
                ).removeClass("red-color");
                $(".password-msg").html("");
            }

            if (conf_password == "") {
                $(
                    '.password_reset_update_form input[name="conf_password"]'
                ).addClass("red-color");
                $(".password-msg").html(
                    fieldRequre(
                        "The confirm password is requred !",
                        "danger",
                        "0"
                    )
                );
            } else if (password != conf_password) {
                $(
                    '.password_reset_update_form input[name="conf_password"]'
                ).addClass("red-color");
                $(".password-check").html(
                    fieldRequre(
                        "The password and the confirm password didn't match !",
                        "danger",
                        "0"
                    )
                );
                $(".password-conf").html("");
            } else {
                $(
                    '.password_reset_update_form input[name="conf_password"]'
                ).removeClass("red-color");
                $(".password-conf").html("");
                $(".password-check").html("");
            }

            let msg = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Expired token !</strong> resend email
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <p><a href="#" class="resend">Resend code</a></p>
                        `;
            let msg2 = `<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Your password changed successfully !</strong> please save the password carefully
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

            if (
                password != "" &&
                conf_password == password &&
                conf_password != ""
            ) {
                $.ajax({
                    url: "/password/update",
                    method: "post",
                    contentType: false,
                    processData: false,
                    data: new FormData(this),
                    success: function (response) {
                        if (response.t_valid == "expired") {
                            $(".update-content").html(msg);
                        } else {
                            $(".update-content").html(msg2);
                        }

                        if (response.user == 'admin') {
                            window.location.href = "/admin";
                        } else {
                            $("#login_Modal").modal("show");
                        }


                    },
                });
            }
        });

        //.............
    });
})(jQuery);
