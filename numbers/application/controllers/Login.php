<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
	}

	public function index()
	{
		$this->load->view('login_view');
	}

	//check the email and password and log the user in if the user info is correct
	public function authenticate()
	{	
		$this->load->model("userModel","user", true);
		$this->load->library('form_validation');
		//Form validation - codeigniter provides you with powerful form validation functionality
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('email', 'อีเมล', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'รหัสผ่าน', 'required');
        
        if ($this->form_validation->run() == FALSE) {
           	$res = array('state' => false, 'msg' => validation_errors());
        } else {
        	$type = $this->user->login($email, $password);
			if ($type == "user" ) {
				$res   = array('state' => true, 'type' => $type, 'msg' => 'เข้าสู่ระบบสำเร็จ');
				$toast = array('state' => true, 'msg' => 'เข้าสู่ระบบสำเร็จ');
				$this->session->set_flashdata('toast', $toast);

			}else if($type == "admin"){
				$res   = array('state' => true, 'type' => $type, 'msg' => 'เข้าสู่ระบบสำเร็จ');
				$toast = array('state' => true, 'msg' => 'เข้าสู่ระบบสำเร็จ');
				$this->session->set_flashdata('toast', $toast);
			}else if ($type == -3) {
				$msg = "คุณไม่สามารถเข้าสู่ระบบได้เพราะว่าคุณยังไม่ได้ใช้งาน";
				$res = array('state' => false, 'msg' => $msg);
			}else if ($type == -1) {
				$msg = "รหัสผ่านไม่ถูกต้อง";
				$res = array('state' => false, 'msg' => $msg);
			}else {
				$msg = "คุณยังไม่ได้ทำการสมัคร";
				$res = array('state' => false, 'msg' => $msg);
			}
        }
        return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));		
	}

	public function logout(){
		//when user clicks log out button, delete all session data and log him out
		$this->session->unset_userdata('email');
		$this->session->unset_userdata("user_id");
		$this->session->unset_userdata("role");
		$this->session->unset_userdata("logged_in");
		$this->session->unset_userdata("user_org_id");
		$this->session->unset_userdata("username");
		redirect('/login');
	}

}
