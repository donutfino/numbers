<?php 
	class SentModel extends CI_Model {

		public function __construct()
		{
		    parent::__construct();
		}

        public function getSent($condition){
            $this->db->select('*');
            $this->db->from('log_sent');
            $this->db->where($condition);
            $query = $this->db->get();
            return $query->result();
        }

        public function getDepth($condition){
            $this->db->select_max('depth');
            $this->db->where($condition);
            $result = $this->db->get('log_sent')->row();
            if($result->depth == null){
                return 0;
            }else{
                return $result->depth;
            }            
        }
        
        public function addNewSent($data){
            $this->db->insert('log_sent', $data);
        }

        public function deleteAllSent($condition)
        {
            $this->db->where($condition);
            $this->db->delete('log_sent');
        }
	}
?>