<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<!-- Page Title -->
    <title>শুভ সকাল</title>

    <!-- Fonts CSS -->
	  <link rel="stylesheet" href="<?php echo base_url('assets/css/web-fonts-with-css/css/fontawesome-all.min.css');?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
    <!-- Other CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.theme.default.min.css');?>">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css');?>">
</head>

<body>
    <!-- ========================< Top Bar Part Start >====================== -->
    <section class="top-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6 social-link">
                            <ul>
                                <li>
                                  <a target="_blank" href="https://www.facebook.com/Dainik-Shuvosokal-%E0%A6%A6%E0%A7%88%E0%A6%A8%E0%A6%BF%E0%A6%95-%E0%A6%B6%E0%A7%81%E0%A6%AD-%E0%A6%B8%E0%A6%95%E0%A6%BE%E0%A6%B2-2061457077403643/?modal=admin_todo_tour">
                                    <i class="fab fa-facebook-f"></i>
                                  </a>
                                </li>
                                <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                                <li class="email"><a href="email@gmail.com"><i class="far fa-envelope"></i> email@gmail.com</a></li>
                                <li class="phone"><a href=""><i class="fas fa-phone"></i> +880123456789</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 date-time"> 
                            <ul>
                                <li><i class="far fa-calendar-alt"></i><?php echo common::getBanglaDate(date(" j F , Y, l "));?> </li>
                                <!-- <li class="time"><i class="far fa-clock"></i>
                                  <?php
                                    
                                    
                                  ?>
                                 0১:১0 মিনিট
                               </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =========================< Top Bar Part End >======================= -->

    
    <!-- ========================<Logo Part Start >====================== -->
    <section class="logo">
        <div class="container">
            <div class="row">
                <div class="col-md-6 m-top-10">
                    <a href="<?php echo base_url('home') ?>"><img src="<?php echo base_url() ?>assets/images/logo-3.png" alt="শুভ সকাল"></a>
                </div>
                <?php $top=$this->load->home_mod->get_top(); ?>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 advertising m-top-10">
                            <div class="card">
                                <a href=""><img class="" src="<?=  base_url().'uploads/ads/left_'.$top['ads_image']?>" alt="Advertising"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =========================<Logo Part End >======================= -->

    
    <!-- ========================< Navbar Part Start >====================== -->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url('home') ?>"><img src="<?php echo base_url() ?>assets/images/logo-2.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav w-100 nav-justified">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('home') ?>">প্রচ্ছদ <span class="sr-only">(current)</span></a>
              </li>
              <?php foreach (common::all_news_category() as $category){ ?>
                <?php 
                  $childs=common::get_child_news_category($category['id']);
                  if($childs){ ?>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $category['category_name']?>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php foreach($childs as $child): ?>
                          <a class="dropdown-item " href="<?php echo base_url('home/category/'.$child['id']) ?>"><?php echo $child['category_name']; ?> </a>
                        <?php endforeach; ?>
                      </div>
                    </li>
                  <?php } else{ ?>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url('home/category/'.$category['id']) ?>"><?php echo $category['category_name']?></a>
                    </li>
                  <?php } ?>

                  
              <?php } ?>
              <!-- <li class="nav-item">
                <a class="nav-link" href="#">আন্তর্জাতিক</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">অর্থনীতি</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">খেলাধুলা</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">বিনোদন</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">ধর্ম</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">রাজনীতি</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="#">শিক্ষা</a>
               </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  অন্যান্য
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">লাইফ স্টাইল</a>
                  <a class="dropdown-item" href="#">আইটি বিশ্ব</a>
                  <a class="dropdown-item" href="#">শিল্পসাহিত্য</a>
                </div>
              </li> -->
            </ul>
          </div>
        </div>
    </nav>
    <!-- =========================< Navbar Part End >======================= -->