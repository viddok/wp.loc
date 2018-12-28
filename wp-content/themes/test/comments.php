<ol>
    <!--  Проверка: включены ли в админке комментарии для данного поста  -->
	<?php if ( comments_open() ):

//        Проверка: авторизован ли пользователь
		if ( $user_ID ): ?>
            <!-- Форма для авторизованного пользователя -->
            <p>
                <?php _e( 'You are logged in as', 'translate') ?>
                <a href="<?php echo get_option( 'siteurl' ); ?>/wp-admin/profile.php">
					<?php
					if ( isset( $user_identity ) ) {
						echo $user_identity;
                        }
					?>
                </a>.
                <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="<?php _e( 'Sign out of this account', 'translate' ) ?>">
                    <?php echo __( 'Sign out', 'translate' ) . ' &raquo;' ?>
                </a>
            </p>
            <h3><?php _e( 'Add comment', 'translate' ) ?></h3>
            <form action="<?php echo get_option( 'siteurl' ); ?>/wp-comments-post.php" id="commentform" method="post">
                <p>
                    <label>
                        <?php _e( 'Comment text (required)', 'translate' ) ?><br />
                        <textarea name="comment" id="comment" rows="5" cols="50" required></textarea>
                    </label>
                    <br/>
                    <input class="button" type="submit" value="<?php _e( 'Add', 'translate') ?>"/>
                </p>
				<?php comment_id_fields();
				do_action( 'comment_form', $post->ID ); ?>
            </form>
		<?php else : ?>
            <!-- Форма для гостя -->
            <h3><?php _e( 'Add comment', 'translate' ) ?></h3>
            <style>
                label{
                    display: block;
                }
            </style>
            <form action="<?php echo get_option( 'siteurl' ); ?>/wp-comments-post.php" id="commentform" method="post">
                <p>
                    <label>
	                    <?php _e( 'Name (required)', 'translate' ) ?><br />
                        <input name="author" id="author" value=" " type="text" size="30" alt="Name" required/>
                    </label>
                    <label>
	                    <?php _e( 'Email (required)', 'translate' ) ?><br />
                        <input name="email" id="email" value=" " type="text" size="30" alt="Email" required/>
                    </label>
                    <label>
	                    <?php _e( 'Comment text (required)', 'translate' ) ?><br />
                        <textarea name="comment" id="comment" rows="5" cols="50" required></textarea>
                    </label>
                    <br/>
                    <input class="button" type="submit" value="<?php _e( 'Add', 'translate') ?>"/>
                </p>
				<?php comment_id_fields();
				do_action( 'comment_form', $post->ID ); ?>
            </form>
		<?php
        endif;
	endif;
	?>

    <!--  Вывод комментариев  -->
	<?php wp_list_comments() ?>
    <!--  /Вывод комментариев  -->

	<?php if ($post->comment_count > 0) : ?>

        <!-- Pagination comments -->
        <?php
		$button_older = '&larr; ' . __( 'Older', 'translate');
		$button_next = __( 'Newer', 'translate') . ' &rarr;';
        ?>
        <ul class="pagination justify-content-center mb-4">
            <?php if (!empty(get_next_comments_link())) : ?>
                <li class="page-item">
                    <?php echo apply_filters('add_class_from_link', get_next_comments_link($button_older)) ?>
                </li>
            <?php else: ?>
                <li class="page-item disabled">
                    <a class="page-link" href="#">
                        <?php echo $button_older ?>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (!empty(get_previous_comments_link())) : ?>
                <li class="page-item">
                    <?php echo apply_filters('add_class_from_link', get_previous_comments_link($button_next)) ?>
                </li>
            <?php else: ?>
                <li class="page-item disabled">
                    <a class="page-link" href="#">
                        <?php echo $button_next ?>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
        <!--/Pagination comments-->
    <?php endif ?>
</ol>

