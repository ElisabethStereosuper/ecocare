<?php

	$classes = ['mt-10', 'max-w-5xl', 'sm:grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4'];
	$nb = -1;

	if( $attributes['green-bg'] ) {
		$classes[0] = 'bg-secondary text-primary mt-15';
		$classes[1] = 'max-w-3xl';
		$classes[2] = 'grid-cols-3 max-w-5xl';
		$nb = 3;
	}

?>

<div class="pt-20 pb-100 md:pb-55 -mx-4 <?php echo $classes[0]; ?>">
	<div class="container <?php echo $classes[1]; ?>">
		<h2>
			<span data-aos="fade-in" class="block text-3xl font-normal"><?php echo esc_html( $attributes['subtitle'] ); ?></span>
			<span data-aos="fade-in" data-aos-delay="50"><?php echo esc_html( $attributes['title'] ); ?></span>
		</h2>
		<p data-aos="fade-in" data-aos-delay="150">
			<?php echo esc_html( $attributes['text'] ); ?>
		</p>
		<?php if ( isset( $attributes['button'] ) && $attributes['button'] != '' ) : ?>
			<p data-aos="fade-in" data-aos-delay="200">
				<a href="<?php echo esc_url( $attributes['link'] ); ?>" class="inline-flex items-center border not-prose rounded-lg px-6 py-3 font-semibold hover:bg-primary hover:text-secondary hover:-translate-y-1 focus:bg-foreground transition">
					<?php echo esc_html( $attributes['button'] ); ?>
				</a>
			</p>
		<?php endif; ?>
	</div>
</div>

	<div class="container p-0 -mt-95 md:-mt-45 mb-35">
		<ul class="md:grid my-0 -mx-1 lg:-mx-3 p-0 list-none justify-center <?php echo $classes[2]; ?>">
			<?php $loop = new WP_Query( array( 'post_type' => 'service', 'posts_per_page' => $nb ) ); ?>

			<?php $count = 0; while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<li data-aos="eco-scroll" data-aos-delay="<?php echo $count; ?>" class="grow m-0 p-1 lg:p-3">
					<a class="group flex flex-wrap content-between h-full not-prose p-5 text-secondary rounded-lg bg-primary hover:-translate-y-3 hover:bg-foreground transition" href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>" rel="bookmark">
						<span class="block font-semibold text-2xl lg:text-4xl group-hover:translate-y-5 transition"><?php the_title(); ?></span>
						<span class="block w-full mt-15 text-sm">
							<span class="block mr-10 group-hover:-translate-y-5 transition"><?php echo get_the_excerpt(); ?></span>
							<span class="block mt-5 text-right">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block size-12 group-hover:scale-120 transition">
									<path stroke-linecap="round" stroke-linejoin="round" d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
								</svg>
							</span>
						</span>
					</a>
				</li>
			<?php $count+= 200; endwhile; ?>
		</ul>
		<!--<p class="my-0 p-3">
			<a href="#" class="inline-flex items-center not-prose rounded-lg bg-secondary px-6 py-3 font-semibold">
				All services
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 ml-3">
					<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
				</svg>
			</a>
		</p>-->
	</div>