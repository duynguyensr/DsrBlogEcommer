<div class="footer w-full py-7 px-14 text-white text-lg bg-zinc-900">
        <ul
          class="w-full flex flex-col md:flex-row justify-between items-center duration-300 ease"
        >
          <li
            class="mb-3 lg:mb-0 cursor-pointer hover:text-amber-500 text-3xl font-bold"
          >
          <a href="<?php echo BASE_URL?>"><h3 class="text-3xl" style="font-family: Alfa Slab One, sans-serif;">DSRBlogs</h3></a>
          </li>
          <li class="mb-3 lg:mb-0 cursor-pointer hover:text-amber-500">
            <a href="https://mellifluous-bublanina-5d1295.netlify.app/" target="blank">Another project</a>
          </li>
          <li class="mb-3 lg:mb-0 cursor-pointer hover:text-amber-500">
            Email: duyquangsr@gmail.com
          </li>
          <li class="mb-3 lg:mb-0 cursor-pointer hover:text-amber-500">
            Phone: (+84)779050975
          </li>
        </ul>
      </div>
    </main>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init({
        duration: 1000,
      });
    </script>
    <script>
      $(".owl-one").owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        navigation: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 10000,
        autoplaySpeed: 1000,
        responsive: {
          0: {
            items: 1,
          },
        },
      });
    </script>
    <script>
      $(".owl-two").owlCarousel({
        loop: true,
        margin: 40,
        dots: true,
        autoplay: false,
        autoplayTimeout: 10000,
        autoplaySpeed: 1000,
        responsive: {
          0: {
            items: 1,
          },
          800: {
            items: 2,
          },
          1020: {
            items: 3,
          },
        },
      });
    </script>
    <script>
      $(".owl-product").owlCarousel({
        loop: true,
        margin: 10,
        dots: true,
        dotsEach: 1,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplaySpeed: 1000,
        responsive: {
          0: {
            items: 2,
          },
          600: {
            items: 3,
          },
          1020: {
            items: 3,
          },
        },
      });
    </script>
    <script src="<?php echo BASE_URL ?>/public/js/script.js?v=<?php echo time(); ?>"></script>
    <script src="<?php echo BASE_URL ?>/public/js/shop.js?v=<?php echo time(); ?>"></script>
    <script src="<?php echo BASE_URL ?>/public/js/product.js?v=<?php echo time(); ?>"></script>

  </body>
</html>
