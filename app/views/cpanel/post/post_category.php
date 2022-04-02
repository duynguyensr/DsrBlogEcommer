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
        <th>Tên danh mục</th>
        <th>Mô tả</th>
        <th>Sửa || Xóa</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $i = 0;
    foreach($data['category'] as $key => $value){
        $i++;
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $value['title_category_post'] ?></td>
        <td><?php echo $value['desc_category_post']?></td>
        <td><a href="<?php echo BASE_URL ?>/post/editcategory?id=<?php echo $value['id_category_post'] ?>">Sửa</a> || <a href="<?php echo BASE_URL ?>/post/deletecategory?id=<?php echo $value['id_category_post'] ?>">Xóa</a> </td>
    </tr>
    <?php
    }
    ?>
                
    </tbody>
  </table>
</p>