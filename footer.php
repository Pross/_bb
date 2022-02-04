<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */
	do_action( 'fl_before_footer' );
	do_action( '_bb_footer' );
	do_action( 'fl_after_footer' ); ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
