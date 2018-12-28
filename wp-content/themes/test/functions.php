<?php

/**
 * Подключение стилей и скриптов
 */

add_action( 'wp_enqueue_scripts', 'add_my_scripts' );

function add_my_scripts() {

	/** Styles */
	wp_enqueue_style(
		'bootstrap.min',
		get_stylesheet_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css',
		false,
		null );

	wp_enqueue_style(
		'blog-home',
		get_stylesheet_directory_uri() . '/css/blog-home.css',
		false,
		null );

	wp_enqueue_style(
		'style',
		get_stylesheet_directory_uri() . '/style.css',
		false,
		null );

	wp_enqueue_style(
		'style',
		get_stylesheet_directory_uri() . '/style.css',
		false,
		null );

	/** Scripts */

	wp_enqueue_script(
		'jquery.min',
		get_stylesheet_directory_uri() . '/vendor/jquery/jquery.min.js',
		false,
		null,
		true );

	wp_enqueue_script(
		'bootstrap.bundle.min',
		get_stylesheet_directory_uri() . '/vendor/bootstrap/js/bootstrap.bundle.min.js',
		false,
		null,
		true );
}

/** Включил перевод темы */
add_action( 'after_setup_theme', 'true_load_theme_textdomain' );

function true_load_theme_textdomain() {
	load_theme_textdomain( 'translate', get_template_directory() . '/languages' );
}

add_filter( 'locale', 'true_localize_theme' );

function true_localize_theme( $locale ) {
	if ( isset( $_GET['lang'] ) ) {
		return esc_attr( $_GET['lang'] );
	}

	return $locale;
}

/**
 * Включение опций темы:
 */

/** Включаем поддержку меню в теме */
register_nav_menus(
	array(
		'Main-menu' => __( 'Main menu', 'translate' )
	)
);

/** Включение миниатюр для всех типов записей */
add_theme_support( 'post-thumbnails' ); // для всех типов постов

/** Регистрация бокового sidebar */
add_action( 'widgets_init', 'true_register_wp_sidebar' ); // Хук widgets_init обязателен!

function true_register_wp_sidebar() {

	/* В боковой колонке */
	register_sidebar(
		array(
			'id'            => 'true_side', // уникальный id
			'name'          => __( 'Side column', 'translate' ), // название сайдбара
			'description'   => __( 'Drag widgets here to add them to the sidebar.', 'translate' ), // описание
			'before_widget' => '<div id="%1$s" class="card my-4 %2$s">', // по умолчанию виджеты выводятся <li>-списком
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="card-header">', // по умолчанию заголовки виджетов в <h2>
			'after_title'   => '</h3>'
		)
	);
}


/**
 * Настройка темы:
 */

/** Добавил фильтра для присвоения стилей ссылкам пагинации */
add_filter( 'next_posts_link_attributes', 'posts_link_attributes' );
add_filter( 'previous_posts_link_attributes', 'posts_link_attributes' );

function posts_link_attributes() {
	return 'class="page-link"';
}

/** Автоматически добавляю ссылку к миниатюре поста */
add_filter( 'post_thumbnail_html', 'true_auto_linking', 10, 5 );

function true_auto_linking( $html, $post_id ) {
	return '<a href="' . get_permalink( $post_id ) . '">' . $html . '</a>';
}

/** Убираю размеры миниатюр в теге <img> */
add_filter( 'wp_get_attachment_image_src', 'delete_width_height', 100, 4 );

function delete_width_height( $image ) {

	$image[1] = '';
	$image[2] = '';

	return $image;
}

/** Добавил фильтр для изменения тега "Далее" */
add_filter( 'the_content_more_link', 'true_target_blank_to_read_more', 10, 2 );

function true_target_blank_to_read_more() {
	// Параметры, передаваемые из фильтра, сейчас мы их не будем использовать
	// $more_link_text - анкор (текст) ссылки по умолчанию
	// $more_link - HTML ссылки по умолчанию
	global $post;

	return '<a href="' . get_permalink() . '#more-' . get_the_id() . '" class="btn btn-primary" target="_blank">' . __( 'Read More', 'translate' ) . ' →</a>';
}

/** Добавил класс к ссылкам пагинации */
function add_class_from_link_function( $link ) {
	return str_replace( '<a ', '<a class="page-link" ', $link );
}

add_filter( 'add_class_from_link', 'add_class_from_link_function' );

/** Подключил класс Walkera главного меню */
require_once 'WalkerMainMenu.php';