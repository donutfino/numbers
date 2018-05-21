<?php 
    class AgentManagementModel extends CI_Model {

        public function __construct()
        {
            parent::__construct();
            $this->load->library('session');
        }

        public function getAgentsByOrgId($condition){
            $this->db->select('*');
            $this->db->from('agents');
            $this->db->where($condition);
            $query = $this->db->get();
            return $query->result();
        }

        public function addAgent($data){
            $this->db->insert('agents', $data);
            return $this->db->insert_id();
        }

        public function update_check($agent_id, $email){
            $this->db->select('*');
            $this->db->from('agents');
            $this->db->where('email', $email);
            $this->db->where('agent_id !=', $agent_id);
            $query = $this->db->get();
            $row = $query->num_rows();
            if($row==0){
                return true;
            }else{
                return false;
            }
        }

        public function deleteAgent($condition){
            $this->db->delete("agents", $condition);
        }
        
        public function updateAgent($data, $agent_id)
        {
            $this->db->where("agent_id", $agent_id);
            $this->db->update('agents', $data);
        }

        public function getCredit($condition){
            $this->db->select("credit");
            $this->db->where($condition);
            $this->db->from('agents');
            $query = $this->db->get();
            $row = $query->num_rows();
            if($row==0){
                return 0;
            }else{
                return $query->first_row()->credit;
            }
        }
    }
?>