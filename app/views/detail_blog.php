<div class=" main py-4 px-4 md:px-12 lg:px-28 bg-zinc-100">
        <span class="text-zinc-400 font-base hover:text-amber-400">
          <a href="<?php echo BASE_URL ?>">Home Page</a></span
        >
        <span class="text-zinc-900 font-bold"
          ><i class="fa-solid fa-angle-right"></i> Blog</span
        >
</div>
      <div
        class=" px-4 w-full md:px-12 lg:px-28 py-4 lg:py-14 flex flex-col lg:flex-row"
      >
        <div class="blog-detail w-full mb-4 lg:w-4/6 pr-0 lg:pr-8 lg:border-r-1 z-0">
          <div class="w-full">
            <div class="pt-3 pb-1">
              <span class="block mb-2 opacity-80"
                ><i class="fa-regular fa-calendar-days mr-2"></i>September 11,
                2020</span>
              <h2 class="text-2xl md:text-3xl mb-2 font-bold "><?php echo $data['post_detail'][0]['title_post'] ?></h2>
            </div>
            <div class="content-blog flex flex-col items-center text-black opacity-90 w-full text-lg">
              <?php echo $data['post_detail'][0]['content_post'] ?>
            </div>
          </div>
        </div>
        <div class="w-full lg:w-2/6 px-1 lg:px-16">
          <div class="mb-2">
            <span
              class="text-xl mb-3 font-semibold block py-3 border-b-1 relative after:content[''] after:w-20 after:h-0.5 after:bg-amber-500 after:absolute after:bottom-0 after:left-0"
              >Categories</span
            >
            <ul class="list-inside list-square">
            <?php $url = explode('/', $_GET['url']); 
                    $active_cate = 0;
                    if(isset($url[2]) && $url[2] != 'page'){
                      $active_cate = $url[2];
                    }
                    ?>
              <li class="mb-2 <?php echo $active_cate == 0 ? 'text-amber-500' : 'text-black'?>"><span class="hover:text-amber-500"><a href="<?php echo BASE_URL?>/blog/bloglist">All</a></span></li>
              <?php foreach($data['category_post'] as $key => $cate_post){ ?>
              <li class="mb-2 "><span class="<?php echo $active_cate == $cate_post['id_category_post'] ? 'text-amber-500' : 'text-black'?> hover:text-amber-500"><a href="<?php echo BASE_URL?>/blog/categoryblog/<?php echo $cate_post['id_category_post'] ?>"><?php echo $cate_post['title_category_post'] ?></a></span></li>
              <?php } ?>
            </ul>
          </div>
          <div class="pb-8">
            <span
              class="text-xl mb-3 font-semibold block py-3 border-b-1 relative after:content[''] after:w-20 after:h-0.5 after:bg-amber-500 after:absolute after:bottom-0 after:left-0"
              >May be interested</span
            >
            <div class="divide-y-1">
            <?php foreach($data['more_post'] as $key => $post) { ?>
              <div class="flex py-4 h-32">
                <div class="w-2/6 h-full">
                  <img
                    src="<?php echo BASE_URL ?>/public/uploads/post/<?php echo $post['image_post'] ?>"
                    alt=""
                    class="w-full h-full"
                  />
                </div>
                <div class="w-4/6 px-2">
                  <h3 class="text-base font-semibold mb-2">
                  <a href="<?php echo BASE_URL?>/blog/blogdetail/<?php echo $post['id_post'] ?>"><?php echo substr($post['title_post'], 0, 50) ?>...</a>
                  </h3>
                  <span class="block mb-2 text-sm font-normal opacity-80"
                    ><i class="fa-regular fa-calendar-days mr-2"></i>September
                    11, 2020</span
                  >
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>