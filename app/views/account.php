<div class="main py-4 px-4 md:px-12 lg:px-28 bg-zinc-100">
        <span class="text-zinc-400 font-base hover:text-amber-400">
          <a href="<?php echo BASE_URL?>">Home Page</a></span
        >
        <span class="text-zinc-900 font-bold"
          ><i class="fa-solid fa-angle-right"></i> My account</span
        >
      </div>
      
      <div class="px-3 md:px-8 lg:px-28 py-14">
        <?php
        // echo '<br>';
        // echo '<span style="color: blue; font-size: 30px">'.$data['msg'].'</span>'; 
        if(!empty($_GET['msg'])){
            $msg = unserialize($_GET['msg']);
            $status = $_GET['status'] == 1 ? 'bg-red-100 border-red-500 dark:bg-red-200' : 'bg-green-100 border-t-4  border-green-500 dark:bg-green-200';
            $text_color = $_GET['status'] == 1 ? 'text-red-700' : 'text-green-700';
            echo '<div id="alert-border-3" class="alert flex p-4 mb-4 border-t-4 '.$status.'  role="alert">
            <svg class="flex-shrink-0 '.$text_color.' w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div class="ml-3 text-lg '.$text_color.' font-medium">'.$msg.
            '</div>
            </div>';
        }
        ?>
          <?php if(Session::get('customer_login') == true){ ?>
            <div
            class="w-full p-4 md:p-8 flex items-start justify-center"
          >
            <form class="w-full lg:w-4/5 pr-0 md:pr-4 lg:pr-16 py-4" action="<?php echo BASE_URL?>/customer/updateaccount" method="post">
            <p class="text-lg hover:text-red-700 hover:underline underline-offset-2"><a href="<?php echo BASE_URL ?>/customer/logout">Đăng xuất</a></p>
            <p class="text-lg hover:text-red-700 hover:underline underline-offset-2"><a href="<?php echo BASE_URL ?>/customer/myorder">View my orders</a></p>
              <h1 class="text-2xl mb-2 font-bold">Account detail</h1>
              <label for="username" class="text-base font-normal"
                >User name <span class="text-red-600">*</span></label
              ><br />
              <input
                type="text"
                name="username"
                value="<?php echo $data['customer_info'][0]['customer_name'] ?>"
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
              >Phone number <span class="text-red-600">*</span></label
              ><br />
              <input
              type="text"
              name="phone"
              value="<?php echo $data['customer_info'][0]['customer_phone'] ?>"
              required
              class="w-full my-2 h-14 border-1 border-zinc-200 focus:ring-0 focus:border-red-500"
              /><br />
              <h3 class="text-xl my-4 font-semibold">Change password</h3>
              <label for="current_password"
                >Current password (leave blank to leave unchanged)</label
              ><br />
              <input
                type="password"
                name="current_password"
                class="w-full my-2 h-14 border-1 border-zinc-200 focus:ring-0 focus:border-red-500"
              /><br />
              <label for="password"
                >New password (leave blank to leave unchanged)</label
              ><br />
              <input
                type="password"
                name="new_password"
                class="w-full my-2 h-14 border-1 border-zinc-200 focus:ring-0 focus:border-red-500"
              /><br />
              <label for="password"
                >Confirm new password</label
              ><br />
              <input
                type="password"
                name="confirm_password"
                class="w-full my-2 h-14 border-1 border-zinc-200 focus:ring-0 focus:border-red-500"
              /><br />
              <p class="text-sm font-medium text-black text-opacity-60">
                Your personal data will be used to support your experience
                throughout this website, to manage access to your account, and
                for other purposes described in our privacy policy.
              </p>
              <button
                type="submit"
                class="w-full px-12 py-4 mt-6 text-white font-bold"
                style="background-color: red"
              >
                Update account information
              </button>
            </form>
          </div>
            <?php } else{?>
        <div class="flex flex-col md:flex-row">
          <div
            class="w-full md:w-2/4 px-0 lg:px-4 flex items-start justify-center border-r-0 md:border-r-1"
          >
            <form
                autocomplete="off"
                action="<?php echo BASE_URL?>/customer/login" method="post"
              class="w-full md:w-5/6 lg:w-4/5 px-4 md:px-8 py-6 md:py-12 bg-zinc-200 bg-opacity-30"
            >
              <h1 class="text-2xl mb-2 font-bold">Login</h1>
              <label for="username" class="text-base font-normal"
                >User name <span class="text-red-600">*</span></label
              ><br />
              <input
                type="text"
                name="username"
                required
                class="w-full my-2 h-14 border-1 border-zinc-200 focus:ring-0 focus:border-red-500"
              /><br />
              <label for="password"
                >Password <span class="text-red-600">*</span></label
              ><br />
              <input
                type="password"
                name="password"
                required
                class="w-full my-2 h-14 border-1 border-zinc-200 focus:ring-0 focus:border-red-500"
              /><br />
              <button
                type="submit"
                class="w-full px-12 py-4 mt-6 text-white font-bold"
                style="background-color: red"
              >
                Log in
              </button>
            </form>
          </div>
          <div
            class="w-full md:w-2/4 p-4 md:p-8 flex items-start justify-center"
          >
            <form class="w-full md:w-5/6 lg:w-4/5 pr-0 md:pr-4 lg:pr-16 py-4" action="<?php echo BASE_URL?>/customer/register" method="post">
              <h1 class="text-2xl mb-2 font-bold">Register</h1>
              <label for="username" class="text-base font-normal"
                >User name <span class="text-red-600">*</span></label
              ><br />
              <input
                type="text"
                name="username"
                required
                class="w-full my-2 h-14 border-1 border-zinc-200 focus:ring-0 focus:border-red-500"
              /><br />
              <label for="password"
                >Password <span class="text-red-600">*</span></label
              ><br />
              <input
                type="password"
                name="password"
                required
                class="w-full my-2 h-14 border-1 border-zinc-200 focus:ring-0 focus:border-red-500"
              /><br />
              <label for="username" class="text-base font-normal"
                >Address <span class="text-red-600">*</span></label
              ><br />
              <input
                type="text"
                name="address"
                required
                class="w-full my-2 h-14 border-1 border-zinc-200 focus:ring-0 focus:border-red-500"
              /><br />
              <label for="username" class="text-base font-normal"
                >Email <span class="text-red-600">*</span></label
              ><br />
              <input
                type="text"
                name="email"
                required
                class="w-full my-2 h-14 border-1 border-zinc-200 focus:ring-0 focus:border-red-500"
              /><br />
              <label for="username" class="text-base font-normal"
                >Phone number <span class="text-red-600">*</span></label
              ><br />
              <input
                type="text"
                name="phone"
                required
                class="w-full my-2 h-14 border-1 border-zinc-200 focus:ring-0 focus:border-red-500"
              /><br />
              <p class="text-sm font-medium text-black text-opacity-60">
                Your personal data will be used to support your experience
                throughout this website, to manage access to your account, and
                for other purposes described in our privacy policy.
              </p>
              <button
                type="submit"
                class="w-full px-12 py-4 mt-6 text-white font-bold"
                style="background-color: red"
              >
                Register
              </button>
            </form>
          </div>
        </div>
        <?php } ?>
      </div>