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

class login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('home/form_login');
    }

    function auth()
    {

        $username   = $this->input->post('username', TRUE);
        $password   = $this->input->post('password', TRUE);
        
        $user = $this->db->get_where('fix_epms', ['username' => $username])->row_array();

        $result     = $this->login_model->check_user($username, $password);
        if ($result->num_rows() > 0) {
            $data           = $result->row_array();
            $id             = $data['id'];
            $employee_id    = $data['employee_id'];
            $department     = $data['department'];
            $username       = $data['username'];
            $level_id       = $data['level_id'];
            $employee_name  = $data['full_name'];
            $sesdata        = array(
                'id'            => $id,
                'employee_id'   => $employee_id,
                'username'      => $username,
                'level_id'      => $level_id,
                'full_name'     => $employee_name,
                'department'   => $department,
                'logged_in'     => TRUE
            );

            // $pesan = "selamat datang, " . $employee_name;
			// $status = true;

            $this->session->set_userdata($sesdata);

            //if ($user['password_changed'] == 0) {
              //  $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Change password immediately ! your password is not secure<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>');
                //redirect('login/forcepassword');
            //}

            /*
            if ($user['level_id'] == 2 || $user['level_id'] == 3 || $user['level_id'] == 4) {
                redirect('home/index');
            } else {
                redirect('home/employee');
            }
            */
            
            if ($user['department'] == 'Production' && $user['level_id'] == 2) {
                redirect('home/dirleader_prod');
            } elseif($user['department'] == 'Production' && $user['level_id'] == 3) {
                redirect('home/dirleader_prod');
            } elseif($user['department'] == 'Production Automation' && $user['level_id'] == 2) {
                redirect('home/dirleader_prodauto');
            } elseif($user['department'] == 'Production Automation' && $user['level_id'] == 3) {
                redirect('home/dirleader_prodauto');
            } elseif($user['department'] == 'Quality Control' && $user['level_id'] == 2) {
                redirect('home/dirleader_qc');
            } elseif($user['department'] == 'Quality Control' && $user['level_id'] == 3) {
                redirect('home/dirleader_qc');
            } elseif($user['department'] == 'IT & EPICOR' && $user['level_id'] == 2) {
                redirect('home/dirleader_it');
            } elseif($user['department'] == 'IT & EPICOR' && $user['level_id'] == 3) {
                redirect('home/dirleader_it');
            } elseif($user['department'] == 'Maintanance & Engineering' && $user['level_id'] == 2) {
                redirect('home/dirleader_me');
            } elseif($user['department'] == 'Maintanance & Engineering' && $user['level_id'] == 3) {
                redirect('home/dirleader_me');
            } elseif($user['department'] == 'Supply Chain Management' && $user['level_id'] == 2) {
                redirect('home/dirleader_scm');
            } elseif($user['department'] == 'Supply Chain Management' && $user['level_id'] == 3) {
                redirect('home/dirleader_scm');
            } elseif($user['department'] == 'Finance & Accounting' && $user['level_id'] == 2) {
                redirect('home/dirleader_finance');
            } elseif($user['department'] == 'Finance & Accounting' && $user['level_id'] == 3) {
                redirect('home/dirleader_finance');
            } 

            elseif($user['department'] == 'Human Resources' && $user['level_id'] == 4) {
                redirect('home/index');
            } 

            elseif($user['level_id'] == 1) {
                redirect('home/employee');
            } 
            
            
            else {
                redirect('home/index');
            }

            /*
            if ($user['level_id'] == '1') {
                redirect('home/employee');
            } elseif ($user['level_id'] == '2') {
                if($user['department' == 'Production']){
                    redirect('home/dirleader_prod');
                }
                elseif ($user['department' == 'Human Resources']){
                    redirect('home/dirleader_hr');
                }
                
                 tion Automation']){
                    redirect('home/dirleader_prodauto');
                }

                elseif ($user['department' == 'Quality Control']){
                    redirect('home/dirleader_qc');
                }

                elseif ($user['department' == 'IT & EPICOR']){
                    redirect('home/dirleader_it');
                }

                elseif ($user['department' == 'Maintanance & Engineering']){
                    redirect('home/dirleader_me');
                }

                elseif ($user['department' == 'Supply Chain Management']){
                    redirect('home/dirleader_scm');
                }
                else {
                    redirect('home/index');
                }
             } 
             elseif ($user['level_id'] == '3') {
                 redirect('home/index');
             } elseif ($user['level_id'] == '4') {
                 redirect('home/index');
             }
             */
        } else {
            echo "<script>alert('Access Denied !');history.go(-1);</script>";
            // $pesan = "Maaf, User Tidak Di temukan";
			// $status = false;
            
        }
        $this->load->view('home/form_login');

    }

    // private function _login()
    // {
    //     $username = $this->input->post('username');
    //     $password = $this->input->post('password');
    //     $result   = $this->login_model->check_user($username, $password);

    //     $user = $this->db->get_where('admin', ['username' => $username])->row_array();

    //     if($user) {

    //         if ($user['is_active'] == 1) {
    //             if(password_verify($password, $user['password'])) {
    //                 $data = [
    //                     'username' => $user['username'],
    //                     'level_id' => $user['level_id']
    //                 ];
    //                 $this->session->set_userdata($data);
    //                 redirect('home/index');

    //             } else {
    //                 $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Wrong password!</div>');
    //             redirect('login');
    //             }

    //         }else {
    //             $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> This is email has not been activated!</div>');
    //             redirect('login');
    //         }

    //     } else {
    //         echo "<script>alert('Access Denied !');history.go(-1);</script>";
    //         redirect('login');
    //     }
    // }

    public function logout()
    {
        $this->session->sess_destroy();
		// 	$pesan="Berhasil Keluar, Anda Akan Diarahkan Ke Halaman Login";
		// 	$status = true;
		

		// echo json_encode(array(
		// 	'pesan' => $pesan,
		// 	'status' => $status
		// ));

        redirect('login');
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['admin'] = $this->db->get_where('admin', ['username' =>
        $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_login');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/dashboard', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('home/changepassword', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/footer_login');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if (password_verify($current_password, $data['admin']['password'])) {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Wrong current password!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('login/changePassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> New password cannot be the same as current password!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> </div>');
                    redirect('login/changePassword');
                } else {

                    $password_hash = md5($new_password);

                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('admin');

                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Password changed!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('login/changePassword');
                }
            }
        }
    }



    public function sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'noreply@cladtek.com',
            'smtp_pass' => 'Cl4dtek@2015',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];
        $this->load->library('email', $config);
        $this->email->from('noreply@cladtek.com', 'Cladtek');
        $this->email->to($this->input->post('email'));
        $this->email->subject('Reset Password');
        $this->email->message('Click this link to verify your account : <a href="' . base_url() . 'login/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function forgot()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $this->load->view('home/forgot-password');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('fix_epms', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => 'time()'
                ];
                $this->db->insert('user_token', $user_token);
                $this->sendEmail($token, 'forgot');

                $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Please check your email to reset your password !</div>');
                redirect('login/forgot');
            } else {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Wrong Email</div>');
                redirect('login/forgot');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->db->get_where('admin', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changeReset();
            } else {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Wrong Token</div>');
                redirect('login/forgot');
            }
        } else {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Reset Password failed</div>');
            redirect('login/forgot');
        }
    }

    public function changeReset()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('login');
        }
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('home/change-password');
        } else {
            $password = md5($this->input->post('password1'));
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('admin');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Password has been changed ! Please LOGIN </div>');
            redirect('login');
        }
    }

    public function forcepassword()
    {
        $data['title'] = 'Change Password';
        $data['admin'] = $this->db->get_where('admin', ['username' =>
        $this->session->userdata('username')])->row_array();

        if ($data['admin']['password_changed'] == 1 || !isset($data['admin'])) {
            redirect('login');
        };

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            // $this->load->view('templates/header1', $data);
            $this->load->view('home/forcepassword', $data);
            // $this->load->view('templates/footer1');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if (password_verify($current_password, $data['admin']['password'])) {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Wrong current password!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('login/forcepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> New password cannot be the same as current password!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> </div>');
                    redirect('login/forcepassword');
                } else {

                    $password_hash = md5($new_password);
                    $this->db->set('password', $password_hash);
                    $this->db->set('password_changed', 1);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('admin');

                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Password changed!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('login');
                }
            }
        }
    }

}
