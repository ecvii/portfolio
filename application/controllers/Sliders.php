<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sliders extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

   
 // Slider List
public function index()	{

    $records = $this->Common_model->multiple_record('sliders', '', 's_id desc', '');
    $success_message ="";

    if($this->uri->segment(4)=='inserted')
     $success_message = Data_added;
    if($this->uri->segment(4)=='updated')
        $success_message = Data_updated;
    if($this->uri->segment(4)=='deleted')
        $success_message = Data_deleted;

   
        $data=array(
            
            'page_title' => 'Sliders',
            'sub_page_title' => 'List',
            'records' => $records,
            'success_message' => $success_message,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/sliders/list', $data);
         $this->layout_admin_footer();

}

// Slider Add 
public function add()	{

    $image_error = "";

    if ($_POST) {

          
          $this->form_validation->set_rules('ddl_status', 'Status', 'required');
          
          if ($this->form_validation->run() == false) {
              
          } else {
              
            if (!empty($_FILES['fle_pic']['name'])) {
                
                $image = time() . '-' . $_FILES["fle_pic"]['name'];
                $config['upload_path'] = './assets/upload/pics';
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
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
                    $image ="";                
                  
                }                    
            }
            if ($upload_status) {

                $data_insert=array(
                    'text_1 ' => $this->input->post('txt_text_1', true),
                    'text_2' => $this->input->post('txt_text_2', true),
                    'text_3' => $this->input->post('txt_text_3', true),
                    'pic' => $image,
                    'social_status ' => $this->input->post('ddl_social_status', true),
                    'sort_order' => $this->input->post('txt_sort_order', true),
                    'status' => $this->input->post('ddl_status', true),
                    'create_date ' => date("Y-m-d H:i:s"),
                
                );
                $data_insert = $this->security->xss_clean($data_insert);
                $this->Common_model->insert('sliders', $data_insert);
                redirect(base_url().'admin/sliders/list/inserted');
             }
          }
        }
    
        $data=array(
            
            'page_title' => 'Sliders',
            'sub_page_title' => 'Add New',
            'image_error'=>$image_error,
           
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/sliders/add', $data);
         $this->layout_admin_footer();

} 

// Slider Edit
public function edit()	{

    $image_error ="";

    if($this->uri->segment(4))
        $id = $this->uri->segment(4);
    else   
         $id = $this->input->post('txt_id', true);

    $id = $this->security->xss_clean($id);
    $record = $this->Common_model->single_record('sliders', 's_id = '.$id, '', '');
    
    if ($_POST) {

          $this->form_validation->set_rules('ddl_status', 'Status', 'required');
          
          if ($this->form_validation->run() == false) {
              
          } else {

            if (!empty($_FILES['fle_pic']['name'])) {
                
                $image = time() . '-' . $_FILES["fle_pic"]['name'];
                $config['upload_path'] = './assets/upload/pics';
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
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
              
            $data_update = array(
                'text_1 ' => $this->input->post('txt_text_1', true),
                'text_2' => $this->input->post('txt_text_2', true),
                'text_3' => $this->input->post('txt_text_3', true),
                'pic' => $image,
                'social_status ' => $this->input->post('ddl_social_status', true),
                'sort_order' => $this->input->post('txt_sort_order', true),
                'status' => $this->input->post('ddl_status', true),
                'edit_date ' => date("Y-m-d H:i:s"),
               
            );
            $data_update = $this->security->xss_clean($data_update);
            $this->Common_model->update('sliders', $data_update, "s_id = ".$id);
            redirect(base_url().'admin/sliders/list/updated');
          }
        }

        $data = array(
            
            'page_title' => 'Sliders',
            'sub_page_title' => 'Edit',
            'record' => $record,
            'image_error'=>$image_error,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/sliders/edit', $data);
         $this->layout_admin_footer();

} 

// delete record

public function delete()	{
    
    if($this->uri->segment(4))
    $id = $this->uri->segment(4);
   
    $id = $this->security->xss_clean($id);
    $this->Common_model->delete('sliders', "s_id = ".$id);
    redirect(base_url().'admin/sliders/list/deleted');
}

// slider settings
public function settings()	{

    $record = $this->Common_model->single_record('sliders_settings', '', '', '');
    $success_message ="";  $image_error ="";

    if($this->uri->segment(4)=='updated')
    $success_message = Data_updated;


    if ($_POST) {

          $this->form_validation->set_rules('ddl_status', 'Parallax Status', 'required');
          $this->form_validation->set_rules('ddl_parallax_effects', 'Parallax Effects', 'required');
          
          if ($this->form_validation->run() == false) {
              
          } else {
              
            if (!empty($_FILES['fle_pic']['name'])) {
                
                $image = time() . '-' . $_FILES["fle_pic"]['name'];
                $config['upload_path'] = './assets/upload/pics';
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
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
                'status ' => $this->input->post('ddl_status', true),
                'parallax_effects' => $this->input->post('ddl_parallax_effects', true),
                'text_1 ' => $this->input->post('txt_text_1', true),
                'text_2' => $this->input->post('txt_text_2', true),
                'text_3' => $this->input->post('txt_text_3', true),
                'pic' => $image,
                'social_status ' => $this->input->post('ddl_social_status', true),
                'edit_date ' => date("Y-m-d H:i:s"),
               
            );
            $data_update = $this->security->xss_clean($data_update);
            $this->Common_model->update('sliders_settings', $data_update, "se_id = 1");
            redirect(base_url().'admin/sliders/settings/updated');
          }
        }
        $data=array(
            
            'page_title' => 'Parallax Slider',
            'sub_page_title' => 'Settings',
            'record' => $record,
            'success_message' => $success_message,
            'image_error' => $image_error,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/sliders/settings', $data);
         $this->layout_admin_footer();

} 



}

