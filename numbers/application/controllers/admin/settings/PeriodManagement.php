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
        $this->form_validation->set_rules('period', 'Period', 'required|callback_periodCheck');
        $this->form_validation->set_rules('top_result', 'Top result', 'required');
        $this->form_validation->set_rules('bottom_result', 'Bottom result', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

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
				$res   = array('state' => true, 'msg' => 'Period added successfully');
				$toast = array('state' => true, 'msg' => 'New period '.$period.' added successfully');
				$this->session->set_flashdata('toast', $toast);
			}else{
				$res   = array('state' => false, 'msg' => 'Something went wrong');
			}
			
        }      
        return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}

	public function updatePeriod(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('period', 'Period', 'required');
        $this->form_validation->set_rules('top_result', 'Top result', 'required');
        $this->form_validation->set_rules('bottom_result', 'Bottom result', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

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
				$res   = array('state' => false, 'msg' => 'The given period already exists');
			}else{

				$data = array(
					"period" => $period,
					"top_result" => $top_result,
					"bottom_result" => $bottom_result,
					"status" => $status
				);

				$this->period->updatePeriod($data, $period_id);

				$res   = array('state' => true, 'msg' => $period.' is updated successfully');
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

		$toast = array('state' => true, 'msg' => $period.' is deleted successfully');
		$this->session->set_flashdata('toast', $toast);

		echo "success";
	}

	public function periodCheck($str){
		
        $this->db->where('period', $str);
        $query = $this->db->get('periods');
        if($query->num_rows() > 0){
        	$this->form_validation->set_message('periodCheck', 'The given period already exists.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
