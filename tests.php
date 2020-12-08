<?php /* Template Name: reviews page */ ?>

<?php get_header(); ?>

<?php 

	$menu = 'category menu reviews';
	$title = 'Reviews';
	$category_name = '';
	$posttype = "review";
?>

<?php include (TEMPLATEPATH . '/flow-archive.php' ); ?>

<?php get_footer();?>