<?php get_header(); ?>


		<header class="archive-header">
			<h1>Search: <span class="text-color-red"><?php the_search_query(); ?></span></h1>
		</header>
		

		<?php if (have_posts()) : ?>
		<ul class="archive-list-style post-container">

				<?php while (have_posts()) : the_post(); ?>
		

				<li class="<?php if(!has_post_thumbnail(  )){ echo 'no-image'; }?>"><a href="<?php the_permalink() ?>" class="image-wrap">
						<?php 
						if(has_post_thumbnail(  )){
							the_post_thumbnail( 'category-thumb'); 
						}?>
					</a>
					<h2 class="heading"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					<p class="search-meta">Posted on <a href="<?php the_permalink() ?>"><?php
					
					echo get_the_date('F j, Y');
					
					?></a> by <a href="<?php 
					echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
					?>"><?php 
					
					echo esc_html( get_the_author() ) ;
					?></a>
					
					<?php 

					$categories_list = get_the_category_list(', ');
					if ( $categories_list ) {
						printf( '<span class="cat-links">' . esc_html__( 'in %1$s' ) . '</span>', $categories_list );
					}
					?>
					
					</p>
					<p><?php echo get_the_excerpt(  ); ?></p>
					<?php  echo get_the_tag_list('<p class="p-tag-list">Tags: ',' | ','</p>'); ?>


				</li>
			
				<?php endwhile; ?>
			
		</ul>
		<?php 
		$query = null;
		include (TEMPLATEPATH . '/_inc/pagination-numbered.php' ); ?>
		<?php else : ?>
			<p class="zero-results">Your search returned 0 results.</p>
		<?php endif; ?>
		<div class="loadmore-wrap">

			<a class="btn btn-wide loadmore-search" >Load more</a>
		</div>


<?php get_footer(); ?>
