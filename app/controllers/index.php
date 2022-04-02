<?php 
    class index extends DController{
        public function __construct()
        {
            Session::init();
            $data = array();
           parent::__construct();
        }
        public function index(){
            $this->homepage();
        }
        public function homepage()
        {
            $category_model = $this->load->model('categorymodel');
            $post_model = $this->load->model('postmodel');
            $tbl_category_product = 'tbl_category_product';
            $tbl_post = 'tbl_post';
            $tbl_post_category = 'tbl_category_post';
            $data['category'] = $category_model->category_home($tbl_category_product);
            $data['latest_post'] = $post_model->list_post_client($tbl_post, $tbl_post_category, 0);
            $this->load->view('header',$data);
            $this->load->view('home', $data);
            $this->load->view('footer');
        }

        public function notfound()
        {
            $category_model = $this->load->model('categorymodel');
            $tbl = 'tbl_category_product';
            $data['category'] = $category_model->category_home($tbl);
           $this->load->view('header',$data);
           $this->load->view('notfound');
           $this->load->view('footer');

        }

    }


?>