
<?php
        // echo '<br>';
        // echo '<span style="color: blue; font-size: 30px">'.$data['msg'].'</span>'; 
        if(!empty($_GET['msg'])){
            $msg = unserialize($_GET['msg']);
            echo '<h2 style="color: blue">'.$msg.'</h2>';
        }
        echo '<br>';
    ?>


<h3 style="text-align: center;">Chỉnh sửa danh mục sản phẩm</h3>
<div class="col-md-12">
<form autocomplete="off" action="<?php echo BASE_URL?>/product/updatecategory?id=<?php echo $_GET['id'] ?>" method="POST">
  <div class="form-group">
    <label for="title">Tên danh mục</label>
    <input type="text" name="title" class="form-control" value="<?php echo $data['categorybyid'][0]['title_category_product']?>">
  </div>
  <div class="form-group">
    <label for="desc">Mô tả danh mục</label>
    <textarea type="text" name="desc" class="form-control" rows="5" style="resize: none;"><?php echo $data['categorybyid'][0]['desc_category_product']?></textarea>
  </div>
  <button type="submit" class="btn btn-default">Cập nhật danh mục</button>
</form>
</div>
