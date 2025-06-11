<?php if ( isset( $attributes['image']['url'] ) ) : ?>

<div class="lazy-img lg:flex items-start lg:items-end my-20 lg:my-15 lg:mb-30 <?php if ( $attributes['image-alignement'] == 'right' ) echo 'text-right'; ?>">
	<div data-aos="eco-scroll" class="<?php
		echo ( $attributes['image-alignement'] == 'right' ) ? 'order-2 rounded-bl-none ' : 'rounded-br-none ';
		if ( $attributes['image-big'] ) echo 'lg:min-w-[50%]';
	?> hidden lg:block min-w-[35%] aspect-square bg-hero bg-no-repeat bg-cover bg-center rounded-[200px]" style="background-image: url('<?php echo wp_get_attachment_image_url( $attributes['image']['id'], 'large' ); ?>')"></div>
	
	<div class="px-8">
	<?php if ( isset( $attributes['title'] ) ) : ?>
		<?php if ( $attributes['hero-homepage'] ) : ?>
			<h1>
				<span data-aos="eco-scroll" data-aos-delay="250" class="block mb-2 text-3xl font-normal"><?php echo esc_html( $attributes['title'] ); ?></span>
				<span data-aos="eco-scroll" data-aos-delay="300" class="block"><?php echo str_replace("\n", '<br />',  $attributes['title2']); ?></span>
			</h1>
		<?php else: ?>
			<h2>
				<span data-aos="eco-scroll" data-aos-delay="250" class="block mb-2 text-3xl font-normal"><?php echo esc_html( $attributes['title'] ); ?></span>
				<span data-aos="eco-scroll" data-aos-delay="300" class="block"><?php echo str_replace("\n", '<br />',  $attributes['title2']); ?></span>
			</h2>
		<?php endif; ?>

		<div data-aos="eco-scroll" data-aos-delay="700"><?php echo $attributes['text']; ?></div>

		<?php if ( isset( $attributes['button'] ) && $attributes['button'] != '' ) : ?>
			<p data-aos="eco-scroll" data-aos-delay="850">
				<a href="<?php echo esc_url( $attributes['link'] ); ?>" class="group inline-flex items-center border not-prose rounded-lg px-6 py-3 font-semibold hover:text-primary hover:bg-secondary hover:border-secondary hover:-translate-y-1 focus:text-secondary focus:bg-background transition">
					<?php echo esc_html( $attributes['button'] ); ?>
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 ml-3 group-hover:translate-x-3 transition">
						<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
					</svg>
				</a>
			</p>
		<?php endif; ?>
		
		<div class="flex">
			<?php if ( isset( $attributes['counter1'] ) && $attributes['counter1'] != '' ) : ?>
				<div data-aos-id="counter" data-aos="eco-scroll" data-aos-delay="850" class="w-[50%] text-sm">
					<p class="inline-block max-w-[200px]">
						<span data-count="<?php echo $attributes['counter1']; ?>" class="counter block text-4xl font-semibold">1</span>
						<?php echo $attributes['counter1-label']; ?>
					</p>
				</div>
			<?php endif; ?>

			<?php if ( isset( $attributes['counter2'] ) && $attributes['counter2'] != '' ) : ?>
				<div data-aos-id="counter" data-aos="eco-scroll" data-aos-delay="950" class="w-[50%] text-sm">
					<p class="inline-block max-w-[200px]">
						<span data-count="<?php echo $attributes['counter2']; ?>" class="counter block text-4xl font-semibold">1</span>
						<?php echo $attributes['counter2-label']; ?>
					</p>
				</div>
			<?php endif; ?>
		</div>

	<?php endif; ?>
	</div>
</div>

<?php endif; ?>