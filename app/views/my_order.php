<div class="main py-4 px-4 md:px-12 lg:px-28 bg-zinc-100">
    <span class="text-zinc-400 font-base hover:text-amber-400">
      <a href="<?php echo BASE_URL ?>">Home Page</a></span
    >
    <span class="text-zinc-400 font-base hover:text-amber-400"
      ><i class="fa-solid fa-angle-right text-black"></i> <a href="<?php echo BASE_URL?>/customer/account">Account</a></span
    >
    <span class="text-zinc-900 font-bold"
      ><i class="fa-solid fa-angle-right"></i> My order</span
    >
</div>
<div class="px-3 lg:px-40 py-8 text-center" style="min-height: 500px;">
    <h3 class="text-3xl font-bold mb-4">My Orders </h3>
    <?php if(count($data['order_list'])==0){ ?>
      <h3 class="text-lg">You don't have any order! <a class="hover:text-red-600 hover:underline underline-offset-2" href="<?php echo BASE_URL ?>/shop/productlist">Shop now</a></h3>
    <?php } else{
    foreach($data['order_list'] as $key => $order){ ?>
    <div class="border-1 mb-5 md:mb-8 bg-gray-200 bg-opacity-50 divide-y-2 text-left ">
        <div class="flex justify-between items-center px-8 py-5 bg-gray-200 bg-opacity-50">
            <div class="flex ">
                <h2 class="text-xl font-bold mr-2">Order: #<?php echo $order['order_code']?> <span class=" text-sm font-medium text-gray-500"><?php echo $order['order_date']?></span></h2>
                
            </div>
            <div>
                <h3 class="text-xl font-medium text-gray-500 text-opacity-90">Total: <span class="font-semibold text-2xl text-red-600"><?php echo number_format($order['order_total'],0,',', '.') ?>đ</span></h3>
            </div>
        </div>
        <div class="flex justify-between flex-col md:flex-row p-8 md:p-4 lg:p-8 bg-white">
            <div class=" w-full lg:w-1/3  mb-4">
                <h3 class="text-2xl font-bold mb-5 text-orange-600">Product</h3>
                <ul class="list-square list-inside text-md font-medium text-gray-700 text-opacity-90">
                <?php 
                 foreach($order['product_list'] as $key => $product) { ?>    
                <li class="mb-1"><?php echo $product['title_product']?>, qty:<?php echo $product['product_quantity']?></li>
                <?php } ?>
                </ul>
            </div>
            <div class=" w-full lg:w-1/3 mb-4"> 
                <h3 class="text-2xl font-bold mb-5 text-orange-600">Shipping info</h3>
                <ul class="list-inside text-md font-medium text-gray-700 text-opacity-90">
                    <li>Name: <?php echo $order['customer_name']?></li>
                    <li>Phone: <?php echo $order['customer_phone']?></li>
                    <li>Address:<?php echo $order['delivery_address']?></li>
                </ul>
            </div>
            <div class="  w-full lg:w-1/3 mb-4">
                <h3 class=" text-2xl font-bold mb-5 ml-0 lg:ml-9 text-orange-600">Order status</h3>
                <div class="py-2 lg:py-6 px-0 lg:px-3">
                  <div class="flex">
                    <div class="w-1/3 flex flex-col items-center px-2">
                        <div class="mb-2 bg-green-600 text-white flex items-center justify-center rounded-full" style="width: 38px; height: 38px">
                            <i class="fa-solid fa-clipboard-check"></i>
                        </div>
                        <div class="w-full flex flex-col items-center justify-center">
                          <h2 class="font-bold text-sm">Confirm</h2>
                        </div>
                    </div>
                    <div class="flex-1 flex items-center justify-center">
                    <i class="fa-solid fa-arrow-right-long"></i>
                    </div>
                    <div class="w-1/3 flex flex-col items-center px-2">
                        <div class="mb-2 bg-gray-200 border-2 flex items-center justify-center rounded-full" style="width: 38px; height: 38px">
                        <i class="fa-solid fa-truck-fast"></i>
                        </div>
                        <div class="w-full flex flex-col items-center justify-center">
                          <h2 class="font-bold text-sm">Shipping</h2>
                        </div>
                    </div>
                    <div class="flex-1 flex items-center justify-center">
                    <i class="fa-solid fa-arrow-right-long"></i>
                    </div>
                    <div class="w-1/3 flex flex-col items-center px-2">
                        <div class="mb-2 bg-gray-200 border-2 flex items-center justify-center rounded-full" style="width: 38px; height: 38px">
                        <i class="fa-solid fa-money-bill"></i>
                        </div>
                        <div class="w-full flex flex-col items-center justify-center">
                          <h2 class="font-bold text-sm">Payment</h2>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <?php }} ?>
</div>