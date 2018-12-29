<?php get_header() ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

			<?php

            if ( have_posts() ):
                while ( have_posts() ):
                    the_post();
                    get_template_part('template-parts/content/content', 'single');
			    endwhile;
            endif;

            get_template_part('template-parts/author/author', 'single');

			get_template_part('template-parts/pagination/pagination', 'single');

			?>

            <!--Подключение файла комментариев-->
			<?php comments_template(); ?>
        </div>

		<?php get_sidebar() ?>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<?php get_footer() ?>
