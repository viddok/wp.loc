<h1 class="my-4"><?php the_title() ?></h1>

<!-- Blog Post -->
<div class="card mb-4">
	<?php if ( has_post_thumbnail() ) :
		$attr = array(
			'class' => 'card-img-top'
		);
		the_post_thumbnail( 'large', $attr );
	endif; ?>
	<div class="card-footer text-muted">
		<?php
		$posted = __( 'Posted on', 'translate' ) . ' ' . get_the_date( 'F j, Y' ) . ' ' .
		          __( 'by', 'translate' ) . ' ' . get_the_author_posts_link();
		echo $posted;
		?>
	</div>
	<div class="card-body">
		<?php the_content(); ?>
	</div>
</div>