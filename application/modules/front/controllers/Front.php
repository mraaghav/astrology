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

   /*
   **  Add into Cart using Ajax post request
   */
   public function add()
     {

       $this->load->library("cart");
       $data = array(
           "id"  => $_POST["product_id"],
           "name"  => $_POST["product_name"],
           "qty"  => $_POST["quantity"],
           "price"  => $_POST["product_price"],
           "image"  => $_POST["product_image"],
       );
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
               $url = base_url("asset/front/images/content/Products/").$items['image'];
               $cartitemid= $items['rowid'];
               $output .='<li>
                            <div class="ast_cart_img">
                     <img src="'.$url.'" class="img-responsive">
                            </div>
                            <div class="ast_cart_info">
                                <a href="#">'.$items["name"].'</a>
                                <p>1 X $'.$items["price"].'</p>
                                <a href="javascript:void(0);" id="'.$items['rowid'].'" class="ast_cart_remove ast_remove_item" 
                                ><i class="fa fa-trash"></i></a>
                            </div>
                          </li>';

               $total+=   $items["price"];                              
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
}