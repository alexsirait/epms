<?php
defined('BASEPATH') or exit('No direct script access allowed');

class epms_model extends CI_Model
{
	public function getAllInput()
	{
		$this->db->where('form_status',0);
		return $this->db->get('form')->result_array();
	}

	//input data ke dalam tabel form
    function submit($data){
        $this->db->insert('form',$data);
		return;
    }

	function update($kode, $data){
		
		$this->db->where('form_id', $kode);
		$this->db->update('form', $data);
	}

	public function InputData($data)
	{
		$data = [
			"full_name" => $this->input->post('full_name'),
			"employee_id" => $this->input->post('employee_id'),
			"department" => $this->input->post('department'),
			"designation" => $this->input->post('designation'),
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
			// "exit_time" 	=> $this->input->post('exit_time', true),
			// "exit_name" 	=> $this->input->post('exit_name', true),
			// "entry_time" 	=> $this->input->post('entry_time', true),
			// "entry_name" 	=> $this->input->post('entry_name', true),
			// "use_car" 		=> $this->input->post('use_car', true),
			// "car_type" 		=> $this->input->post('car_type', true),
			// "plat_number" 	=> $this->input->post('plat_number', true),
			// "car_condition" => $this->input->post('car_condition', true),

		];

		$this->db->insert('form', $data);
	}
	

	// public function InputLocation()
	// {
	// 	$data = [
	// 		"id_location" 	=> $this->session->userdata('id_location'),
	// 		"location" 		=> $this->input->post('location', true),
	// 		"location2" 	=> $this->input->post('location2', true),
	// 		"location3" 	=> $this->input->post('location3', true),

	// 	];

	// 	$this->db->insert('location_destination', $data);
	// }

	public function tampil($table, $data)
	{
		//return $this->db->get('input')->result();
		return $this->db->get_where($table, $data);
	}

	// public function hapusData($id)
	// {
	// 	$this->db->where('id', $id);
	// 	$this->db->delete('form');
	// }
	
	function hapusData($id)
    {
		$tables = ["form"];
		foreach ($tables as $table)
		{
			$this->db->where('id', $id);
			$this->db->delete($table);
			$this->db->affected_rows();
		}
	 }

	 function del_by_id($table, $kode) {
		$this->db->where('form_id',$kode);
		$this->db->delete($table);
	}

	public function privilegeData($id)
	{
		$this->db->set('status',1);
		$this->db->where('id', $id);
		$this->db->update('form');
	// 	$query=$this->db->get();
    // return $query->num_rows();
		
	}

	function get_data_by_id($table, $kode){
		$this->db->where('form_id', $kode);
		return $this->db->get($table);
	}


	public function getDataByID($id)
	{
		return $this->db->get_where('form', ['form_id' => $id])->row_array();
	}

	public function UbahData()
	{
		$data = [

			"date" 			=> $this->input->post('date', true),
			"employee_id" 	=> $this->input->post('eid', true),
			"employee_name" => $this->input->post('name', true),
			"department" 	=> $this->input->post('department', true),
			// "location" 		=> $this->input->post('location', true),
			// "location2" 	=> $this->input->post('location2', true),
			// "location3" 	=> $this->input->post('location3', true),
			"reason" 		=> $this->input->post('reason', true),
			"purpose" 		=> $this->input->post('purpose', true),
			"employee" 		=> $this->input->post('employee', true),
			"direct_leader" => $this->input->post('direct_leader', true),
			"manager" 	=> $this->input->post('manager', true),
			"hrd	" 		=> $this->input->post('hrd', true),
			"exit_time" 	=> $this->input->post('exit_time', true),
			"exit_name" 	=> $this->input->post('exit_name', true),
			"entry_time" 	=> $this->input->post('entry_time', true),
			"entry_name" 	=> $this->input->post('entry_name', true),
			"use_car" 		=> $this->input->post('use_car', true),
			"car_type" 		=> $this->input->post('car_type', true),
			"plat_number" 	=> $this->input->post('plat_number', true),
			"car_condition" => $this->input->post('car_condition', true),

		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('form', $data);
	}

	public function cariData()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->like('employee_id', $keyword);
		$this->db->or_like('employee_name', $keyword);
		$this->db->or_like('department', $keyword);
		return $this->db->get('form')->result_array();
	}


	public function search_employee($title)
	{
		$this->db->like('employee_id', $title);
		$this->db->order_by('employee_id', 'ASC');
		$this->db->limit(10);
		return $this->db->get('employee')->result();
	}

