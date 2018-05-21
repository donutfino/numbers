<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgentManagement extends Base_Controller {

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
			$this->load->model("admin/agentManagementModel", "agent", true);
			$condition = array(
				'org_id' => $content['org_id']
			);
			$content['agents'] = $this->agent->getAgentsByOrgId($condition);

		}else{
			$content['org_id'] = -1;
    	}

		$this->load->view('admin/settings/agentManagement', $content);
	}

	public function addAgent(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('agent_name', 'Agent name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_emailCheck');
        $this->form_validation->set_rules('credit', 'Credit', 'required');
        $this->form_validation->set_rules('capacity', 'Capacity', 'required');
        $this->form_validation->set_rules('commision', 'Commision', 'required');
        $this->form_validation->set_rules('active', 'Active', 'required');
        $this->form_validation->set_rules('org_id', 'Org ID', 'required');

        if ($this->form_validation->run() == FALSE) {
           	$res = array('state' => false, 'msg' => validation_errors());
        } else {
        	
			$agent_name = $this->input->post("agent_name");
			$email = $this->input->post("email");
			$credit = $this->input->post("credit");			
			$capacity = $this->input->post("capacity");
			$commision = $this->input->post("commision");
			$active = $this->input->post("active");
			$org_id = $this->input->post("org_id");			

			$data = array(
				"agent_name" => $agent_name,
				"email" => $email,
				"credit" => $credit,
				"capacity" => $capacity,
				"commision" => $commision,
				"active" => $active,
				"org_id" => $org_id
			);
			$this->load->model("admin/agentManagementModel", "agent", true);
			$agent_id = $this->agent->addAgent($data);
			if($agent_id > 0){
				$res   = array('state' => true, 'msg' => 'Agent added successfully');
				$toast = array('state' => true, 'msg' => $agent_name.' added successfully');
				$this->session->set_flashdata('toast', $toast);
			}else{
				$res   = array('state' => false, 'msg' => 'Something went wrong');
			}
			
        }      
        return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}

	public function updateAgent(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('agent_name', 'Agent name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('credit', 'Credit', 'required');
        $this->form_validation->set_rules('capacity', 'Capacity', 'required');
        $this->form_validation->set_rules('commision', 'Commision', 'required');
        $this->form_validation->set_rules('active', 'Active', 'required');

        if ($this->form_validation->run() == FALSE) {
           	$res = array('state' => false, 'msg' => validation_errors());
        } else {
        	$agent_name = $this->input->post("agent_name");
			$email = $this->input->post("email");
			$credit = $this->input->post("credit");
			$capacity = $this->input->post("capacity");
			$commision = $this->input->post("commision");
			$active = $this->input->post("active");
			$agent_id = $this->input->post("agent_id");

			$this->load->model("admin/agentManagementModel", "agent", true);

			$update_flag = $this->agent->update_check($agent_id, $email);
			if($update_flag == false){
				$res   = array('state' => false, 'msg' => 'The given email already exists');
			}else{

				$data = array(
					"agent_name" => $agent_name,
					"email" => $email,
					"credit" => $credit,
					"capacity" => $capacity,
					"commision" => $commision,
					"active" => $active
				);

				$this->agent->updateAgent($data, $agent_id);

				$res   = array('state' => true, 'msg' => $agent_name.' is updated successfully');
			}
        }
		
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}
	
	public function deleteAgent(){
		$agent_id = $this->input->post("agent_id");
		$agent_name = $this->input->post("agent_name");

		$condition = array(
			"agent_id" => $agent_id
		);

		$this->load->model("admin/agentManagementModel", "agent", true);

		$this->agent->deleteAgent($condition);

		$toast = array('state' => true, 'msg' => $agent_name.' is deleted successfully');
		$this->session->set_flashdata('toast', $toast);

		echo "success";
	}

	public function emailCheck($str){
		
        $this->db->where('email', $str);
        $query = $this->db->get('agents');
        if($query->num_rows() > 0){
        	$this->form_validation->set_message('emailCheck', 'The given email already exists.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
