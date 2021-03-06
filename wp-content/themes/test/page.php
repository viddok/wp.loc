<?php get_header() ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4"><?php the_title() ?></h1>

			<?php if ( have_posts() ): while ( have_posts() ): the_post();
				get_template_part( 'template-parts/content/content', 'page' );
			endwhile; endif; ?>

            <!--Подключение файла комментариев-->
			<?php comments_template(); ?>
        </div>

		<?php get_sidebar() ?>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<?php get_footer() ?>
