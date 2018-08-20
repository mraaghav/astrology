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
        $data['horoscopes'] = $this->model->getAll('horoscope','');
        $data['body'] = 'index';
        $this->controller->load_view($data);

    }
    public function about(){
        $data['body'] = 'about';
        $this->controller->load_view($data);
    }
    public function shop(){
        //$data['product'] = $this->model->getAll('products','');
        $where                   = array(
            'products.is_active' => 1
        );

        $data['products'] = $this->model->GetJoinRecord('products', 'id', 'product_images', 'product_id','products.id  as p_id,products.name,products.price,products.description,product_images.image', $where , 'products.id');
        //print_r($data);
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
    public function signup(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required',
                array('required' => 'You must provide a %s.')
        );
        //$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('mobile','Mobile', 'required');
        $this->form_validation->set_rules('gender','Gender', 'required');

        if ($this->form_validation->run() == FALSE)
        {
                //$this->session->set_flashdata('user', 'User Detailes has been Added Successfully');
              $data['body'] = 'index';
             $this->controller->load_view($data);
        }
        else
        {   
            if(isset($_POST['submit'])){
            $rand = rand (10000 , 99999);
            $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'password' => md5($this->input->post('password')),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('first_name').'_'.$rand,
            'mobile' => $this->input->post('mobile'),
            'gender' => $this->input->post('gender'),
            'user_role' => 2
            );
            //print_r($data); die;
            $result = $this->model->insertData('users', $data);

              $this->session->set_flashdata('user', 'User Detailes has been Added Successfully');
              $data['body'] = 'index';
             $this->controller->load_view($data);
            }
        }

    }

    public function signin() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');

        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        $data['error'] = "";

        if ($this->form_validation->run() == FALSE) {

            //Field validation failed.  User redirected to login page
            $data['body'] = 'index';
            $this->controller->load_view($data);

        } else {

            //Go to private area

            $email = $this->input->post('email');

            $password = md5($this->input->post('password'));

            $result = $this->model->login($email, $password);

            //print_r($result); die();

            if ($result) {

                $sess_array = array();

                foreach ($result as $row) {

                    $sess_array = array(

                        'id' => $row->id,

                        'username' => $row->first_name,

                        'userrole' =>$row->user_role,

                    );

                    $this->session->set_userdata('logged_in', $sess_array);
                    $this->session->set_flashdata('user_login', 'User Login Successfully');
                    $data['body'] = 'index';
                    $this->controller->load_view($data);
                }

                } else {

                $data['error'] = "Invalid usrername or password";
                $data['body'] = 'index';
                $this->controller->load_view($data);

            }

        }

    }
    // public function logout(){
    //  $this->session->sess_destroy();
    //  $data['body'] = 'index';
    //  $this->controller->load_view($data); 
    // }
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
 
   /*
   **  Add into Cart using Ajax post request
   */
   public function add()
     {
       //$this->cart->product_options($rowid);
       $id = $_POST['product_id'];
       $qty  = $_POST["quantity"];
       $cart = $this->cart->contents();
       $exists = false;             //lets say that the new item we're adding is not in the cart
       $rowid = '';
       foreach($cart as $item){
           if($item['id'] == $id)
           {
                $exists = true;
                $rowid = $item['rowid'];
                $qty = $item['qty'] + $qty;
           }
       }

       //$this->load->library("cart");
       $data = array(
           "rowid" => $rowid,
           "id"  => $_POST["product_id"],
           "name"  => $_POST["product_name"],
           "qty"  => $qty,//$_POST["quantity"],
           "price"  => $_POST["product_price"],
           "image"  => $_POST["product_image"],
       );
       
       if($exists)
        {
           $this->cart->update($data);
        }
        else
           $this->cart->insert($data); //return rowid 
    }
    public function viewcart()
    {
       //print_r($this->cart->contents()); die;
       if(count($this->cart->contents())>0)
       {
            $output ='<div class="ast_cart_box">
                  <div class="ast_cart_list">
                 <ul>';
            $count = 0;
            $total= 0;
            foreach($this->cart->contents() as $items)
            {    
               $count++;
               $url = base_url("asset/uploads/").$items['image'];
               $cartitemid= $items['rowid'];
               $output .='<li>
                            <div class="ast_cart_img">
                     <img src="'.$url.'" class="img-responsive">
                            </div>
                            <div class="ast_cart_info">
                                <a href="#">'.$items["name"].'</a>
                                <p>'.$items['qty'].' X $'.$items["price"].'</p>
                                <a href="javascript:void(0);" id="'.$items['rowid'].'" class="ast_cart_remove ast_remove_item" 
                                ><i class="fa fa-trash"></i></a>
                            </div>
                          </li>';

               $total+=  $items['qty']* $items["price"];                              
             }       
            $output .= '</ul>
               </div>
               <div class="ast_cart_total">
                    <p>total<span>$'.$total.'</span></p>
               </div>
               <div class="ast_cart_btn">
                    <button type="button">view cart</button>
                    <button type="button">checkout</button>
               </div>
            </div>';

          echo $output;
       }

       
    }

/*
**  Remove Cart item by rowid
*/

    public function remove()
    { 
      $row_id = $_POST["row_id"];
      $data = array(
       'rowid'  => $row_id,
       'qty'  => 0
      );
      $this->cart->update($data);
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