<div class="row">
    <div class="col-xl-6">
        <div class="card-box">
            <h4 class="header-title mb-3">Invoice Records</h4>

            <div class="table-responsive">
                <table class="table table-centered table-hover mb-0">
                    <thead>
                        <tr>
                            <th class="border-top-0">Name</th>
                            <th class="border-top-0">Invoice ID</th>
                            <th class="border-top-0">Date</th>
                            <th class="border-top-0">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($invoices as $invoice) : ?>
                        <tr>
                            <td>
                                <span class="ml-2"><?= $invoice['name'] ?></span>
                            </td>
                            <td>
                                <span class="ml-2"><?= $invoice['invoice_id'] ?></span>
                            </td>
                            <td><?= dateFormat($invoice['created_at']) ?></td>
                            <td>$<?= $invoice['total'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div> <!-- end table-responsive -->

        </div> <!-- end card-box-->
    </div> <!-- end col-->
    <div class="col-xl-6">
        <div class="card-box">
            <h4 class="header-title mb-3">Products</h4>

            <div class="table-responsive">
                <table class="table table-centered table-hover mb-0">
                    <thead>
                        <tr>
                            <th class="border-top-0">Product</th>
                            <th class="border-top-0">Qty</th>
                            <th class="border-top-0">Added Date</th>
                            <th class="border-top-0">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($products as $product): ?>
                            <tr>
                                <td>
                                    <span class="ml-2"><?= $product['product_name'] ?></span>
                                </td>
                                <td>
                                    <?= $product['total_qty'] ? $product['total_qty'] : $product['quantity']  ?>
                                </td>
                                <td><?= dateFormat($product['created_at']) ?></td>
                                <td>$<?= $product['price'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div> <!-- end table-responsive -->
        </div> <!-- end card-box-->
    </div> <!-- end col-->
</div>