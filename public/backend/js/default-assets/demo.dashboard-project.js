! function (o) {
    "use strict";
    var t = function () {
        this.$body = o("body"), this.charts = []
    };
    t.prototype.respChart = function (r, a, n, e) {
        Chart.defaults.global.defaultFontColor = "#8391a2", Chart.defaults.scale.gridLines.color = "#8391a2";
        var i = r.get(0).getContext("2d"),
            s = o(r).parent();
        return function () {
            var t;
            switch (r.attr("width", o(s).width()), a) {
                case "Line":
                    t = new Chart(i, {
                        type: "line",
                        data: n,
                        options: e
                    });
                    break;
                case "Doughnut":
                    t = new Chart(i, {
                        type: "doughnut",
                        data: n,
                        options: e
                    })
            }
            return t
        }()
    }, t.prototype.initCharts = function () {
        var t = [];
        if (0 < o("#task-area-chart").length) {
            t.push(this.respChart(o("#task-area-chart"), "Line", {
                labels: ["Order 1", "Order 2", "Order 3", "Order 4", "Order 5", "Order 6", "Order 7", "Order 8", "Order 9", "Order 10", "Order 11", "Order 12", "Order 13", "Order 14", "Order 15", "Order 16", "Order 17", "Order 18", "Order 19", "Order 20", "Order 21", "Order 22", "Order 23", "Order 24"],
                datasets: [{
                    label: "This year",
                    backgroundColor: "rgba(114, 124, 245, 0.3)",
                    borderColor: "#248afd",
                    data: [16, 44, 32, 48, 72, 60, 84, 64, 78, 50, 68, 34, 26, 44, 32, 48, 72, 60, 74, 52, 62, 50, 32, 22]
                }]
            }, {
                maintainAspectRatio: !1,
                legend: {
                    display: !1
                },
                tooltips: {
                    intersect: !1
                },
                hover: {
                    intersect: !0
                },
                plugins: {
                    filler: {
                        propagate: !1
                    }
                },
                scales: {
                    xAxes: [{
                        reverse: !0,
                        gridLines: {
                            color: "rgba(0,0,0,0.05)"
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            stepSize: 10,
                            display: !1
                        },
                        min: 10,
                        max: 100,
                        display: !0,
                        borderDash: [5, 5],
                        gridLines: {
                            color: "rgba(0,0,0,0)",
                            fontColor: "#fff"
                        }
                    }]
                }
            }))
        }
        if (0 < o("#project-status-chart").length) {
            t.push(this.respChart(o("#project-status-chart"), "Doughnut", {
                labels: ["Completed", "In-progress", "Behind"],
                datasets: [{
                    data: [64, 26, 10],
                    backgroundColor: ["#0acf97", "#248afd", "#fa5c7c"],
                    borderColor: "transparent",
                    borderWidth: "3"
                }]
            }, {
                maintainAspectRatio: !1,
                cutoutPercentage: 80,
                legend: {
                    display: !1
                }
            }))
        }
        return t
    }, t.prototype.init = function () {
        var r = this;
        Chart.defaults.global.defaultFontFamily = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif', r.charts = this.initCharts(), o(window).on("resize", function (t) {
            o.each(r.charts, function (t, r) {
                try {
                    r.destroy()
                } catch (t) {}
            }), r.charts = r.initCharts()
        })
    }, o.ChartJs = new t, o.ChartJs.Constructor = t
}(window.jQuery),
function (t) {
    "use strict";
    window.jQuery.ChartJs.init()
}();