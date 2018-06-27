<?php 
	class NumberTypeModel extends CI_Model {

		public function __construct()
		{
		    parent::__construct();
		}

        public function getNumberTypesByOrgId($condition){
            $this->db->select('*');
            $this->db->from('number_type_orgs');
            $this->db->where($condition);
            $query = $this->db->get();
            return $query->result();
        }

        public function getDefaultNumberTypes(){
            $this->db->select('*');
            $this->db->from('number_type_default');
            $query = $this->db->get();
            return $query->result();
        }
        
        public function addNumberTypeByOrg($data){
            $this->db->insert('number_type_orgs', $data);
            return $this->db->insert_id();
        }

        public function updateNumberTypeByOrg($data, $condition)
        {
            $this->db->where($condition);
            $this->db->update('number_type_orgs', $data);
        }

        public function getLimitAndHoldByOrg($condition){
            $this->db->select('*');
            $this->db->from('number_type_orgs');
            $this->db->where($condition);
            $query = $this->db->get();
            return $query->result();
        }
	}
?>