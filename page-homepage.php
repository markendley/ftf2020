<?php get_header(); ?>




	<section class="homepage-topfold  <?php if(get_field('video_full_screen_mode')){ echo ' fullvideoplay '; }?> ">

		<?php if(get_field('video_link')) {  ?>
			<a class="video-link" href="<?php echo get_field('video_link')['url']; ?>" 
				target="<?php echo get_field('video_link')['target']; ?>">
		<?php } ?>




		<div class="homepage-banner-inner">

			<div class="homepage-banner" id="homepage-banner">

				<?php if( get_field('video-image') == 'Video' ){ ?>
						<div id="player"></div>
				<?php } ?>


				<?php if( get_field('video-image') == 'Image' ) { ?>

					<div class="image-banner match-height">

						<?php
						$images = get_field('image_rotator');
						if( $images ): ?>
							<div class="" id="simpleslideshow">
								<?php foreach( $images as $image ): ?>
									<div>
										<img src="<?php echo $image['sizes']['banner-image']; ?>" alt="<?php echo $image['alt']; ?>" />
									</div>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>

					</div>
				<?php } ?>


			</div>
			<div class="main-header-banner-text ">

				<?php if(get_field('video_blurb')){ ?>
					<div class="title banner-text-item"><?php the_field('video_blurb'); ?></div>
				<?php } ?>

				<?php if( have_rows('banner_button') ): ?>

					<?php while( have_rows('banner_button') ): the_row();

						$link = get_sub_field('button_link');
						$linktext = get_sub_field('button_text');
						$linktarget = get_sub_field('link_target');
						?>

						<?php if(get_sub_field('button_link')) { ?>
							<a target="<?php echo $linktarget; ?>" class="btn btn-white" href="<?php echo $link; ?>"><?php echo $linktext; ?></a>
						<?php } ?>

					<?php endwhile; ?>

				<?php endif; ?>

			</div>
		</div>


		<?php if(get_field('video_link')) {  ?>
			</a>
		<?php } ?>


	
	</section>


	<!--<div class="google-ad-landscape padded border-bottom">
		<img src="http://placehold.it/970x250?text=Google+Ad" />
	</div>-->


	<ul class="archive-tile-style category-features">

		<?php

		$args = array(
			'category_name'  => $category_name, 
			'posts_per_page' => 1,
			'post_type' => $posttype,
		);
		$custom_posts = new WP_Query($args);

		if($custom_posts->have_posts()) : 
			while($custom_posts->have_posts()) : 
				$custom_posts->the_post();
		?>

			<li class="standout">
				<a href="<?php the_permalink() ?>" class="image-wrap">
					<?php 
					if(has_post_thumbnail(  )){
						the_post_thumbnail( 'large'); 
					}else { ?>
					
						<img src="<?php echo get_template_directory_uri(  ); ?>/_assets/images/placeholder-400x230.png" alt="placeholder" />
					<?php }?>
				</a>
				<h2 class="heading"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				<p><?php 
					if(get_field('long_blurb')){
						echo get_field('long_blurb');
					}else {
						echo limit_words(get_the_excerpt(  ) , 25) ; 

					}
				
					
					
				?></p>
			</li>


		<?php
		endwhile;
		else: 
		endif;
		wp_reset_query(); ?>

		<?php

			$args = array(
				'category_name'  => $category_name, 
				'posts_per_page' => 3,
				'offset' => 1,
				'post_type' => $posttype,

			);
			$custom_posts = new WP_Query($args);

			if($custom_posts->have_posts()) : 
				while($custom_posts->have_posts()) : 
					$custom_posts->the_post();
			?>

				<li class="overlay-heading <?php if(!has_post_thumbnail(  )){ echo 'no-image'; }?>">
					<a href="<?php the_permalink() ?>" class="image-wrap">
						<?php 
						if(has_post_thumbnail(  )){
							the_post_thumbnail( 'category-thumb'); 
						}else { ?>
						
							<img src="<?php echo get_template_directory_uri(  ); ?>/_assets/images/placeholder-400x230.png" alt="placeholder" />
						<?php }?>
					</a>
					<h2 class="heading"><a href="<?php the_permalink() ?>"><?php 
					
					echo limit_words(get_the_title(  ) , 10) ; 

					
					?></a></h2>
				</li>


			<?php
			endwhile;
			else: 
			endif;
			wp_reset_query(); ?>

		<li class="adspace ">

			<!--<div class="google-ad-portait">
				<img src="http://placehold.it/300x600?text=Google+Ad" />
			</div>-->


		
		</li>
	</ul>

	<ul class="archive-tile-style hide-md-bp hide-lg-bp">
		<?php
		$category_name = 'post-all';
		$posttype = "post";

		$custom_query_args = array(
			'category_name'  => $category_name, 
			'posts_per_page' => 4,
			'post_type' => $posttype,
			'offset' => 4,
			'post_status' => 'publish',
			'ignore_sticky_posts' => true,
			'order' => 'DESC', // 'ASC'
			'orderby' => 'date' // modified | title | name | ID | rand
		);

		$custom_query = new WP_Query( $custom_query_args );


			$count = 1;
			$ad_count = 1;
			while( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

				<?php include (TEMPLATEPATH . '/_inc/news-tile.php' ); ?>
			<?php endwhile; ?>
			<?php
				wp_reset_postdata(); // reset the query
		?>
	</ul>



	<section class="background-stretch-full-width-fdgrey big-and-small">
		<h2 class="title homepage-block-title"><a href="<?php echo get_site_url(); ?>/reviews/">Flow Reviews</a></h2>

		<div class="big-tiles-wrap">
			<ul class="archive-tile-style big-tiles">

			<?php
				query_posts( array(
					'post_type'  => 'review',
					'posts_per_page' => 4
				) );
			?>
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
				<?php include (TEMPLATEPATH . '/_inc/news-tile.php' ); ?>

				<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_query(); ?>


			</ul>
		</div>

		<div class="small-tiles-wrap reviewclickanddrag ">

			<ul class="archive-tile-style small-tiles ">

			<?php
				query_posts( array(
					'post_type'  => 'review',
					'posts_per_page' => 10
				) );
			?>
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
				<?php include (TEMPLATEPATH . '/_inc/news-tile.php' ); ?>

				<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_query(); ?>


			</ul>
		</div>



	</section>


	<!--<div class="google-ad-landscape padded border-bottom">
		<img src="http://placehold.it/728x90?text=Google+Ad" />
	</div>-->



	<section class="big-and-small-style2">
		<h2  class="title homepage-block-title"><a href="<?php echo get_site_url(); ?>/features-all">Flow Features</a></h2>

		<div class="big-tiles-wrap">
			<ul class="archive-tile-style big-tiles">

			<?php
				query_posts( array(
					'post_type'  => 'feature',
					'posts_per_page' => 4
				) );
			?>
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
				<?php include (TEMPLATEPATH . '/_inc/news-tile.php' ); ?>

				<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_query(); ?>


			</ul>
		</div>
		<div class="small-tiles-wrap featuresclickanddrag">

			<ul class="archive-tile-style small-tiles ">

			<?php
				query_posts( array(
					'post_type'  => 'feature',
					'posts_per_page' => 12
				) );
			?>
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
				<?php include (TEMPLATEPATH . '/_inc/news-tile.php' ); ?>

				<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_query(); ?>


			</ul>
		</div>


	</section>

	<form action="https://flowmountainbike.us7.list-manage.com/subscribe/post?u=adc243d82176a5d02f930fe0a&amp;id=c02653a1c7" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="subscribe-form ajaxchimp validate" target="_blank" novalidate>

			<div class="intro">
				<h3 class="heading"><?php echo get_field('subscribe', 'option')['heading']; ?></h3>
				<p class="message"><?php echo get_field('subscribe', 'option')['body']; ?></p>
			</div>			
			<div class="fields">

				<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email address">



				<!-- <div class="checkbox">
					<input type="checkbox" value="1" name="group[1][1]" id="mce-group[1]-1-0">
					<label for="mce-group[1]-1-0">I live in Australia</label>
				</div> -->

				<div style="position: absolute; left: -5000px;" aria-hidden="true">
					<input type="text" name="b_7ea89b452ec6219f24cfb930b_d95ade81c3" tabindex="-1" value="">
				</div>
				<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_adc243d82176a5d02f930fe0a_c02653a1c7" tabindex="-1" value=""></div>

				<input type="submit" value="Sign me up!" name="subscribe" id="mc-embedded-subscribe" class="btn btn-fdgrey">
			</div>


			<?php if( get_field('subscribe', 'option')['image_mobile'] ){ ?>
				<div class="bkgd mobile-bkgd" style="background-image:url(<?php echo get_field('subscribe', 'option')['image_mobile']['url']; ?>)"></div>

			<?php } else {  ?>
				<div class="bkgd mobile-bkgd" style="background-image:url(<?php echo get_field('subscribe', 'option')['image']['url']; ?>)"></div>

			<?php }?>


			<div class="bkgd desktop-bkgd" style="background-image:url(<?php echo get_field('subscribe', 'option')['image']['url']; ?>)"></div>




<!--End mc_embed_signup-->





	</form>




	<?php 
		$args = array(
			'posts_per_page' => 1,
			'post_type' => 'video'
		);
		$custom_posts = new WP_Query($args);
		if($custom_posts->have_posts()) : ?>

	<div class="background-color-fdgrey">
		<section class="video-player-section">
			<h2 class="title homepage-block-title">Flow Video</h2>

				<?php
					while($custom_posts->have_posts()) : 
					$custom_posts->the_post(); ?>

					<div class="mainvideo">
						<div class="videowrap">
							<iframe 
									width="560" height="315" src="https://www.youtube.com/embed/<?php echo get_field('youtube'); ?>" 
									frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
						<?php the_content(  ); ?>
					</div>

				<?php
					endwhile;
					wp_reset_query(); ?>

			<div class="video-thumbnails-outerwrap">
				<div class="video-thumbnails-wrap reviewclickanddragvideothumbs">

					<div class="video-thumbnails ">
						<?php
						$cc = 0;
						$args = array(
							'posts_per_page' => -1,
							'post_type' => 'video'
						);
						$custom_posts = new WP_Query($args);

						while($custom_posts->have_posts()) : 
							$custom_posts->the_post(); 
							$cc++;
							?>

							<a href="#" data-video="https://www.youtube.com/embed/<?php echo get_field('youtube'); ?>" data-content="<?php the_content( ); ?>" class="<?php if($cc == 1){ echo 'active'; }?>">
								<?php if(has_post_thumbnail(  )) { ?>
									<?php the_post_thumbnail( '275x165' )?>
								<?php } else { ?>
									<img src="http://placehold.it/275x165" />								
								<?php } ?>

							</a>

						<?php
							endwhile;
							wp_reset_query(); ?>
					</div>
				</div>

			</div>
		</section>
	</div>

	<?php 
		else: 
		endif;
	?>




	<section class="logo-grid">
		<h3 class="heading homepage-block-title">Flow Mountain Bike is proud to partner with:</h3>
		<?php
		$images = get_field('logogrid');
		$size = 'full';
			if( $images ): ?>
			<ul class="">
				<?php foreach( $images as $image ): ?>
					<li>
						<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>
		</div>
	</section>



	<?php get_footer(); ?>