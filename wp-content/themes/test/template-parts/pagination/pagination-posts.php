<ul class="pagination justify-content-center mb-4">

	<?php $button_name = '&larr; ' . __( 'Newer', 'translate' ) ?>
	<?php if ( ! empty( get_previous_posts_link() ) ) : ?>
		<li class="page-item">
			<?php previous_posts_link( $button_name ) ?>
		</li>
	<?php else: ?>
		<li class="page-item disabled">
			<a class="page-link" href="#">
				<?php echo $button_name ?>
			</a>
		</li>
	<?php endif; ?>

	<?php $button_name = __( 'Older', 'translate' ) . ' &rarr;' ?>
	<?php if ( ! empty( get_next_posts_link() ) ) : ?>
		<li class="page-item">
			<?php next_posts_link( $button_name ) ?>
		</li>
	<?php else: ?>
		<li class="page-item disabled">
			<a class="page-link" href="#">
				<?php echo $button_name ?>
			</a>
		</li>
	<?php endif; ?>
</ul>