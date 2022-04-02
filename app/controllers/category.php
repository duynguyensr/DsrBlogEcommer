<?php

    class category extends DController{
        public function __construct()
        {
            $data = array();
            $message= array();
           parent::__construct();
        }
        public function list_category()
        {
           $this->load->view('cpanel/header');
           $this->load->view('cpanel/menu');  
           $category_model = $this->load->model('categorymodel');
           $table_category = 'tbl_category_product';
           $data['category'] = $category_model->category($table_category);
           $this->load->view('cpanel/category/category', $data);
           $this->load->view('cpanel/footer');
        }
        public function categorybyid($id)
        {
           $this->load->view('header');
           $category_model = $this->load->model('categorymodel');
           $table_category = 'tbl_category_product';
           $data['categorybyid'] = $category_model->categorybyid($table_category, $id );
           $this->load->view('categorybyid', $data);
           $this->load->view('footer');
        }

        public function addcategory(){
            $this->load->view('cpanel/header');           
            $this->load->view('cpanel/menu');           
            $this->load->view('cpanel/category/add_category');           
            $this->load->view('cpanel/footer');  
        }
        public function insertcategory()
        {
           $category_model = $this->load->model('categorymodel');
           $table_category = 'tbl_category_product';
           $title = $_POST['title'];
           $desc = $_POST['desc'];
           $data_insert = array(
               'title_category_product' => $title,
               'desc_category_product' => $desc,
           );
           $result =  $category_model->insertcategory($table_category, $data_insert);
           if($result == '1'){
               $message['msg'] = 'Thêm thành công';
            header("Location:".BASE_URL."/category/addcategory?msg=".urldecode(serialize($message['msg'])));
           }
           else{
            $message['msg'] = 'Thêm thất bại';
            header("Location:".BASE_URL."/category/addcategory?msg=".urldecode(serialize($message['msg'])));
            }
            
        }
        public function updatecategory()
        {
           $category_model = $this->load->model('categorymodel');
           $table_category = 'tbl_category_product';
        //    $title = $_POST['title'];
        //    $desc = $_POST['desc'];
            $id = 3;
            $cond = "tbl_category_product.id_category_product = '$id'";
           $data_insert = array(
               'title_category_product' => "update1",
               'desc_category_product' => "new update123 was created",
           );
           $result =  $category_model->updatecategory($table_category, $data_insert, $cond);
           if($result == '1'){
            // $data['msg'] = 'Update thành công';
            echo 'Update thành công';
           }
           else{
            // $data['msg'] = 'Update không thành công';
            echo "Update không thành công";
            }
            // $data = array('msg'=> 'insert thành công');
            // $this->load->view('addcategory', $data);
        }
        public function deletecategory()
        {
           $category_model = $this->load->model('categorymodel');
           $table_category = 'tbl_category_product';
        //    $title = $_POST['title'];
        //    $desc = $_POST['desc'];
            $id = 44;
            $cond = "tbl_category_product.id_category_product = '$id'";
           $result =  $category_model->deletecategory($table_category, $cond);
           if($result == '1'){
            // $data['msg'] = 'Update thành công';
            echo 'Delete thành công';
           }
           else{
            // $data['msg'] = 'Update không thành công';
            echo "Delete không thành công";
            }
            // $data = array('msg'=> 'insert thành công');
            // $this->load->view('addcategory', $data);
        }

    }


?>