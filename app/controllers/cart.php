<?php 
    class cart extends DController{
        public function __construct()
        {
            $data = array();
           parent::__construct();
        }
        public function index(){
            $this->mycart();
        }
        public function mycart()
        {
            Session::init();
            $category_model = $this->load->model('categorymodel');
            $tbl = 'tbl_category_product';
            $tbl_product = 'tbl_product';
            $data['category'] = $category_model->category_home($tbl);
            $data['random_product'] = $category_model->product_random_second($tbl_product, $tbl);
            $this->load->view('header',$data);
            $this->load->view('cart', $data);
            $this->load->view('footer');
        }
        public function addcart()
        {
            Session::init();
            if(isset($_SESSION['shopping_cart'])){
                $already_have = 0;
                foreach($_SESSION['shopping_cart'] as $key =>$value){
                    if($_SESSION['shopping_cart'][$key]['id_product'] == $_POST['id_product']){
                        $already_have++;
                        $_SESSION['shopping_cart'][$key]['quantity_product']=$_SESSION['shopping_cart'][$key]['quantity_product'] + $_POST['quantity_product'];
                    }
                }

                if($already_have == 0){
                    $item = array(
                        'id_product' => $_POST['id_product'],
                        'title_product' => $_POST['title_product'],
                        'image_product' => $_POST['image_product'],
                        'price_product' => $_POST['price_product'],
                        'quantity_product' => $_POST['quantity_product']
                    );
                    $_SESSION['shopping_cart'][] = $item; 
                }
            }
            else{
                $item = array(
                    'id_product' => $_POST['id_product'],
                    'title_product' => $_POST['title_product'],
                    'image_product' => $_POST['image_product'],
                    'price_product' => $_POST['price_product'],
                    'quantity_product' => $_POST['quantity_product']
                );
                $_SESSION['shopping_cart'][] = $item; 
            }
            header('Location:'.BASE_URL.'/cart/mycart');
        }

        public function updatecart(){
            Session::init();
            // Session::destroy();
            print_r($_POST['qty']);
            $qty = $_POST['qty'];
            if(isset($_POST['update_cart'])){
                if(isset($_SESSION['shopping_cart'])){
                    foreach($_SESSION['shopping_cart'] as $key =>$value){
                        if($qty[$value['id_product']] == 0){
                            print_r($value['id_product']);
                            unset($_SESSION['shopping_cart'][$key]);
                        }
                        else{
                            $_SESSION['shopping_cart'][$key]['quantity_product'] = $qty[$value['id_product']];

                        }
                    }
                    $message['msg'] = 'Update cart successfully';
                    header('Location:'.BASE_URL.'/cart/mycart?msg='.urldecode(serialize($message['msg'])));
                }
                else{
                    header('Location:'.BASE_URL);
                }
            }
            
        }
        public function cartcheckout(){
            Session::init();
            // print_r(Session::get('customer_login'));
            if(!Session::get('customer_login')){
                header("Location:".BASE_URL."/customer/account");
            }
            else{
                if(count($_SESSION['shopping_cart']) == 0){
                    $message['msg'] = 'Cart was empty';
                    header('Location:'.BASE_URL.'/cart/mycart?msg='.urldecode(serialize($message['msg'])));
                }
                else{
                $category_model = $this->load->model('categorymodel');
                $tbl = 'tbl_category_product';
                $tbl_customer = 'tbl_customer';
                $data['category'] = $category_model->category_home($tbl);
                $customer_model = $this->load->model('customermodel');
                $data['customer_info'] = $customer_model->getUserLoginInfo($tbl_customer, Session::get('customer_name'), Session::get('customer_password'));
                $this->load->view('header',$data);
                $this->load->view('cart_checkout', $data);
                $this->load->view('footer');
                }
            }
        }


    }


?>