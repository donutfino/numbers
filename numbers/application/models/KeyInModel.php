<?php 
    class KeyInModel extends CI_Model {

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

        public function addInput($data){
            $this->db->insert('inputs', $data);
            return $this->db->insert_id();
        }

        
        public function inputDelete($input_id){
            $query = $this->db->delete("inputs", array('input_id' => $input_id));
            if($query){
                return true;
            }else{
                return false;
            }
        }
        public function deleteAllData($condition){
            $this->db->where($condition);
            $this->db->delete("inputs");
        }

        public function inputUpdate($data, $input_id)
        {
            $this->db->where("input_id", $input_id);
            $this->db->update('inputs', $data);
            
        }

        public function getTotalPage($condition){
            $query1 = $this->db->select('SUM(amount1) AS "totalAmount1"', FALSE)
            ->from('inputs')
            ->where($condition)
            ->get();
            $query2 = $this->db->select('SUM(amount2) AS "totalAmount2"', FALSE)
            ->from('inputs')
            ->where($condition)
            ->get();

            $amount1 = $query1->row_array();
            $amount2 = $query2->row_array();
            return $amount1['totalAmount1'] + $amount2['totalAmount2'];
        }

        public function getData($condition){
            $this->db->select('number, amount1, operator, amount2, input_id');
            $this->db->from('inputs');
            $this->db->where($condition);
            $query = $this->db->get();
            return $query->result();
        }
    }
?>