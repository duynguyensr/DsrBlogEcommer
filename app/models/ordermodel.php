<?php 
    class ordermodel extends DModel {
        public function __construct()
        {
            parent::__construct();
        }
        public function list_order($tbl_order){
            $sql ="SELECT * FROM $tbl_order ORDER BY id_order DESC";
            return $this->db->select($sql);
        }
        public function list_order_by_customer_id($tbl_order, $cond){
            $sql ="SELECT * FROM $tbl_order WHERE $cond ORDER BY id_order DESC";
            return $this->db->select($sql);
        }
        public function order_by_code($tbl_order, $cond){
            $sql ="SELECT * FROM $tbl_order WHERE $cond LIMIT 1";
            return $this->db->select($sql);
        }

        public function list_order_details($tbl_order_detail, $tbl_product, $cond){
            $sql ="SELECT * FROM $tbl_order_detail,$tbl_product WHERE $cond ORDER BY order_detail_id DESC";
            return $this->db->select($sql);
        }
        public function insertorder($tbl_order, $data){
            return $this->db->insert($tbl_order, $data);
        }
        public function insert_order_details($tbl_order_detail, $data){
            return $this->db->insert($tbl_order_detail, $data);
        }

        public function updateOrder($tbl_order, $data, $cond){
            return $this->db->update($tbl_order, $data, $cond);
        }
    }


?>