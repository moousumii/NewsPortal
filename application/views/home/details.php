<?php include('header.php'); ?>

<section class="news-details m-top-30">
	<div class="container-fluid">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-8">
										<div class="header">
											<h3><?= $news_desc['headline'] ?></h3>
										</div>
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
											$converted = str_replace($engArray, $bangArray, $news_desc['news_date']);
										?>
										<div class="date-time">
											<p><i class="far fa-clock"></i><?php echo $converted;?> ;</p>
										</div>
									</div>
									<div class="col-md-4">
										<div class="new-share">
											<ul>
												<!-- <li>
													<iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Fdainikshuvosokal.com%2Fhome%2Fdetails%2F<?php echo $news_desc['category_id'] ?>&layout=button_count&size=small&mobile_iframe=true&width=69&height=20&appId;src=sdkpreparse" width="70" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
												</li> -->
												<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
				                                <li><a href=""><i class="fab fa-twitter"></i></a></li>
				                                <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
											</ul>
										</div>
									</div>

								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<p class="news-description">
								<span class="img-container">
									<img class="news-img" src="<?= base_url().'uploads/news/'.$news_desc['image']?>" alt="image">
								</span>
								<?php echo strip_tags($news_desc['description'])?>
								</p>
							</div>
						</div>
					</div>
					<div class="col-md-3 m-top-15">
						<div class="row">
							<div class="col-md-12 advertising">
								<div class="card">
									<a href=""><img class="" src="..." alt="Advertising"></a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 m-top-25">
								<div class="card">
								    <div class="card news-list">
									  	<ul class="list-group list-group-flush">
									  		<?php foreach($popular as $p_news) { ?>
										    	<li class="list-group-item"><a href="<?= base_url('home/details/'.$p_news['id']) ?>"><?php echo $p_news['headline']; ?></a></li>
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

<section class="news-details-more">
	<div class="container-fluid">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-12">
								<h2 class="header">আরও সংবাদ</h2>
								
							</div>
						</div>
						<div class="row">
							<?php foreach($popular as $op_news) { ?>
								<div class="col-md-4">
									<div class="card">
										  <div class="img-container">
										  	<img class="card-img-top" src="<?= base_url('uploads/news/'.$op_news['image']) ?>" alt="Card image cap">
										  </div>
										  <div class="card-body">
										    <p class="card-text"><a href="<?= base_url('home/details/'.$op_news['id']) ?>"><?php echo $op_news['headline']  ?></a></p>
										  </div>
									</div>
								</div>
							<?php } ?>
							
						</div>
						
					</div>
					<div class="col-md-3">
						<div class="row">
							<div class="col-md-12 advertising">
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

<?php include('footer.php'); ?>