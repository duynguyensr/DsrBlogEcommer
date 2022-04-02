<div class="main py-4 px-4 md:px-12 lg:px-28 bg-zinc-100">
        <span class="text-zinc-400 font-base hover:text-amber-400">
          Home Page</span
        >
        <span class="text-zinc-400 font-base hover:text-amber-400"
          ><i class="text-zinc-900 fa-solid fa-angle-right"></i> <a href="<?php echo BASE_URL?>/shop/categoryproduct/<?php echo $data['product_detail'][0]['id_category_product'] ?>"><?php echo $data['product_detail'][0]['title_category_product'] ?></a>  </span
        >
        <span class="text-zinc-900 font-bold"
          ><i class="fa-solid fa-angle-right"></i> Detail Product</span
        >
      </div>
      <div class="px-4 lg:px-4 lg:px-24 py-8 mb-12">
        <div class="flex flex-col lg:flex-row">
          <div
            class="w-full lg:w-2/4 flex items-center justify-center mb-8 lg:mb-0"
          >
            <img
              
              src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $data['product_detail'][0]['image_product'] ?>"
              class="w-full md:w-5/6 h-auto border-1 m-auto"
            />
          </div>
          <div class="w-full lg:w-2/4 px-2 md:px-14 lg:px-8">
            <h1 class="text-4xl font-semibold text-zinc-900 mb-6">
              <?php echo $data['product_detail'][0]['title_product'] ?>
            </h1>
            <h3 class="text-3xl font-semibold text-amber-400 mb-6"><?php echo number_format($data['product_detail'][0]['price_product'],0,',','.')?>đ</h3>
            <p class="text-base font-base text-zinc-900 opacity-90 mb-6">
            <?php echo $data['product_detail'][0]['desc_product'] ?>

            </p>
            <h2 class="text-black font-bold mb-6">
              Category:
              <span class="text-zinc-500 font-normal"><?php echo $data['product_detail'][0]['title_category_product'] ?></span>
            </h2>
            <form action="<?php echo BASE_URL?>/cart/addcart" method="POST">
            <div
              class="px-4 py-2 lg:p-8 border-2 flex flex-wrap items-center mb-6"
            >
              <input type="hidden" value="<?php echo $data['product_detail'][0]['id_product'] ?>" name='id_product'>
              <input type="hidden" value="<?php echo $data['product_detail'][0]['title_product'] ?>" name='title_product'>
              <input type="hidden" value="<?php echo $data['product_detail'][0]['image_product'] ?>" name='image_product'>
              <input type="hidden" value="<?php echo $data['product_detail'][0]['price_product'] ?>" name='price_product'>
              <!-- <input type="hidden" value="1" name='quantity_product'> -->
              <div class="inline-flex mr-2 border-2">
                <span
                  style="height: 40px; width: 40px"
                  class="float-left flex justify-center items-center hover:text-amber-400 text-lg font-semibold cursor-pointer"
                  onclick="changeQuantity('-')"
                  >-</span
                >
                <input
                style="width: 32px; height: 40px"
                readonly
                value="1"
                name='quantity_product'
                class="quantity-product block text-center float-left flex justify-center items-center"
                >

                <span
                  style="height: 40px; width: 40px"
                  class="float-left flex justify-center items-center hover:text-amber-400 text-lg font-semibold cursor-pointer"
                  onclick="changeQuantity('+')"
                  >+</span
                >
              </div>
              <input type="submit" value="Add to cart" 
                class="flex justify-center items-center my-2 mr-2 bg-zinc-900 text-white hover:bg-green-700"
                style="width: 200px; height: 50px"
              >
                
              </input>
              <div
                class="float-left flex justify-center items-center border-1 hover:border-black"
                style="width: 40px; height: 40px"
              >
                <i class="fa-regular fa-heart"></i>
              </div>
            </div>
            </form>

            <div class="py-5 px-1 md:p-4 lg:px-8 border-t-1 border-b-1">
              <ul class="list-disc list-inside text-zinc-500">
                <li>Free global shipping on all orders</li>
                <li>30 days easy returns if you change your mind</li>
                <li>Order before noon for same day dispatch</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="px-4 lg:px-28 mt-14">
        <div class="border-t-1">
          <ul class="w-full flex items-center justify-center">
            <li
              class="des cursor-pointer relative text-xl lg:text-2xl text-amber-500 py-5 font-semibold inline-block mr-6"
              onclick="showDes(1)"
            >
              Description
            </li>
            <li
              class="more cursor-pointer relative text-xl lg:text-2xl py-5 font-semibold inline-block"
              onclick="showDes(2)"
            >
              More Products
            </li>
          </ul>
        </div>
        <div class="pb-12 lg:pb-16 px-2 mb-8 lg:mb-8 border-b-1">
          <div class="product-description px-2 lg:px-12 opacity-80">
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus
              accusantium debitis omnis ipsum ratione expedita rerum aspernatur
              placeat animi excepturi. Rerum aperiam dolor fuga reiciendis
              maiores veritatis ratione delectus excepturi a pariatur,
              recusandae in aliquam, nesciunt ab laboriosam molestias repellat
              iusto ipsa quo magnam cumque sequi! Expedita unde dicta tempora
              similique esse quam. Nisi asperiores exercitationem, corrupti, ab
              neque nesciunt magnam, sit similique accusamus dicta excepturi
            </p>
            <br />
            <p>
              Rerum aperiam dolor fuga reiciendis maiores veritatis ratione
              delectus excepturi a pariatur, recusandae in aliquam, nesciunt ab
              laboriosam molestias repellat iusto ipsa quo magnam cumque sequi!
              Expedita unde dicta tempora similique esse quam. Nisi asperiores
              exercitationem, corrupti, ab neque nesciunt magnam, sit similique
              accusamus dicta excepturi
            </p>
            <br />
            <p>
              Rerum aperiam dolor fuga reiciendis maiores veritatis ratione
              delectus excepturi a pariatur, recusandae in aliquam, nesciunt ab
              laboriosam molestias repellat iusto ipsa quo magnam cumque sequi!
              Expedita unde dicta tempora similique esse quam. Nisi asperiores
              exercitationem, corrupti, ab neque nesciunt magnam, sit similique
              accusamus dicta excepturi
            </p>
          </div>
          <div class="more-menu hidden mt-0 lg:mt-4">
            <div
              class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-2 md:gap-4"
            >
            <?php
            $more_product = array_slice($data['product_related'], 4, 8);
            foreach($more_product as $key => $product) { ?>
              <div class="border-1 hover:border-amber-500">
                <div>
                  <img
                    src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $product['image_product'] ?>"
                    class="w-full h-auto"
                  />
                </div>
                <div class="flex flex-col p-4 justify-center items-center">
                  <span class="text-sm text-zinc-400 font-semibold"><?php echo $product['title_category_product'] ?></span>
                  <h3
                    class="text-lg font-medium mb-1 lg:mb-2 hover:text-amber-400 cursor-pointer"
                  >
                  <a href="<?php echo BASE_URL ?>/shop/productdetail/<?php echo $product['id_product']?>"><?php echo $product['title_product'] ?></a>
                  </h3>
                  <span class="text-amber-500 text-base font-bold"><?php echo $product['price_product'] ?>đ</span>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="text-center mb-12">
          <h1 class="text-3xl font-bold mb-8">Related Products</h1>
          <div
            class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-2 md:gap-4"
          >
          <?php
          $related_product = array_slice($data['product_related'], 0, 4);
          foreach($related_product as $key => $product) { ?>
            <div class="border-1 hover:border-amber-500">
              <div>
                <img
                  src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $product['image_product'] ?>"
                  class="w-full h-auto"
                />
              </div>
              <div class="flex flex-col p-4 justify-center items-center">
                <span class="text-sm text-zinc-400 font-semibold"><?php echo $product['title_category_product'] ?></span>
                <h3
                  class="text-lg font-medium mb-1 lg:mb-2 hover:text-amber-400 cursor-pointer"
                >
                <a href="<?php echo BASE_URL ?>/shop/productdetail/<?php echo $product['id_product']?>"><?php echo $product['title_product'] ?></a>
                </h3>
                <span class="text-amber-500 text-base font-bold"><?php echo $product['price_product'] ?>đ</span>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>