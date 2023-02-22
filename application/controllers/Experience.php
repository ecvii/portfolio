<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Experience extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

   
 // Slider List

public function index()	{

    $records = $this->Common_model->multiple_record('experience', '', 'ex_id desc', '');
    $success_message ="";

    if($this->uri->segment(4)=='inserted')
     $success_message = Data_added;
    if($this->uri->segment(4)=='updated')
        $success_message = Data_updated;
    if($this->uri->segment(4)=='deleted')
        $success_message = Data_deleted;

   
        $data=array(
            
            'page_title' => 'Experience',
            'sub_page_title' => 'List',
            'records' => $records,
            'success_message' => $success_message,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/experience/list', $data);
         $this->layout_admin_footer();

}

// Social Link Add
 
public function add()	{

    if ($_POST) {

          $this->form_validation->set_rules('txt_designation', 'Designation', 'required');
          $this->form_validation->set_rules('txt_company', 'Company', 'required');
          $this->form_validation->set_rules('ddl_status', 'Status', 'required');
          
          if ($this->form_validation->run() == false) {
              
          } else {
              
                $data_insert=array(
                    'designation' => $this->input->post('txt_designation', true),
                    'company' => $this->input->post('txt_company', true),
                    'details' => $this->input->post('txt_details', true),
                    'from_date' => $this->input->post('txt_date_from', true),
                    'to_date' => $this->input->post('txt_date_to', true),
                    'current_date' => $this->input->post('chk_current_date', true),
                    'sort_order' => $this->input->post('txt_sort_order', true),
                    'status' => $this->input->post('ddl_status', true),
                    'create_date ' => date("Y-m-d H:i:s"),
                
                );
                $data_insert = $this->security->xss_clean($data_insert);
                $this->Common_model->insert('experience', $data_insert);
                redirect(base_url().'admin/experience/list/inserted');
            
          }
        }
    
        $data=array(
            
            'page_title' => 'Experience',
            'sub_page_title' => 'Add New',
           
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/experience/add', $data);
         $this->layout_admin_footer();

} 

// Social Link Add
 
public function edit()	{

    if($this->uri->segment(4))
        $id = $this->uri->segment(4);
    else   
         $id = $this->input->post('txt_id', true);

    $id = $this->security->xss_clean($id);
    $record = $this->Common_model->single_record('experience', 'ex_id = '.$id, '', '');
    
    if ($_POST) {

          $this->form_validation->set_rules('txt_designation', 'Designation', 'required');
          $this->form_validation->set_rules('txt_company', 'Company', 'required');
          $this->form_validation->set_rules('ddl_status', 'Status', 'required');
        
          if ($this->form_validation->run() == false) {
              
          } else {

           
              
            $data_update = array(
                'designation' => $this->input->post('txt_designation', true),
                'company' => $this->input->post('txt_company', true),
                'details' => $this->input->post('txt_details', true),
                'from_date' => $this->input->post('txt_date_from', true),
                'to_date' => $this->input->post('txt_date_to', true),
                'current_date' => $this->input->post('chk_current_date', true),
                'sort_order' => $this->input->post('txt_sort_order', true),
                'status' => $this->input->post('ddl_status', true),
                'edit_date ' => date("Y-m-d H:i:s"),
               
            );
            $data_update = $this->security->xss_clean($data_update);
            $this->Common_model->update('experience', $data_update, "ex_id = ".$id);
            redirect(base_url().'admin/experience/list/updated');
          }
        }

        $data = array(
            
            'page_title' => 'Experience',
            'sub_page_title' => 'Edit',
            'record' => $record,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/experience/edit', $data);
         $this->layout_admin_footer();

} 

// delete record

public function delete()	{
    
    if($this->uri->segment(4))
    $id = $this->uri->segment(4);
   
    $id = $this->security->xss_clean($id);
    $this->Common_model->delete('experience', "ex_id = ".$id);
    redirect(base_url().'admin/experience/list/deleted');
}




}

