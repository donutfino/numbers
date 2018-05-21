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
}
