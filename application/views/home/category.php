<?php include('header.php'); ?>
<section class="category-name">
	<div class="container-fluid">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-md-12 m-top-25">
						<h2 class="header"><?php echo $title ?></h2>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="main-category">
	<div class="container-fluid">
		<div class="row">
			<div class="container">
				<div class="row m-top-25">
					<div class="col-md-6 category-main-news">
						<div class="row">
							<div class="col-md-12">
								<div class="card">
								  	<div class="img-container">
								  		<img class="category-main-news" src="<?= base_url().'uploads/news/'.$latest_news['image']?>" alt="Card image cap">
								  	</div>
									<div class="card-body">
									    <h5 class="card-title"><a href="<?= base_url().'home/details/'.$latest_news['id']?>"><?php echo $latest_news['headline'] ?></a></h5>
									    <p class="card-text"><?php echo word_limiter(strip_tags($latest_news['description']),30);?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12 more-read">
								<div class="card">
									<div class="card-header text-center">
									    সর্বাধিক পঠিত ( <?php echo $title ?> )
									</div>
									<div class="card media-news">
									  	<ul class="list-group list-group-flush">
									  		<?php foreach($popular as $p_news){?>
										    	<li class="list-group-item">
										    		<div class="media">
										    			<div class="img-container mr-3">
															<img class="align-self-center" alt="media image" src="<?=  base_url().'uploads/news/'.$p_news['image']?>"?> 
														</div>
														<div class="media-body">
														    <a href="<?= base_url().'home/details/'.$p_news['id']?>"><?php echo $p_news['headline'] ?></a>
														</div>
										    		</div>
										    	</li>
										    <?php }?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- <div class="col-md-5">
						<div class="news-tabs nav-justified">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
							  <li class="nav-item">
							    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">প্রচলিত</a>
							  </li>
							  <li class="nav-item">
							    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">মন্তব্য</a>
							  </li>
							  <li class="nav-item">
							    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">সর্বশেষ</a>
							  </li>
							</ul>
							<div class="tab-content card" id="myTabContent">
							  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							  	<ul class="list-group list-group-flush">
							  		<li class="list-group-item"><a href="">বাংলাদেশ দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র। </a></li>
							  		<li class="list-group-item"><a href="">বাংলাদেশ দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র। </a></li>
							  		<li class="list-group-item"><a href="">বাংলাদেশ দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র। </a></li>
							  		<li class="list-group-item"><a href="">বাংলাদেশ দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র। </a></li>
							  		<li class="list-group-item"><a href="">বাংলাদেশ দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র। </a></li>
							  		<li class="list-group-item"><a href="">বাংলাদেশ দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র। </a></li>
							  		<li class="list-group-item"><a href="">বাংলাদেশ দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র। </a></li>
							  		<li class="list-group-item"><a href="">বাংলাদেশ দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র। </a></li>
							  		<li class="list-group-item"><a href="">বাংলাদেশ দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র। </a></li>
							  		<li class="list-group-item"><a href="">বাংলাদেশ দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র। </a></li>
							  	</ul>
							  </div>
							  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
							  </div>
							  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
							  	<ul class="list-group list-group-flush">
							  		<li class="list-group-item"><a href="">বাংলাদেশ দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র। </a></li>
							  		<li class="list-group-item"><a href="">বাংলাদেশ দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র। </a></li>
							  		<li class="list-group-item"><a href="">বাংলাদেশ দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র। </a></li>
							  		<li class="list-group-item"><a href="">বাংলাদেশ দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র। </a></li>
							  		<li class="list-group-item"><a href="">বাংলাদেশ দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র। </a></li>
							  		<li class="list-group-item"><a href="">বাংলাদেশ দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র। </a></li>
							  		<li class="list-group-item"><a href="">বাংলাদেশ দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র। </a></li>
							  		<li class="list-group-item"><a href="">বাংলাদেশ দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র। </a></li>
							  		<li class="list-group-item"><a href="">বাংলাদেশ দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র। </a></li>
							  		<li class="list-group-item"><a href="">বাংলাদেশ দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র। </a></li>
							  	</ul>
							  </div>
							</div>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</section>
