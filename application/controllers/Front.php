<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

   
 // Home Page
public function index()	{

        $meta_title =""; 

        $selected_theme = $this->Common_model->single_record('settings_theme', 'status = 1', '', '');
        $settings_general = $this->Common_model->single_record('settings_general', '', '', '');

        // seo tags
        $settings_seo = $this->Common_model->single_record('settings_seo', '', '', '');
       
        if($settings_seo->meta_title!="")
            $meta_title = $settings_seo->meta_title; 
        else
             $meta_title = $settings_general->site_title;

        
       // skills 
       $skill_module = $this->Common_model->single_record('settings_module', 'mo_id = 4', '', '');

       // fun facts 
       $fact_module = $this->Common_model->single_record('settings_module', 'mo_id = 7', '', '');
       
       
       //about
        $about_module = $this->Common_model->single_record('settings_module', 'mo_id = 1', '', '');
        $about_title = explode(' ', $about_module->title);
        $about = $this->Common_model->single_record('profile_about', '', '', '');
        $about_cv = $this->Common_model->single_record('profile_cv', '', '', '');
        
        // slider
        $slider_items = $this->Common_model->multiple_record('sliders', 'status = 1', 'sort_order asc', '');
       
      
        // Resume
        $resume_module = $this->Common_model->single_record('settings_module', 'mo_id = 3', '', '');
        $resume_title = explode(' ', $resume_module->title);

        $experience_items = $this->Common_model->multiple_record('experience', 'status = 1', 'sort_order asc', '');
        $education_items = $this->Common_model->multiple_record('education', 'status = 1', 'sort_order asc', '');

            // Skills
        $skills_module = $this->Common_model->single_record('settings_module', 'mo_id = 4', '', '');
        $skills_title = explode(' ', $skills_module->title);

        $skills_items = $this->Common_model->multiple_record('skills', 'status = 1', 'sort_order asc', '');

        // Services
        $services_module = $this->Common_model->single_record('settings_module', 'mo_id = 5', '', '');
        $services_settings = $this->Common_model->single_record('services_settings', '', '', '');
        $services_title = explode(' ', $services_module->title);
 
        $services_items = $this->Common_model->multiple_record('services', 'status = 1', 'sort_order asc', $services_settings->items_show);

        // Portfolio
        $portfolio_module = $this->Common_model->single_record('settings_module', 'mo_id = 6', '', '');
        $portfolio_settings = $this->Common_model->single_record('portfolio_settings', '', '', '');
        $portfolio_title = explode(' ', $portfolio_module->title);

        $portfolio_category = $this->Common_model->multiple_record('portfolio_category', 'status = 1', 'sort_order asc', '');
        $portfolio_items = $this->Common_model->multiple_record('portfolio', 'status = 1', 'sort_order asc', $portfolio_settings->items_show);

        // Fun Facts
        $fact_module = $this->Common_model->single_record('settings_module', 'mo_id = 7', '', '');
        $fact_items = $this->Common_model->multiple_record('profile_facts', 'status = 1', 'sort_order asc', '');
        
        // Team
        $team_module = $this->Common_model->single_record('settings_module', 'mo_id = 9', '', '');
        $team_settings = $this->Common_model->single_record('team_settings', '', '', '');
        $team_title = explode(' ', $team_module->title);

        $team_items = $this->Common_model->multiple_record('team', 'status = 1', 'sort_order asc', $team_settings->items_show);

         // blogs
        $blogs_module = $this->Common_model->single_record('settings_module', 'mo_id = 10', '', '');
        $blog_settings = $this->Common_model->single_record('blog_settings', '', '', '');
        $blogs_title = explode(' ', $blogs_module->title);
 
         $blogs_items = $this->Common_model->multiple_record('blogs', 'status = 1', 'sort_order asc', $blog_settings->items_show);

         // Pricing
        $pricing_module = $this->Common_model->single_record('settings_module', 'mo_id = 11', '', '');
        $pricing_settings = $this->Common_model->single_record('pricing_settings', '', '', '');
        $pricing_title = explode(' ', $pricing_module->title);

        $pricing_category = $this->Common_model->multiple_record('pricing_category', 'status = 1', 'sort_order asc', $pricing_settings->items_show);
       
        // testimonials
        $testimonials_module = $this->Common_model->single_record('settings_module', 'mo_id = 12', '', '');
        $testimonials_settings = $this->Common_model->single_record('testimonials_settings', '', '', '');
        $testimonials_items = $this->Common_model->multiple_record('testimonials', 'status = 1', 'sort_order asc', $testimonials_settings->items_show);
        $testimonials_title = explode(' ', $testimonials_module->title);

         // Pricing
         $contact_module = $this->Common_model->single_record('settings_module', 'mo_id = 13', '', '');
         $contact_title = explode(' ', $contact_module->title);

        $data=array(
            
            'slider_items'=> $slider_items,
            'about'=> $about,
            'about_module'=>$about_module,
            'about_title' => $about_title,    
            'about_cv' => $about_cv, 
            'resume_module'=>$resume_module,
            'resume_title'=>$resume_title,
            'experience_items'=>$experience_items,
            'education_items'=>$education_items,
            'skills_module'=>$skills_module,
            'skills_title'=>$skills_title,
            'skills_items'=>$skills_items,
            'services_module'=>$services_module,
            'services_title'=>$services_title,
            'services_items'=>$services_items, 
            'portfolio_module'=>$portfolio_module,
            'portfolio_title'=>$portfolio_title,
            'portfolio_category'=>$portfolio_category,   
            'portfolio_items'=>$portfolio_items,
            'fact_module'=>$fact_module,  
            'fact_items'=>$fact_items,             
            'team_module'=>$team_module,
            'team_title'=>$team_title,
            'team_items'=>$team_items,  
            'blogs_module'=>$blogs_module,
            'blogs_title'=>$blogs_title,
            'blogs_items'=>$blogs_items,
            'pricing_module'=>$pricing_module,
            'pricing_title'=>$pricing_title,
            'pricing_category'=>$pricing_category,
            'testimonials_module'=>$testimonials_module,
            'testimonials_items'=>$testimonials_items,
            'testimonials_settings'=>$testimonials_settings,
            'testimonials_title'=>$testimonials_title,           
            'contact_module'=>$contact_module,
            'contact_title'=>$contact_title,
            'skill_module'=>$skill_module,
            'fact_module'=>$fact_module,    

                       
         );
 
         $this->layout_front_header($selected_theme, $meta_title, $settings_seo->meta_keywords, $settings_seo->meta_description );

         if($selected_theme->th_id==1) 
            $modules = $this->Common_model->multiple_record('settings_module', 'status = 1', 'sort_order asc', '');
        else if($selected_theme->th_id==2) 
            $modules = $this->Common_model->multiple_record('settings_module', 'status = 1 and mo_id not in(4,7)', 'sort_order asc', '');
        
          $this->load->view('themes/'.$selected_theme->folder_name.'/include/slider', $data);
         $count_module = 0;

         foreach($modules->result() as $module_row) {
            $data['count_module'] = $count_module;
            $this->load->view('themes/'.$selected_theme->folder_name.'/include/'.$module_row->module_file, $data);
            $count_module =  $count_module + 1;

            if($count_module==2) $count_module = 0;
         }
         
         $this->layout_front_footer($selected_theme);

    }

    //blog list
    public function blog_list()	{

        $conditoin = ""; $meta_title =""; 
        
        if($this->uri->segment(2)=='category') {
         $cat_id = $this->uri->segment(3);
         $conditoin = ' and bc_id = '.$cat_id;
        }
        $selected_theme = $this->Common_model->single_record('settings_theme', 'status = 1', '', '');
        $settings_general = $this->Common_model->single_record('settings_general', '', '', '');
        
        // seo tags
        $settings_seo = $this->Common_model->single_record('settings_seo', '', '', '');

       
        if($settings_seo->meta_title!="")
         $meta_title = $settings_seo->meta_title; 
        else
         $meta_title = $settings_general->site_title;

        $about = $this->Common_model->single_record('profile_about', '', '', '');

        $blogs_module = $this->Common_model->single_record('settings_module', 'mo_id = 10', '', '');
        $blog_settings = $this->Common_model->single_record('blog_settings', '', '', '');
        $blogs_title = explode(' ', $blogs_module->title);
 

 
        $blogs_items = $this->Common_model->multiple_record('blogs', 'status = 1'.$conditoin, 'sort_order asc', '');

        

        $data=array(
            
            'blogs_module'=> $blogs_module,
            'blog_settings'=> $blog_settings,
            'blogs_items'=> $blogs_items,
            'about'=> $about,     
            'blogs_title'=> $blogs_title,  

         );


       $this->layout_front_header($selected_theme, $meta_title, $settings_seo->meta_keywords, $settings_seo->meta_description);


        $this->load->view('themes/'.$selected_theme->folder_name.'/pages/blog-list', $data);

        $this->layout_front_footer($selected_theme);

    }

     //blog list
     public function blog_detail()	{
        
        $meta_title ="";  $meta_keywords ="";  $meta_description ="";

        $bo_id = $this->uri->segment(2);        

        $selected_theme = $this->Common_model->single_record('settings_theme', 'status = 1', '', '');

        $settings_general = $this->Common_model->single_record('settings_general', '', '', '');

        // seo tags
        $settings_seo = $this->Common_model->single_record('settings_seo', '', '', '');
       
       
        $about = $this->Common_model->single_record('profile_about', '', '', '');

        $blogs_module = $this->Common_model->single_record('settings_module', 'mo_id = 10', '', '');
        $blog_settings = $this->Common_model->single_record('blog_settings', '', '', '');
        
        $blogs_detail = $this->Common_model->single_record('blogs', 'bo_id = '.$bo_id, '', '');
        $blogs_items = $this->Common_model->multiple_record('blogs', 'status = 1', 'sort_order asc', '');
        $blogs_comments = $this->Common_model->multiple_record('blog_comments', 'bo_id = '.$bo_id.' and status = 1', 'bm_id desc', '');
        $blogs_title = explode(' ', $blogs_module->title);

        
        if($settings_general->site_title!="")
             $meta_title = $settings_general->site_title;

        if($settings_seo->meta_title!="")
            $meta_title = $settings_seo->meta_title; 
        
        if($blogs_detail->meta_title!="")
            $meta_title = $blogs_detail->meta_title;
           
        
        if($blogs_detail->meta_keywords!="")
            $meta_keywords = $blogs_detail->meta_keywords;
        else
            $meta_keywords = $settings_seo->meta_keywords;
        
        if($blogs_detail->meta_description!="")
            $meta_description = $blogs_detail->meta_description;
        else
            $meta_description = $settings_seo->meta_description;

        $data=array(
            
            'blogs_module'=> $blogs_module,
            'blog_settings'=> $blog_settings,
            'blogs_items'=> $blogs_items,
            'about'=> $about,    
            'blogs_detail'=> $blogs_detail,    
            'blogs_comments'=>$blogs_comments,  
            'blogs_title'=> $blogs_title,    
            
                          
         );


        $this->layout_front_header($selected_theme, $meta_title, $meta_keywords, $meta_description);


        $this->load->view('themes/'.$selected_theme->folder_name.'/pages/blog-detail', $data);

        $this->layout_front_footer($selected_theme);

    }


     //blog comments
	public function blog_comments() {		
	
        
		$data_insert=array(
                    
            'bo_id ' => $this->input->post('txt_blog_id', true),
            'name ' => $this->input->post('txt_name', true),
            'email' => $this->input->post('txt_email', true),
            'message' => $this->input->post('txt_message', true),
            'create_date ' => date("Y-m-d H:i:s"),        
        );
        $data_insert = $this->security->xss_clean($data_insert);
        $this->Common_model->insert('blog_comments', $data_insert);
		
		echo "ok";
		
	}

    //contact_message
	public function contact_message() {		
	
        
		$data_insert=array(
                    
            'name ' => $this->input->post('txt_name', true),
            'email' => $this->input->post('txt_email', true),
            'message' => $this->input->post('txt_message', true),
            'create_date ' => date("Y-m-d H:i:s"),        
        );
        $data_insert = $this->security->xss_clean($data_insert);
        $this->Common_model->insert('contact_messages', $data_insert);
		
		echo "ok";
		
	}



}

