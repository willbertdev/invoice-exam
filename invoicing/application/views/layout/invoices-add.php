<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group col-md-3 mb-3 pl-0">
                            <label for="customerSel" class="col-form-label">Customers</label>
                            <select id="customerSel" class="form-control">
                                <option value="">Choose</option>
                                <?php foreach($customers as $customer) : ?>
                                    <option value="<?= $customer['id'] ?>"><?= $customer['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="table-responsive">
                            <table id="addInvoice" class="table table-borderless table-centered mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th style="width: 50px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div> <!-- end table-responsive-->

                        <div class="mt-3">
                            <a href='javascript:void(0);' class='btn btn-danger waves-effect waves-light' data-toggle="modal" data-target="#products-modal"><i class='mdi mdi-plus-circle mr-1'></i> Add</a>
                        </div>

                        <!-- Add note input-->
                        <div class="mt-3">
                            <label for="example-textarea">Add a Note:</label>
                            <textarea class="form-control" id="note" rows="3" placeholder="Write some note.."></textarea>
                        </div>

                        <!-- action buttons-->
                        <div class="row mt-4">
                            <div class="col-sm-12">
                                <div class="text-sm-right">
                                    <button id="checkout" class="btn btn-danger"><i class="mdi mdi-cart-plus mr-1"></i> Checkout </button>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row-->
                    </div>
                    <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>

<div class="modal fade" id="products-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mySmallModalLabel">Product Selection</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="form-group col-md-12">
                    <label for="productSel" class="col-form-label">Products</label>
                    <select id="productSel" class="form-control">
                        <option>Choose</option>
                        <?php foreach($products as $product) : ?>
                            <option value="<?= $product['id'] ?>"><?= $product['product_name'] ?> (<?= $product['quantity'] ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>