<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    // general settings
	public function index()	{

        $general_record = $this->Common_model->single_record('settings_general', 'gs_id = 1', '', '');
        $image_error_1 = "";    $image_error_2 = ""; $image_error_3 = ""; $image_error_4 = ""; $success_message = "";

        if($this->uri->segment(4)=='updated')
         $success_message = Data_updated;

        if ($_POST) {

            $this->form_validation->set_rules('txt_ws_title', 'Website Title', 'required');
            $this->form_validation->set_rules('txt_cpr_title', 'Copy Right', 'required');
            
            if ($this->form_validation->run() == false) {
                
            } else {
                
                if (!empty($_FILES['fle_logo_img']['name'])) {
                
                    $logo_image = time() . '-' . $_FILES["fle_logo_img"]['name'];
                    $config['upload_path'] = './assets/upload/pics';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['remove_spaces'] = true;
                    $config['max_size'] = '2048';
                    $config['file_name'] = $logo_image;
                  
    
                    $this->load->library('upload', $config);
                    $upload_status = $this->upload->do_upload("fle_logo_img");
    
                    //Returns array of data related to file uploaded.
                    $upload_data = $this->upload->data();
                    $logo_image = $upload_data['file_name'];

                    if (!$upload_status) {
                        
                        $image_error_1 = $this->upload->display_errors(); 
                        $logo_image =  $general_record->logo_image;                  
                      
                    }                    

                }                   
                else {

                    $logo_image =  $general_record->logo_image;
                }

                // fav icon

                if (!empty($_FILES['fle_fav_icon']['name'])) {
                
                    $fav_image = time() . '-' . $_FILES["fle_fav_icon"]['name'];
                    $config['upload_path'] = './assets/upload/pics';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
                    $config['remove_spaces'] = true;
                    $config['max_size'] = '2048';
                    $config['file_name'] = $fav_image;
                  
    
                    $this->load->library('upload');
                    $this->upload->initialize($config);
                    $upload_status_2 = $this->upload->do_upload("fle_fav_icon");
    
                    //Returns array of data related to file uploaded.
                    $upload_data = $this->upload->data();
                    $fav_image = $upload_data['file_name'];

                    if (!$upload_status_2) {
                        
                        $image_error_2 = $this->upload->display_errors(); 
                        $fav_image =  $general_record->fav_image;                  
                      
                    }                    

                }                   
                else {

                    $fav_image =  $general_record->fav_image;
                }

                 // fun facts background image

                 if (!empty($_FILES['fle_facts_image']['name'])) {
                
                    $fact_image = time() . '-' . $_FILES["fle_facts_image"]['name'];
                    $config['upload_path'] = './assets/upload/pics';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['remove_spaces'] = true;
                    $config['max_size'] = '2048';
                    $config['file_name'] = $fact_image;
                  
    
                    $this->load->library('upload');
                    $this->upload->initialize($config);
                    $upload_status_2 = $this->upload->do_upload("fle_facts_image");
    
                    //Returns array of data related to file uploaded.
                    $upload_data = $this->upload->data();
                    $fact_image = $upload_data['file_name'];

                    if (!$upload_status_2) {
                        
                        $image_error_2 = $this->upload->display_errors(); 
                        $fact_image =  $general_record->fun_facts_bg;                  
                      
                    }                    

                }                   
                else {

                    $fact_image =  $general_record->fun_facts_bg;
                }

               
                
                $data_update=array(
                    'site_title' => $this->input->post('txt_ws_title', true),
                    'logo_image' => $logo_image,
                    'logo_text' => $this->input->post('txt_lg_title', true),
                    'fav_image' => $fav_image,
                    'fun_facts_bg' => $fact_image,
                    'footer_top_text' => $this->input->post('txt_ft_title', true),
                    'footer_bottom_text' => $this->input->post('txt_cpr_title', true),
                    'edit_date ' => date("Y-m-d H:i:s"),
                   
                );
                $data_update = $this->security->xss_clean($data_update);
                $this->Common_model->update('settings_general', $data_update, "gs_id = 1");
                redirect(base_url().'admin/settings/general_settings/updated');
               
            }

        }
        
        $data=array(

           'page_title' => 'Settings',
           'sub_page_title' => 'General',
           'general_record' => $general_record,
           'image_error_1' => $image_error_1,
           'image_error_2' => $image_error_2,
           'image_error_3' => $image_error_3,
           'image_error_4' => $image_error_4,
           'success_message' => $success_message,
        );

        $this->layout_admin_header();
        $this->layout_admin_sidebar();
        $this->load->view('admin/settings/general-settings', $data);
        $this->layout_admin_footer();
    }
    
     // module settings 
     public function module_settings()	{

        $module_records = $this->Common_model->multiple_record('settings_module', '', '', '');
        $success_message ="";

        if($this->uri->segment(4)=='updated')
        $success_message = Data_updated;


        if ($_POST) {

            $result = $this->input->post("ms_status", true);
            $m_id = $this->input->post("m_ids", true);
            $menu_title = $this->input->post("txt_menu_title", true);
            $module_title = $this->input->post("txt_module_title", true);
            $sub_title = $this->input->post("txt_subtitle", true);
            $menu_show = $this->input->post("ddlMenu", true);
            $sort_order = $this->input->post("txt_sort_order", true);
    
            $module_menu = array();
            // loop for posted id of checkbox
            for ($i = 0; $i < sizeof($m_id); $i++) {

                $module_menu[] = array(
    
                    "mo_id" => $m_id[$i],
                    "menu_title" => $menu_title[$i],
                    "title" => $module_title[$i],
                    "sub_title" => $sub_title[$i],
                    "sort_order" => $sort_order[$i],
                    "status" => 0,
                    "menu_status" => $menu_show[$i],
                    "edit_date" => date("Y-m-d H:i:s"),
                );
            }
    
            $this->db->update_batch("settings_module", $module_menu, "mo_id");
            
            if ($result) {

                // data array for selected module setting
                $module_setting = array();
    
                // loop for posted id of checkbox
                for ($i = 0; $i < sizeof($result); $i++) {
                    $module_setting[] = array(
    
                        "mo_id" => $result[$i],
                        "status" => 1,
                    );
                }
    
                $this->db->update_batch("settings_module", $module_setting, "mo_id");
            }
            //check if rows is updated in database
            if ($this->db->affected_rows() > 0) {
    
                redirect("admin/settings/module_settings/updated");
    
            }
             
            }
            $data=array(

                'page_title' => 'Settings',
                'sub_page_title' => 'Modules',
                'module_records' => $module_records,
                'success_message' => $success_message,
             );
     
             $this->layout_admin_header();
             $this->layout_admin_sidebar();
             $this->load->view('admin/settings/module-settings', $data);
             $this->layout_admin_footer();
    
} 
     // seo settings
    
	public function seo_settings()	{

        $seo_record = $this->Common_model->single_record('settings_seo', 'se_id = 1', '', '');
        $success_message ="";

        if($this->uri->segment(4)=='updated')
        $success_message = Data_updated;


        if ($_POST) {

              $this->form_validation->set_rules('txt_meta_title', 'Meta Title', 'required');
              $this->form_validation->set_rules('txt_meta_keywords', 'Meta Keywords', 'required');
              $this->form_validation->set_rules('txt_meta_description', 'Meta Keywords', 'required');
              
              if ($this->form_validation->run() == false) {
                  
              } else {
                  
                $data_update=array(
                    'meta_title ' => $this->input->post('txt_meta_title', true),
                    'meta_keywords' => $this->input->post('txt_meta_keywords', true),
                    'meta_description' => $this->input->post('txt_meta_description', true),
                    'edit_date ' => date("Y-m-d H:i:s"),
                   
                );
                $data_update = $this->security->xss_clean($data_update);
                $this->Common_model->update('settings_seo', $data_update, "se_id = 1");
                redirect(base_url().'admin/settings/seo_settings/updated');
              }
            }
            $data=array(
                
                'page_title' => 'Settings',
                'sub_page_title' => 'SEO Settings',
                'seo_record' => $seo_record,
                'success_message' => $success_message,
             );
     
             $this->layout_admin_header();
             $this->layout_admin_sidebar();
             $this->load->view('admin/settings/seo-settings', $data);
             $this->layout_admin_footer();
    
} 

 // script settings
    
 public function script_settings()	{

    $script_record = $this->Common_model->single_record('settings_script', 'sc_id = 1', '', '');
    $success_message ="";

    if($this->uri->segment(4)=='updated')
    $success_message = Data_updated;


    if ($_POST) {

          $this->form_validation->set_rules('ddl_ga_status', 'Google Analytics Status', 'required');
          $this->form_validation->set_rules('txt_ga_id', 'Google Analytics Id', 'required');
          $this->form_validation->set_rules('ddl_tawk_status', 'Tawk.to Status', 'required');
          $this->form_validation->set_rules('txt_tawk_id', 'Tawk.to Id', 'required');
          
          if ($this->form_validation->run() == false) {
              
          } else {
              
            $data_update=array(
                'google_analytics ' => $this->input->post('txt_ga_id', true),
                'ga_status' => $this->input->post('ddl_ga_status', true),
                'tawk_id' => $this->input->post('txt_tawk_id', true),
                'tawk_status' => $this->input->post('ddl_tawk_status', true),
                'edit_date ' => date("Y-m-d H:i:s"),
               
            );
            $data_update = $this->security->xss_clean($data_update);
            $this->Common_model->update('settings_script', $data_update, "sc_id = 1");
            redirect(base_url().'admin/settings/script_settings/updated');
          }
        }
        $data=array(

            'page_title' => 'Settings',
            'sub_page_title' => 'Website Embed Script',
            'script_record' => $script_record,
            'success_message' => $success_message,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/settings/script-settings', $data);
         $this->layout_admin_footer();

} 

 // Social Links 

 // Soical List

public function social_settings()	{

    $social_records = $this->Common_model->multiple_record('settings_social', '', 'sl_id desc', '');
    $success_message ="";

    if($this->uri->segment(4)=='inserted')
     $success_message = Data_added;
    if($this->uri->segment(4)=='updated')
        $success_message = Data_updated;
    if($this->uri->segment(4)=='deleted')
        $success_message = Data_deleted;

   
        $data=array(
            
            'page_title' => 'Settings',
            'sub_page_title' => 'Social Links',
            'social_records' => $social_records,
            'success_message' => $success_message,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/settings/social-settings', $data);
         $this->layout_admin_footer();

}

// Social Link Add
 
public function social_settings_add()	{

   

    if ($_POST) {

          $this->form_validation->set_rules('txt_social_icon', 'Social Icon', 'required');
          $this->form_validation->set_rules('txt_social_url', 'Social URL', 'required');
          $this->form_validation->set_rules('ddl_status', 'Status', 'required');
          
          if ($this->form_validation->run() == false) {
              
          } else {
              
            $data_insert=array(
                'icon ' => $this->input->post('txt_social_icon', true),
                'url' => $this->input->post('txt_social_url', true),
                'sort_order' => $this->input->post('txt_sort_order', true),
                'status' => $this->input->post('ddl_status', true),
                'create_date ' => date("Y-m-d H:i:s"),
               
            );
            $data_insert = $this->security->xss_clean($data_insert);
            $this->Common_model->insert('settings_social', $data_insert);
            redirect(base_url().'admin/settings/social_settings/inserted');
          }
        }
        $data=array(
            
            'page_title' => 'Settings',
            'sub_page_title' => 'Social Link Add',
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/settings/social-settings-add', $data);
         $this->layout_admin_footer();

} 

// Social Link Add
 
public function social_settings_edit()	{

    
    if($this->uri->segment(4))
        $id = $this->uri->segment(4);
    else   
         $id = $this->input->post('txt_id', true);

    $id = $this->security->xss_clean($id);
    $social_record = $this->Common_model->single_record('settings_social', 'sl_id = '.$id, '', '');
    
    if ($_POST) {

          $this->form_validation->set_rules('txt_social_icon', 'Social Icon', 'required');
          $this->form_validation->set_rules('txt_social_url', 'Social URL', 'required');
          $this->form_validation->set_rules('ddl_status', 'Status', 'required');
          
          if ($this->form_validation->run() == false) {
              
          } else {
              
            $data_update = array(
                'icon ' => $this->input->post('txt_social_icon', true),
                'url' => $this->input->post('txt_social_url', true),
                'sort_order' => $this->input->post('txt_sort_order', true),
                'status' => $this->input->post('ddl_status', true),
                'edit_date ' => date("Y-m-d H:i:s"),
               
            );
            $data_update = $this->security->xss_clean($data_update);
            $this->Common_model->update('settings_social', $data_update, "sl_id = ".$id);
            redirect(base_url().'admin/settings/social_settings/updated');
          }
        }

        $data = array(
            
            'page_title' => 'Settings',
            'sub_page_title' => 'Social Link Edit',
            'social_record' => $social_record,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/settings/social-settings-edit', $data);
         $this->layout_admin_footer();

} 

// delete record

public function social_settings_delete()	{
    
    if($this->uri->segment(4))
    $id = $this->uri->segment(4);
   
    $id = $this->security->xss_clean($id);
    $this->Common_model->delete('settings_social', "sl_id = ".$id);
    redirect(base_url().'admin/settings/social_settings/deleted');
}

// Soical List

public function theme_settings()	{

    $theme_records = $this->Common_model->multiple_record('settings_theme', '', 'th_id desc', '');
    $success_message ="";
  
    if($this->uri->segment(4)=='updated')
     $success_message = Data_updated;

    if ($_POST) {
          
      $selected_color = $this->input->post('rd_color');
      $theme_id = $this->input->post('txt_th_id');
    

      $data_update = array(
        'status ' => 0,
        'selected_color' => "",
        'edit_date ' => date("Y-m-d H:i:s"),
       
    );
    $data_update = $this->security->xss_clean($data_update);
    $this->Common_model->update('settings_theme', $data_update, "th_id <> ".$theme_id);

    $data_update = array(
        'status ' => 1,
        'selected_color' => $selected_color,
        'theme_style_selected' => $this->input->post('ddl_theme_style'),
        'edit_date ' => date("Y-m-d H:i:s"),
       
    );

    $data_update = $this->security->xss_clean($data_update);
    $this->Common_model->update('settings_theme', $data_update, "th_id = ".$theme_id);
    redirect(base_url().'admin/settings/theme_settings/updated');


    }
      
        $data=array(
            
            'page_title' => 'Settings',
            'sub_page_title' => 'Themes',
            'theme_records' => $theme_records,
            'success_message' => $success_message,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/settings/themes-settings', $data);
         $this->layout_admin_footer();

}


}

