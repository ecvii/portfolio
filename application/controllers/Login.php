<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

	public function index()	{

        $custom_message = "";
      // start form valiation 
		if($_POST) {
            
            $this->form_validation->set_rules('txt_user_name', 'User Name', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('txt_password', 'Password', 'trim|required|min_length[4]|max_length[24]');
        
            if (!$this->form_validation->run() == FALSE) { 
              
               $login_check = $this->Login_model->validate_login();
              
                if (!empty($login_check)) {
                   
                    $session_data = array(
                        'id' => $login_check->admin_id,
                        'logged' => TRUE
                    );
                    $session_data = $this->security->xss_clean($session_data);
                    $this->session->set_userdata($session_data); 
                    redirect(base_url('dashboard'));
                
                } else {

                    $custom_message = "you have entered invalid user name or password"; 
                }
             }
            }
        $data = array(
           
            'title' => 'Cortex',
            'custom_message' => $custom_message,
        );

		$this->load->view('admin/login/login', $data);
	}
}
