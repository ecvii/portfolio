<?php 
	
	class Login_model extends CI_Model {
		
		public function __construct() { 
			
		} 
		
		 // check valid user
		 function validate_login() {            
			 
			 $this->db->select('*');
			 $this->db->from('admin_users');
			 $this->db->where( array('user_name'=>$this->input->post('txt_user_name', true), 'password'=>md5($this->input->post('txt_password')) ));
			 $this->db->limit(1);
			 $query = $this->db->get();
			
			
			 if($query->num_rows() == 1) {                 
				return $query->row();
			 }
			 else {
				 return false;
			 }
		 }
		
	 		
	}