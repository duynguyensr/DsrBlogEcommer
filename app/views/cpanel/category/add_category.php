
<?php
        // echo '<br>';
        // echo '<span style="color: blue; font-size: 30px">'.$data['msg'].'</span>'; 
        if(!empty($_GET['msg'])){
            $msg = unserialize($_GET['msg']);
            echo '<h2 style="color: blue">'.$msg.'</h2>';
        }
    ?>
<h3 style="text-align: center;">Thêm danh mục sản phẩm</h3>
<div class="col-md-12">
<form autocomplete="off" action="<?php echo BASE_URL?>/product/insertcategory" method="POST">
  <div class="form-group">
    <label for="title">Tên danh mục</label>
    <input type="text" name="title" class="form-control">
  </div>
  <div class="form-group">
    <label for="desc">Mô tả danh mục</label>
    <input type="text" name="desc" class="form-control">
  </div>
  <button type="submit" class="btn btn-default">Thêm danh mục</button>
</form>
</div>
