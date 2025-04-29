<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the `#content` element and all content thereafter.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ecocare
 */

?>

</main><!-- #content -->

	<footer class="pt-15 pb-5 mt-50 bg-primary text-white font-extralight text-center md:text-left">

		<div class="container">

			<div class="md:flex justify-between items-center lg:items-end flex-wrap">
				<div>
					<a class="-mt-6" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img class="inline" width="30" src="<?php echo get_template_directory_uri().'/images/ecocare-small.png'; ?>" alt="<?php bloginfo( 'name' ); ?>">
					</a>
					<h2 class="my-5 mb-0 font-thin text-5xl">
						Local care
						<span class="font-semibold block">Global impact</span>
					</h2>
				</div>

				<?php if ( has_nav_menu( 'menu-2' ) ) : ?>
					<nav class="lg:block hidden" aria-label="<?php esc_attr_e( 'Footer Menu', 'ecocare' ); ?>">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-2',
								'menu_class'     => 'footer-menu',
							)
						);
						?>
					</nav>
				<?php endif; ?>

				<div class="items-end md:pl-5 mt-10 md:text-right font-semibold">
					<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
						<div class="-mb-5">
							<?php dynamic_sidebar( 'sidebar-1' ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>

			<p class="pt-5 mt-20 md:mt-30 text-center text-secondary text-xs border-t-1 border-secondary opacity-90">
				© Copyright 
				<?php
				echo date('Y');
				$ecocare_blog_info = get_bloginfo( 'name' );
				if ( ! empty( $ecocare_blog_info ) ) :
					?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> - 
					<?php
				endif; ?>
				
				all rights reserved.

				<?php printf(
					'<a href="%1$s">Made by %2$s</a>.',
					esc_url( __( 'e-hamel.com', 'ecocare' ) ),
					'Ellie'
				);
				?>
			</p>

		</div>

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
