<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuperAgentManagement extends Base_Controller {

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
			$this->load->model("admin/superAgentModel", "super_agent", true);
			$condition = array(
				'org_id' => $content['org_id']
			);
			$content['agents'] = $this->super_agent->getSuperAgentsByOrgId($condition);

		}else{
			$content['org_id'] = -1;
    	}

		$this->load->view('admin/settings/superAgentManagement', $content);
	}

	public function getSuperAgentsByOrg(){
		$request = json_decode(file_get_contents("php://input"));
		$org_id = $request->org_id;
		$condition = array(
			"org_id" => $org_id
		);
		$this->load->model("admin/superAgentModel", "super_agent", true);
		$res = $this->super_agent->getSuperAgentsByOrgId($condition);
     
        return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}

	public function addSuperAgent(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'ชื่อหัวหน่วย', 'required');
        $this->form_validation->set_rules('email', 'อีเมล', 'required|valid_email|callback_emailCheck');
        $this->form_validation->set_rules('org_id', 'เจ้ามือ', 'required');

        if ($this->form_validation->run() == FALSE) {
           	$res = array('state' => false, 'msg' => validation_errors());
        } else {
        	
			$name = $this->input->post("name");
			$email = $this->input->post("email");
			$org_id = $this->input->post("org_id");			

			$data = array(
				"name" => $name,
				"email" => $email,
				"org_id" => $org_id
			);
			$this->load->model("admin/superAgentModel", "super_agent", true);
			$inserted_id = $this->super_agent->addSuperAgent($data);
			if($inserted_id > 0){
				$res   = array('state' => true, 'msg' => 'เพิ่มหัวหน่วยสำเร็จ');
				$toast = array('state' => true, 'msg' => 'เพิ่มหัวหน่วยสำเร็จ');
				$this->session->set_flashdata('toast', $toast);
			}else{
				$res   = array('state' => false, 'msg' => 'เกิดข้อผิดพลาด');
			}
			
        }      
        return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}

	public function updateSuperAgent(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'ชื่อหัวหน่วย', 'required');
        $this->form_validation->set_rules('email', 'อีเมล', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
           	$res = array('state' => false, 'msg' => validation_errors());
        } else {
        	$name = $this->input->post("name");
			$email = $this->input->post("email");
			$headLimit = $this->input->post("headLimit");
			$tailLimit = $this->input->post("tailLimit");
			$headSpecialLimit = $this->input->post("headSpecialLimit");
			$tailSpecialLimit = $this->input->post("tailSpecialLimit");
			$topLimit = $this->input->post("topLimit");
			$bottomLimit = $this->input->post("bottomLimit");
			$topRunLimit = $this->input->post("topRunLimit");
			$bottomRunLimit = $this->input->post("bottomRunLimit");
			$id = $this->input->post("id");
			$this->load->model("admin/superAgentModel", "super_agent", true);

			$update_flag = $this->super_agent->update_check($id, $email);
			if($update_flag == false){
				$res   = array('state' => false, 'msg' => 'อีเมลนี้มีอยู่ในระบบแล้ว');
			}else{

				$data = array(
					"name" => $name,
					"email" => $email,
					"headLimit" => $headLimit,
					"tailLimit" => $tailLimit,
					"headSpecialLimit" => $headSpecialLimit,
					"tailSpecialLimit" => $tailSpecialLimit,
					"topLimit" => $topLimit,
					"bottomLimit" => $bottomLimit,
					"topRunLimit" => $topRunLimit,
					"bottomRunLimit" => $bottomRunLimit
				);

				$this->super_agent->updateSuperAgent($data, $id);

				$res   = array('state' => true, 'msg' => $name.' อัพเดทเสร็จสิ้น');
			}
        }
		
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}
	
	public function deleteSuperAgent(){
		$id = $this->input->post("id");
		$name = $this->input->post("name");

		$condition = array(
			"id" => $id
		);

		$this->load->model("admin/superAgentModel", "super_agent", true);
		$this->super_agent->deleteSuperAgent($condition);

		$toast = array('state' => true, 'msg' => $name.' ลบเสร็จสิ้น');
		$this->session->set_flashdata('toast', $toast);

		echo "success";
	}

	public function emailCheck($str){
		
        $this->db->where('email', $str);
        $query = $this->db->get('super_agents');
        if($query->num_rows() > 0){
        	$this->form_validation->set_message('emailCheck', 'อีเมลนี้มีอยู่ในระบบแล้ว');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}