$(function(){
    const URLS = {
        login : '/login-verify',
    };

    $(document).on('submit', 'form#login', function(e) {
        e.preventDefault();
        var data = $(this).serialize();

        $.ajax({
            url : URLS.login,
            type: 'post',
            data: data,
            dataType: 'JSON',
            success: function(res) {
                window.system.toast(res.success, res.message);

                if (res.success) {
                    setTimeout(function() {
                        window.location = "/dashboard";
                    }, 1000);
                }
            }
        });
    });
});