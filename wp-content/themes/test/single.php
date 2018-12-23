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
					else:
						echo '<img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">';
					endif; ?>
					<div class="card-footer text-muted">
						Posted on <?php echo get_the_date('F j, Y') ?> by
						<?php the_author_posts_link() ?>
					</div>
					<div class="card-body">
						<?php the_content(); ?>
					</div>
				</div>
			<?php endwhile; endif; ?>

			<?php get_comment() ?>

			<!-- Pagination -->
			<ul class="pagination justify-content-center mb-4">
				<li class="page-item">
						<?php previous_post_link('%link', '&larr; Older') ?>
					</li>
				<li class="page-item">
						<?php next_post_link('%link', 'Newer &rarr;'); ?>
					</li>
			</ul>
			<!--/Pagination-->

		</div>

		<?php get_sidebar() ?>

	</div>
	<!-- /.row -->

</div>
<!-- /.container -->

<?php get_footer() ?>
