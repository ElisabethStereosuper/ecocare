<?php
/**
 * The header for our theme
 *
 * This is the template that displays the `head` element and everything up
 * until the `#content` element.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ecocare
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script>document.documentElement.classList.add('js')</script>
	
	<?php wp_head(); ?>

	<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
	<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
	<link rel="shortcut icon" href="/favicon.ico" />
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
	<meta name="apple-mobile-web-app-title" content="Ecocare" />
	<link rel="manifest" href="/site.webmanifest" />

	<link rel="stylesheet" href="https://ecocare.ddev.site/wp-content/themes/ecocare/theme/aos.css" media="all">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<!-- AOS scroll animation: here to not be weirdly added in inline styles innthe admin (?!) -->
	<style>
		[data-aos="eco-scroll"] {
			opacity: 0;
			transition-property: transform, opacity;
		}
		[data-aos="eco-scroll"].aos-animate {
			opacity: 1;
		}
		@media screen and (min-width: 768px) {
			[data-aos="eco-scroll"]{
				transform: translate3d(0, 70px, 0);
			}
			

			[data-aos="eco-scroll"].aos-animate {
				transform: translate3d(0, 0, 0);
			}
		}
	</style>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div>
	<a href="#content" class="sr-only"><?php esc_html_e( 'Skip to content', 'ecocare' ); ?></a>

	<header>

		<div class="container">
			<nav class="pt-8 pb-6 flex items-center justify-between" aria-label="<?php esc_attr_e( 'Main Navigation', 'ecocare' ); ?>">
				<a class="-mt-5" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img width="150" src="<?php echo get_template_directory_uri().'/images/ecocare.png'; ?>" alt="<?php bloginfo( 'name' ); ?>">
				</a>

				<div class="flex items-center">
					<button id="burger" aria-controls="primary-menu" aria-expanded="false" class="relative z-3 sm:hidden group inline-flex w-12 h-12 text-slate-800 text-center items-center justify-center transition" aria-pressed="false" onclick="this.setAttribute('aria-pressed', !(this.getAttribute('aria-pressed') === 'true'))">
						<span class="sr-only"><?php esc_html_e( 'Menu', 'ecocare' ); ?></span>
						<svg class="w-6 h-6 fill-current pointer-events-none" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
							<rect class="origin-center -translate-y-[5px] translate-x-[7px] transition-all duration-300 ease-[cubic-bezier(.5,.85,.25,1.1)] group-[[aria-pressed=true]]:translate-x-0 group-[[aria-pressed=true]]:translate-y-0 group-[[aria-pressed=true]]:rotate-[315deg]" y="7" width="9" height="2" rx="1"></rect>
							<rect class="origin-center transition-all duration-300 ease-[cubic-bezier(.5,.85,.25,1.8)] group-[[aria-pressed=true]]:rotate-45" y="7" width="16" height="2" rx="1"></rect>
							<rect class="origin-center translate-y-[5px] transition-all duration-300 ease-[cubic-bezier(.5,.85,.25,1.1)] group-[[aria-pressed=true]]:translate-y-0 group-[[aria-pressed=true]]:rotate-[135deg]" y="7" width="9" height="2" rx="1"></rect>
						</svg>
					</button>
					
					<div id="menu" style="background:rgba(0, 0, 0, 0.5)" class="hidden z-2 absolute top-0 right-0 w-full h-full sm:h-auto sm:relative sm:flex">
						<div class="absolute top-0 right-0 bg-background w-[80%] p-10 h-full sm:h-auto sm:p-0 sm:w-auto sm:relative sm:flex">
							<?php
								wp_nav_menu(
									array(
										'theme_location'  => 'menu-1',
										'menu_id'         => 'primary-menu',
										'items_wrap'      => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
										'menu_class'      => 'sm:flex sm:items-center',
										'container_class' => 'sm:flex sm:items-center'
									)
								);
							?>

							<?php if ( is_active_sidebar( 'sidebar-2' ) ) { dynamic_sidebar( 'sidebar-2' ); } ?>
						</div>
					</div>
				</div>
			</nav><!-- #site-navigation -->

		</div>

	</header><!-- #masthead -->

	<main id="content">
