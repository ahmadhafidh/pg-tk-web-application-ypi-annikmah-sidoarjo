<!DOCTYPE html>
<html lang="en-US">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title><?php echo ucwords(substr($status, 0, -1)); ?> | YPI</title>
		<?php $this->load->view('frontend/head.php'); ?>
	</head>
	
	<body class="home page-template page-template-template-home page-template-template-home-php page page-id-7 woocommerce-no-js wpb-js-composer js-comp-ver-5.4.2 vc_responsive">
		<div id="page" class="hfeed site ">
			<a class="skip-link screen-reader-text" href="#content">Skip to content</a>
			<?php $this->load->view('frontend/menu.php'); ?>
			
			
			<div id="content" class="site-content">
				<div class="category-listing clearfix" style="margin-top:40px">
					<div class="container">
						<div class="row">
							<div class="clearfix col-lg-8 col-md-8 col-sm-8 ">
								<?php 
									foreach ($data_detail as $data): 
									if($status == "agenda/"){
										$isi = $data->isi_agenda;
										$judul = $data->judul;
									}else if($status == "artikel/"){
										$isi = $data->isi_artikel;
										$judul = $data->judul_artikel;
									}else if($status == "berita/"){
										$isi = $data->isi_berita;
										$judul = $data->judul_berita;
									}else{
										$isi = "";
										$judul = "";
									}
								?>
								<div class="item">
									<article class="common-blog clearfix">
										<div class="title">
											<h5 class="entry-title"><a href=""><?php echo ucwords($judul); ?></a></h5>
										</div>
										<?php if($status != "artikel/"){ ?>
										<div class="image">
											<a href="#" title="<?php echo ucwords($judul); ?>">
												<img width="948" height="632" src="<?php echo base_url('assets/images/').$status.$data->userfile.$data->userfile_type; ?>" 
												class="attachment-kiddie-full size-kiddie-full wp-post-image" alt="" 
												srcset="<?php echo base_url('assets/images/').$status.$data->userfile.$data->userfile_type; ?> 948w, 
												<?php echo base_url('assets/images/').$status.$data->userfile.$data->userfile_type; ?> 600w, 
												<?php echo base_url('assets/images/').$status.$data->userfile.$data->userfile_type; ?> 300w, 
												<?php echo base_url('assets/images/').$status.$data->userfile.$data->userfile_type; ?> 768w, 
												<?php echo base_url('assets/images/').$status.$data->userfile.$data->userfile_type; ?> 500w" 
												sizes="(max-width: 948px) 100vw, 948px" data-no-retina="">
											</a>
										</div>
										<?php } ?>
										<div class="info">
											
											<span>
												<i class="flaticon-calendar64"></i><?php echo $data->time_upload; ?>
											</span>
											<span>
												<i class="flaticon-squares36"></i>
												<a href="#"><?php echo ucwords(substr($status, 0, -1)); if($status == "artikel/"){ echo "-".$data->kategori; }?></a>
											</span>
											<span>
												<i class="flaticon-avatar26"></i>
												<a href="#" title="Posts by <?php echo $data->uploader; ?> " rel="author"><?php echo $data->uploader; ?> </a>
											</span>
											<span>
												<i class="flaticon-note10"></i>
												<a href="#">
													0                    Comments                </a>
											</span>
										</div>
										<div class="text-content"> 
											<?php echo $isi; ?>
										</div>
									</article>
								</div>
								<?php endforeach;?>
								<!--
								<nav class="navigation post-navigation">
									<h2 class="screen-reader-text">Post navigation</h2>
									<div class="nav-links">
										<div class="nav-previous">
											<span class="meta-nav"></span>
											<i class="fa fa-chevron-left"></i>
											<a href="http://www.zoutula.com/themes/kiddie/blog/planting-seeds-in-the-hearts-of-preschoolers/%20" rel="prev">Planting Seeds in the Hearts of Preschoolers</a>
										</div>
										<div class="nav-next">
											<a href="http://www.zoutula.com/themes/kiddie/blog/play-is-our-brains-favorite-way-of-learning/%20" rel="next">Play is Our Brain’s Favorite Way of Learning</a>
											<span class="meta-nav"></span>
											<i class="fa fa-chevron-right"></i>
										</div>
									</div>
								</nav>
								-->
							</div>
							
							<div class="category-sidebar-right col-lg-4 col-md-4 col-sm-4 ">
								<aside style="margin-top:0px;" id="search-3" class="widget widget_search sidebar-right">
									<h2 class="widget-title">Search</h2>
									<form method="get" class="search-form" action="<?php echo base_url().substr($status, 0, -1); ?>">
										<label>
											<span class="screen-reader-text">Search for:</span>
											<input type="search" class="search-field" placeholder="Search ..." value="" name="cari" title="Search for:" />
										</label>
										<input type="submit" class="search-submit" value="Search" />
									</form>
								</aside>
								<?php if($status == "artikel/"){ ?>
								<aside id="text-5" class="widget widget_text sidebar-right">
									<h2 class="widget-title">Kategori</h2>
									<div class="textwidget">
										<ul>
											<?php foreach ($dataKategori as $kategori): ?>
											<li><a href="<?php echo base_url('artikel?kategori=').$kategori->judul_kategori; ?>"><?php echo $kategori->judul_kategori; ?></a></li>
											<?php endforeach;?>
										</ul>
									</div>
								</aside>
								<?php } ?>
								<aside id="kiddie_recent_posts_widget-3" class="widget widget_kiddie_recent_posts_widget sidebar-right">
									<div class="ztl-widget-recent-posts-container ztl-widget-recent-posts-3">
										<h2 class="widget-title">Recent Posts</h2>
										<div class="ztl-widget-recent-posts">
											<ul class="recent-posts ztl-list-reset">
												<!-- the loop -->
												<?php 
													foreach ($dataRandom as $data):
													if($status == "agenda/"){
														$id = $data->id_agenda;
														$judul2 = $data->judul;
													}else if($status == "artikel/"){
														$id = $data->id_artikel;
														$judul2 = $data->judul_artikel;
													}else if($status == "berita/"){
														$id = $data->id_berita;
														$judul2 = $data->judul_berita;
													}else{
														$id = "";
														$judul2 = "";
													}
												?>
												<li class="item-post clearfix">
													<?php if($status != "artikel/"){ ?>
													<a href="<?php echo base_url(substr($status, 0, -1).'?detail=').$id.'&name='.$data->judul_seo; ?>" title="<?php echo $judul; ?>">
														<img width="300" height="300" src="<?php echo base_url('assets/images/').$status.$data->userfile.$data->userfile_type; ?>" 
														class="attachment-kiddie-square-thumb size-kiddie-square-thumb wp-post-image" alt="" 
														srcset="<?php echo base_url('assets/images/').$status.$data->userfile.$data->userfile_type; ?> 300w, 
														<?php echo base_url('assets/images/').$status.$data->userfile.$data->userfile_type; ?>, 
														<?php echo base_url('assets/images/').$status.$data->userfile.$data->userfile_type; ?>, 
														<?php echo base_url('assets/images/').$status.$data->userfile.$data->userfile_type; ?>" 
														sizes="(max-width: 300px) 100vw, 300px" />
													</a>
													<?php } ?>
													<h6>
														<a href="<?php echo base_url(substr($status, 0, -1).'?detail=').$id.'&name='.$judul2; ?>" title="<?php echo $judul2; ?>">
															<?php echo $judul2; ?>
														</a>
													</h6>
													<span class="ztl-recent-post-date">
														<i class="flaticon-calendar64"></i>
														<a href="<?php echo base_url(substr($status, 0, -1).'?detail=').$id.'&name='.$judul2; ?>" title="<?php echo $judul2; ?>">
															<?php echo $data->time_upload; ?>
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