<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_user');
	}



	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {
			$mydepartment = $this->model_user->viewOrdering('Department', 'Id', 'desc')->result_array();
			$mylevel = $this->model_user->viewOrdering('Level', 'Id', 'desc')->result_array();
			$data = array(
				'page_content'      => '../pageadmin/user/view',
				'ribbon'            => '<li class="active">Daftar User</li>',
				'page_name'         => 'Daftar User',
				'mydepartment'		=> $mydepartment,
				'mylevel'			=> $mylevel
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {
			$my_data = $this->model_user->viewOrdering('User', 'IdUser', 'desc')->result_array();
			echo json_encode($my_data);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil_byid()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {

			$data = array(
				'id'  => $this->input->post('id'),
			);
			$my_data = $this->model_user->viewWhere('user', $data)->result();
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
			$password = md5($this->input->post('e_password'));
			$kata = strlen($this->input->post('e_password'));
			$password = hash("sha512", $password);

			$password2 = md5($this->input->post('e_passwordc'));
			$password2 = hash("sha512", $password2);
			if ($kata == 0) {
				$data = array(
					'Nik'  => $this->input->post('e_nik'),
					'Username'  => $this->input->post('e_nama'),
					'Level'  => $this->input->post('e_level'),
					'createdBy'	=> $this->session->userdata('name'),
					'UpdatedAt' => date('Y-m-d H:i:s'),
					'UpdatedBy'	=> $this->session->userdata('name')
				);
				$action = $this->model_user->update($data_id, $data, 'user');
				echo json_encode($action);
			} else {
				if ($password == $password2) {
					$data = array(
						'Nik'  => $this->input->post('e_nik'),
						'Username'  => $this->input->post('e_nama'),
						'Level'  => $this->input->post('e_level'),
						'password'	=> $password,
						'createdBy'	=> $this->session->userdata('name'),
						'UpdatedAt' => date('Y-m-d H:i:s'),
						'UpdatedBy'	=> $this->session->userdata('name')
					);
					$action = $this->model_user->update($data_id, $data, 'user');
					echo json_encode($action);
				} else {
					echo json_encode(400);
				}
			}
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
			$action = $this->model_user->delete($data_id, 'user');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}


	public function simpan()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {
			$password = md5($this->input->post('password'));
			$password = hash("sha512", $password);
			$password2 = md5($this->input->post('password_c'));
			$password2 = hash("sha512", $password2);
			if ($password == $password2) {
				$data = array(
					'Nik'  => $this->input->post('nik'),
					'Username'  => $this->input->post('nama'),
					'Level'  => $this->input->post('level'),
					'password'	=> $password,
					'createdAt' => date('Y-m-d H:i:s'),
					'createdBy'	=> $this->session->userdata('name'),
					'UpdatedAt' => date('1990-01-01 H:i:s'),
					'UpdatedBy'	=> $this->session->userdata('name')
				);
				$cek = $this->model_user->checkDuplicate($data, 'User');
				if ($cek > 0) {
					echo json_encode(401);
				} else {
					$action = $this->model_user->insert($data, 'User');
					echo json_encode($action);
				}
			} else {
				echo json_encode(400);
			}
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}
}
