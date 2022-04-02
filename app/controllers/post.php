<?php 
    class post extends DController{
        function __construct()
        {
            $data = array();
            $message= array();
           parent::__construct();
        }
        public function addcategory(){
            Session::checkSession();
            $this->load->view('cpanel/header');           
            $this->load->view('cpanel/menu');           
            $this->load->view('cpanel/post/add_category');           
            $this->load->view('cpanel/footer');  
        }
        
        public function listcategory()
        {
            Session::checkSession();
           $this->load->view('cpanel/header');
           $this->load->view('cpanel/menu');  
           $post_model = $this->load->model('postmodel');
           $table_category = 'tbl_category_post';
           $data['category'] = $post_model->category_post($table_category);
           $this->load->view('cpanel/post/post_category', $data);
           $this->load->view('cpanel/footer');
        }

        public function insertcategory()
        {
            Session::checkSession();
           $post_model = $this->load->model('postmodel');
           $table_category = 'tbl_category_post';
           $title = $_POST['title'];
           $content = $_POST['desc'];
           $data_insert = array(
               'title_category_post' => $title,
               'desc_category_post' => $content,
           );
           $result =  $post_model->insertcategory_post($table_category, $data_insert);
           if($result == '1'){
               $message['msg'] = 'Thêm thành công';
            header("Location:".BASE_URL."/post/addcategory?msg=".urldecode(serialize($message['msg'])));
           }
           else{
            $message['msg'] = 'Thêm thất bại';
            header("Location:".BASE_URL."/post/addcategory?msg=".urldecode(serialize($message['msg'])));
            }
            
        }
        public function editcategory()
        {
            Session::checkSession();
            $this->load->view('cpanel/header');           
            $this->load->view('cpanel/menu');
            $id = $_GET['id'];          
            $post_model = $this->load->model('postmodel');
           $table_category = 'tbl_category_post';
           $cond = "id_category_post= $id";
           $data['categorybyid'] = $post_model->categorybyid_post($table_category, $cond);
            $this->load->view('cpanel/post/edit_category', $data);           
            $this->load->view('cpanel/footer'); 
        }
        public function updatecategory()
        {
            Session::checkSession();
           $post_model = $this->load->model('postmodel');
           $table_category = 'tbl_category_post';
           $title = $_POST['title'];
           $content = $_POST['content'];
            $id = $_GET['id'];
            $cond = "tbl_category_post.id_category_post = '$id'";
           $data_update = array(
               'title_category_post' => $title,
               'content_category_post' => $content,
           );
           $result =  $post_model->updatecategory_post($table_category, $data_update, $cond);
           if($result == '1'){
            $message['msg'] = 'Update thành công';
         header("Location:".BASE_URL."/post/listcategory?msg=".urldecode(serialize($message['msg'])));
        }
        else{
         $message['msg'] = 'Update thất bại';
         header("Location:".BASE_URL."/post/listcategory?msg=".urldecode(serialize($message['msg'])));
         }
            // $data = array('msg'=> 'insert thành công');
            // $this->load->view('addcategory', $data);
        }
        public function deletecategory()
        {
            Session::checkSession();
           $post_model = $this->load->model('postmodel');
           $table_category = 'tbl_category_post';
        //    $title = $_POST['title'];
        //    $content = $_POST['content'];
            $id = $_GET['id'];
            $cond = "tbl_category_post.id_category_post = '$id'";
           $result =  $post_model->deletecategory_post($table_category, $cond);
           if($result == '1'){
            $message['msg'] = 'Xóa thành công';
         header("Location:".BASE_URL."/post/listcategory?msg=".urldecode(serialize($message['msg'])));
        }
        else{
         $message['msg'] = 'Xóa thất bại thất bại';
         header("Location:".BASE_URL."/post/listcategory?msg=".urldecode(serialize($message['msg'])));
         }
            // $data = array('msg'=> 'insert thành công');
            // $this->load->view('addcategory', $data);
        }

        //post
        public function addpost(){
            Session::checkSession();
            $this->load->view('cpanel/header');           
            $this->load->view('cpanel/menu');       
            $post_model = $this->load->model('postmodel');
           $table_category = 'tbl_category_post';
           $data['category'] = $post_model->category_post($table_category);    
            $this->load->view('cpanel/post/add_post', $data);           
            $this->load->view('cpanel/footer');  
        }
        public function insertpost()
        {
            Session::checkSession();
           $post_model = $this->load->model('postmodel');
           $table_post = 'tbl_post';
           $title = $_POST['title'];
           $content = $_POST['content'];
           $category_post = $_POST['category_post'];
           $image = $_FILES['image']['name'];
           $tmp_image = $_FILES['image']['tmp_name'];

           $div = explode('.', $image);
           $file_ext = strtolower(end($div));
           $unique_file = $div[0].time().'.'.$file_ext;
           $path_upload = "public/uploads/post/".$unique_file;
           move_uploaded_file($tmp_image, $path_upload);
           $data_insert = array(
               'title_post' => $title,
               'content_post' => $content,
               'image_post' => $unique_file,
               'id_category_post' => $category_post
           );
           $result =  $post_model->insertpost($table_post, $data_insert);
           if($result == '1'){
               $message['msg'] = 'Thêm post mới thành công';
            header("Location:".BASE_URL."/post/addpost?msg=".urldecode(serialize($message['msg'])));
           }
           else{
            $message['msg'] = 'Thêm post mới thất bại';
            header("Location:".BASE_URL."/post/addpost?msg=".urldecode(serialize($message['msg'])));
            }
            
        }

        public function editpost()
        {
            Session::checkSession();
            $this->load->view('cpanel/header');           
            $this->load->view('cpanel/menu');
            $id = $_GET['id'];          
            $post_model = $this->load->model('postmodel');
            $table_category = 'tbl_category_post';
            $data['category'] = $post_model->category_post($table_category);    
           $table_post = 'tbl_post';
           $cond = "id_post= $id";
           $data['postbyid'] = $post_model->postbyid($table_post, $cond);
            $this->load->view('cpanel/post/edit_post', $data);           
            $this->load->view('cpanel/footer'); 
        }

        public function updatepost()
        {
            Session::checkSession();
            $post_model = $this->load->model('postmodel');
            $table_post = 'tbl_post';
            $title = $_POST['title'];
           $content = $_POST['content'];
           $category_post = $_POST['category_post'];
           $image = $_FILES['image']['name'];
           $tmp_image = $_FILES['image']['tmp_name'];
           $div = explode('.', $image);
           $file_ext = strtolower(end($div));
           $unique_file = $div[0].time().'.'.$file_ext;
           $path_upload = "public/uploads/post/".$unique_file;
             $id = $_GET['id'];
             $cond = "tbl_post.id_post = '$id'";

            if($image){
                $table_post = 'tbl_post';
           $data['postbyid'] = $post_model->postbyid($table_post, $cond);
           foreach($data['postbyid'] as $key => $value){
                $path_unlink = 'public/uploads/post/';
                unlink($path_unlink.$value['image_post']);
           }
            $data_update = array(
                'title_post' => $title,
               'content_post' => $content,
               'image_post' => $unique_file,
               'id_category_post' => $category_post
            );
           move_uploaded_file($tmp_image, $path_upload);
        }
            else{
                $data_update = array(
                    'title_post' => $title,
                   'content_post' => $content,
                   'id_category_post' => $category_post
                );
            }
            $result =  $post_model->updatepost($table_post, $data_update, $cond);
            if($result == '1'){
             $message['msg'] = 'Update thành công';
          header("Location:".BASE_URL."/post/listpost?msg=".urldecode(serialize($message['msg'])));
         }
         else{
          $message['msg'] = 'Update thất bại';
          header("Location:".BASE_URL."/post/listpost?msg=".urldecode(serialize($message['msg'])));
          }
        }

        public function listpost()
        {
            Session::checkSession();
           $this->load->view('cpanel/header');
           $this->load->view('cpanel/menu');  
           $post_model = $this->load->model('postmodel');
           $table_post = 'tbl_post';
           $table_category = 'tbl_category_post';
           $data['post'] = $post_model->list_post($table_post, $table_category);
           $this->load->view('cpanel/post/post_list', $data);
           $this->load->view('cpanel/footer');
        }

        
        public function deletepost()
        {
            Session::checkSession();
           $post_model = $this->load->model('postmodel');
           $table_post = 'tbl_post';
            $id = $_GET['id'];
            $cond = "tbl_post.id_post = '$id'";
           $result =  $post_model->deletepost($table_post, $cond);
           if($result == '1'){
            $message['msg'] = 'Xóa thành công';
         header("Location:".BASE_URL."/post/listpost?msg=".urldecode(serialize($message['msg'])));
        }
        else{
         $message['msg'] = 'Xóa thất bại';
         header("Location:".BASE_URL."/post/listpost?msg=".urldecode(serialize($message['msg'])));
         }
            // $data = array('msg'=> 'insert thành công');
            // $this->load->view('addcategory', $data);
        }
    }


?>