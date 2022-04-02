<?php
        // echo '<br>';
        // echo '<span style="color: blue; font-size: 30px">'.$data['msg'].'</span>'; 
        if(!empty($_GET['msg'])){
            $msg = unserialize($_GET['msg']);
            echo '<h2 style="color: blue">'.$msg.'</h2>';
        }
    ?>
<p>
    <h3>Đơn hàng chi tiết</h3><br>
    <p>Người đặt : <?php echo $data['order_info'][0]['customer_name'] ?></p><br>
    <p>Số điện thoại : <?php echo $data['order_info'][0]['customer_phone'] ?></p><br>
    <p>Ngày đặt : <?php echo $data['order_info'][0]['order_date'] ?></p><br>
    <p>Địa chỉ giao hàng: <?php echo $data['order_info'][0]['delivery_address'] ?></p><br>
    <p>Mã đơn hàng : <?php echo $data['order_info'][0]['order_code'] ?></p><br>
    <p>Sản phẩm: </p>
    <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Image</th>
        <th>Tên</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Tổng</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $i = 0;
    $total = 0;
    foreach($data['order_details'] as $key => $value){
        $total += $value['price_product']*$value['product_quantity'];
        $i++;
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><img height="100" width="100" src="<?php echo BASE_URL?>/public/uploads/product/<?php echo $value['image_product'] ?>" /></td>
        <td><?php echo $value['title_product'] ?></td>
        <td><?php echo number_format($value['price_product'],0,',','.')?>đ</td>
        <td><?php echo $value['product_quantity'] ?></td>
        <td><?php echo number_format($value['price_product']*$value['product_quantity'],0,',','.')?>đ</td>
        <!-- <td><a href="<?php echo BASE_URL ?>/product/editproduct?id=<?php echo $value['id_product'] ?>">Sửa</a> || <a href="<?php echo BASE_URL ?>/product/deleteproduct?id=<?php echo $value['id_product'] ?>">Xóa</a> </td> -->
    </tr>
    <?php
    }
    ?>
    <form action="<?php echo BASE_URL ?>/order/confirm/<?php echo $data['order_details'][0]['order_code'] ?>">
      <tr>
          <td><input type="submit" value="<?php echo $data['order_info'][0]['order_status'] == 1? 'đã xử lý thành công' : 'xác nhận xử lý' ?>" name="update_order" /></td>
          <td align="right" colspan="6">Tổng tiền: <?php echo number_format($total,0,',','.')?>đ</td>
      </tr>  
    </form>        
    </tbody>
  </table>
</p>