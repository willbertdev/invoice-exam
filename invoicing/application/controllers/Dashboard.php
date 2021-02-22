<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public $layoutData = [];

	public function __construct() {
		parent::__construct();

		$this->load->model('Invoice_model', 'invoice');
		checkSession();
	}

	public function index() {
		$this->layoutData['title'] = "Dashboard";
		$this->layoutData['invoices'] = $this->invoice->getAll();
		$this->layoutData['sales'] = array(
			'day' => $this->invoice->getSales("day"),
			'month' => $this->invoice->getSales("month"),
			'year' => $this->invoice->getSales("year"),
		);
		
		$this->layoutData['footerJs'] = ['<script src="../assets/js/dashboard.js"></script>'];
		$this->template->dashboardTemplate('layout/dashboard', $this->layoutData);
	}

	public function getSales() {
		$yearly = $this->invoice->getSales();
		$data = array();

		if (!empty($yearly)) {
			foreach($yearly as $y) {
				$data[] = array(
					'y' => dateFormat($y['created_at'], 'Y'),
					'a' => $y['total']
				);
			}

			echo json_encode($data);
		}
	}
}
