<?php if ( isset( $attributes['pricing'] ) ) : ?>
	<ul class="flex my-15 mb-30 list-none">
		<?php foreach($attributes['pricing'] as $pricing): ?>
			<li class="px-5">
				<a href="" class="px-5 block not-prose bg-pale">
					<h2><?php echo esc_html( $pricing['title'] ); ?></h2>
					<p><?php echo esc_html( $pricing['text'] ); ?></p>
					<p class="flex">$<span class="font-bold text-4xl"><?php echo esc_html( $pricing['price'] ); ?></span>/hr + GST</p>
				</a>
			</li>
		<?php endforeach;?>
	</ul>
<?php endif; ?>