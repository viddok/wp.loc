<div class="author-container">
	<div class="author-data-container">
                    <span class="author-name">
                        <?php the_author_posts_link() ?>
                    </span>
		<?php echo get_avatar( 'user_email', 80, 'https://poplanete.ru/templates/New_poplanete/dleimages/noavatar.png' ); ?>
	</div>
	<div class="author-info">
		<?php the_author_meta( 'description' ); ?>
	</div>
	<div class="clr"></div>
</div>