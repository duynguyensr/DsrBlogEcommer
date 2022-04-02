
<?php
        // echo '<br>';
        // echo '<span style="color: blue; font-size: 30px">'.$data['msg'].'</span>'; 
        if(!empty($_GET['msg'])){
            $msg = unserialize($_GET['msg']);
            echo '<h2 style="color: blue">'.$msg.'</h2>';
        }
        echo '<br>';
    ?>


<h3 style="text-align: center;">Chỉnh sản phẩm</h3>
<div class="col-md-12">
<form autocomplete="off" action="<?php echo BASE_URL?>/product/updateproduct?id=<?php echo $_GET['id'] ?>" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Tên sản phẩm</label>
    <input type="text" name="title" class="form-control" value="<?php echo $data['productbyid'][0]['title_product']?>">
  </div>
  <div class="form-group">
    <label for="price">Giá sản phẩm</label>
    <input type="text" name="price" class="form-control" value="<?php echo $data['productbyid'][0]['price_product']?>">
  </div>
  <div class="form-group">
    <label for="image">Hình ảnh</label>
    <input type="file" name="image" class="form-control">
    <p><img height="100" width="100" src="<?php echo BASE_URL?>/public/uploads/product/<?php echo $data['productbyid'][0]['image_product'] ?>" /></p>
  </div>
  <div class="form-group">
    <label for="desc">Mô tả sản phẩm</label>
    <textarea type="text" name="desc" class="form-control" rows="5" style="resize: none;"><?php echo $data['productbyid'][0]['desc_product']?></textarea>
  </div>
  <div class="form-group">
    <label for="quantity">Số lượng sản phẩm</label>
    <input type="text" name="quantity" class="form-control" value="<?php echo $data['productbyid'][0]['quantity_product']?>">
  </div>
  <div class="form-group">
      <label for="category_product">Danh mục sản phẩm</label>
      <select class="form-control" name="category_product" >
        <?php 
        foreach($data['category'] as $key => $value){
         ?>
         <option <?php echo $value['id_category_product'] == $data['productbyid'][0]['id_category_product'] ? 'selected' : '' ?> value="<?php echo $value['id_category_product'] ?>"><?php echo $value['title_category_product'] ?></option>   
        <?php
        }
        ?>
      </select>
  </div>
  <button type="submit" class="btn btn-default">Cập nhật sản phẩm</button>
</form>
</div>
