<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

   
 // Slider List

public function index()	{

    $records = $this->Common_model->multiple_record('services', '', 'se_id desc', '');
    $success_message ="";

    if($this->uri->segment(4)=='inserted')
     $success_message = Data_added;
    if($this->uri->segment(4)=='updated')
        $success_message = Data_updated;
    if($this->uri->segment(4)=='deleted')
        $success_message = Data_deleted;

   
        $data=array(
            
            'page_title' => 'Services',
            'sub_page_title' => 'List',
            'records' => $records,
            'success_message' => $success_message,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/services/list', $data);
         $this->layout_admin_footer();

}

// Social Link Add
 
public function add()	{

    if ($_POST) {

          $this->form_validation->set_rules('txt_title', 'Title', 'required');
          $this->form_validation->set_rules('txt_details', 'Details', 'required');
          $this->form_validation->set_rules('txt_icon', 'Details', 'required');
          $this->form_validation->set_rules('ddl_status', 'Status', 'required');
          
          if ($this->form_validation->run() == false) {
              
          } else {
              
                $data_insert=array(
                    'title' => $this->input->post('txt_title', true),
                    'details' => $this->input->post('txt_details', true),
                    'icon' => $this->input->post('txt_icon', true),
                    'sort_order' => $this->input->post('txt_sort_order', true),
                    'status' => $this->input->post('ddl_status', true),
                    'create_date ' => date("Y-m-d H:i:s"),
                
                );
                $data_insert = $this->security->xss_clean($data_insert);
                $this->Common_model->insert('services', $data_insert);
                redirect(base_url().'admin/services/list/inserted');
            
          }
        }
    
        $data=array(
            
            'page_title' => 'Services',
            'sub_page_title' => 'Add New',
           
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/services/add', $data);
         $this->layout_admin_footer();

} 

// Social Link Add
 
public function edit()	{

    if($this->uri->segment(4))
        $id = $this->uri->segment(4);
    else   
         $id = $this->input->post('txt_id', true);

    $id = $this->security->xss_clean($id);
    $record = $this->Common_model->single_record('services', 'se_id = '.$id, '', '');
    
    if ($_POST) {

        $this->form_validation->set_rules('txt_title', 'Title', 'required');
        $this->form_validation->set_rules('txt_details', 'Details', 'required');
        $this->form_validation->set_rules('txt_icon', 'Details', 'required');
         $this->form_validation->set_rules('ddl_status', 'Status', 'required');
        
          if ($this->form_validation->run() == false) {
              
          } else {

           
              
            $data_update = array(
                'title' => $this->input->post('txt_title', true),
                'details' => $this->input->post('txt_details', true),
                'icon' => $this->input->post('txt_icon', true),
                'sort_order' => $this->input->post('txt_sort_order', true),
                'status' => $this->input->post('ddl_status', true),
                'edit_date ' => date("Y-m-d H:i:s"),
               
            );
            $data_update = $this->security->xss_clean($data_update);
            $this->Common_model->update('services', $data_update, "se_id = ".$id);
            redirect(base_url().'admin/services/list/updated');
          }
        }

        $data = array(
            
            'page_title' => 'Services',
            'sub_page_title' => 'Edit',
            'record' => $record,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/services/edit', $data);
         $this->layout_admin_footer();

} 

// delete record

public function delete()	{
    
    if($this->uri->segment(4))
    $id = $this->uri->segment(4);
   
    $id = $this->security->xss_clean($id);
    $this->Common_model->delete('services', "se_id = ".$id);
    redirect(base_url().'admin/services/list/deleted');
}


// Settings
public function settings()	{

    $success_message ="";

    $record = $this->Common_model->single_record('services_settings', '', '', '');    

    if($this->uri->segment(4)=='updated')
    $success_message = Data_updated;


    if ($_POST) {

          $this->form_validation->set_rules('ddl_items_show', 'Show Services on Home Page', 'required');
          
          
          if ($this->form_validation->run() == false) {
              
          } else {       
               
            $data_update = array(
                'items_show' => $this->input->post('ddl_items_show', true),
                'edit_date ' => date("Y-m-d H:i:s"),               
            );

            $data_update = $this->security->xss_clean($data_update);
            $this->Common_model->update('services_settings', $data_update, "ss_id = 1");
            redirect(base_url().'admin/services/settings/updated');
          }
        }
        $data=array(
            
            'page_title' => 'Services',
            'sub_page_title' => 'Settings',
            'record' => $record,
            'success_message' => $success_message,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/services/settings', $data);
         $this->layout_admin_footer();

} 



}

