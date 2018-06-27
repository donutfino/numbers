<?php 
    class PeriodManagementModel extends CI_Model {

        public function __construct()
        {
            parent::__construct();
            $this->load->library('session');
        }

        public function getPeriodsByOrgId($condition){
            $this->db->select('*');
            $this->db->from('periods');
            $this->db->where($condition);
            $query = $this->db->get();
            return $query->result();
        }

        public function getOpenPeriodsByOrgId($condition){
            $this->db->select('*');
            $this->db->from('periods');
            $this->db->where($condition);
            $query = $this->db->get();
            return $query->result();
        }

        public function addPeriod($data){
            $this->db->insert('periods', $data);
            return $this->db->insert_id();
        }

        public function update_check($period_id, $period){
            $this->db->select('*');
            $this->db->from('periods');
            $this->db->where('period', $period);
            $this->db->where('period_id !=', $period_id);
            $query = $this->db->get();
            $row = $query->num_rows();
            if($row==0){
                return true;
            }else{
                return false;
            }
        }

        public function deletePeriod($condition){
            $this->db->delete("periods", $condition);
        }
        
        public function updatePeriod($data, $condition)
        {
            $this->db->where($condition);
            $this->db->update('periods', $data);
        }
    }
?>