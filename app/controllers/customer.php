<?php 
    class customer extends DController{
        public function __construct()
        {
            Session::init();
            $data = array();
           parent::__construct();
        }
        public function index(){
            $this->account();
        }

        public function account(){
            $category_model = $this->load->model('categorymodel');
            $customer_model = $this->load->model('customermodel');
            $tbl = 'tbl_category_product';
            $tbl_customer = 'tbl_customer';
            $data['category'] = $category_model->category_home($tbl);
            if(!Session::get('customer_login')){
                $this->load->view('header',$data);
                $this->load->view('account');
                $this->load->view('footer');
            }
            else{
                $data['customer_info'] = $customer_model->getUserLoginInfo($tbl_customer, Session::get('customer_name'), Session::get('customer_password'));
                $this->load->view('header',$data);
                // print_r($data['customer_info']);
                $this->load->view('account', $data);
                $this->load->view('footer');
            }
        }

        public function login(){
            $username = $_POST['username'];
            $password = md5($_POST['password']);
           $table_customer = 'tbl_customer';
           $customer_model = $this->load->model('customermodel');
           $count  = $customer_model->login($table_customer, $username, $password);
           if($count == 0){
            $message['msg'] = 'Username or password was wrong';
            $message['msg_status'] = 1;
            header("Location:".BASE_URL."/customer/account?msg=".urldecode(serialize($message['msg']))."&status=".$message['msg_status']);

           }
           else{
                $result = $customer_model->getUserLoginInfo($table_customer, $username, $password);
               echo $result[0]['username'];
               Session::init();
               Session::set('customer_login', true);
               Session::set('customer_name', $result[0]['customer_name']);
               Session::set('id_customer', $result[0]['id_customer']);
               Session::set('customer_email', $result[0]['customer_email']);
               Session::set('customer_phone', $result[0]['customer_phone']);
               Session::set('customer_address', $result[0]['customer_address']);
               Session::set('customer_password', $result[0]['customer_password']);
               $message['msg'] = 'Log in successfully';
            $message['msg_status'] = 1;
                header("Location:".BASE_URL."/cart/mycart?msg=".urldecode(serialize($message['msg']))."&status=".$message['msg_status']);
           }
        }
        public function register(){
            $customer_model = $this->load->model('customermodel');
           $table_customer = 'tbl_customer';
           $username = $_POST['username'];
           $password = $_POST['password'];
           $email = $_POST['email'];
           $phone = $_POST['phone'];
           $address = $_POST['address'];
           $data_insert = array(
               'customer_name' => $username,
               'customer_password' => md5($password),
               'customer_email' => $email,
               'customer_phone' => $phone,
               'customer_address' => $address,
           );
           $count = $customer_model->check_name_email($table_customer, $username, $email);
           if($count != 0){
            $message['msg'] = 'Username or email already exist';
            $message['msg_status'] = 1;
            header("Location:".BASE_URL."/customer/account?msg=".urldecode(serialize($message['msg']))."&status=".$message['msg_status']);
            exit();
           }
           else{
                $result =  $customer_model->insertcustomer($table_customer, $data_insert);
           if($result == '1'){
                Session::init();
                Session::set('customer_login', true);
                Session::set('customer_name', $username);
                Session::set('customer_email', $email);
                Session::set('customer_phone', $phone);
                Session::set('customer_address', $address);
                Session::set('customer_password', md5($password));
               $message['msg'] = 'Register successfully';
            $message['msg_status'] = 0;
            header("Location:".BASE_URL."/customer/account?msg=".urldecode(serialize($message['msg']))."&status=".$message['msg_status']);
           }
           else{
            $message['msg'] = 'Đăng kí thất bại';
            $message['msg_status'] = 1;
            header("Location:".BASE_URL."/customer/account?msg=".urldecode(serialize($message['msg']))."&status=".$message['msg_status']);
            }
            }
            
        }
        public function logout(){
            if(!Session::get('customer_login')){
                header("Location:".BASE_URL."/customer/account");
            }
            else{
                Session::unset('customer_login');
                header("Location:".BASE_URL."/customer/account");
            }
        }

        public function updateaccount(){
            $customer_model = $this->load->model('customermodel');
           $tbl_customer = 'tbl_customer';
           $username = $_POST['username'];
           $current_password = $_POST['current_password'];
           $new_password = $_POST['new_password'];
           $confirm_password = $_POST['confirm_password'];
           $email = $_POST['email'];
           $phone = $_POST['phone'];
           $address = $_POST['address'];
           $update_password = Session::get('customer_password');
           if($current_password != ""){
               if(md5($current_password) == Session::get('customer_password')){
                   if($new_password != "" && $confirm_password != ""){
                       if($new_password == $confirm_password){
                           $update_password = md5($confirm_password);
                       }
                       else{
                        $message['msg'] = 'Pass confirm not match';
                        $message['msg_status'] = 1;
                        header("Location:".BASE_URL."/customer/account?msg=".urldecode(serialize($message['msg']))."&status=".$message['msg_status']);
                        exit();
                       }
                   }
                   else{
                    $message['msg'] = 'New password or confirm password empty';
                    $message['msg_status'] = 1;
                    header("Location:".BASE_URL."/customer/account?msg=".urldecode(serialize($message['msg']))."&status=".$message['msg_status']);
                    exit();
                   }
               }
               else{
                $message['msg'] = 'Current password was wrong';
                $message['msg_status'] = 1;
                header("Location:".BASE_URL."/customer/account?msg=".urldecode(serialize($message['msg']))."&status=".$message['msg_status']);
                exit();
               }
           }
           else{
               if($new_password != "" || $confirm_password != ""){
                $message['msg'] = 'Current password was empty';
                $message['msg_status'] = 1;
                header("Location:".BASE_URL."/customer/account?msg=".urldecode(serialize($message['msg']))."&status=".$message['msg_status']);
                exit();
               }
               else{
                $update_password = Session::get('customer_password');
               }
           }
           $data_update = array(
               'customer_name' => $username,
               'customer_password' => $update_password,
               'customer_email' => $email,
               'customer_phone' => $phone,
               'customer_address' => $address,
           );
           print_r($data_update);
           $id_customer = Session::get('id_customer');
           $cond = "tbl_customer.id_customer = '$id_customer'";
           $result =  $customer_model->updatecustomer($tbl_customer, $data_update, $cond);
           if($result == '1'){
                Session::set('customer_name', $username);
                Session::set('customer_email', $email);
                Session::set('customer_phone', $phone);
                Session::set('customer_address', $address);
                Session::set('customer_password', $update_password);
               $message['msg'] = 'Update information successfully';
               $message['msg_status'] = 0;
            header("Location:".BASE_URL."/customer/account?msg=".urldecode(serialize($message['msg']))."&status=".$message['msg_status']);
           }
           else{
            $message['msg'] = 'Update information failed';
            $message['msg_status'] = 1;
            header("Location:".BASE_URL."/customer/account?msg=".urldecode(serialize($message['msg']))."&status=".$message['msg_status']);
            }
        }

        public function myorder(){
            $category_model = $this->load->model('categorymodel');
            $customer_model = $this->load->model('customermodel');
            $order_model = $this->load->model('ordermodel');
            $tbl = 'tbl_category_product';
            $tbl_product = 'tbl_product';
            $tbl_customer = 'tbl_customer';
            $tbl_order = 'tbl_order';
            $tbl_order_detail = 'tbl_order_detail';
            $data['category'] = $category_model->category_home($tbl);
            if(!Session::get('customer_login')){
                header("Location:".BASE_URL."/customer/account");
            }
            else{
                $result = $customer_model->getUserLoginInfo($$tbl_customer, Session::get('customer_name'), Session::get('customer_password'));
                // print_r($result[0]);
                $customer_id = $result[0]['id_customer'];
                $cond = "tbl_order.id_customer = $customer_id ";
                $data_list_order = $order_model->list_order_by_customer_id($tbl_order, $cond);
                $data['order_list'] = array();
                foreach($data_list_order as $key=>$value){
                    $order_code = $value['order_code'];
                    $cond = "$tbl_order_detail.order_code = $order_code AND $tbl_order_detail.product_id = $tbl_product.id_product";
                    $value['product_list'] = $order_model->list_order_details($tbl_order_detail, $tbl_product, $cond);
                    array_push($data['order_list'], $value);
                }
                // print_r($data['order_list']);
                $this->load->view('header',$data);
                $this->load->view('my_order', $data);
                $this->load->view('footer');
            }
        }

    }


?>