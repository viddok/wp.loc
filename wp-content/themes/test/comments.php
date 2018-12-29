<ol>
    <!--  Проверка: включены ли в админке комментарии для данного поста  -->
	<?php if ( comments_open() ):
        get_template_part('template-parts/forms/form', 'comment');
	endif;
	?>

    <?php
    // Вывод комментариев
    wp_list_comments();

    // Пагинация комментариев
    if ( $post->comment_count > 0 ) :
	    get_template_part( 'template-parts/pagination/pagination', 'comments' );
	endif
    ?>
</ol>

