<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organization extends Base_Controller {

	public function __construct()
    {
    	parent::__construct();
	}

	public function index()
	{
		if($this->session->userdata('role') == "user")
    		redirect('/user/keyIn');

    	$this->load->model("admin/organizationModel", "organization", true);
    	$user_org_id = $this->session->userdata('user_org_id');
    	
		$content['orgs'] = $this->organization->getOrgByIdForAdmin($user_org_id);
		if(!empty($content['orgs'])){
			$content['org_id'] = $content['orgs'][0]->org_id;
		}else{
			$content['org_id'] = -1;
		}
		$this->load->view('admin/settings/organization', $content);
	}

	public function updateAdmin(){

    	$username = $this->input->post("username");
		$password = $this->input->post("password");
		$user_id = $this->input->post("user_id");

		$this->load->model("userModel", "user", true);
		
		$data = array(
			"username" => $username,
			"password" => $password
		);

		$this->user->updateUser($data, $user_id);

		$res   = array('state' => true, 'msg' => $username.' อัพเดทเสร็จสิ้น');


		
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}
}
