<?php 
	class UserModel extends CI_Model {

		public function __construct()
		{
		    parent::__construct();
            $this->load->library('session');
		}

		public function login($email, $password){

            $this->db->where('email', $email);
            $query = $this->db->get('users');

            if($query->num_rows() > 0)
            {
                $row = $query->row();
                if($row->password == $password)
                {   
                    if($row->active == 0){
                        return -3; //not active admin/user
                    }else{
                        $this->session->set_userdata("email", $row->email);
                        $this->session->set_userdata("user_id", $row->user_id);
                        $this->session->set_userdata("role", $row->role);
                        $this->session->set_userdata("user_org_id", $row->org_id);
                        $this->session->set_userdata("username", $row->username);
                        $this->session->set_userdata("logged_in", true);
                        return $row->role; // echo "success";
                    }
                }
                else
                {
                    return -1;
                    //echo "password wrong";
                }
            }
            else
            {
                return -2;
                //echo "No user!!!";
            }			
		}

        public function getUsersByOrgId($condition){
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where($condition);
            $query = $this->db->get();
            return $query->result();
        }

        public function addUser($data){
            $this->db->insert('users', $data);
            return $this->db->insert_id();
        }

        public function update_check($user_id, $email){
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('email', $email);
            $this->db->where('user_id !=', $user_id);
            $query = $this->db->get();
            $row = $query->num_rows();
            if($row==0){
                return true;
            }else{
                return false;
            }
        }

        public function deleteUser($condition){
            $this->db->delete("users", $condition);
        }
        
        public function updateUser($data, $user_id)
        {
            $this->db->where("user_id", $user_id);
            $this->db->update('users', $data);
        }
	}
?>