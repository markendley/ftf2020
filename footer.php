

		<section class="main-bottom background-stretch-full-width-black">

			<?php
				wp_nav_menu( array(
					'theme_location'  => '',
					'menu'            => 'Foot Menu row 1',
					'menu_class' => 'foot-nav',
					'container' => false
				) );
			?>

			<?php
				wp_nav_menu( array(
					'theme_location'  => '',
					'menu'            => 'Foot Menu row 2',
					'menu_class' => 'foot-nav',
					'container' => false
				) );
			?>
			<?php
				wp_nav_menu( array(
					'theme_location'  => '',
					'menu'            => 'Foot Menu row 3',
					'menu_class' => 'foot-nav',
					'container' => false
				) );
			?>



			<ul class="social-media-links">
				<li><a href="https://www.facebook.com/flowmountainbike" target="_blank"><?php include (TEMPLATEPATH . '/_assets/images/facebook-icon.svg' ); ?></a></li>
				<li><a href="https://www.instagram.com/Flow_MTB" target="_blank"><?php include (TEMPLATEPATH . '/_assets/images/instagram-icon.svg' ); ?></a></li>
				<li><a href="https://www.youtube.com/user/FlowMountainBike" target="_blank"><?php include (TEMPLATEPATH . '/_assets/images/youtube-icon.svg' ); ?></a></li>
			</ul>		
		
			<footer>
				<a href="<?php echo home_url(); ?>/"><?php include (TEMPLATEPATH . '/_assets/images/Flow-Logo.svg' ); ?></a>
				<span class="copyright">Copyright &copy; <?php echo date("Y"); echo " "; bloginfo('name'); ?></span>
			</footer>		
		</section>





		<?php wp_footer(); ?>

		<script src="https://www.googletagservices.com/tag/js/gpt.js"> googletag.pubads().definePassback("/30025404/flowmountainbike.gallery", "fluid", [300, 250]).display();</script>

		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-35442815-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-35442815-1');
		</script>


		<script>
		// Array.prototype.map.call(document.querySelectorAll('img'), function(img) {
		// 	img.src = img.src.replace('media.flowmtbstage.wpengine.com', 'media.flowmountainbike.com');
		// });

		

		

		</script>


			<?php if(get_field('homepage_advertisements_setting', 'option') == "Display full takeover"){ ?>	
				<script>
					window.addEventListener('load', function(){
						window.addEventListener('scroll', function(){
							var thevalue = (100/window.innerHeight) * (window.pageYOffset)/100;
							document.getElementById('fulltakeover').style.opacity = 1 - thevalue;
						})

					});
				</script>



			<?php } ?>

		<?php if(is_single(  )) { ?>
			<script>
				jQuery(document).ready(function(){

					jQuery('.modal').on('click', function(){
						jQuery('.modal').fadeOut();
						jQuery('.modal div').attr('style', '');
					});
				});

				jQuery('.gallery-icon a').each(function(){
					var childSrc = jQuery(this).find('img').attr('src');

					var newHref = childSrc.substring(0, childSrc.lastIndexOf('-')) + childSrc.substring(childSrc.lastIndexOf('.'));

					jQuery(this).attr('href', newHref);

					jQuery(this).on('click', function(e){
						e.preventDefault();

						var theHref = jQuery(this).attr('href');

						jQuery('.modal div').attr('style', 'background-image:url(' + theHref + ')');

						jQuery('.modal').fadeIn();
					});

				});

			</script>

			<div class="modal">
				<div></div>
			</div>

		<?php } ?>



		<?php if( get_field('video-image') == 'Video' ){ ?>

			<script>
				var tag = document.createElement('script');
				tag.src = "https://www.youtube.com/iframe_api";
				var firstScriptTag = document.getElementsByTagName('script')[0];
				firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

				var player;
				function onYouTubeIframeAPIReady() {
				player = new YT.Player('player', {
					// height: '1080',
					// width: '1920',
					width:'100%',
					height: 'auto',
					videoId: '<?php the_field('video_banner'); ?>',
					playerVars: {
						'controls': 0,
						'disablekb': 1,
						'modestbranding': 1,
						'rel': 0,
						'showinfo': 0,
						'autoplay': 1,
						'start': 1,
						'autoplay': 1
					},
					events: {
						'onReady': onPlayerReady
					}
				});
				}

				function onPlayerReady(event) {
					event.target.setVolume(0);
					event.target.playVideo();
					document.getElementById('homepage-banner').classList.add('ready');
				}
			</script>		
		
		<?php } ?>



		<?php if( get_field('video-image') == 'Image' ) { ?>
		<script>	
			jQuery("#simpleslideshow > div:gt(0)").hide();

			setInterval(function() {
			jQuery('#simpleslideshow > div:first')
				.fadeOut(1000)
				.next()
				.fadeIn(1000)
				.end()
				.appendTo('#simpleslideshow');
			}, 3000);		
		</script>		

		<?php } ?>



		<noscript>
			<span class="warning nojs-warn">
				<span>This website requires Javascript for optimum viewing purposes. Please <a href="http://enable-javascript.com" target="_blank">enable javascript</a> in your browser.</span>
			</span>
		</noscript>



		<span class="warning datedbrowser-warn">
			<span>It appears you're using an old version of Internet Explorer which is <a href="https://www.microsoft.com/en-au/windowsforbusiness/end-of-ie-support" target="_blank">no longer supported</a>, for safer and optimum browsing experience please upgrade your browser.</span>
		</span>



	</body>

</html>
