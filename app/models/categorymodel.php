<?php 
    class categorymodel extends DModel {
        public function __construct()
        {
            parent::__construct();
        }
        public function category($tbl_category){
            // $sql = "SELECT * FROM tbl_category_product ORDER BY id_category_product DESC";
            // $query = $this->db->query($sql);
            // $result = $query->fetchAll();
            // return $result;
            $sql = "SELECT * FROM $tbl_category ORDER BY id_category_product DESC";
            return $this->db->select($sql);
        }
        public function category_home($tbl_category){
            // $sql = "SELECT * FROM tbl_category_product ORDER BY id_category_product DESC";
            // $query = $this->db->query($sql);
            // $result = $query->fetchAll();
            // return $result;
            $sql = "SELECT * FROM $tbl_category ORDER BY id_category_product DESC";
            return $this->db->select($sql);
        }

        public function categorybyid($tbl_category, $cond){
            $sql = "SELECT * FROM $tbl_category WHERE $cond";
            return $this->db->select($sql);
        }

        //product category
        public function insertcategory($table_category, $data){
            return $this->db->insert($table_category, $data);
            
        }
        public function updatecategory($table_category, $data, $cond){
            return $this->db->update($table_category, $data, $cond);
            
        }
        public function deletecategory($table_category, $cond){
            return $this->db->delete($table_category, $cond);
            
        }


        //product
        public function list_product($tbl_product, $tbl_category){
            $sql = "SELECT * FROM $tbl_product,$tbl_category WHERE $tbl_product.id_category_product=$tbl_category.id_category_product  ORDER BY $tbl_product.id_product DESC";
            return $this->db->select($sql);
        }
        public function list_all_product_bycond($tbl_product, $tbl_category, $cond){
            $sql = "SELECT * FROM $tbl_product,$tbl_category WHERE $cond  ORDER BY $tbl_product.id_product DESC";
            return $this->db->select($sql);
        }
        
        public function list_product_client($tbl_product, $tbl_category, $page){
            $sql = "SELECT * FROM $tbl_product,$tbl_category WHERE $tbl_product.id_category_product=$tbl_category.id_category_product  ORDER BY $tbl_product.id_product DESC LIMIT 12 OFFSET $page";
            return $this->db->select($sql);
        }

        public function list_product_by_cond($tbl_product, $tbl_category, $cond, $page){
            $sql = "SELECT * FROM $tbl_product,$tbl_category WHERE $cond ORDER BY $tbl_product.id_product DESC LIMIT 12 OFFSET $page";
            return $this->db->select($sql);
            
        }
        
        

        public function product_by_id($tbl_product, $tbl_category,$cond ){
            $sql = "SELECT * FROM $tbl_product,$tbl_category WHERE $cond LIMIT 1 ";
            return $this->db->select($sql);
        }

        public function product_random($tbl_product, $tbl_category, $id){
            $sql = "SELECT * FROM $tbl_product,$tbl_category WHERE $tbl_product.id_category_product = $tbl_category.id_category_product AND $tbl_product.id_product != $id ORDER BY RAND() LIMIT 8";
            return $this->db->select($sql);
        }

        public function product_random_second($tbl_product, $tbl_category){
            $sql = "SELECT * FROM $tbl_product,$tbl_category WHERE $tbl_product.id_category_product = $tbl_category.id_category_product ORDER BY RAND() LIMIT 8";
            return $this->db->select($sql);
        }


        public function insertproduct($table_category, $data){
            return $this->db->insert($table_category, $data);
            
        }
        public function deleteproduct($table_product, $cond){
            return $this->db->delete($table_product, $cond);
            
        }
        public function productbyid($tbl_product, $cond){
            $sql = "SELECT * FROM $tbl_product WHERE $cond";
            return $this->db->select($sql);
        }
        public function updateproduct($table_product, $data, $cond){
            return $this->db->update($table_product, $data, $cond);
            
        }
    }


?>