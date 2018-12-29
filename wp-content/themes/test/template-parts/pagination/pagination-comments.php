<?php
$button_older = '&larr; ' . __( 'Older', 'translate' );
$button_next  = __( 'Newer', 'translate' ) . ' &rarr;';
?>
<ul class="pagination justify-content-center mb-4">
	<?php if ( ! empty( get_next_comments_link() ) ) : ?>
		<li class="page-item">
			<?php echo apply_filters( 'add_class_from_link', get_next_comments_link( $button_older ) ) ?>
		</li>
	<?php endif; ?>
	<?php if ( ! empty( get_previous_comments_link() ) ) : ?>
		<li class="page-item">
			<?php echo apply_filters( 'add_class_from_link', get_previous_comments_link( $button_next ) ) ?>
		</li>
	<?php endif; ?>
</ul>