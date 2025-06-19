<?php if ( isset( $attributes['items'] ) ) : ?>
<ul class="flex flex-wrap justify-center p-0 list-none mb-20 font-semibold text-sm">
	<?php foreach($attributes['items'] as $items): ?>
		<li class="mr-1 rounded py-[3px] px-3 bg-secondary text-primary">
			<?php echo esc_html( $items['text'] ); ?>
		</li>
	<?php endforeach;?>
</ul>
<?php endif; ?>