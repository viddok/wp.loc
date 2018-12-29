// Проверка: авторизован ли пользователь
<?php if ( $user_ID ): ?>
    <!-- Форма для авторизованного пользователя -->
    <p>
		<?php _e( 'You are logged in as', 'translate' ) ?>
        <a href="<?php echo get_option( 'siteurl' ); ?>/wp-admin/profile.php">
			<?php
			if ( isset( $user_identity ) ) {
				echo $user_identity;
			}
			?>
        </a>.
        <a href="<?php echo wp_logout_url( get_permalink() ); ?>"
           title="<?php _e( 'Sign out of this account', 'translate' ) ?>">
			<?php echo __( 'Sign out', 'translate' ) . ' &raquo;' ?>
        </a>
    </p>
    <h3><?php _e( 'Add comment', 'translate' ) ?></h3>
    <form action="<?php echo get_option( 'siteurl' ); ?>/wp-comments-post.php" id="commentform" method="post">
        <p>
            <label>
				<?php _e( 'Comment text (required)', 'translate' ) ?><br/>
                <textarea name="comment" id="comment" rows="5" cols="50" required></textarea>
            </label>
            <br/>
            <input class="button" type="submit" value="<?php _e( 'Add', 'translate' ) ?>"/>
        </p>
		<?php comment_id_fields();
		do_action( 'comment_form', $post->ID ); ?>
    </form>
<?php else : ?>
    <!-- Форма для гостя -->
    <h3><?php _e( 'Add comment', 'translate' ) ?></h3>
    <style>
        label {
            display: block;
        }
    </style>
    <form action="<?php echo get_option( 'siteurl' ); ?>/wp-comments-post.php" id="commentform" method="post">
        <p>
            <label>
				<?php _e( 'Name (required)', 'translate' ) ?><br/>
                <input name="author" id="author" value=" " type="text" size="30" alt="Name" required/>
            </label>
            <label>
				<?php _e( 'Email (required)', 'translate' ) ?><br/>
                <input name="email" id="email" value=" " type="text" size="30" alt="Email" required/>
            </label>
            <label>
				<?php _e( 'Comment text (required)', 'translate' ) ?><br/>
                <textarea name="comment" id="comment" rows="5" cols="50" required></textarea>
            </label>
            <br/>
            <input class="button" type="submit" value="<?php _e( 'Add', 'translate' ) ?>"/>
        </p>
		<?php comment_id_fields();
		do_action( 'comment_form', $post->ID ); ?>
    </form>
	<?php
endif;