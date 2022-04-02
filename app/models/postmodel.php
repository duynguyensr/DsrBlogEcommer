<?php 
    class postmodel extends DModel {
        public function __construct()
        {
            parent::__construct();
        }

        public function category_post($tbl_category){
            // $sql = "SELECT * FROM tbl_category_product ORDER BY id_category_product DESC";
            // $query = $this->db->query($sql);
            // $result = $query->fetchAll();
            // return $result;
            $sql = "SELECT * FROM $tbl_category ORDER BY id_category_post DESC";
            return $this->db->select($sql);
        }
        
        public function categorybyid_post($tbl_category, $cond){
            $sql = "SELECT * FROM $tbl_category WHERE $cond";
            return $this->db->select($sql);
        }
        public function insertcategory_post($table_category, $data){
            return $this->db->insert($table_category, $data);
        }
        public function deletecategory_post($table_category, $cond){
            return $this->db->delete($table_category, $cond);
            
        }
        public function updatecategory_post($table_category, $data, $cond){
            return $this->db->update($table_category, $data, $cond);
            
        }

        //product
        public function list_post($tbl_post, $tbl_category){
            $sql = "SELECT * FROM $tbl_post,$tbl_category WHERE $tbl_post.id_category_post=$tbl_category.id_category_post ORDER BY $tbl_post.id_post DESC";
            return $this->db->select($sql);
        }
        public function list_all_post_bycond($tbl_post, $tbl_category, $cond){
            $sql = "SELECT * FROM $tbl_post,$tbl_category WHERE $cond  ORDER BY $tbl_post.id_post DESC";
            return $this->db->select($sql);
        }
        
        public function list_post_client($tbl_post, $tbl_category, $page){
            $sql = "SELECT * FROM $tbl_post,$tbl_category WHERE $tbl_post.id_category_post=$tbl_category.id_category_post ORDER BY $tbl_post.id_post DESC LIMIT 8 OFFSET $page";
            return $this->db->select($sql);
        }

        public function list_post_by_cond($tbl_post, $tbl_category, $cond, $page){
            $sql = "SELECT * FROM $tbl_post,$tbl_category WHERE $cond ORDER BY $tbl_post.id_post DESC LIMIT 8 OFFSET $page";
            return $this->db->select($sql);
            
        }

        public function post_random($tbl_post, $tbl_category){
            $sql = "SELECT * FROM $tbl_post,$tbl_category WHERE $tbl_post.id_category_post = $tbl_category.id_category_post ORDER BY RAND() LIMIT 5";
            return $this->db->select($sql);
        }

        public function post_random_id($tbl_post, $tbl_category, $id){
            $sql = "SELECT * FROM $tbl_post,$tbl_category WHERE $tbl_post.id_category_post = $tbl_category.id_category_post AND $tbl_post.id_post != $id ORDER BY RAND() LIMIT 4";
            return $this->db->select($sql);
        }
        
        

        public function post_by_id($tbl_post, $tbl_category,$cond ){
            $sql = "SELECT * FROM $tbl_post,$tbl_category WHERE $cond LIMIT 1 ";
            return $this->db->select($sql);
        }
        
        public function insertpost($table_post, $data){
            return $this->db->insert($table_post, $data);
            
        }
        public function deletepost($table_post, $cond){
            return $this->db->delete($table_post, $cond);
            
        }
        public function postbyid($tbl_post, $cond){
            $sql = "SELECT * FROM $tbl_post WHERE $cond";
            return $this->db->select($sql);
        }
        public function updatepost($table_post, $data, $cond){
            return $this->db->update($table_post, $data, $cond);
            
        }
    }


?>