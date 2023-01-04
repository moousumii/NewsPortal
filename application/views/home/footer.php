	<!-- ========================<Footer Part Start >====================== -->
	<footer class="footer m-top-35">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 p-top-50 p-bottom-50">
					<div class="row">
						<div class="col-md-10 offset-md-1">
							<div class="row">
								<div class="col-md-4 footer-about">
									<div class="row">
										<div class="img-container">
											<img src="<?php echo base_url() ?>assets/images/logo-2.png" alt="">
										</div>
										<p class="m-top-25">এই ওয়েবসাইটের কোনো লেখা বা ছবি অনুমতি ছাড়া অন্য কোথাও প্রকাশ করা বেআইনি।</p>
									</div>
								</div>
								<div class="col-md-4 footer-category">
									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<div class="col-md-5 offset-md-2">
													<ul>
														<?php $links1=common::all_news_category_footer(0,4); ?>
														<li><a href="<?php echo base_url('home/') ?>">প্রচ্ছদ</a></li>
														<?php foreach($links1 as $l1){ ?>
															<li><a href="<?php echo base_url('home/category/'.$l1['id']) ?>"><?php echo $l1['category_name'] ?></a></li>
														<?php } ?>
													</ul>
												</div>
												<div class="col-md-5">
													<ul>
														<?php $links2=common::all_news_category_footer(4,5); ?>
														<?php foreach($links2 as $l2){ ?>
															<li><a href="<?php echo base_url('home/category/'.$l2['id']) ?>"><?php echo $l2['category_name'] ?></a></li>
														<?php } ?>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4 footer-address">
									<p><b>প্রধান কার্যালয় : </b> কানাইঘাট, সিলেট, বাংলাদেশ।</p>
									<p><b>যোগাযোগ : </b> ০১৭২০১৬৬২৯১</p>
									<p><b>ইমেইল : </b> email@gmail.com</p>
									<ul class="social-contact float-left">
										<li><a target="_blank" href="https://www.facebook.com/Dainik-Shuvosokal-%E0%A6%A6%E0%A7%88%E0%A6%A8%E0%A6%BF%E0%A6%95-%E0%A6%B6%E0%A7%81%E0%A6%AD-%E0%A6%B8%E0%A6%95%E0%A6%BE%E0%A6%B2-2061457077403643/?modal=admin_todo_tour"><i class="fab fa-facebook-f"></i></a></li>
		                                <li><a href=""><i class="fab fa-twitter"></i></a></li>
		                                <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
		                                <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 copyright p-top-10">
					<div class="row">
						<div class="col-md-10 offset-md-1">
							<div class="row">
								<div class="col-md-6">
									<p class=" float-left">&copy shuvosokal.com কর্তৃক সর্বস্বত্ব সংরক্ষিত</p>
								</div>
								<div class="col-md-6 company-name">
									<p class="float-right">Developed By- <a href="http://www.technoleadbd.com/">Technolead Corporation Ltd.</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- =========================<Footer Part End >======================= -->

   <!-- jQuery first >> then Popper.js >> then Bootstrap JS -->
    <script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
    <!-- <script src="<?php //echo base_url('assets/js/jquery-3.2.1.slim.min.js'); ?>"></script> -->
    <script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	
	<!-- Other Javascripts -->
	<script src="<?php echo base_url('assets/js/owl.carousel.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.nicescroll.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.scrollUp.min.js'); ?>"></script>
	<!-- Custom JS -->
	<script src="<?php echo base_url('assets/js/script.js'); ?>"></script>
</body>

</html>