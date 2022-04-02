<div class="main py-4 px-4 md:px-12 lg:px-28 bg-zinc-100">
        <span class="text-zinc-400 font-base hover:text-amber-400">
          Home Page</span
        >
        <span class="text-zinc-900 font-bold"
          ><i class="fa-solid fa-angle-right"></i> My account</span
        >
      </div>
      <div class="px-3 md:px-8 lg:px-28 py-14">
        <div class="flex flex-col lg:flex-row items-start">
            <form action="<?php echo BASE_URL?>/order/new_order" class="w-full lg:w-3/5 pr-0 md:pr-4 lg:pr-16" id="cart-order" method="post">
              <h1 class="text-2xl mb-2 font-bold">Billing details</h1>
              <label for="username" class="text-base font-normal"
                >Name <span class="text-red-600">*</span></label
              ><br />
              <input
                type="text"
                name="name"
                value="<?php echo $data['customer_info'][0]['customer_name'] ?>"
                required
                class="w-full my-2 h-14 border-1 border-zinc-200 focus:ring-0 focus:border-red-500"
              /><br />
              <label for="password"
                >Phone number <span class="text-red-600">*</span></label
              ><br />
              <input
                type="text"
                name="phone"
                value="<?php echo $data['customer_info'][0]['customer_phone'] ?>"
                required
                class="w-full my-2 h-14 border-1 border-zinc-200 focus:ring-0 focus:border-red-500"
              /><br />
              <label for="username" class="text-base font-normal"
                >Email <span class="text-red-600">*</span></label
              ><br />
              <input
                type="text"
                name="email"
                value="<?php echo $data['customer_info'][0]['customer_email'] ?>"
                required
                class="w-full my-2 h-14 border-1 border-zinc-200 focus:ring-0 focus:border-red-500"
              /><br />
              <label for="username" class="text-base font-normal"
                >Address <span class="text-red-600">*</span></label
              ><br />
              <input
                type="text"
                name="address"
                value="<?php echo $data['customer_info'][0]['customer_address'] ?>"
                required
                class="w-full my-2 h-14 border-1 border-zinc-200 focus:ring-0 focus:border-red-500"
              /><br />
              <label for="username" class="text-base font-normal"
                >Additional information <span class="text-red-600">*</span></label
              ><br />
              <textarea
                type="text"
                name="info"
                rows="5"
                autocomplete="off"
                placeholder="Give us some notification..."
                required
                class="w-full my-2 border-1 border-zinc-200 focus:ring-0 focus:border-red-500"
                style="resize: none;"
              ></textarea><br />
              <p class="text-sm font-medium text-black text-opacity-60">
                Your personal data will be used to support your experience
                throughout this website, to manage access to your account, and
                for other purposes described in our privacy policy.
              </p>
              <?php
                $total_input =0;
                if(isset($_SESSION['shopping_cart'])){
                $cart = $_SESSION['shopping_cart'];
                // print_r($cart);
                foreach($cart as $key => $value){
                // print_r($value['id_product'])
                $subtotal = $value['price_product']*$value['quantity_product'];
                $total_input+= $subtotal;
              }}  ?>
              <input name="total" type="hidden" value="<?php echo $total_input ?>"/>
            </form>
            <div class="w-full lg:w-2/5 mt-4 lg:mt-0 cart-bill border-8 px-3 md:px-8 lg:px-14 py-6">
            <h2 class="text-2xl font-bold text-red-600 mb-4">Your order</h2>
            <table class="w-full border-t-0">
                <thead>
                <tr>
                <th class="text-left text-xl font-bold">Product</th>
                <td class="text-right text-xl font-bold">Subtotal</td>
                </tr>
              </thead>
              <tbody>
                
                <?php
                $total =0;
                   if(isset($_SESSION['shopping_cart'])){
                    $cart = $_SESSION['shopping_cart'];
                    // print_r($cart);
                    foreach($cart as $key => $value){
                      // print_r($value['id_product'])
                      $subtotal = $value['price_product']*$value['quantity_product'];
                      $total+= $subtotal;
                      ?>
                        <tr>
                        <th class="text-left font-light"><?php echo $value['title_product'] ?> x <?php echo $value['quantity_product'] ?> </th>
                        <td class="text-right text-xl font-normal"><?php echo number_format($subtotal,0,',', '.') ?>đ</td>
                        </tr>
                 <?php   } }
                 ?>
                <tr>
                  <th class="text-left">Subtotal</th>
                  <td class="text-right text-xl font-bold"><?php echo number_format($total,0,',', '.') ?>đ</td>
                </tr>
                <tr>
                  <th class="text-left">Total</th>
                  <td
                    class="text-right text-4xl text-red-600 text-center font-bold"
                  >
                  <?php echo number_format($total,0,',', '.') ?>đ
                  </td>
                </tr>
              </tbody>
            </table>
            <button
              type="submit"
              form="cart-order"
              class="p-4 w-full block text-center font-bold bg-stone-900 hover:bg-red-600 text-white"
              >Place order</button
            >
          </div>
            <div>
            
            </div>
        </div>
      </div>