<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Level extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_level');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {
			$data = array(
				'page_content'      => '../pageadmin/level/view',
				'ribbon'            => '<li class="active">Daftar level </li>',
				'page_name'         => 'Daftar Level',
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {
			$my_data = $this->model_level->viewOrdering('Level', 'Id', 'desc')->result_array();
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
			$action = $this->model_level->update($data_id, $data, 'Level');
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
			$my_data = $this->model_level->viewWhere('Level', $data)->result();
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
            $action = $this->model_level->delete($data_id, 'Level');
            echo json_encode($action);
        } else {
            $this->load->view('pageadmin/login'); //Memanggil function render_view
        }
    }


    public function simpan()
    {
        if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {

            $data = array(
                'Name'  => $this->input->post('nama'),
				'CreatedAt' => date('Y-m-d H:i:s'),
				'CreatedBy'	=> $this->session->userdata('Nik'),
				'UpdatedAt' => date('1990-01-01 H:i:s'),
				'UpdatedBy'	=> $this->session->userdata('Nik')
            );
			$cek = $this->model_level->checkDuplicate($data,'Level');
			if($cek > 0){
				echo json_encode(401);
			} else {
				$action = $this->model_level->insert($data, 'Level');
				echo json_encode($action);
			}

        } else {
            $this->load->view('pageadmin/login'); //Memanggil function render_view
        }
    }
}
