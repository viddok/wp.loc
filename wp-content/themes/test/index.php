<?php get_header() ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4"><?php bloginfo() ?>
                <small><?php bloginfo( 'description' ) ?></small>
            </h1>

			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'content', get_post_format() );
				endwhile;
			endif;
			?>



            <!-- Pagination -->
            <ul class="pagination justify-content-center mb-4">

	            <?php $button_name = '&larr; ' . __( 'Older', 'translate') ?>
                <?php if (!empty(get_previous_posts_link())) : ?>
                    <li class="page-item">
                        <?php previous_posts_link($button_name) ?>
                    </li>
                <?php else: ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">
	                        <?php echo $button_name ?>
                        </a>
                    </li>
                <?php endif; ?>

                <?php $button_name = __( 'Newer', 'translate') . ' &rarr;'; ?>
	            <?php if (!empty(get_next_posts_link())) : ?>
                    <li class="page-item">
			            <?php next_posts_link($button_name) ?>
                    </li>
	            <?php else: ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">
                            <?php echo $button_name ?>
                        </a>
                    </li>
	            <?php endif; ?>
            </ul>
            <!--/Pagination-->

        </div>

		<?php get_sidebar() ?>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<?php get_footer() ?>
