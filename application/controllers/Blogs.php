<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

   
 // Portfolio List
public function index()	{

    $records = $this->Common_model->multiple_record('blogs', '', 'bo_id desc', '');
    $success_message ="";

    if($this->uri->segment(4)=='inserted')
     $success_message = Data_added;
    if($this->uri->segment(4)=='updated')
        $success_message = Data_updated;
    if($this->uri->segment(4)=='deleted')
        $success_message = Data_deleted;

   
        $data=array(
            
            'page_title' => 'Blogs',
            'sub_page_title' => 'List',
            'records' => $records,
            'success_message' => $success_message,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/blogs/list', $data);
         $this->layout_admin_footer();

}

// Portfolio Add 
public function add()	{

    $image_error = "";
    $records_cat = $this->Common_model->multiple_record('blog_category', '', 'bc_id desc', '');
    if ($_POST) {

          $this->form_validation->set_rules('ddl_category', 'Category', 'required');
          $this->form_validation->set_rules('txt_title', 'Title', 'required');
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
                    
                    'bc_id ' => $this->input->post('ddl_category', true),
                    'title' => $this->input->post('txt_title', true),
                    'details' => $this->input->post('txt_details', true),
                    'pic' => $image,
                    'meta_title' => $this->input->post('txt_meta_title', true),
                    'meta_keywords' => $this->input->post('txt_meta_keywords', true),
                    'meta_description' => $this->input->post('txt_meta_description', true),
                    'sort_order' => $this->input->post('txt_sort_order', true),
                    'status' => $this->input->post('ddl_status', true),
                    'create_date ' => date("Y-m-d H:i:s"),
                
                );
                $data_insert = $this->security->xss_clean($data_insert);
                $this->Common_model->insert('blogs', $data_insert);
                redirect(base_url().'admin/blogs/list/inserted');
             }
          }
        }
    
        $data=array(
            
            'page_title' => 'Blogs',
            'sub_page_title' => 'Add New',
            'image_error'=>$image_error,
            'records_cat'=>$records_cat,
           
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/blogs/add', $data);
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
    $record = $this->Common_model->single_record('blogs', 'bo_id = '.$id, '', '');
    $records_cat = $this->Common_model->multiple_record('blog_category', '', 'bc_id desc', '');
    
    if ($_POST) {

        $this->form_validation->set_rules('ddl_category', 'Category', 'required');
        $this->form_validation->set_rules('txt_title', 'Title', 'required');
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
                'bc_id ' => $this->input->post('ddl_category', true),
                'title' => $this->input->post('txt_title', true),
                'details' => $this->input->post('txt_details', true),
                'pic' => $image,
                'meta_title' => $this->input->post('txt_meta_title', true),
                'meta_keywords' => $this->input->post('txt_meta_keywords', true),
                'meta_description' => $this->input->post('txt_meta_description', true),
                'sort_order' => $this->input->post('txt_sort_order', true),
                'status' => $this->input->post('ddl_status', true),
                'edit_date ' => date("Y-m-d H:i:s"),
               
            );
            $data_update = $this->security->xss_clean($data_update);
            $this->Common_model->update('blogs', $data_update, "bo_id = ".$id);
            redirect(base_url().'admin/blogs/list/updated');
          }
        }

        $data = array(
            
            'page_title' => 'Blogs',
            'sub_page_title' => 'Edit',
            'record' => $record,
            'records_cat' => $records_cat,
            'image_error'=>$image_error,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/blogs/edit', $data);
         $this->layout_admin_footer();

} 

// delete record
public function delete()	{
    
    if($this->uri->segment(4))
    $id = $this->uri->segment(4);
   
    $id = $this->security->xss_clean($id);
    $this->Common_model->delete('blogs', "bo_id = ".$id);
    redirect(base_url().'admin/blogs/list/deleted');
}

// category list
public function category()	{

    $records = $this->Common_model->multiple_record('blog_category', '', 'bc_id desc', '');
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
            
            'page_title' => 'Blogs',
            'sub_page_title' => 'Category',
            'records' => $records,
            'success_message' => $success_message,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/blogs/category', $data);
         $this->layout_admin_footer();

}

