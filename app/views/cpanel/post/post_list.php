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
        <th>Sửa || Xóa</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $i = 0;
    foreach($data['post'] as $key => $value){
        $i++;
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><img height="100" width="100" src="<?php echo BASE_URL?>/public/uploads/post/<?php echo $value['image_post'] ?>" /></td>
        <td><?php echo $value['title_post'] ?></td>
        <td><?php echo $value['title_category_post'] ?></td>
        <!-- <td><?php echo $value['content_post']?></td> -->
        <td><a href="<?php echo BASE_URL ?>/post/editpost?id=<?php echo $value['id_post'] ?>">Sửa</a> || <a href="<?php echo BASE_URL ?>/post/deletepost?id=<?php echo $value['id_post'] ?>">Xóa</a> </td>
    </tr>
    <?php
    }
    ?>
                
    </tbody>
  </table>
</p>