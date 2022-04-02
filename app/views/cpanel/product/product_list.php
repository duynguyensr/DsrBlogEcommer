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
        <th>Image</th>
        <th>Tên</th>
        <th>Danh mục</th>
        <th>Mô tả</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Sửa || Xóa</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $i = 0;
    foreach($data['product'] as $key => $value){
        $i++;
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><img height="100" width="100" src="<?php echo BASE_URL?>/public/uploads/product/<?php echo $value['image_product'] ?>" /></td>
        <td><?php echo $value['title_product'] ?></td>
        <td><?php echo $value['title_category_product'] ?></td>
        <td><?php echo $value['desc_product']?></td>
        <td><?php echo number_format($value['price_product'],0,',','.')?>đ</td>
        <td><?php echo $value['quantity_product'] ?></td>
        <td><a href="<?php echo BASE_URL ?>/product/editproduct?id=<?php echo $value['id_product'] ?>">Sửa</a> || <a href="<?php echo BASE_URL ?>/product/deleteproduct?id=<?php echo $value['id_product'] ?>">Xóa</a> </td>
    </tr>
    <?php
    }
    ?>
                
    </tbody>
  </table>
</p>