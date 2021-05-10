<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(  ); ?>/favicons/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(  ); ?>/favicons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(  ); ?>/favicons/favicon-16x16.png">
		<link rel="manifest" href="<?php echo get_template_directory_uri(  ); ?>/favicons/site.webmanifest">
		<link rel="mask-icon" href="<?php echo get_template_directory_uri(  ); ?>/favicons/safari-pinned-tab.svg" color="#000000">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="theme-color" content="#ffffff">
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(  ); ?>/favicons/favicon.ico" type="image/x-icon" />

		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<?php if (is_search()) { ?>
		   <meta name="robots" content="noindex, nofollow" /> 
		<?php } ?>
		<title>
			<?php if (function_exists('is_tag') && is_tag()) {
				single_tag_title('Tag Archive for &quot;'); echo '&quot; - ';
			} elseif (is_archive()) {
				wp_title(''); echo ' Archive - ';
			} elseif (is_search()) {
				echo 'Search for &quot;'.wp_specialchars($s).'&quot; - ';
			} elseif (!(is_404()) && (is_single()) || (is_page())) {
				wp_title(''); echo ' - ';
			} elseif (is_404()) {
				echo 'Not Found - ';
			}
			if (is_home()) {
				bloginfo('name'); echo ' - '; bloginfo('description');
			} else {
				bloginfo('name');
			}
			if ($paged > 1) {
				echo ' - page '. $paged;
			} ?>
		</title>


		<!-- Start GPT Async Tag -->
		<script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
		<script>
		var gptadslots = [];
		var googletag = googletag || {cmd:[]};
		</script>
		<!-- Adsense -->
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({
			google_ad_client: "ca-pub-8769821657299120",
			enable_page_level_ads: true
		});
		</script>
		<!-- End Adsense -->



		<meta name="google-site-verification" content="4-6EuKqVLsvLx0R9uzYSPvyYwKMlgtRLSBm6AMwORig" />

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<meta name="msapplication-tap-highlight" content="no">

		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?v=5" type="text/css" />
		<link rel="profile" href="http://gmpg.org/xfn/11">

		<?php wp_head(); ?>
		<?php // http://realfavicongenerator.net ?>
		










		<noscript>
			<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/_assets/styles/css/nojs.css" type="text/css" />
		</noscript>

	</head>
	<?php 



		if($post){
			$post_slug = "  fadein page-id-".$post->post_name;			
		}else {
			$post_slug = '   fadein ';
		}



?>
	<body <?php body_class($post_slug); ?> <?php 
	if(get_field('polite_takeover')['background_color']){  ?>
		style="background-color: <?php echo get_field('polite_takeover')['background_color']; ?>"
	<?php } ?>>
		<!-- Hotjar Tracking Code for https://flowmountainbike.com/ -->
			<script>
			(function(h,o,t,j,a,r){
				h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
				h._hjSettings={hjid:2184315,hjsv:6};
				a=o.getElementsByTagName('head')[0];
				r=o.createElement('script');r.async=1;
				r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
				a.appendChild(r);
			})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
		</script>

		<header class="main-header">

			<a href="<?php echo home_url(); ?>/" class="logo"><?php echo bloginfo('name'); ?></a>

			<nav>
				<?php
					wp_nav_menu( array(
						'theme_location'  => '',
						'menu'            => 'Primary Menu',
						'container' => false
					) );

				?>
			</nav>

			<div class="search-form" id="searchform">
				<form action="<?php echo get_site_url(); ?>" method="get" >
					<input type="text" name="s" value="" placeholder="Search Flow" id="searchform-field"/>
					<button type="submit" class="btn btn-search">Go</button>
				</form>
				<button class="btn btn-search show-form" id="searchform-btn">Go</button>
			</div>

			
		</header>


