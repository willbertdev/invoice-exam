<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body" dir="ltr">
                <div class="card-widgets">
                    <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                    <a data-toggle="collapse" href="#cardCollpase2" role="button" aria-expanded="false" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                    <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                </div>
                <h4 class="header-title mb-0">Income Amounts</h4>

                <div id="cardCollpase2" class="collapse pt-3 show">
                    <div class="text-center">
                        <div class="row mt-2">
                            <div class="col-4">
                                <h3>$<span data-plugin="counterup"><?= $sales['day']['total'] ?></span></h3>
                                <p class="text-muted font-13 mb-0 text-truncate">Daily Sales</p>
                            </div>
                            <div class="col-4">
                                <h3>$<span data-plugin="counterup"><?= $sales['month']['total'] ?></span></h3>
                                <p class="text-muted font-13 mb-0 text-truncate">Monthly Sales</p>
                            </div>
                            <div class="col-4">
                                <h3>$<span data-plugin="counterup"><?= $sales['year']['total'] ?></span></h3>
                                <p class="text-muted font-13 mb-0 text-truncate">Yearly Sales</p>
                            </div>
                        </div> <!-- end row -->

                        <div id="income-amounts-test" data-colors="#f35d5d,#e3eaef" style="height: 270px;" class="morris-chart mt-3"></div>

                    </div>
                </div> <!-- end collapse-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<!-- end row -->

<div class="row">
    <div class="col-md-12">
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
                            <td><?= dateFormat($invoice['invoice_date']) ?></td>
                            <td>$<?= $invoice['total'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div> <!-- end table-responsive -->

        </div> <!-- end card-box-->
    </div> <!-- end col-->
</div>