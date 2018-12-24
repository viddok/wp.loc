<?php

/**
 * Включение опций темы:
 */

/** Включаем поддержку меню в теме */
add_theme_support( 'menus' );

/** Включение миниатюр для всех типов записей */
add_theme_support( 'post-thumbnails' ); // для всех типов постов

/** Регистрация бокового sidebar */
add_action( 'widgets_init', 'true_register_wp_sidebar' ); // Хук widgets_init обязателен!

function true_register_wp_sidebar() {

	/* В боковой колонке */
	register_sidebar(
		array(
			'id' => 'true_side', // уникальный id
			'name' => 'Боковая колонка', // название сайдбара
			'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
			'before_widget' => '<div id="%1$s" class="card my-4 %2$s">', // по умолчанию виджеты выводятся <li>-списком
			'after_widget' => '</div>',
			'before_title' => '<h5 class="card-header">', // по умолчанию заголовки виджетов в <h2>
			'after_title' => '</h3>'
		)
	);
}



/**
 * Настройка темы:
 */

/** Добавил фильтра для присвоения стилей ссылкам пагинации */
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
	return 'class="page-link"';
}

/** Автоматически добавляю ссылку к миниатюре поста */
add_filter('post_thumbnail_html', 'true_auto_linking', 10, 5);

function true_auto_linking( $html, $post_id, $post_thumbnail_id, $size, $attr ){
	return '<a href="' . get_permalink( $post_id ) . '">' . $html . '</a>';
}

/** Убираю размеры миниатюр в теге <img> */
add_filter('wp_get_attachment_image_src','delete_width_height', 100, 4);

function delete_width_height($image, $attachment_id, $size, $icon){

	$image[1] = '';
	$image[2] = '';
	return $image;
}

/** Добавил фильтр для изменения тега "Далее" */
add_filter( 'the_content_more_link', 'true_target_blank_to_read_more', 10, 2 );

function true_target_blank_to_read_more( $more_link, $more_link_text ) {
	// Параметры, передаваемые из фильтра, сейчас мы их не будем использовать
	// $more_link_text - анкор (текст) ссылки по умолчанию
	// $more_link - HTML ссылки по умолчанию
	global $post;
	return ' <a href="' . get_permalink() . '#more-' . get_the_id() . '" class="btn btn-primary" target="_blank">Read More →</a>';
}