<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lop extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_lop');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {
			$my_data = $this->model_lop->viewOrderingCustom('TxBuyer', 'BuyerId', 'desc')->result_array();
			$data = array(
				'page_content'      => '../pageadmin/lop/view',
				'ribbon'            => '<li class="active">Daftar Lop </li>',
				'page_name'         => 'Daftar Lop',
				'my_data'           => $my_data
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {
			$my_data = $this->model_lop->viewOrderingCustomV2()->result_array();
			echo json_encode($my_data);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function update()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {
			$data_id = array(
				'Id'  => $this->input->post('e_id')
			);
			$data = array(
				'Name'  => $this->input->post('e_nama'),
				'updatedAt' => date('Y-m-d H:i:s'),
				'updatedBy' => $this->session->userdata('Username'),
			);
			$action = $this->model_lop->update($data_id, $data, 'TxLop');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil_byid()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {

			$data = array(
				'Id'  => $this->input->post('id'),
			);
			$my_data = $this->model_lop->viewWhere('TxLop', $data)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function stop()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {

			$data_id = array(
				'LopId'  => $this->input->post('id')
			);
			$data = array(
				'ReqStatus'  => 2,
				'UpdatedAt'  => date('Y-m-d H:i:s'),
				'UpdatedBy'  => $this->session->userdata('Nik'),
				'EndedAt'  =>  date('Y-m-d H:i:s'),
			);
			$action = $this->model_lop->update($data_id, $data, 'TxLop');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function delete()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {

			$data_id = array(
				'Id'  => $this->input->post('id')
			);
			$action = $this->model_lop->delete($data_id, 'TxLop');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}


	public function simpan()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {

			$data = array(
				'LopNo'  => $this->input->post('lop'),
				'ReqNo'  => $this->input->post('reqno'),
				'ReqStatus'  => 1,
				'CreatedAt' => date('Y-m-d H:i:s'),
				'StartedAt' => date('Y-m-d H:i:s'),
				'CreatedBy'	=> $this->session->userdata('Nik'),
				'UpdatedAt' => date('1990-01-01 H:i:s'),
			);
			$cek = $this->model_lop->checkDuplicate($data,'TxLop');
			if($cek > 0){
				echo json_encode(401);
			} else {
				$action = $this->model_lop->insert($data, 'TxLop');
				echo json_encode($action);
			}
		
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}
}
