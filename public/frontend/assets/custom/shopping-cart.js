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
        // all mini cart function
        function allCart() {
            $.ajax({
                url: "/product/cart/allAjax",
                success: function (response) {
                    $(".cart-count").html(response.cart_count);
                    $(".mini-cart-content").html(response.mini_content);
                },
            });
        }
        allCart();
        // all cart in cart page function
        function allCartPage() {
            $.ajax({
                url: "/product/cart/allAjaxPage",
                success: function (response) {
                    $(".cart-count").html(response.cart_count);
                    $(".cart_list").html(response.cart_list);
                    $(".cart_sub_total").html("৳ " + response.cart_sub_total);
                },
            });
        }
        allCartPage();

        // update cart qty and price
        $(document).on("click", ".cart_update_btn", function (e) {
            e.preventDefault();
            let qty = $(this)
                .parent()
                .children('input[name="product_qty"]')
                .val();
            let rowId = $(this).parent().children('input[name="rowId"]').val();
            let shi_price = $(".shi_price").val();

            $.ajax({
                beforeSend: function () {
                    $("body").prelodr({
                        prefixClass: "prelodr",
                        show: function () {},
                        hide: function () {},
                    });
                    $("body").prelodr("in", "Updating product quantity... ");
                },
                url:
                    "/product/cart/update/" +
                    rowId +
                    "/" +
                    qty +
                    "/" +
                    shi_price,
                success: function (response) {
                    allCart();
                    allCartPage();
                    $(".cart_sub_total").html("৳ " + response.cart_sub_total);
                    $(".total_price").html("৳ " + response.price + ".00");
                    $("body").prelodr("out");
                    toastr.success("The product quantity updated successfully");
                    $(".shipping_price").html("৳ " + response.price);
                },
            });
        });

        // remove cart system
        $(document).on("click", ".cart_remove_btn", function (e) {
            e.preventDefault();
            let rowId = $(this).attr("cart_remove_id");
            $.ajax({
                beforeSend: function () {
                    $("body").prelodr({
                        prefixClass: "prelodr",
                        show: function () {},
                        hide: function () {},
                    });
                    $("body").prelodr("in", "Removing from cart... ");
                },
                url: "/product/cart/remove/" + rowId,
                success: function (response) {
                    allCart();
                    allCartPage();
                    $("body").prelodr("out");
                },
            });
        });

        // update total calculation by shipping method & address
        $(document).on("submit", "#update_total_form", function (e) {
            e.preventDefault();
            let shipping = $('#update_total_form input[name="shipping_id"]');
            let region = $('#update_total_form select[name="region"]').val();

            if (shipping.is(":checked")) {
                $(".shipping-msg").html("");
            } else {
                $(".shipping-msg").html(
                    fieldRequre("Select a shipping method !", "danger", "0")
                );
            }

            if (region == "") {
                $(".region-msg").html(
                    fieldRequre("Select shipping region !", "danger", "0")
                );
            } else {
                $(".region-msg").html("");
            }
            if (shipping.is(":checked") && region != "") {
                $.ajax({
                    beforeSend: function () {
                        $("body").prelodr({
                            prefixClass: "prelodr",
                            show: function () {},
                            hide: function () {},
                        });
                        $("body").prelodr("in", "Updating... ");
                    },
                    url: "/product/cart/shipping/price/update/",
                    method: "post",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        $(".shipping_fee").html(`<label>Shipping fee</label>
                            <span class="ls-50">+ ৳ ${response.shipping_price}.00</span>`);
                        $(".total_price").html(
                            "৳ " + response.total_price + "." + "00"
                        );
                        $(".cart_sub_total").val(response.sub_total);
                        $(".shipping_price").val(response.shipping_price);
                        $(".shi_price").val(response.shipping_price);
                        toastr.success(
                            "Shipping method & location added successfully"
                        );
                        $("body").prelodr("out");
                    },
                });
            }
        });

        // coupon apply for customer
        $(document).on("submit", "#coupon_form", function (e) {
            e.preventDefault();
            let coupon = $('#coupon_form input[name="coupon"]').val();
            if (coupon == "") {
                $(".coupon-msg").html(fieldRequre("Put a coupon !", "danger"));
            } else {
                $(".coupon-msg").html("");
                $.ajax({
                    beforeSend: function () {
                        $("body").prelodr({
                            prefixClass: "prelodr",
                            show: function () {},
                            hide: function () {},
                        });
                        $("body").prelodr("in", "Applying coupon... ");
                    },
                    url: "/product/cart/coupon/price/update",
                    method: "post",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.coupon == "invallid") {
                            $(".coupon-msg").html(
                                fieldRequre("Invallid coupon !", "danger")
                            );
                        } else {
                            $(".coupon-msg").html("");
                            toastr.options.positionClass = "toast-bottom-left";
                            toastr.success("Calculation updated successfully");
                        }
                        $("body").prelodr("out");
                    },
                });
            }
        });
        // proceed to ckeckout
        $(document).on("click", ".btn-checkout", function (e) {
            e.preventDefault();
            let shipping_price = $(".shi_price").val();
            if (shipping_price == "00") {
                $(".alt-msg").html(
                    `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>You have to set shipping method first!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>`
                );
            } else {
                $(".alt-msg").html("");
                window.location.href = "/product/checkout";
            }
        });

        // 
















        //.............
    });
})(jQuery);

