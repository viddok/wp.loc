<?php

class WalkerMainMenu extends Walker_Nav_Menu {

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output
	 * @param object $item Объект элемента меню, подробнее ниже.
	 * @param int $depth Уровень вложенности элемента меню.
	 * @param object $args Параметры функции wp_nav_menu
	 */
	function start_el( &$output, $item, $depth = 0, $args = Array(), $id = 0 ) {
		//global $wp_query;
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
		$classes[] = 'nav-item';
		$classes[] = ( $item->current === true ) ? 'active' : '';


		// функция join превращает массив в строку
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		/*
		* Генерируем элемент меню
		*/
		$output .= $indent . '<li' . $class_names . '>';

		// атрибуты элемента, title="", rel="", target="" и href=""
		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';

		// ссылка и околоссылочный текст
		$item_output = $args->before;
		$item_output .= '<a class="nav-link"' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}