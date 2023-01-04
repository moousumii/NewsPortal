<?php if (common::is_logged_in()):?>
    <div class="top_menu">
        <ul class="sf-menu">
            <li><a href="<?=site_url('home') ?>" title='Home' class="white">Home</a></li>
            <li class="current"> <a href="<?=site_url('admin')?>" class="white">Admin</a></li>

            <li class="current"><a href="<?=  site_url('home')?>" class="white">Settings</a>
                <ul>
                    <li><a href="<?=site_url('admin/change_password') ?>">Password Settings</a></li>
                    <li><a href="<?=site_url('ads') ?>">Advertise Settings</a></li>
                    <li><a href="<?=site_url('region') ?>">Region Settings</a></li>
                     <li><a href="<?=site_url('Reporter') ?>">Reporter Settings</a></li>
<!--                    <li class="round"><a href="<?=site_url('site_user/all_users') ?>">Site Users</a></li>-->
                </ul>
            </li>           
<!--            <li class="current"> <a href="<?=site_url('slider')?>" class="white">Slider</a></li>-->
            <li class="current"><a href="<?=site_url('news')?>" class="white">News Category</a>
            </li>
			  <li class="current"><a href="<?=site_url('news/news_list')?>" class="white">News</a>
            </li>
            <li class="current"><a href="#" class="white">Gallery</a>
                <ul>
                    <li><a href="<?= site_url('gallary') ?>">Image Gallery</a></li>
                    <li><a href="<?= site_url('gallary/my_videos') ?>">Video Gallery</a></li>
                </ul>
            </li>
             <li class="current"><a href="<?=  site_url('ads')?>" class="white">Adds</a></li>
            <!--<li class="current"><a href="<?=site_url('seo')?>" class="white">Seo</a></li>-->
    
            
        </ul>
    </div>
    <div class="clear"></div>
    <?php endif; ?>