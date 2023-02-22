<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

   
 // about me
public function index()	{

    $record = $this->Common_model->single_record('profile_about', 'pf_id = 1', '', '');
    $image_error = ""; $success_message = "";
    
    if($this->uri->segment(4)=='updated')
     $success_message = Data_updated;

    if ($_POST) {

        $this->form_validation->set_rules('txt_name', 'Name', 'required');
        $this->form_validation->set_rules('ddl_freelance', 'Freelancer Availability', 'required');
        
        if ($this->form_validation->run() == false) {
            
        } else {
            
            if (!empty($_FILES['fle_pic']['name'])) {
                
                $image = time() . '-' . $_FILES["fle_pic"]['name'];
                $config['upload_path'] = './assets/upload/pics';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['remove_spaces'] = true;
                $config['max_size'] = '2048';
                $config['file_name'] = $image;
              

                $this->load->library('upload', $config);
                $upload_status = $this->upload->do_upload("fle_pic");

                //Returns array of data related to file uploaded.
                $upload_data = $this->upload->data();
                $image = $upload_data['file_name'];

                if (!$upload_status) {
                    
                    $image_error = $this->upload->display_errors(); 
                    $image =  $record->pic;                  
                  
                }   
                
               
            }                   
            else {

                $image =  $record->pic;
            }
                

            $data_update=array(
                'title' => $this->input->post('txt_about_title', true),
                'name' => $this->input->post('txt_name', true),
                'age' => $this->input->post('txt_age', true),
                'residence' => $this->input->post('txt_residence', true),
                'position_type' => $this->input->post('txt_position', true),
                'freelance_avail' => $this->input->post('ddl_freelance', true),
                'details' => $this->input->post('txt_details', true),
                'pic' => $image,
                'edit_date ' => date("Y-m-d H:i:s"),
               
            );
            $data_update = $this->security->xss_clean($data_update);
            $this->Common_model->update('profile_about', $data_update, "pf_id = 1");
            if($image_error=="")
                redirect(base_url().'admin/profile/about/updated');
           
        }

    }
    
    $data=array(

       'page_title' => 'Profile',
       'sub_page_title' => 'About Me',
       'record' => $record,
       'image_error' => $image_error,
       'success_message' => $success_message,
    );

    $this->layout_admin_header();
    $this->layout_admin_sidebar();
    $this->load->view('admin/profile/about', $data);
    $this->layout_admin_footer();
}

// contact info
public function contact()	{

    $record = $this->Common_model->single_record('profile_contact', 'co_id = 1', '', '');
    $success_message = "";
    
    if($this->uri->segment(4)=='updated')
     $success_message = Data_updated;

    if ($_POST) {

        $this->form_validation->set_rules('txt_address', 'Address', 'required');
        $this->form_validation->set_rules('txt_phone_1', 'Phone 1', 'required');
        $this->form_validation->set_rules('txt_email_1', 'Email 1', 'required');
        
        if ($this->form_validation->run() == false) {
            
        } else {
            
            
            $data_update=array(
                'phone_1' => $this->input->post('txt_phone_1', true),
                'phone_2' => $this->input->post('txt_phone_2', true),
                'email_1' => $this->input->post('txt_email_1', true),
                'email_2' => $this->input->post('txt_email_2', true),
                'website' => $this->input->post('txt_website', true),
                'address' => $this->input->post('txt_address', true),
                
                'edit_date ' => date("Y-m-d H:i:s"),
               
            );
            $data_update = $this->security->xss_clean($data_update);
            $this->Common_model->update('profile_contact', $data_update, "co_id = 1");
            redirect(base_url().'admin/profile/contact/updated');
           
        }

    }
    
    $data=array(

       'page_title' => 'Profile',
       'sub_page_title' => 'Contact Information',
       'record' => $record,
       'success_message' => $success_message,
    );

    $this->layout_admin_header();
    $this->layout_admin_sidebar();
    $this->load->view('admin/profile/contact', $data);
    $this->layout_admin_footer();
}


