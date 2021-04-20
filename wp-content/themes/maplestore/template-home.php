<?php
/* Template Name: Home Page */

get_header(); 
?>
<h2> Our Recent Products </h2>
<?php get_template_part( 'template-parts/content/content-products', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) ); ?>
<h2> Featured Products </h2>
<?php echo do_shortcode('[featured_products limit="6" columns="4"]'); ?> 
<?php get_footer(); ?> 