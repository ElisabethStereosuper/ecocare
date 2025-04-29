<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default. Please note that
 * this is the WordPress construct of pages: specifically, posts with a post
 * type of `page`.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ecocare
 * 
 * Template Name: Full width
 */

get_header();
?>

<header class="hero relative mb-15 py-30 text-background text-center bg-cover bg-no-repeat bg-center" style="background-image:url(<?php echo get_the_post_thumbnail_url(null, '2048x2048'); ?>)">
	<?php the_title( '<h1 class="relative z-1">', '</h1>' ); ?>
	<div class="not-prose absolute top-0 left-0 bg-foreground w-full h-full opacity-30"></div>
</header><!-- .entry-header -->

<div class="entry-content relative">
	<?php the_content(); ?>
</div><!-- .entry-content -->

<?php
get_footer();
