<?php

/**
 * Подключение стилей и скриптов
 */

add_action( 'wp_enqueue_scripts', 'add_my_scripts');

function add_my_scripts(){

	/** Styles */
	wp_enqueue_style(
		'bootstrap.min',
		get_stylesheet_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css',
		false,
		null);

	wp_enqueue_style(
		'blog-home',
		get_stylesheet_directory_uri() . '/css/blog-home.css',
		false,
		null);

	wp_enqueue_style(
		'style',
		get_stylesheet_directory_uri() . '/style.css',
		false,
		null);

	wp_enqueue_style(
		'style',
		get_stylesheet_directory_uri() . '/style.css',
		false,
		null);

	/** Scripts */

	wp_enqueue_script(
		'jquery.min',
		get_stylesheet_directory_uri() . '/vendor/jquery/jquery.min.js',
		false,
		null,
		true);

	wp_enqueue_script(
		'bootstrap.bundle.min',
		get_stylesheet_directory_uri() . 'vendor/bootstrap/js/bootstrap.bundle.min.js',
		false,
		null,
		true);
}

/** Включил перевод темы */
add_action('after_setup_theme', 'true_load_theme_textdomain');

function true_load_theme_textdomain(){
	load_theme_textdomain( 'translate', get_template_directory() . '/languages' );
}

/**
 * Включение опций темы:
 */

/** Включаем поддержку меню в теме */
register_nav_menus(
	array(
		'Main-menu' => 'Главное меню',
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

/** Добавил класс к ссылкам пагинации */
function add_class_from_link_function($link) {
	return str_replace('<a ', '<a class="page-link" ', $link);
}

add_filter('add_class_from_link', 'add_class_from_link_function');

class True_Walker_Nav_Menu extends Walker_Nav_Menu {
	/*
	 * Позволяет перезаписать <ul class="sub-menu">
	 */
	function start_lvl(&$output, $depth = 0, $args = Array()) {
		/*
		 * $depth – уровень вложенности, например 2,3 и т д
		 */
		$output .= '<ul class="menu_sublist">';
	}
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output
	 * @param object $item Объект элемента меню, подробнее ниже.
	 * @param int $depth Уровень вложенности элемента меню.
	 * @param object $args Параметры функции wp_nav_menu
	 */
	function start_el(&$output, $item, $depth = 0, $args = Array(), $id = 0) {
		global $wp_query;
		/*
		 * Некоторые из параметров объекта $item
		 * ID - ID самого элемента меню, а не объекта на который он ссылается
		 * menu_item_parent - ID родительского элемента меню
		 * classes - массив классов элемента меню
		 * post_date - дата добавления
		 * post_modified - дата последнего изменения
		 * post_author - ID пользователя, добавившего этот элемент меню
		 * title - заголовок элемента меню
		 * url - ссылка
		 * attr_title - HTML-атрибут title ссылки
		 * xfn - атрибут rel
		 * target - атрибут target
		 * current - равен 1, если является текущим элементом
		 * current_item_ancestor - равен 1, если текущим (открытым на сайте) является вложенный элемент данного
		 * current_item_parent - равен 1, если текущим (открытым на сайте) является родительский элемент данного
		 * menu_order - порядок в меню
		 * object_id - ID объекта меню
		 * type - тип объекта меню (таксономия, пост, произвольно)
		 * object - какая это таксономия / какой тип поста (page /category / post_tag и т д)
		 * type_label - название данного типа с локализацией (Рубрика, Страница)
		 * post_parent - ID родительского поста / категории
		 * post_title - заголовок, который был у поста, когда он был добавлен в меню
		 * post_name - ярлык, который был у поста при его добавлении в меню
		 */
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		/*
		 * Генерируем строку с CSS-классами элемента меню
		 */
		$class_names = $value = '';
		//$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		//$classes[] = 'menu-item-' . $item->ID;


		$classes[] = 'nav-item';
		$classes1 = empty( $item->classes ) ? array() : (array) $item->classes;
		foreach ($classes1 as $val) {
			if ($val === 'current-menu-item') {
				$classes[] = 'active';
			}
		}

		// функция join превращает массив в строку
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		/*
		 * Генерируем ID элемента
		 */
		//$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		//$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		/*
		 * Генерируем элемент меню
		 */
		//$output .= $indent . '<li' . $id . $value . $class_names .'>';
		$output .= $indent . '<li' . $value . $class_names .'>';

		// атрибуты элемента, title="", rel="", target="" и href=""
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		// ссылка и околоссылочный текст
		$item_output = $args->before;
		$item_output .= '<a class="nav-link"' . $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}