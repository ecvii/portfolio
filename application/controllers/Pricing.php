<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pricing extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

   
 // Portfolio List
public function index()	{

    $records = $this->Common_model->multiple_record('pricing_features', '', 'pf_id desc', '');
    $success_message ="";

    if($this->uri->segment(4)=='inserted')
     $success_message = Data_added;
    if($this->uri->segment(4)=='updated')
        $success_message = Data_updated;
    if($this->uri->segment(4)=='deleted')
        $success_message = Data_deleted;

   
        $data=array(
            
            'page_title' => 'Pricing',
            'sub_page_title' => 'List',
            'records' => $records,
            'success_message' => $success_message,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/pricing/list', $data);
         $this->layout_admin_footer();

}

// Portfolio Add 
public function add()	{

    $image_error = "";
    $records_cat = $this->Common_model->multiple_record('pricing_category', '', 'pc_id desc', '');
    if ($_POST) {

          $this->form_validation->set_rules('ddl_category', 'Category', 'required');
          $this->form_validation->set_rules('txt_title', 'Title', 'required');
          $this->form_validation->set_rules('ddl_status', 'Status', 'required');
        
          
          if ($this->form_validation->run() == false) {
              
          } else {
              
            
                $data_insert=array(
                    
                    'pc_id ' => $this->input->post('ddl_category', true),
                    'title' => $this->input->post('txt_title', true),
                    'sort_order' => $this->input->post('txt_sort_order', true),
                    'status' => $this->input->post('ddl_status', true),
                    'create_date ' => date("Y-m-d H:i:s"),
                
                );
                $data_insert = $this->security->xss_clean($data_insert);
                $this->Common_model->insert('pricing_features', $data_insert);
                redirect(base_url().'admin/pricing/list/inserted');
             
          }
        }
    
        $data=array(
            
            'page_title' => 'Pricing',
            'sub_page_title' => 'Add New',
            'image_error'=>$image_error,
            'records_cat'=>$records_cat,
           
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/pricing/add', $data);
         $this->layout_admin_footer();

} 

// Portfolio Edit
public function edit()	{

    $image_error ="";

    if($this->uri->segment(4))
        $id = $this->uri->segment(4);
    else   
         $id = $this->input->post('txt_id', true);

    $id = $this->security->xss_clean($id);
    $record = $this->Common_model->single_record('pricing_features', 'pf_id = '.$id, '', '');
    $records_cat = $this->Common_model->multiple_record('pricing_category', '', 'pc_id desc', '');
    
    if ($_POST) {

        $this->form_validation->set_rules('ddl_category', 'Category', 'required');
        $this->form_validation->set_rules('txt_title', 'Title', 'required');
        $this->form_validation->set_rules('ddl_status', 'Status', 'required');
      
          if ($this->form_validation->run() == false) {
              
          } else {

          
              
            $data_update = array(
                'pc_id ' => $this->input->post('ddl_category', true),
                'title' => $this->input->post('txt_title', true),
                'sort_order' => $this->input->post('txt_sort_order', true),
                'status' => $this->input->post('ddl_status', true),
                'edit_date ' => date("Y-m-d H:i:s"),
               
            );
            $data_update = $this->security->xss_clean($data_update);
            $this->Common_model->update('pricing_features', $data_update, "pf_id = ".$id);
            redirect(base_url().'admin/pricing/list/updated');
          }
        }

        $data = array(
            
            'page_title' => 'Pricing',
            'sub_page_title' => 'Edit',
            'record' => $record,
            'records_cat' => $records_cat,
            'image_error'=>$image_error,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/pricing/edit', $data);
         $this->layout_admin_footer();

} 

// delete record
public function delete()	{
    
    if($this->uri->segment(4))
    $id = $this->uri->segment(4);
   
    $id = $this->security->xss_clean($id);
    $this->Common_model->delete('pricing_features', "pf_id = ".$id);
    redirect(base_url().'admin/pricing/list/deleted');
}

// category list
public function category()	{

    $records = $this->Common_model->multiple_record('pricing_category', '', 'pc_id desc', '');
    $success_message ="";

    if($this->uri->segment(4)=='inserted')
     $success_message = Data_added;
    if($this->uri->segment(4)=='updated')
        $success_message = Data_updated;
    if($this->uri->segment(4)=='deleted')
        $success_message = Data_deleted;
    if($this->uri->segment(4)=='existed')
        $success_message = Data_existed;

        
        $data=array(
            
            'page_title' => 'Pricing',
            'sub_page_title' => 'Category',
            'records' => $records,
            'success_message' => $success_message,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/pricing/category', $data);
         $this->layout_admin_footer();

}

// Category Add 
public function category_add()	{

    if ($_POST) {

          $this->form_validation->set_rules('txt_title', 'Title', 'required');
          $this->form_validation->set_rules('txt_price', 'Price', 'required');
          $this->form_validation->set_rules('ddl_payment_type', 'Payment Type', 'required');
          $this->form_validation->set_rules('ddl_status', 'Status', 'required');
          
          if ($this->form_validation->run() == false) {
              
          } else {
              
                $data_insert=array(
                    'title' => $this->input->post('txt_title', true),
                    'price' => $this->input->post('txt_price', true),
                    'payment_type' => $this->input->post('ddl_payment_type', true),
                    'order_link' => $this->input->post('txt_order_link', true),
                    'sort_order' => $this->input->post('txt_sort_order', true),
                    'status' => $this->input->post('ddl_status', true),
                    'create_date ' => date("Y-m-d H:i:s"),
                
                );
                $data_insert = $this->security->xss_clean($data_insert);
                $this->Common_model->insert('pricing_category', $data_insert);
                redirect(base_url().'admin/pricing/category/inserted');
            
          }
        }
    
        $data=array(
            
            'page_title' => 'Pricing',
            'sub_page_title' => 'Add New Category',
           
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/pricing/category-add', $data);
         $this->layout_admin_footer();

} 


// Category Edit 
public function category_edit()	{

    if($this->uri->segment(5))
        $id = $this->uri->segment(5);
    else   
         $id = $this->input->post('txt_id', true);

    $id = $this->security->xss_clean($id);
    $record = $this->Common_model->single_record('pricing_category', 'pc_id = '.$id, '', '');
    
    if ($_POST) {
        
            $this->form_validation->set_rules('txt_title', 'Title', 'required');
            $this->form_validation->set_rules('txt_price', 'Price', 'required');
            $this->form_validation->set_rules('ddl_payment_type', 'Payment Type', 'required');
            $this->form_validation->set_rules('ddl_status', 'Status', 'required');
        
          if ($this->form_validation->run() == false) {
              
          } else {

           
              
            $data_update = array(
                'title' => $this->input->post('txt_title', true),
                'price' => $this->input->post('txt_price', true),
                'payment_type' => $this->input->post('txt_payment_type', true),
                'order_link' => $this->input->post('txt_order_link', true),
                'sort_order' => $this->input->post('txt_sort_order', true),
                'status' => $this->input->post('ddl_status', true),
                'edit_date ' => date("Y-m-d H:i:s"),
               
            );
            $data_update = $this->security->xss_clean($data_update);
            $this->Common_model->update('pricing_category', $data_update, "pc_id = ".$id);
         
            redirect(base_url().'admin/pricing/category/updated');
          }
        }

        $data = array(
            
            'page_title' => 'Pricing',
            'sub_page_title' => 'Edit Category',
            'record' => $record,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/pricing/category-edit', $data);
         $this->layout_admin_footer();

} 

// delete category record
public function category_delete()	{
    
    if($this->uri->segment(5))
    $id = $this->uri->segment(5);
   
    $record = $this->Common_model->single_record('pricing_features', 'pc_id = '.$id, '', '');

    if(!$record) {
        $id = $this->security->xss_clean($id);
        $this->Common_model->delete('pricing_category', "pc_id = ".$id);
        redirect(base_url().'admin/pricing/category/deleted');
    } else {
        redirect(base_url().'admin/pricing/category/existed');
    }
}

// Pricing Settings
public function settings()	{

    $success_message ="";

    $record = $this->Common_model->single_record('pricing_settings', '', '', '');    

    if($this->uri->segment(4)=='updated')
    $success_message = Data_updated;


    if ($_POST) {

          $this->form_validation->set_rules('ddl_items_show', 'Show Pricing Tables Home Page', 'required');
          
          
          if ($this->form_validation->run() == false) {
              
          } else {       
               
            $data_update = array(
                'items_show' => $this->input->post('ddl_items_show', true),
                'edit_date ' => date("Y-m-d H:i:s"),               
            );

            $data_update = $this->security->xss_clean($data_update);
            $this->Common_model->update('pricing_settings', $data_update, "ps_id = 1");
            redirect(base_url().'admin/pricing/settings/updated');
          }
        }
        $data=array(
            
            'page_title' => 'Pricing',
            'sub_page_title' => 'Settings',
            'record' => $record,
            'success_message' => $success_message,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/pricing/settings', $data);
         $this->layout_admin_footer();

} 



}

