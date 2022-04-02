      <div class="main py-4 px-4 md:px-12 lg:px-28 bg-zinc-100">
        <span class="text-zinc-400 font-base hover:text-amber-400">
        <a href="<?php echo BASE_URL ?>">Home Page</a></span>
        <span class="text-zinc-900 font-bold"
          ><i class="fa-solid fa-angle-right"></i> Shop</span
        >
      </div>
      <div class="product flex justify-between items-start px-1 lg:px-28 py-12">
        <div class="w-1/4 hidden lg:flex justify-center">
          <div class="w-full shrink-0 border-2 divide-y-2">
            <div class="product_categories p-4">
              <h1 class="text-xl font-bold mb-3">Product categories</h1>
              <ul class="text-md">
              <?php $url = explode('/', $_GET['url']); 
                    $active_cate = 0;
                    if(isset($url[2]) && $url[2] != 'page'){
                      $active_cate = $url[2];
                    }
                    ?>
                <li class="mb-3 <?php echo $active_cate==0 ? 'text-amber-500' : '' ?> hover:text-amber-500 font-bas cursor-pointer">
                  <a href="<?php echo BASE_URL ?>/shop/productlist" >All</a>
                 </li>
                  <?php foreach($data['category'] as $key => $cate){ ?>
                <li class="mb-3 <?php echo $cate['id_category_product']==$active_cate ? 'text-amber-500' : '' ?> hover:text-amber-500 font-bas cursor-pointer">
                  <a href="<?php echo BASE_URL ?>/shop/categoryproduct/<?php echo $cate['id_category_product'] ?>" ><?php echo $cate['title_category_product'] ?></a>
                 </li>
                <?php } ?>
              </ul>
            </div>
            <div class="relative p-4">
              <h4 class="text-xl font-bold mb-3">Filter by price</h4>
              <form action="<?php 
              $url = explode('/', $_GET['url']);
              echo $url[1] != 'searchproduct' ? ($url[1] == 'categoryproduct' ? BASE_URL.'/'.$url[0].'/'.$url[1].'/'.$url[2] : BASE_URL.'/'.$url[0].'/'.$url[1]) : BASE_URL.'/shop/searchproduct'?> " method="GET">
                <?php if(isset($_GET['search'])){ ?>
                <input type="hidden" name="search" value="<?php echo $_GET['search'] ?>" />
                <?php } ?>
                <input
                  type="range"
                  min="0"
                  step="100000"
                  max="30000000"
                  value="<?php echo isset($_GET['max_price']) ? $_GET['max_price'] : '30000000' ?>"
                  name="max_price"
                  class="range price-range w-full"
                />
                <div class="flex justify-between mt-3">
                  <p class="text-base">
                    Max Price:
                    <span class="result text-amber-500 text-xl font-semibold"
                      ><?php echo isset($_GET['max_price']) ? $_GET['max_price'] : '30000000' ?>đ</span
                    >
                  </p>
                  <button
                    class="p-0 font-bold border-b-1 border-black hover:text-amber-500 hover:border-amber-500"
                    style="padding: 0"
                    type="submit"
                  >
                    Filter
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="filter py-12 px-4">
          <i
            class="text-2xl fa-solid fa-xmark absolute top-2 right-5 close-filter"
          ></i>
          <div class="w-full shrink-0 border-2 divide-y-2">
            <div class="product_categories p-4">
              <h1 class="text-xl font-bold mb-3">Product categories</h1>
              <ul class="text-md">
              <?php $url = explode('/', $_GET['url']); 
                    $active_cate = 0;
                    if(isset($url[2]) && $url[2] != 'page'){
                      $active_cate = $url[2];
                    }
                    ?>
                <li class="mb-3 <?php echo $active_cate==0 ? 'text-amber-500' : '' ?> hover:text-amber-500 font-bas cursor-pointer">
                  <a href="<?php echo BASE_URL ?>/shop/productlist" >All</a>
                 </li>
                  <?php foreach($data['category'] as $key => $cate){ ?>
                <li class="mb-3 <?php echo $cate['id_category_product']==$active_cate ? 'text-amber-500' : '' ?> hover:text-amber-500 font-bas cursor-pointer">
                  <a href="<?php echo BASE_URL ?>/shop/categoryproduct/<?php echo $cate['id_category_product'] ?>" ><?php echo $cate['title_category_product'] ?></a>
                 </li>
                <?php } ?>
              </ul>
            </div>
            <div class="relative p-4">
              <h4 class="text-xl font-bold mb-3">Filter by price</h4>
              <form action="<?php 
              $url = explode('/', $_GET['url']);
              echo $url[1] != 'searchproduct' ? ($url[1] == 'categoryproduct' ? BASE_URL.'/'.$url[0].'/'.$url[1].'/'.$url[2] : BASE_URL.'/'.$url[0].'/'.$url[1]) : BASE_URL.'/shop/searchproduct'?> " method="GET">
                <?php if(isset($_GET['search'])){ ?>
                <input type="hidden" name="search" value="<?php echo $_GET['search'] ?>" />
                <?php } ?>
                <input
                  type="range"
                  min="0"
                  step="100000"
                  max="30000000"
                  value="<?php echo isset($_GET['max_price']) ? $_GET['max_price'] : '30000000' ?>"
                  name="max_price"
                  class="range price-range w-full"
                />
                <div class="flex justify-between mt-3">
                  <p class="text-base">
                    Max Price:
                    <span class="result text-amber-500 text-xl font-semibold"
                      ><?php echo isset($_GET['max_price']) ? $_GET['max_price'] : '30000000' ?>đ</span
                    >
                  </p>
                  <button
                    class="p-0 font-bold border-b-1 border-black hover:text-amber-500 hover:border-amber-500"
                    style="padding: 0"
                    type="submit"
                  >
                    Filter
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="w-full lg:w-3/4 px-2 md:px-8">
          <div class="flex justify-between lg:justify-between items-start">
            <span
              class="open_filter mb-2 lg:hidden text-xl border-1 border-amber-500 inline-block p-2"
            >
              Filter <i class="fa-solid fa-filter"></i>
            </span>
            <?php if(isset($_GET['search'])) { ?>
              <h2 class="hidden lg:block font-semibold">
              Show results for: <?php echo $_GET['search'] ?>
            </h2>
            <?php } else{ ?>
            <h2 class="hidden lg:block font-semibold">
              Showing 1–12 of <?php echo sizeof($data['max_page']) ?> results
            </h2>
            <?php } ?>
            
            <div class="nav-page mb-3">
              
              <ul class="flex">
                <!-- <li class="font-semibold bg-amber-300 text-zinc-100">1</li>
                <li class="font-semibold hover:bg-zinc-200">2</li>
                <li class="font-semibold hover:bg-zinc-200">
                  <i class="fa-solid fa-angle-right"></i>
                </li> -->
                <?php for($i=1; $i<=ceil((sizeof($data['max_page'])/12)); $i++){ ?>
                  <li class="font-semibold <?php echo $data['current_page'] == $i ? 'bg-amber-300 text-zinc-100' : 'hover:bg-zinc-200' ?> ">
                  <?php 
                  $data_link = '';
                  if(isset($url[3]) && $url[2] == 'page'){
                    $data_link = BASE_URL.'/'.$url[0].'/'.$url[1].'/'.$url[2].'/'.$i;
                  }
                  elseif(isset($url[4]) && $url[3] == 'page'){
                    $data_link = BASE_URL.'/'.$url[0].'/'.$url[1].'/'.$url[2].'/'.$url[3].'/'.$i;
                  }
                  else{
                    if(isset($url[2]) && $url[2] != 'page'){
                      $data_link = BASE_URL.'/'.$url[0].'/'.$url[1].'/'.$url[2].'/'.'page'.'/'.$i;
                    }
                    else{
                      $data_link = BASE_URL.'/'.$url[0].'/'.$url[1].'/'.'page'.'/'.$i;

                    }
                  }
                  if(isset($_GET['max_price'])){
                    $data_link = $data_link.'/?max_price='.$_GET['max_price'];
                  }
                  ?>
                  <a href="<?php echo $data_link ?>"><?php echo $i ?></a> </li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div
            class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-2 md:gap-4"
          >
          <?php if(Count($data['product']) == 0){ ?>
              <h2 class="mt-4 lg:block font-semibold text-2xl">
              Not found any products
              </h2>
            <?php } ?>
          <?php foreach($data['product'] as $key => $product){ ?>
            <div class="group btn-2">
              <span class="block w-full h-full">
              <div class="py-1">
                <div class=" relative overflow-hidden transition">
                <img
                  src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $product['image_product'] ?>"
                  class="w-full h-auto"
                />
                <form action="<?php echo BASE_URL?>/cart/addcart" method="post" style="width:38px; height:38px" class="absolute top-60 ease-out duration-300 -left-16 group-hover:left-3 rounded-full flex justify-center items-center bg-amber-500 text-white">
                    <input type="hidden" value="<?php echo $product['id_product'] ?>" name='id_product'>
                    <input type="hidden" value="<?php echo $product['title_product'] ?>" name='title_product'>
                    <input type="hidden" value="<?php echo $product['image_product'] ?>" name='image_product'>
                    <input type="hidden" value="<?php echo $product['price_product'] ?>" name='price_product'>
                    <input type="hidden" value="1" name='quantity_product'>
                  <button type="submit"><i class="fa-solid fa-bag-shopping"></i></button>
                </form>
                </div>
              </div>
              <div class=" flex flex-col p-4 justify-center items-center">
                <span class="text-sm text-zinc-400 font-semibold"><?php echo $product['title_category_product'] ?></span>
                <h3
                  class="text-lg text-center font-medium mb-1 lg:mb-2 hover:text-amber-400 cursor-pointer"
                >
                  <a href="<?php echo BASE_URL ?>/shop/productdetail/<?php echo $product['id_product'] ?>"><?php echo $product['title_product'] ?></a>
                </h3>
                <span class="text-amber-500 text-base font-bold"><?php echo number_format($product['price_product'],0,',','.')?>đ</span>
              </div>
              </span>
            </div>
           <?php } ?>
           
            
          </div>
          <div class="nav-page mt-6">
              <ul class="flex">
                <?php for($i=1; $i<=ceil((sizeof($data['max_page'])/12)); $i++){ ?>
                  <li class="font-semibold <?php echo $data['current_page'] == $i ? 'bg-amber-300 text-zinc-100' : 'hover:bg-zinc-200' ?> ">
                  <?php 
                  $url = explode('/',$_GET['url']);
                  $data_link = '';
                  if(isset($url[3]) && $url[2] == 'page'){
                    $data_link = BASE_URL.'/'.$url[0].'/'.$url[1].'/'.$url[2].'/'.$i;
                  }
                  elseif(isset($url[4]) && $url[3] == 'page'){
                    $data_link = BASE_URL.'/'.$url[0].'/'.$url[1].'/'.$url[2].'/'.$url[3].'/'.$i;
                  }
                  else{
                    if(isset($url[2]) && $url[2] != 'page'){
                      $data_link = BASE_URL.'/'.$url[0].'/'.$url[1].'/'.$url[2].'/'.'page'.'/'.$i;
                    }
                    else{
                      $data_link = BASE_URL.'/'.$url[0].'/'.$url[1].'/'.'page'.'/'.$i;

                    }
                  }
                  if(isset($_GET['max_price'])){
                    $data_link = $data_link.'/?max_price='.$_GET['max_price'];
                  }
                  ?>
                  <a href="<?php echo $data_link ?>"><?php echo $i ?></a> </li>
                <?php } ?>
              </ul>
            </div>
        </div>
      </div>

