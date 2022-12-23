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

class gatepass extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('epms_model');
		$this->load->library(array('form_validation'));
	}

	public function index()
	{

		$this->load->model('epms_model');
		$data['title'] = 'Data';
		$data['form'] = $this->epms_model->getAllInput();
		if ($this->input->post('keyword')) {
			$data['form'] = $this->epms_model->cariData();
		}
		$data['admin'] = $this->db->get_where('admin', ['username' =>
		$this->session->userdata('username')])->row_array();

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('gatepass/index', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function security()
	{

		$this->load->model('epms_model');
		$data['title'] = 'Data';
		$data['form'] = $this->epms_model->getAllInput();
		if ($this->input->post('keyword')) {
			$data['form'] = $this->epms_model->cariData();
		}
		$data['admin'] = $this->db->get_where('admin', ['username' =>
		$this->session->userdata('username')])->row_array();
		$this->load->view('templates/header_login', $data);
		$this->load->view('gatepass/security', $data);
		$this->load->view('templates/header', $data);


		$this->load->view('templates/footer_login');
	}


	public function tambah()
	{
		$activeSession = $this->session->userdata('id');
		$data['title'] = 'Form Gate Pass';
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('eid', 'Employee ID', 'required');
		$this->form_validation->set_rules('name', 'Employee Name', 'required');
		$this->form_validation->set_rules('department', 'Department', 'required');
		$this->form_validation->set_rules('location', 'Location Destination', 'required');
		$this->form_validation->set_rules('location2', 'Location Destination');
		$this->form_validation->set_rules('location3', 'Location Destination');
		$this->form_validation->set_rules('reason', 'Gate Pass Reason', 'required');
		$this->form_validation->set_rules('purpose', 'Gate Pass Remark', 'required');
		$this->form_validation->set_rules('employee', 'Requested by Employee', 'required');
		$this->form_validation->set_rules('direct_leader', 'Status Direct Leader');
		$this->form_validation->set_rules('manager', 'Status Dept.Manager / HOD');
		$this->form_validation->set_rules('hrd', 'Status Human Resources');
		// $this->form_validation->set_rules('exit_time', 'Time Out', 'required');
		// $this->form_validation->set_rules('exit_name', 'Security Name', 'required');
		// $this->form_validation->set_rules('entry_time', 'Time In', 'required');
		// $this->form_validation->set_rules('entry_name', 'Security Name', 'required');
		// $this->form_validation->set_rules('use_car', 'Use Car', 'required');
		// $this->form_validation->set_rules('car_type', 'Car Type', 'required');
		// $this->form_validation->set_rules('plat_number', 'Plat Number', 'required');
		// $this->form_validation->set_rules('car_condition', 'Spesific Car Condition', 'required');

		$data['form'] = $this->dashboard_model->getPersonalFormbyID($activeSession);
		$data['admin'] = $this->db->get_where('admin', ['username' =>
		$this->session->userdata('username')])->row_array();

		if ($this->form_validation->run() == FALSE) {

			$this->load->view('templates/header_login');
			$this->load->view('templates/header', $data);
			$this->load->view('templates/dashboard', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('gatepass/tambah', $data);
			$this->load->view('templates/footer');
			// $this->load->view('templates/footer_login');
			// $this->session->sess_destroy();
			// $pesan = '<div class="alert alert-danger">' . validation_errors() . '</div>';
			// $msg = array('validasi' => $pesan);
			// echo json_encode(array(
			// 	'msg' =>$msg,
			// 	'pesan' =>$pesan
			// ));
			
		} else {
			$this->epms_model->InputData();
			$pesan="Gate Pass data added successfully, waiting for approval !";
			$status = true;
		

			$log = array(
				'status' => $status,
				'pesan' => $pesan,
			);
	
			echo json_encode($log);
			return true;
			// redirect('Home/personal');
		}
	}

	// public function tambah_location()
	// {
	// 	$activeSession = $this->session->userdata('id');
	// 	$data['title'] = 'Form Gate Pass';
	// 	$this->form_validation->set_rules('location', 'Location Destination');
	// 	$this->form_validation->set_rules('location2', 'Location Destination');
	// 	$this->form_validation->set_rules('location3', 'Location Destination');

	// 	$data['location_destination'] = $this->dashboard_model->getPersonalFormbyID($activeSession);
	// 	$data['admin'] = $this->db->get_where('admin', ['username' =>
	// 	$this->session->userdata('username')])->row_array();

	// 	if ($this->form_validation->run() == FALSE) {
	// 		$this->load->view('templates/header_login');
	// 		$this->load->view('templates/header', $data);
	// 		$this->load->view('templates/dashboard', $data);
	// 		$this->load->view('templates/topbar', $data);
	// 		$this->load->view('gatepass/tambah', $data);
	// 		$this->load->view('templates/footer');
	// 		// $this->load->view('templates/footer_login');
	// 	} else {
	// 		$this->epms_model->InputLocation();
	// 		$this->session->set_flashdata('flash', 'Waiting for approval');
	// 		redirect('Home/personal');
	// 	}
	// }

	public function hapus($id)
	{
		$this->epms_model->hapusData($id);
		$this->session->set_flashdata('flash', 'Deleted');
		redirect('gatepass');
	}

	function CheckDelete()
	{
		if ($this->input->post("pf") == null)	
			return;
		foreach ($this->input->post("pf") as $data)
		{
			$tables = ["form"];
			foreach ($tables as $table)
			{
				$this->db->where('id', $data);
				$this->db->delete($table);
				$this->db->affected_rows();
			}
		}
		$this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert"> Deleted Succesfully!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('gatepass/index');	
	}
	function CheckDelete1()
	{
		if ($this->input->post("pf") == null)	
			return;
		foreach ($this->input->post("pf") as $data)
		{
			$tables = ["form"];
			foreach ($tables as $table)
			{
				$this->db->where('id', $data);
				$this->db->delete($table);
				$this->db->affected_rows();
			}
		}
		$this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert"> Deleted Succesfully!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('Home/history');	
	}


	function istimewa($id)
	{
		$this->epms_model->privilegeData($id);
		$this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert"> Open Succesfully!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('gatepass');
	}

	public function delete($id)
	{
		$this->epms_model->hapusData($id);
		$this->session->set_flashdata('flash', 'Deleted');
		redirect('Home/personal');
	}

	public function ubah($id)
	{
		$data['title'] = '  Gate Pass For Employee';
		$data['form'] = $this->epms_model->getDataByID($id);
		$data['purpose'] = ['Company - Return', 'Company - No Return', 'Personal - Return', 'Personal - No Return'];
		

		$data['admin'] = $this->db->get_where('admin', ['username' =>
		$this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('eid', 'Employee ID', 'required');
		$this->form_validation->set_rules('name', 'Employee Name', 'required');
		$this->form_validation->set_rules('department', 'Department', 'required');
		$this->form_validation->set_rules('location', 'Location Destination','required');
		$this->form_validation->set_rules('location2', 'Location Destination');
		$this->form_validation->set_rules('location3', 'Location Destination');
		$this->form_validation->set_rules('reason', 'Gate Pass Reason', 'required');
		$this->form_validation->set_rules('purpose', 'Gate Pass Remark', 'required');
		$this->form_validation->set_rules('employee', 'Status Employee');
		$this->form_validation->set_rules('direct_leader', 'Status Direct Leader');
		$this->form_validation->set_rules('manager', 'Status Dept.Manager / HOD');
		$this->form_validation->set_rules('hrd', 'Status Human Resources');
		

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header_login', $data);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/dashboard', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('gatepass/ubah', $data);
			$this->load->view('templates/footer');
			// $this->load->view('templates/footer_login');
		} else {
			$this->epms_model->UbahData();
			$this->session->set_flashdata('flash', 'update');
			redirect('gatepass');
		}
	}

	function get_autofill()
	{
		if (isset($_GET['term'])) {
			$result = $this->epms_model->search_employee($_GET['term']);
			if (count($result) > 0) {
				foreach ($result as $row)
					//$arr_result[] = $row->employee_id;
					$arr_result[] = array(
						'label' 		=> $row->employee_id,
						'employee_name' => $row->employee_name,
						'department' 	=> $row->department,
					);
				echo json_encode($arr_result);
			}
		}
	}

	public function approval($departement = null, $id = null, $level_id = null, $type = null)
	{
		if ($id == null && $level_id == null && $type == null) {
			$id = $this->input->post('id');
			$level_id = $this->input->post('level_id');
			$type = $this->input->post('type');
			$departement = $this->input->post('departement');
		}
		$data = [];

		$this->epms_model->update_item($level_id, $id, $type);


		switch ($level_id) {
			case 1:
				$templevel = '2';
				$dataAccount = $this->epms_model->getEmailByLevelId($templevel, $id);
				if (

					$this->execMailer($dataAccount, $id, $templevel, $departement)
				) {
					redirect(base_url());
				}
				break;

			case '2':
				$templevel = '3';
				$dataAccount = $this->epms_model->getEmailByLevelId($templevel, $id);
				if (

					$this->execMailer($dataAccount, $id, $templevel, $departement)
				) {
					redirect(base_url());
				}
				break;

			case '3':
				$templevel = '4';
				$dataAccount = $this->epms_model->getEmailByLevelId($templevel, $id);
				// return	$this->output->set_content_type('application/json')->set_status_header(200)->set_output(

				if (

					$this->execMailer($dataAccount, $id, $templevel, $departement)
				) {
					redirect(base_url());
				}
				// );

				break;

			default:

				break;
		}

		/* 
		1. SELECT ACCOUNT BERDASARKAN ROLE yang diinginkan
		2. Ambil data dari field "EMAIL" table "ACCOOUNT"
		3. Kita buat foreach(pengulangan pengiriman) email berdasarkan role yang diinginkan.

		foreach{...}

		*/
	}
	function execMailer($dataAccount, $id, $templevel, $departement)
	{
		foreach ($dataAccount as $dAcc) {
			$loginlink =  site_url() . 'login' . '"';
			// $acclink =  site_url() . 'approval/' . $departement . '/' . $id . '/' . $templevel . '/Approved' . '">Approve Gate Pass</a>';
			// $rejectlink = site_url() . 'approval/' . $departement . '/' . $id . '/' . $templevel . '/Rejected' . '">Reject Gate Pass</a>';
			$fullname = $dAcc["full_name"];

			$textContent = <<<HEREDOC
			Dear Sir/Madam $fullname,
			Your staff asked for a gate pass permit with ID Employee $id, please click this link for your approval $loginlink
			<p>Thank you,</p>
			<p>Cladtek HRIS</p>
			HEREDOC;


			$data = array(
				'title' 	=> 'Gate Pass approval',
				'content'	=> $textContent,
				'email' 	=> $dAcc['email'],
				'nama' 		=> $dAcc['full_name'],

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
		}
		return true;
		// return  json_encode(["result" => true]);
	}

		/* 
		1. SELECT ACCOUNT BERDASARKAN ROLE yang diinginkan
		2. Ambil data dari field "EMAIL" table "ACCOOUNT"
		3. Kita buat foreach(pengulangan pengiriman) email berdasarkan role yang diinginkan.

		foreach{...}

		*/

	public function acceptdl()
	{

		$id = $this->input->post('id');

		// $passwd = $this->input->post('passwd');
		$data = array(
			'direct_leader' => 'Approved'
		);
		echo $id;
		$this->epms_model->update_data($data, $id);
		redirect('login');
	}

	// rejecthrd
	public function rejectdl()
	{

		$id = $this->input->post('id');
		// $passwd = $this->input->post('passwd');
		$data = array(
			'direct_leader' => 'Rejected'
		);
		echo $id;
		$this->epms_model->update_data($data, $id);
		redirect('login');
	}

	// acceptceo
	public function acceptdm($data_id = null)
	{

		$id = $this->input->post('id');

		if ($data_id == null) {
			$id = $this->input->post('id');
		} elseif ($data_id != null) {
			$id = $data_id;
		}

		// $passwd = $this->input->post('passwd');
		$data = array(
			'manager' => 'Approved'
		);
		echo $id;
		$this->epms_model->update_data($data, $id);
		redirect('login');
	}

	// rejectceo
	public function rejectdm()
	{

		$id = $this->input->post('id');

		// $passwd = $this->input->post('passwd');
		$data = array(
			'manager' => 'Rejected'
		);
		echo $id;
		$this->epms_model->update_data($data, $id);
		redirect('login');
	}

	// acceptmng
	public function accepth()
	{

		$id = $this->input->post('id');

		// $passwd = $this->input->post('passwd');
		$data = array(
			'hrd' => 'Approved'
		);
		echo $id;
		$this->epms_model->update_data($data, $id);
		redirect('login');
	}

	// rejectmng
	public function rejecth()
	{

		$id = $this->input->post('id');

		// $passwd = $this->input->post('passwd');
		$data = array(
			'hrd' => 'Rejected'
		);
		echo $id;
		$this->epms_model->update_data($data, $id);
		redirect('login');
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
		$mail->Username   = 'situmeang9299@gmail.com';                     //SMTP username
		$mail->Password   = '085280371474';
		$mail->SMTPSecure = 'tls';                             //SMTP password
		$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		//Recipients
		$mail->setFrom('situmeang9299@gmail.com', 'Febrianti');
		$mail->addAddress($dAcc);     //Add a recipient
		//Name is optional
		$mail->addReplyTo('situmeang9299@gmail.com', 'Febrianti');


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

	public function notif_wa($departement = null, $id = null, $level_id = null, $type = null)
	{
		if ($id == null && $level_id == null && $type == null) {
			$id = $this->input->post('id');
			$level_id = $this->input->post('level_id');
			$type = $this->input->post('type');
			$departement = $this->input->post('departement');
		}
		$data = [];

		// $this->epms_model->update_item($level_id, $id, $type);


		switch ($level_id) {
			case 1:
				$templevel = '2';
				$dataAccount = $this->epms_model-> getphoneByLevelId($templevel, $id);
				if (

					$this->sendWA($dataAccount, $id, $templevel, $departement)
				) {
					redirect(base_url());
				}
				break;

			case '2':
				$templevel = '3';
				$dataAccount = $this->epms_model-> getphoneByLevelId($templevel, $id);
				if (

					$this->sendWA($dataAccount, $id, $templevel, $departement)
				) {
					redirect(base_url());
				}
				break;

			case '3':
				$templevel = '4';
				$dataAccount = $this->epms_model-> getphoneByLevelId($templevel, $id);
				// return	$this->output->set_content_type('application/json')->set_status_header(200)->set_output(

				if (

					$this->sendWA($dataAccount, $id, $templevel, $departement)
				) {
					redirect(base_url());
				}
				// );

				break;

			default:

				break;
		}

		/* 
		1. SELECT ACCOUNT BERDASARKAN ROLE yang diinginkan
		2. Ambil data dari field "EMAIL" table "ACCOOUNT"
		3. Kita buat foreach(pengulangan pengiriman) email berdasarkan role yang diinginkan.

		foreach{...}

		*/
	}
	function sendWA($dataAccount, $id, $templevel, $departement)
	{
		foreach ($dataAccount as $dAcc) {
			$loginlink =  site_url() . 'login' . '"';
			// $acclink =  site_url() . 'approval/' . $departement . '/' . $id . '/' . $templevel . '/Approved' . '">Approve Gate Pass</a>';
			// $rejectlink = site_url() . 'approval/' . $departement . '/' . $id . '/' . $templevel . '/Rejected' . '">Reject Gate Pass</a>';
			$fullname = $dAcc["full_name"];
		}

		$curl = curl_init();
		
		$data = [
			'phone' => $target['6281365489197'],
			'type' => 'text',
			'delay' => 0,
			'delay_req' => 0,
			'text' => $pesan
		];
		
		curl_setopt($curl, CURLOPT_HTTPHEADER,
			array(
				"Authorization: TOKEN MU",
			)
		);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($curl, CURLOPT_URL, "https://fonnte.com/api/send_message.php");
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		$result = curl_exec($curl);
		curl_close($curl);
		
		return $result;
		{
		if (isset($_POST['nomer']) and isset($_POST['nama']) and isset($_POST['pesan'])) {
		
			$nomer = $_POST['nomer'];
			$nama = $_POST['nama'];
			$pesan = $_POST['pesan'];
			
			if ($nomer == "" or $nama == "" or $pesan == "") {
				echo "Ulangi Lagi"; exit;
			} else {
				
				if(strpos(substr($nomer,0,3), '08') !== false){
					$awal = str_replace("08", "628", substr($nomer,0,3));
					$nomer = $awal. substr($nomer,3);
				}
				
				$kirim = json_decode(send($nomer, "Dear Sir/Madam $fullname, %0a Your staff asked for a gate pass permit with ID Employee $id, please click this link for your approval $loginlink %0a Thank you,%0a Cladtek HRIS"), true);
				$kirim1 = json_decode(send($nomer, "Thank you for contacting us. %0a This is a notification message that we have received your message, we'll get back in touch soon. %0a Thank you, %0a *this is a message to the customer*"), true);
				if ($kirim['status'] == true and $kirim1['status'] == true) {
					echo "Pesan telah dikirim"; exit;
				} else {
					echo "Pesan gagal dikirim"; exit;
				}
					
			}
			
			} else {
			echo "Silahkan coba lagi";
			}
		}
	}
}