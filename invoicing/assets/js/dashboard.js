$(function() {
    const URLS = {
        getSales : '/dashboard/get-sales'
    };

    $.ajax({
        url : URLS.getSales,
        type: 'GET',
        dataType: 'JSON',
        success: function(res) {
            var a = ["#4a81d4"];
            window.system.createAreaChartDotted("income-amounts-test", 0, 0, res, "y", ["a"], ["Sales"], ["#ffffff"], ["#999999"], a);
        }
    });

    
});