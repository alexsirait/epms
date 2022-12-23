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

class epms extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//is_logged_in();

		$userSecure = $this->db->get_where('fix_epms', ['username' => $this->session->userdata('username')])->row_array();
        //if ($userSecure['password_changed'] == 0) {
          //  redirect('login/forcepassword');
        //}

		$this->load->model('epms_model');
		$this->load->library(array('form_validation'));
	}

	public function index()
	{

		$this->load->model('epms_model');
		$data['title'] = 'Data';
		$data['data_epms'] = $this->epms_model->getAllInput();
		if ($this->input->post('keyword')) {
			$data['form'] = $this->epms_model->cariData();
		}
		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('epms/index', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function chart()
	{
		$this->load->model('epms_model');
		$data['title'] = 'Data';
		$data['data_epms'] = $this->epms_model->getAllInput();
		if ($this->input->post('keyword')) {
			$data['form'] = $this->epms_model->cariData();
		}
		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('epms/chart', $data);

		$query1 =  $this->db->query("SELECT employee_id as count, department as dept FROM form GROUP BY department"); 
		$record1 = $query1->result();
		$data1 = [];
		foreach($record1 as $row1) {
            $data1['label1'][] = $row1->dept;
            $data1['data1'][] = (int) $row1->count;
		}

		$query2 =  $this->db->query("SELECT rating3A_1 as count, department as dept FROM form GROUP BY rating3A_1"); 
		$record2 = $query1->result();
		$data2 = [];
		foreach($record2 as $row2) {
            $data2['label2'][] = $row2->dept;
            $data2['data2'][] = (int) $row2->count;
		}
      $data['chart_data1'] = json_encode($data1);
	  $data['chart_data2'] = json_encode($data2);
      $this->load->view('epms/chart',$data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function rating_criteria()
	{
		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();
		// load view rating-criteria.php
		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view("epms/rating-criteria");
		$this->load->view('templates/footer');
		$this->load->view('templates/footer_login');
	}

	public function filling_instruction()
	{
		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();
		// load view filling_instruction.php
		$this->load->view('templates/header_login', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view("epms/filling_instruction");
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
		$this->load->view('epms/security', $data);
		$this->load->view('templates/header', $data);


		$this->load->view('templates/footer_login');
	}


	public function tambah()
	{
		$activeSession = $this->session->userdata('id');
		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['title'] = 'Form Performance Management System';
		$this->form_validation->set_rules('full_name', 'full_name', 'required');
		$this->form_validation->set_rules('employee_id', 'employee_id', 'required');
		$this->form_validation->set_rules('name', 'Employee Name', 'required');
		$this->form_validation->set_rules('department', 'department', 'required');
		$this->form_validation->set_rules('designation', 'designation', 'required');
		$this->form_validation->set_rules('section', 'section', 'required');
		$this->form_validation->set_rules('direct_leader', 'direct_leader');
		$this->form_validation->set_rules('status', 'status');
		$this->form_validation->set_rules('location', 'location');
		$this->form_validation->set_rules('period_from', 'period_from');
		$this->form_validation->set_rules('period_to', 'period_to');
		$this->form_validation->set_rules('summary', 'summary');
		$this->form_validation->set_rules('incident', 'incident');
		$this->form_validation->set_rules('dafw', 'dafw');

		$this->form_validation->set_rules('mvc', 'mvc');
		$this->form_validation->set_rules('covid', 'covid');
		$this->form_validation->set_rules('safety', 'safety');
		$this->form_validation->set_rules('hse', 'hse');
		$this->form_validation->set_rules('rating3A_1', 'rating3A_1');
		$this->form_validation->set_rules('routine1', 'routine1');
		$this->form_validation->set_rules('routine1_result', 'routine1_result');

		$this->form_validation->set_rules('rating3A_2', 'rating3A_2');
		$this->form_validation->set_rules('routine2', 'routine2');
		$this->form_validation->set_rules('routine2_result', 'routine2_result');
		$this->form_validation->set_rules('rating3A_3', 'rating3A_3');
		$this->form_validation->set_rules('routine3', 'routine3');
		$this->form_validation->set_rules('routine3_result', 'routine3_result');
		$this->form_validation->set_rules('rating3A_4', 'rating3A_4');

		$this->form_validation->set_rules('routine4', 'routine4');
		$this->form_validation->set_rules('routine4_result', 'routine4_result');
		$this->form_validation->set_rules('rating3A_5', 'rating3A_5');
		$this->form_validation->set_rules('routine5', 'routine5');
		$this->form_validation->set_rules('routine5_result', 'routine5_result');
		$this->form_validation->set_rules('rating3A_6', 'rating3A_6');
		$this->form_validation->set_rules('non_routine1', 'non_routine1');

		$this->form_validation->set_rules('non_routine1_result', 'non_routine1_result');
		$this->form_validation->set_rules('rating3A_7', 'rating3A_7');
		$this->form_validation->set_rules('non_routine2', 'non_routine2');
		$this->form_validation->set_rules('non_routine2_result', 'non_routine2_result');
		$this->form_validation->set_rules('rating3A_9', 'rating3A_9');
		$this->form_validation->set_rules('non_routine3', 'non_routine3');
		$this->form_validation->set_rules('non_routine3_result', 'non_routine3_result');

		$this->form_validation->set_rules('rating3A_9', 'rating3A_9');
		$this->form_validation->set_rules('non_routine4', 'non_routine4');
		$this->form_validation->set_rules('non_routine4_result', 'non_routine4_result');
		$this->form_validation->set_rules('rating3A_10', 'rating3A_10');
		$this->form_validation->set_rules('non_routine5', 'non_routine5');
		$this->form_validation->set_rules('non_routine5_result', 'non_routine5_result');
		$this->form_validation->set_rules('rating3A_11', 'rating3A_11');

		$this->form_validation->set_rules('competency_development1', 'competency_development1');
		$this->form_validation->set_rules('competency_development_result1', 'competency_development_result1');
		$this->form_validation->set_rules('rating3B_1', 'rating3B_1');
		$this->form_validation->set_rules('rating3B_1', 'rating3B_1');
		$this->form_validation->set_rules('competency_development2', 'competency_development2');
		$this->form_validation->set_rules('competency_development_result2', 'competency_development_result2');
		$this->form_validation->set_rules('rating3B_2', 'rating3B_2');

		$this->form_validation->set_rules('competency_development3', 'competency_development3');
		$this->form_validation->set_rules('competency_development_result3', 'competency_development_result3');
		$this->form_validation->set_rules('rating3B_3', 'rating3B_3');
		$this->form_validation->set_rules('competency_development4', 'competency_development4');
		$this->form_validation->set_rules('competency_development_result4', 'competency_development_result4');
		$this->form_validation->set_rules('rating3B_4', 'rating3B_4');
		$this->form_validation->set_rules('teamwork_result', 'teamwork_result');

		$this->form_validation->set_rules('rating3C_1', 'rating3C_1');
		$this->form_validation->set_rules('flexibility_result', 'flexibility_result');
		$this->form_validation->set_rules('rating3C_2', 'rating3C_2');
		$this->form_validation->set_rules('attendance_rate', 'attendance_rate');
		$this->form_validation->set_rules('attendance_violation', 'attendance_violation');
		$this->form_validation->set_rules('mc_case', 'mc_case');
		$this->form_validation->set_rules('warning1', 'warning1');

		$this->form_validation->set_rules('warning2', 'warning2');
		$this->form_validation->set_rules('warning3', 'warning3');
		$this->form_validation->set_rules('rating3C_3', 'rating3C_3');
		$this->form_validation->set_rules('building_result', 'building_result');
		$this->form_validation->set_rules('rating3C_4', 'rating3C_4');
		$this->form_validation->set_rules('planning_result', 'planning_result');
		$this->form_validation->set_rules('rating3C_5', 'rating3C_5');

		$this->form_validation->set_rules('leadership_result', 'leadership_result');
		$this->form_validation->set_rules('rating3C_6', 'rating3C_6');
		$this->form_validation->set_rules('costumer_result', 'costumer_result');
		$this->form_validation->set_rules('rating3C_7', 'rating3C_7');
		$this->form_validation->set_rules('integrity_result', 'integrity_result');
		$this->form_validation->set_rules('rating3C_8', 'rating3C_8');
		$this->form_validation->set_rules('first_rating', 'first_rating');

		$this->form_validation->set_rules('final_rating', 'final_rating');
		$this->form_validation->set_rules('part_4_note', 'part_4_note');
		$this->form_validation->set_rules('part_4_emp_name', 'part_4_emp_name');
		$this->form_validation->set_rules('part_4_emp_sign', 'part_4_emp_sign');
		$this->form_validation->set_rules('part_4_date1', 'part_4_date1');
		$this->form_validation->set_rules('part_4_dirleader_name', 'part_4_dirleader_name');
		$this->form_validation->set_rules('part_4_dirleader_sign', 'part_4_dirleader_sign');

		$this->form_validation->set_rules('part_4_date2', 'part_4_date2');
		$this->form_validation->set_rules('manager', 'manager');
		$this->form_validation->set_rules('part_4_nextleader_sign', 'part_4_nextleader_sign');
		$this->form_validation->set_rules('part_4_date3', 'part_4_date3');
		$this->form_validation->set_rules('part_5_competency1', 'part_5_competency1');
		$this->form_validation->set_rules('part_5_competency2', 'part_5_competency2');
		$this->form_validation->set_rules('part_5_competency3', 'part_5_competency3');

		$this->form_validation->set_rules('part_5_competency_remarks', 'part_5_competency_remarks');
		$this->form_validation->set_rules('part_5_skill1', 'part_5_skill1');
		$this->form_validation->set_rules('part_5_skill2', 'part_5_skill2');
		$this->form_validation->set_rules('part_5_skill3', 'part_5_skill3');
		$this->form_validation->set_rules('part_5_skill_remarks', 'part_5_skill_remarks');
		$this->form_validation->set_rules('part_5_recposition1', 'part_5_recposition1');
		$this->form_validation->set_rules('part_5_recposition2', 'part_5_recposition2');

		$this->form_validation->set_rules('part_5_recposition_remarks', 'part_5_recposition_remarks');
		$this->form_validation->set_rules('part_5_rotateposition', 'part_5_rotateposition');
		$this->form_validation->set_rules('part_5_transferposition', 'part_5_transferposition');
		$this->form_validation->set_rules('part_5_otherposition_remarks', 'part_5_otherposition_remarks');
		$this->form_validation->set_rules('part_5_note', 'part_5_note');
		$this->form_validation->set_rules('part_5_note_remarks', 'part_5_note_remarks');
		$this->form_validation->set_rules('emp_submit', 'emp_submit');

		$this->form_validation->set_rules('dirleader_approve', 'dirleader_approve');
		$this->form_validation->set_rules('nextleader_approve', 'nextleader_approve');
		// $this->form_validation->set_rules('exit_time', 'Time Out', 'required');
		// $this->form_validation->set_rules('exit_name', 'Security Name', 'required');
		// $this->form_validation->set_rules('entry_time', 'Time In', 'required');
		// $this->form_validation->set_rules('entry_name', 'Security Name', 'required');
		// $this->form_validation->set_rules('use_car', 'Use Car', 'required');
		// $this->form_validation->set_rules('car_type', 'Car Type', 'required');
		// $this->form_validation->set_rules('plat_number', 'Plat Number', 'required');
		// $this->form_validation->set_rules('car_condition', 'Spesific Car Condition', 'required');

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();
		
		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>$this->session->userdata('username')])->row_array();

		$data['data_epms'] = $this->dashboard_model->getPersonalFormbyID($data['fix_epms']['employee_id']);


		if ($this->form_validation->run() == FALSE) {

			$this->load->view('templates/header_login');
			$this->load->view('templates/header', $data);
			$this->load->view('templates/dashboard', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('epms/tambah', $data);
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
			 redirect('Home/personal');
		}
	}

	public function submit()
	{
		
		// 
		$data = array(
			"level_id" => $this->input->post('level_id'),
			"full_name" => $this->input->post('full_name'),
			"employee_id" => $this->input->post('employee_id'),
			"department" => $this->input->post('department'),
			"designation" => $this->input->post('designation'),
			"section" => $this->input->post('section'),
			"direct_leader" => $this->input->post('direct_leader'),
			"direct_leader_id" => $this->input->post('direct_leader_id'),
			"status" => $this->input->post('status'),
			"location" => $this->input->post('location'),
			"period_from" => $this->input->post('period_from'),
			"period_to" => $this->input->post('period_to'),
			"summary" => $this->input->post('summary'),
			"incident" => $this->input->post('incident'),
			"dafw" => $this->input->post('dafw'),
			"mvc" => $this->input->post('mvc'),
			"covid" => $this->input->post('covid'),
			"safety" => $this->input->post('safety'),
			"hse" => $this->input->post('hse'),
			"rating3A_1" => $this->input->post('rating3A_1'),

			"routine1" => $this->input->post('routine1'),
			"routine1_result" => $this->input->post('routine1_result'),
			"rating3A_2" => $this->input->post('rating3A_2'),

			"routine2" => $this->input->post('routine2'),
			"routine2_result" => $this->input->post('routine2_result'),
			"rating3A_3" => $this->input->post('rating3A_3'),

			"routine3" => $this->input->post('routine3'),
			"routine3_result" => $this->input->post('routine3_result'),
			"rating3A_4" => $this->input->post('rating3A_4'),

			"routine4" => $this->input->post('routine4'),
			"routine4_result" => $this->input->post('routine4_result'),
			"rating3A_5" => $this->input->post('rating3A_5'),

			"routine5" => $this->input->post('routine5'),
			"routine5_result" => $this->input->post('routine5_result'),
			"rating3A_6" => $this->input->post('rating3A_6'),

			"non_routine1" => $this->input->post('non_routine1'),
			"non_routine1_result" => $this->input->post('non_routine1_result'),
			"rating3A_7" => $this->input->post('rating3A_7'),

			"non_routine2" => $this->input->post('non_routine2'),
			"non_routine2_result" => $this->input->post('non_routine2_result'),
			"rating3A_8" => $this->input->post('rating3A_8'),

			"non_routine3" => $this->input->post('non_routine3'),
			"non_routine3_result" => $this->input->post('non_routine3_result'),
			"rating3A_9" => $this->input->post('rating3A_9'),

			"non_routine4" => $this->input->post('non_routine4'),
			"non_routine4_result" => $this->input->post('non_routine4_result'),
			"rating3A_10" => $this->input->post('rating3A_10'),

			"non_routine5" => $this->input->post('non_routine5'),
			"non_routine5_result" => $this->input->post('non_routine5_result'),
			"rating3A_11" => $this->input->post('rating3A_11'),

			"competency_development1" => $this->input->post('competency_development1'),
			"competency_development_result1" => $this->input->post('competency_development_result1'),
			"rating3B_1" => $this->input->post('rating3B_1'),

			"competency_development2" => $this->input->post('competency_development2'),
			"competency_development_result2" => $this->input->post('competency_development_result2'),
			"rating3B_2" => $this->input->post('rating3B_2'),

			"competency_development3" => $this->input->post('competency_development3'),
			"competency_development_result3" => $this->input->post('competency_development_result3'),
			"rating3B_3" => $this->input->post('rating3B_3'),

			"competency_development4" => $this->input->post('competency_development4'),
			"competency_development_result4" => $this->input->post('competency_development_result4'),
			"rating3B_4" => $this->input->post('rating3B_4'),

			"teamwork_result" => $this->input->post('teamwork_result'),

			"rating3C_1" => $this->input->post('rating3C_1'),

			"flexibility_result" => $this->input->post('flexibility_result'),
			"rating3C_2" => $this->input->post('rating3C_2'),

			"attendance_rate" => $this->input->post('attendance_rate'),
			"attendance_violation" => $this->input->post('attendance_violation'),
			"mc_case" => $this->input->post('mc_case'),
			"warning1" => $this->input->post('warning1'),
			"warning2" => $this->input->post('warning2'),
			"warning3" => $this->input->post('warning3'),
			"rating3C_3" => $this->input->post('rating3C_3'),

			"building_result" => $this->input->post('building_result'),
			"rating3C_4" => $this->input->post('rating3C_4'),

			"planning_result" => $this->input->post('planning_result'),
			"rating3C_5" => $this->input->post('rating3C_5'),

			"leadership_result" => $this->input->post('leadership_result'),
			"rating3C_6" => $this->input->post('rating3C_6'),

			"costumer_result" => $this->input->post('costumer_result'),
			"rating3C_7" => $this->input->post('rating3C_7'),

			"integrity_result" => $this->input->post('integrity_result'),
			"rating3C_8" => $this->input->post('rating3C_8'),

			"first_rating" => $this->input->post('first_rating'),
			"final_rating" => $this->input->post('final_rating'),

			"part_4_note" => $this->input->post('part_4_note'),
			"part_4_emp_name" => $this->input->post('part_4_emp_name'),
			"part_4_emp_sign" => $this->input->post('part_4_emp_sign'),
			"part_4_date1" => $this->input->post('part_4_date1'),
			"part_4_dirleader_name" => $this->input->post('part_4_dirleader_name'),
			"part_4_dirleader_sign" => $this->input->post('part_4_dirleader_sign'),
			"part_4_date2" => $this->input->post('part_4_date2'),
			"manager" => $this->input->post('manager'),
			"part_4_nextleader_sign" => $this->input->post('part_4_nextleader_sign'),
			"part_4_date3" => $this->input->post('part_4_date3'),
			"part_5_competency1" => $this->input->post('part_5_competency1'),
			"part_5_competency2" => $this->input->post('part_5_competency2'),
			"part_5_competency3" => $this->input->post('part_5_competency3'),
			"part_5_competency_remarks" => $this->input->post('part_5_competency_remarks'),
			"part_5_skill1" => $this->input->post('part_5_skill1'),
			"part_5_skill2" => $this->input->post('part_5_skill2'),
			"part_5_skill3" => $this->input->post('part_5_skill3'),
			"part_5_skill_remarks" => $this->input->post('part_5_skill_remarks'),
			"part_5_recposition1" => $this->input->post('part_5_recposition1'),
			"part_5_recposition2" => $this->input->post('part_5_recposition2'),
			"part_5_recposition_remarks" => $this->input->post('part_5_recposition_remarks'),
			"part_5_rotateposition" => $this->input->post('part_5_rotateposition'),
			"part_5_transferposition" => $this->input->post('part_5_transferposition'),
			"part_5_otherposition_remarks" => $this->input->post('part_5_otherposition_remarks'),
			"part_5_note" => $this->input->post('part_5_note'),
			"part_5_note_remarks" => $this->input->post('part_5_note_remarks'),
			"emp_submit" => $this->input->post('emp_submit'),
			"dirleader_approve" => $this->input->post('dirleader_approve'),
			"nextleader_approve" => $this->input->post('nextleader_approve'),
			"email" => $this->input->post('email'),
			"direct_leader_email" => $this->input->post('direct_leader_email'),
			"manager_email" => $this->input->post('manager_email'),
			 );
		$this->load->model('epms_model');
		$this->epms_model->submit($data);

		redirect('Home/employee');
	}

	public function hapus($id){
		$this->load->model('epms_model');
		$this->epms_model->del_by_id('form', $id);
		redirect('Home/employee');
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
	// 		$this->load->view('epms/tambah', $data);
	// 		$this->load->view('templates/footer');
	// 		// $this->load->view('templates/footer_login');
	// 	} else {
	// 		$this->epms_model->InputLocation();
	// 		$this->session->set_flashdata('flash', 'Waiting for approval');
	// 		redirect('Home/personal');
	// 	}
	// }

	//public function hapus($id)
	//{
	//	$this->epms_model->hapusData($id);
	//	$this->session->set_flashdata('flash', 'Deleted');
	//	redirect('epms');
	//}

	function CheckDelete()
	{
		if ($this->input->post("pf") == null)	
			return;
		foreach ($this->input->post("pf") as $data)
		{
			$tables = ["form"];
			foreach ($tables as $table)
			{
				$this->db->where('form_id', $data);
				$this->db->delete($table);
				$this->db->affected_rows();
			}
		}
		$this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert"> Deleted Succesfully!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('epms/index');	
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

	public function ubah($form_id)
	{
		$data['title'] = '  Performance Management System';

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();
		
		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>$this->session->userdata('username')])->row_array();

		$data['data_epms'] = $this->dashboard_model->get_data_by_id('form',$form_id)->row();
		
		
			$this->load->view('templates/header_login', $data);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/dashboard', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('epms/ubah', $data);
			$this->load->view('templates/footer');
	}

	public function ubahdl($form_id)
	{
		$data['title'] = '  Performance Management System';

		$data['admin'] = $this->db->get_where('fix_epms', ['username' =>
		$this->session->userdata('username')])->row_array();
		
		$data['fix_epms'] = $this->db->get_where('fix_epms', ['username' =>$this->session->userdata('username')])->row_array();

		$data['data_epms'] = $this->dashboard_model->get_data_by_id('form',$form_id)->row();
		
			$this->load->view('templates/header_login', $data);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/dashboard', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('epms/ubahdl', $data);
			$this->load->view('templates/footer');
	}

	public function approvaldl($employee_id){
		if ($employee_id == null) {
			$employee_id = $this->input->post('employee_id');
			$dataAccount = $this->epms_model->getemaildl($employee_id);
		}
	}

	public function approval($department = null, $id = null, $level_id = null, $type = null)
	{
		if ($id == null && $level_id == null && $type == null) {
			$id = $this->input->post('form_id');
			$level_id = $this->input->post('level_id');
			$type = $this->input->post('type');
			$department = $this->input->post('department');
		}
		$data = [];
		 switch ($level_id) {
		 	case '1':
		 		if ($type == 'Approved') {
		 			$data = array(
		 				'emp_submit' => 'Approved'
		 			);
		 		} elseif ($type == 'Rejected') {
		 			$data = array(
		 				'emp_submit' => 'Rejected'
		 			);
		 		}
		 		break;

		 	case '2':
		 		if ($type == 'Approved') {
		 			$data = array(
		 				'dirleader_approve' => 'Approved'
		 			);
		 		} elseif ($type == 'Rejected') {
		 			$data = array(
		 				'dirleader_approve' => 'Rejected'
		 			);
		 		}
		 		break;

		 	case '3':
		 		if ($type == 'Approved') {
		 			$data = array(
		 				'nextleader_approve' => 'Approved'
		 			);
		 		} elseif ($type == 'Rejected') {
		 			$data = array(
		 				'nextleader_approve' => 'Rejected'
		 			);
		 		}
		 		break;

		 	case '4':
		 		if ($type == 'Approved') {
		 			$data = array(
		 				'hrd' => 'Approved'
		 			);
		 		} elseif ($type == 'Rejected') {
		 			$data = array(
		 				'hrd' => 'Rejected'
		 			);
		 		}
		 		break;
		 }

		$this->epms_model->update_item($level_id, $id, $type);

		/*
		switch ($level_id) {
			case 1:
				$templevel = '2';
				$dataAccount = $this->epms_model->getEmailByLevelId($templevel, $id);
				if (

					$this->execMailer($dataAccount, $id, $templevel, $department)
				) {
					redirect(base_url());
				}
				break;

			case '2':
				$templevel = '3';
				$dataAccount = $this->epms_model->getEmailByLevelId($templevel, $id);
				if (

					$this->execMailer($dataAccount, $id, $templevel, $department)
				) {
					redirect(base_url());
				}
				break;

			case '3':
				$templevel = '4';
				$dataAccount = $this->epms_model->getEmailByLevelId($templevel, $id);
				// return	$this->output->set_content_type('application/json')->set_status_header(200)->set_output(

				if (

					$this->execMailer($dataAccount, $id, $templevel, $department)
				) {
					redirect(base_url());
				}
				// );

				break;

			default:

				break;
		}
		*/
	}

	function update(){
		$data = array(
			"form_id" => $this->input->post('form_id'),
			"level_id" => $this->input->post('level_id'),
			"full_name" => $this->input->post('full_name'),
			"employee_id" => $this->input->post('employee_id'),
			"department" => $this->input->post('department'),
			"designation" => $this->input->post('designation'),
			"section" => $this->input->post('section'),
			"direct_leader" => $this->input->post('direct_leader'),
			"direct_leader_id" => $this->input->post('direct_leader_id'),
			"status" => $this->input->post('status'),
			"location" => $this->input->post('location'),
			"period_from" => $this->input->post('period_from'),
			"period_to" => $this->input->post('period_to'),
			"summary" => $this->input->post('summary'),
			"incident" => $this->input->post('incident'),
			"dafw" => $this->input->post('dafw'),
			"mvc" => $this->input->post('mvc'),
			"covid" => $this->input->post('covid'),
			"safety" => $this->input->post('safety'),
			"hse" => $this->input->post('hse'),
			"rating3A_1" => $this->input->post('rating3A_1'),

			"routine1" => $this->input->post('routine1'),
			"routine1_result" => $this->input->post('routine1_result'),
			"rating3A_2" => $this->input->post('rating3A_2'),

			"routine2" => $this->input->post('routine2'),
			"routine2_result" => $this->input->post('routine2_result'),
			"rating3A_3" => $this->input->post('rating3A_3'),

			"routine3" => $this->input->post('routine3'),
			"routine3_result" => $this->input->post('routine3_result'),
			"rating3A_4" => $this->input->post('rating3A_4'),

			"routine4" => $this->input->post('routine4'),
			"routine4_result" => $this->input->post('routine4_result'),
			"rating3A_5" => $this->input->post('rating3A_5'),

			"routine5" => $this->input->post('routine5'),
			"routine5_result" => $this->input->post('routine5_result'),
			"rating3A_6" => $this->input->post('rating3A_6'),

			"non_routine1" => $this->input->post('non_routine1'),
			"non_routine1_result" => $this->input->post('non_routine1_result'),
			"rating3A_7" => $this->input->post('rating3A_7'),

			"non_routine2" => $this->input->post('non_routine2'),
			"non_routine2_result" => $this->input->post('non_routine2_result'),
			"rating3A_8" => $this->input->post('rating3A_8'),

			"non_routine3" => $this->input->post('non_routine3'),
			"non_routine3_result" => $this->input->post('non_routine3_result'),
			"rating3A_9" => $this->input->post('rating3A_9'),

			"non_routine4" => $this->input->post('non_routine4'),
			"non_routine4_result" => $this->input->post('non_routine4_result'),
			"rating3A_10" => $this->input->post('rating3A_10'),

			"non_routine5" => $this->input->post('non_routine5'),
			"non_routine5_result" => $this->input->post('non_routine5_result'),
			"rating3A_11" => $this->input->post('rating3A_11'),

			"competency_development1" => $this->input->post('competency_development1'),
			"competency_development_result1" => $this->input->post('competency_development_result1'),
			"rating3B_1" => $this->input->post('rating3B_1'),

			"competency_development2" => $this->input->post('competency_development2'),
			"competency_development_result2" => $this->input->post('competency_development_result2'),
			"rating3B_2" => $this->input->post('rating3B_2'),

			"competency_development3" => $this->input->post('competency_development3'),
			"competency_development_result3" => $this->input->post('competency_development_result3'),
			"rating3B_3" => $this->input->post('rating3B_3'),

			"competency_development4" => $this->input->post('competency_development4'),
			"competency_development_result4" => $this->input->post('competency_development_result4'),
			"rating3B_4" => $this->input->post('rating3B_4'),

			"teamwork_result" => $this->input->post('teamwork_result'),

			"rating3C_1" => $this->input->post('rating3C_1'),

			"flexibility_result" => $this->input->post('flexibility_result'),
			"rating3C_2" => $this->input->post('rating3C_2'),

			"attendance_rate" => $this->input->post('attendance_rate'),
			"attendance_violation" => $this->input->post('attendance_violation'),
			"mc_case" => $this->input->post('mc_case'),
			"warning1" => $this->input->post('warning1'),
			"warning2" => $this->input->post('warning2'),
			"warning3" => $this->input->post('warning3'),
			"rating3C_3" => $this->input->post('rating3C_3'),

			"building_result" => $this->input->post('building_result'),
			"rating3C_4" => $this->input->post('rating3C_4'),

			"planning_result" => $this->input->post('planning_result'),
			"rating3C_5" => $this->input->post('rating3C_5'),

			"leadership_result" => $this->input->post('leadership_result'),
			"rating3C_6" => $this->input->post('rating3C_6'),

			"costumer_result" => $this->input->post('costumer_result'),
			"rating3C_7" => $this->input->post('rating3C_7'),

			"integrity_result" => $this->input->post('integrity_result'),
			"rating3C_8" => $this->input->post('rating3C_8'),

			"first_rating" => $this->input->post('first_rating'),
			"final_rating" => $this->input->post('final_rating'),

			"part_4_note" => $this->input->post('part_4_note'),
			"part_4_emp_name" => $this->input->post('part_4_emp_name'),
			"part_4_emp_sign" => $this->input->post('part_4_emp_sign'),
			"part_4_date1" => $this->input->post('part_4_date1'),
			"part_4_dirleader_name" => $this->input->post('part_4_dirleader_name'),
			"part_4_dirleader_sign" => $this->input->post('part_4_dirleader_sign'),
			"part_4_date2" => $this->input->post('part_4_date2'),
			"manager" => $this->input->post('manager'),
			"part_4_nextleader_sign" => $this->input->post('part_4_nextleader_sign'),
			"part_4_date3" => $this->input->post('part_4_date3'),
			"part_5_competency1" => $this->input->post('part_5_competency1'),
			"part_5_competency2" => $this->input->post('part_5_competency2'),
			"part_5_competency3" => $this->input->post('part_5_competency3'),
			"part_5_competency_remarks" => $this->input->post('part_5_competency_remarks'),
			"part_5_skill1" => $this->input->post('part_5_skill1'),
			"part_5_skill2" => $this->input->post('part_5_skill2'),
			"part_5_skill3" => $this->input->post('part_5_skill3'),
			"part_5_skill_remarks" => $this->input->post('part_5_skill_remarks'),
			"part_5_recposition1" => $this->input->post('part_5_recposition1'),
			"part_5_recposition2" => $this->input->post('part_5_recposition2'),
			"part_5_recposition_remarks" => $this->input->post('part_5_recposition_remarks'),
			"part_5_rotateposition" => $this->input->post('part_5_rotateposition'),
			"part_5_transferposition" => $this->input->post('part_5_transferposition'),
			"part_5_otherposition_remarks" => $this->input->post('part_5_otherposition_remarks'),
			"part_5_note" => $this->input->post('part_5_note'),
			"part_5_note_remarks" => $this->input->post('part_5_note_remarks'),
			"emp_submit" => $this->input->post('emp_submit'),
			"dirleader_approve" => $this->input->post('dirleader_approve'),
			"nextleader_approve" => $this->input->post('nextleader_approve'),
			"email" => $this->input->post('email'),
			"direct_leader_email" => $this->input->post('direct_leader_email'),
			"manager_email" => $this->input->post('manager_email'),
			"sum1" => $this->input->post('sum1'),
			"sum2" => $this->input->post('sum2'),
			"sum3" => $this->input->post('sum3'),
		);
		$this->load->model('epms_model');
		$this->epms_model->update($this->input->post('form_id'), $data);
		redirect('home/index');
	}

	function updatedl(){
		$data = array(
			"form_id" => $this->input->post('form_id'),
			"level_id" => $this->input->post('level_id'),
			"full_name" => $this->input->post('full_name'),
			"employee_id" => $this->input->post('employee_id'),
			"department" => $this->input->post('department'),
			"designation" => $this->input->post('designation'),
			"section" => $this->input->post('section'),
			"direct_leader" => $this->input->post('direct_leader'),
			"direct_leader_id" => $this->input->post('direct_leader_id'),
			"status" => $this->input->post('status'),
			"location" => $this->input->post('location'),
			"period_from" => $this->input->post('period_from'),
			"period_to" => $this->input->post('period_to'),
			"summary" => $this->input->post('summary'),
			"incident" => $this->input->post('incident'),
			"dafw" => $this->input->post('dafw'),
			"mvc" => $this->input->post('mvc'),
			"covid" => $this->input->post('covid'),
			"safety" => $this->input->post('safety'),
			"hse" => $this->input->post('hse'),
			"rating3A_1" => $this->input->post('rating3A_1'),

			"routine1" => $this->input->post('routine1'),
			"routine1_result" => $this->input->post('routine1_result'),
			"rating3A_2" => $this->input->post('rating3A_2'),

			"routine2" => $this->input->post('routine2'),
			"routine2_result" => $this->input->post('routine2_result'),
			"rating3A_3" => $this->input->post('rating3A_3'),

			"routine3" => $this->input->post('routine3'),
			"routine3_result" => $this->input->post('routine3_result'),
			"rating3A_4" => $this->input->post('rating3A_4'),

			"routine4" => $this->input->post('routine4'),
			"routine4_result" => $this->input->post('routine4_result'),
			"rating3A_5" => $this->input->post('rating3A_5'),

			"routine5" => $this->input->post('routine5'),
			"routine5_result" => $this->input->post('routine5_result'),
			"rating3A_6" => $this->input->post('rating3A_6'),

			"non_routine1" => $this->input->post('non_routine1'),
			"non_routine1_result" => $this->input->post('non_routine1_result'),
			"rating3A_7" => $this->input->post('rating3A_7'),

			"non_routine2" => $this->input->post('non_routine2'),
			"non_routine2_result" => $this->input->post('non_routine2_result'),
			"rating3A_8" => $this->input->post('rating3A_8'),

			"non_routine3" => $this->input->post('non_routine3'),
			"non_routine3_result" => $this->input->post('non_routine3_result'),
			"rating3A_9" => $this->input->post('rating3A_9'),

			"non_routine4" => $this->input->post('non_routine4'),
			"non_routine4_result" => $this->input->post('non_routine4_result'),
			"rating3A_10" => $this->input->post('rating3A_10'),

			"non_routine5" => $this->input->post('non_routine5'),
			"non_routine5_result" => $this->input->post('non_routine5_result'),
			"rating3A_11" => $this->input->post('rating3A_11'),

			"competency_development1" => $this->input->post('competency_development1'),
			"competency_development_result1" => $this->input->post('competency_development_result1'),
			"rating3B_1" => $this->input->post('rating3B_1'),

			"competency_development2" => $this->input->post('competency_development2'),
			"competency_development_result2" => $this->input->post('competency_development_result2'),
			"rating3B_2" => $this->input->post('rating3B_2'),

			"competency_development3" => $this->input->post('competency_development3'),
			"competency_development_result3" => $this->input->post('competency_development_result3'),
			"rating3B_3" => $this->input->post('rating3B_3'),

			"competency_development4" => $this->input->post('competency_development4'),
			"competency_development_result4" => $this->input->post('competency_development_result4'),
			"rating3B_4" => $this->input->post('rating3B_4'),

			"teamwork_result" => $this->input->post('teamwork_result'),

			"rating3C_1" => $this->input->post('rating3C_1'),

			"flexibility_result" => $this->input->post('flexibility_result'),
			"rating3C_2" => $this->input->post('rating3C_2'),

			"attendance_rate" => $this->input->post('attendance_rate'),
			"attendance_violation" => $this->input->post('attendance_violation'),
			"mc_case" => $this->input->post('mc_case'),
			"warning1" => $this->input->post('warning1'),
			"warning2" => $this->input->post('warning2'),
			"warning3" => $this->input->post('warning3'),
			"rating3C_3" => $this->input->post('rating3C_3'),

			"building_result" => $this->input->post('building_result'),
			"rating3C_4" => $this->input->post('rating3C_4'),

			"planning_result" => $this->input->post('planning_result'),
			"rating3C_5" => $this->input->post('rating3C_5'),

			"leadership_result" => $this->input->post('leadership_result'),
			"rating3C_6" => $this->input->post('rating3C_6'),

			"costumer_result" => $this->input->post('costumer_result'),
			"rating3C_7" => $this->input->post('rating3C_7'),

			"integrity_result" => $this->input->post('integrity_result'),
			"rating3C_8" => $this->input->post('rating3C_8'),

			"first_rating" => $this->input->post('first_rating'),
			"final_rating" => $this->input->post('final_rating'),

			"part_4_note" => $this->input->post('part_4_note'),
			"part_4_emp_name" => $this->input->post('part_4_emp_name'),
			"part_4_emp_sign" => $this->input->post('part_4_emp_sign'),
			"part_4_date1" => $this->input->post('part_4_date1'),
			"part_4_dirleader_name" => $this->input->post('part_4_dirleader_name'),
			"part_4_dirleader_sign" => $this->input->post('part_4_dirleader_sign'),
			"part_4_date2" => $this->input->post('part_4_date2'),
			"manager" => $this->input->post('manager'),
			"part_4_nextleader_sign" => $this->input->post('part_4_nextleader_sign'),
			"part_4_date3" => $this->input->post('part_4_date3'),
			"part_5_competency1" => $this->input->post('part_5_competency1'),
			"part_5_competency2" => $this->input->post('part_5_competency2'),
			"part_5_competency3" => $this->input->post('part_5_competency3'),
			"part_5_competency_remarks" => $this->input->post('part_5_competency_remarks'),
			"part_5_skill1" => $this->input->post('part_5_skill1'),
			"part_5_skill2" => $this->input->post('part_5_skill2'),
			"part_5_skill3" => $this->input->post('part_5_skill3'),
			"part_5_skill_remarks" => $this->input->post('part_5_skill_remarks'),
			"part_5_recposition1" => $this->input->post('part_5_recposition1'),
			"part_5_recposition2" => $this->input->post('part_5_recposition2'),
			"part_5_recposition_remarks" => $this->input->post('part_5_recposition_remarks'),
			"part_5_rotateposition" => $this->input->post('part_5_rotateposition'),
			"part_5_transferposition" => $this->input->post('part_5_transferposition'),
			"part_5_otherposition_remarks" => $this->input->post('part_5_otherposition_remarks'),
			"part_5_note" => $this->input->post('part_5_note'),
			"part_5_note_remarks" => $this->input->post('part_5_note_remarks'),
			"emp_submit" => $this->input->post('emp_submit'),
			"dirleader_approve" => $this->input->post('dirleader_approve'),
			"nextleader_approve" => $this->input->post('nextleader_approve'),
			"email" => $this->input->post('email'),
			"direct_leader_email" => $this->input->post('direct_leader_email'),
			"manager_email" => $this->input->post('manager_email'),
			"sum1" => $this->input->post('sum1'),
			"sum2" => $this->input->post('sum2'),
			"sum3" => $this->input->post('sum3'),
		);
		$this->load->model('epms_model');
		$this->epms_model->update($this->input->post('form_id'), $data);

		
		redirect('home/index');
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

	/*
	public function approval($department = null, $id = null, $level_id = null, $type = null)
	{
		if ($id == null && $level_id == null && $type == null) {
			$id = $this->input->post('id');
			$level_id = $this->input->post('level_id');
			$type = $this->input->post('type');
			$department = $this->input->post('departement');
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

	}*/

	function mailer($dataAccount){
		foreach($dataAccount as $dAcc){
			$loginlink =  site_url() . 'login' . '"';
			$fullname = $dAcc["full_name"];
			$department = $dAcc["department"];

			$textContent = <<<HEREDOC
			Dear Sir/Madam $fullname, <br>
			Please kindly check, rate, and approve your staffs' Performance Management System form as you're their Direct Leader.
			<br><br>
			User Level : Direct Leader <br> Department : $department
			<p>Please click this link for your approval $loginlink </p>
			<p>Thank you,</p>
			<p>Cladtek HRIS</p>
			HEREDOC;

			$data = array(
				'title' 	=> 'Performance Management System approval',
				'content'	=> $textContent,
				'email' 	=> $dAcc['email'],
				'nama' 		=> $dAcc['full_name'],
				'department' => $dAcc['department'],

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
	}

	function mailerdl($dataAccount){
		foreach($dataAccount as $dAcc){
			$loginlink =  site_url() . 'login' . '"';
			$fullname = $dAcc["full_name"];
			$department = $dAcc["department"];

			$textContent = <<<HEREDOC
			Dear Sir/Madam $fullname, <br>
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
				'email' 	=> $dAcc['email'],
				'nama' 		=> $dAcc['full_name'],
				'department' => $dAcc['department'],

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
			Your staff asked for a Performance Management System approval with ID Employee $id, please click this link for your approval $loginlink
			<p>Thank you,</p>
			<p>Cladtek HRIS</p>
			HEREDOC;


			$data = array(
				'title' 	=> 'Performance Management System approval',
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

	public function sendEmail2($data)
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