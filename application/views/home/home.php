<?php include('header.php'); ?>
	<!-- ========================< Bulletin Part Start >====================== -->
	<section class="bulletin m-top-15">
	    <div class="container-fluid">
	      <div class="row">
	        <div class="container">
	        	<div class="row">
	        		<div class="col-md-12">
			          <div class="row">
			            <div class="col-md-1 col-sm-2 col-xs-4 bulletin-heading">
			              <h5 class="text-center">শিরোনাম</h5>
			            </div>
			            <div class="col-md-11 col-sm-10 col-xs-8">
			              <marquee class="recent-bulletin">
			                <ul>
			                	<?php 
									$bulleting=$this->load->home_mod->get_breaking_news_data();
									foreach($bulleting as $bullet_news){
								?>
			                  		<li>
			                  			<a href="<?= base_url('home/details/'.$bullet_news['id']) ?>">
			                  				<i class="far fa-dot-circle"></i>
			                  				<span><?php echo $bullet_news['headline']?></span>
			                  			</a></li>
			                    <?php } ?>
			                </ul>
			              </marquee>
			            </div>
			          </div>
			        </div>
	        	</div>
	        </div>
	      </div>
	    </div>
	  </section>
	<!-- ========================<  Bulletin Part End >====================== -->

	<!-- ========================< Main News Part Start >====================== -->
	<section class="main-news m-top-10">
		<div class="container-fluid">
			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-md-7">
							<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
							  <ol class="carousel-indicators">
							    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
							  </ol>
							  <div class="carousel-inner">
							  	<?php
							  		$k=1;
									foreach($three_breaking_news as $break_news){
								?>
								<?php if($k==1){ ?>
							    	<div class="carousel-item active">  
							    <?php } else{  ?>
							    	<div class="carousel-item ">
							    <?php } ?>
								        <div class="card">
									    	<div class="img-container">
									  			<img class="card-img-top" src="<?= base_url('uploads/news/'.$break_news['image']) ?>" alt="Card image cap">
									    	</div>
										    <div class="card-body m-bottom-35">
										    	<h5 class="card-title"><a href="<?php echo base_url('home/details/'.$break_news['id']) ?>"><?php echo $break_news['headline']?></a></h5>
										    	<p class="card-text"><?php echo word_limiter(strip_tags($break_news['description']),40);?></p>
										    </div>
										</div>
							    	</div>
							    <?php $k++;}?>
							    <!-- <div class="carousel-item">
							      <div class="card">
									  <div class="img-container">
									  	<img class="card-img-top" src="assets/images/news/5.jpg" alt="Card image cap">
									  </div>
									  <div class="card-body m-bottom-35">
									    <h5 class="card-title"><a href="">খবর হেডলাইন</a></h5>
									    <p class="card-text">বাংলাদেশ (এই শব্দ সম্পর্কে শুনুন (সাহায্য·তথ্য)) দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র। বাংলাদেশের সাংবিধানিক নাম গণপ্রজাতন্ত্রী বাংলাদেশ। বাংলাদেশ (এই শব্দ সম্পর্কে শুনুন (সাহায্য·তথ্য)) দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র। বাংলাদেশের সাংবিধানিক নাম গণপ্রজাতন্ত্রী বাংলাদেশ। </p>
									  </div>
									</div>
							    </div>
							    <div class="carousel-item">
							        <div class="card">
									  <div class="img-container">
									  	<img class="card-img-top" src="assets/images/news/6.jpg" alt="Card image cap">
									  </div>
									  <div class="card-body m-bottom-35">
									    <h5 class="card-title"><a href="">খবর হেডলাইন</a></h5>
									    <p class="card-text">বাংলাদেশ (এই শব্দ সম্পর্কে শুনুন (সাহায্য·তথ্য)) দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র। বাংলাদেশের সাংবিধানিক নাম গণপ্রজাতন্ত্রী বাংলাদেশ। বাংলাদেশ (এই শব্দ সম্পর্কে শুনুন (সাহায্য·তথ্য)) দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র। বাংলাদেশের সাংবিধানিক নাম গণপ্রজাতন্ত্রী বাংলাদেশ। </p>
									  </div>
									</div>
							    </div> -->
							  </div>
							  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
							    <span class="sr-only">Previous</span>
							  </a>
							  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							    <span class="carousel-control-next-icon" aria-hidden="true"></span>
							    <span class="sr-only">Next</span>
							  </a>
							</div>
						</div>
						<div class="col-md-5">
							<div class="row">
								<div class="col-md-12 advertising">
									<div class="card">
									  <a href=""><img class="" src="..." alt="Advertising"></a>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 m-top-10">
									<div class="news-tabs nav-justified">
										<ul class="nav nav-tabs" id="myTab" role="tablist">
										  <li class="nav-item">
										    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">প্রচলিত</a>
										  </li>
										  <!-- <li class="nav-item">
										    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">মন্তব্য</a>
										  </li> -->
										  <li class="nav-item">
										    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">সর্বশেষ</a>
										  </li>
										</ul>
										<div class="tab-content card" id="myTabContent">
										  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
										  	<ul class="list-group list-group-flush">
										  		<?php
													foreach($popular as $p_news){
												?>
											  		<li class="list-group-item">
											  			<a href="<?php echo base_url('home/details/'.$p_news['id']); ?>">
											  				<?php echo $p_news['headline']?> 
												  		</a>
												  	</li>
										  		<?php }?>
										  	</ul>
										  </div>
										  <!-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
										  	<ul class="list-group list-group-flush">
										  		<li class="list-group-item"><a href="">বাংলাদেশের সাংবিধানিক নাম গণপ্রজাতন্ত্রী বাংলাদেশ। </a></li>
										  		<li class="list-group-item"><a href="">বাংলাদেশের সাংবিধানিক নাম গণপ্রজাতন্ত্রী বাংলাদেশ। </a></li>
										  		<li class="list-group-item"><a href="">বাংলাদেশের সাংবিধানিক নাম গণপ্রজাতন্ত্রী বাংলাদেশ। </a></li>
										  		<li class="list-group-item"><a href="">বাংলাদেশের সাংবিধানিক নাম গণপ্রজাতন্ত্রী বাংলাদেশ। </a></li>
										  		<li class="list-group-item"><a href="">বাংলাদেশের সাংবিধানিক নাম গণপ্রজাতন্ত্রী বাংলাদেশ। </a></li>
										  		<li class="list-group-item"><a href="">বাংলাদেশের সাংবিধানিক নাম গণপ্রজাতন্ত্রী বাংলাদেশ। </a></li>
										  		<li class="list-group-item"><a href="">বাংলাদেশের সাংবিধানিক নাম গণপ্রজাতন্ত্রী বাংলাদেশ। </a></li>
										  		<li class="list-group-item"><a href="">বাংলাদেশের সাংবিধানিক নাম গণপ্রজাতন্ত্রী বাংলাদেশ। </a></li>
										  		<li class="list-group-item"><a href="">বাংলাদেশের সাংবিধানিক নাম গণপ্রজাতন্ত্রী বাংলাদেশ। </a></li>
										  		<li class="list-group-item"><a href="">বাংলাদেশের সাংবিধানিক নাম গণপ্রজাতন্ত্রী বাংলাদেশ। </a></li>
										  		<li class="list-group-item"><a href="">বাংলাদেশের সাংবিধানিক নাম গণপ্রজাতন্ত্রী বাংলাদেশ। </a></li>
										  		<li class="list-group-item"><a href="">বাংলাদেশের সাংবিধানিক নাম গণপ্রজাতন্ত্রী বাংলাদেশ। </a></li>
										  	</ul>
										  </div> -->
										  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
										  	<ul class="list-group list-group-flush">
										  		<?php
													foreach($breaking_news as $break_news){
												?>
											  		<li class="list-group-item">
											  			<a href="<?php echo base_url('home/details/'.$break_news['id']); ?>">
											  				<?php echo $break_news['headline']?> 
												  		</a>
												  	</li>
										  		<?php }?>
										  	</ul>
										  </div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- =========================< Main News Part End >======================= -->

	
	<!-- ========================<Recent News Part Start >====================== -->
	<section class="recentNews">
		<div class="container-fluid m-top-35">
			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2 class="header">সাম্প্রতিক খবর</h2>
							
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div id="recentNewsOwl" class="owl-carousel owl-theme">
								<?php
									foreach($breaking_news as $break_news){
								?>
							    <div class="item">
							    	<div class="card">
									  <div class="img-container">
									  	<img class="card-img-top" src="<?php echo base_url('uploads/news/'.$break_news['image']); ?>" alt="Card image cap">
									  </div>
									  <div class="card-body">
									    <p class="card-text"><a href="<?php echo base_url('home/details/'.$break_news['id']); ?>"><?php echo $break_news['headline']?></a></p>
									  </div>
									</div>
							    </div>
							    <?php } ?>
							    
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- =========================<Recent News Part End >======================= -->

	
	<!-- ========================< National News Part Start >====================== -->
	<section class="nationalNews m-top-35">
		<div class="container-fluid">
			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-4">
									<?php $cat_name=common::get_news_category_name(21); ?>
									<a href="<?php echo base_url('home/category/21'); ?>"><h2 class="header"><?php echo $cat_name['category_name']; ?> খবর</h2></a>
									
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div id="nationalNewsOwl" class="owl-carousel owl-theme" >
									    <?php foreach($national_slide as $n_news) { ?>
									    <div class="item">
									    	<div class="card">
											  <div class="img-container">
											  	<img class="card-img-top" src="<?= base_url('uploads/news/'.$n_news['image']); ?>" alt="Card image cap">
											  </div>
											  <div class="card-body">
											    <p class="card-text"><a href="<?php echo base_url('home/details/'.$n_news['id']);  ?>"><?php echo $n_news['headline']; ?></a></p>
											  </div>
											</div>
									    </div>
									    <?php } ?>
									    
									</div>
								</div>
								<div class="col-md-4 more-news" id="moreNews">
									<div class="card">
									  <div class="card-header text-center">
									    আরও সংবাদ
									  </div>
									  <div class="card news-list">
									  	<ul class="list-group list-group-flush">
									  		<?php foreach($national as $n_news) { ?>
										    	<li class="list-group-item">
										    		<a href="<?php echo base_url('home/details/'.$n_news['id']);  ?>">
										    			<?php echo $n_news['headline']; ?>
										    		</a>
										    	</li>
										    <?php } ?>
										</ul>
									  </div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card">
									  <a href=""><img class="" src="..." alt="Advertising"></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- =========================< National News Part End >======================= -->
	

	<!-- ========================< Politics & Economics Part Start >====================== -->
	
	<section class="poliEcoNews m-top-35">
		<div class="container-fluid">
			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-4 politicalNews">
									<?php $cat_name=common::get_news_category_name(22); ?>
									<a href="<?php echo base_url('home/category/22'); ?>">
										<h2 class="header"><?php echo $cat_name['category_name']; ?></h2>
									</a>
									<div id="politicalNewsOwl" class="owl-carousel owl-theme" >
									    <?php foreach($international_slide as $i_news){ ?>
									    <div class="item">
									    	<div class="card">
											  <div class="img-container">
											  	<img class="card-img-top" src="<?= base_url('uploads/news/'.$i_news['image']); ?>" alt="Card image cap">
											  </div>
											  <div class="card-body">
											    <p class="card-text">
											    	<a href="<?php echo base_url('home/details/'.$i_news['id']);  ?>">
											    		<?php echo $i_news['headline']; ?>
												    </a>
												</p>
											  </div>
											</div>
									    </div>
									    <?php } ?>
									    
									</div>
									<div class="card media-news">
									  <ul class="list-group list-group-flush">
									  	<?php foreach($international as $i_news){ ?>
										    <li class="list-group-item">
										    	<div class="media">
												    <div class="img-container mr-3">
														<img class="align-self-center" src="<?= base_url('uploads/news/'.$i_news['image']); ?>" alt="media image">
													</div>
												  	<div class="media-body">
													    <a href="<?php echo base_url('home/details/'.$i_news['id']);  ?>">
													    	<?php echo $i_news['headline']; ?>
													    </a>
													</div>
												</div>
										    </li>
									    <?php } ?>
									  </ul>
									</div>
								</div>
								<div class="col-md-4 economicNews">
									<?php $cat_name=common::get_news_category_name(23); ?>
									<a href="<?php echo base_url('home/category/23'); ?>">	
										<h2 class="header"><?php echo $cat_name['category_name']; ?></h2>
									</a>
									<div id="politicalNewsOwl" class="owl-carousel owl-theme" >
									    <?php foreach($politics_slide as $p_news){ ?>
										    <div class="item">
										    	<div class="card">
												  <div class="img-container">
												  	<img class="card-img-top" src="<?= base_url('uploads/news/'.$p_news['image']); ?>" alt="Card image cap">
												  </div>
												  <div class="card-body">
												    <p class="card-text">
												    	<a href="<?php echo base_url('home/details/'.$p_news['id']);  ?>">
												    		<?php echo $p_news['headline']; ?>
												    	</a>
												    </p>
												  </div>
												</div>
										    </div>
										<?php } ?>
									</div>
									<div class="card media-news">
									  <ul class="list-group list-group-flush">
									  	<?php foreach($politics as $p_news){ ?>
										    <li class="list-group-item">
										    	<div class="media">
												    <div class="img-container mr-3">
														<img class="align-self-center" src="<?= base_url('uploads/news/'.$p_news['image']); ?>" alt="media image">
													</div>
												  	<div class="media-body">
													    <a href="<?php echo base_url('home/details/'.$p_news['id']);  ?>">
													    	<?php echo $p_news['headline']; ?>
													    </a>
													</div>
												</div>
										    </li>
									    <?php } ?>
									    
									  </ul>
									</div>
								</div>
								
								<div class="col-md-4 economicNews">
									<?php $cat_name=common::get_news_category_name(24); ?>
									<a href="<?php echo base_url('home/category/24'); ?>">
										<h2 class="header"><?php echo $cat_name['category_name']; ?></h2>
									</a>
									<div id="politicalNewsOwl" class="owl-carousel owl-theme" >
									    <?php foreach($commerce_slide as $c_news){ ?>
										    <div class="item">
										    	<div class="card">
												  <div class="img-container">
												  	<img class="card-img-top" src="<?= base_url('uploads/news/'.$c_news['image']); ?>" alt="Card image cap">
												  </div>
												  <div class="card-body">
												    <p class="card-text">
												    	<a href="<?php echo base_url('home/details/'.$c_news['id']);  ?>">
												    		<?php echo $c_news['headline']; ?>
												    	</a>
												    </p>
												  </div>
												</div>
										    </div>
										<?php } ?>
									</div>
									<div class="card media-news">
									  <ul class="list-group list-group-flush">
									  	<?php foreach($commerce as $c_news){ ?>
										    <li class="list-group-item">
										    	<div class="media">
												    <div class="img-container mr-3">
														<img class="align-self-center" src="<?= base_url('uploads/news/'.$c_news['image']); ?>" alt="media image">
													</div>
												  	<div class="media-body">
													    <a href="<?php echo base_url('home/details/'.$c_news['id']);  ?>">
													    	<?php echo $c_news['headline']; ?>
													    </a>
													</div>
												</div>
										    </li>
									    <?php } ?>
									    
									  </ul>
									</div>
								</div>
								<!-- <div class="col-md-4 advertising m-top-75">
									<div class="card">
									  <a href=""><img class="" src="..." alt="Advertising"></a>
									</div>
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="internationalNews m-top-35">
		<div class="container-fluid">
			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-md-12 advertising ">
							<div class="card" style="height:120px;">
							  <a href=""><img class="" src="<?=  base_url().'uploads/ads/add.gif'?>" alt="Advertising"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- =========================< Politics & Economics Part End >======================= -->

	
	<!-- =========================< Internation News Part Start >======================= -->
	<section class="internationalNews m-top-35">
		<div class="container-fluid">
			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-4">
									<?php $cat_name=common::get_news_category_name(25); ?>
									<a href="<?php echo base_url('home/category/25'); ?>">	
										<h2 class="header"><?php echo $cat_name['category_name']; ?></h2>
									</a>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div id="internationalNewsOwl" class="owl-carousel owl-theme" >
									    <?php foreach($binudon_slide as $b_news){ ?>
										    <div class="item">
										    	<div class="card">
												  <div class="img-container">
												  	<img class="card-img-top" src="<?= base_url('uploads/news/'.$b_news['image']); ?>" alt="Card image cap">
												  </div>
												  <div class="card-body">
												    <p class="card-text">
												    	<a href="<?php echo base_url('home/details/'.$b_news['id']);  ?>">
												    		<?php echo $b_news['headline']; ?>
												    	</a>
												    </p>
												  </div>
												</div>
										    </div>
									    <?php } ?>
									    
									</div>
								</div>
								<div class="col-md-6 more-international">
									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<?php foreach($binudon as $b_news){ ?>
													<div class="col-md-4 col-sm-6 col-xs-6">
														<div class="card">
															<div class="img-container">
															  	<img class="card-img-top" src="<?= base_url('uploads/news/'.$b_news['image']); ?>" alt="Card image cap">
															</div>
															<div class="card-body">
															    <p class="card-text">
															    	<a href="<?php echo base_url('home/details/'.$b_news['id']);  ?>">
															    		<?php echo $b_news['headline']; ?>
															    	</a>
															    </p>
															</div>
														</div>
													</div>
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	
	<!-- =================< Religion & Entertainment Part End >============== -->

	<!-- =================< Sports & Country Part Start >============== -->
	<section class="sportCountry m-top-35">
		<div class="container-fluid">
			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-4">
									<?php $cat_name=common::get_news_category_name(30); ?>
									<a href="<?php echo base_url('home/category/30'); ?>">	
										<h2 class="header"><?php echo $cat_name['category_name']; ?></h2>
									</a>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 sportNews">
									<div id="sportsNewsOwl" class="owl-carousel owl-theme" >
									    
									    <?php foreach($sport_slide as $s_news){ ?>
										    <div class="item">
										    	<div class="card">
												  <div class="img-container">
												  	<img class="card-img-top" src="<?= base_url('uploads/news/'.$s_news['image']); ?>" alt="Card image cap">
												  </div>
												  <div class="card-body">
												    <p class="card-text">
												    	<a href="<?php echo base_url('home/details/'.$s_news['id']);  ?>">
												    		<?php echo $s_news['headline']; ?>
												    	</a>
												    </p>
												  </div>
												</div>
										    </div>
									    <?php } ?>
									    
									</div>
								</div>
								<div class="col-md-4 more-sports">
									<div class="row">
										<div class="col-md-12">
											<div class="row">
												
												<?php foreach($sport as $s_news){ ?>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<div class="card">
															<div class="img-container">
															  	<img class="card-img-top" src="<?= base_url('uploads/news/'.$s_news['image']); ?>" alt="Card image cap">
															</div>
															<div class="card-body">
															    <p class="card-text">
															    	<a href="<?php echo base_url('home/details/'.$s_news['id']);  ?>">
															    		<?php echo $s_news['headline']; ?>
															    	</a>
															    </p>
															</div>
														</div>
													</div>
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card">
									  <a href=""><img class="" src="..." alt="Advertising"></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- =================< Sports & Entertainment Part End >============== -->

	
	<!-- ====================< Science & Life-style Part Start >============= -->
	<section class="scienceTechNews m-top-35">
		<div class="container-fluid">
			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-4 more-news">
									<div class="card">
									  <div class="card-header text-center">
									    <?php $cat_name=common::get_news_category_name(29); ?>
										<a href="<?php echo base_url('home/category/29'); ?>" style="color:#fff;">
											<?php echo $cat_name['category_name']; ?>
										</a>
									  </div>
									  	<div class="card media-news">
										  <ul class="list-group list-group-flush">
										  	<?php foreach($education as $edu){ ?>
											    <li class="list-group-item">
											    	<div class="media">
													    <div class="img-container mr-3">
															<img class="align-self-center" src="<?= base_url('uploads/news/'.$edu['image']); ?>" alt="media image">
														</div>
													  	<div class="media-body">
														    <a href="<?php echo base_url('home/details/'.$edu['id']);  ?>">
														    	<?php echo $edu['headline']; ?>
														    </a>
														</div>
													</div>
											    </li>
										    <?php } ?>
										  </ul>
										</div>
									</div>
								</div>
								<div class="col-md-4 more-news">
									<div class="card">
									  <div class="card-header text-center">
									    <?php $cat_name=common::get_news_category_name(26); ?>
										<a href="<?php echo base_url('home/category/26'); ?>" style="color:#fff;" >
											<?php echo $cat_name['category_name']; ?>
										</a>
									  </div>
									  	<div class="card media-news">
										  <ul class="list-group list-group-flush">
										    <?php foreach($technology as $tec){ ?>
											    <li class="list-group-item">
											    	<div class="media">
													    <div class="img-container mr-3">
															<img class="align-self-center" src="<?= base_url('uploads/news/'.$tec['image']); ?>" alt="media image">
														</div>
													  	<div class="media-body">
														    <a href="<?php echo base_url('home/details/'.$tec['id']);  ?>">
														    	<?php echo $tec['headline']; ?>
														    </a>
														</div>
													</div>
											    </li>
										    <?php } ?>
										  </ul>
										</div>
									</div>
								</div>
								<div class="col-md-4 more-news">
									<div class="card">
									  <div class="card-header text-center">
									    <?php $cat_name=common::get_news_category_name(27); ?>
										<a href="<?php echo base_url('home/category/27'); ?>" style="color:#fff;">
											<?php echo $cat_name['category_name']; ?>
										</a>
									  </div>
									  	<div class="card media-news">
										  <ul class="list-group list-group-flush">
										    <?php foreach($culture as $cul){ ?>
											    <li class="list-group-item">
											    	<div class="media">
													    <div class="img-container mr-3">
															<img class="align-self-center" src="<?= base_url('uploads/news/'.$cul['image']); ?>" alt="media image">
														</div>
													  	<div class="media-body">
														    <a href="<?php echo base_url('home/details/'.$cul['id']);  ?>">
														    	<?php echo $cul['headline']; ?>
														    </a>
														</div>
													</div>
											    </li>
										    <?php } ?>
										  </ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ====================< Science & Life-style Part End >================ -->
	
<?php include('footer.php'); ?>