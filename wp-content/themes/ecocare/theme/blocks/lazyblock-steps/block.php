<?php if ( isset( $attributes['steps'] ) ) : ?>
	<div class="md:flex justify-between items-center mt-30 mb-10">
		<div class="md:w-[50%]">
			<?php if ( isset( $attributes['title'] ) ) : ?>
				<h2 class="lg:mr-15 xl:mr-20">
					<span data-aos="fade-in" class="block mb-2 text-3xl font-normal"><?php echo esc_html( $attributes['subtitle'] ); ?></span>
					<span data-aos="fade-in" data-aos-delay="50"><?php echo esc_html( $attributes['title'] ); ?></span>
				</h2>

				<div data-aos="fade-in" data-aos-delay="150"><?php echo $attributes['text']; ?></div>

			<?php endif; ?>
		</div>

		<ul class="md:w-[45%] p-0 list-none text-left">
			<?php $count = 0; foreach($attributes['steps'] as $step): ?>
				<li data-aos="eco-scroll" class="my-7">
					<div class="bg-tertiary text-foreground rounded-lg text-background py-8 px-6">
						<h3 class="text-xl mt-0">
							<span class="block text-4xl">0<?php $count++; echo $count; ?>.</span>
							<span><?php echo esc_html( $step['title'] ); ?></span>
						</h3>
						<p class="m-0"><?php echo esc_html( $step['text'] ); ?></p>
					</div>
				</li>
			<?php endforeach;?>
		</ul>
	</div>
<?php endif; ?>