(function (t) {
    var e = {
        init: function () {
            var e;
            Wolmart.call(Wolmart.ratingTooltip, 500),
                Wolmart.call(Wolmart.setProgressBar(".progress-bar"), 500),
                this.initVariation(),
                this.initProductsScrollLoad(".scroll-load"),
                Wolmart.$body
                    .on("mousedown", ".select-menu", function (e) {
                        var i = t(e.currentTarget),
                            a = t(e.target),
                            n = i.hasClass("opened");
                        t(".select-menu").removeClass("opened"),
                            i.is(a.parent())
                                ? (!n && i.addClass("opened"),
                                  e.stopPropagation())
                                : (a.parent().toggleClass("active"),
                                  a.parent().hasClass("active")
                                      ? (t(".selected-items").children()
                                            .length < 2 &&
                                            t(".selected-items").show(),
                                        t(
                                            '<a href="#" class="selected-item">' +
                                                a.text().split("(")[0] +
                                                '<i class="w-icon-times-solid"></i></a>'
                                        )
                                            .insertBefore(
                                                ".selected-items .filter-clean"
                                            )
                                            .hide()
                                            .fadeIn()
                                            .data("link", a.parent()))
                                      : t(".selected-items > .selected-item")
                                            .filter(function (t, e) {
                                                return (
                                                    e.innerText ==
                                                    a.text().split("(")[0]
                                                );
                                            })
                                            .fadeOut(function () {
                                                t(this).remove(),
                                                    t(
                                                        ".selected-items"
                                                    ).children().length < 2 &&
                                                        t(
                                                            ".selected-items"
                                                        ).hide();
                                            }));
                    })
                    .on("click", ".selected-item", function (e) {
                        var i = t(this),
                            a = i.data("link");
                        a &&
                            a.removeClass("active").fadeOut(function () {
                                i.remove();
                            }),
                            e.preventDefault();
                    }),
                t(".selected-items .filter-clean").on("click", function (e) {
                    var i = t(this);
                    i.siblings().each(function () {
                        var e = t(this).data("link");
                        e && e.removeClass("active");
                    }),
                        i.parent().fadeOut(function () {
                            i.siblings().remove();
                        }),
                        e.preventDefault();
                }),
                t(".filter-clean").on("click", function (e) {
                    t(".shop-sidebar .filter-items .active").removeClass(
                        "active"
                    ),
                        e.preventDefault();
                }),
                Wolmart.$body.on("click", ".select-menu a", function (t) {
                    t.preventDefault();
                }),
                Wolmart.$body.on("click", ".selected-item i", function (e) {
                    t(e.currentTarget)
                        .parent()
                        .fadeOut(function () {
                            var e = t(this),
                                i = e.data("link");
                            i && i.toggleClass("active"),
                                e.remove(),
                                t(".select-items").children().length < 2 &&
                                    t(".select-items").hide();
                        }),
                        e.preventDefault();
                }),
                Wolmart.$body.on("mousedown", function (e) {
                    t(".select-menu").removeClass("opened");
                }),
                Wolmart.$body.on("click", ".filter-items a", function (e) {
                    var i = t(this).closest(".filter-items");
                    i.hasClass("search-ul") ||
                        i.parent().hasClass("select-menu") ||
                        (t(this).parent().toggleClass("active"),
                        e.preventDefault());
                }),
                // add to cart system
                Wolmart.$body.on("submit", "#add_to_cart", function (e) {
                    e.preventDefault();

                    $.ajax({
                        beforeSend: function () {
                            $("body").prelodr({
                                prefixClass: "prelodr",
                                show: function () {},
                                hide: function () {},
                            });
                            $("body").prelodr("in", "Adding to your cart... ");
                        },
                        url: "/product/cart/add",
                        method: "post",
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            $("body").prelodr("out");
                            toastr.options.positionClass = "toast-bottom-left";
                            toastr.success(
                                "A new product added to cart successfully"
                            );
                            $.ajax({
                                url: "/product/cart/allAjax",
                                success: function (response) {
                                    $(".cart-count").html(response.cart_count);
                                    $(".mini-cart-content").html(
                                        response.mini_content
                                    );
                                },
                            });
                            $(".cart-dropdown").addClass("opened");
                        },
                    });
                }),
                Wolmart.$body.on(
                    "click",
                    ".product:not(.product-single) .btn-wishlist",
                    function (e) {
                        e.preventDefault();
                        var i = t(this);
                        i
                            .toggleClass("added")
                            .addClass("load-more-overlay loading"),
                            setTimeout(function () {
                                i.removeClass("load-more-overlay loading"),
                                    i
                                        .toggleClass("w-icon-heart")
                                        .toggleClass("w-icon-heart-full");
                            }, 500);
                    }
                ),
                (e = t(".product-popup")).length &&
                    Wolmart.$body.on("click", ".btn-quickview", function (i) {
                        i.preventDefault(),
                            Wolmart.popup(
                                {
                                    items: {
                                        src: e[0].outerHTML,
                                    },
                                    callbacks: {
                                        open: function () {
                                            Wolmart.productSingle(
                                                t(
                                                    ".mfp-product .product-single"
                                                )
                                            );
                                        },
                                        close: function () {
                                            t(".mfp-product .swiper-container")
                                                .data("slider")
                                                .destroy();
                                        },
                                    },
                                },
                                "quickview"
                            );
                    }),
                (function () {
                    var e,
                        i = [],
                        a = t(".page-wrapper > .compare-popup");

                    function n() {
                        a
                            .find(".title")
                            .after(
                                '<p class="compare-count text-center text-light mb-0">(' +
                                    e +
                                    " Products)</p>"
                            ),
                            a.find(".compare-count").length > 1 &&
                                a.find("p:last-child").remove();
                    }
                    a.length ||
                        document.body.classList.contains("docs") ||
                        (t(".page-wrapper").append(
                            '<div class="compare-popup">                    <div class="container">                        <div class="compare-title">                            <h4 class="title title-center">Compare Products</h4>                        </div>                        <ul class="compare-product-list list-style-none">                            <li></li><li></li><li></li><li></li>                        </ul>                        <a href="#" class="btn btn-clean">Clean All</a>                        <a href="compare.html" class="btn btn-dark btn-rounded">Start Compare !</a>                    </div>                </div>                <div class="compare-popup-overlay">                </div>'
                        ),
                        (a = t(".page-wrapper > .compare-popup"))),
                        Wolmart.$body
                            .on("click", ".product .btn-compare", function (o) {
                                var s = t(this);
                                s.hasClass("added") && returne(),
                                    o.preventDefault(),
                                    s
                                        .toggleClass("added")
                                        .addClass("load-more-overlay loading"),
                                    setTimeout(function () {
                                        s.removeClass(
                                            "load-more-overlay loading"
                                        ),
                                            s
                                                .toggleClass("w-icon-compare")
                                                .toggleClass(
                                                    "w-icon-check-solid"
                                                ),
                                            s.attr("href", "compare.html"),
                                            a.addClass("show");
                                    }, 500);
                                var r = s
                                    .closest(".product")
                                    .find("img")
                                    .eq(0)
                                    .attr("src");
                                i.length >= 4 && i.shift(),
                                    i.push(r),
                                    t(".compare-popup li").each(function (t) {
                                        i[t] &&
                                            (this.innerHTML =
                                                '<a href="product-default.html"><figure><img src="' +
                                                i[t] +
                                                '"/></figure></a>                                        <a href="#" class="btn btn-remove"><i class="w-icon-times-solid"></i></a>');
                                    }),
                                    (e = i.length),
                                    n();
                            })
                            .on(
                                "click",
                                ".compare-popup .btn-remove",
                                function (a) {
                                    a.preventDefault();
                                    var o = t(a.currentTarget).closest("li"),
                                        s = o.index(),
                                        r = o.find("img").attr("src");
                                    r &&
                                        t(".page-wrapper .product img").each(
                                            function () {
                                                if (
                                                    this.getAttribute("src") ==
                                                    r
                                                ) {
                                                    var e = t(this)
                                                        .closest(".product")
                                                        .find(".btn-compare");
                                                    e.length &&
                                                        (e
                                                            .removeClass(
                                                                "added"
                                                            )
                                                            .attr("href", "#"),
                                                        e
                                                            .toggleClass(
                                                                "w-icon-check-solid"
                                                            )
                                                            .toggleClass(
                                                                "w-icon-compare"
                                                            ));
                                                }
                                            }
                                        ),
                                        i.splice(s, 1),
                                        3 == s && o.empty(),
                                        o
                                            .nextAll()
                                            .each(function () {
                                                t(this)
                                                    .prev()
                                                    .html(t(this).html());
                                            })
                                            .last()
                                            .empty(),
                                        (e = i.length),
                                        n();
                                }
                            )
                            .on(
                                "click",
                                ".compare-popup .btn-clean",
                                function (a) {
                                    a.preventDefault(),
                                        t(".page-wrapper .product img").each(
                                            function () {
                                                var e = t(this),
                                                    a =
                                                        this.getAttribute(
                                                            "src"
                                                        );
                                                i.forEach(function (t) {
                                                    if (a == t) {
                                                        var i = e
                                                            .closest(".product")
                                                            .find(
                                                                ".btn-compare"
                                                            );
                                                        i.length &&
                                                            (i
                                                                .removeClass(
                                                                    "added"
                                                                )
                                                                .attr(
                                                                    "href",
                                                                    "#"
                                                                ),
                                                            i
                                                                .toggleClass(
                                                                    "w-icon-check-solid"
                                                                )
                                                                .toggleClass(
                                                                    "w-icon-compare"
                                                                ));
                                                    }
                                                });
                                            }
                                        ),
                                        i.splice(0, 4),
                                        (e = i.length),
                                        t(this)
                                            .parent()
                                            .find(".compare-product-list li")
                                            .empty(),
                                        n();
                                }
                            ),
                        Wolmart.$body.on(
                            "click",
                            ".compare-popup-overlay",
                            function () {
                                a.removeClass("show");
                            }
                        );
                })(),
                Wolmart.priceSlider(".filter-price-slider");
        },
        initVariation: function (e) {
            t(".product:not(.product-single) .product-variations > a").on(
                "click",
                function (e) {
                    var i = t(this),
                        a = i.closest(".product").find(".product-media img");
                    a.data("image-src") || a.data("image-src", a.attr("src")),
                        i
                            .toggleClass("active")
                            .siblings()
                            .removeClass("active"),
                        i.hasClass("active")
                            ? a.attr("src", i.data("src"))
                            : (a.attr("src", a.data("image-src")), i.blur()),
                        e.preventDefault();
                }
            );
        },
        initProductsScrollLoad: function (e) {
            var i,
                a = Wolmart.$(e),
                n = t(e).data("url");
            n || (n = "assets/ajax/products.html");
            var o = function (e) {
                window.pageYOffset >
                    i + a.outerHeight() - window.innerHeight - 150 &&
                    "loading" != a.data("load-state") &&
                    t.ajax({
                        url: n,
                        success: function (e) {
                            var i = t(e);
                            a.data("load-state", "loading"),
                                a.next().hasClass("load-more-overlay")
                                    ? a.next().addClass("loading")
                                    : t(
                                          '<div class="mt-4 mb-4 load-more-overlay loading"></div>'
                                      ).insertAfter(a),
                                setTimeout(function () {
                                    a.next().removeClass("loading"),
                                        a.append(i),
                                        setTimeout(function () {
                                            a.find(
                                                ".product-wrap.fade:not(.in)"
                                            ).addClass("in");
                                        }, 200),
                                        a.data("load-state", "loaded"),
                                        Wolmart.countDown(
                                            i.find(".product-countdown")
                                        );
                                }, 500);
                            var n = parseInt(
                                a.data("load-count") ? a.data("load-count") : 0
                            );
                            a.data("load-count", ++n),
                                n > 2 &&
                                    window.removeEventListener("scroll", o, {
                                        passive: !0,
                                    });
                        },
                        failure: function () {
                            $this.text("Sorry something went wrong.");
                        },
                    });
            };
            a.length > 0 &&
                ((i = a.offset().top),
                window.addEventListener("scroll", o, {
                    passive: !0,
                }));
        },
    };
    Wolmart.shop = e;
})(jQuery);
