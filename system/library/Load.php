<?php 
    class Load{
        public function __construct()
        {
            
        }
        public function view($file_name, $data = NULL){
            include './app/views/'.$file_name.'.php';
        }
        public function model($file_name){
            include './app/models/'.$file_name.'.php';
            return new $file_name();
        }
    }


?>