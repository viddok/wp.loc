<?php get_header() ?>

<!-- Page Content -->
<div class="container">

	<div class="row">

		<!-- Blog Entries Column -->
		<div class="col-md-8">

			<h1 class="my-4"><?php the_title() ?></h1>

			<?php if (have_posts()): while (have_posts()): the_post(); ?>

				<!-- Blog Post -->
				<div class="card mb-4">
					<?php if (has_post_thumbnail()) :
						$attr = array(
							'class'	=> 'card-img-top'
						);
						the_post_thumbnail('large', $attr);
					endif; ?>
					<div class="card-footer text-muted">
						<?php
                        $posted = __( 'Posted on', 'translate' ) . ' ' . get_the_date('F j, Y') . ' ' .
                                  __( 'by', 'translate' ) . ' ' . get_the_author_posts_link();
                        echo $posted;
                        ?>
					</div>
					<div class="card-body">
						<?php the_content(); ?>
					</div>
				</div>
			<?php endwhile; endif; ?>

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

			<!-- Pagination posts-->
			<ul class="pagination justify-content-center mb-4">
				<li class="page-item">
						<?php
						$button_older = '&larr; ' . __( 'Older', 'translate');
						$temp_link = apply_filters('add_class_from_link', get_previous_post_link('%link', $button_older));
						echo $temp_link;
						?>
					</li>
				<li class="page-item">
						<?php
						$button_next = __( 'Newer', 'translate') . ' &rarr;';
						$temp_link = apply_filters('add_class_from_link', get_next_post_link('%link', $button_next));
						echo $temp_link;
						?>
					</li>
			</ul>
			<!--/Pagination posts-->

			<?php
			global $post;
			if ($post->comment_count > 0) :
			?>

                <?php comments_template(); ?>

                <!-- Pagination comments -->
                <ul class="pagination justify-content-center mb-4">
                    <?php if (!empty(get_next_comments_link())) : ?>
                        <li class="page-item">
                            <?php
                            $temp_link = apply_filters('add_class_from_link', get_next_comments_link($button_older));
                            echo $temp_link;
                            ?>
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
                            <?php
                            $temp_link = apply_filters('add_class_from_link', get_previous_comments_link($button_next));
                            echo $temp_link;
                            ?>
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
            <?php endif; ?>
        </div>

		<?php get_sidebar() ?>

	</div>
	<!-- /.row -->

</div>
<!-- /.container -->

<?php get_footer() ?>
