<?php if ( isset( $attributes['button'] ) && isset( $attributes['link'] ) ) : ?>
	<a href="<?php echo $attributes['link']; ?>" title="<?php echo $attributes['button']; ?>" class="inline-flex text-background bg-primary hover:bg-secondary hover:-translate-y-[2px] hover:text-foreground focus:bg-tertiary rounded-lg px-6 py-3 transition my-5 sm:my-0 sm:ml-5 font-semibold">
		<?php echo $attributes['button']; ?>
	</a>
<?php endif; ?>

<?php if ( isset( $attributes['phone'] ) && isset( $attributes['phone-link'] ) ) : ?>
	<a href="<?php echo $attributes['phone-link']; ?>" title="<?php echo $attributes['phone']; ?>" class="flex sm:hidden md:inline-flex items-center sm:ml-5 font-semibold hover:text-secondary focus:text-primary transition">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4 mr-2">
			<path d="M3.5 2A1.5 1.5 0 0 0 2 3.5V5c0 1.149.15 2.263.43 3.326a13.022 13.022 0 0 0 9.244 9.244c1.063.28 2.177.43 3.326.43h1.5a1.5 1.5 0 0 0 1.5-1.5v-1.148a1.5 1.5 0 0 0-1.175-1.465l-3.223-.716a1.5 1.5 0 0 0-1.767 1.052l-.267.933c-.117.41-.555.643-.95.48a11.542 11.542 0 0 1-6.254-6.254c-.163-.395.07-.833.48-.95l.933-.267a1.5 1.5 0 0 0 1.052-1.767l-.716-3.223A1.5 1.5 0 0 0 4.648 2H3.5ZM16.5 4.56l-3.22 3.22a.75.75 0 1 1-1.06-1.06l3.22-3.22h-2.69a.75.75 0 0 1 0-1.5h4.5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0V4.56Z" />
		</svg>
		<?php echo $attributes['phone']; ?>
	</a>
<?php endif; ?>