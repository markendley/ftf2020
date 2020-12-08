<?php /* Template Name: features-page */ ?>

<?php get_header(); ?>

<?php 

	$menu = 'category menu features';
	$title = 'Features';
	$category_name = '';
	$posttype = "feature";
?>

<?php include (TEMPLATEPATH . '/flow-archive.php' ); ?>

<?php get_footer();