<?php
function wp_custom_pagination($args = [], $class = 'pagination') {
 
    if ($GLOBALS['wp_query']->max_num_pages <= 1) return;
 
    $args = wp_parse_args( $args, [
        'mid_size'           => 2,
        'prev_next'          => false,
        'prev_text'          => __('→', 'textdomain'),
        'next_text'          => __('←', 'textdomain'),
        'before_page_number' => '<li class="page-item">',
        'after_page_number'  => '</li>'
    ]);
 
    $links     = paginate_links($args);
    $next_link = get_previous_posts_link($args['next_text']);
    $prev_link = get_next_posts_link($args['prev_text']);
    $template  = apply_filters( 'navigation_markup_template', '
                                    <nav>
                                        <ul class="pagination justify-content-center">%5$s%4$s%3$s</ul>
                                    </nav>', $args, $class);
    echo sprintf($template, $class, $args['screen_reader_text'], $prev_link, $links, $next_link);
 
}
wp_custom_pagination();
