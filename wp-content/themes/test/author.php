<?php get_header() ?>

	<!-- Page Content -->
	<div class="container">

		<div class="row">

			<!-- Blog Entries Column -->
			<div class="col-md-8">

				<h1 class="my-4">
					<?php
					echo __('Author', 'translate') . ': ' . get_the_author_meta( 'display_name', $_GET['author'] );
					?>
				</h1>

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