// Slider List
public function facts()	{

    $records = $this->Common_model->multiple_record('profile_facts', '', 'fu_id desc', '');
    $success_message ="";

    if($this->uri->segment(4)=='inserted')
     $success_message = Data_added;
    if($this->uri->segment(4)=='updated')
        $success_message = Data_updated;
    if($this->uri->segment(4)=='deleted')
        $success_message = Data_deleted;

   
        $data=array(
            
            'page_title' => 'Profile',
            'sub_page_title' => 'Fun Facts',
            'records' => $records,
            'success_message' => $success_message,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/profile/facts', $data);
         $this->layout_admin_footer();

}

// Fun Facts Add 
public function facts_add()	{


    if ($_POST) {

            $this->form_validation->set_rules('txt_title', 'Title', 'required');
            $this->form_validation->set_rules('txt_value', 'Value', 'required');
            $this->form_validation->set_rules('txt_icon', 'Icon', 'required');
            $this->form_validation->set_rules('ddl_status', 'Status', 'required');
          
          if ($this->form_validation->run() == false) {
              
          } else {              
           
                $data_insert=array(
                    'title ' => $this->input->post('txt_title', true),
                    'value' => $this->input->post('txt_value', true),
                    'icon' => $this->input->post('txt_icon', true),
                    'sort_order' => $this->input->post('txt_sort_order', true),
                    'status' => $this->input->post('ddl_status', true),
                    'create_date ' => date("Y-m-d H:i:s"),
                
                );
                $data_insert = $this->security->xss_clean($data_insert);
                $this->Common_model->insert('profile_facts', $data_insert);
                redirect(base_url().'admin/profile/facts/inserted');
             
          }
        }
    
        $data=array(
            
            'page_title' => 'Profile',
            'sub_page_title' => 'Fun Facts Add New',
           
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/profile/facts-add', $data);
         $this->layout_admin_footer();

} 

// Fun Facts Edit 
public function facts_edit()	{


    if($this->uri->segment(5))
        $id = $this->uri->segment(5);
    else   
        $id = $this->input->post('txt_id', true);
    
    $id = $this->security->xss_clean($id);
        $record = $this->Common_model->single_record('profile_facts', 'fu_id = '.$id, '', '');

    if ($_POST) {

         echo   $this->form_validation->set_rules('txt_title', 'Title', 'required');
            $this->form_validation->set_rules('txt_value', 'Value', 'required');
            $this->form_validation->set_rules('txt_icon', 'Icon', 'required');
            $this->form_validation->set_rules('ddl_status', 'Status', 'required');
          
          if ($this->form_validation->run() == false) {
              
          } else {              
           
                $data_update=array(
                    'title ' => $this->input->post('txt_title', true),
                    'value' => $this->input->post('txt_value', true),
                    'icon' => $this->input->post('txt_icon', true),
                    'sort_order' => $this->input->post('txt_sort_order', true),
                    'status' => $this->input->post('ddl_status', true),
                    'edit_date ' => date("Y-m-d H:i:s"),
                
                );

                $data_update = $this->security->xss_clean($data_update);
                 $this->Common_model->update('profile_facts', $data_update, "fu_id = ".$id);
                redirect(base_url().'admin/profile/facts/updated');
             
          }
        }
    
        $data=array(
            
            'page_title' => 'Profile',
            'sub_page_title' => 'Fun Facts Edit',
            'record' => $record,

           
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/profile/facts-edit', $data);
         $this->layout_admin_footer();

} 

// delete record
public function facts_delete()	{
    
    if($this->uri->segment(5))
    $id = $this->uri->segment(5);
   
    $id = $this->security->xss_clean($id);
    $this->Common_model->delete('profile_facts', "fu_id = ".$id);
    redirect(base_url().'admin/profile/facts/deleted');
}

 // upload cv
 public function cv()	{

    $record = $this->Common_model->single_record('profile_cv', 'cv_id = 1', '', '');
    $image_error = ""; $success_message = "";
    
    if($this->uri->segment(4)=='updated')
     $success_message = Data_updated;

    if ($_FILES) {

       
        $this->form_validation->set_rules('fle_pic', 'File', 'equired');
        
        if ($this->form_validation->run() == false) {
            
        } else {
            
            if (!empty($_FILES['fle_pic']['name'])) {
                
               echo $image = time() . '-' . $_FILES["fle_pic"]['name'];
                $config['upload_path'] = './assets/upload/cv';
                $config['allowed_types'] = 'pdf|doc|docx|jpeg|jpg|png';
                $config['remove_spaces'] = true;
                $config['max_size'] = '2048';
                $config['file_name'] = $image;
              

                $this->load->library('upload', $config);
                $upload_status = $this->upload->do_upload("fle_pic");

                //Returns array of data related to file uploaded.
                $upload_data = $this->upload->data();
                $image = $upload_data['file_name'];

                if (!$upload_status) {
                    
                    $image_error = $this->upload->display_errors(); 
                    $image =  $record->file_name;                  
                  
                }   
                
               
            }                   
            else {

                $image =  $record->file_name;
            }
                

            $data_update=array(
                'file_name' => $image,
                'edit_date ' => date("Y-m-d H:i:s"),
               
            );
            $data_update = $this->security->xss_clean($data_update);
            $this->Common_model->update('profile_cv', $data_update, "cv_id = 1");
            if($image_error=="")
                redirect(base_url().'admin/profile/cv/updated');
           
        }

    }
    
    $data=array(

       'page_title' => 'Profile',
       'sub_page_title' => 'CV/Resume Upload',
       'record' => $record,
       'image_error' => $image_error,
       'success_message' => $success_message,
    );

    $this->layout_admin_header();
    $this->layout_admin_sidebar();
    $this->load->view('admin/profile/cv', $data);
    $this->layout_admin_footer();
}

 
// edit user
public function edit_user()	{

    $record = $this->Common_model->single_record('admin_users', 'admin_id = 1', '', '');
    $image_error = ""; $success_message = "";
    
    if($this->uri->segment(4)=='updated')
     $success_message = Data_updated;

     if ($_POST) {

        $this->form_validation->set_rules('txt_name', 'Name', 'required');
        $this->form_validation->set_rules('txt_user_name', 'User Name', 'required');
        $this->form_validation->set_rules('txt_email', 'Email', 'required');

        if($record->pic == "") {
        if (empty($_FILES['fle_pic']['name'])) {
          $this->form_validation->set_rules('fle_pic', 'Image', 'required');
        }
    }
        if ($this->form_validation->run() == false) {
            
        } else {
            
            if (!empty($_FILES['fle_pic']['name'])) {
                
                $image = time() . '-' . $_FILES["fle_pic"]['name'];
                $config['upload_path'] = './assets/upload/pics';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['remove_spaces'] = true;
                $config['max_size'] = '2048';
                $config['file_name'] = $image;
              

                $this->load->library('upload', $config);
                $upload_status = $this->upload->do_upload("fle_pic");

                //Returns array of data related to file uploaded.
                $upload_data = $this->upload->data();
                $image = $upload_data['file_name'];

                if (!$upload_status) {
                    
                    $image_error = $this->upload->display_errors(); 
                    $image =  $record->pic;                  
                  
                }   
                
               
            }                   
            else {

                $image =  $record->pic;
            }
                

            $data_update=array(
                'name' => $this->input->post('txt_name', true),
                'user_name' => $this->input->post('txt_user_name', true),
                'email' => $this->input->post('txt_email', true),
                'pic' => $image,
                'edit_date ' => date("Y-m-d H:i:s"),
               
            );
            $data_update = $this->security->xss_clean($data_update);
            $this->Common_model->update('admin_users', $data_update, "admin_id = 1");
            if($image_error=="")
                redirect(base_url().'admin/profile/edit_user/updated');
           
        }

    }
    
    $data=array(

       'page_title' => 'Profile',
       'sub_page_title' => 'Edit Admin User',
       'record' => $record,
       'image_error' => $image_error,
       'success_message' => $success_message,
    );

    $this->layout_admin_header();
    $this->layout_admin_sidebar();
    $this->load->view('admin/profile/user', $data);
    $this->layout_admin_footer();
}

// edit user
public function change_password()	{

    $record = $this->Common_model->single_record('admin_users', 'admin_id = 1', '', '');
    $success_message = ""; $wrong_password ="";
    
    if($this->uri->segment(4)=='updated')
     $success_message = Data_updated;

     if ($_POST) {

        $this->form_validation->set_rules('txt_old_password', 'Old Password', 'trim|required|min_length[4]|max_length[24]');
        $this->form_validation->set_rules('txt_new_password', 'New Password', 'trim|required|min_length[4]|max_length[24]');
        $this->form_validation->set_rules('txt_confirm_password', 'Confirm Password', 'required|matches[txt_new_password]');

        
        
        if ($this->form_validation->run() == false) {
            
        } else {
           
            if($record->password==md5($this->input->post('txt_old_password', true))) {
               
           $data_update=array(
                'password' => md5($this->input->post('txt_new_password', true)),
                'edit_date ' => date("Y-m-d H:i:s"),
               
            );

            $data_update = $this->security->xss_clean($data_update);
            $this->Common_model->update('admin_users', $data_update, "admin_id = 1");
               redirect(base_url().'admin/profile/change_password/updated');
        } else {
            $wrong_password = Wrong_password; 
        }
           
        }

    }
    
    $data=array(

       'page_title' => 'Profile',
       'sub_page_title' => 'Change Password',
       'record' => $record,
       'wrong_password'=>$wrong_password,
       'success_message' => $success_message,
    );

    $this->layout_admin_header();
    $this->layout_admin_sidebar();
    $this->load->view('admin/profile/password', $data);
    $this->layout_admin_footer();
}

// delete record
public function logout()	{
    
    session_unset();
    session_destroy();
    redirect(base_url().'admin');
}


}

