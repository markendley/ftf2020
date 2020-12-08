<?php 


	/* For Custom queries
	========================= */

	

	$page_count = 9;

	if ( null == $query ) {
		global $wp_query;
		$query = $wp_query;
	}

	if ( 1 >= $query->max_num_pages ) {
		return;
	}




	$big = 9999999999; // need an unlikely integer

	echo '<nav class="pagination pagination-numbered">';
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var( 'paged' ) ),
		'total' => $query->max_num_pages,
		'end_size' => 0,
		'mid_size' => $page_count,
		'next_text' => __( 'Next &xrarr;', 'textdomain' ),
		'prev_text' => __( '&lrarr; Previous', 'textdomain' ),
		'type'               => 'plain',
		'add_args'           => false,
		'add_fragment'       => '',
		'before_page_number' => '',
		'after_page_number'  => ''
	) );
	echo '</nav>';

		
?>