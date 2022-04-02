<div class="main py-4 px-4 md:px-12 lg:px-28 bg-zinc-100">
        <span class="text-zinc-400 font-base hover:text-amber-400">
        <a href="<?php echo BASE_URL ?>">Home Page</a></span
        >
        <span class="text-zinc-900 font-bold"
          ><i class="fa-solid fa-angle-right"></i> Blog</span
        >
      </div>
      <div
        class="px-4 w-full md:px-12 lg:px-28 py-4 lg:py-14 flex flex-col-reverse lg:flex-row"
      >
        <div class="w-full lg:w-4/6 pr-0 lg:pr-16 lg:border-r-1">
          <?php foreach($data['post_list'] as $key => $post) { ?>
          <div class="w-full mb-8">
            <div>
              <img
                src="<?php echo BASE_URL?>/public/uploads/post/<?php echo $post['image_post'] ?>"
                class="w-full h-64 md:h-80 lg:h-96"
              />
            </div>
            <div class="pt-3 pb-1 border-b-1">
              <span class="block mb-2 opacity-80"
                ><i class="fa-regular fa-calendar-days mr-2"></i>September 11,
                2020</span
              >
              <h2 class="text-3xl font-bold mb-2">
                <a href="<?php echo BASE_URL?>/blog/blogdetail/<?php echo $post['id_post']?>"><?php echo $post['title_post'] ?></a>
              </h2>
              <p class="mb-2 text-gray-600 font-base">
                <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa
                nemo officiis, minima saepe maiores ex deserunt assumenda a
                numquam! Aperiam cum harum ipsam quam magnam. Consequatur beatae
                cum architecto tempora rerum -->
                <?php echo substr($post['content_post'], 0, 320) ?>...
              </p>
              <span
                class="py-1 border-amber-500 border-b-2 hover:text-amber-500"
              >
                <a href="<?php echo BASE_URL ?>/blog/blogdetail/<?php echo $post['id_post'] ?>">Read more +</a> 
              </span>
            </div>
          </div>
         <?php } ?>
          <div class="nav-page mt-6">
          <ul class="flex">
                <?php for($i=1; $i<=ceil((sizeof($data['max_page'])/8)); $i++){ ?>
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
                  ?>
                  <a href="<?php echo $data_link ?>"><?php echo $i ?></a> </li>
                <?php } ?>
              </ul>
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
              <li class="mb-2 <?php echo $active_cate == $cate_post['id_category_post'] ? 'text-amber-500' : 'text-black'?>"><span class=" hover:text-amber-500"><a href="<?php echo BASE_URL?>/blog/categoryblog/<?php echo $cate_post['id_category_post'] ?>"><?php echo $cate_post['title_category_post'] ?></a></span></li>
              <?php } ?>
            </ul>
          </div>
          <div class="pb-8">
            <span
              class="text-xl mb-3 font-semibold block py-3 border-b-1 relative after:content[''] after:w-20 after:h-0.5 after:bg-amber-500 after:absolute after:bottom-0 after:left-0"
              >Latest Posts</span
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