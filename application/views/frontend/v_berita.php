<!DOCTYPE html>
<html lang="en-US">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title>Berita | YPI</title>
		<?php $this->load->view('frontend/head.php'); ?>
	</head>
	
	<body class="home page-template page-template-template-home page-template-template-home-php page page-id-7 woocommerce-no-js wpb-js-composer js-comp-ver-5.4.2 vc_responsive">
		<div id="page" class="hfeed site ">
			<a class="skip-link screen-reader-text" href="#content">Skip to content</a>
			<?php $this->load->view('frontend/menu.php'); ?>
			
			<div id="content" class="site-content">
				<div class="page-top clearfix custom-header">
					<div class="container header-image">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<h1 class="custom-header-title dark-title" style="color:#704825;">
									Berita YPI Al-Azizah
								</h1>
							</div>
						</div>
					</div>
				</div>
				<div class="category-listing clearfix">
					<div class="container">
						<div class="row">
							<div class=" col-lg-8 col-md-8 col-sm-8 ">
								<?php foreach ($berita_data as $berita): ?>
								<div class="vc_grid-item vc_clearfix vc_col-sm-6 vc_grid-item-zone-c-bottom vc_visible-item">
									<div class="vc_grid-item-mini vc_clearfix">
										<div class="vc_gitem-animated-block vc_gitem-animate vc_gitem-animate-scaleRotateIn" data-vc-animation="scaleRotateIn">
											<div class="vc_custom_heading vc_gitem-post-data vc_gitem-post-data-source-post_title">
												<h3 class="h3" style="text-align: left">
													<a href="<?php echo base_url('berita?detail=').$berita->id_berita.'&&name='.$berita->judul_seo; ?>" title="<?php echo $berita->judul_berita; ?>">
														<u><b>
															<?php 
																$text1 = $berita->judul_berita;
																echo ucwords(substr($text1, 0, 22));
																if(strlen($text1) > 22){
																	echo "..";
																}
															?>
														</b></u>
													</a>
												</h3>
											</div>
											<div class="vc_gitem-zone vc_gitem-zone-a vc-gitem-zone-height-mode-auto vc-gitem-zone-height-mode-auto-4-3 vc_gitem-is-link" style="background-image: url('<?php echo base_url('assets/images/berita/').$berita->userfile.$berita->userfile_type; ?>') !important;">
												<a href="<?php echo base_url('berita?detail=').$berita->id_berita.'&&name='.$berita->judul_seo; ?>" title="<?php echo $berita->judul_berita; ?>" class="vc_gitem-link vc-zone-link"></a>
												<img src="<?php echo base_url('assets/images/berita/').$berita->userfile.$berita->userfile_type; ?>" class="vc_gitem-zone-img" alt="">
												<div class="vc_gitem-zone-mini"></div>
											</div>
											<div class="vc_gitem-zone vc_gitem-zone-b vc_custom_1419333125675 vc-gitem-zone-height-mode-auto vc_gitem-is-link">
												<a href="<?php echo base_url('berita?detail=').$berita->id_berita.'&&name='.$berita->judul_seo; ?>" title="<?php echo $berita->judul_berita; ?>" class="vc_gitem-link vc-zone-link"></a>
												<div class="vc_gitem-zone-mini"></div>
											</div>
										</div>
										<div class="vc_gitem-zone vc_gitem-zone-c vc_custom_1467658963197">
											<div class="vc_gitem-zone-mini">
												<div class="vc_gitem_row vc_row vc_gitem-row-position-top">
													<div class="vc_col-sm-12 vc_gitem-col vc_gitem-col-align-">
														<div class="vc_custom_heading vc_gitem-post-data vc_gitem-post-data-source-post_excerpt">
															<p style="text-align: left"></p>
															<?php
															$text = $berita->isi_berita;
															echo substr($text, 0, 100);
															if(strlen($text) > 100){
																echo " ...";
															}
															?>
															<p></p>
														</div>
														<div class="vc_btn3-container  read-more vc_btn3-left">
															<a href="<?php echo base_url('berita?detail=').$berita->id_berita.'&&name='.$berita->judul_seo; ?>" class="vc_gitem-link vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-flat vc_btn3-color-juicy-pink read-more" title="Read More">Read More</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="vc_clearfix"></div>
								</div>
								<?php endforeach;?>
								<div class="pagination">
									<?php
										if($total_halaman > 7){
											if($halaman_sekarang != 1){
												if(isset($_GET['cari'])){
													echo '<a class="next page-numbers" href="'.base_url('berita?cari='.$_GET['cari'].'&&page='.($halaman_sekarang - 1)).'"> Prev </a>';
												}else{
													echo '<a class="next page-numbers" href="'.base_url('berita?page='.($halaman_sekarang - 1)).'"> Prev </a>';
												}
											}
											for($i = 1; $i <= $total_halaman; $i++){
												if($i == $halaman_sekarang){
													echo "<span class='page-numbers current'>".$i."</span>";
												}else if($halaman_sekarang < 4){
													if($i < 5){
														if(isset($_GET['cari'])){
															echo "<a class='page-numbers' href='".base_url('berita?cari='.$_GET['cari'].'&&page='.$i)."'>".$i."</a>";
														}else{
															echo "<a class='page-numbers' href='".base_url('berita?page='.$i)."'>".$i."</a>";
														}
													}else if($i > ($total_halaman - 2)){
														if(isset($_GET['cari'])){
															echo "<a class='page-numbers' href='".base_url('berita?cari='.$_GET['cari'].'&&page='.$i)."'>".$i."</a>";
														}else{
															echo "<a class='page-numbers' href='".base_url('berita?page='.$i)."'>".$i."</a>";
														}
													}else if($i > ($total_halaman - 3)){
														echo "<b>>></b>";
													}
												}else if($halaman_sekarang > ($total_halaman - 3)){
													if($i < 3){
														if(isset($_GET['cari'])){
															echo "<a class='page-numbers' href='".base_url('berita?cari='.$_GET['cari'].'&&page='.$i)."'>".$i."</a>";
														}else{
															echo "<a class='page-numbers' href='".base_url('berita?page='.$i)."'>".$i."</a>";
														}
													}else if($i < 4){
														echo "<b><<</b>";
													}else if($i > ($total_halaman - 3)){
														if(isset($_GET['cari'])){
															echo "<a class='page-numbers' href='".base_url('berita?cari='.$_GET['cari'].'&&page='.$i)."'>".$i."</a>";
														}else{
															echo "<a class='page-numbers' href='".base_url('berita?page='.$i)."'>".$i."</a>";
														}
													}
												}else{
													if($i < 3){
														if(isset($_GET['cari'])){
															echo "<a class='page-numbers' href='".base_url('berita?cari='.$_GET['cari'].'&&page='.$i)."'>".$i."</a>";
														}else{
															echo "<a class='page-numbers' href='".base_url('berita?page='.$i)."'>".$i."</a>";
														}
													}else if($i < 4){
														echo "<b><<</b>";
													}else if($i == $halaman_sekarang){
														echo "<span class='page-numbers current'>".$i."</span>";
													}else if($i > ($total_halaman - 2)){
														if(isset($_GET['cari'])){
															echo "<a class='page-numbers' href='".base_url('berita?cari='.$_GET['cari'].'&&page='.$i)."'>".$i."</a>";
														}else{
															echo "<a class='page-numbers' href='".base_url('berita?page='.$i)."'>".$i."</a>";
														}
													}else if($i > ($total_halaman - 3)){
														echo "<b>>></b>";
													}
												}
											}
											if($halaman_sekarang != $total_halaman){
												if(isset($_GET['cari'])){
													echo '<a class="next page-numbers" href="'.base_url('berita?cari='.$_GET['cari'].'&&?page='.($halaman_sekarang + 1)).'"> Next </a>';
												}else{
													echo '<a class="next page-numbers" href="'.base_url('berita?page='.($halaman_sekarang + 1)).'"> Next </a>';
												}
											}
										}else{
											if($halaman_sekarang != 1){
												if(isset($_GET['cari'])){
													echo '<a class="next page-numbers" href="'.base_url('berita?cari='.$_GET['cari'].'&&?page='.($halaman_sekarang - 1)).'"> Next </a>';
												}else{
													echo '<a class="next page-numbers" href="'.base_url('berita?page='.($halaman_sekarang - 1)).'"> Next </a>';
												}
											}
											for($i = 1; $i <= $total_halaman; $i++){
												if($i == $halaman_sekarang){
													echo "<span class='page-numbers current'>".$i."</span>";
												}else{
													if(isset($_GET['cari'])){
														echo "<a class='page-numbers' href='".base_url('berita?cari='.$_GET['cari'].'&&page='.$i)."'>".$i."</a>";
													}else{
														echo "<a class='page-numbers' href='".base_url('berita?page='.$i)."'>".$i."</a>";
													}
												}
											}
											if($halaman_sekarang != $total_halaman){
												if(isset($_GET['cari'])){
													echo '<a class="next page-numbers" href="'.base_url('berita?cari='.$_GET['cari'].'&&?page='.($halaman_sekarang + 1)).'"> Next </a>';
												}else{
													echo '<a class="next page-numbers" href="'.base_url('berita?page='.($halaman_sekarang + 1)).'"> Next </a>';
												}
											}
										}
									?>
								</div>
								
							</div>
							
							<div class="category-sidebar-right col-lg-4 col-md-4 col-sm-4 ">
								<aside style="margin-top:0px;" id="search-3" class="widget widget_search sidebar-right">
									<h2 class="widget-title">Search</h2>
									<form method="get" class="search-form" action="<?php echo base_url('berita'); ?>">
										<label>
											<span class="screen-reader-text">Search for:</span>
											<input type="search" class="search-field" placeholder="Search ..." value="<?php if(isset($_GET['cari'])){ echo $_GET['cari']; }?>" name="cari" title="Search for:" />
										</label>
										<input type="submit" class="search-submit" value="Search" />
									</form>
								</aside>
								<aside id="kiddie_recent_posts_widget-3" class="widget widget_kiddie_recent_posts_widget sidebar-right">
									<div class="ztl-widget-recent-posts-container ztl-widget-recent-posts-3">
										<h2 class="widget-title">Recent Posts</h2>
										<div class="ztl-widget-recent-posts">
											<ul class="recent-posts ztl-list-reset">
												<!-- the loop -->
												<?php foreach ($dataRandom as $berita): ?>
												<li class="item-post clearfix">
													<a href="<?php echo base_url('berita?detail=').$berita->id_berita.'&&name='.$berita->judul_seo; ?>" title="<?php echo $berita->judul_berita; ?>">
														<img width="300" height="300" src="<?php echo base_url('assets/images/berita/').$berita->userfile.$berita->userfile_type; ?>" 
														class="attachment-kiddie-square-thumb size-kiddie-square-thumb wp-post-image" alt="" 
														srcset="<?php echo base_url('assets/images/berita/').$berita->userfile.$berita->userfile_type; ?> 300w, 
														<?php echo base_url('assets/images/berita/').$berita->userfile.$berita->userfile_type; ?>, 
														<?php echo base_url('assets/images/berita/').$berita->userfile.$berita->userfile_type; ?>, 
														<?php echo base_url('assets/images/berita/').$berita->userfile.$berita->userfile_type; ?>" 
														sizes="(max-width: 300px) 100vw, 300px" />
													</a>
													<h6>
														<a href="<?php echo base_url('berita?detail=').$berita->id_berita.'&&name='.$berita->judul_seo; ?>" title="<?php echo $berita->judul_berita; ?>">
															<?php echo $berita->judul_berita; ?>
														</a>
													</h6>
													<span class="ztl-recent-post-date">
														<i class="flaticon-calendar64"></i>
														<a href="<?php echo base_url('berita?detail=').$berita->id_berita.'&&name='.$berita->judul_seo; ?>" title="<?php echo $berita->judul_berita; ?>">
															<?php echo $berita->time_upload; ?>
														</a>
													</span>
												</li>
												<?php endforeach;?>
											</ul>
										</div>	
									</div>
								</aside>
								<!--
								<aside id="archives-3" class="widget widget_archive sidebar-right">
									<h2 class="widget-title">Archives</h2>
									<ul>
										<li><a href='2017/01.html'>January 2017</a></li>
									</ul>
								</aside>
								<aside id="categories-3" class="widget widget_categories sidebar-right">
									<h2 class="widget-title">Categories</h2>
									<ul>
										<li class="cat-item cat-item-2"><a href="category/blog.html" title="Find out our latest news">Blog</a></li>
										<li class="cat-item cat-item-3"><a href="category/blog/events.html" title="Find out our latest events">Events</a></li>
										<li class="cat-item cat-item-4"><a href="category/blog/fun.html" title="Find out our latest fun activities">Fun</a></li>
										<li class="cat-item cat-item-5"><a href="category/blog/games.html" title="Find out what we play">Games</a></li>
									</ul>
								</aside>
								<aside id="tag_cloud-2" class="widget widget_tag_cloud sidebar-right">
									<h2 class="widget-title">Tags</h2>
									<div class="tagcloud">
										<a href="tag/tag1.html" class="tag-cloud-link tag-link-6 tag-link-position-1" 
										style="font-size: 22pt;" aria-label="Tag#1 (4 items)">Tag#1</a>
										<a href="tag/tag2.html" class="tag-cloud-link tag-link-7 tag-link-position-2" 
										style="font-size: 8pt;" aria-label="Tag#2 (2 items)">Tag#2</a>
										<a href="tag/tag3.html" class="tag-cloud-link tag-link-8 tag-link-position-3" 
										style="font-size: 22pt;" aria-label="Tag#3 (4 items)">Tag#3</a>
										<a href="tag/tag4.html" class="tag-cloud-link tag-link-9 tag-link-position-4" 
										style="font-size: 8pt;" aria-label="Tag#4 (2 items)">Tag#4</a>
									</div>
								</aside>
								!-->
							</div>
						</div>
					</div>
				</div>
				<div class="ztl-sidebar-area"></div>
			</div><!-- #content -->

			<?php $this->load->view('frontend/foot.php'); ?>
		</div>
		<?php $this->load->view('frontend/js_foot.php'); ?>
		<a href="#" class="ztl-scroll-top"><i class="fa fa-angle-up"></i></a>
	</body>
</html>