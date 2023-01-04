<?php include('header.php'); ?>
<section class="more-category-name">
	<div class="container-fluid">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-md-12 m-top-25">
						<?php $cat_name=common::get_news_category_name($cat_id); ?>
						<h2 class="header"><?php echo $cat_name['category_name']; ?></h2>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="more-category-news">
	<div class="container-fluid">
		<div class="row">
			<div class="container">
				<div class="row m-top-25">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-12 category-all">
								<div class="card media-news">
									<ul class="list-group list-group-flush">
										<?php foreach($all_news as $news){ ?>
									    <li class="list-group-item">
									    	<div class="media">
											    <div class="img-container mr-3 m-top-10">
													<img class="align-self-center" src="<?= base_url('uploads/news/'.$news['image'])?>" alt="media image">
												</div>
											  	<div class="media-body">
											  		<h5 class="mt-0 mb-1"><a href="<?= base_url('home/details/'.$news['id'])?>"><?= $news['headline']; ?></a></h5>
												    <p><?php echo word_limiter(strip_tags($news['description']),20);?></p>
												    <?php 
														$engArray = array(
															 1,2,3,4,5,6,7,8,9,0,
															 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December',
															 'am', 'pm','Saturday','Sunday','Monday','Tuesday','Wednessday','Thursday','Friday'
															 );
															 $bangArray = array(
															 '১','২','৩','৪','৫','৬','৭','৮','৯','০',
															 'জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর',
															 'সকাল', 'দুপুর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার'
															 );
														$converted = str_replace($engArray, $bangArray, $news['news_date']);
													?>
												    <p><i class="far fa-clock"></i><?= $converted; ?></p>
												</div>
											</div>
									    </li>
									    <?php } ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row">
							<div class="col-md-12">
								<div class="news-tabs nav-justified">
									<ul class="nav nav-tabs" id="myTab" role="tablist">
									  <li class="nav-item">
									    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">প্রচলিত</a>
									  </li>
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

<section class="other-news">
	<div class="container-fluid">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-md-12 m-top-25">
						<h2 class="header">অন্যান্য সংবাদ</h2>
						
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
							
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include('footer.php'); ?>