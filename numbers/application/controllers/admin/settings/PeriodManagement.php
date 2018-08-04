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
					"status" => $status
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

    public function getAllPeriodByOrg(){
    	$request = json_decode(file_get_contents("php://input"));
		$org_id = $request->org_id;
		$condition = array(
			"org_id" => $org_id
		);
		$this->load->model("admin/periodManagementModel", "period", true);
		$res = $this->period->getPeriodsByOrgId($condition);
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
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

    public function getPeriodAjax(){
    	$period_id = $this->input->post("period_id");
		$org_id = $this->input->post("org_id");
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
		$head = $request->head;
		$tail = $request->tail;
		$headSpecial = $request->headSpecial;
		$tailSpecial = $request->tailSpecial;
		$top = $request->top;
		$bottom = $request->bottom;
		$topRun = $request->topRun;
		$bottomRun = $request->bottomRun;
		
		$this->load->model("admin/periodManagementModel", "period", true);

		$data = array(
			"total" => $total,
			"net" => $net,
			"pay" => $pay,
			"p_l" => $p_l,
			"head" => $head,
			"tail" => $tail,
			"headSpecial" => $headSpecial,
			"tailSpecial" => $tailSpecial,
			"top" => $top,
			"bottom" => $bottom,
			"topRun" => $topRun,
			"bottomRun" => $bottomRun
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
		$result = [];
		foreach ($agents as $value){

			$data = $this->getSentDetailByAgent($period_id, $value->agent_id, $value->agent_name, $top_result, $bottom_result);
        	
        	array_push($result, $data);
		}
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($result));
	}

	public function getSentDetailByAgent($period_id, $agent_id, $agent_name, $top_result, $bottom_result){

		$headTotal = 0; $tailTotal = 0; $headSpecialTotal = []; $tailSpecialTotal = [];
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
			$shuffle_nums = $this->shuffle_num($item->number);
			$split_num = sizeof($shuffle_nums);
			foreach ($shuffle_nums as $val) {
				if($val === substr($top_result, 0, 3)){
					if($val == $item->number){
						$headTotal += $item->amount1;
					}
					switch ($item->operator) {
						case '.':
							$headTotal += intval($item->amount2/$split_num);
							break;
					}
				}	
			}					
		}
		foreach ($tails as $item){
			$shuffle_nums = $this->shuffle_num($item->number);
			$split_num = sizeof($shuffle_nums);
			foreach ($shuffle_nums as $val) {
				if($val === substr($top_result, 3, 3)){
					if($val == $item->number){
						$tailTotal += $item->amount1;
					}
					switch ($item->operator) {
						case '.':
							$tailTotal += intval($item->amount2/$split_num);
							break;
					}
				}
			}
		}
		foreach ($headTails as $item){
			$shuffle_nums = $this->shuffle_num($item->number);
			$split_num = sizeof($shuffle_nums);
			foreach ($shuffle_nums as $val) {
				if($val === substr($top_result, 0, 3)){
					if($val == $item->number){
						$headTotal += intval($item->amount1/2);
					}
					switch ($item->operator) {
						case '.':
							$headTotal += intval($item->amount2/($split_num*2));
							break;
					}
				}

				if($val === substr($top_result, 3, 3)){
					if($val == $item->number){
						$tailTotal += intval($item->amount1/2);
					}
					switch ($item->operator) {
						case '.':
							$tailTotal += intval($item->amount2/($split_num*2));
							break;
					}
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

		$shuffle_head_specials = $this->shuffle_num(substr($top_result, 0, 3));
		foreach ($shuffle_head_specials as $element) {
			$headSpecial = 0;
			foreach ($heads as $item){
				$shuffle_nums = $this->shuffle_num($item->number);
				$split_num = sizeof($shuffle_nums);
				foreach ($shuffle_nums as $val) {
					if($val === $element){
						switch ($item->operator) {
							case '*':
								$headSpecial += intval($item->amount2/$split_num);
								break;
						}
					}	
				}					
			}
			foreach ($headTails as $item){
				$shuffle_nums = $this->shuffle_num($item->number);
				$split_num = sizeof($shuffle_nums);
				foreach ($shuffle_nums as $val) {
					if($val === $element){
						switch ($item->operator) {
							case '*':
								$headSpecial += intval($item->amount2/($split_num*2));
								break;
						}
					}
				}
			}
			$num = "element";
			$temp = array($$num => $headSpecial );
			array_push($headSpecialTotal, $temp);
		}

		$shuffle_tail_specials = $this->shuffle_num(substr($top_result, 3, 3));
		foreach ($shuffle_tail_specials as $element) {
			$tailSpecial = 0;
			foreach ($tails as $item){
				$shuffle_nums = $this->shuffle_num($item->number);
				$split_num = sizeof($shuffle_nums);
				foreach ($shuffle_nums as $val) {
					if($val === $element){
						switch ($item->operator) {
							case '*':
								$tailSpecial += intval($item->amount2/$split_num);
								break;
						}
					}	
				}					
			}
			foreach ($headTails as $item){
				$shuffle_nums = $this->shuffle_num($item->number);
				$split_num = sizeof($shuffle_nums);
				foreach ($shuffle_nums as $val) {
					if($val === $element){
						switch ($item->operator) {
							case '*':
								$tailSpecial += intval($item->amount2/($split_num*2));
								break;
						}
					}
				}
			}
			$num = "element";
			$temp = array($$num => $tailSpecial );
			array_push($tailSpecialTotal, $temp);
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
			'bottomRunTotal' => $bottomRunTotal
		);
		return $data;
	}

	public function shuffle_num($str){
		$a = substr($str, 0, 1);
		$b = substr($str, 1, 1);
		$c = substr($str, 2, 1);
		$temp = array($a.$b.$c, $a.$c.$b, $b.$a.$c, $b.$c.$a, $c.$a.$b, $c.$b.$a);
		$i = sizeof($temp);
		while($i--){
			for( $j = 0 ; $j < $i; $j++){
				if($temp[$i] == $temp[$j]){
					unset($temp[$i]);
					break;
				}
			}
		}
		$res = $temp;
		return $res;
	}
}
