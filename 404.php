<?php get_header(); ?>


	<article class="plain-page">
	
		<h1 class="page-title"><?php esc_html_e( 'Oops!! That page can&rsquo;t be found.', 'feeltheflow' ); ?></h1>

		<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'feeltheflow' ); ?></p>

		<?php
			get_search_form();

		?>



	</article>

<?php get_footer(); ?>