<?php //print_r($last_nine); exit; ?>
<section class="small-category  m-top-25">
	<div class="container-fluid">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-md-8 news">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<?php foreach($last_nine as $news): ?>
										<div class="col-md-4">
											<div class="card">
												  <div class="img-container">
												  	<img class="card-img-top" src="<?= base_url().'uploads/news/'.$news['image']?>" alt="Card image cap">
												  </div>
												  <div class="card-body">
												    <p class="card-text"><a href="<?= base_url().'home/details/'.$news['id']?>"><?php echo word_limiter(strip_tags($news['headline']),5)?></a></p>
												  </div>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row">
							<!-- <div class="col-md-12 more-read">
								<div class="card">
									  <div class="card-header text-center">
									    সর্বাধিক পঠিত
									  </div>
									  <div class="card news-list">
									  	<ul class="list-group list-group-flush">
										    <li class="list-group-item"><a href="">বাংলাদেশ দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র।</a></li>
										    <li class="list-group-item"><a href="">বাংলাদেশের সাংবিধানিক নাম গণপ্রজাতন্ত্রী বাংলাদেশ।</a></li>
										    <li class="list-group-item"><a href="">বাংলাদেশের সাংবিধানিক নাম গণপ্রজাতন্ত্রী বাংলাদেশ।</a></li>
										    <li class="list-group-item"><a href="">বাংলাদেশ দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র।</a></li>
										    <li class="list-group-item"><a href="">বাংলাদেশের সাংবিধানিক নাম গণপ্রজাতন্ত্রী বাংলাদেশ।</a></li>
										    <li class="list-group-item"><a href="">বাংলাদেশ দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র।</a></li>
										    <li class="list-group-item"><a href="">বাংলাদেশের সাংবিধানিক নাম গণপ্রজাতন্ত্রী বাংলাদেশ।</a></li>
										</ul>
									  </div>
								</div>
							</div> -->
							<div class="col-md-12 advertising">
								<div class="card">
									<a href=""><img class="" src="..." alt="Advertising"></a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 advertising m-top-10">
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

<section class="m-top-15">
	<div class="container-fluid">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<a type="button" href="<?php echo base_url('home/more/'.$cat_id) ?>" class="btn btn-info">আরও >></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>	

<section class="other-news">
	<div class="container-fluid">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-md-12 m-top-25">
						<a href="<?=base_url('home/index')?>"><h2 class="header">আজকের অন্যান্য সংবাদ</h2></a>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="other-category  m-top-25">
	<div class="container-fluid">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<?php foreach($others_current as $c_news): ?>
								<div class="col-md-3">
									<div class="card">
										  <div class="img-container">
										  	<img class="card-img-top" src="<?= base_url().'uploads/news/'.$c_news['image']?>" alt="Card image cap">
										  </div>
										  <div class="card-body">
										    <p class="card-text"><a href="<?= base_url().'home/details/'.$c_news['id']?>">$c_news['headline']</a></p>
										  </div>
									</div>
								</div>
							<?php endforeach; ?>
							<!-- <div class="col-md-3">
								<div class="card">
									  <div class="img-container">
									  	<img class="card-img-top" src="https://www.elastic.co/assets/bltada7771f270d08f6/enhanced-buzz-1492-1379411828-15.jpg" alt="Card image cap">
									  </div>
									  <div class="card-body">
									    <p class="card-text"><a href="">বাংলাদেশ দক্ষিণ এশিয়ার একটি জনবহুল রাষ্ট্র।</a></p>
									  </div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card">
									  <div class="img-container">
									  	<img class="card-img-top" src="https://www.gettyimages.ca/gi-resources/images/Homepage/Hero/UK/CMS_Creative_164657191_Kingfisher.jpg" alt="Card image cap">
									  </div>
									  <div class="card-body">
									    <p class="card-text"><a href="">বাংলাদেশের সাংবিধানিক নাম গণপ্রজাতন্ত্রী বাংলাদেশ।</a></p>
									  </div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card">
									  <div class="img-container">
									  	<img class="card-img-top" src="http://kb4images.com/images/image/37272651-image.jpg" alt="Card image cap">
									  </div>
									  <div class="card-body">
									    <p class="card-text"><a href="">বাংলাদেশের সাংবিধানিক নাম গণপ্রজাতন্ত্রী বাংলাদেশ।</a></p>
									  </div>
								</div>
							</div> -->
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include('footer.php'); ?>