<?php

class Base_Controller extends CI_Controller {
	public function __construct(){
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('session');

		if ( ($this->session->userdata('logged_in') == false))
        {
            redirect('/login');
        }  
	}
}

?>