<?php get_header() ?>

<!-- Page Content -->
<div class="container">

	<div class="row">

		<!-- Blog Entries Column -->
		<div class="col-md-8">

			<h1 class="my-4"><?php _e( 'Attention! Page not found.', 'translate') ?></h1>

			<p><?php _e( 'Hello. You have reached this page for one of these reasons', 'translate') ?>:</p>
			<ul>
				<li><?php _e( 'Reason', 'translate') ?> 1;</li>
				<li><?php _e( 'Reason', 'translate') ?> 2;</li>
			</ul>
			<h4><?php _e( 'Some links', 'translate') ?>:</h4>
			<ul>
				<li><a href="<?php site_url() ?>"><?php _e( 'Home', 'translate') ?></a> </li>
			</ul>

		</div>

		<?php get_sidebar() ?>

	</div>
	<!-- /.row -->

</div>
<!-- /.container -->

<?php get_footer() ?>
