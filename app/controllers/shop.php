<?php 
    class shop extends DController{
        public function __construct()
        {
            Session::init();
            $data = array();
           parent::__construct();
        }
        public function index(){
            $this->productlist();
        }

        public function productlist(){
            $category_model = $this->load->model('categorymodel');
            $tbl = 'tbl_category_product';
            $data['category'] = $category_model->category_home($tbl);
            $tbl_product = 'tbl_product';
            $tbl_category = 'tbl_category_product';
            $url = explode( '/',$_GET['url']);
            if(isset($url[3]) && $url[2] == 'page'){
                $data['current_page'] = $url[3];
                if(isset($_GET['max_price'])){

                    $max_price = $_GET['max_price'];
                    $cond = "tbl_product.id_category_product=tbl_category_product.id_category_product AND tbl_product.price_product <= $max_price";
                    $data['max_page'] = $category_model->list_all_product_bycond($tbl_product, $tbl_category, $cond);
                    $data['product'] = $category_model->list_product_by_cond($tbl_product, $tbl_category, $cond, ($url[3]-1)*12);
                }
                else{
                    $data['max_page'] = $category_model->list_product($tbl_product,$tbl_category);
                    $data['product'] = $category_model->list_product_client($tbl_product, $tbl_category, ($url[3]-1)*12);
                }
                // if(sizeof($data['product']) == 0){
                //     header("Location:".BASE_URL."/index/notfound");
                // }
            }
            else{
                $data['current_page'] = 1;
                if(isset($_GET['max_price'])){
                    $max_price = $_GET['max_price'];
                    $cond = "tbl_product.id_category_product=tbl_category_product.id_category_product AND tbl_product.price_product <= $max_price";
                    $data['max_page'] = $category_model->list_all_product_bycond($tbl_product, $tbl_category, $cond);
                    $data['product'] = $category_model->list_product_by_cond($tbl_product, $tbl_category, $cond, 0 );
                }
                else{
                    $data['max_page'] = $category_model->list_product($tbl_product, $tbl_category);
                    $data['product'] = $category_model->list_product_client($tbl_product, $tbl_category, 0);
                }
            }

                
                

            $this->load->view('header',$data);
            $this->load->view('categoryproduct', $data);
            $this->load->view('footer');
        }
        public function categoryproduct($id)
        {
            
            $category_model = $this->load->model('categorymodel');
            $tbl = 'tbl_category_product';
            $data['category'] = $category_model->category_home($tbl);
            $tbl_product = 'tbl_product';
            $tbl_category = 'tbl_category_product';
            $url = explode( '/',$_GET['url']);
            if(isset($url[4]) && $url[3] == 'page'){
                $data['current_page'] = $url[4];
                
                if(isset($_GET['max_price'])){
                    $max_price = $_GET['max_price'];
                    $cond = "tbl_product.id_category_product=tbl_category_product.id_category_product AND tbl_category_product.id_category_product='$id' AND tbl_product.price_product <= $max_price";
                    $data['max_page'] = $category_model->list_all_product_bycond($tbl_product, $tbl_category, $cond);
                    $data['product'] = $category_model->list_product_by_cond($tbl_product, $tbl_category, $cond, ($url[4]-1)*12 );
                }
                else{
                $cond = "tbl_product.id_category_product=tbl_category_product.id_category_product AND tbl_category_product.id_category_product='$id'";
                $data['max_page'] = $category_model->list_all_product_bycond($tbl_product, $tbl_category, $cond);
                $data['product'] = $category_model->list_product_by_cond($tbl_product, $tbl_category, $cond,  ($url[4]-1)*12);
                }
            }
            else{
                $data['current_page'] = 1;
                if(isset($_GET['max_price'])){
                    $max_price = $_GET['max_price'];
                    $cond = "tbl_product.id_category_product=tbl_category_product.id_category_product AND tbl_category_product.id_category_product='$id' AND tbl_product.price_product <= $max_price";
                    $data['max_page'] = $category_model->list_all_product_bycond($tbl_product, $tbl_category, $cond);
                    $data['product'] = $category_model->list_product_by_cond($tbl_product, $tbl_category, $cond, 0 );
                }
                else{
                    $cond = "tbl_product.id_category_product=tbl_category_product.id_category_product AND tbl_category_product.id_category_product='$id'";
                    $data['max_page'] = $category_model->list_all_product_bycond($tbl_product, $tbl_category, $cond);
                    $data['product'] = $category_model->list_product_by_cond($tbl_product, $tbl_category, $cond, 0);
                }
            }
            $this->load->view('header',$data);
            $this->load->view('categoryproduct', $data);
            $this->load->view('footer');
        }

        public function searchproduct(){
            $searchKey = $_GET['search'];
            $category_model = $this->load->model('categorymodel');
            $tbl_category = 'tbl_category_product';
            $data['category'] = $category_model->category_home($tbl_category);
            $tbl_product = 'tbl_product';
            if(isset($_GET['max_price'])){
            $max_price = $_GET['max_price'];
            $cond = "tbl_product.id_category_product=tbl_category_product.id_category_product AND tbl_product.title_product COLLATE UTF8_GENERAL_CI LIKE '%".$searchKey."%' AND tbl_product.price_product <= $max_price ";
            $data['current_page'] = 1;
            $data['max_page'] = $category_model->list_all_product_bycond($tbl_product, $tbl_category, $cond);
            $data['product'] = $category_model->list_product_by_cond($tbl_product, $tbl_category, $cond, 0);
            }
            else{
            $cond = "tbl_product.id_category_product=tbl_category_product.id_category_product AND tbl_product.title_product COLLATE UTF8_GENERAL_CI LIKE '%".$searchKey."%' ";
            $data['current_page'] = 1;
            $data['max_page'] = $category_model->list_all_product_bycond($tbl_product, $tbl_category, $cond);
            $data['product'] = $category_model->list_product_by_cond($tbl_product, $tbl_category, $cond, 0);
            }
            $this->load->view('header',$data);
            $this->load->view('categoryproduct', $data);
            $this->load->view('footer');
        }

        public function productdetail($id){
            $category_model = $this->load->model('categorymodel');
            $tbl_category = 'tbl_category_product';
            $tbl_product = 'tbl_product';
            $data['category'] = $category_model->category_home($tbl_category);
            $cond = "tbl_product.id_product = '$id' AND tbl_product.id_category_product = tbl_category_product.id_category_product";
            $data['product_detail'] = $category_model->product_by_id($tbl_product, $tbl_category,$cond);
            $data['product_related'] = $category_model->product_random($tbl_product, $tbl_category, $data['product_detail'][0]['id_product']);
           $this->load->view('header',$data);
            $this->load->view('detail_product', $data);
            $this->load->view('footer');
        }

    }


?>