<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClearPeriodData extends Base_Controller {

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
    	
		$orgs = $this->organization->getOrgByIdForAdmin($user_org_id);

		if(!empty($orgs)){
			$content['org_id'] = $orgs[0]->org_id;
			$this->load->model("admin/periodManagementModel", "period", true);
			$condition = array(
				'org_id' => $content['org_id']
			);
			$content['periods'] = $this->period->getPeriodsByOrgId($condition);

		}else{
			$content['org_id'] = -1;
    	}

		$this->load->view('admin/settings/clearPeriodData', $content);
	}
}
