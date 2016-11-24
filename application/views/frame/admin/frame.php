<!DOCTYPE html>
<html lang="zh">
  <head>
    <?php echo isset ($meta_list) ? $meta_list : ''; ?>

    <title><?php echo isset ($title) ? $title : ''; ?></title>

<?php echo isset ($css_list) ? $css_list : ''; ?>

<?php echo isset ($js_list) ? $js_list : ''; ?>

  </head>
  <body lang="zh-tw">
    <?php echo isset ($hidden_list) ? $hidden_list : ''; ?>

    <div id='container' class=''>
      <div id='main_row'>
        <div id='left_side'>
          
          <header>
            <a href='<?php echo base_url ();?>'>Ｚ</a>
            <span>Zeus Design Studio!</span>
          </header>

          <div id='login_user'>
            <figure class='_i'>
              <img src="<?php echo User::current ()->avatar ();?>">
            </figure>
            <div>
              <span>Hi, 您好!</span>
              <span><?php echo User::current ()->name;?></span>
            </div>
          </div>

          <ul id='main_menu'>
      <?php if (User::current ()->in_roles (array ('member'))) { ?>
              <li>
                <label data-cnt='<?php echo ($schedule_cnt = Schedule::count (array ('conditions' => array ('user_id = ? AND finish = ? AND year = ? AND month = ? AND day = ?', User::current ()->id, Schedule::NO_FINISHED, date ('Y'), date ('m'), date ('d')))));?>'>
                  <input type='checkbox' />
                  <span class='icon-se'>個人管理</span>
                  <ul>
                    <li><a href="<?php echo $url = base_url ('admin', 'my');?>" class='icon-u<?php echo $now_url == $url ? ' active' : '';?>'>基本資料</a></li>
                    <li><a href="<?php echo $url = base_url ('admin', 'schedule-tags');?>" class='icon-ta<?php echo $now_url == $url ? ' active' : '';?>'>行程分類</a></li>
                    <li data-cnt='<?php echo $schedule_cnt;?>'><a href="<?php echo $url = base_url ('admin', 'calendar');?>" class='icon-calendar2<?php echo $now_url == $url ? ' active' : '';?>'>個人行程</a></li>
                    <li><a href="<?php echo $url = base_url ('admin', 'all-calendar');?>" class='icon-calendar<?php echo $now_url == $url ? ' active' : '';?>'>全部行程</a></li>
                    <!-- <li><a href="<?php echo $url = base_url ('admin', 'my-salaries');?>" class='icon-moneybag<?php echo $now_url == $url ? ' active' : '';?>'>我的宙思幣</a></li> -->
                  </ul>
                </label>
              </li>
      <?php }
            if (User::current ()->in_roles (array ('user'))) { ?>
              <li>
                <label>
                  <input type='checkbox' />
                  <span class='icon-u'>會員系統</span>
                  <ul>
                    <li><a href="<?php echo $url = base_url ('admin', 'users');?>" class='icon-ua<?php echo $now_url == $url ? ' active' : '';?>'>權限設定</a></li>
                  </ul>
                </label>
              </li>
      <?php }
            if (User::current ()->in_roles (array ('site'))) { ?>
              <li>
                <label data-cnt='<?php echo ($contact_cnt = Contact::count (array ('conditions' => array ('is_readed = ?', Contact::READ_NO))));?>'>
                  <input type='checkbox' />
                  <span class='icon-ea'>前台系統</span>
                  <ul>
                    <li><a href="<?php echo $url = base_url ('admin', 'banners');?>" class='icon-im<?php echo $now_url == $url ? ' active' : '';?>'>旗幟管理</a></li>
                    <li><a href="<?php echo $url = base_url ('admin', 'promos');?>" class='icon-im<?php echo $now_url == $url ? ' active' : '';?>'>促銷管理</a></li>
                    <li data-cnt='<?php echo $contact_cnt;?>'><a href="<?php echo $url = base_url ('admin', 'contacts');?>" class='icon-em<?php echo $now_url == $url ? ' active' : '';?>'>聯絡我們</a></li>
                    <!-- <li><a href="<?php echo $url = base_url ('admin', 'deploys');?>" class='icon-pi<?php echo $now_url == $url ? ' active' : '';?>'>部署紀錄</a></li> -->
                  </ul>
                </label>
              </li>
      <?php }
            if (User::current ()->in_roles (array ('article'))) { ?>
              <li>
                <label>
                  <input type='checkbox' />
                  <span class='icon-f'>文章系統</span>
                  <ul>
                    <li><a href="<?php echo $url = base_url ('admin', 'article-tags');?>" class='icon-ta<?php echo $now_url == $url ? ' active' : '';?>'>文章分類</a></li>
                    <li><a href="<?php echo $url = base_url ('admin', 'articles');?>" class='icon-fa<?php echo $now_url == $url ? ' active' : '';?>'>文章管理</a></li>
                  </ul>
                </label>
              </li>
      <?php }
            if (User::current ()->in_roles (array ('work'))) { ?>
              <li>
                <label>
                  <input type='checkbox' />
                  <span class='icon-g'>作品系統</span>
                  <ul>
                    <li><a href="<?php echo $url = base_url ('admin', 'work-tags');?>" class='icon-ta<?php echo $now_url == $url ? ' active' : '';?>'>作品分類</a></li>
                    <li><a href="<?php echo $url = base_url ('admin', 'works');?>" class='icon-g<?php echo $now_url == $url ? ' active' : '';?>'>作品管理</a></li>
                  </ul>
                </label>
              </li>
      <?php }
            if (false && User::current ()->in_roles (array ('customer'))) { ?>
              <li>
                <label>
                  <input type='checkbox' />
                  <span class='icon-b'>聯絡人系統</span>
                  <ul>
                    <li><a href="<?php echo $url = base_url ('admin', 'customer-companies');?>" class='icon-br<?php echo $now_url == $url ? ' active' : '';?>'>聯絡人公司</a></li>
                    <li><a href="<?php echo $url = base_url ('admin', 'customers');?>" class='icon-ab<?php echo $now_url == $url ? ' active' : '';?>'>聯絡人管理</a></li>
                  </ul>
                </label>
              </li>
      <?php } 
            if (false && User::current ()->in_roles (array ('invoice'))) { ?>
              <li>
                <label>
                  <input type='checkbox' />
                  <span class='icon-ti'>請款系統</span>
                  <ul>
                    <li><a href="<?php echo $url = base_url ('admin', 'invoice-tags');?>" class='icon-ta<?php echo $now_url == $url ? ' active' : '';?>'>請款分類</a></li>
                    <li><a href="<?php echo $url = base_url ('admin', 'invoices');?>" class='icon-ti<?php echo $now_url == $url ? ' active' : '';?>'>請款管理</a></li>
                  </ul>
                </label>
              </li>
      <?php } 
            if (false && User::current ()->in_roles (array ('bills'))) { ?>
              <li>
                <label>
                  <input type='checkbox' />
                  <span class='icon-bil'>帳務系統</span>
                  <ul>
                    <li><a href="<?php echo $url = base_url ('admin', 'billins');?>" class='icon-ib<?php echo $now_url == $url ? ' active' : '';?>'>入帳管理</a></li>
                    <li><a href="<?php echo $url = base_url ('admin', 'billous');?>" class='icon-ob<?php echo $now_url == $url ? ' active' : '';?>'>出帳管理</a></li>
                  </ul>
                </label>
              </li>
      <?php }
            if (false && User::current ()->in_roles (array ('project'))) { ?>
              <li>
                <label>
                  <input type='checkbox' />
                  <span class='icon-fs'>專案系統</span>
                  <ul>
                    <li><a href="<?php echo $url = base_url ('admin', 'ftps');?>" class='icon-sev<?php echo $now_url == $url ? ' active' : '';?>'>FTP 管理</a></li>
                  </ul>
                </label>
              </li>
      <?php }
            if (false && User::current ()->in_roles (array ('salary'))) { ?>
              <li>
                <label>
                  <input type='checkbox' />
                  <span class='icon-moneybag'>薪資系統</span>
                  <ul>
                    <li><a href="<?php echo $url = base_url ('admin', 'salaries');?>" class='icon-moneybag<?php echo $now_url == $url ? ' active' : '';?>'>薪資管理</a></li>
                  </ul>
                </label>
              </li>
      <?php } ?>

          </ul>

        </div>
        <div id='right_side'>
          <div id='top_side'>
            <button type='button' id='hamburger' class='icon-m'></button>
            <span>
              <a href='<?php echo base_url ('logout');?>' class='icon-o'></a>
            </span>
          </div>
          <div id='main'>
      <?php if ($_flash_danger = Session::getData ('_flash_danger', true)) { ?>
              <div id='_flash_danger'><?php echo $_flash_danger;?></div>
      <?php } else if ($_flash_info = Session::getData ('_flash_info', true)) { ?>
              <div id='_flash_info'><?php echo $_flash_info;?></div>
      <?php }?>
      <?php echo isset ($content) ? $content : ''; ?>
          </div>
          <div id='bottom_side'>
            後台版型設計 by 宙思 <a href='http://www.ioa.tw/' target='_blank'>OA Wu</a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>