<?php
/**
 * The template for displaying newsfff archive pages 
 */

get_header();

$description = get_the_archive_description();
?>

<?php if ( have_posts() ) : ?>

	<header class="page-header alignwide">
		<?php the_archive_title( '<h2 class="page-title">', '</h2>' ); ?>
		<?php if ( $description ) : ?>
			<div class="archive-description"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
		<?php endif; ?>
	</header><!-- .page-header --> 
		<?php get_template_part( 'template-parts/content/content-news', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) ); ?> 
	<?php twenty_twenty_one_the_posts_navigation(); ?> 
<?php else : ?>
	<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?> 
<?php get_footer(); ?>
