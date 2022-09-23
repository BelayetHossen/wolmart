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
        // review table
        let t = $("#review_table").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/products/review/all",
            },
            columnDefs: [
                {
                    targets: 0,
                },
            ],
            order: [[1, "asc"]],
            columns: [
                {
                    data: "id",
                    name: "id",
                },
                {
                    data: "review",
                    name: "review",
                },
                {
                    data: "rating",
                    name: "rating",
                },
                {
                    data: "by",
                    name: "by",
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
        t.on("order.dt search.dt", function () {
            let i = 1;

            t.cells(null, 0, { search: "applied", order: "applied" }).every(
                function (cell) {
                    this.data(i++);
                }
            );
        }).draw();

        // review edit
        $(document).on("click", ".review_edit_btn", function (e) {
            e.preventDefault();
            let id = $(this).attr("review_edit_id");
            $.ajax({
                url: "/products/review/edit/" + id,
                success: function (response) {
                    $("#review_edit_form input[name='review']").val(
                        response.data.review
                    );
                    $(".p_product").html(response.product);
                    $(".p_rating").html(response.rating);
                    $(".p_review").html(response.review);
                    $("#review_edit_modal").modal("show");
                    console.log(response.product);
                },
            });
        });
        // Review update
        $(document).on("submit", "#review_edit_form", function (e) {
            e.preventDefault();
            let review = $('#review_edit_form input[name="review"]').val();
            let rating = $('#review_edit_form select[name="rating"]').val();
            let status = $('#review_edit_form select[name="status"]').val();
            if (review == "") {
                $(".review-msg").html(
                    fieldRequre("Review is requred !", "danger", "0")
                );
            } else {
                $(".review-msg").html("");
            }
            if (rating == "") {
                $(".rating-msg").html(
                    fieldRequre("Rating is requred !", "danger", "0")
                );
            } else {
                $(".rating-msg").html("");
            }
        });

        //
    });
})(jQuery);
