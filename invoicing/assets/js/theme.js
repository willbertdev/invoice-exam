$(function() {
    window.system = {
        toast: function(success, message) {
            var icon = success ? 'success' : 'error';

            return $.toast({
                text: message,
                position: 'top-right',
                icon: icon,
                allowToastClose: false,
                stack: false
            });
        },
        createAreaChartDotted: function(a, t, e, o, r, i, s, l, n, c) {
            return Morris.Area({
                element: a,
                pointSize: 3,
                lineWidth: 1,
                data: o,
                xkey: r,
                ykeys: i,
                labels: s,
                dataLabels: !1,
                hideHover: "auto",
                pointFillColors: l,
                pointStrokeColors: n,
                resize: !0,
                smooth: !1,
                gridLineColor: "rgba(65, 80, 95, 0.07)",
                lineColors: c
            })
        }
    }
});