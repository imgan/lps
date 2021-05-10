<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SearchingDetail extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_budget');
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
				'UpdatedBy'  => $this->session->userdata('Username'),
				'StartedAt'  => date('Y-m-d H:i:s'),

			);
			$action = $this->model_budget->update($data_id, $data, 'TxRequest');
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
			$data = array(
				'ReqStatus'  => 3,
				'UpdatedAt'  => date('Y-m-d H:i:s'),
				'UpdatedBy'  => $this->session->userdata('Username'),
				'EndedAt'  => date('Y-m-d H:i:s'),

			);
			$action = $this->model_budget->update($data_id, $data, 'TxRequest');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function index()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {
			$data = array(
				'page_content'      => '../pageadmin/budgetrequest/view',
				'ribbon'            => '<li class="active">Daftar Budget Request </li>',
				'page_name'         => 'Daftar Budget Request',
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {
			$my_data = $this->model_budget->viewOrderingCustom()->result_array();
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
			$action = $this->model_budget->update($data_id, $data, 'status');
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
			$my_data = $this->model_budget->viewWhere('TxRequest', $data)->result();
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
            $action = $this->model_budget->delete($data_id, 'TxRequest');
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
			$cek = $this->model_budget->checkDuplicate($data,'TxRequest');
			if($cek > 0){
				echo json_encode(401);
			} else {
				$action = $this->model_budget->insert($data, 'TxRequest');
				echo json_encode($action);
			}

        } else {
            $this->load->view('pageadmin/login'); //Memanggil function render_view
        }
    }
}
