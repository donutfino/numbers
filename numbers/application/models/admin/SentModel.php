<?php 
	class SentModel extends CI_Model {

		public function __construct()
		{
		    parent::__construct();
		}

        public function getSent($condition){
            $this->db->select('*');
            $this->db->from('latest_new_sent');
            $this->db->where($condition);
            $query = $this->db->get();
            return $query->result();
        }
        
        public function addNewSent($data){
            $this->db->insert('latest_new_sent', $data);
            return $this->db->insert_id();
        }

        public function updateNewSent($data, $condition)
        {
            $this->db->where($condition);
            $this->db->update('latest_new_sent', $data);
        }
	}
?>