<?php
/*
Plugin Name: Maple News
Plugin URI: http://hrudyaraj.com/
Description: Manage Maple Store News
Version: 1.0
Author: Hrudya Raj <mail.hrudya@gmail.com>
Author URI: http://hrudyaraj.com/
License: GPLv2
*/

function manage_news() {
    register_post_type( 'news',
        array(
            'labels' => array(
                'name' => 'News',
                'singular_name' => 'Maple News',
                'add_new' => 'Create A News',
                'edit' => 'Edit',
                'edit_item' => 'Edit News',
                'view' => 'View',
                'view_item' => 'View News',
                'search_items' => 'Search News',
                'not_found' => 'No News found',
                'not_found_in_trash' => 'No News found in Trash',
                'parent' => 'Parent News'
            ),
            'public' => true,
            'menu_position' => 3,
            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            'taxonomies' => array( '' ),
            'menu_icon' => 'dashicons-media-document',
            'has_archive' => true
        )
    );
}
add_action( 'init', 'manage_news' );

add_shortcode( 'news-list','getNewsListShortCode' ); 
function getNewsListShortCode(){
    $news_args = array(
        'post_type'=> 'news',
        'order'    => 'DESC'
    );
    $get_latest_news = new WP_Query($news_args);
    $news = $get_latest_news->posts; 
    $html = ''; 
    $html .= '<div class="main-article">'; 
    foreach($news as $ne){
        $pub_date = get_field( "published_date", $ne->ID );
        $event_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($ne->ID), 'full' );
        $html .= '<div class="news-short-title mb-5"><a href="'.get_the_permalink($ne->ID).'">'.$ne->post_title.'</a></div>';
        $html .= '<div class="news-short-image"><img class="card-img-top" src="'.$event_image_url[0].'"/></div>';
        $html .= '<div class="news-short-description">'.html_entity_decode(substr($ne->post_content, 0, 150)).'</div>';
        $html .= '<div class="news-short-pub-date"> Published Date: '.$pub_date.'</div>';
        $html .= '<hr>';
    }
    $html .= '</div>'; 
    echo $html; 
} 
?> 