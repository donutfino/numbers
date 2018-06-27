<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NumberType extends Base_Controller {

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
			$this->load->model("admin/numberTypeModel", "numberType", true);
			$condition = array(
				'org_id' => $content['org_id']
			);
			$content['number_types'] = $this->numberType->getNumberTypesByOrgId($condition);
			if(!empty($content['number_types'])){
				$content['set_default_flag'] = false;
			}else{
				$content['set_default_flag'] = true;
			}
						
		}else{
			$content['org_id'] = -1;
    	}
		$this->load->view('admin/settings/numberType', $content);
	}

	public function setByDefault(){
		$this->load->model("admin/numberTypeModel", "numberType", true);
		$org_id = $this->input->post("org_id");
		$default_number_types = $this->numberType->getDefaultNumberTypes();
		$res   = array('state' => true, 'msg' => 'สร้างการตั้งค่าตัวเลบสำเร็จ');		
		foreach ($default_number_types as $value){
			$data = array(
            	"type" => $value->type,
				"digit" => $value->digit,
				"rate" => $value->rate,
				"default_limit" => $value->default_limit,
				"org_id" => $org_id
            );
        	$inserted_id = $this->numberType->addNumberTypeByOrg($data);
        	if($inserted_id < 0){
        		$res   = array('state' => false, 'msg' => 'เกิดข้อผิดพลาด');
        		break;
        	}
		}
		if($res["state"] == true){
			$toast = array('state' => true, 'msg' => 'สร้างการตั้งค่าตัวเลบสำเร็จ');
			$this->session->set_flashdata('toast', $toast);
		}
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}

	public function updateNumberType(){

    	$rate = $this->input->post("rate");
		$default_limit = $this->input->post("default_limit");
		$number_type_id = $this->input->post("number_type_id");
		$data = array(
				"rate" => $rate,
				"default_limit" => $default_limit
			);

		$this->load->model("admin/numberTypeModel", "numberType", true);
		$condition = array('number_type_id' => $number_type_id);
		$this->numberType->updateNumberTypeByOrg($data, $condition);
		$res   = array('state' => true, 'msg' => 'การตั้งค่าประเภทตัวเลขเสร็จสมบูรณ์');

		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}

	public function updateLimit(){

    	$type = $this->input->post("type");
		$default_limit = $this->input->post("limit");
		$org_id = $this->input->post("org_id");
		$data = array("default_limit" => $default_limit);
		$condition = array('org_id' => $org_id, 'type' => $type);

		$this->load->model("admin/numberTypeModel", "numberType", true);
		$this->numberType->updateNumberTypeByOrg($data, $condition);
		$res   = array('state' => true, 'msg' => 'แก้ไขการจำกัดเสร็จสิ้สมบูรณ์');

		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}
}
