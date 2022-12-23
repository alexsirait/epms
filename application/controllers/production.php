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
class Production extends CI_Controller
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


		$data['count_hrd'] = $this->dashboard_model->hitunghrd();

		$this->load->view('templates/header_login');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function hrd_production()
	{
		$this->load->model('dashboard_model');
		$data['judul'] = 'Data Performance Management System';

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		//per section
		$data['sect_bending'] = $this->dashboard_model->sect_bending();
		$data['sect_blast'] = $this->dashboard_model->sect_blast();
		$data['sect_equipment'] = $this->dashboard_model->sect_equipment();
		$data['sect_liner'] = $this->dashboard_model->sect_liner();
		$data['sect_machine'] = $this->dashboard_model->sect_machine();
		$data['sect_manualrep'] = $this->dashboard_model->sect_manualrep();
		$data['sect_material'] = $this->dashboard_model->sect_material();
		$data['sect_mlp'] = $this->dashboard_model->sect_mlp();
		$data['sect_packing'] = $this->dashboard_model->sect_packing();
		$data['sect_production'] = $this->dashboard_model->sect_production();
		$data['sect_qh'] = $this->dashboard_model->sect_qh();
		$data['sect_shv'] = $this->dashboard_model->sect_shv();
		$data['sect_spool'] = $this->dashboard_model->sect_spool();
		$data['sect_fitter'] = $this->dashboard_model->sect_fitter();
		$data['sect_welder'] = $this->dashboard_model->sect_welder();
		$data['sect_th'] = $this->dashboard_model->sect_th();
		$data['sect_wol'] = $this->dashboard_model->sect_wol();

		$data['data_epms'] = $this->dashboard_model->tampilhrd_production();

		if ($this->input->post('keyword')) {
			$data['data_epms'] = $this->epms_model->cariData();
		}

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('home/hrd_production', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	function emailmanager_prod(){
		$loginlink =  site_url() . 'login' . '"';
			$fullname = 'Tomoyuki Ueno';
			$department = 'Production';

			$textContent = <<<HEREDOC
			Dear Sir $fullname, <br>
			Please kindly check, rate, and approve your staffs' Performance Management System form as you're their Manager.
			<br><br>
			User Level : Manager <br> Department : $department
			<p>Please click this link for your approval $loginlink </p>
			<p>Thank you,</p>
			<p>Cladtek HRIS</p>
			HEREDOC;

			$data = array(
				'title' 	=> 'Performance Management System approval',
				'content'	=> $textContent,
				'email' 	=> 'satoto.subandoro@icloud.com',
				'nama' 		=> 'Tomoyuki Ueno',
				'department' => 'Production',

			);
			try {
				$isSent = ($this->sendEmail($data));
				if (!$isSent) {
					return false;
					// return json_encode(["result" => false]);
				}
			} catch (\Exception $e) {
				return false;
				// return json_encode(["result" => false]);
			}
			redirect('production/hrd_production');
	}

	public function prod_bending()
	{
		$this->load->model('dashboard_model');
		$data['judul'] = 'Data PMS Dept. Production ( Bending & HT )';

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['data_epms'] = $this->dashboard_model->prod_bending();

		if ($this->input->post('keyword')) {
			$data['data_epms'] = $this->epms_model->cariData();
		}

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('epms/manage-production', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');

	}

	public function prod_blast()
	{
		$this->load->model('dashboard_model');
		$data['judul'] = 'Data PMS Dept. Production ( Blast & Paint )';

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['data_epms'] = $this->dashboard_model->prod_blast();

		if ($this->input->post('keyword')) {
			$data['data_epms'] = $this->epms_model->cariData();
		}

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('epms/manage-production', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function prod_equipment()
	{
		$this->load->model('dashboard_model');
		$data['judul'] = 'Data PMS Dept. Production ( Equipment & Build )';

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['data_epms'] = $this->dashboard_model->prod_equipment();

		if ($this->input->post('keyword')) {
			$data['data_epms'] = $this->epms_model->cariData();
		}

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('epms/manage-production', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function prod_liner()
	{
		$this->load->model('dashboard_model');
		$data['judul'] = 'Data PMS Dept. Production ( Liner )';

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['data_epms'] = $this->dashboard_model->prod_liner();

		if ($this->input->post('keyword')) {
			$data['data_epms'] = $this->epms_model->cariData();
		}

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('epms/manage-production', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function prod_machine()
	{
		$this->load->model('dashboard_model');
		$data['judul'] = 'Data PMS Dept. Production ( Machine Shop )';

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['data_epms'] = $this->dashboard_model->prod_machine();

		if ($this->input->post('keyword')) {
			$data['data_epms'] = $this->epms_model->cariData();
		}

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('epms/manage-production', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function prod_manualrep()
	{
		$this->load->model('dashboard_model');
		$data['judul'] = 'Data PMS Dept. Production ( Manual Repair )';

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['data_epms'] = $this->dashboard_model->prod_manualrep();

		if ($this->input->post('keyword')) {
			$data['data_epms'] = $this->epms_model->cariData();
		}

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('epms/manage-production', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function prod_material()
	{
		$this->load->model('dashboard_model');
		$data['judul'] = 'Data PMS Dept. Production ( Material Movement )';

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['data_epms'] = $this->dashboard_model->prod_material();

		if ($this->input->post('keyword')) {
			$data['data_epms'] = $this->epms_model->cariData();
		}

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('epms/manage-production', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function prod_mlp()
	{
		$this->load->model('dashboard_model');
		$data['judul'] = 'Data PMS Dept. Production ( MLP )';

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['data_epms'] = $this->dashboard_model->prod_mlp();

		if ($this->input->post('keyword')) {
			$data['data_epms'] = $this->epms_model->cariData();
		}

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('epms/manage-production', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function prod_packing()
	{
		$this->load->model('dashboard_model');
		$data['judul'] = 'Data PMS Dept. Production ( Packing & Carpentry )';

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['data_epms'] = $this->dashboard_model->prod_packing();

		if ($this->input->post('keyword')) {
			$data['data_epms'] = $this->epms_model->cariData();
		}

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('epms/manage-production', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function prod_production()
	{
		$this->load->model('dashboard_model');
		$data['judul'] = 'Data PMS Dept. Production ( Production )';

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['data_epms'] = $this->dashboard_model->prod_production();

		if ($this->input->post('keyword')) {
			$data['data_epms'] = $this->epms_model->cariData();
		}

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('epms/manage-production', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function prod_qh()
	{
		$this->load->model('dashboard_model');
		$data['judul'] = 'Data PMS Dept. Production ( QH )';

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['data_epms'] = $this->dashboard_model->prod_qh();

		if ($this->input->post('keyword')) {
			$data['data_epms'] = $this->epms_model->cariData();
		}

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('epms/manage-production', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function prod_shv()
	{
		$this->load->model('dashboard_model');
		$data['judul'] = 'Data PMS Dept. Production ( SHV )';

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['data_epms'] = $this->dashboard_model->prod_shv();

		if ($this->input->post('keyword')) {
			$data['data_epms'] = $this->epms_model->cariData();
		}

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('epms/manage-production', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function prod_spool()
	{
		$this->load->model('dashboard_model');
		$data['judul'] = 'Data PMS Dept. Production ( Spool Fab. )';

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['data_epms'] = $this->dashboard_model->prod_spool();

		if ($this->input->post('keyword')) {
			$data['data_epms'] = $this->epms_model->cariData();
		}

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('epms/manage-production', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function prod_fitter()
	{
		$this->load->model('dashboard_model');
		$data['judul'] = 'Data PMS Dept. Production ( Spool Fab. Fitter )';

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['data_epms'] = $this->dashboard_model->prod_fitter();

		if ($this->input->post('keyword')) {
			$data['data_epms'] = $this->epms_model->cariData();
		}

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('epms/manage-production', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function prod_welder()
	{
		$this->load->model('dashboard_model');
		$data['judul'] = 'Data PMS Dept. Production ( Spool Fab. Welder )';

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['data_epms'] = $this->dashboard_model->prod_welder();

		if ($this->input->post('keyword')) {
			$data['data_epms'] = $this->epms_model->cariData();
		}

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('epms/manage-production', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function prod_th()
	{
		$this->load->model('dashboard_model');
		$data['judul'] = 'Data PMS Dept. Production ( TH )';

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['data_epms'] = $this->dashboard_model->prod_th();

		if ($this->input->post('keyword')) {
			$data['data_epms'] = $this->epms_model->cariData();
		}

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('epms/manage-production', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function prod_wol()
	{
		$this->load->model('dashboard_model');
		$data['judul'] = 'Data PMS Dept. Production ( WOL )';

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['data_epms'] = $this->dashboard_model->prod_wol();

		if ($this->input->post('keyword')) {
			$data['data_epms'] = $this->epms_model->cariData();
		}

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('epms/manage-production', $data);
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
}
