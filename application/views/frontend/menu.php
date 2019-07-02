<div id="head-frame">
	<header id="masthead" class="site-header">		
		<div class="container">
			<div id="logo">
				<a href="<?php echo base_url(); ?>" rel="home">
					<img class="logo-img"  src="<?php echo base_url('assets/frontend/images/title3.png'); ?>" alt="Kiddie" data-rjs="2" />
				</a>
			</div>
			<div id="menu-toggle">
				<!-- navigation hamburger -->
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div id="nav-mobile-wrapper">
				<nav id="site-navigation" class="main-navigation">
					<div class="menu-main-menu-container">
						<ul id="menu-main-menu" class="menu">
							<li id="menu-item-3289" class="fa fa-lg flaticon-home118 menu-item menu-item-type-post_type menu-item-object-page menu-item-home <?php if($menuAktif == 1) echo 'current-menu-item page_item page-item-7 current_page_item'; ?> menu-item-3289"><a href="<?php echo base_url(); ?>">Home</a></li>
							<li id="menu-item-3261" class="fa fa-lg flaticon-toy56 menu-item menu-item-type-post_type menu-item-object-page menu-item-home <?php if($menuAktif == 2) echo 'current-menu-item page_item page-item-7 current_page_item'; ?> menu-item-3261"><a href="<?php echo base_url('profil'); ?>">Profil</a></li>
							<li id="menu-item-3260" class="fa fa-lg flaticon-tree112 menu-item menu-item-type-post_type menu-item-object-page menu-item-home <?php if($menuAktif == 3) echo 'current-menu-item page_item page-item-7 current_page_item'; ?> menu-item-3261"><a href="<?php echo base_url('agenda'); ?>">Agenda</a></li>
							<li id="menu-item-3263" class="fa fa-lg flaticon-trains3 menu-item menu-item-type-post_type menu-item-object-page menu-item-home <?php if($menuAktif == 4) echo 'current-menu-item page_item page-item-7 current_page_item'; ?> menu-item-3261"><a href="<?php echo base_url('artikel'); ?>">Artikel</a></li>
							<li id="menu-item-3262" class="fa fa-lg flaticon-apple55 menu-item menu-item-type-post_type menu-item-object-page menu-item-home <?php if($menuAktif == 5) echo 'current-menu-item page_item page-item-7 current_page_item'; ?> menu-item-3261"><a href="<?php echo base_url('berita'); ?>">News</a></li>
							<li id="menu-item-3353" class="fa fa-lg flaticon-shopping-bag menu-item menu-item-type-post_type menu-item-object-page menu-item-home <?php if($menuAktif == 6) echo 'current-menu-item page_item page-item-7 current_page_item'; ?> menu-item-3261"><a href="<?php echo base_url('galeri'); ?>">Galeri</a></li>
							<li id="menu-item-3270" class="fa fa-lg flaticon-rocket78 menu-item menu-item-type-post_type menu-item-object-page menu-item-3270"><a href="#contact">Contact</a></li>
						</ul>
					</div>
				</nav><!-- #site-navigation -->
				<div class="clear"></div>
			</div>
		</div>
	</header><!-- #masthead -->
</div>