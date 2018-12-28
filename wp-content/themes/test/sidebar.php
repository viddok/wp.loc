<?php if ( is_active_sidebar( 'true_side' ) ) : ?>
    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">
		<?php get_search_form(); ?>
		<?php dynamic_sidebar( 'true_side' ); ?>
    </div>
<?php endif; ?>