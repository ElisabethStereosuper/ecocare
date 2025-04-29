<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ecocare
 */

get_header();
?>

<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post(); ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="hero relative py-30 text-background text-center bg-cover bg-no-repeat bg-center" style="background-image:url(<?php echo get_the_post_thumbnail_url(null, '2048x2048'); ?>)">
						<?php the_title( '<h1 class="relative z-1">', '</h1>' ); ?>
						<div class="not-prose absolute top-0 left-0 bg-foreground w-full h-full opacity-30"></div>
					</header><!-- .entry-header -->

					<div class="entry-content max-w-4xl mx-auto px-8">
						<?php the_content(); ?>
					</div><!-- .entry-content -->

				</article><!-- #post-${ID} -->

			<?php endwhile; ?>

<?php
get_footer();
