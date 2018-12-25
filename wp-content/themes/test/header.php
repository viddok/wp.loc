<?php
	$template_directory_url = get_bloginfo('template_url');
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title><?php bloginfo() ?></title>

	<?php wp_head() ?>
</head>

<body <?php body_class() ?>>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container">
		<a class="navbar-brand" href="<?php bloginfo('wpurl') ?>" title="<?php bloginfo('description') ?>"><?php bloginfo('') ?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<?php
		$args = array(
			'theme_location' => 'Main-menu',
			'container'       => 'div',
			'container_class' => 'collapse navbar-collapse',
			'container_id'    => 'navbarResponsive',
			'menu_class'      => 'navbar-nav ml-auto',
			'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
			'walker'=> new True_Walker_Nav_Menu() // этот параметр нужно добавить
		);
		wp_nav_menu( $args );
		?>
	</div>
</nav>