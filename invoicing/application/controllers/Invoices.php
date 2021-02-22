<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices extends CI_Controller {

	public $layoutData = [];
    public $ajaxRes = ['success' => true];

	public function __construct() {
		parent::__construct();
        $this->load->model('Products_model', 'products');
        $this->load->model('Customers_model', 'customers');
        $this->load->model('Invoice_model', 'invoice');
		checkSession();
	}

	public function index() {
		$this->layoutData['title'] = "Invoices";
        $this->layoutData['invoices'] = $this->invoice->getAll();
        $this->layoutData['products'] = $this->products->getAll();
        // dd($this->layoutData['products']); exit;
		$this->layoutData['addButton'] = "<a href='/invoice/add' class='btn btn-danger waves-effect waves-light'><i class='mdi mdi-plus-circle mr-1'></i> Add New</a>";
		$this->template->dashboardTemplate('layout/invoices', $this->layoutData);
	}

    public function add() {
        $this->layoutData['title'] = "Add Invoices";
        $this->layoutData['footerJs'] = ['<script src="../assets/js/invoices.js"></script>'];
        $this->layoutData['products'] = $this->products->getAll();
        $this->layoutData['customers'] = $this->customers->getAll();
		$this->template->dashboardTemplate('layout/invoices-add', $this->layoutData);
    }

    public function addInvoice() {
        $products = $this->input->post('products');
        $customer = $this->input->post('customer');

        if ($products && $customer) {
            $insert = $this->invoice->add();

            $this->ajaxRes['success'] = $insert;
            $this->ajaxRes['message'] = $insert ? "You add new invoice!" : "Insert new invoice is failed!";
        } else {
            $this->ajaxRes['success'] = false;
            $this->ajaxRes['message'] = "Insert new invoice is failed!";
        }

        echo json_encode($this->ajaxRes);
        exit;
    }

    public function addProduct() {

        $product = $this->products->find(['id' => $this->input->post('id')]);
        if (!empty($product)) {
            $id = $product['id'];
            $product_name = $product['product_name'];
            $price = $product['price'];
            $qty = $product['quantity'];

            $textRow = "<tr data-id='$id'>
                <td>
                    <p class='m-0 d-inline-block align-middle font-16'>
                        <a href='#' class='text-reset font-family-secondary'>$product_name</a>
                    </p>
                </td>
                <td>
                    $$price
                </td>
                <td>
                    <input id='qty' type='number' data-price='$price' min='1' max='$qty' value='1' class='form-control' placeholder='Qty' style='width: 90px;'>
                </td>
                <td id='total'>
                   $$price
                </td>
                <td>
                    <a href='javascript:void(0);' class='action-icon delete-row'> <i class='mdi mdi-delete'></i></a>
                </td>
            </tr>";
            
            $this->ajaxRes['html'] = $textRow;
            $this->ajaxRes['product'] = $product;
        } else {
            $this->ajaxRes['success'] = false;
        }
        
        echo json_encode($this->ajaxRes);
        exit;
    }
}
