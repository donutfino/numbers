<?php 
    class SuperAgentModel extends CI_Model {

        public function __construct()
        {
            parent::__construct();
            $this->load->library('session');
        }

        public function getSuperAgentsByOrgId($condition){
            $this->db->select('*');
            $this->db->from('super_agents');
            $this->db->where($condition);
            $query = $this->db->get();
            return $query->result();
        }

        public function addSuperAgent($data){
            $this->db->insert('super_agents', $data);
            return $this->db->insert_id();
        }

        public function update_check($super_agent_id, $email){
            $this->db->select('*');
            $this->db->from('super_agents');
            $this->db->where('email', $email);
            $this->db->where('id !=', $super_agent_id);
            $query = $this->db->get();
            $row = $query->num_rows();
            if($row==0){
                return true;
            }else{
                return false;
            }
        }

        public function deleteSuperAgent($condition){
            $this->db->delete("super_agents", $condition);
        }
        
        public function updateSuperAgent($data, $super_agent_id)
        {
            $this->db->where("id", $super_agent_id);
            $this->db->update('super_agents', $data);
        }
    }
?>