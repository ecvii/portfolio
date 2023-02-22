<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonials extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

   
 // Slider List
public function index()	{

    $records = $this->Common_model->multiple_record('testimonials', '', 'tm_id desc', '');
    $success_message ="";

    if($this->uri->segment(4)=='inserted')
     $success_message = Data_added;
    if($this->uri->segment(4)=='updated')
        $success_message = Data_updated;
    if($this->uri->segment(4)=='deleted')
        $success_message = Data_deleted;

   
        $data=array(
            
            'page_title' => 'Testimonials',
            'sub_page_title' => 'List',
            'records' => $records,
            'success_message' => $success_message,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/testimonials/list', $data);
         $this->layout_admin_footer();

}

// Slider Add 
public function add()	{

    $image_error = ""; $upload_status = "";

    if ($_POST) {

        $this->form_validation->set_rules('txt_name', 'Name', 'required');
        $this->form_validation->set_rules('txt_designation', 'Designation', 'required');
        $this->form_validation->set_rules('txt_company', 'Company', 'required');
        $this->form_validation->set_rules('txt_details', 'Details', 'required');
        $this->form_validation->set_rules('ddl_status', 'Status', 'required');
        
        if (empty($_FILES['fle_pic']['name'])) {
            $this->form_validation->set_rules('fle_pic', 'Image', 'required');
          }

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
                    'name ' => $this->input->post('txt_name', true),
                    'designation' => $this->input->post('txt_designation', true),
                    'company' => $this->input->post('txt_company', true),
                    'details' => $this->input->post('txt_details', true),
                    'pic' => $image,
                    'sort_order' => $this->input->post('txt_sort_order', true),
                    'status' => $this->input->post('ddl_status', true),
                    'create_date ' => date("Y-m-d H:i:s"),
                
                );
                $data_insert = $this->security->xss_clean($data_insert);
                $this->Common_model->insert('testimonials', $data_insert);
                redirect(base_url().'admin/testimonials/list/inserted');
             }
          }
        }
    
        $data=array(
            
            'page_title' => 'testimonials',
            'sub_page_title' => 'Add New',
            'image_error'=>$image_error,
           
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/testimonials/add', $data);
         $this->layout_admin_footer();

} 

// Slider Edit
public function edit()	{

    $image_error ="";  $upload_status = "";

    if($this->uri->segment(4))
        $id = $this->uri->segment(4);
    else   
         $id = $this->input->post('txt_id', true);

    $id = $this->security->xss_clean($id);
    $record = $this->Common_model->single_record('testimonials', 'tm_id = '.$id, '', '');
    
    if ($_POST) {
        
          $this->form_validation->set_rules('txt_name', 'Name', 'required');
          $this->form_validation->set_rules('txt_designation', 'Designation', 'required');
          $this->form_validation->set_rules('txt_company', 'Company', 'required');
          $this->form_validation->set_rules('txt_details', 'Details', 'required');
          $this->form_validation->set_rules('ddl_status', 'Status', 'required');
          
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
                'name ' => $this->input->post('txt_name', true),
                'designation' => $this->input->post('txt_designation', true),
                'company' => $this->input->post('txt_company', true),
                'details' => $this->input->post('txt_details', true),
                'pic' => $image,
                'sort_order' => $this->input->post('txt_sort_order', true),
                'status' => $this->input->post('ddl_status', true),
                'edit_date ' => date("Y-m-d H:i:s"),
               
            );
            $data_update = $this->security->xss_clean($data_update);
            $this->Common_model->update('testimonials', $data_update, "tm_id = ".$id);
            redirect(base_url().'admin/testimonials/list/updated');
          }
        }

        $data = array(
            
            'page_title' => 'testimonials',
            'sub_page_title' => 'Edit',
            'record' => $record,
            'image_error'=>$image_error,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/testimonials/edit', $data);
         $this->layout_admin_footer();

} 

// delete record

public function delete()	{
    
    if($this->uri->segment(4))
    $id = $this->uri->segment(4);
   
    $id = $this->security->xss_clean($id);
    $this->Common_model->delete('testimonials', "tm_id = ".$id);
    redirect(base_url().'admin/testimonials/list/deleted');
}

// Testimonials Settings
public function settings()	{

    $image_error =""; $success_message ="";

    $record = $this->Common_model->single_record('testimonials_settings', '', '', '');    

    if($this->uri->segment(4)=='updated')
    $success_message = Data_updated;


    if ($_POST) {

          $this->form_validation->set_rules('ddl_items_show', 'Show Testimonails on Home Page', 'required');
          
          if($record->inner_bg == "") {
            if (empty($_FILES['fle_pic']['name'])) {
              $this->form_validation->set_rules('fle_pic', 'Inner Page Image', 'required');
            }
        }  
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
                    $image =  $record->inner_bg;                  
                  
                }                    

            }
                               
            else {

                $image =  $record->inner_bg;
            }
              
            $data_update = array(
                'items_show' => $this->input->post('ddl_items_show', true),
                'inner_bg' => $image,
                'edit_date ' => date("Y-m-d H:i:s"),               
            );

            $data_update = $this->security->xss_clean($data_update);
            $this->Common_model->update('testimonials_settings', $data_update, "ts_id = 1");
            redirect(base_url().'admin/testimonials/settings/updated');
          }
        }
        $data=array(
            
            'page_title' => 'Testimonials',
            'sub_page_title' => 'Settings',
            'record' => $record,
            'image_error' => $image_error,
            'success_message' => $success_message,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/testimonials/settings', $data);
         $this->layout_admin_footer();

} 


}

