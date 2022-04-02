
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo BASE_URL ?>/login/dashboard">DSR ADMIN</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a class="navbar-brand" href="<?php echo BASE_URL ?>/login/dashboard">Trang chủ</a></li>
      <li><a href="#">Thông tin</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Danh muc sản phẩm
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo BASE_URL ?>/product/addcategory">Thêm</a></li>
            <li><a href="<?php echo BASE_URL ?>/product/listcategory">Liệt kê</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Danh mục bài viết
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo BASE_URL ?>/post/addcategory">Thêm</a></li>
            <li><a href="<?php echo BASE_URL ?>/post/listcategory">Liệt kê</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sản phẩm
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo BASE_URL ?>/product/addproduct">Thêm</a></li>
            <li><a href="<?php echo BASE_URL ?>/product/listproduct">Liệt kê</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Bài viết
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo BASE_URL ?>/post/addpost">Thêm</a></li>
            <li><a href="<?php echo BASE_URL ?>/post/listpost">Liệt kê</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Đơn hàng
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo BASE_URL ?>/order">Liệt kê</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
