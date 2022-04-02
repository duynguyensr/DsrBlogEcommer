
<?php
        // echo '<br>';
        // echo '<span style="color: blue; font-size: 30px">'.$data['msg'].'</span>'; 
        if(!empty($_GET['msg'])){
            $msg = unserialize($_GET['msg']);
            echo '<h2 style="color: blue">'.$msg.'</h2>';
        }
        echo '<br>';
    ?>


<h3 style="text-align: center;">Chỉnh sủa bài viết</h3>
<div class="col-md-12">
<form autocomplete="off" action="<?php echo BASE_URL?>/post/updatepost?id=<?php echo $_GET['id'] ?>" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Tiêu đề</label>
    <input type="text" name="title" class="form-control" value="<?php echo $data['postbyid'][0]['title_post']?>">
  </div>
  <div class="form-group">
    <label for="image">Hình ảnh</label>
    <input type="file" name="image" class="form-control">
    <p><img height="100" width="100" src="<?php echo BASE_URL?>/public/uploads/post/<?php echo $data['postbyid'][0]['image_post'] ?>" /></p>
  </div>
  <div class="form-group">
    <label for="desc">Chi tiết</label>
    <!-- <textarea type="text" name="content" class="form-control" rows="5" style="resize: none;"><?php echo $data['postbyid'][0]['content_post']?></textarea> -->
    <textarea id="editor" name="content" class="form-control" row="20" style="resize: none;"><?php echo $data['postbyid'][0]['content_post']?></textarea>
  </div>
  <div class="form-group">
      <label for="category_post">Thể loại</label>
      <select class="form-control" name="category_post" >
        <?php 
        foreach($data['category'] as $key => $value){
         ?>
         <option <?php echo $value['id_category_post'] == $data['postbyid'][0]['id_category_post'] ? 'selected' : '' ?> value="<?php echo $value['id_category_post'] ?>"><?php echo $value['title_category_post'] ?></option>   
        <?php
        }
        ?>
      </select>
  </div>
  <button type="submit" class="btn btn-default">Cập nhật bài viết</button>
</form>
</div>
