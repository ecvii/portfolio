<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

	public function index()	{

        $data=array(
            //'web_settings'=> $this->front_database->front_showSettings()
        );

        $this->layout_admin_header();
        $this->layout_admin_sidebar();
        $this->load->view('admin/pages/dashboard', $data);
        $this->layout_admin_footer();
	}
}
