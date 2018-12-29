<?php get_header() ?>

	<!-- Page Content -->
	<div class="container">

		<div class="row">

			<!-- Blog Entries Column -->
			<div class="col-md-8">

				<h1 class="my-4">
					<?php
					$category_prefix = __( 'Category' ) . ': ';
					single_cat_title($category_prefix, true);
					?>
				</h1>

				<?php if ($cat_desc = category_description()) : ?>
					<div style="width: 100%; margin-bottom: 1.5em; padding: 0 2em; color: grey; text-align: justify;">
						<?php echo $cat_desc; ?>
					</div>
				<?php endif; ?>

				<?php

				if ( have_posts() ):
					while ( have_posts() ):
						the_post();
						get_template_part('template-parts/content/content', 'posts');
					endwhile;
				endif;

				get_template_part('template-parts/pagination/pagination', 'posts');

				?>

			</div>

			<?php get_sidebar() ?>

		</div>
		<!-- /.row -->

	</div>
	<!-- /.container -->

<?php get_footer() ?>