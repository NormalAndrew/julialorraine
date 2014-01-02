
<?php

add_theme_support( 'post-thumbnails' );

set_post_thumbnail_size( 50, 50 ); // 50 pixels wide by 50 pixels tall, box resize mode

?>
<?php
if ( has_post_thumbnail() ) {
    // the current post has a thumbnail
} else {
    // the current post lacks a thumbnail
}
?>

<?php
function functions_slide_indicator($post) //specify argument, you forgot this
{
    $special_gallery = get_post_gallery( $post, false );
    $ids = explode( ",", $special_gallery['ids'] );
    $formats = array(
        'indicator' => '<li data-target="#carousel-example-generic" data-slide-to="%d"></li>',
        'slide'     => '<div class="item"><img src="%s"><div class="carousel-caption"><h4>%s</h4><p>%s</p></div></div>'
    );
    $html = array(
        'indicator' => '<ol class="carousel-indicators"><li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>',
        'slide'     => '<div class="carousel-inner">'
    );
    $link= wp_get_attachment_url($ids[0]);//get data for first id, not in loop
    $attachment_meta = wp_get_attachment($ids[0]);
    $html['slide'] .= sprintf(str_replace('<div class="item"', '<div class="active item"', $formats['slide']), $link, $attachment_meta['title'], $attachment_meta['description']);
    for($i = 1, $j = count($ids);$i<$j;$i++)
    {//start at 1, not 0, so no active class in here
        $link   = wp_get_attachment_url( $ids[$i] );
        $attachment_meta = wp_get_attachment($ids[$i]);
        $html['indicator'] .= sprintf($formats['indicator'], $i);// no need to increment/decrement it here, it'll be the value you need
        $html['slide'] .= sprintf($formats['slide'],$link, $attachment_meta['title'], $attachment_meta['description']);
    }
    $html['indicator'] .= '</ol>';
    $html['slide'] .= '</div>';//close markup
    return $html;//return array
}

?>