// Category Add 
public function category_add()	{

    if ($_POST) {

          $this->form_validation->set_rules('txt_title', 'Title', 'required');
          $this->form_validation->set_rules('ddl_status', 'Status', 'required');
          
          if ($this->form_validation->run() == false) {
              
          } else {
              
                $data_insert=array(
                    'title' => $this->input->post('txt_title', true),
                    'sort_order' => $this->input->post('txt_sort_order', true),
                    'status' => $this->input->post('ddl_status', true),
                    'create_date ' => date("Y-m-d H:i:s"),
                
                );
                $data_insert = $this->security->xss_clean($data_insert);
                $this->Common_model->insert('blog_category', $data_insert);
                redirect(base_url().'admin/blogs/category/inserted');
            
          }
        }
    
        $data=array(
            
            'page_title' => 'Blogs',
            'sub_page_title' => 'Add New Category',
           
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/blogs/category-add', $data);
         $this->layout_admin_footer();

} 


// Category Edit 
public function category_edit()	{

    if($this->uri->segment(5))
        $id = $this->uri->segment(5);
    else   
         $id = $this->input->post('txt_id', true);

    $id = $this->security->xss_clean($id);
    $record = $this->Common_model->single_record('blog_category', 'bc_id = '.$id, '', '');
    
    if ($_POST) {
        
          $this->form_validation->set_rules('txt_title', 'Title', 'required');
          $this->form_validation->set_rules('ddl_status', 'Status', 'required');
        
          if ($this->form_validation->run() == false) {
              
          } else {

           
              
            $data_update = array(
                'title' => $this->input->post('txt_title', true),
                'sort_order' => $this->input->post('txt_sort_order', true),
                'status' => $this->input->post('ddl_status', true),
                'edit_date ' => date("Y-m-d H:i:s"),
               
            );
            $data_update = $this->security->xss_clean($data_update);
            $this->Common_model->update('blog_category', $data_update, "bc_id = ".$id);
         
            redirect(base_url().'admin/blogs/category/updated');
          }
        }

        $data = array(
            
            'page_title' => 'Blogs',
            'sub_page_title' => 'Edit Category',
            'record' => $record,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/blogs/category-edit', $data);
         $this->layout_admin_footer();

} 

// delete category record
public function category_delete()	{
    
    if($this->uri->segment(5))
    $id = $this->uri->segment(5);
   
    $record = $this->Common_model->single_record('blogs', 'bc_id = '.$id, '', '');

    if(!$record) {
        $id = $this->security->xss_clean($id);
        $this->Common_model->delete('blog_category', "bc_id = ".$id);
        redirect(base_url().'admin/blogs/category/deleted');
    } else {
        redirect(base_url().'admin/blogs/category/existed');
    }
}


// Blog Settings
public function settings()	{

    $image_error =""; $success_message ="";

    $record = $this->Common_model->single_record('blog_settings', '', '', '');    

    if($this->uri->segment(4)=='updated')
    $success_message = Data_updated;


    if ($_POST) {

          $this->form_validation->set_rules('ddl_items_show', 'Show Blogs on Home Page', 'required');
          
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
            $this->Common_model->update('blog_settings', $data_update, "bs_id = 1");
            redirect(base_url().'admin/blogs/settings/updated');
          }
        }
        $data=array(
            
            'page_title' => 'Blogs',
            'sub_page_title' => 'Settings',
            'record' => $record,
            'image_error' => $image_error,
            'success_message' => $success_message,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/blogs/settings', $data);
         $this->layout_admin_footer();

} 

 // Portfolio List
 public function comments_list()	{

    $success_message ="";

    $id = $this->uri->segment(5);

    if($this->uri->segment(6)=='updated')
    $success_message = Data_updated;
    
    if($this->uri->segment(6)=='deleted')
    $success_message = Data_deleted;
    

    $records = $this->Common_model->multiple_record('blog_comments', 'bo_id = '.$id , 'bm_id desc', '');
   
        $data=array(
            
            'page_title' => 'Blogs',
            'sub_page_title' => 'Comments',
            'records' => $records,
            'success_message' => $success_message,
         );
 
         $this->layout_admin_header();
         $this->layout_admin_sidebar();
         $this->load->view('admin/blogs/comments', $data);
         $this->layout_admin_footer();

}

// delete comments record
    public function comments_delete()	{
        
        if($this->uri->segment(5))
            $id = $this->uri->segment(5);

        $id = $this->security->xss_clean($id);
        $record = $this->Common_model->single_record('blog_comments', 'bm_id = '.$id, '', '');


        
        $this->Common_model->delete('blog_comments', "bm_id = ".$id);
        redirect(base_url().'admin/blogs/comments/view/'.$record->bo_id.'/deleted');
    }

    // active comments 
    public function comments_active()	{
        
        $comment_stauts = 0;

        if($this->uri->segment(5))
       $id = $this->uri->segment(5);

       $record = $this->Common_model->single_record('blog_comments', 'bm_id = '.$id, '', '');

        if($record->status == 1)
            $comment_stauts = 0;
        else if($record->status == 0)
            $comment_stauts = 1;

        $data_update = array(
            'status' => $comment_stauts,            
        );

        $data_update = $this->security->xss_clean($data_update);
        $this->Common_model->update('blog_comments', $data_update, "bm_id = ".$id);
        redirect(base_url().'admin/blogs/comments/view/'.$record->bo_id.'/updated');
    }

}

