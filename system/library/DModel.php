<?php 
    class DModel{
        protected $db = array();
        public function __construct()
        {
            $connect = 'mysql:dbname=pdo_blogs_ecommerce; host=localhost; port=3307';
            $user = 'root';
            $pass = '';
            $this->db = new Database($connect, $user, $pass);
        }
        
    }


?>