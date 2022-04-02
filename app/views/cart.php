<div class="main py-4 px-4 md:px-12 lg:px-28 bg-zinc-100">
        <span class="text-zinc-400 font-base hover:text-amber-400">
          <a href="<?php echo BASE_URL ?>">Home Page</a></span
        >
        <span class="text-zinc-900 font-bold"
          ><i class="fa-solid fa-angle-right"></i> Cart</span
        >
      </div>
      <div class="w-full p-4 border-2">
      
      <div class=" px-1 md:px-6 lg:px-24">
      <?php
        // echo '<br>';
        // echo '<span style="color: blue; font-size: 30px">'.$data['msg'].'</span>'; 
        if(!empty($_GET['msg'])){
            $msg = unserialize($_GET['msg']);
            echo '<div id="alert-border-3" class="alert flex p-4 mb-4 bg-green-100 border-t-4 border-green-500 dark:bg-green-200" role="alert">
            <svg class="flex-shrink-0 w-5 h-5 text-green-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div class="ml-3 text-lg font-medium text-green-700">'.$msg.
            '</div>
            </div>';
        }
    ?>
        <div
          class="flex flex-col lg:flex-row justify-between items-start mt-8"
        >
          <div class="w-full lg:w-4/6 pr-0 lg:pr-14 table-cart mb-8">
            <form action="<?php echo BASE_URL?>/cart/updatecart" method="post">
            <table class="w-full">
              <thead>
                <tr class="py-3">
                  <!-- <th></th> -->
                  <th class="text-sm text-left w-1/6 md:w-1/5"></th>
                  <th class="text-sm text-left">PRODUCT</th>
                  <th class="text-sm text-right md:text-left w-1/6">PRICE</th>
                  <th class="text-sm text-right md:text-left w-1/5">QTY</th>
                  <th class="text-sm text-right md:text-left w-1/12">TOTAL</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $total = 0;
                if(isset($_SESSION['shopping_cart'])){
                  $cart = $_SESSION['shopping_cart'];
                  // print_r($cart);
                  foreach($cart as $key => $value){
                    $subtotal = $value['quantity_product'] *  $value['price_product'];
                    $total+=$subtotal;
                    // print_r($value['id_product'])
                    ?>
                  <tr class="p-3">
                    <!-- <td class="text-center text-gray-800">
                        <input type="hidden" value="<?php echo $value['id_product'] ?>" name='update_id'>
                        <button type="submit" name="delete_cart"><i class="fa-solid fa-circle-xmark"></i></button>
                      </td> -->
                      <td class="text-center">
                        <img
                        src="<?php echo BASE_URL?>/public/uploads/product/<?php echo $cart[$key]['image_product'] ?>"
                        class="w-3/5 h-auto m-auto"
                        />
                    </td>
                    <td class="font-base md:font-bold hover:text-red-600">
                      <?php echo $cart[$key]['title_product'] ?>
                    </td>
                    <td class="font-bold"><?php echo number_format($cart[$key]['price_product'],0,',', '.') ?></td>
                    <td>
                      <input
                      type="number"
                      min="0"
                      name="qty[<?php echo $value['id_product'] ?>]"
                      value="<?php echo $cart[$key]['quantity_product'] ?>"
                      class="w-4/5 md:w-2/6 px-2 focus:border-red-600 focus:ring-0"
                      />
                    </td>
                    <td class="font-bold"><?php echo number_format($subtotal,0,',','.') ?></td>
                  </tr>
                  <?php
                    }
                  } ?>
                </tbody>
              </table>
              <button
              type="submit"
              class="block px-8 py-4 font-semibold mt-8 bg-stone-900 hover:bg-red-600 text-white"
              name="update_cart"
              >
              Update cart
            </button>
          </form>
          </div>
          <div class="w-full lg:w-2/6 cart-bill border-8 px-8 py-6">
            <h2 class="text-2xl font-bold mb-4">CART TOTALS</h2>
            <table class="w-full">
              <tbody>
                <tr>
                  <th class="text-left">Subtotal</th>
                  <td class="text-right text-xl font-bold"><?php echo number_format($total,0,',','.') ?></td>
                </tr>
                <tr>
                  <th class="text-left">Total</th>
                  <td
                    class="text-right text-4xl text-red-600 text-center font-bold"
                  >
                  <?php echo number_format($total,0,',','.') ?>đ
                  </td>
                </tr>
              </tbody>
            </table>
            <a
              href="<?php echo BASE_URL?>/cart/cartcheckout"
              class="p-4 w-full block text-center font-bold bg-stone-900 hover:bg-red-600 text-white"
              >Proceed to checkout</a
            >
          </div>
        </div>
      </div>
        <div class="w-full lg:w-4/6 my-8 px-1 md:px-6 lg:px-24">
          <h2 class="text-2xl mb-4 font-bold">You may be interested in…</h2>
          <div class="owl-carousel owl-theme owl-product p-1">
            <?php foreach($data['random_product'] as $key => $value){ ?>
            <div class="item border-1 hover:border-amber-500 mb-2 lg:mb-7">
              <div>
                <img
                  src="<?php echo BASE_URL?>/public/uploads/product/<?php echo $value['image_product'] ?>"
                  class="w-full h-auto"
                />
              </div>
              <div class="flex flex-col p-4 justify-center items-center">
                <span class="text-sm text-zinc-400 font-semibold"><?php echo $value['title_category_product'] ?></span>
                <h3
                  class="text-lg font-medium mb-1 lg:mb-2 hover:text-amber-400 cursor-pointer"
                >
                <a href="<?php echo BASE_URL?>/shop/productdetail/<?php echo $value['id_product'] ?>">
                <?php echo $value['title_product'] ?>
                </a>
                </h3>
                <span class="text-amber-500 text-base font-bold"><?php echo number_format($value['price_product'],0, ',', '.') ?></span>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <script>
        const alert = document.querySelector('.alert')
        setTimeout(()=>{
          alert.style.display = "none"
        }, 5000)
      </script>