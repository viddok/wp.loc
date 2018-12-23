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
                <?php if (!empty(get_previous_posts_link())) : ?>
                    <li class="page-item">
                        <?php previous_posts_link('&larr; Older') ?>
                    </li>
                <?php else: ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">&larr; Older</a>
                    </li>
                <?php endif; ?>
	            <?php if (!empty(get_next_posts_link())) : ?>
                    <li class="page-item">
			            <?php next_posts_link('Newer &rarr;') ?>
                    </li>
	            <?php else: ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Newer &rarr;</a>
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
