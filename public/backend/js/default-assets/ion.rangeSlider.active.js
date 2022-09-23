(function ($) {
    "use strict";

    $("#js-range-slider").ionRangeSlider({
        type: "double",
        min: 0,
        max: 1000,
        from: 200,
        to: 500,
        grid: true
    });

    $("#demo_1").ionRangeSlider({
        type: "double",
        grid: true,
        min: 0,
        max: 1000,
        from: 200,
        to: 800,
        prefix: "$"
    });

    $("#demo_2").ionRangeSlider({
        type: "double",
        grid: true,
        min: -1000,
        max: 1000,
        from: -500,
        to: 500
    });

    $("#demo_3").ionRangeSlider({
        type: "double",
        grid: true,
        min: -1000,
        max: 1000,
        from: -500,
        to: 500,
        step: 250
    });

    $("#demo_4").ionRangeSlider({
        type: "double",
        grid: true,
        min: -12.8,
        max: 12.8,
        from: -3.2,
        to: 3.2,
        step: 0.1
    });


    var custom_values = [0, 10, 100, 1000, 10000, 100000, 1000000];

    // be careful! FROM and TO should be index of values array
    var my_from = custom_values.indexOf(10);
    var my_to = custom_values.indexOf(10000);

    $("#demo_5").ionRangeSlider({
        type: "double",
        grid: true,
        from: my_from,
        to: my_to,
        values: custom_values
    });

    $("#demo_6").ionRangeSlider({
        grid: true,
        from: new Date().getMonth(),
        values: [
            "Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ]
    });

    $("#demo_7").ionRangeSlider({
        skin: "big",
        grid: true,
        min: 1000,
        max: 1000000,
        from: 100000,
        step: 1000,
        prettify_enabled: true,
        prettify_separator: ","
    });

    function my_prettify(n) {
        var num = Math.log2(n);
        return n + " → " + (+num.toFixed(3));
    }

    $("#demo_8").ionRangeSlider({
        skin: "big",
        grid: true,
        min: 1,
        max: 1000,
        from: 100,
        prettify: my_prettify
    });

    $("#demo_9").ionRangeSlider({
        grid: true,
        min: 0,
        max: 100,
        from: 50,
        step: 5,
        max_postfix: "+",
        prefix: "$",
        // postfix: " €/ ₽",
    });

    $("#demo_10").ionRangeSlider({
        skin: "round",
        grid: true,
        min: 0,
        max: 100,
        from: 21,
        max_postfix: "+",
        prefix: "Age: ",
        postfix: " years"
    });

    $(".js-range-slider-1").ionRangeSlider({
        skin: "modern"
    });

    $(".js-range-slider-2").ionRangeSlider({
        skin: "sharp"
    });

    $(".js-range-slider-3").ionRangeSlider({
        skin: "round"
    });

    $(".js-range-slider-4").ionRangeSlider({
        skin: "square"
    });




})(jQuery);