<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pr extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_pr');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {
			$my_data = $this->model_pr->viewOrderingCustomV3('TxLop', 'LopId', 'desc')->result_array();
			$my_data2 = $this->model_pr->viewOrderingCustom('TxRequest', 'ReqId', 'desc')->result_array();
			$data = array(
				'page_content'      => '../pageadmin/pr/view',
				'ribbon'            => '<li class="active">Daftar PR </li>',
				'page_name'         => 'Daftar PR',
				'my_data'           => $my_data,
				'my_data2'           => $my_data2
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {
			$my_data = $this->model_pr->viewOrderingCustomV2()->result_array();
			echo json_encode($my_data);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}
	public function nonaktif()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {


			$data_id = array(
				'PrId'  => $this->input->post('id')
			);
			$data = array(
				'ReqStatus'  => 2,
				'UpdatedAt'  => date('Y-m-d H:i:s'),
				'UpdatedBy'  => $this->session->userdata('Username'),
				'EndedAt'  =>  date('Y-m-d H:i:s'),
			);
			$action = $this->model_pr->update($data_id, $data, 'TxPr');
			echo json_encode($action);
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
			$action = $this->model_pr->update($data_id, $data, 'TxLop');
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
			$my_data = $this->model_pr->viewWhere('TxLop', $data)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function showreqno()
	{
		$lop = $this->input->post('id');
		$result = $this->model_pr->viewWhereCustomLop($lop)->result_array();
		$result = $result[0]['ReqNo'];
		echo $result;
	}

	public function delete()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {
			$data_id = array(
				'Id'  => $this->input->post('id')
			);
			$action = $this->model_pr->delete($data_id, 'TxLop');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}


	public function simpan()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {
			if ($this->input->post('check') == true) {
				$data = array(
					'PrNo'  => $this->input->post('pr'),
					'ReqNo'  => $this->input->post('reqnom'),
					'ReqStatus'  => 1,
					'CreatedAt' => date('Y-m-d H:i:s'),
					'StartedAt' => date('Y-m-d H:i:s'),
					'CreatedBy'	=> $this->session->userdata('Nik'),
					'UpdatedAt' => date('1990-01-01 H:i:s'),
				);
			} else {
				$data = array(
					'LopId'  => $this->input->post('lop'),
					'PrNo'  => $this->input->post('pr'),
					'ReqNo'  => $this->input->post('reqno'),
					'ReqStatus'  => 1,
					'CreatedAt' => date('Y-m-d H:i:s'),
					'StartedAt' => date('Y-m-d H:i:s'),
					'CreatedBy'	=> $this->session->userdata('Nik'),
					'UpdatedAt' => date('1990-01-01 H:i:s'),
				);
			}
			$action = $this->model_pr->insert($data, 'TxPr');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}
}
