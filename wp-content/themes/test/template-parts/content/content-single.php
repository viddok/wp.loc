<h1 class="my-4"><?php the_title() ?></h1>

<!-- Blog Post -->
<div class="card mb-4">
	<?php if ( has_post_thumbnail() ) :
		$attr = array(
			'class' => 'card-img-top'
		);
		the_post_thumbnail( 'large', $attr );
	endif; ?>
    <div class="card-footer text-muted">
		<?php
		$posted = __( 'Posted on', 'translate' ) . ' ' . get_the_date( 'F j, Y' ) . ' ' .
		          __( 'by', 'translate' ) . ' ' . get_the_author_posts_link();
		echo $posted;
		?>
    </div>
    <div class="card-body">
        <div><h4>TAB 1</h4>
			<?php

			// vars
			$hero = get_field( 'основное' );

			if ( $hero ): ?>
                <div id="hero">
					<?php echo $hero['text'] ?><br/>
					<?php echo $hero['text_area'] ?><br/>
					<?php echo $hero['число'] ?><br/>
					<?php echo $hero['диапазон'] ?><br/>
					<?php echo $hero['e-mail'] ?><br/>
					<?php echo $hero['ссылка'] ?><br/>
					<?php echo $hero['пароль'] ?><br/>
                </div>
			<?php endif; ?>
        </div>
        <div><h4>TAB 2</h4>
			<?php

			$image = get_field( 'img' );

			if ( $image ) {

				echo "<img src='{$image['url']}' alt='{$image['alt']}' title='{$image['title']}' width='100%'>";

			}

			?>

			<?php

			$file        = get_field( 'file' );

			if ( $file ):

				// vars
				$url = $file['url'];
				$title   = $file['title'];
				$caption = $file['caption'];


				// icon
				$icon = $file['icon'];

				if ( $file['type'] == 'image' ) {

					$icon = $file['sizes']['thumbnail'];

				}


				if ( $caption ): ?>

                    <div class="wp-caption">

				<?php endif; ?>

                <a href="<?php echo $url; ?>" title="<?php echo $title; ?>">

                    <img src="<?php echo $icon; ?>"/>
                    <span><?php echo $title; ?></span>

                </a>

				<?php if ( $caption ): ?>

                <p class="wp-caption-text"><?php echo $caption; ?></p>

                </div>

			<?php endif; ?>

			<?php endif; ?>

            <div class="embed-container">
				<?php the_field( 'media' ); ?>
            </div>
            <style>
                .embed-container {
                    position: relative;
                    padding-bottom: 56.25%;
                    overflow: hidden;
                    max-width: 100%;
                    height: auto;
                }

                .embed-container iframe,
                .embed-container object,
                .embed-container embed {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                }
            </style>
            <div><h4>TAB 3</h4>
                <?php

                // vars
                $color = get_field('select');

                ?>
                <p>Val: <?php echo $color['value']; ?>, label: <?php echo $color['label']; ?></p>
                <hr/>
	            <?php

	            // vars
	            $colors = get_field('flag');


	            // check
	            if( $colors ): ?>
                    <ul>
			            <?php foreach( $colors as $color1 ): ?>
                            <li><span class="color-<?php echo $color1['value']; ?>"><?php echo $color1['label']; ?></span></li>
			            <?php endforeach; ?>
                    </ul>
	            <?php endif; ?>

                <hr />

	            <?php

	            // vars
	            $color = get_field('radio');

	            ?>
                <p>Val: <?php echo $color['value']; ?>, label: <?php echo $color['label']; ?></p>

                <hr />

	            <?php

	            // vars
	            $color = get_field('group');

	            ?>
                <p>Val: <?php echo $color['value']; ?>, label: <?php echo $color['label']; ?></p>
                <hr />
                <?php

                if( get_field('true') ) {
                    echo 'Очень хочу';
                } else {
                    echo 'Спасибо, сейчас не хочется';
                }

                ?>
            </div>
            <div><h4>TAB 4</h4>
	            <?php

	            $link = get_field('link');

	            if( $link ):
		            $link_url = $link['url'];
		            $link_title = $link['title'];
		            $link_target = $link['target'] ? $link['target'] : '_self';
		            ?>
                    <a class="button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
	            <?php endif; ?>

                <hr />
                <?php

                $post_objects = get_field('post_object');

                if( $post_objects ): ?>
                <ul>
		            <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
			            <?php setup_postdata($post); ?>
                        <li>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <span>Post Object Custom Field: <?php the_field('text'); ?></span>
                        </li>
		            <?php endforeach; ?>
                </ul>
	            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
	            <?php endif; ?>

                <hr />

	            <?php

	            // vars
	            $post_id = get_field('page_link', false, false);

	            // check
	            if( $post_id ): ?>
                    <a href="<?php echo get_the_permalink($post_id); ?>"><?php echo get_the_title($post_id); ?></a>
	            <?php endif; ?>

                <hr />

	            <?php

	            $posts = get_field('post');

	            if( $posts ): ?>
                    <ul>
			            <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
				            <?php setup_postdata($post); ?>
                            <li>
                                <?php the_post_thumbnail( 'thumbnail' ); ?>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <span>Custom field from $post: <?php the_field('text'); ?></span>
                            </li>
			            <?php endforeach; ?>
                    </ul>
		            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
	            <?php endif; ?>

                <hr />

	            <?php

	            $term = get_field('taxonomy_field_name');

	            if( $term ): ?>

                    <h2><?php echo $term->name; ?></h2>
                    <p><?php echo $term->description; ?></p>

	            <?php endif; ?>

                <hr />

	            <?php

	            $term = get_field('user');
	            /** @var $term WP_User*/

	            if( $term ): ?>

                    <h2><?php echo $term['display_name']; ?></h2>
                    <p><?php echo $term['user_description']; ?></p>

	            <?php endif; ?>
            </div>
            <div><h4>TAB 5</h4>

	            <?php

	            $location = get_field('map');

	            if( !empty($location) ):
		            ?>
                    <div class="acf-map">
                        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                    </div>
	            <?php endif; ?>

                <hr />

                <p>Event Date: <?php the_field('date'); ?></p>

                <hr />

                <p>Event Date: <?php the_field('date_and_time'); ?></p>

                <hr />

                <p>Event Time: <?php the_field('time'); ?></p>

                <hr />

                <p>Event color: <?php the_field('color'); ?></p>

                <hr />
            </div>
        </div>

		<?php the_content(); ?>
    </div>
</div>