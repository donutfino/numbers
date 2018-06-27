<?php 
	class OrganizationModel extends CI_Model {

		public function __construct()
		{
		    parent::__construct();
		}

        public function getOrgByIdForAdmin($org_id){
            $this->db->select('o.org_id, o.org_name, o.org_start_date, o.org_expired_date, o.active, o.seat, u.user_id, u.username, u.email, u.password');
            $this->db->where('o.org_id', $org_id);
            $this->db->where('u.role', 'admin');
            $this->db->from('organizations as o');            
            $this->db->join('users as u', 'u.org_id = o.org_id', 'left');
            $query = $this->db->get();
            return $query->result();
        }
        
        public function update($condition, $data){
            $this->db->where($condition);
            $this->db->update('ingredient', $data);
        }

        public function add($data){
            $this->db->insert('ingredient', $data);
            return;
        }
        public function delete($condition){
            $this->db->delete('ingredient', $condition);
            return;
        }
	}
?>