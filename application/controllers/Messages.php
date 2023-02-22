<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

   
 // Messages List
public function index()	{

    $records = $this->Common_model->multiple_record('contact_messages', '', 'co_id desc', '');
    $success_message ="";

    if($this->uri->segment(4)=='deleted')
        $success_message = Data_deleted;

   
        $data=array(
            
            'page_title' => 'Messages',
            'sub_page_title' => 'List',
            'records' => $records,
            'success_message' => $success_message,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/messages/list', $data);
         $this->layout_admin_footer();

}

 // Messages List
 public function view()	{

    if($this->uri->segment(4))
    $id = $this->uri->segment(4);

    $record = $this->Common_model->single_record('contact_messages', 'co_id = '.$id, '', '');
    $success_message ="";

    if($this->uri->segment(4)=='deleted')
        $success_message = Data_deleted;

   
        $data=array(
            
            'page_title' => 'Messages',
            'sub_page_title' => 'View',
            'record' => $record,
            'success_message' => $success_message,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/messages/view', $data);
         $this->layout_admin_footer();

}


// delete record
public function delete()	{
    
    if($this->uri->segment(4))
    $id = $this->uri->segment(4);
   
    $id = $this->security->xss_clean($id);
    $this->Common_model->delete('contact_messages', "co_id = ".$id);
    redirect(base_url().'admin/messages/list/deleted');
}




}

