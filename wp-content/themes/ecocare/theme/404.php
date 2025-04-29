<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ecocare
 */

get_header();
?>

<header class="hero relative py-30 mb-15 text-background text-center bg-cover bg-no-repeat bg-center" style="background-image:url(<?php echo get_the_post_thumbnail_url(null, '2048x2048'); ?>)">
	<h1 class="relative z-1"><?php esc_html_e( 'Page Not Found', 'ecocare' ); ?></h1>
	<div class="not-prose absolute top-0 left-0 bg-foreground w-full h-full opacity-30"></div>
	</header><!-- .entry-header -->

<div <?php ecocare_content_class( 'entry-content max-w-4xl mx-auto px-8 text-center' ); ?>>
	<p>
		<?php esc_html_e( 'This page could not be found.', 'ecocare' ); ?><br>
		<?php esc_html_e( 'It might have been removed or renamed, or it may never have existed.', 'ecocare' ); ?>
	</p>
	<p>
		<a href="./" title="Back to homepage" class="not-prose inline-flex items-center border rounded-lg px-6 py-3 transition font-semibold">
			Go back home
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 ml-3">
				<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
			</svg>
		</a>
	</p>
</div><!-- .page-content -->

<?php
get_footer();
