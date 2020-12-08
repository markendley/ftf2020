

	<header class="archive-header">
		<h1>Flow <?php echo $title; ?></h1>
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php
			wp_nav_menu( array(
				'theme_location'  => '',
				'menu'            => $menu,
				'container' => false,
				'menu_class' => 'tag-list btn-style-tags'

			) );
		?>
	</header>




	<?php if($paged == 0){ ?>


	<ul class="archive-tile-style category-features">

		<?php

		$args = array(
			'category_name'  => $category_name,
			'posts_per_page' => 1,
			'post_type' => $posttype,
		);
		$query = new WP_Query($args);

		if($query->have_posts()) :
			while($query->have_posts()) :
				$query->the_post();
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
				<p><?php echo limit_words(get_the_excerpt(  ) , 25) ; ?></p>
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
			$query = new WP_Query($args);

			if($query->have_posts()) :

				while($query->have_posts()) :
					$query->the_post();

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

	<?php } ?>








	<?php
		if(is_page('news')){
			if ( get_query_var('paged') ) {
				$paged = get_query_var('paged');
			} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
				$paged = get_query_var('page');
			} else {
				$paged = 1;
			}
			$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		}


		$current_page = get_query_var('paged');
		$current_page = max( 1, $current_page );

		$per_page = 12;
		$offset_start = 1;
		$offset = ( $current_page - 1 ) * $per_page + $offset_start;


		if($category_name == ''){

			$custom_query_args = array(
				'posts_per_page' => 60,
				'post_type' => $posttype,
				'paged' => $paged,
				'offset' => $offset,
				'post_status' => 'publish',
				'ignore_sticky_posts' => true,
				'order' => 'DESC',
				'orderby' => 'date'
			);

		} else {
			$custom_query_args = array(
				'category_name'  => $category_name,
				'posts_per_page' => 60,
				'post_type' => $posttype,
				'paged' => $paged,
				'offset' => $offset,
				'post_status' => 'publish',
				'ignore_sticky_posts' => true,
				'order' => 'DESC',
				'orderby' => 'date'
			);

		}

		$total_rows = max( 0, $post_list->found_posts - $offset_start );
		$total_pages = ceil( $total_rows / $per_page );




		$custom_query = new WP_Query( $custom_query_args );

		if ( $custom_query->have_posts() ) :  ?>

			<ul class="archive-tile-style post-container">


					<?php while( $custom_query->have_posts() ) : $custom_query->the_post();?>
						<?php if ($cc % 20 == 0) { ?>
							<?php if (function_exists ('adinserter') && $cc) echo adinserter (7); ?>
						<!--<li class="google-ad-landscape padded border-bottom border-top margin-bottom">
							<img src="http://placehold.it/728x90?text=Google+Ad" />
						</li>-->
						<?php } ?>
						<?php $cc++; ?>
						<?php include (TEMPLATEPATH . '/_inc/news-tile.php' ); ?>
					<?php endwhile; ?>
			</ul>

		<?php include (TEMPLATEPATH . '/_inc/pagination-numbered.php' ); ?>
		<?php else : ?>
			<p class="zero-results">Your search returned 0 results.</p>
		<?php endif; ?>

		<div class="loadmore-wrap">
			<a class="btn btn-wide loadmore" >Load more</a>
		</div>