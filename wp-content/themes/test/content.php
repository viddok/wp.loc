<!-- Blog Post -->
<div class="card mb-4">
	<?php
	if ( has_post_thumbnail() ) :
		$attr = array(
			'class' => 'card-img-top'
		);
		the_post_thumbnail( 'large', $attr );
	endif;
	?>
    <div class="card-body">
        <a href="<?php echo get_permalink() ?>" style="color: #1d2124; :hover">
            <h2 class="card-title"><?php the_title() ?></h2>
        </a>
		<?php the_content() ?>
    </div>
    <div class="card-footer text-muted">
        <?php
        $posted = __( 'Posted on', 'translate') . ': ' . get_the_date( 'l, F j, Y' ) . ' ' .
                  __( 'by', 'translate') . ' ' . get_the_author_posts_link();
        echo $posted;
        ?>
    </div>
</div>