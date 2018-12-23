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
    <div class="card-body">
        <h2 class="card-title"><?php the_title() ?></h2>
        <?php the_excerpt() ?>
    </div>
    <div class="card-footer text-muted">
        Posted on <?php echo get_the_date('F j, Y') ?> by
        <?php the_author_posts_link() ?>
    </div>
</div>