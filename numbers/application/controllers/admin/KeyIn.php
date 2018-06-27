<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KeyIn extends Base_Controller {

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
				'org_id' => $content['org_id'],
				'active' => 1
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

		$this->load->view('admin/keyIn', $content);
	}

	public function insertHead(){	
		       	
    	$number = $this->input->post("number");
		$amount1 = $this->input->post("amount1");
		$operator = $this->input->post("operator");
		$amount2 = $this->input->post("amount2");
		$org_id = $this->input->post("org_id");
		$page = $this->input->post("page");
		$period_id = $this->input->post("period_id");
		$agent_id = $this->input->post("agent_id");
		$data = array(
			"org_id" => $org_id, 
			"period_id" => $period_id,
			"agent_id" => $agent_id,
			"page" => $page,
			"number" => $number,
			"amount1" => $amount1,
			"amount2" => $amount2,
			"operator" => $operator,
			"user_id" => $this->session->userdata('user_id'),
			"type_id" => "3H"
		);
		$this->load->model("keyInModel", "keyIn", true);
		$inserted_id = $this->keyIn->addInput($data);

		echo $inserted_id;
	}

	public function insertTail(){	
		       	
    	$number = $this->input->post("number");
		$amount1 = $this->input->post("amount1");
		$operator = $this->input->post("operator");
		$amount2 = $this->input->post("amount2");
		$org_id = $this->input->post("org_id");
		$page = $this->input->post("page");
		$period_id = $this->input->post("period_id");
		$agent_id = $this->input->post("agent_id");
		$data = array(
			"org_id" => $org_id, 
			"period_id" => $period_id,
			"agent_id" => $agent_id,
			"page" => $page,
			"number" => $number,
			"amount1" => $amount1,
			"amount2" => $amount2,
			"operator" => $operator,
			"user_id" => $this->session->userdata('user_id'),
			"type_id" => "3T"
		);
		$this->load->model("keyInModel", "keyIn", true);
		$inserted_id = $this->keyIn->addInput($data);

		echo $inserted_id;
	}

	public function insertHeadTail(){	
		       	
    	$number = $this->input->post("number");
		$amount1 = $this->input->post("amount1");
		$operator = $this->input->post("operator");
		$amount2 = $this->input->post("amount2");
		$org_id = $this->input->post("org_id");
		$page = $this->input->post("page");
		$period_id = $this->input->post("period_id");
		$agent_id = $this->input->post("agent_id");
		$data = array(
			"org_id" => $org_id, 
			"period_id" => $period_id,
			"agent_id" => $agent_id,
			"page" => $page,
			"number" => $number,
			"amount1" => $amount1,
			"amount2" => $amount2,
			"operator" => $operator,
			"user_id" => $this->session->userdata('user_id'),
			"type_id" => "3HT"
		);
		$this->load->model("keyInModel", "keyIn", true);
		$inserted_id = $this->keyIn->addInput($data);

		echo $inserted_id;
	}

	public function insertTop(){	
		       	
    	$number = $this->input->post("number");
		$amount = $this->input->post("amount");
		$org_id = $this->input->post("org_id");
		$page = $this->input->post("page");
		$period_id = $this->input->post("period_id");
		$agent_id = $this->input->post("agent_id");
		$data = array(
			"org_id" => $org_id, 
			"period_id" => $period_id,
			"agent_id" => $agent_id,
			"page" => $page,
			"number" => $number,
			"amount1" => $amount,
			"amount2" => "",
			"operator" => "",
			"user_id" => $this->session->userdata('user_id'),
			"type_id" => "2T"
		);
		$this->load->model("keyInModel", "keyIn", true);
		$inserted_id = $this->keyIn->addInput($data);

		echo $inserted_id;
	}

	public function insertBottom(){	
		       	
    	$number = $this->input->post("number");
		$amount = $this->input->post("amount");
		$org_id = $this->input->post("org_id");
		$page = $this->input->post("page");
		$period_id = $this->input->post("period_id");
		$agent_id = $this->input->post("agent_id");
		$data = array(
			"org_id" => $org_id, 
			"period_id" => $period_id,
			"agent_id" => $agent_id,
			"page" => $page,
			"number" => $number,
			"amount1" => $amount,
			"amount2" => "",
			"operator" => "",
			"user_id" => $this->session->userdata('user_id'),
			"type_id" => "2B"
		);
		$this->load->model("keyInModel", "keyIn", true);
		$inserted_id = $this->keyIn->addInput($data);

		echo $inserted_id;
	}

	public function insertTopBottom(){	
		       	
    	$number = $this->input->post("number");
		$amount = $this->input->post("amount");
		$org_id = $this->input->post("org_id");
		$page = $this->input->post("page");
		$period_id = $this->input->post("period_id");
		$agent_id = $this->input->post("agent_id");
		$data = array(
			"org_id" => $org_id, 
			"period_id" => $period_id,
			"agent_id" => $agent_id,
			"page" => $page,
			"number" => $number,
			"amount1" => $amount,
			"amount2" => "",
			"operator" => "",
			"user_id" => $this->session->userdata('user_id'),
			"type_id" => "2TB"
		);
		$this->load->model("keyInModel", "keyIn", true);
		$inserted_id = $this->keyIn->addInput($data);

		echo $inserted_id;
	}

	public function inputDelete(){
		$input_id = $this->input->post('input_id');
		$this->load->model("keyInModel", "keyIn", true);
		$res = $this->keyIn->inputDelete($input_id);
		echo $res;
	}

	public function inputUpdate(){
		$number = $this->input->post("number");
		$amount1 = $this->input->post("amount1");
		$operator = $this->input->post("operator");
		$amount2 = $this->input->post("amount2");
		$input_id = $this->input->post('id');
		$data = array(			
			"number" => $number,
			"amount1" => $amount1,
			"amount2" => $amount2,
			"operator" => $operator			
		);
		$this->load->model("keyInModel", "keyIn", true);
		$this->keyIn->inputUpdate($data, $input_id);
		echo true;
	}

	public function getTotalPage(){
		$request = json_decode(file_get_contents("php://input"));
		$page = $request->page;
		$agent_id = $request->agent_id;
		$period_id = $request->period_id;
		$condition = array(			
			"page" => $page,
			"agent_id" => $agent_id,
			"period_id" => $period_id,
			"user_id" => $this->session->userdata('user_id')
		);
		$this->load->model("keyInModel", "keyIn", true);

		echo $this->keyIn->getTotalPage($condition);

	}

	public function getTotalGrand(){
		$request = json_decode(file_get_contents("php://input"));
		$agent_id = $request->agent_id;
		$period_id = $request->period_id;
		$condition = array(
			"agent_id" => $agent_id,
			"period_id" => $period_id		
		);
		$this->load->model("keyInModel", "keyIn", true);
		echo $this->keyIn->getTotalPage($condition);
	}

	public function getCredit(){
		$request = json_decode(file_get_contents("php://input"));
		$agent_id = $request->agent_id;
		$condition = array(
			"agent_id" => $agent_id		
		);
		$this->load->model("admin/agentManagementModel", "agent", true);
		$credit = $this->agent->getCredit($condition);
		echo $credit;
	}

	public function getHeadData(){
		$request = json_decode(file_get_contents("php://input"));
		$page = $request->page;
		$agent_id = $request->agent_id;
		$period_id = $request->period_id;
		$org_id = $request->org_id;
		$condition = array(			
			"page" => $page,
			"agent_id" => $agent_id,
			"period_id" => $period_id,
			"org_id" => $org_id,
			"user_id" => $this->session->userdata('user_id'),
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
		$page = $request->page;
		$agent_id = $request->agent_id;
		$period_id = $request->period_id;
		$org_id = $request->org_id;
		$condition = array(			
			"page" => $page,
			"agent_id" => $agent_id,
			"period_id" => $period_id,
			"org_id" => $org_id,
			"user_id" => $this->session->userdata('user_id'),
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
		$page = $request->page;
		$agent_id = $request->agent_id;
		$period_id = $request->period_id;
		$org_id = $request->org_id;
		$condition = array(			
			"page" => $page,
			"agent_id" => $agent_id,
			"period_id" => $period_id,
			"org_id" => $org_id,
			"user_id" => $this->session->userdata('user_id'),
			"type_id" => "3HT"
		);
		$this->load->model("keyInModel", "keyIn", true);
		$res = $this->keyIn->getData($condition);
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}
	public function getTopData(){
		$request = json_decode(file_get_contents("php://input"));
		$page = $request->page;
		$agent_id = $request->agent_id;
		$period_id = $request->period_id;
		$org_id = $request->org_id;
		$condition = array(			
			"page" => $page,
			"agent_id" => $agent_id,
			"period_id" => $period_id,
			"org_id" => $org_id,
			"user_id" => $this->session->userdata('user_id'),
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
		$page = $request->page;
		$agent_id = $request->agent_id;
		$period_id = $request->period_id;
		$org_id = $request->org_id;
		$condition = array(			
			"page" => $page,
			"agent_id" => $agent_id,
			"period_id" => $period_id,
			"org_id" => $org_id,
			"user_id" => $this->session->userdata('user_id'),
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
		$page = $request->page;
		$agent_id = $request->agent_id;
		$period_id = $request->period_id;
		$org_id = $request->org_id;
		$condition = array(			
			"page" => $page,
			"agent_id" => $agent_id,
			"period_id" => $period_id,
			"org_id" => $org_id,
			"user_id" => $this->session->userdata('user_id'),
			"type_id" => "2TB"
		);
		$this->load->model("keyInModel", "keyIn", true);
		$res = $this->keyIn->getData($condition);
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}

	public function deleteAllData(){
		$period_id = $this->input->post("period_id");
		$condition = array(
			"period_id" => $period_id		
		);
		$this->load->model("keyInModel", "keyIn", true);
		$this->keyIn->deleteAllData($condition);
		$this->load->model("admin/sentModel", "sent", true);
		$this->sent->deleteAllSent($condition);
		$this->load->model("admin/periodManagementModel", "period", true);

		$data = array(
			"total" => null,
			"net" => null,
			"pay" => null,
			"p_l" => null
		);

		$this->period->updatePeriod($data, $condition);
		$toast = array('state' => true, 'msg' => 'ข้อมูลทั้งหมดถูกลบเรียบร้อยแล้ว');
		$this->session->set_flashdata('toast', $toast);
		
		echo true;
	}

	public function deleteAllDataUser(){
		$period_id = $this->input->post("period_id");
		$condition = array(
			"period_id" => $period_id,
			"user_id" => $this->session->userdata('user_id')	
		);
		$this->load->model("keyInModel", "keyIn", true);
		$this->keyIn->deleteAllData($condition);
		$condition = array(
			"period_id" => $period_id		
		);
		$this->load->model("admin/sentModel", "sent", true);
		$this->sent->deleteAllSent($condition);
		$this->load->model("admin/periodManagementModel", "period", true);
		$data = array(
			"total" => null,
			"net" => null,
			"pay" => null,
			"p_l" => null
		);
		$this->period->updatePeriod($data, $condition);
		echo true;
	}
}
