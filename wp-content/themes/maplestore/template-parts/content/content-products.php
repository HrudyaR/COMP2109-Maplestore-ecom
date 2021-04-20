<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<article>
<?php echo do_shortcode('[products limit="12" columns="4" orderby="popularity" class="quick-sale" category paginate="true"]'); ?>
</article>