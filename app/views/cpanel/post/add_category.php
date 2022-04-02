
<?php
        // echo '<br>';
        // echo '<span style="color: blue; font-size: 30px">'.$data['msg'].'</span>'; 
        if(!empty($_GET['msg'])){
            $msg = unserialize($_GET['msg']);
            echo '<h2 style="color: blue">'.$msg.'</h2>';
        }
    ?>
<h3 style="text-align: center;">Thêm danh mục bài viết</h3>
<div class="col-md-12">
<form autocomplete="off" action="<?php echo BASE_URL?>/post/insertcategory" method="POST">
  <div class="form-group">
    <label for="title">Tên danh mục</label>
    <input type="text" name="title" class="form-control">
  </div>
  <div class="form-group">
    <label for="desc">Mô tả danh mục</label>
    <textarea type="text" name="desc" class="form-control" rows="5" style="resize: none;"></textarea>
  </div>
  <button type="submit" class="btn btn-default">Thêm danh mục</button>
</form>
</div>
