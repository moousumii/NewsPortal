<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php include_once 'shared/html_header.php'; ?>
    <body>
        <div id="body_content">
            <!-- Header -->
            <div id="header">
                <div class="container">

                    <div class="loginInfos">
                        <div class="fl_left"><strong><?=date('l F d, Y') ?></strong></div>
                        <div class="fl_right">
                            <?php if (common::is_logged_in()): ?>
                                You're logged in as <strong><?=$this->session->userdata('full_name')?></strong>.
                            <a href="<?=site_url('login/logout') ?>" title="Log out">Log out</a>
                            <?php else : ?> 
                                <a href="<?=site_url('login') ?>" title="Login">Login</a>
                            <?php endif; ?>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <!-- /Header -->

            <?php include_once 'shared/header.php'; ?>
                            <div class="content">
                <?php
                            if (count($nav_array) > 0) {
                                echo common::nav_menu_link($nav_array);
                            } ?>
<?php include_once $dir . '/' . $page . '.php'; ?>

                        </div>
<?php include_once 'shared/footer.php'; ?>
        </div>
    </body>
</html>