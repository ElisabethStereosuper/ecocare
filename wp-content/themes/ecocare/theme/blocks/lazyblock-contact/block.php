<?php
	$icons = [];
	$icons['map'] = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-3 group-hover:scale-90 transition">
				<path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
				<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
				</svg>';
	$icons['mail'] = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-3 group-hover:scale-90 transition">
					<path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25" />
					</svg>';
	$icons['phone'] = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mr-4 ml-[1px] group-hover:scale-90 transition">
					<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
					</svg>';
	$icons['quote'] = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-3 group-hover:scale-90 transition">
  					<path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
					</svg>';


?>

<div data-aos="eco-scroll" data-aos-offset="400" class="inline-block lg:max-w-[360px] lg:-mt-35 bg-secondary px-12 pt-14 pb-17 text-primary rounded-lg text-left">
	<h2 class="block text-3xl font-bold mb-7"><?php echo $attributes['title'] ?></h2>
	<?php if ( isset( $attributes['text'] ) ) : ?>
		<p class="mb-7 text-sm"><?php echo $attributes['text']; ?></p>
	<?php endif; ?>

	<?php if ( isset( $attributes['links'] ) ) : ?>
		<ul class="not-prose">
			<?php foreach($attributes['links'] as $link): ?>
			<li>
				<a class="group not-prose font-semibold flex mb-4 hover:text-foreground transition" href="<?php echo $link['link']; ?>" title="<?php echo $link['label']; ?>">
					<?php echo $icons[ $link['icon'] ]; ?>
					<span class="group-hover:-translate-x-1 transition"><?php echo $link['label']; ?></span>
				</a>
			</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</div>