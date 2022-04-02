
<?php
        // echo '<br>';
        // echo '<span style="color: blue; font-size: 30px">'.$data['msg'].'</span>'; 
        if(!empty($_GET['msg'])){
            $msg = unserialize($_GET['msg']);
            echo '<h2 style="color: blue">'.$msg.'</h2>';
        }
    ?>
<h3 style="text-align: center;">Thêm bài viết mới</h3>
<div class="col-md-12">
<form autocomplete="off" action="<?php echo BASE_URL?>/post/insertpost" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Tên bài viết</label>
    <input type="text" name="title" class="form-control">
  </div>
  <div class="form-group">
    <label for="image">Hình ảnh</label>
    <input type="file" name="image" class="form-control">
  </div>
  <div class="form-group">
    <label for="desc">Chi tiết bài viết</label>
    <!-- <textarea type="text" name="content" class="form-control" rows="5" style="resize: none;"></textarea> -->
    <textarea id="editor" name="content" class="form-control" row="20" style="resize: none;"></textarea>
  </div>
  <div class="form-group">
      <label for="category_post">Thể loại</label>
      <select class="form-control" name="category_post">
        <?php 
        foreach($data['category'] as $key => $value){
         ?>
         <option value="<?php echo $value['id_category_post'] ?>"><?php echo $value['title_category_post'] ?></option>   
        <?php
        }
        ?>
      </select>
  </div>
  <button type="submit" class="btn btn-default">Thêm bài viết</button>
</form>
</div>
