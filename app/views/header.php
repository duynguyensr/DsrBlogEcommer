<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../../public/icon/icon-shop.png" type="image/ico">
    <title>DSRBlogs</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
      integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"
      integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
      integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
      integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/css/shopstyle.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/css/style.css?v=<?php echo time(); ?>" />

    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              clifford: "#da373d",
            },
          },
          backgroundSize: {
            auto: "auto",
            cover: "cover",
            contain: "contain",
            80: "80%",
            16: "4rem",
          },
          borderWidth: {
            1: "1px",
            0: "0",
            2: "2px",
            3: "3px",
            4: "4px",
            6: "6px",
            8: "8px",
          },
          listStyleType: {
            none: "none",
            disc: "disc",
            decimal: "decimal",
            square: "square",
            roman: "upper-roman",
          },
        },
      };
    </script>
    <style type="text/tailwindcss">
      @layer utilities {
        .content-auto {
          content-visibility: auto;
        }
      }
    </style>
  </head>
  <body>
    <main class="w-full">
      <div
        class="nav flex justify-between items-center py-4 px-5 lg:px-32 h-24 relative"
      >
        <div class="menu logo text-2xl lg:hidden">
          <i class="fa-solid fa-bars"></i>
        </div>
        <div class="logo">
          <h3 class="text-3xl md:text-4xl" style="font-family: Alfa Slab One, sans-serif;">DSRBlogs</h3>
        </div>
        <div class="logo text-2xl lg:hidden">
        <a href='<?php echo BASE_URL ?>/cart/mycart'><i class="fa-solid fa-cart-shopping text-2xl"></i></a>
        </div>
        <div class="search-box w-2/5 hidden lg:block">
          <form action="<?php echo BASE_URL?>/shop/searchproduct" class="w-full relative">
            <input
              type="text"
              placeholder="Search products"
              class="w-full h-12 px-4 text-sm bg-gray-100"
              name="search"
            />
            <button type="submit" class="absolute right-2 top-3">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          </form>
        </div>
        <div class="hidden lg:flex h-10">
          <div class="flex items-center px-5 border-r-2 border-gray-200">
            <div><i class="fa-regular fa-heart text-2xl"></i></div>
            <div class="flex flex-col ml-3">
              <span class="text-md">Wish list</span>
              <span class="text-sm font-bold">2 Items</span>
            </div>
          </div>
          <div class="flex p-3 px-5 items-center">
            <div><a href='<?php echo BASE_URL ?>/cart/mycart'><i class="fa-solid fa-cart-shopping text-2xl"></i></a></div>
            <div class="flex flex-col ml-3">
              <span class="text-md"><a href="<?php echo BASE_URL ?>/cart/mycart">My cart</a> </span>
              <span class="text-sm font-bold">
                <?php 
                $total = 0;
                if(isset($_SESSION['shopping_cart'])){
                  $cart = $_SESSION['shopping_cart'];
                  foreach($cart as $key => $value){
                    $total += $value['price_product'] * $value['quantity_product'];
                  }
                  echo number_format($total, 0, ',', '.');
                  }
                  else{
                    echo $total;
                  }
                ?>đ</span>
            </div>
          </div>
        </div>
        <div class="sub-menu relative p-4 text-lg bg-zinc-900">
          <i
            class="text-2xl fa-solid fa-xmark absolute top-2 right-3 close-menu"
          ></i>
          <ul>
            <li
              class="w-full border-b-2 hover:text-amber-500 border-gray-300 py-4 px-2"
            >
              <a href="<?php echo BASE_URL ?>" >Home</a>
            </li>
            <li
              class="w-full border-b-2 hover:text-amber-500 border-gray-300 py-4 px-2"
            >
            <a href="<?php echo BASE_URL ?>/shop/productlist" >Shop</a>
            </li>
            <li
              class="w-full border-b-2 hover:text-amber-500 border-gray-300 py-4 px-2"
            >
            <a href="<?php echo BASE_URL ?>/blog/bloglist" >Blogs</a>

            </li>
            <li
              class="w-full border-b-2 hover:text-amber-500 border-gray-300 py-4 px-2"
            >
            <a href="<?php echo BASE_URL ?>/customer/account" >Account</a>
            </li>
            <li
              class="w-full border-b-2 hover:text-amber-500 border-gray-300 pt-4 pb-2 px-2"
            >
              <div class="search-container">
                <form action="<?php echo BASE_URL?>/shop/searchproduct" class="flex">
                  <input
                    type="text"
                    placeholder="Search..."
                    name="search"
                    class="w-full p-0 bg-transparent border-none focus:outline-none text-amber-500 focus:ring-0 placeholder-gray-100"
                  />
                  <button type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                  </button>
                </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="nav-2 w-full h-14 hidden lg:block bg-zinc-800 flex items-center">
        <ul class="ml-28 hidden lg:flex h-full">
          <li
            class="mr-10 h-full group relative text-white transform duration-300 after:duration-300 hover:text-amber-500 text-lg"
          >
            <a
              href="<?php echo BASE_URL ?>"
              class="h-full flex items-center font-medium before:w-0 before:h-1 before:absolute before:bottom-0 before:left-0 before:bg-amber-500 before:transition-all before:duration-300 hover:before:w-full hover:before:bg-amber-500"
              >HOME +</a
            >
            
          </li>
          <li
            class="mr-10 h-full group relative text-white transform duration-300 after:duration-300 hover:text-amber-500 text-lg"
          >
            <a
              href="<?php echo BASE_URL ?>/shop/productlist"
              class="h-full flex items-center font-medium before:w-0 before:h-1 before:absolute before:bottom-0 before:left-0 before:bg-amber-500 before:transition-all before:duration-300 hover:before:w-full hover:before:bg-amber-500"
              >SHOP +</a
            >
            <div
              class="w-48 absolute bg-gray-200 top-100 text-gray-500 p-4 hidden group-hover:block"
            >
              <ul>
                  <?php foreach($data['category'] as $key => $cate){ ?>
                <li
                  class="flex group items-center text-lg hover:text-black cursor-pointer"
                >
                
                  <span
                    class="w-1 h-1 mr-2 hidden group-hover:block bg-amber-500"
                  ></span>
                  <a href="<?php echo BASE_URL?>/shop/categoryproduct/<?php echo $cate['id_category_product'] ?>"><?php echo $cate['title_category_product'] ?></a>
                </li>
                <?php } ?>
                
              </ul>
            </div>
          </li>
          <li
            class="mr-10 h-full group relative text-white transform duration-300 after:duration-300 hover:text-amber-500 text-lg"
          >
            <a
              href="<?php echo BASE_URL ?>/blog/bloglist"
              class="h-full flex items-center font-medium before:w-0 before:h-1 before:absolute before:bottom-0 before:left-0 before:bg-amber-500 before:transition-all before:duration-300 hover:before:w-full hover:before:bg-amber-500"
              >BLOGS +</a
            >
          </li>
          <li
            class="mr-10 h-full group relative text-white transform duration-300 after:duration-300 hover:text-amber-500 text-lg"
          >
            <a
              href="<?php echo BASE_URL ?>/customer/account"
              class="h-full flex items-center font-medium before:w-0 before:h-1 before:absolute before:bottom-0 before:left-0 before:bg-amber-500 before:transition-all before:duration-300 hover:before:w-full hover:before:bg-amber-500"
              >ACCOUNT +</a
            >
          </li>
        </ul>
      </div>