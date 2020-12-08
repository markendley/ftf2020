<?php get_header(); ?>

<article>

	<?php
		$featuredimage_id = get_post_thumbnail_id();
		$featuredimage_url_array = wp_get_attachment_image_src($featuredimage_id, 'banner-image', true);
		$featuredimage_url = $featuredimage_url_array[0];
	?>

	<header class="article-banner" style="background-image:url(<?php echo $featuredimage_url; ?>)">
		<span class="h1 heading extra-large"><?php the_title(); ?></span>
	</header>

	<aside class="grey-panel">
		<span class="date">
			<?php echo '<span class="date-day">' . get_the_date( 'd' ) . '</span> '; ?>
			<?php echo '<span class="date-month">' . get_the_date( 'M' ) . '</span> '; ?>
			<?php echo '<span class="date-year">' . get_the_date( 'Y' ) . '</span>'; ?>
		</span>
		<?php
			if(get_field('long_blurb'))
			{
				echo '<h2 class="heading">' . get_field('long_blurb') . '</h2>';
			}
		?>
	</aside>



	<!--<div class="google-ad-landscape">
		<img src="http://placehold.it/970x250?text=Google+Ad" />
	</div>-->
	<hr class="fdgrey-line">




			<!-- section open -->
			<?php

				if(get_field('product_name'))
				{
					echo '
					<section id="bike-mod" class="row bike-mod specs-table">


						<div class="specs-table--heading">
							<h1>The not-so-minor details</h1>
						</div>

						<div class="specs-table-horiz">

							';
				}

			?>

			<!-- name -->
			<?php
				if(get_field('product_name'))
				{
					echo '<div class="col"><h2>Product</h2><p>' . get_field('product_name') . '</p></div>';
				}
			?>


			<!-- contact -->
			<?php if(get_field('product_name') ):

				while( have_rows('distributor') ): the_row();

					?>
					<div class="col">

						<h2>Contact</h2>

						<?php echo '<p>' .get_sub_field('distributor_name'). '</p>' ?>
						<?php echo '<p>' .get_sub_field('distributor_phone'). '</p>' ?>
						<?php echo '<p><a href="' .get_sub_field('distributor_email'). '"> '  .get_sub_field('distributor_email').  '</a></p> '?>
						<?php echo '<p><a href="' .get_sub_field('distributor_webiste'). '"> ' .get_sub_field('distributor_webiste'). '</a></p> '?>

					</div>

				<?php endwhile; ?>

			<?php endif; ?>



			<!-- they say -->
			<?php
				if(get_field('media_release'))
				{
					echo '<div class="col"><h2>They Say</h2><p>' . get_field('media_release') . '</p></div>';
				}
			?>

			<!-- Price -->
			<?php
				if(get_field('price'))
				{
					echo '<div class="col"><h2>Price</h2><p>' . get_field('price') . '</p></div>';
				}
			?>

			<!-- weight -->
			<?php
				if(get_field('weight'))
				{
					echo '<div class="col"><h2>Weight</h2><p>' . get_field('weight') . '</p></div>';
				}
			?>


			<?php if( have_rows('specs') ): ?>

				<?php while( have_rows('specs') ): the_row();

					// vars
					$key = get_sub_field('key');
					$value = get_sub_field('value');

					?>

					<div class="col">
						<h2><?php echo $key; ?></h2>
						<p><?php echo $value; ?></p>
					</div>

				<?php endwhile; ?>

			<?php endif; ?>


			<!-- Close open specs-table-horiz -->
			<?php
				if(get_field('product_name'))
				{
					echo '</div>
					<div class="specs-table-horiz">';
				}
			?>

			<!-- positives and negatives -->
			<?php

				if(get_field('positives'))
				{
					echo '<div class="col"><h2>Positives</h2><p>' . get_field('positives') . '</p></div>';
				}

				if(get_field('negatives'))
				{
					echo '<div class="col"><h2>Negatives</h2><p>' . get_field('negatives') . '</p></div>';
				}

			?>


			<?php

				if(get_field('product_name'))
				{
					echo '</div>
				</section>';
				}

			?>


		<?php

			$displayDetails = false;

			$productName	= get_post_meta($post->ID, flowmtb::$prefix.'product_name',true);
			$price			= get_post_meta($post->ID, flowmtb::$prefix.'price',true);
			$weight			= get_post_meta($post->ID, flowmtb::$prefix.'weight',true);
			$positives		= get_post_meta($post->ID, flowmtb::$prefix.'positives',true);
			$negatives		= get_post_meta($post->ID, flowmtb::$prefix.'negatives',true);

			if (! empty($productName)){
				echo '
			 	<section id="bike-mod" class="row bike-mod specs-table">

					<div class="specs-table--heading">
						<h1>The not-so-minor details</h1>
					</div>

					<div class="specs-table-horiz">

						<div class="col">
							<h2>Product</h2>
							<p>'.$productName.'</p>
						</div>

						<div class="col">
							<h2>Contact</h2>';
							$distributorContacts = array();

							foreach (array('phone','email','url') as $contactType){
								if ($contact =  get_post_meta($post->ID, flowmtb::$prefix.'distributor_'.$contactType,true)){
									$distributorContacts[ $contactType ] = $contact;
								}
							}
							$distributorCode	= '<p class="vcard"><span class="fn org">'.get_post_meta($post->ID, flowmtb::$prefix.'distributor_name',true).'</span>';
							if (isset($distributorContacts[ 'phone' ])){
								$distributorCode	.= '<br /><span class="tel">'.$distributorContacts[ 'phone' ].'</span>';
							}
							if (isset($distributorContacts[ 'email' ])){
								$distributorCode	.= '<br /><a href="mailto:'.$distributorContacts[ 'email' ].'" class="email">'.$distributorContacts[ 'email' ].'</a>';
							}
							if (isset($distributorContacts[ 'url' ])){

								$url = ($distributorContacts[ 'url' ]);

								$urlParts	= parse_url($url);

								$distributorCode	.= '<br /><a href="'.$url.'" class="url">'.$urlParts['host'].'</a>';

							}
							$distributorCode	.= '</p>';

							setlocale(LC_MONETARY, 'en_AU');
							//$price = empty($price) ? 'TBA' : money_format('%i',$price);

							echo $distributorCode.'
						</div>

						';

							if (! empty($price)){
								$price = money_format('%i',$price);
								echo '<div class="col"><h2><i class="ico ico-12 ico-price"></i> <span>Price</span></h2><p>'.$price.'</p></div>';
							}



							if (! empty($weight)){
								$weight = ($weight >= 2000) ? number_format($weight/1000,2).'kg' : number_format($weight).'gm';

								echo '<div class="col"><h2><i class="ico ico-12 ico-plus"></i> <span>Weight</span></h2><p>'.$weight.'</p></div>';
							}


							$metadata = get_post_custom($post->ID);

							$a = 0;
							while (isset($metadata[flowmtb::$prefix.'specs-key-'.$a])){
								$key	= $metadata[flowmtb::$prefix.'specs-key-'.$a][0];
								$val	= $metadata[flowmtb::$prefix.'specs-value-'.$a][0];
								if (! empty($key)){
									echo '<div class="col"><h2><i class="ico ico-12 ico-plus"></i> <span>'.$key.'</span></h2><p>'.$val.'</p></div>';
								}
								$a++;
							}
							echo '

					</div>


					<div class="specs-table-horiz">

						<div class="col">
							<h2><i class="ico ico-12 ico-plus"></i>Positives</h2>
							<p>'.$positives.'</p>
						</div>

						<div class="col">
							<h2><i class="ico ico-12 ico-negative"></i>Negatives</h2>
							<p>'.$negatives.'</p>
						</div>
					</div>
				</section>';
			}

			if ($media_release = get_post_meta($post->ID, flowmtb::$prefix.'media_release',true)){
				echo '<div class="indent event-details"><h3 class="speaker"><span>Us</span></h3><div class="us content_with_intro">';
			}

			?>

			<section class="article-content">
				<?php echo apply_filters('the_content',$post->post_content); ?>
			</section>

			<?php
			if ($media_release){
				echo "</div></div>";
				echo '<div class="indent"><h3 class="speaker"><span>Them</span></h3>';
				echo '<div class="them content_with_intro">'.apply_filters('the_content',$media_release).'</div>';
				echo "</div>";
			}
		?>



