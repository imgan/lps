<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Po extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_po');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {
			$my_data = $this->model_po->viewOrderingCustomV3('TxPr', 'PrId', 'desc')->result_array();
			$data = array(
				'page_content'      => '../pageadmin/PO/view',
				'ribbon'            => '<li class="active">Daftar PO </li>',
				'page_name'         => 'Daftar PO',
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
			$my_data = $this->model_po->viewOrderingCustomV2()->result_array();
			echo json_encode($my_data);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}
	public function stop()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {

			$data_id = array(
				'PoId'  => $this->input->post('id')
			);
			$data = array(
				'ReqStatus'  => 2,
				'UpdatedAt'  => date('Y-m-d H:i:s'),
				'UpdatedBy'  => $this->session->userdata('Nik'),
				'EndedAt'  =>  date('Y-m-d H:i:s'),
			);
			$action = $this->model_po->update($data_id, $data, 'TxPo');
			$id = $this->input->post('id');
			$reqno = $this->db->query("Select ReqNo from TxPo where PoId = $id ")->result_array();
			if ($reqno) {
				$reqno = $reqno[0]['ReqNo'];
				$total = $this->db->query("select count(*) as total from TxPo where ReqNo = $reqno ")->result_array();
				$totalApprove = $this->db->query("select count(*) as total from TxPo where ReqNo = $reqno and EndedAt IS NOT NULL")->result_array();
				if ($total == $totalApprove) {
					$data_id2 = array(
						'ReqId'  => $reqno
					);
					$data2 = array(
						'ReqStatus'  => 12,
						'UpdatedAt'  => date('Y-m-d H:i:s'),
						'UpdatedBy'  => $this->session->userdata('Nik'),
					);

					$this->model_po->update($data_id2, $data2, 'TxRequest');
				}
			}

			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function showreqno()
	{
		$id = $this->input->post('id');
		$result = $this->model_po->viewWhereCustomLop($id)->result_array();
		$result = $result[0]['ReqNo'];
		echo $result;
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

			$data = array(
				'PoNo'  => $this->input->post('po'),
				'PrNo'  => $this->input->post('pr'),
				'ReqNo'  => $this->input->post('reqno'),
				'ReqStatus'  => 1,
				'CreatedAt' => date('Y-m-d H:i:s'),
				'StartedAt' => date('Y-m-d H:i:s'),
				'CreatedBy'	=> $this->session->userdata('Nik'),
				'UpdatedAt' => date('1990-01-01 H:i:s'),
			);
			$action = $this->model_po->insert($data, 'TxPo');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}
}
