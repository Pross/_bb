<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _bb
 */

get_header();
?>
<?php do_action( 'fl_before_content' ); ?>
	<div id="primary" class="content-area">
		<?php do_action( 'fl_content_open' ); ?>
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
		<?php do_action( 'fl_content_close' ); ?>
	</div><!-- #primary -->
	<?php do_action( 'fl_after_content' ); ?>

<?php
get_sidebar();
get_footer();
