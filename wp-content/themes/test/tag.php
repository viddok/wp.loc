<?php get_header() ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4">
					<?php
					$tag_prefix = __( 'Tag', 'translate' ) . ': ';
					single_term_title( $tag_prefix, true );
					?>
                </h1>

                <div style="width: 100%; margin-bottom: 1.5em; padding: 0 2em; color: grey; text-align: justify;">
					<?php if ( $tag_desc = tag_description() ) : ?>
						<?php echo $tag_desc; ?>
					<?php else: ?>
                        Вывод всех материалов для метки <strong><?php single_term_title( '', true ) ?></strong>.
					<?php endif; ?>
                </div>

				<?php

				if ( have_posts() ):
					while ( have_posts() ):
						the_post();
						get_template_part( 'template-parts/content/content', 'posts' );
					endwhile;
				endif;

				get_template_part( 'template-parts/pagination/pagination', 'posts' );

				?>

            </div>

			<?php get_sidebar() ?>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

<?php get_footer() ?>