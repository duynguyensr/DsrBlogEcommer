<?php 
    class customermodel extends DModel {
        public function __construct()
        {
            parent::__construct();
        }


        public function insertcustomer($table_customer, $data){
            return $this->db->insert($table_customer, $data);
            
        }
        public function updatecustomer($table_customer, $data, $cond){
            return $this->db->update($table_customer, $data, $cond);
            
        }
        public function login($table_customer, $username, $password){
            $sql = "SELECT * FROM $table_customer WHERE customer_name=? AND customer_password =?";
            return $this->db->affectedRows($sql, $username, $password);
        }

        public function check_name_email($table_customer, $username, $email){
            $sql = "SELECT * FROM $table_customer WHERE customer_name=? OR customer_email =?";
            return $this->db->affectedRows($sql, $username, $email);
        }

        public function getUserLoginInfo($table_customer, $username, $password){
            $sql = "SELECT * FROM $table_customer WHERE customer_name=? AND customer_password =?";
            return $this->db->selectUser($sql, $username, $password);
        }
    }


?>