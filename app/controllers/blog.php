<?php 
    class blog extends DController{
        public function __construct()
        {
            Session::init();
            $data = array();
           parent::__construct();
        }
        public function index(){
            $this->bloglist();
        }
        public function bloglist()
        {
            $category_model = $this->load->model('categorymodel');
            $tbl = 'tbl_category_product';
            $data['category'] = $category_model->category_home($tbl);
            $post_model = $this->load->model('postmodel');
            $tbl_post_category = 'tbl_category_post';
            $tbl_post = 'tbl_post';
            $data['category_post'] = $post_model->category_post($tbl_post_category);
            $url = explode( '/',$_GET['url']);
            if(isset($url[3]) && $url[2] == 'page'){
                $data['current_page'] = $url[3];
                    $data['max_page'] = $post_model->list_post($tbl_post,$tbl_post_category);
                    $data['post_list'] = $post_model->list_post_client($tbl_post, $tbl_post_category, ($url[3]-1)*8);
                // if(sizeof($data['product']) == 0){
                //     header("Location:".BASE_URL."/index/notfound");
                // }
            }
            else{
                $data['current_page'] = 1;
                $data['max_page'] = $post_model->list_post($tbl_post, $tbl_post_category);
                $data['post_list'] = $post_model->list_post_client($tbl_post, $tbl_post_category, 0);
            }
            $data['more_post'] = $post_model->post_random($tbl_post, $tbl_post_category);

           $this->load->view('header',$data);
           $this->load->view('categoryblog',$data);
           $this->load->view('footer');
        }
        public function categoryblog($id)
        {
            $category_model = $this->load->model('categorymodel');
            $tbl = 'tbl_category_product';
            $data['category'] = $category_model->category_home($tbl);
            $post_model = $this->load->model('postmodel');
            $tbl_post_category = 'tbl_category_post';
            $tbl_post = 'tbl_post';
            $data['category_post'] = $post_model->category_post($tbl_post_category);
            $url = explode( '/',$_GET['url']);
            if(isset($url[4]) && $url[3] == 'page'){
                $data['current_page'] = $url[4];
                $cond = "tbl_post.id_category_post = tbl_category_post.id_category_post AND tbl_post.id_category_post = '$id'";
                $data['max_page'] = $post_model->list_all_post_bycond($tbl_post,$tbl_post_category, $cond);
                $data['post_list'] = $post_model->list_post_by_cond($tbl_post, $tbl_post_category, $cond, ($url[4]-1)*8);
                // if(sizeof($data['product']) == 0){
                //     header("Location:".BASE_URL."/index/notfound");
                // }
            }
            else{
                $data['current_page'] = 1;
                $cond = "tbl_post.id_category_post=tbl_category_post.id_category_post AND tbl_category_post.id_category_post='$id'";
                $data['max_page'] = $post_model->list_all_post_bycond($tbl_post, $tbl_post_category, $cond);
                $data['post_list'] = $post_model->list_post_by_cond($tbl_post, $tbl_post_category,$cond, 0);
            }
            $data['more_post'] = $post_model->post_random($tbl_post, $tbl_post_category);
           $this->load->view('header',$data);
           $this->load->view('categoryblog',$data);
           $this->load->view('footer');
        }
        

        public function blogdetail($id){
            $category_model = $this->load->model('categorymodel');
            $tbl = 'tbl_category_product';
            $data['category'] = $category_model->category_home($tbl);
            $post_model = $this->load->model('postmodel');
            $tbl_post_category = 'tbl_category_post';
            $tbl_post = 'tbl_post';
            $data['category_post'] = $post_model->category_post($tbl_post_category);
            $cond = "tbl_post.id_category_post=tbl_category_post.id_category_post AND tbl_post.id_post='$id'";
            $data['post_detail'] = $post_model->post_by_id($tbl_post, $tbl_post_category,$cond);
            $data['more_post'] = $post_model->post_random($tbl_post, $tbl_post_category);
            $this->load->view('header',$data);
            $this->load->view('detail_blog', $data);
            $this->load->view('footer');

            
        }

    }


?>