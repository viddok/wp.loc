<ul class="pagination justify-content-center mb-4">
	<li class="page-item">
		<?php
		$button_older = '&larr; ' . __( 'Older', 'translate' );
		$temp_link    = apply_filters( 'add_class_from_link', get_previous_post_link( '%link', $button_older ) );
		echo $temp_link;
		?>
	</li>
	<li class="page-item">
		<?php
		$button_next = __( 'Newer', 'translate' ) . ' &rarr;';
		$temp_link   = apply_filters( 'add_class_from_link', get_next_post_link( '%link', $button_next ) );
		echo $temp_link;
		?>
	</li>
</ul>