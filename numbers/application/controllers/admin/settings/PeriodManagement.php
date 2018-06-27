<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PeriodManagement extends Base_Controller {

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

		$this->load->view('admin/settings/periodManagement', $content);
	}

	public function addPeriod(){
		$this->load->library('form_validation');
        $this->form_validation->set_rules('period', 'งวด', 'required|callback_periodCheck');
        $this->form_validation->set_rules('status', 'สถานะ', 'required');

        if ($this->form_validation->run() == FALSE) {
           	$res = array('state' => false, 'msg' => validation_errors());
        } else {
        	
			$period = $this->input->post("period");
			$top_result = $this->input->post("top_result");
			$bottom_result = $this->input->post("bottom_result");			
			$status = $this->input->post("status");
			$org_id = $this->input->post("org_id");			

			$data = array(
				"period" => $period,
				"top_result" => $top_result,
				"bottom_result" => $bottom_result,
				"status" => $status,
				"org_id" => $org_id
			);
			$this->load->model("admin/periodManagementModel", "period", true);
			$period_id = $this->period->addPeriod($data);
			if($period_id > 0){
				$res   = array('state' => true, 'msg' => 'การเพิ่มงวดเสร็จสบูรณ์');
				$toast = array('state' => true, 'msg' => 'การเพิ่มงวดเสร็จสบูรณ์');
				$this->session->set_flashdata('toast', $toast);
			}else{
				$res   = array('state' => false, 'msg' => 'เกิดข้อผิดพลาด');
			}
			
        }      
        return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}

	public function updatePeriod(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('period', 'งวด', 'required');
        $this->form_validation->set_rules('status', 'สถานะ', 'required');

        if ($this->form_validation->run() == FALSE) {
           	$res = array('state' => false, 'msg' => validation_errors());
        } else {
        	$period = $this->input->post("period");
			$top_result = $this->input->post("top_result");
			$bottom_result = $this->input->post("bottom_result");			
			$status = $this->input->post("status");
			$period_id = $this->input->post("period_id");

			$this->load->model("admin/periodManagementModel", "period", true);

			$update_flag = $this->period->update_check($period_id, $period);
			if($update_flag == false){
				$res   = array('state' => false, 'msg' => 'งวดก่อนหน้านี้ยังคงอยู่');
			}else{

				$data = array(
					"period" => $period,
					"top_result" => $top_result,
					"bottom_result" => $bottom_result,
					"status" => $status,
					"total" => null,
					"net" => null,
					"pay" => null,
					"p_l" => null
				);
				$condition = array(
					"period_id" => $period_id		
				);
				$this->period->updatePeriod($data, $condition);
				
				$toast = array('state' => true, 'msg' => $period.' อัพเดทเสร็จสิ้น');
				$this->session->set_flashdata('toast', $toast);
				$res   = array('state' => true, 'msg' => $period.' อัพเดทเสร็จสิ้น');
			}
        }
		
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}
	
	public function deletePeriod(){
		$period_id = $this->input->post("period_id");
		$period = $this->input->post("period");

		$condition = array(
			"period_id" => $period_id
		);

		$this->load->model("admin/periodManagementModel", "period", true);

		$this->period->deletePeriod($condition);

		$toast = array('state' => true, 'msg' => $period.' ลบเสร็จสิ้น');
		$this->session->set_flashdata('toast', $toast);

		echo "success";
	}

	public function periodCheck($str){
		
        $this->db->where('period', $str);
        $query = $this->db->get('periods');
        if($query->num_rows() > 0){
        	$this->form_validation->set_message('periodCheck', 'งวดก่อนหน้านี้ยังคงอยู่');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function getPeriod(){
    	$request = json_decode(file_get_contents("php://input"));
		$org_id = $request->org_id;
		$period_id = $request->period_id;
		$condition = array(
			"period_id" => $period_id,
			"org_id" => $org_id
		);
		$this->load->model("admin/periodManagementModel", "period", true);
		$res = $this->period->getPeriodsByOrgId($condition);
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
    }

    public function updatePeriodInfo(){
    	$request = json_decode(file_get_contents("php://input"));
		$period_id = $request->period_id;
		$total = $request->total;
		$net = $request->net;
		$pay = $request->pay;
		$p_l = $request->p_l;
		
		$this->load->model("admin/periodManagementModel", "period", true);

		$data = array(
			"total" => $total,
			"net" => $net,
			"pay" => $pay,
			"p_l" => $p_l
		);
		$condition = array(
			"period_id" => $period_id		
		);
		$this->period->updatePeriod($data, $condition);

		echo "success";
	}

	public function getAgentsAmounts(){
    	
		$period_id = $this->input->post("period_id");
		$org_id = $this->input->post("org_id");
		$top_result = $this->input->post("top_result");
		$bottom_result = $this->input->post("bottom_result");
		
		$this->load->model("admin/agentManagementModel", "agent", true);
		$this->load->model("keyInModel", "keyIn", true);
		$condition = array(
			'org_id' => $org_id
		);
		$agents = $this->agent->getAgentsByOrgId($condition);
		$result = array();
		foreach ($agents as $value){

			$data = $this->getSentDetailByAgent($period_id, $value->agent_id, $value->agent_name, $top_result, $bottom_result);
        	
        	array_push($result, $data);
		}
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($result));
	}

	public function getSentDetailByAgent($period_id, $agent_id, $agent_name, $top_result, $bottom_result){

		$headTotal = 0; $tailTotal = 0; $headSpecialTotal = 0; $tailSpecialTotal = 0;
		$topTotal = 0; $bottomTotal = 0; $topRunTotal = 0; $bottomRunTotal = 0;

		$this->load->model("keyInModel", "keyIn", true);
		$condition = array(
			"period_id" => $period_id,
			"agent_id" => $agent_id,
			"type_id" => "3H"
		);
		$heads = $this->keyIn->getData($condition);

		$condition = array(
			"period_id" => $period_id,
			"agent_id" => $agent_id,
			"type_id" => "3T"
		);
		$tails = $this->keyIn->getData($condition);

		$condition = array(
			"period_id" => $period_id,
			"agent_id" => $agent_id,
			"type_id" => "3HT"
		);
		$headTails = $this->keyIn->getData($condition);

		$condition = array(
			"period_id" => $period_id,
			"agent_id" => $agent_id,
			"type_id" => "2T"
		);
		$tops = $this->keyIn->getData($condition);

		$condition = array(
			"period_id" => $period_id,
			"agent_id" => $agent_id,
			"type_id" => "2B"
		);
		$bottoms = $this->keyIn->getData($condition);

		$condition = array(
			"period_id" => $period_id,
			"agent_id" => $agent_id,
			"type_id" => "2TB"
		);
		$topBottoms = $this->keyIn->getData($condition);

		foreach ($heads as $item){
			if($item->number === substr($top_result, 0, 3)){
				switch ($item->operator) {
					case '':
						$headTotal += $item->amount1;
						break;
					case '.':
						$headTotal += $item->amount1 + $item->amount2;
						break;
					case '*':
						$headTotal += $item->amount1;
						$headSpecialTotal += $item->amount2;
						break;
				}
			}			
		}
		foreach ($tails as $item){
			if($item->number === substr($top_result, 3, 3)){
				switch ($item->operator) {
					case '':
						$tailTotal += $item->amount1;
						break;
					case '.':
						$tailTotal += $item->amount1 + $item->amount2;
						break;
					case '*':
						$tailTotal += $item->amount1;
						$tailSpecialTotal += $item->amount2;
						break;
				}
			}
		}
		foreach ($headTails as $item){
			if($item->number == substr($top_result, 0, 3)){
				switch ($item->operator) {
					case '':
						$headTotal += $item->amount1/2;
						break;
					case '.':
						$headTotal += $item->amount1/2 + $item->amount2/2;
						break;
					case '*':
						$headTotal += $item->amount1/2;
						$headSpecialTotal += $item->amount2/2;
						break;
				}
			}
			if($item->number == substr($top_result, 3, 3)){
				switch ($item->operator) {
					case '':
						$tailTotal += $item->amount1/2;
						break;
					case '.':
						$tailTotal += $item->amount1/2 + $item->amount2/2;
						break;
					case '*':
						$tailTotal += $item->amount1/2;
						$tailSpecialTotal += $item->amount2/2;
						break;
				}
			}
		}
		foreach ($tops as $item){
			if($item->number === substr($top_result, 4, 2)){
				$topTotal += $item->amount1;
			}
			if(($item->number === substr($top_result, 4, 1)) || ($item->number === substr($top_result, 5, 1))){
				$topRunTotal += $item->amount1;
			}
		}
		foreach ($bottoms as $item){
			if($item->number === $bottom_result){
				$bottomTotal += $item->amount1;
			}
			if(($item->number === substr($bottom_result, 0, 1)) || ($item->number === substr($bottom_result, 1, 1))){
				$bottomRunTotal += $item->amount1;
			}
		}
		foreach ($topBottoms as $item){
			if($item->number === substr($top_result, 4, 2)){
				$topTotal += $item->amount1/2;
			}
			if(($item->number === substr($top_result, 4, 1)) || ($item->number === substr($top_result, 5, 1))){
				$topRunTotal += $item->amount1/2;
			}
			if($item->number === $bottom_result){
				$bottomTotal += $item->amount1/2;
			}
			if(($item->number === substr($bottom_result, 0, 1)) || ($item->number === substr($bottom_result, 1, 1))){
				$bottomRunTotal += $item->amount1/2;
			}
		}

		$data = array(
			'agent_name' => $agent_name,
			'headTotal' => $headTotal,
			'tailTotal' => $tailTotal,
			'headSpecialTotal' => $headSpecialTotal,
			'tailSpecialTotal' => $tailSpecialTotal,
			'topTotal' => $topTotal,
			'bottomTotal' => $bottomTotal,
			'topRunTotal' => $topRunTotal,
			'bottomRunTotal' => $bottomRunTotal,
			'total' => $headTotal + $tailTotal + $headSpecialTotal + $tailSpecialTotal + $topTotal + $bottomTotal + $topRunTotal + $bottomRunTotal
		);
		return $data;
	}
}
