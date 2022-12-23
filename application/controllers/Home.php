<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		//is_logged_in();

		$userSecure = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        //if ($userSecure['password_changed'] == 0) {
          //  redirect('login/forcepassword');
        //}

		$this->load->model('dashboard_model');
	}

	public function index()
	{
	// 	public function getSubmenu()
    // {
    //     $query = "SELECT user_sub_menu.*, user_menu.menu FROM user_sub_menu JOIN user_menu ON user_sub_menu.menu_id = user_menu.id";
    //     return $this->db->query($query)->result_array();
    // }

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['manage_data'] = $this->dashboard_model->manage_data();
		$data['direct_leader'] = $this->dashboard_model->direct_leader($data['fix_epms']['full_name']);
		$data['manager'] = $this->dashboard_model->manager($data['fix_epms']['full_name']);
		$data['hrd'] = $this->dashboard_model->hrd($data['fix_epms']['full_name']);

		//per dept
		$data['dept_businessdev'] = $this->dashboard_model->dept_businessdev();
		$data['dept_cladtek'] = $this->dashboard_model->dept_cladtek();
		$data['dept_design'] = $this->dashboard_model->dept_design();
		$data['dept_finance'] = $this->dashboard_model->dept_finance();
		$data['dept_hse'] = $this->dashboard_model->dept_hse();
		$data['dept_hr'] = $this->dashboard_model->dept_hr();
		$data['dept_it'] = $this->dashboard_model->dept_it();
		$data['dept_hr'] = $this->dashboard_model->dept_hr();
		$data['dept_me'] = $this->dashboard_model->dept_me();
		$data['dept_pi'] = $this->dashboard_model->dept_pi();
		$data['dept_production'] = $this->dashboard_model->dept_production();
		$data['dept_prodauto'] = $this->dashboard_model->dept_prodauto();
		$data['dept_project'] = $this->dashboard_model->dept_project();
		$data['dept_projectop'] = $this->dashboard_model->dept_projectop();
		$data['dept_qa'] = $this->dashboard_model->dept_qa();
		$data['dept_qc'] = $this->dashboard_model->dept_qc();
		$data['dept_scm'] = $this->dashboard_model->dept_scm();
		$data['dept_technical'] = $this->dashboard_model->dept_technical();


		$data['count_hrd'] = $this->dashboard_model->hitunghrd();

		$this->load->view('templates/header_login');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		if($data['fix_epms']['department'] == 'Production'){
			$this->load->view('home/production', $data);
		}elseif($data['fix_epms']['department'] == 'Supply Chain Management'){
			$this->load->view('home/scm', $data);
		}elseif($data['fix_epms']['department'] == 'Quality Control'){
			$this->load->view('home/qc', $data);
		}elseif($data['fix_epms']['department'] == 'Finance & Accounting'){
			$this->load->view('home/finance', $data);
		}elseif($data['fix_epms']['department'] == 'IT & EPICOR'){
			$this->load->view('home/it', $data);
		}elseif($data['fix_epms']['department'] == 'Maintanance & Engineering'){
			$this->load->view('home/me', $data);
		}elseif($data['fix_epms']['department'] == 'Production Automation'){
			$this->load->view('home/prodauto', $data);
		}else{
			$this->load->view('home/index', $data);
		}
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function dirleader_prod()
	{
	// 	public function getSubmenu()
    // {
    //     $query = "SELECT user_sub_menu.*, user_menu.menu FROM user_sub_menu JOIN user_menu ON user_sub_menu.menu_id = user_menu.id";
    //     return $this->db->query($query)->result_array();
    // }

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['manage_data'] = $this->dashboard_model->manage_data();
		$data['direct_leader'] = $this->dashboard_model->direct_leader($data['fix_epms']['full_name']);
		$data['manager'] = $this->dashboard_model->manager($data['fix_epms']['full_name']);
		$data['hrd'] = $this->dashboard_model->hrd($data['fix_epms']['full_name']);

		//per dept
		$data['dept_production'] = $this->dashboard_model->dept_production();

		$this->load->view('templates/header_login');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('home/production', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function dirleader_finance()
	{
	// 	public function getSubmenu()
    // {
    //     $query = "SELECT user_sub_menu.*, user_menu.menu FROM user_sub_menu JOIN user_menu ON user_sub_menu.menu_id = user_menu.id";
    //     return $this->db->query($query)->result_array();
    // }

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['manage_data'] = $this->dashboard_model->manage_data();
		$data['direct_leader'] = $this->dashboard_model->direct_leader($data['fix_epms']['full_name']);
		$data['manager'] = $this->dashboard_model->manager($data['fix_epms']['full_name']);
		$data['hrd'] = $this->dashboard_model->hrd($data['fix_epms']['full_name']);

		//per dept
		$data['dept_finance'] = $this->dashboard_model->dept_finance();

		$this->load->view('templates/header_login');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('home/finance', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function dirleader_it()
	{
	// 	public function getSubmenu()
    // {
    //     $query = "SELECT user_sub_menu.*, user_menu.menu FROM user_sub_menu JOIN user_menu ON user_sub_menu.menu_id = user_menu.id";
    //     return $this->db->query($query)->result_array();
    // }

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['manage_data'] = $this->dashboard_model->manage_data();
		$data['direct_leader'] = $this->dashboard_model->direct_leader($data['fix_epms']['full_name']);
		$data['manager'] = $this->dashboard_model->manager($data['fix_epms']['full_name']);
		$data['hrd'] = $this->dashboard_model->hrd($data['fix_epms']['full_name']);

		//per dept
		$data['dept_it'] = $this->dashboard_model->dept_it();

		$this->load->view('templates/header_login');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('home/it', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function dirleader_hr()
	{
	// 	public function getSubmenu()
    // {
    //     $query = "SELECT user_sub_menu.*, user_menu.menu FROM user_sub_menu JOIN user_menu ON user_sub_menu.menu_id = user_menu.id";
    //     return $this->db->query($query)->result_array();
    // }

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['manage_data'] = $this->dashboard_model->manage_data();
		$data['direct_leader'] = $this->dashboard_model->direct_leader($data['fix_epms']['full_name']);
		$data['manager'] = $this->dashboard_model->manager($data['fix_epms']['full_name']);
		$data['hrd'] = $this->dashboard_model->hrd($data['fix_epms']['full_name']);

		//per dept
		$data['dept_hr'] = $this->dashboard_model->dept_hr();

		$this->load->view('templates/header_login');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('home/hr', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function dirleader_me()
	{
	// 	public function getSubmenu()
    // {
    //     $query = "SELECT user_sub_menu.*, user_menu.menu FROM user_sub_menu JOIN user_menu ON user_sub_menu.menu_id = user_menu.id";
    //     return $this->db->query($query)->result_array();
    // }

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['manage_data'] = $this->dashboard_model->manage_data();
		$data['direct_leader'] = $this->dashboard_model->direct_leader($data['fix_epms']['full_name']);
		$data['manager'] = $this->dashboard_model->manager($data['fix_epms']['full_name']);
		$data['hrd'] = $this->dashboard_model->hrd($data['fix_epms']['full_name']);

		//per dept
		$data['dept_me'] = $this->dashboard_model->dept_me();

		$this->load->view('templates/header_login');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('home/me', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function dirleader_prodauto()
	{
	// 	public function getSubmenu()
    // {
    //     $query = "SELECT user_sub_menu.*, user_menu.menu FROM user_sub_menu JOIN user_menu ON user_sub_menu.menu_id = user_menu.id";
    //     return $this->db->query($query)->result_array();
    // }

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['manage_data'] = $this->dashboard_model->manage_data();
		$data['direct_leader'] = $this->dashboard_model->direct_leader($data['fix_epms']['full_name']);
		$data['manager'] = $this->dashboard_model->manager($data['fix_epms']['full_name']);
		$data['hrd'] = $this->dashboard_model->hrd($data['fix_epms']['full_name']);

		//per dept
		$data['dept_prodauto'] = $this->dashboard_model->dept_prodauto();

		$this->load->view('templates/header_login');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('home/prodauto', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function dirleader_qc()
	{
	// 	public function getSubmenu()
    // {
    //     $query = "SELECT user_sub_menu.*, user_menu.menu FROM user_sub_menu JOIN user_menu ON user_sub_menu.menu_id = user_menu.id";
    //     return $this->db->query($query)->result_array();
    // }

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['manage_data'] = $this->dashboard_model->manage_data();
		$data['direct_leader'] = $this->dashboard_model->direct_leader($data['fix_epms']['full_name']);
		$data['manager'] = $this->dashboard_model->manager($data['fix_epms']['full_name']);
		$data['hrd'] = $this->dashboard_model->hrd($data['fix_epms']['full_name']);

		//per dept
		$data['dept_qc'] = $this->dashboard_model->dept_qc();

		$this->load->view('templates/header_login');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('home/qc', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function dirleader_scm()
	{
	// 	public function getSubmenu()
    // {
    //     $query = "SELECT user_sub_menu.*, user_menu.menu FROM user_sub_menu JOIN user_menu ON user_sub_menu.menu_id = user_menu.id";
    //     return $this->db->query($query)->result_array();
    // }

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['manage_data'] = $this->dashboard_model->manage_data();
		$data['direct_leader'] = $this->dashboard_model->direct_leader($data['fix_epms']['full_name']);
		$data['manager'] = $this->dashboard_model->manager($data['fix_epms']['full_name']);
		$data['hrd'] = $this->dashboard_model->hrd($data['fix_epms']['full_name']);

		//per dept
		$data['dept_scm'] = $this->dashboard_model->dept_scm();

		$this->load->view('templates/header_login');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('home/qc', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function employee()
	{
	// 	public function getSubmenu()
    // {
    //     $query = "SELECT user_sub_menu.*, user_menu.menu FROM user_sub_menu JOIN user_menu ON user_sub_menu.menu_id = user_menu.id";
    //     return $this->db->query($query)->result_array()
	;
    // }

	$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
	$this->session->userdata('username')])->row_array();

	$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
	$this->session->userdata('username')])->row_array();

	$data['manage_data'] = $this->dashboard_model->manage_data();
	$data['direct_leader'] = $this->dashboard_model->direct_leader($data['fix_epms']['full_name']);
	$data['manager'] = $this->dashboard_model->manager($data['fix_epms']['full_name']);
	$data['hrd'] = $this->dashboard_model->hrd($data['fix_epms']['full_name']);
	$data['count_hrd'] = $this->dashboard_model->hitunghrd();

		$this->load->view('templates/header_login');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('home/employee', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}


	public function direct_leader()
	{
		$this->load->model('dashboard_model');
		$data['judul'] = 'Data';
		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['data_epms'] = $this->dashboard_model->tampildirect_leader($data['fix_epms']['full_name']);

		if ($this->input->post('keyword')) {
			$data['data_epms'] = $this->epms_model->cariData();
		}
		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('epms/manage-leader', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}


	public function hod()
	{
		$this->load->model('dashboard_model');
		$data['judul'] = 'Data';

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>$this->session->userdata('username')])->row_array();
		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>$this->session->userdata('username')])->row_array();

		$data['data_epms'] = $this->dashboard_model->tampilhod($data['fix_epms']['full_name']);
		

		if ($this->input->post('keyword')) {
			$data['form'] = $this->epms_model->cariData();
		}
		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('epms/manage-hrd', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');

		
	}

	public function hrd()
	{
		$this->load->model('dashboard_model');
		$data['judul'] = 'Data Performance Management System';

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['data_epms'] = $this->dashboard_model->tampilhrd($data['fix_epms']['full_name']);

		if ($this->input->post('keyword')) {
			$data['data_epms'] = $this->epms_model->cariData();
		}

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('epms/manage-hrd', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function employee_hrd()
	{
		$this->load->model('dashboard_model');
		$data['judul'] = 'Data';

		$data['form'] = $this->dashboard_model->employeehrd();
		$data['dataif'] = $this->dashboard_model->get_sum_count_if();

		if ($this->input->post('keyword')) {
			$data['form'] = $this->epms_model->cariData();
		}
		$data['admin'] = $this->db->get_where('admin', ['username' =>
		$this->session->userdata('username')])->row_array();

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('home/alldata', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function edit_profile()
	{
		$data['title'] = "Edit Profile";
		$data['admin'] = $this->db->get_where('admin', ['full_name' => $this->session->userdata('full_name')])->row_array();

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header_login', $data);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/dashboard', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('home/edit_profile', $data);
			$this->load->view('templates/footer');
			$this->load->view('templates/footer_login');
		} else {
			$full_name = $this->input->post('full_name');
			$username = $this->input->post('username');

			// cek jika ada gambar yang diganti
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				// aturan pada upload profile picture
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/profile/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {

					// menghapus gambar lama di folder dan menggantinya dengan foto baru
					$old_image = $data['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
					}
					// END menghapus gambar lama di folder dan menggantinya dengan foto baru


					// upload image jika berhasil, ganti nama picture yang ada di database
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					// jika gagal
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
				}
			}

			$this->db->set('username', $username);
			$this->db->where('full_name', $full_name);
			$this->db->update('admin');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Profile has been updated.</div>');     // jika dihpaus, maka errornya diberitahu dengan  jelas kalau gambar tidak dapat di update
			redirect(base_url('Home/edit_profile'));
		}
	}

	public function personal()
	{

		$data['judul'] = 'Personal Data';

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();
		
		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>$this->session->userdata('username')])->row_array();

		$data['data_epms'] = $this->dashboard_model->getPersonalFormbyID($data['fix_epms']['employee_id']);
		// $data['form'] = $this->db->get_where('form', ['id' => $this->session->userdata('username')])->row_array();
		// $data['form'] = $this->dashboard_model->personaldata($activeSession["id"]);

		if ($this->input->post('keyword')) {
			$data['data_epms'] = $this->epms_model->cariData();
		}
		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('epms/personal', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function personal2021()
	{

		$data['judul'] = 'Personal Data';

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();
		
		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>$this->session->userdata('username')])->row_array();

		$data['data_epms'] = $this->dashboard_model->getPersonalFormbyID2021($data['fix_epms']['employee_id']);
		// $data['form'] = $this->db->get_where('form', ['id' => $this->session->userdata('username')])->row_array();
		// $data['form'] = $this->dashboard_model->personaldata($activeSession["id"]);

		if ($this->input->post('keyword')) {
			$data['data_epms'] = $this->epms_model->cariData();
		}
		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('epms/personal', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function personal2022()
	{

		$data['judul'] = 'Personal Data';

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();
		
		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>$this->session->userdata('username')])->row_array();

		$data['data_epms'] = $this->dashboard_model->getPersonalFormbyID2022($data['fix_epms']['employee_id']);
		// $data['form'] = $this->db->get_where('form', ['id' => $this->session->userdata('username')])->row_array();
		// $data['form'] = $this->dashboard_model->personaldata($activeSession["id"]);

		if ($this->input->post('keyword')) {
			$data['data_epms'] = $this->epms_model->cariData();
		}
		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('epms/personal', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function history()
	{
		$this->load->model('dashboard_model');
		$data['judul'] = 'Data';

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();
		
		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>$this->session->userdata('username')])->row_array();

		$data['data_epms'] = $this->dashboard_model->history_data($data['fix_epms']['employee_id']);

		//$data['form'] = $this->dashboard_model->history_data();

		if ($this->input->post('keyword')) {
			$data['form'] = $this->epms_model->cariData();
		}
		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('epms/history', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function sendEmail($data)
	{


		$mail = new PHPMailer(true);

		$judul = $data['title'];
		$content = $data['content'];
		$dAcc = $data['email'];
		// $dAcc = $data['nama'];


		$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = 'noreply@cladtek.com';                     //SMTP username
		$mail->Password   = 'Cl4dtek@2015';
		$mail->SMTPSecure = 'tls';                             //SMTP password
		$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		//Recipients
		$mail->setFrom('noreply@cladtek.com', 'Cladtek');
		$mail->addAddress($dAcc);     //Add a recipient
		//Name is optional
		$mail->addReplyTo('noreply@cladtek.com', 'Cladtek');


		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = $judul;
		$mail->Body    = $content;

		if ($mail->send()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function deleteReport($idReport)
	{
		$getID = array ('form_id' => $idReport);
        $this->epms_model->hapus($getID, 'form');
        redirect('home/history');
	}
}
