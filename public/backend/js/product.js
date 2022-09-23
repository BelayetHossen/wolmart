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

        // add product  Hot deals
        let hot_deals_date = `<div class="card">
                                    <div class="card-body">
                                        <h4 class="text-success">Select start and end date</h4>
                                        <hr>
                                        <label for="hot" class="">Start date <span style="color:red;">*</span></label><div class=" mb-0">
                                            <input type="date" class="form-control" name="hot[]"
                                                id="hot">
                                        </div>
                                        <label for="hot" class="">End date <span style="color:red;">*</span></label>
                                        <div class=" mb-0">
                                            <input type="date" class="form-control" name="hot[]"
                                                id="hot">
                                        </div>
                                    </div>
                                </div>`;

        $(document).on("change", ".hot_deals_checkbox", function (event) {
            if (event.currentTarget.checked) {
                $("#hot_deals_date").html(hot_deals_date);
            } else {
                $("#hot_deals_date").html("");
            }
        });

        // add product  varient option
        let all_v = `

                <div class="card mb-3">
                    <div class="card-body">

                            <div id="varient_form">
                                <div class="form-group mb-3">
                                    <label for="color">Color <span style="color:red;">*</span></label>
                                    <input id="color" class="form-control" name="color_collect" type="text" placeholder="Ex: S,M,L,XL">
                                </div>
                                <span class="color-msg"></span>
                                <div class="form-group mb-3">
                                    <label for="size">Size <span style="color:red;">*</span></label>
                                    <input name="size_collect" type="text" class="form-control" placeholder="Ex: S,M,L,XL">
                                </div>

                                <button type="button" class="btn btn-sm btn-success varient_collection">Add</button>
                            </div>

                    </div>
                </div>
                    `;

        $(document).on("change", ".varient_product_checkbox", function (event) {
            if (event.currentTarget.checked) {
                $("#varient_product_option").html(all_v);
            } else {
                $("#varient_product_option").html("");
            }
        });

        // final collection
        $(document).on("click", ".varient_collection", function (event) {
            event.preventDefault();
            let color = $('#varient_form input[name="color_collect"]').val();
            let size = $('#varient_form input[name="size_collect"]').val();
            let v_p_collected = `<div class="card">
                                    <div class="card-body">
                                        <div class="varient row">
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label>Color :</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <p>${color}</p>
                                                    </div>
                                                </div>
                                                <input name="color[]" type="hidden" value="${color}">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                    <label>Size :</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                    <p>${size}</p>
                                                    </div>
                                                </div>
                                                <input name="size[]" type="hidden" value="${size}">
                                            </div>
                                            <div class="col-sm-2">
                                                <a href="#" class="" style="font-size: 20px; color:red; border:1px solid red; padding: 1px 5px; float: right;">&times;</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
            $("#varient_product_option_collected").append(v_p_collected);
        });

        // Product upload
        $(document).on("submit", "#product_add_form", function (e) {
            e.preventDefault();

            let title = $('#product_add_form input[name="title"]').val();
            let long_desc = $(
                '#product_add_form textarea[name="long_desc"]'
            ).val();
            let short_desc = $(
                '#product_add_form textarea[name="short_desc"]'
            ).val();
            let tags = $('#product_add_form select[name="tags"]').val();
            let main_cat_id = $(
                '#product_add_form select[name="main_cat_id"]'
            ).val();
            let product_brand = $(
                '#product_add_form select[name="product_brand"]'
            ).val();
            let price = $('#product_add_form input[name="price"]').val();
            let image = $('#product_add_form input[name="image"]').val();

            if (title == "") {
                $(".title-msg").html(
                    fieldRequre("Product title is requred !", "danger")
                );
            } else {
                $(".title-msg").html("");
            }

            if (main_cat_id == "") {
                $(".main-cat-msg").html(
                    fieldRequre("Product main category is requred !", "danger")
                );
            } else {
                $(".main-cat-msg").html("");
            }

            if (product_brand == "") {
                $(".brand-msg").html(
                    fieldRequre("Product brand is requred !", "danger")
                );
            } else {
                $(".brand-msg").html("");
            }

            if (image != "") {
                $.ajax({
                    url: "/product/store",
                    method: "post",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.title_check == "exist") {
                            $(".title-check-msg").html(
                                fieldRequre(
                                    "Product title is already exist !",
                                    "danger",
                                    "-15px"
                                )
                            );
                        } else {
                            $(".title-check-msg").html("");
                            $("#product_add_form")[0].reset();
                            function successAlert() {
                                Swal.fire({
                                    position: "top-end",
                                    type: "success",
                                    title: "A new product added successfully !",
                                    showConfirmButton: !1,
                                    timer: 3000,
                                });
                            }
                            successAlert();
                            window.location.href = "/products";
                        }
                    },
                });
            }
        });

        /*
        |--------------------------------------------------------------------------
        | Product photo
        |--------------------------------------------------------------------------
        */
        $(document).on("mouseover", ".img-show", function () {
            $(this).children().children().addClass("show-hide");
        });
        $(document).on("mouseout", ".img-show", function () {
            $(this).children().children().removeClass("show-hide");
        });

        $(document).on("click", ".old_photo_remove", function (e) {
            e.preventDefault();

            let old_name = this.getAttribute("old_name");
            let id = this.getAttribute("product_id");

            $.ajax({
                url: "/product-img-delete/" + id + "/" + old_name,
                success: function (data) {
                    function successAlert() {
                        Swal.fire({
                            position: "top-end",
                            type: "success",
                            title: data,
                            showConfirmButton: !1,
                            timer: 500,
                        });
                    }
                    successAlert();
                },
            });

            this.closest(".img-show").remove();
        });

        /*
        |--------------------------------------------------------------------------
        | Product status change system
        |--------------------------------------------------------------------------
        */
        $(document).on("change", "#product_status_btn", function (e) {
            let id = $(this).val();
            $.ajax({
                url: "/product/status/" + id,
                success: function (data) {
                    $("#products_table").DataTable().ajax.reload();
                    function successAlert() {
                        Swal.fire({
                            position: "top-end",
                            type: "success",
                            title: "Product status change successfully !",
                            showConfirmButton: !1,
                            timer: 3000,
                        });
                    }
                    successAlert();
                },
            });
        });
    });
})(jQuery);
