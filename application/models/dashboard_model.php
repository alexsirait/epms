<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard_model extends CI_Model
{
    function direct_leader($full_name)
    {
        $this->db->select('*');
        $this->db->where('direct_leader', $full_name);

        return $this->db->get('form')->num_rows();
    }

    

    // function rejectdirect_leader()
    // {
    //     $query = "SELECT * FROM form WHERE direct_leader = Rejected";
    //     return $this->db->query($query)->result_array();;
    // }

    function manager($full_name)
    {
        $this->db->select('*');
        $this->db->where('manager', $full_name);

        return $this->db->get('form')->num_rows();
    }

    function hrd($full_name)
    {
        $this->db->select('*');
        $this->db->where('hrd', $full_name);
        // $this->db->where('hrd_name', 'Satoto Subandoro');

        return $this->db->get('form')->num_rows();
    }

    //per dept
    function dept_businessdev()
    {
        $this->db->select('*');
        $this->db->where('department', 'Business Development');

        return $this->db->get('form')->num_rows();
    }

    function dept_cladtek()
    {
        $this->db->select('*');
        $this->db->where('department', 'Cladtek');

        return $this->db->get('form')->num_rows();
    }

    function dept_design()
    {
        $this->db->select('*');
        $this->db->where('department', 'Design');

        return $this->db->get('form')->num_rows();
    }

    function dept_finance()
    {
        $this->db->select('*');
        $this->db->where('department', 'Finance & Accounting');

        return $this->db->get('form')->num_rows();
    }

    function dept_hse()
    {
        $this->db->select('*');
        $this->db->where('department', 'Health, Safety, & Environment');

        return $this->db->get('form')->num_rows();
    }

    function dept_hr()
    {
        $this->db->select('*');
        $this->db->where('department', 'Human Resource');

        return $this->db->get('form')->num_rows();
    }

    function dept_it()
    {
        $this->db->select('*');
        $this->db->where('department', 'IT & EPICOR');

        return $this->db->get('form')->num_rows();
    }

    function dept_me()
    {
        $this->db->select('*');
        $this->db->where('department', 'Maintanance & Engineering');

        return $this->db->get('form')->num_rows();
    }

    function dept_pi()
    {
        $this->db->select('*');
        $this->db->where('department', 'Process Improvement');

        return $this->db->get('form')->num_rows();
    }

    function dept_production()
    {
        $this->db->select('*');
        $this->db->where('department', 'Production');

        return $this->db->get('form')->num_rows();
    }

    //data per section production
    function prod_bending()
    {
        $this->db->where('section', 'Bending & HT');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function prod_blast()
    {
        $this->db->where('section', 'Blast & Paint');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function prod_equipment()
    {
        $this->db->where('section', 'Equipment & Build');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function prod_liner()
    {
        $this->db->where('section', 'Liner');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }
    function prod_machine()
    {
        $this->db->where('section', 'Machine Shop');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }
    function prod_material()
    {
        $this->db->where('section', 'Material Movement');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }
    function prod_manualrep()
    {
        $this->db->where('section', 'Manual Repair');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function prod_mlp()
    {
        $this->db->where('section', 'MLP');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }
    function prod_packing()
    {
        $this->db->where('section', 'Packing & Carpentry');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }
    function prod_production()
    {
        $this->db->where('section', 'Production');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }
    function prod_qh()
    {
        $this->db->where('section', 'QH');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function prod_shv()
    {
        $this->db->where('section', 'SHV');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }
    function prod_spool()
    {
        $this->db->where('section', 'Spool Fab.');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }
    function prod_fitter()
    {
        $this->db->where('section', 'Spool Fab. Fitter');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }
    function prod_welder()
    {
        $this->db->where('section', 'Spool Fab. Welder');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function prod_TH()
    {
        $this->db->where('section', 'TH');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }
    function prod_wol()
    {
        $this->db->where('section', 'WOL');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }


    //card per section production
    function sect_bending()
    {
        $this->db->select('*');
        $this->db->where('section', 'Bending & HT');

        return $this->db->get('form')->num_rows();
    }

    function sect_blast()
    {
        $this->db->select('*');
        $this->db->where('section', 'Blast & Paint');

        return $this->db->get('form')->num_rows();
    }

    function sect_equipment()
    {
        $this->db->select('*');
        $this->db->where('section', 'Equipment & Build');

        return $this->db->get('form')->num_rows();
    }

    function sect_liner()
    {
        $this->db->select('*');
        $this->db->where('section', 'Liner');

        return $this->db->get('form')->num_rows();
    }

    function sect_machine()
    {
        $this->db->select('*');
        $this->db->where('section', 'Machine Shop');

        return $this->db->get('form')->num_rows();
    }

    function sect_manualrep()
    {
        $this->db->select('*');
        $this->db->where('section', 'Manual Repair');

        return $this->db->get('form')->num_rows();
    }

    function sect_material()
    {
        $this->db->select('*');
        $this->db->where('section', 'Material Movement');

        return $this->db->get('form')->num_rows();
    }

    function sect_mlp()
    {
        $this->db->select('*');
        $this->db->where('section', 'MLP');

        return $this->db->get('form')->num_rows();
    }

    function sect_packing()
    {
        $this->db->select('*');
        $this->db->where('section', 'Packing & Carpentry');

        return $this->db->get('form')->num_rows();
    }

    function sect_production()
    {
        $this->db->select('*');
        $this->db->where('section', 'Production');

        return $this->db->get('form')->num_rows();
    }

    function sect_qh()
    {
        $this->db->select('*');
        $this->db->where('section', 'QH');

        return $this->db->get('form')->num_rows();
    }

    function sect_SHV()
    {
        $this->db->select('*');
        $this->db->where('section', 'SHV');

        return $this->db->get('form')->num_rows();
    }

    function sect_spool()
    {
        $this->db->select('*');
        $this->db->where('section', 'Spool Fab.');

        return $this->db->get('form')->num_rows();
    }

    function sect_fitter()
    {
        $this->db->select('*');
        $this->db->where('section', 'Spool Fab. Fitter');

        return $this->db->get('form')->num_rows();
    }

    function sect_welder()
    {
        $this->db->select('*');
        $this->db->where('section', 'Spool Fab. Welder');

        return $this->db->get('form')->num_rows();
    }

    function sect_th()
    {
        $this->db->select('*');
        $this->db->where('section', 'TH');

        return $this->db->get('form')->num_rows();
    }

    function sect_wol()
    {
        $this->db->select('*');
        $this->db->where('section', 'WOL');

        return $this->db->get('form')->num_rows();
    }

    function dept_prodauto()
    {
        $this->db->select('*');
        $this->db->where('department', 'Production Automation');

        return $this->db->get('form')->num_rows();
    }

    function dept_project()
    {
        $this->db->select('*');
        $this->db->where('department', 'Project (Others)');

        return $this->db->get('form')->num_rows();
    }

    function dept_projectop()
    {
        $this->db->select('*');
        $this->db->where('department', 'Project Operations');

        return $this->db->get('form')->num_rows();
    }

    function dept_qa()
    {
        $this->db->select('*');
        $this->db->where('department', 'Quality Assurance');

        return $this->db->get('form')->num_rows();
    }

    function dept_qc()
    {
        $this->db->select('*');
        $this->db->where('department', 'Quality Control');

        return $this->db->get('form')->num_rows();
    }

    function dept_scm()
    {
        $this->db->select('*');
        $this->db->where('department', 'Supply Chain Management');

        return $this->db->get('form')->num_rows();
    }

    function dept_technical()
    {
        $this->db->select('*');
        $this->db->where('department', 'Technical');

        return $this->db->get('form')->num_rows();
    }

    function hitunghrd()
    {
        $this->db->select('*');
        // $this->db->where('hrd', null);
        $this->db->where('hrd_name', 'Satoto Subandoro');

        return $this->db->get('employee')->num_rows();
    }

    function manage_data()
    {
        $this->db->select('*');
        $this->db->where('status',0);
        return $this->db->get('form')->num_rows();
    }

    function history_data()
    {
        $this->db->where('status',1);
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }


    function tampildirect_leader($full_name)
    {

        $this->db->where('direct_leader', $full_name);
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function tampilhod($full_name)
    {

        $this->db->where('manager',  $full_name);
        $this->db->where('dirleader_approve', 'Approve');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function tampilhrd($full_name)
    {

        $this->db->where('hrd', $full_name);
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    //per dept view
    function tampilhrd_business()
    {

        $this->db->where('department', 'Business Development');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function tampilhrd_cladtek()
    {

        $this->db->where('department', 'Cladtek');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function tampilhrd_design()
    {

        $this->db->where('department', 'Design');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function tampilhrd_finance()
    {

        $this->db->where('department', 'Finance & Accounting');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function tampilhrd_hse()
    {

        $this->db->where('department', 'Health, Safety, & Environment');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function tampilhrd_hr()
    {

        $this->db->where('department', 'Human Resource');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function tampilhrd_it()
    {

        $this->db->where('department', 'IT & EPICOR');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function tampilhrd_me()
    {

        $this->db->where('department', 'Maintanance & Engineering');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function tampilhrd_pi()
    {

        $this->db->where('department', 'Process Improvement');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function tampilhrd_production()
    {

        $this->db->where('department', 'Production');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function tampilhrd_prodauto()
    {

        $this->db->where('department', 'Production Automation');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function tampilhrd_project()
    {

        $this->db->where('department', 'Project (Others)');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function tampilhrd_projectop()
    {

        $this->db->where('department', 'Project Operations');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function tampilhrd_qa()
    {

        $this->db->where('department', 'Quality Assurance');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function tampilhrd_qc()
    {

        $this->db->where('department', 'Quality Control');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    //card per section QC
    function sect_nde()
    {
        $this->db->select('*');
        $this->db->where('section', 'NDE');

        return $this->db->get('form')->num_rows();
    }

    function sect_qcdoc()
    {
        $this->db->select('*');
        $this->db->where('section', 'QC Document Controller');

        return $this->db->get('form')->num_rows();
    }

    function sect_qc()
    {
        $this->db->select('*');
        $this->db->where('section', 'Quality Control');

        return $this->db->get('form')->num_rows();
    }

    //data per section QC
    function qc_nde()
    {
        $this->db->where('section', 'NDE');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function qc_qcdoc()
    {
        $this->db->where('section', 'QC Document Controller');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function qc_qc()
    {
        $this->db->where('section', 'Quality Control');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    //data per section IT
    function sect_it()
    {
        $this->db->select('*');
        $this->db->where('section', 'IT');

        return $this->db->get('form')->num_rows();
    }

    function sect_it_epicor()
    {
        $this->db->select('*');
        $this->db->where('section', 'IT & EPICOR');

        return $this->db->get('form')->num_rows();
    }

    function sect_epicor()
    {
        $this->db->select('*');
        $this->db->where('section', 'EPICOR');

        return $this->db->get('form')->num_rows();
    }

    function it_it()
    {
        $this->db->where('section', 'IT');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function it_it_epicor()
    {
        $this->db->where('section', 'IT & EPICOR');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function it_epicor()
    {
        $this->db->where('section', 'EPICOR');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

     //data per section HR
     function sect_hr_ga()
     {
         $this->db->select('*');
         $this->db->where('department', 'Human Resources');
         $this->db->where('section', 'General Affair');
 
         return $this->db->get('form')->num_rows();
     }

     function sect_ghr()
     {
         $this->db->select('*');
         $this->db->where('section', 'Group Human Resources');
 
         return $this->db->get('form')->num_rows();
     }

     function sect_hro()
     {
         $this->db->select('*');
         $this->db->where('section', 'HR Operations');
 
         return $this->db->get('form')->num_rows();
     }

     function sect_hr()
     {
         $this->db->select('*');
         $this->db->where('section', 'Human Resources');
 
         return $this->db->get('form')->num_rows();
     }

     function sect_Security()
     {
         $this->db->select('*');
         $this->db->where('section', 'Security');
 
         return $this->db->get('form')->num_rows();
     }

     function hr_ga()
    {
        $this->db->where('department', 'Human Resources');
        $this->db->where('section', 'General Affair');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function hr_ghr()
    {
        $this->db->where('section', 'Group Human Resources');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function hr_hro()
    {
        $this->db->where('section', 'HR Operations');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function hr_hr()
    {
        $this->db->where('section', 'Human Resources');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function hr_security()
    {
        $this->db->where('section', 'Security');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    //data per section PRODAUTO
    function sect_prodauto_ga()
     {
         $this->db->select('*');
         $this->db->where('department', 'Production Automation');
         $this->db->where('section', 'General Affair');
 
         return $this->db->get('form')->num_rows();
     }

     function prodauto_ga()
    {
        $this->db->where('department', 'Production Automation');
        $this->db->where('section', 'General Affair');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function sect_ecs()
     {
         $this->db->select('*');
         $this->db->where('department', 'Production Automation');
         $this->db->where('section', 'Electrical Control System');
 
         return $this->db->get('form')->num_rows();
     }

     function prodauto_ecs()
    {
        $this->db->where('department', 'Production Automation');
        $this->db->where('section', 'Electrical Control System');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function sect_prodauto()
     {
         $this->db->select('*');
         $this->db->where('department', 'Production Automation');
         $this->db->where('section', 'Production Automation');
 
         return $this->db->get('form')->num_rows();
     }

     function prodauto_prodauto()
    {
        $this->db->where('department', 'Production Automation');
        $this->db->where('section', 'Production Automation');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function sect_ea()
     {
         $this->db->select('*');
         $this->db->where('department', 'Production Automation');
         $this->db->where('section', 'Engineering & Automation');
 
         return $this->db->get('form')->num_rows();
     }

     function prodauto_ea()
    {
        $this->db->where('department', 'Production Automation');
        $this->db->where('section', 'Engineering & Automation');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function sect_sd()
     {
         $this->db->select('*');
         $this->db->where('department', 'Production Automation');
         $this->db->where('section', 'System Development');
 
         return $this->db->get('form')->num_rows();
     }

     function prodauto_sd()
    {
        $this->db->where('department', 'Production Automation');
        $this->db->where('section', 'System Development');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    //per section Dept. ME - Maintanance & Engineering
    function sect_me_electrical()
     {
         $this->db->select('*');
         $this->db->where('department', 'Maintanance & Engineering');
         $this->db->where('section', 'Electrical');
 
         return $this->db->get('form')->num_rows();
     }

     function me_electrical()
    {
        $this->db->where('department', 'Maintanance & Engineering');
        $this->db->where('section', 'Electrical');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function sect_me_engineering()
     {
         $this->db->select('*');
         $this->db->where('department', 'Maintanance & Engineering');
         $this->db->where('section', 'Engineering');
 
         return $this->db->get('form')->num_rows();
     }

     function me_Engineering()
    {
        $this->db->where('department', 'Maintanance & Engineering');
        $this->db->where('section', 'Engineering');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function sect_me_fo()
     {
         $this->db->select('*');
         $this->db->where('department', 'Maintanance & Engineering');
         $this->db->where('section', 'Facility Operations');
 
         return $this->db->get('form')->num_rows();
     }

     function me_fo()
    {
        $this->db->where('department', 'Maintanance & Engineering');
        $this->db->where('section', 'Facility Operations');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function sect_me_maintanance()
     {
         $this->db->select('*');
         $this->db->where('department', 'Maintanance & Engineering');
         $this->db->where('section', 'Maintanance');
 
         return $this->db->get('form')->num_rows();
     }

     function me_maintanance()
    {
        $this->db->where('department', 'Maintanance & Engineering');
        $this->db->where('section', 'Maintanance');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function sect_me_me()
     {
         $this->db->select('*');
         $this->db->where('department', 'Maintanance & Engineering');
         $this->db->where('section', 'Maintanance & Engineering');
 
         return $this->db->get('form')->num_rows();
     }

     function me_me()
    {
        $this->db->where('department', 'Maintanance & Engineering');
        $this->db->where('section', 'Maintanance & Engineering');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    //per section SCM - supply chain management
    function sect_scm_consumable()
     {
         $this->db->select('*');
         $this->db->where('department', 'Supply Chain Management');
         $this->db->where('section', 'Consumable');
 
         return $this->db->get('form')->num_rows();
     }

     function scm_consumable()
    {
        $this->db->where('department', 'Supply Chain Management');
        $this->db->where('section', 'Consumable');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function sect_scm_logistics()
     {
         $this->db->select('*');
         $this->db->where('department', 'Supply Chain Management');
         $this->db->where('section', 'Logistics');
 
         return $this->db->get('form')->num_rows();
     }

     function scm_logistics()
    {
        $this->db->where('department', 'Supply Chain Management');
        $this->db->where('section', 'Logistics');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function sect_scm_purchasing()
     {
         $this->db->select('*');
         $this->db->where('department', 'Supply Chain Management');
         $this->db->where('section', 'Purchasing');
 
         return $this->db->get('form')->num_rows();
     }

     function scm_purchasing()
    {
        $this->db->where('department', 'Supply Chain Management');
        $this->db->where('section', 'Purchasing');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function sect_scm_store()
     {
         $this->db->select('*');
         $this->db->where('department', 'Supply Chain Management');
         $this->db->where('section', 'Store');
 
         return $this->db->get('form')->num_rows();
     }

     function scm_store()
    {
        $this->db->where('department', 'Supply Chain Management');
        $this->db->where('section', 'Store');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function sect_scm_material()
     {
         $this->db->select('*');
         $this->db->where('department', 'Supply Chain Management');
         $this->db->where('section', 'Material');
 
         return $this->db->get('form')->num_rows();
     }

     function scm_material()
    {
        $this->db->where('department', 'Supply Chain Management');
        $this->db->where('section', 'Material');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function sect_scm_scm()
     {
         $this->db->select('*');
         $this->db->where('department', 'Supply Chain Management');
         $this->db->where('section', 'Supply Chain Management');
 
         return $this->db->get('form')->num_rows();
     }

     function scm_scm()
    {
        $this->db->where('department', 'Supply Chain Management');
        $this->db->where('section', 'Supply Chain Management');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    //per section dept Finance
    function sect_fa_fa()
     {
         $this->db->select('*');
         $this->db->where('department', 'Finance & Accounting');
         $this->db->where('section', 'Finance & Accounting');
 
         return $this->db->get('form')->num_rows();
     }

     function fa_fa()
    {
        $this->db->where('department', 'Finance & Accounting');
        $this->db->where('section', 'Finance & Accounting');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function sect_fa_gf()
     {
         $this->db->select('*');
         $this->db->where('department', 'Finance & Accounting');
         $this->db->where('section', 'Group Finance');
 
         return $this->db->get('form')->num_rows();
     }

     function fa_gf()
    {
        $this->db->where('department', 'Finance & Accounting');
        $this->db->where('section', 'Group Finance');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function tampilhrd_scm()
    {

        $this->db->where('department', 'Supply Chain Management');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function tampilhrd_technical()
    {

        $this->db->where('department', 'Technical');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function employeehrd()
    {
        // $query = $this->db->get('form');
        // return $query->result_array();
        $this->db->select('*');
        $qry = $this->db->get('form');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function get_sum_count_if()
    {
        $sql = "SELECT count(if(employee_id, employee_id, null)) as employee_id,
        sum(if(employee_id, id_admin, null)) as id_admin FROM form";

        $result = $this->db->query($sql);
        return $result->row();
    }

    public function getPersonalFormbyID($employee_id)
    {

        return $this->db->get_where('form', ["employee_id" => $employee_id])->result_array();

    }

    public function getPersonalFormbyID2021($employee_id)
    {
        $query = "SELECT * FROM form WHERE YEAR(period_from) = 2021 AND employee_id = '$employee_id'";
        //$this->db->select('*');
        //$this->db->where('period_to', null);

        return $this->db->query($query)->result_array();


        //return $this->db->get_where('form', ["employee_id" => $employee_id])->result_array();

    }

    public function getPersonalFormbyID2022($employee_id)
    {
        $query = "SELECT * FROM form WHERE YEAR(period_from) = 2022 AND employee_id = '$employee_id'";
        //$this->db->select('*');
        //$this->db->where('period_to', null);

        return $this->db->query($query)->result_array();


        //return $this->db->get_where('form', ["employee_id" => $employee_id])->result_array();

    }

    function get_data_by_id($table, $form_id){
		$this->db->where('form_id', $form_id);
		return $this->db->get($table);
	}
    
}
