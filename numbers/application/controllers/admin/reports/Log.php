<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends Base_Controller {

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
		}else{
			$content['org_id'] = -1;
    	}

		$this->load->view('admin/report/log', $content);
	}

	public function getSentByOrg(){

		$request = json_decode(file_get_contents("php://input"));

		$type = $request->type;
		$org_id = $request->org_id;

		$condition = array(
			"type" => $type,
			"org_id" => $org_id
		);
		$this->load->model("admin/sentModel", "sent", true);
		$res = $this->sent->getSent($condition);
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}
}

