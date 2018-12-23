<?php

/** Включаем поддержку меню в теме */
add_theme_support( 'menus' );

/** Добавил фильтра для присвоения стилей ссылкам пагинации */
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
	return 'class="page-link"';
}

/** Включение миниатюр для всех типов записей */
add_theme_support( 'post-thumbnails' ); // для всех типов постов

function true_auto_linking( $html, $post_id, $post_thumbnail_id, $size, $attr ){
	return '<a href="' . get_permalink( $post_id ) . '">' . $html . '</a>';
}

/** Автоматически добавляю ссылку к миниатюре поста */
add_filter('post_thumbnail_html', 'true_auto_linking', 10, 5);

/** Убираю размеры миниатюр в теге <img> */
add_filter('wp_get_attachment_image_src','delete_width_height', 100, 4);

function delete_width_height($image, $attachment_id, $size, $icon){

	$image[1] = '';
	$image[2] = '';
	return $image;
}