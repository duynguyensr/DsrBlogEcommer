<?php 
    class order extends DController{
        public function __construct()
        {
            $data = array();
           parent::__construct();
        }
        public function index(){
            $this->orderlist();
        }
        public function orderlist(){
            $order_model = $this->load->model('ordermodel');
            $tbl_order = 'tbl_order';
            $data['list_order'] = $order_model->list_order($tbl_order); 
            $this->load->view('cpanel/header');           
            $this->load->view('cpanel/menu');           
            $this->load->view('cpanel/order/list_order', $data);           
            $this->load->view('cpanel/footer');   
        }
        public function orderdetail($order_code){
            $order_model = $this->load->model('ordermodel');
            $tbl_order = 'tbl_order';
            $tbl_order_detail = 'tbl_order_detail';
            $tbl_product = 'tbl_product';
            $cond = "$tbl_order_detail.order_code = $order_code AND $tbl_order_detail.product_id = $tbl_product.id_product";
            $cond_2 = "$tbl_order.order_code = $order_code";
            $data['order_details'] = $order_model->list_order_details($tbl_order_detail, $tbl_product, $cond);
            $data['order_info'] = $order_model->order_by_code($tbl_order, $cond_2); 
            $this->load->view('cpanel/header');           
            $this->load->view('cpanel/menu');           
            $this->load->view('cpanel/order/order_detail', $data);           
            $this->load->view('cpanel/footer');   
        }

        public function confirm($order_code){
            $order_model = $this->load->model('ordermodel');
            $tbl_order = 'tbl_order';
            $cond = "$tbl_order.order_code = $order_code";
            $data = array(
                'order_status' => 1
            );
            $result = $order_model->updateOrder($tbl_order, $data, $cond);
            if($result == 1){
                $message['msg'] = 'Đã xử lý đơn hàng mã '.$order_code.' thành công';
            }
            else{
                $message['msg'] = 'Xử lý đơn hàng mã '.$order_code.' thất bại';
            }
            header("Location:".BASE_URL."/order/orderlist?msg=".urldecode(serialize($message['msg'])));
        }

        public function new_order(){
            Session::init();
            $order_model =  $this->load->model('ordermodel');
            $tbl_order = 'tbl_order';
            $tbl_order_detail = 'tbl_order_detail';
            $name = $_POST['name'];
            $phone = $_POST['phone'];    
            $address = $_POST['address'];
            $total = $_POST['total'];   
            $info = $_POST['info'];
            $order_code = rand(0,9999);
            date_default_timezone_set("asia/ho_chi_minh");
            $hour = date("h:i:sa");
            $date = date('d/m/Y');
            $order_date = $date.' '.$hour;
            $data_order = array(
                'order_code' => $order_code,
                'order_date' => $order_date,
                'order_status' => 0,
                'customer_name' => $name,
                'customer_phone' => $phone,
                'id_customer'=>Session::get('id_customer'),
                'delivery_address'=>$address,
                'order_total' => $total
            );
            $result_order = $order_model->insertorder($tbl_order, $data_order);
            if(Session::get('shopping_cart') == true){
                // print_r(Session::get('shopping_cart'));
                foreach(Session::get('shopping_cart') as $key => $value){
                    $data_details = array(
                        'order_code' => $order_code,
                        'product_id' => $value['id_product'], 
                        'product_quantity' => $value['quantity_product']
                    );
                    $result_details = $order_model->insert_order_details($tbl_order_detail, $data_details);
                }
                unset($_SESSION['shopping_cart']);
            }

            $message['msg'] = 'Place order successfully';
            header("Location:".BASE_URL."/cart/mycart?msg=".urldecode(serialize($message['msg'])));
        }

        
    }


?>