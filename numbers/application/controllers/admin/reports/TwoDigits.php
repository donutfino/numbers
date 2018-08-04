<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TwoDigits extends Base_Controller {

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
			
			$condition = array(
				'org_id' => $content['org_id']
			);
			$this->load->model("admin/agentManagementModel", "agent", true);
			$content['agents'] = $this->agent->getAgentsByOrgId($condition);
			$condition = array(
				'org_id' => $content['org_id'],
				'status' => 1
			);
			$this->load->model("admin/periodManagementModel", "period", true);
			$content['periods'] = $this->period->getOpenPeriodsByOrgId($condition);

		}else{
			$content['org_id'] = -1;
    	}

		$this->load->view('admin/report/twoDigit', $content);
	}

	public function getTopData(){
		$request = json_decode(file_get_contents("php://input"));
		$period_id = $request->period_id;
		$org_id = $request->org_id;
		$condition = array(
			"period_id" => $period_id,
			"org_id" => $org_id,
			"type_id" => "2T"
		);
		$this->load->model("keyInModel", "keyIn", true);
		$res = $this->keyIn->getData($condition);
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}
	public function getBottomData(){
		$request = json_decode(file_get_contents("php://input"));
		$period_id = $request->period_id;
		$org_id = $request->org_id;
		$condition = array(
			"period_id" => $period_id,
			"org_id" => $org_id,
			"type_id" => "2B"
		);
		$this->load->model("keyInModel", "keyIn", true);
		$res = $this->keyIn->getData($condition);
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}
	public function getTopBottomData(){
		$request = json_decode(file_get_contents("php://input"));
		$period_id = $request->period_id;
		$org_id = $request->org_id;
		$condition = array(
			"period_id" => $period_id,
			"org_id" => $org_id,
			"type_id" => "2TB"
		);
		$this->load->model("keyInModel", "keyIn", true);
		$res = $this->keyIn->getData($condition);
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}
}
