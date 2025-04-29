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
 * Template Name: Full width / No hero
 */

get_header();
?>

<div class="entry-content">
	<?php the_content(); ?>
</div><!-- .entry-content -->

<?php
get_footer();
