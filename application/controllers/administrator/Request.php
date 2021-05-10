<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Request extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_request');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function aktif()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {

			$data_id = array(
				'ReqId'  => $this->input->post('id')
			);
			$data = array(
				'ReqStatus'  => 2,
				'UpdatedAt'  => date('Y-m-d H:i:s'),
				'UpdatedBy'  => $this->session->userdata('Nik'),
				'StartedAt'  => date('Y-m-d H:i:s'),

			);
			$action = $this->model_request->update($data_id, $data, 'TxRequest');
			if($action){
				$dataQuote = array(
					'ReqStatus'  => 1,
					'ReqNo'  =>  $this->input->post('id'),
					'UpdatedAt'  => date('1990-01-01 H:i:s'),
					'UpdatedBy'  => 'System',
					'CreatedBy'  => $this->session->userdata('Nik'),
					'CreatedAt'  => date('Y-m-d H:i:s'),
					'StartedAt'  => date('Y-m-d H:i:s'),

				);
				$action = $this->model_request->insert($dataQuote, 'TxQuotation');
			}
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function stop()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {

			$data_id = array(
				'ReqId'  => $this->input->post('id')
			);
			$data_id2 = array(
				'ReqNo'  => $this->input->post('id')
			);
			$data = array(
				'ReqStatus'  => 3,
				'UpdatedAt'  => date('Y-m-d H:i:s'),
				'UpdatedBy'  => $this->session->userdata('Nik'),
				'EndedAt'  => date('Y-m-d H:i:s'),

			);
			$action = $this->model_request->update($data_id, $data, 'TxRequest');
			if($action){
				$dataQuote = array(
					'ReqStatus'  => 2,
					'ReqNo'  =>  $this->input->post('id'),
					'UpdatedAt'  =>  date('Y-m-d H:i:s'),
					'UpdatedBy'  => $this->session->userdata('Nik'),
					'EndedAt'  => date('Y-m-d H:i:s'),
				);
				$action = $this->model_request->update($data_id2, $dataQuote, 'TxQuotation');
			}
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}


	public function ewfstop()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {

			$data_id = array(
				'ReqId'  => $this->input->post('id')
			);
			$data_id2 = array(
				'ReqNo'  => $this->input->post('id')
			);
			$data = array(
				'ReqStatus'  => 7,
				'UpdatedAt'  => date('Y-m-d H:i:s'),
				'UpdatedBy'  => $this->session->userdata('Nik'),
			);
			$action = $this->model_request->update($data_id, $data, 'TxRequest');
			if($action){
				$dataQuote = array(
					'ReqStatus'  => 2,
					'UpdatedAt'  => date('Y-m-d H:i:s'),
					'UpdatedBy'  => $this->session->userdata('Nik'),
					'UpdatedAt'  => date('Y-m-d H:i:s'),
					'EndedAt'  => date('Y-m-d H:i:s'),
				);
				$action = $this->model_request->update($data_id2,$dataQuote, 'TxEworkflow');
			}
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function simpanewf()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {

			$data_id = array(
				'ReqId'  => $this->input->post('e_id')
			);
			$data = array(
				'ReqStatus'  => 6,
				'UpdatedAt'  => date('Y-m-d H:i:s'),
				'UpdatedBy'  => $this->session->userdata('Nik'),
			);
			$action = $this->model_request->update($data_id, $data, 'TxRequest');
			if($action){
				$dataQuote = array(
					'ReqStatus'  => 2,
					'ReqNo'  =>   $this->input->post('e_id'),
					'EwfNo'  =>   $this->input->post('e_wf'),
					'CreatedAt'  => date('Y-m-d H:i:s'),
					'UpdatedAt'  => date('1990-01-01 H:i:s'),
					'UpdatedBy'  => 'System',
					'CreatedBy'  => $this->session->userdata('Nik'),
					'StartedAt'  => date('Y-m-d H:i:s'),
				);
				$action = $this->model_request->insert($dataQuote, 'TxEworkflow');
			}
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function buyeraktif()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {

			$data_id = array(
				'ReqId'  => $this->input->post('id')
			);
			$data = array(
				'ReqStatus'  => 10,
				'UpdatedAt'  => date('Y-m-d H:i:s'),
				'UpdatedBy'  => $this->session->userdata('Nik'),
			);
			$action = $this->model_request->update($data_id, $data, 'TxRequest');
			$reqNo = $this->model_request->viewWhere('TxRequest', $data)->result();
			$reqNo = $reqNo[0]->ReqNo;
			if($action){
				$dataQuote = array(
					'ReqStatus'  => 1,
					'ReqNo'  =>   $this->input->post('id'),
					'ReqNumber' => $reqNo,
					'CreatedAt'  => date('Y-m-d H:i:s'),
					'UpdatedAt'  => date('1990-01-01 H:i:s'),
					'UpdatedBy'  => 'System',
					'CreatedBy'  => $this->session->userdata('Nik'),
					'StartedAt'  => date('Y-m-d H:i:s'),
				);
				$action = $this->model_request->insert($dataQuote, 'TxBuyer');
			}
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function buyerstop()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {

			$data_id = array(
				'ReqId'  => $this->input->post('id')
			);
			$data_id2 = array(
				'ReqNo'  => $this->input->post('id')
			);
			$data = array(
				'ReqStatus'  => 11,
				'UpdatedAt'  => date('Y-m-d H:i:s'),
				'UpdatedBy'  => $this->session->userdata('Nik'),
			);
			$action = $this->model_request->update($data_id, $data, 'TxRequest');
			if($action){
				$dataQuote = array(
					'ReqStatus'  => 1,
					'UpdatedAt'  => date('Y-m-d H:i:s'),
					'UpdatedBy'  => $this->session->userdata('Nik'),
					'UpdatedAt'  => date('Y-m-d H:i:s'),
					'EndedAt'  => date('Y-m-d H:i:s'),
				);
				$action = $this->model_request->update($data_id2,$dataQuote, 'TxBuyer');
			}
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function ippsaktif()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {

			$data_id = array(
				'ReqId'  => $this->input->post('id')
			);
			$data = array(
				'ReqStatus'  => 12,
				'UpdatedAt'  => date('Y-m-d H:i:s'),
				'UpdatedBy'  => $this->session->userdata('Nik'),
			);
			$action = $this->model_request->update($data_id, $data, 'TxRequest');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function ippsstop()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {

			$data_id = array(
				'ReqId'  => $this->input->post('id')
			);
			$data = array(
				'ReqStatus'  => 14,
				'UpdatedAt'  => date('Y-m-d H:i:s'),
				'UpdatedBy'  => $this->session->userdata('Nik'),
			);
			$action = $this->model_request->update($data_id, $data, 'TxRequest');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function itemktif()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {

			$data_id = array(
				'ReqId'  => $this->input->post('id')
			);
			$data = array(
				'ReqStatus'  => 8,
				'UpdatedAt'  => date('Y-m-d H:i:s'),
				'UpdatedBy'  => $this->session->userdata('Nik'),
			);
			$action = $this->model_request->update($data_id, $data, 'TxRequest');
			if($action){
				$dataQuote = array(
					'ReqStatus'  => 1,
					'ReqNo'  =>  $this->input->post('id'),
					'CreatedAt'  => date('Y-m-d H:i:s'),
					'UpdatedAt'  => date('1990-01-01 H:i:s'),
					'UpdatedBy'  => 'System',
					'CreatedBy'  => $this->session->userdata('Nik'),
					'StartedAt'  => date('Y-m-d H:i:s'),
				);
				$action = $this->model_request->insert($dataQuote, 'TxRegister');
			}
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function itemstop()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {

			$data_id = array(
				'ReqId'  => $this->input->post('id')
			);
			$data_id2 = array(
				'ReqNo'  => $this->input->post('id')
			);
			$data = array(
				'ReqStatus'  => 9,
				'UpdatedAt'  => date('Y-m-d H:i:s'),
				'UpdatedBy'  => $this->session->userdata('Nik'),
			);
			$action = $this->model_request->update($data_id, $data, 'TxRequest');
			if($action){
				$dataQuote = array(
					'ReqStatus'  => 2,
					'ReqNo'  =>  $this->input->post('id'),
					'UpdatedAt'  => date('Y-m-d H:i:s'),
					'UpdatedBy'  =>$this->session->userdata('Nik'),
					'EndedAt'  => date('Y-m-d H:i:s'),
				);
				$action = $this->model_request->update($data_id2, $dataQuote, 'TxRegister');
			}
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function budgetaktif()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {

			$data_id = array(
				'ReqId'  => $this->input->post('id')
			);
			$data = array(
				'ReqStatus'  => 4,
				'UpdatedAt'  => date('Y-m-d H:i:s'),
				'UpdatedBy'  => $this->session->userdata('Nik'),
				'StartedAt'  => date('Y-m-d H:i:s'),

			);
			$action = $this->model_request->update($data_id, $data, 'TxRequest');
			if($action){
				$dataQuote = array(
					'ReqStatus'  => 1,
					'ReqNo'  =>  $this->input->post('id'),
					'CreatedAt'  => date('Y-m-d H:i:s'),
					'UpdatedAt'  => date('1990-01-01 H:i:s'),
					'UpdatedBy'  => 'System',
					'CreatedBy'  => $this->session->userdata('Nik'),
					'StartedAt'  => date('Y-m-d H:i:s'),
				);
				$action = $this->model_request->insert($dataQuote, 'TxBudget');
			}
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	
	public function budgetstop()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {

			$data_id = array(
				'ReqId'  => $this->input->post('id')
			);
			$data_id2 = array(
				'ReqNo'  => $this->input->post('id')
			);
			$data = array(
				'ReqStatus'  => 5,
				'UpdatedAt'  => date('Y-m-d H:i:s'),
				'UpdatedBy'  => $this->session->userdata('Nik'),
				'StartedAt'  => date('Y-m-d H:i:s'),

			);
			$action = $this->model_request->update($data_id, $data, 'TxRequest');
			if($action){
				$dataQuote = array(
					'ReqStatus'  => 2,
					'ReqNo'  =>  $this->input->post('id'),
					'UpdatedAt'  => date('Y-m-d H:i:s'),
					'UpdatedBy'  =>$this->session->userdata('Nik'),
					'EndedAt'  => date('Y-m-d H:i:s'),
				);
				$action = $this->model_request->update($data_id2, $dataQuote, 'TxBudget');
			}
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	
	public function index()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {
			$mydepartment = $this->model_request->viewOrdering('Department', 'Id', 'desc')->result_array();
			if($this->session->userdata('Level') == 1){
				$data = array(
					'page_content'      => '../pageadmin/request/view',
					'ribbon'            => '<li class="active">Daftar Request </li>',
					'page_name'         => 'Daftar Request',
					'mydepartment'		=> $mydepartment
				);
				$this->render_view($data); //Memanggil function render_view
			} else if( $this->session->userdata('Level') == 2)  {
				$data = array(
					'page_content'      => '../pageadmin/request/viewUser',
					'ribbon'            => '<li class="active">Daftar Request User </li>',
					'page_name'         => 'Daftar Request',
					'mydepartment'		=> $mydepartment
				);
				$this->render_view($data); //Memanggil function render_view
			} else if( $this->session->userdata('Level') == 3)  {
				$data = array(
					'page_content'      => '../pageadmin/request/viewMRO',
					'ribbon'            => '<li class="active">Daftar Request User </li>',
					'page_name'         => 'Daftar Request',
					'mydepartment'		=> $mydepartment
				);
				$this->render_view($data); //Memanggil function render_view
			}
		
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {
			$my_data = $this->model_request->viewOrderingCustom()->result_array();
			echo json_encode($my_data);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function update()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {
			$data_id = array(
				'id'  => $this->input->post('e_id')
			);
			$data = array(
				'Name'  => $this->input->post('e_nama'),
				'Department'  => $this->input->post('e_department'),
				'updatedAt' => date('Y-m-d H:i:s'),
				'updatedBy' => $this->session->userdata('Username'),
			);
			$action = $this->model_request->update($data_id, $data, 'status');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil_byid()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {

			$data = array(
				'ReqId'  => $this->input->post('id'),
			);
			$my_data = $this->model_request->viewWhere('TxRequest', $data)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

    public function delete()
    {
        if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {

            $data_id = array(
                'ReqId'  => $this->input->post('id')
            );
            $action = $this->model_request->delete($data_id, 'TxRequest');
            echo json_encode($action);
        } else {
            $this->load->view('pageadmin/login'); //Memanggil function render_view
        }
    }


    public function simpan()
    {
        if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {

            $data = array(
                'ReqNo'  => $this->input->post('nama'),
                'ReqStatus'  => 1,
                'Department'  => $this->input->post('department'),
                'ReqDesc'  =>  $this->input->post('desc'),
				'CreatedAt' => date('Y-m-d H:i:s'),
				'CreatedBy'	=> $this->session->userdata('Nik'),
				'UpdatedAt' => date('1990-01-01 H:i:s'),
				'UpdatedBy'	=> $this->session->userdata('Nik')
            );
			$cek = $this->model_request->checkDuplicate($data,'TxRequest');
			if($cek > 0){
				echo json_encode(401);
			} else {
				$action = $this->model_request->insert($data, 'TxRequest');
				echo json_encode($action);
			}

        } else {
            $this->load->view('pageadmin/login'); //Memanggil function render_view
        }
    }
}
