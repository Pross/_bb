<?php
/**
 *
 */
class BeaverBuilderUnderscores {

	function __construct() {
		add_action( 'after_setup_theme', array( $this, 'setup' ) );
		add_action( 'wp', array( $this, '_bb_themer_header_footer' ) );
		add_action( '_bb_header', array( $this, '_bb_header' ) );
		add_action( '_bb_footer', array( $this, '_bb_footer' ) );
		add_filter( 'fl_theme_builder_part_hooks', array( $this, 'register_part_hooks' ) );
	}
	
	function _bb_themer_header_footer() {
		$header_ids = FLThemeBuilderLayoutData::get_current_page_header_ids();
		
		// If we have a header, remove the theme header and hook in Theme Builder's.
		if ( ! empty( $header_ids ) ) {
			remove_action( '_bb_header', '_bb_header' );
			add_action( '_bb_header', 'FLThemeBuilderLayoutRenderer::render_header' );
		}

		$footer_ids = FLThemeBuilderLayoutData::get_current_page_footer_ids();
		
		if ( ! empty( $footer_ids ) ) {
			remove_action( '_bb_footer', '_bb_footer' );
			add_action( '_bb_footer', 'FLThemeBuilderLayoutRenderer::render_footer' );
		}
	}
	
	function _bb_header() {
		get_template_part( 'template-parts/header' );
	}


	function _bb_footer() {
		get_template_part( 'template-parts/footer' );
	}

	public function setup() {
		add_theme_support( 'fl-theme-builder-headers' );
		add_theme_support( 'fl-theme-builder-footers' );
		add_theme_support( 'fl-theme-builder-parts' );
	}

	public function register_part_hooks() {
		return array(
			array(
				'label' => __( 'Page', '_bb' ),
				'hooks' => array(
					'fl_page_open'  => __( 'Page Open', '_bb' ),
					'fl_page_close' => __( 'Page Close', '_bb' ),
				),
			),
			array(
				'label' => __( 'Header', '_bb' ),
				'hooks' => array(
					'fl_before_header' => __( 'Before Header', '_bb' ),
					'fl_after_header'  => __( 'After Header', '_bb' ),
				),
			),
			array(
				'label' => __( 'Content', '_bb' ),
				'hooks' => array(
					'fl_before_content' => __( 'Before Content', '_bb' ),
					'fl_content_open'   => __( 'Content Open', '_bb' ),
					'fl_content_close'  => __( 'Content Close', '_bb' ),
					'fl_after_content'  => __( 'After Content', '_bb' ),
				),
			),
			array(
				'label' => __( 'Footer', '_bb' ),
				'hooks' => array(
					'fl_before_footer' => __( 'Before Footer', '_bb' ),
					'fl_after_footer'  => __( 'After Footer', '_bb' ),
				),
			),
			array(
				'label' => __( 'Posts', '_bb' ),
				'hooks' => array(
					'fl_before_post'         => __( 'Before Post', '_bb' ),
					'fl_before_post_content' => __( 'Before Post Content', '_bb' ),
					'fl_after_post_content'  => __( 'After Post Content', '_bb' ),
					'fl_after_post'          => __( 'After Post', '_bb' ),
					'fl_comments_open'       => __( 'Comments Open', '_bb' ),
					'fl_comments_close'      => __( 'Comments Close', '_bb' ),
				),
			),
		);
	}
}
new BeaverBuilderUnderscores;