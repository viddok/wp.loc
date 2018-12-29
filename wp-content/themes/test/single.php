<?php get_header() ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

			<?php if ( have_posts() ):
                while ( have_posts() ):
                    the_post();
                    get_template_part('template-parts/content/content', 'single');
			    endwhile;
            endif;

            get_template_part('template-parts/author/author', 'single');
            ?>

            <!-- Pagination posts-->
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
            <!--/Pagination posts-->

            <!--Подключение файла комментариев-->
			<?php comments_template(); ?>
        </div>

		<?php get_sidebar() ?>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<?php get_footer() ?>
