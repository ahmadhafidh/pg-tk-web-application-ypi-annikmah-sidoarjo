<footer id="colophon" class="site-footer">
	<div class="sidebar-footer">
		<div class="container">
			<div class="row">
				<aside id="text-3" class="widget col-sm-4 widget_text"><h2 class="widget-title">Tentang Kami</h2>
					<div class="textwidget">
						<div class="col-sm-12">
							Lembaga pendidikan Al – Azizi berupaya menjadi lembaga pendidikan yang mampu mengemban amanah 
							untuk meningkatka kompetensi anak bangsa yang kompetitif serta mampu memberikan altenatif dalam dunia pendidikan.
						</div>
						<div class="col-sm-6">
							<img src="<?php echo base_url('assets/frontend/images/alazizi.png'); ?>" style="max-width:100px; display:block; margin-top:2.5rem;" alt="Kiddie"/>
						</div>
						<div class="col-sm-6">
							<img src="<?php echo base_url('assets/frontend/images/ypi.png'); ?>" style="max-width:100px; display:block; margin-top:2.5rem;" alt="Kiddie"/>
						</div>
					</div>
				</aside>
				<aside id="contact" class="widget col-sm-4 widget_kiddie_recent_posts_widget">
					<div class="ztl-widget-recent-posts-container ztl-widget-recent-posts-2">
						<h2 class="widget-title">Agenda Terbaru</h2>
						<div class="ztl-widget-recent-posts">
							<ul class="recent-posts ztl-list-reset">
								<!-- the loop -->
								<?php foreach ($agenda_dataFoot as $agenda): ?>
								<li class="item-post clearfix">
									<a href="#" title="New Friends Everyday at Kiddie">
										<img width="300" height="300" src="<?php echo base_url('assets/images/agenda/').$agenda->userfile.$agenda->userfile_type; ?>" 
										class="attachment-kiddie-square-thumb size-kiddie-square-thumb wp-post-image" alt="" 
										srcset="<?php echo base_url('assets/images/agenda/').$agenda->userfile.$agenda->userfile_type; ?> 300w, 
										<?php echo base_url('assets/images/agenda/').$agenda->userfile.$agenda->userfile_type; ?> 100w, 
										<?php echo base_url('assets/images/agenda/').$agenda->userfile.$agenda->userfile_type; ?> 150w, 
										<?php echo base_url('assets/images/agenda/').$agenda->userfile.$agenda->userfile_type; ?> 600w" 
										sizes="(max-width: 300px) 100vw, 300px" />
									</a>
									<h6>
										<a href="#" title="New Friends Everyday at Kiddie">
											<?php echo $agenda->judul; ?>
										</a>
									</h6>
									<span class="ztl-recent-post-date">
										<i class="flaticon-calendar64"></i>
										<a href="#" title="New Friends Everyday at Kiddie">
											<?php echo $agenda->time_upload; ?>
										</a>
									</span>
								</li>
								<?php endforeach;?>
							</ul>
						</div>
					</div>
				</aside>
				<aside id="text-4" class="widget col-sm-4 widget_text">
					<h2 class="widget-title">Kontak Kami</h2>
					<div class="textwidget">
						<ul>
							<li>Phone : 085748257727</li>
							<li>Mail : elfanefendi88@gmail.com</li>
							<li>Address : Desa Sumber Mulyo, Kecamatan Jogoroto, Kabupaten Jombang</li>
						</ul>
					</div>
					<div id="map"></div>
					<script>
					  function initMap() {
						var uluru = {lat: -7.557575, lng: 112.252857};
						var map = new google.maps.Map(document.getElementById('map'), {
						  zoom: 13,
						  center: uluru
						});
						var marker = new google.maps.Marker({
						  position: uluru,
						  map: map
						});
					  }
					</script>
					<script async defer
					src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhsbVrSKRTj4tYRBWZkObb9rqiTCV063o&callback=initMap">
					</script>
				</aside>
			</div>
		</div>
	</div>
	
	<div class="site-info">			
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-xs-12">
					<div id="ztl-copyright">
						© 2018 <a href="#">Kiddie</a> Theme crafted with <i style="color:#f25141" class="fa fa-heart"></i> in Bucharest
					</div>
				</div>
				<div class="col-sm-6 col-xs-12">
					<ul id="ztl-social">
						<li> <a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
						<li> <a href="#" title="Instagram"><i class="fa fa-instagram"></i></a></li>
						<li> <a href="#" title="Google +"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div><!-- .site-info -->
</footer><!-- #colophon -->