<?php
        // echo '<br>';
        // echo '<span style="color: blue; font-size: 30px">'.$data['msg'].'</span>'; 
        if(!empty($_GET['msg'])){
            $msg = unserialize($_GET['msg']);
            echo '<h2 style="color: blue">'.$msg.'</h2>';
        }
    ?>
<p>
    <h3>All category:</h3><br>
    <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Order_code</th>
        <th>Order_date</th>
        <th>Tình trạng</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Xem</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $i = 0;
    foreach($data['list_order'] as $key => $value){
        $i++;
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $value['order_code'] ?></td>
        <td><?php echo $value['order_date'] ?></td>
        <td><?php echo $value['order_status'] == 0 ?'chưa xử lý' : 'đã xử lý' ?></td>
        <td><?php echo $value['customer_name']?></td>
        <td><?php echo $value['customer_phone']?></td>
        <td><a href="<?php echo BASE_URL ?>/order/orderdetail/<?php echo $value['order_code'] ?>">Xem</a></td>
    </tr>
    <?php
    }
    ?>
                
    </tbody>
  </table>
</p>