<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserManagement extends Base_Controller {

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
			$seat = $orgs[0]->seat;
			$this->load->model("userModel", "user", true);
			$condition = array(
				'org_id' => $content['org_id'],
				'role' => 'user'
			);
			$content['users'] = $this->user->getUsersByOrgId($condition);
			$content['add_user_flag'] = true;
			if(sizeof($content['users']) > $seat - 1){
				$content['add_user_flag'] = false;
			}

		}else{
			$content['org_id'] = -1;
		}
    	$this->load->model("userModel", "user", true);
    	
		$this->load->view('admin/settings/userManagement', $content);
	}

	public function addUser(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'ชื่อผู้ใช้งาน', 'required');
        $this->form_validation->set_rules('email', 'อีเมล', 'required|valid_email|callback_emailCheck');
        $this->form_validation->set_rules('password', 'รหัสผ่าน', 'required');
        $this->form_validation->set_rules('role', 'หน้าที่', 'required');
        $this->form_validation->set_rules('active', 'ใช้งาน', 'required');
        $this->form_validation->set_rules('org_id', 'เจ้ามือ', 'required');

        if ($this->form_validation->run() == FALSE) {
           	$res = array('state' => false, 'msg' => validation_errors());
        } else {
        	
			$username = $this->input->post("username");
			$email = $this->input->post("email");
			$password = $this->input->post("password");			
			$role = $this->input->post("role");
			$active = $this->input->post("active");
			$org_id = $this->input->post("org_id");			

			$data = array(
				"username" => $username,
				"email" => $email,
				"password" => $password,
				"role" => $role,
				"active" => $active,
				"org_id" => $org_id
			);
			$this->load->model("userModel", "user", true);
			$user_id = $this->user->addUser($data);
			if($user_id > 0){
				$res   = array('state' => true, 'msg' => 'เพิ่มบัญชีผู้ใช้งานสำเร็จ');
				$toast = array('state' => true, 'msg' => 'เพิ่มบัญชีผู้ใช้งานสำเร็จ');
				$this->session->set_flashdata('toast', $toast);
			}else{
				$res   = array('state' => false, 'msg' => 'การข้อผิดพลาด');
			}
			
        }      
        return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}

	public function updateUser(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'ชื่อผู้ใช้งาน', 'required');
        $this->form_validation->set_rules('email', 'อีเมล', 'required|valid_email');
        $this->form_validation->set_rules('password', 'รหัสผ่าน', 'required');
        $this->form_validation->set_rules('active', 'ใช้งาน', 'required');

        if ($this->form_validation->run() == FALSE) {
           	$res = array('state' => false, 'msg' => validation_errors());
        } else {
        	$username = $this->input->post("username");
			$email = $this->input->post("email");
			$password = $this->input->post("password");
			$active = $this->input->post("active");
			$user_id = $this->input->post("user_id");

			$this->load->model("userModel", "user", true);

			$update_flag = $this->user->update_check($user_id, $email);
			if($update_flag == false){
				$res   = array('state' => false, 'msg' => 'อีเมลนี้มีอยู่ในระบบแล้ว');
			}else{
				$data = array(
					"username" => $username,
					"email" => $email,
					"password" => $password,
					"active" => $active
				);

				$this->user->updateUser($data, $user_id);

				$res   = array('state' => true, 'msg' => $username.' อัพเดทเสร็จสิ้น');
			}
        }
		
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}

	public function deleteUser(){
		//delete user from DB based on his id
		$user_id = $this->input->post("user_id");
		$username = $this->input->post("username");

		$condition = array(
			"user_id" => $user_id
		);

		$this->load->model("userModel", "user", true);

		$this->user->deleteUser($condition);

		$toast = array('state' => true, 'msg' => $username.' ลบเสร็จสิ้น');
		$this->session->set_flashdata('toast', $toast);

		echo "success";
	}

	public function emailCheck($str){
        $this->db->where('email', $str);
        $query = $this->db->get('users');
        if($query->num_rows() > 0){
        	$this->form_validation->set_message('emailCheck', 'อีเมลนี้มีอยู่ในระบบแล้ว');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
