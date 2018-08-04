<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ThreeDigits extends Base_Controller {

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

		$this->load->view('admin/report/threeDigit', $content);
	}

	public function getLimitAndHoldByOrg(){
		$request = json_decode(file_get_contents("php://input"));
		$org_id = $request->org_id;
		$condition = array(
			"org_id" => $org_id
		);
		$this->load->model("admin/numberTypeModel", "numberType", true);
		$res = $this->numberType->getLimitAndHoldByOrg($condition);
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}

	public function getLimitAndHoldByDefault(){
		$request = json_decode(file_get_contents("php://input"));
		$org_id = $request->org_id;
		$this->load->model("admin/numberTypeModel", "numberType", true);
		$res = $this->numberType->getDefaultNumberTypes();
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}

	public function getHeadData(){
		$request = json_decode(file_get_contents("php://input"));
		$period_id = $request->period_id;
		$org_id = $request->org_id;
		$condition = array(
			"period_id" => $period_id,
			"org_id" => $org_id,
			"type_id" => "3H"
		);
		$this->load->model("keyInModel", "keyIn", true);
		$res = $this->keyIn->getData($condition);
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}
	public function getTailData(){
		$request = json_decode(file_get_contents("php://input"));
		$period_id = $request->period_id;
		$org_id = $request->org_id;
		$condition = array(
			"period_id" => $period_id,
			"org_id" => $org_id,
			"type_id" => "3T"
		);
		$this->load->model("keyInModel", "keyIn", true);
		$res = $this->keyIn->getData($condition);
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}
	public function getHeadTailData(){
		$request = json_decode(file_get_contents("php://input"));
		$period_id = $request->period_id;
		$org_id = $request->org_id;
		$condition = array(
			"period_id" => $period_id,
			"org_id" => $org_id,
			"type_id" => "3HT"
		);
		$this->load->model("keyInModel", "keyIn", true);
		$res = $this->keyIn->getData($condition);
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}

	public function getDepth(){
		$request = json_decode(file_get_contents("php://input"));
		$period_id = $request->period_id;
		$org_id = $request->org_id;
		$type = $request->type;
		$condition = array(
			"period_id" => $period_id,
			"org_id" => $org_id,
			"type" => $type
		);
		$this->load->model("admin/sentModel", "sent", true);
		$res = $this->sent->getDepth($condition);
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}

	public function getOrgDepth(){
		$request = json_decode(file_get_contents("php://input"));
		$org_id = $request->org_id;
		$period_id = $request->period_id;
		$condition = array(
			"org_id" => $org_id,
			"period_id" => $period_id
		);
		$this->load->model("admin/sentModel", "sent", true);
		$res = $this->sent->getDepth($condition);
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}

	public function addNewSent(){

		$request = json_decode(file_get_contents("php://input"));

		$type = $request->type;
		$number = $request->number;
		$amount = $request->amount;
		$new_sent = $request->new_sent;
		$hold = $request->hold;
		$period_id = $request->period_id;
		$org_id = $request->org_id;
		$depth = $request->depth;
		$time = $request->time;

		$data = array(
			"type" => $type,
			"number" => $number,
			"amount" => $amount,
			"new_sent" => $new_sent,
			"hold" => $hold,
			"period_id" => $period_id,
			"org_id" => $org_id,
			"depth" => $depth,
			"time" => $time
		);
		$this->load->model("admin/sentModel", "sent", true);
		$this->sent->addNewSent($data);
	}

	public function getSent(){

		$request = json_decode(file_get_contents("php://input"));

		$type = $request->type;
		$period_id = $request->period_id;
		$org_id = $request->org_id;

		$condition = array(
			"type" => $type,
			"period_id" => $period_id,
			"org_id" => $org_id
		);
		$this->load->model("admin/sentModel", "sent", true);
		$res = $this->sent->getSent($condition);
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}
}
