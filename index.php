<?php get_header(); ?>

<header class="archive-header">

	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	
	<?php /* If this is a category archive */ if (is_category()) { ?>
		<h1>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h1>

	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h1>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>

	<?php /* If this is a custom post type archive */ } elseif( is_post_type_archive() ) { ?>
		<h1><?php post_type_archive_title(); ?></h1>

	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h1>Archive for <?php the_time('F jS, Y'); ?></h1>

	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h1>Archive for <?php the_time('F, Y'); ?></h1>

	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h1>Archive for <?php the_time('Y'); ?></h1>

	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h1>Archive for <?php echo esc_html( get_the_author() ) ; ?></h1>

	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h1>Blog Archives</h1>
	
	<?php } ?>


</header>


<?php if (have_posts()) : ?>
<ul class="archive-tile-style post-container">

	<?php while (have_posts()) : the_post(); ?>

		<?php include (TEMPLATEPATH . '/_inc/news-tile.php' ); ?>

	<?php endwhile; ?>

</ul>
<?php 

$query = null;
include (TEMPLATEPATH . '/_inc/pagination-numbered.php' ); ?>
<?php else : ?>
	<p class="zero-results">No articles found.</p>
<?php endif; ?>

<div class="loadmore-wrap">
	<a class="btn btn-wide loadmore" >Load more</a>
</div>

<?php get_footer(); ?>