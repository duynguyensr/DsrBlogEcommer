<?php 
    class product extends DController{
        public function __construct()
        {
            $data = array();
            $message= array();
           parent::__construct();
        }
        public function index(){
            $this->addcategory();
        }
        public function addcategory(){
            Session::checkSession();
            $this->load->view('cpanel/header');           
            $this->load->view('cpanel/menu');           
            $this->load->view('cpanel/product/add_category');           
            $this->load->view('cpanel/footer');  
        }
        
        public function listcategory()
        {
            Session::checkSession();
            $this->load->view('cpanel/header');
            $this->load->view('cpanel/menu');  
            $category_model = $this->load->model('categorymodel');
            $table_category = 'tbl_category_product';
            $data['category'] = $category_model->category($table_category);
            $this->load->view('cpanel/product/product_category', $data);
            $this->load->view('cpanel/footer');
        }

        public function insertcategory()
        {
            Session::checkSession();
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
            header("Location:".BASE_URL."/product/addcategory?msg=".urldecode(serialize($message['msg'])));
           }
           else{
            $message['msg'] = 'Thêm thất bại';
            header("Location:".BASE_URL."/product/addcategory?msg=".urldecode(serialize($message['msg'])));
            }
            
        }
        public function editcategory()
        {
            Session::checkSession();
            $this->load->view('cpanel/header');           
            $this->load->view('cpanel/menu');
            $id = $_GET['id'];          
            $category_model = $this->load->model('categorymodel');
           $table_category = 'tbl_category_product';
           $cond = "id_category_product= $id";
           $data['categorybyid'] = $category_model->categorybyid($table_category, $cond);
            $this->load->view('cpanel/product/edit_category', $data);           
            $this->load->view('cpanel/footer'); 
        }
        public function updatecategory()
        {
            Session::checkSession();
           $category_model = $this->load->model('categorymodel');
           $table_category = 'tbl_category_product';
           $title = $_POST['title'];
           $desc = $_POST['desc'];
            $id = $_GET['id'];
            $cond = "tbl_category_product.id_category_product = '$id'";
           $data_update = array(
               'title_category_product' => $title,
               'desc_category_product' => $desc,
           );
           $result =  $category_model->updatecategory($table_category, $data_update, $cond);
           if($result == '1'){
            $message['msg'] = 'Update thành công';
         header("Location:".BASE_URL."/product/listcategory?msg=".urldecode(serialize($message['msg'])));
        }
        else{
         $message['msg'] = 'Update thất bại';
         header("Location:".BASE_URL."/product/listcategory?msg=".urldecode(serialize($message['msg'])));
         }
        }
        public function deletecategory()
        {
            Session::checkSession();
           $category_model = $this->load->model('categorymodel');
           $table_category = 'tbl_category_product';
        //    $title = $_POST['title'];
        //    $desc = $_POST['desc'];
            $id = $_GET['id'];
            $cond = "tbl_category_product.id_category_product = '$id'";
           $result =  $category_model->deletecategory($table_category, $cond);
           if($result == '1'){
            $message['msg'] = 'Xóa thành công';
         header("Location:".BASE_URL."/product/listcategory?msg=".urldecode(serialize($message['msg'])));
        }
        else{
         $message['msg'] = 'Xóa thất bại thất bại';
         header("Location:".BASE_URL."/product/listcategory?msg=".urldecode(serialize($message['msg'])));
         }
            // $data = array('msg'=> 'insert thành công');
            // $this->load->view('addcategory', $data);
        }


        public function addproduct(){
            Session::checkSession();
            $this->load->view('cpanel/header');           
            $this->load->view('cpanel/menu');       
            $category_model = $this->load->model('categorymodel');
           $table_category = 'tbl_category_product';
           $data['category'] = $category_model->category($table_category);    
            $this->load->view('cpanel/product/add_product', $data);           
            $this->load->view('cpanel/footer');  
        }
        public function insertproduct()
        {
            Session::checkSession();
           $category_model = $this->load->model('categorymodel');
           $table_category = 'tbl_product';
           $title = $_POST['title'];
           $desc = $_POST['desc'];
           $price = $_POST['price'];
           $quantity = $_POST['quantity'];
           $category_product = $_POST['category_product'];
           $image = $_FILES['image']['name'];
           $tmp_image = $_FILES['image']['tmp_name'];

           $div = explode('.', $image);
           $file_ext = strtolower(end($div));
           $unique_file = $div[0].time().'.'.$file_ext;
           $path_upload = "public/uploads/product/".$unique_file;
           move_uploaded_file($tmp_image, $path_upload);
           $data_insert = array(
               'title_product' => $title,
               'price_product' => $price,
               'desc_product' => $desc,
               'image_product' => $unique_file,
               'quantity_product' => $quantity,
               'id_category_product' => $category_product
           );
           $result =  $category_model->insertproduct($table_category, $data_insert);
           if($result == '1'){
               $message['msg'] = 'Thêm sản phẩm mới thành công';
            header("Location:".BASE_URL."/product/addproduct?msg=".urldecode(serialize($message['msg'])));
           }
           else{
            $message['msg'] = 'Thêm sản phẩm mới thất bại';
            header("Location:".BASE_URL."/product/addproduct?msg=".urldecode(serialize($message['msg'])));
            }
            
        }

        public function editproduct()
        {
            Session::checkSession();
            $this->load->view('cpanel/header');           
            $this->load->view('cpanel/menu');
            $id = $_GET['id'];          
            $category_model = $this->load->model('categorymodel');
            $table_category = 'tbl_category_product';
            $data['category'] = $category_model->category($table_category);    
           $table_product = 'tbl_product';
           $cond = "id_product= $id";
           $data['productbyid'] = $category_model->productbyid($table_product, $cond);
            $this->load->view('cpanel/product/edit_product', $data);           
            $this->load->view('cpanel/footer'); 
        }

        public function updateproduct()
        {
            Session::checkSession();
            $category_model = $this->load->model('categorymodel');
            $table_product = 'tbl_product';
            $title = $_POST['title'];
           $desc = $_POST['desc'];
           $price = $_POST['price'];
           $quantity = $_POST['quantity'];
           $category_product = $_POST['category_product'];
           $image = $_FILES['image']['name'];
           $tmp_image = $_FILES['image']['tmp_name'];
           $div = explode('.', $image);
           $file_ext = strtolower(end($div));
           $unique_file = $div[0].time().'.'.$file_ext;
           $path_upload = "public/uploads/product/".$unique_file;
             $id = $_GET['id'];
             $cond = "tbl_product.id_product = '$id'";

            if($image){
                $table_product = 'tbl_product';
           $data['productbyid'] = $category_model->productbyid($table_product, $cond);
           foreach($data['productbyid'] as $key => $value){
                $path_unlink = 'public/uploads/product/';
                unlink($path_unlink.$value['image_product']);
           }
            $data_update = array(
                'title_product' => $title,
               'price_product' => $price,
               'desc_product' => $desc,
               'image_product' => $unique_file,
               'quantity_product' => $quantity,
               'id_category_product' => $category_product
            );
           move_uploaded_file($tmp_image, $path_upload);
        }
            else{
                $data_update = array(
                    'title_product' => $title,
                   'price_product' => $price,
                   'desc_product' => $desc,
                   'quantity_product' => $quantity,
                   'id_category_product' => $category_product
                );
            }
            $result =  $category_model->updateproduct($table_product, $data_update, $cond);
            if($result == '1'){
             $message['msg'] = 'Update thành công';
          header("Location:".BASE_URL."/product/listproduct?msg=".urldecode(serialize($message['msg'])));
         }
         else{
          $message['msg'] = 'Update thất bại';
          header("Location:".BASE_URL."/product/listproduct?msg=".urldecode(serialize($message['msg'])));
          }
        }

        public function listproduct()
        {
            Session::checkSession();
           $this->load->view('cpanel/header');
           $this->load->view('cpanel/menu');  
           $category_model = $this->load->model('categorymodel');
           $table_product = 'tbl_product';
           $table_category = 'tbl_category_product';
           $data['product'] = $category_model->list_product($table_product, $table_category);
           $this->load->view('cpanel/product/product_list', $data);
           $this->load->view('cpanel/footer');
        }

        
        public function deleteproduct()
        {
            Session::checkSession();
           $category_model = $this->load->model('categorymodel');
           $table_product = 'tbl_product';
            $id = $_GET['id'];
            $cond = "tbl_product.id_product = '$id'";
           $result =  $category_model->deleteproduct($table_product, $cond);
           if($result == '1'){
            $message['msg'] = 'Xóa thành công';
         header("Location:".BASE_URL."/product/listproduct?msg=".urldecode(serialize($message['msg'])));
        }
        else{
         $message['msg'] = 'Xóa thất bại thất bại';
         header("Location:".BASE_URL."/product/listproduct?msg=".urldecode(serialize($message['msg'])));
         }
            // $data = array('msg'=> 'insert thành công');
            // $this->load->view('addcategory', $data);
        }

    }


?>