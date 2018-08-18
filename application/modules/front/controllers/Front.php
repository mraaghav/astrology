<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Front extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index($msg = NULL)
    {
        $data['body'] = 'index';
        $this->controller->load_view($data);
    }
    public function about(){
        $data['body'] = 'about';
        $this->controller->load_view($data);
    }
    public function shop(){
        $data['body'] = 'shop';
        $this->controller->load_view($data);
    }
    public function donate(){
        $data['body'] = 'donate';
        $this->controller->load_view($data);
    }
    public function contact(){
        $data['body'] = 'contact';
        $this->controller->load_view($data);
    }
    
    public function last_executed_query()
    {
        echo $this->db->last_query();
        die;
    }
    public function print_array($data = NULL)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
    public function verifylogin()
    {
        $data = $this->input->post();
        if ($data) {
            $this->form_validation->set_rules('login_username', 'Username', 'trim|required');
            $this->form_validation->set_rules('login_password', 'Password', 'trim|required|callback_check_database');
            if ($this->form_validation->run() == false) {
                redirect('front/index');
            } else {
                if ($this->checkSession()) {
                    $log = $this->session->userdata['user_role'];
                    if ($log == 3) {
                        redirect('patient/dashboard');
                    } else {
                        $this->session->set_flashdata('alert', 'Username & Password not matched...!!!');
                        redirect('front/index');
                    }
                }
            }
        }
    }
    public function checkSession()
    {
        if (!empty($this->session->userdata('user_role'))) {
            $log = $this->session->userdata('user_role');
            if (!empty($log)) {
                return true;
            } else {
                return false;
            }
        }
    }
    public function check_database($password)
    {
        $username = $this->input->post('login_username', TRUE);
        $where    = array(
            'username' => $username,
            'password' => md5($password),
            'is_active' => 1
        );
        $result   = $this->model->getsingle('users', $where);
        if (!empty($result)) {
            $sess_array = array(
                'id' => $result->id,
                'username' => $result->username,
                'email' => $result->email,
                'user_role' => $result->user_role,
                'first_name' => $result->first_name,
                'last_name' => $result->last_name,
                'hospital_id' => $result->hospital_id
            );
            if ($result->user_role == 1 || $result->user_role == 3) {
                unset($sess_array['hospital_id']);
            }
            if ($result->user_role == 4) {
                $where                = array(
                    'user_id' => $result->id
                );
                $sess_array['rights'] = $this->model->getsingle('user_rights', $where);
            }
            $this->session->set_userdata($sess_array);
            return true;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid Credentials ! Please try again with valid username and password');
            return false;
        }
    }
    public function oldpass_check($oldpass)
    {
        $user_id = $this->session->userdata('id');
        $result  = $this->model->check_oldpassword($oldpass, $user_id);
        if ($result == 0) {
            $this->form_validation->set_message('oldpass_check', "%s does not match.");
            return FALSE;
        } else {
            $this->session->set_flashdata('success_msg', 'Password Successfully Updated!!!');
            return TRUE;
        }
    }
    public function logout()
    {
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        $msg = "You have been logged out Successfully...";
        $this->index($msg);
    }
    public function alpha_dash_space($str)
    {
        if (!preg_match("/^([-a-z_ ])+$/i", $str)) {
            $this->form_validation->set_message('check_captcha', 'Only Aplphabates allowed in this field');
        } else {
            return true;
        }
    }
    public function check_password()
    {
        $old_password = $this->input->post('data');
        $where        = array(
            'id' => $this->session->userdata('id'),
            'password' => md5($old_password)
        );
        $result       = $this->model->getsingle('users', $where);
        if (!empty($result)) {
            echo '0';
        } else {
            echo '1';
        }
    }


    public function contactus(){
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|min_length[2]');
                   
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', validation_errors());
            if(!empty($id)){
                $where = array('id'=>$id);
                $data['horoscopes'] = $this->model->getAllwhere('contact',$where);
            }
            $data['body']     = 'contact';
            $this->controller->load_view($data);
        } else {
            $first_name  = $this->input->post('first_name');
            $email       = $this->input->post('email');
            $subject     = $this->input->post('subject');
            $message     = $this->input->post('message');
            $last_name   = $this->input->post('last_name');
            
            $data        = array(
                'first_name' => $first_name,
                'email' => $email,
                'subject' => $subject,
                'message' => $message,
                'last_name' => $last_name,
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s')
            );
            
            
            $last_id = $this->model->insertData('contact', $data);
                        
            if ($last_id) {
                $this->email_send($email,$subject,$message);
                $this->session->set_flashdata('info_message', 'Enquiry Successfully Submitted!!!');
            } else {
                $this->session->set_flashdata('error_msg', "Something Went Wrong");
            }
            redirect('/front/contact', 'refresh');
        }
        
    }


    public function email_send($to,$subject,$msg){
        $config_mail = Array(
                    'protocol'  => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => '465',
                    'smtp_user' => 'webdeskytechnical@gmail.com',
                    'smtp_pass' => 'webdesky$2018',
                    'mailtype'  => 'html',
                    'charset'   => 'iso-8859-1',
                    'newline'   => "\r\n"
                    );
        $this->load->library('email', $config_mail);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        $this->email->from('webdeskytechnical@gmail.com','Webdesky');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($msg);
        if (!$this->email->send()) {
            show_error($this->email->print_debugger());
        } 
    }

}