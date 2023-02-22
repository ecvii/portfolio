<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class MY_Controller extends CI_Controller {
		
		var $template = array();
		var $data = array();
		
		
		 public function __construct() {
			parent::__construct();
			
			

		}
		
		
		// admin header
		public function layout_admin_header() {
			
			if(empty($this->session->userdata('logged'))){
			
				redirect(base_url().'admin/', 'refresh');
			   
		   }

			$data=array(
				
				'latest_messages'=>$this->Common_model->multiple_record('contact_messages', '', 'co_id desc', '3'),
				'user_record'=>$this->Common_model->single_record('admin_users', '', '', ''),
			);
			
			$this->load->view('admin/include/header', $data);
			}
		
			// admin sidebar
		public function layout_admin_sidebar() {
			$module_main = $this->uri->segment(2);
			$module_sub = $this->uri->segment(3);

			
				
			$data=array(
					'module_main'=>$module_main,
					'module_sub'=>$module_sub,
					

			);
			
			$this->load->view('admin/include/sidebar', $data);
			}
			
		// admin footer
		public function layout_admin_footer() {
			
			$data=array(
				
			);
			
			$this->load->view('admin/include/footer', $data);
			}
		

		// front header
		public function layout_front_header($selected_theme, $meta_title, $meta_keywords, $meta_description) {
			
			$page_type = $this->uri->segment(1);
			
			$slider_settings = $this->Common_model->single_record('sliders_settings', '', '', '');
			$settings_social = $this->Common_model->multiple_record('settings_social', 'status = 1', 'sort_order asc', '');
			$settings_general = $this->Common_model->single_record('settings_general', '', '', '');
			$settings_script = $this->Common_model->single_record('settings_script', '', '', '');
			$profile_contact = $this->Common_model->single_record('profile_contact', '', '', '');

			if($selected_theme->th_id==1) 
				$menu_items = $this->Common_model->multiple_record('settings_module', 'menu_status = 1', 'sort_order asc', '');
			else if($selected_theme->th_id==2) 
				$menu_items = $this->Common_model->multiple_record('settings_module', 'menu_status = 1 and mo_id not in(4,7)', 'sort_order asc', '');

			$data=array(
				
				'selected_theme'=>$selected_theme,
				'menu_items'=>$menu_items,
				'slider_settings'=>$slider_settings,
				'settings_social'=>$settings_social,
				'settings_general'=>$settings_general,
				'profile_contact'=>$profile_contact,
				'settings_script'=>$settings_script,
				'meta_title'=>$meta_title,
				'meta_keywords'=>$meta_keywords,
				'meta_description'=>$meta_description,
				'page_type'=> $page_type,
			);
			
			
			$this->load->view('themes/'.$selected_theme->folder_name.'/include/header', $data);

		}


		// front footer 
		public function layout_front_footer($selected_theme) {
		
			$data=array(
				
				'selected_theme'=>$selected_theme,
			);
			
			
			$this->load->view('themes/'.$selected_theme->folder_name.'/include/footer', $data);

		}
		
	
	}