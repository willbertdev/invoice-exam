$(function() {
    const URLS = {
        addProduct : '/invoice/add-product',
        addInvoice : '/invoice/add-invoice'
    };

    $(document).on('click', '.delete-row', function(e) {
        $(this).parent().parent().remove();
    });

    $(document).on('change', 'input#qty', function(e) {
        var price = $(this).data('price');
        var val = $(this).val();
        var max = $(this).attr('max');
        var total = parseFloat(price) * parseFloat(val);

        if (parseInt(val) > parseInt(max)) {
            window.system.toast(false, "The maximum value for this product is " + max);
            $(this).val(max);
            total = parseFloat(price) * parseFloat(max);
        }

        $(this).parent().parent().find('td#total').html(`$${total}`);
    });
    
    $(document).on('click', '#checkout', function(e){
        var customer = $('select#customerSel');
        var items = $('#addInvoice tbody tr');
        var products = [];

        if (items.length == 0) {
            window.system.toast(false, "Please add product first.");
        } else if (customer.val() == "") {
            customer.addClass('border-danger');
        } else {

            items.each(function(i, val) {
                var total = $(val).find('td#total').html();
                total = Number(total.replace(/[^0-9\.]+/g,""));

                var data = {
                    product_id: $(val).data('id'),
                    qty: $(val).find('input#qty').val(),
                    total: total
                };
                products.push(data);
            });

            $.ajax({
                url : URLS.addInvoice,
                type: 'post',
                data: {
                    products: JSON.stringify(products),
                    note: $('#note').val(),
                    customer: customer.val()
                },
                dataType: 'JSON',
                success: function(res) {
                    window.system.toast(res.success, res.message);
                    if (res.success) {
                        customer.val("");
                        $('#addInvoice tbody').html('');
                        $('#note').val('')
                    }
                }
            });
        }


    });

    $(document).on('change', '#productSel', function(e){
        $.ajax({
            url : URLS.addProduct,
            type: 'post',
            data: {
                id: $(this).val()
            },
            dataType: 'JSON',
            success: function(res) {
                if (res.success) {
                    if ($(`tbody tr[data-id='${res.product.id}']`).length > 0) {
                        window.system.toast(false, "The product you've been selected is already added");
                    } else {
                        $('table#addInvoice tbody').append(res.html);
                    }
                    $('#products-modal').modal('hide');
                }
            }
        });
    });
});