	public function update_data($data, $where)
	{
		$this->db->where('employee_id', $where);
		$this->db->update('form', $data);
	}
	public function update_item($level_id, $id, $type)
	{
		switch ($level_id) {
			case '1':
				$this->db->set('emp_submit', $type);
				$this->db->where('form_id', $id);
				$this->db->update('form');
				break;

			case '2':
				$this->db->set('dirleader_approve', $type);
				$this->db->where('form_id', $id);
				$this->db->update('form');
				break;

			case '3':
				$this->db->set('nextleader_approve', $type);
				$this->db->where('form_id', $id);
				$this->db->update('form');
				break;
		}
	}
	public function getDataByFilter($table, $level, $departement)
	{
		$sql = "Select * from " . $table . " where level_id=" . $level . " and departement='" . str_replace('%20', ' ', $departement) . "'";

		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getDataByField($table, $key, $value)
	{
		$query = $this->db->get_where($table, array($key => $value));
		if (!empty($query->result_array())) {
			return $query->result_array();
			// die($query->row_array());
		}

		return false;
	}

	public function getemaildl($id){
		$sql = "SELECT direct_leader, direct_leader_email, department FROM `fix_epms` WHERE employee_id='" . $id . "'";

				$query = $this->db->query($sql);
				$result = [];
				foreach ($query->result_array() as $lead) {
					array_push($result, ["full_name" => $lead["direct_leader"], "email" => $lead["direct_leader_email"], "department" => $lead["department"]]);
				}
				return $result;
	}

	public function getemailmanager($id){
		$sql = "SELECT manager, manager_email, department, section FROM `fix_epms` WHERE employee_id='" . $id . "'";

				$query = $this->db->query($sql);
				$result = [];
				foreach ($query->result_array() as $lead) {
					array_push($result, ["full_name" => $lead["manager"], "email" => $lead["manager_email"], "department" => $lead["department"], "section" => $lead["section"]]);
				}
				return $result;
	}


	public function getEmailByLevelId($level_id, $id)
	{
		switch ($level_id) {
			case '1':
			case '2':
				$sql = "SELECT direct_leader,email_direct_leader1 FROM `employee` WHERE employee_id='" . $id . "'";

				$query = $this->db->query($sql);
				$result = [];
				foreach ($query->result_array() as $lead) {
					array_push($result, ["full_name" => $lead["direct_leader"], "email" => $lead["email_direct_leader1"]]);
				}
				return $result;
				break;

			case '3':
				$sql = "SELECT manager,email_manager FROM `employee` WHERE employee_id='" . $id . "'";

				$query = $this->db->query($sql);
				$result = [];
				foreach ($query->result_array() as $lead) {
					array_push($result, ["full_name" => $lead["manager"], "email" => $lead["email_manager"]]);
				}
				return $result;
				break;
			case '4':
				$sql = "Select * from admin where level_id='4'";
				$query = $this->db->query($sql);
				return $query->result_array();
				break;
			default:
				return [];
		}
	}

	public function getphoneByLevelId($level_id, $id)
	{
		switch ($level_id) {
			case '1':
			case '2':
				$sql = "SELECT direct_leader,phone_direct_leader1 FROM `employee` WHERE employee_id='" . $id . "'";

				$query = $this->db->query($sql);
				$result = [];
				foreach ($query->result_array() as $lead) {
					array_push($result, ["full_name" => $lead["direct_leader"], "phone" => $lead["phone_direct_leader1"]]);
				}
				return $result;
				break;

			case '3':
				$sql = "SELECT manager,email_manager FROM `employee` WHERE employee_id='" . $id . "'";

				$query = $this->db->query($sql);
				$result = [];
				foreach ($query->result_array() as $lead) {
					array_push($result, ["full_name" => $lead["manager"], "phone" => $lead["phone_manager"]]);
				}
				return $result;
				break;
			case '4':
				// $sql = "Select * from admin where level_id='4'";
				// $query = $this->db->query($sql);
				// return $query->result_array();
				// break;
				$sql = "SELECT manager,email_manager FROM `employee` WHERE employee_id='" . $id . "'";

				$query = $this->db->query($sql);
				$result = [];
				foreach ($query->result_array() as $lead) {
					array_push($result, ["full_name" => $lead["manager"], "phone" => $lead["phone_hrd"]]);
				}
				return $result;
				break;
			default:
				return [];
		}
	}

	public function hapus($getID, $table)
	{
        $this->db->where($getID);
        $this->db->delete($table);
	}
}
