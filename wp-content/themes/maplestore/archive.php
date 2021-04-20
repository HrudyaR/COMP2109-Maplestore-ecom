<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

$description = get_the_archive_description();
?>

<?php if ( have_posts() ) : ?>

	<header class="page-header alignwide">
		<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
		<?php if ( $description ) : ?>
			<div class="archive-description"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
		<?php endif; ?>
	</header><!-- .page-header -->

	<div class="row">
		<div class="col-8">
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<?php get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) ); ?>
			<?php endwhile; ?>

			<?php twenty_twenty_one_the_posts_navigation(); ?>

			<?php else : ?>
				<?php get_template_part( 'template-parts/content/content-none' ); ?>
			<?php endif; ?>
		</div>
		<div class="col-4">
			<div class="mt-5">
			<?php if ( is_active_sidebar( 'right_sidebar_widget' ) ) : ?> 
				<div id="right-sidebar" class="primary-sidebar sidebar-right-widget-area" role="complementary">
				<?php dynamic_sidebar( 'right_sidebar_widget' ); ?>
				</div> 
			<?php endif; ?>
			</div>
		</div>
	</div>


<?php get_footer(); ?>
