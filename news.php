<?php /* Template Name: news-page */ ?>

<?php get_header(); ?>

<?php 

	$menu = 'category menu news';
	$title = 'News';
	$category_name = 'post-all';
	$posttype = "post";
?>


<?php include (TEMPLATEPATH . '/flow-archive.php' ); ?>

<?php get_footer();