</article>


<aside class="related-posts" id="related">
	<span class="title toggle-parent">MO’ FLOW PLEASE!</span>
	<ul>

		<?php
			$currentID = get_the_ID();

			$currentpostType =  get_post_type( $currentID );

			$currentCats = array();
			foreach(get_the_category( ) as $cat){
				array_push($currentCats, $cat->term_id);
			}

			

			$currentTags = array();
			foreach(get_the_tags(  ) as $tag){
				array_push($currentTags, $tag->slug);
			}

			// var_dump( $currentCats );

			$args = array(
				'posts_per_page' => 4,
				'post_type' => $currentpostType,
				'post__not_in' => array($currentID),
				'tag' => $currentTags,
				'cat' => $currentCatss
			);
			$custom_posts = new WP_Query($args);

			if($custom_posts->have_posts()) :
				while($custom_posts->have_posts()) :
					$custom_posts->the_post();
			?>
				<li>
					<a href="<?php the_permalink(  ); ?>">
						<?php
						if(has_post_thumbnail(  )){
							the_post_thumbnail( 'category-thumb');
						}?>
						<span class="heading"><?php the_title() ?></span>
					</a>

				</li>


			<?php
			endwhile;
			else:
			endif;
			wp_reset_query(); ?>

	</ul>
</aside>




<?php get_footer(); ?>