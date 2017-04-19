<?php
// SIDEBARS AND WIDGETIZED AREAS
function d4p_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __('Sidebar 1 (Right)', 'designed4pixels'),
		'description' => __('Primary Sidebar (Right).', 'designed4pixels'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __('Sidebar 2 (Left)', 'designed4pixels'),
		'description' => __('Secondary Sidebar (Left).', 'designed4pixels'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'off-canvas-top',
		'name' => __('Off Canvas Content (Top)', 'designed4pixels'),
		'description' => __('The Off Canvas Top Sidebar.', 'designed4pixels'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'off-canvas-left',
		'name' => __('Off Canvas Content (Left)', 'designed4pixels'),
		'description' => __('The Off Canvas Left-Hand Sidebar.', 'designed4pixels'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'off-canvas-right',
		'name' => __('Off Canvas Content (Right)', 'designed4pixels'),
		'description' => __('The Off Canvas Left-Hand Sidebar.', 'designed4pixels'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'off-canvas-bottom',
		'name' => __('Off Canvas Content (Bottom)', 'designed4pixels'),
		'description' => __('The Off Canvas Bottom Sidebar.', 'designed4pixels'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'top-info-bar-left',
		'name' => __('Top Info Bar (Left)', 'designed4pixels'),
		'description' => __('Top Info Bar Left-Hand Content Area.', 'designed4pixels'),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));

	register_sidebar(array(
		'id' => 'top-info-bar-right',
		'name' => __('Top Info Bar (Right)', 'designed4pixels'),
		'description' => __('Top Info Bar Right-Hand Content Area.', 'designed4pixels'),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));

	register_sidebar( array(
		'id'          => 'home-feature-section-1',
		'name'        => __( 'Home Page Feature Section (1)', 'designed4pixels' ),
		'description' => __( 'This is the First Home Page Feature Section.', 'designed4pixels' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));

	register_sidebar( array(
		'id'          => 'home-feature-section-2',
		'name'        => __( 'Home Page Feature Section (2)', 'designed4pixels' ),
		'description' => __( 'This is the Second Home Page Feature Section.', 'designed4pixels' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));

	register_sidebar( array(
		'id'          => 'home-feature-section-3',
		'name'        => __( 'Home Page Feature Section (3)', 'designed4pixels' ),
		'description' => __( 'This is the Third Home Page Feature Section.', 'designed4pixels' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));

	register_sidebar( array(
		'id'          => 'home-feature-section-4',
		'name'        => __( 'Home Page Feature Section (4)', 'designed4pixels' ),
		'description' => __( 'This is the Fourth Home Page Feature Section.', 'designed4pixels' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));

	register_sidebar( array(
		'id'          => 'home-feature-section-5',
		'name'        => __( 'Home Page Feature Section (5)', 'designed4pixels' ),
		'description' => __( 'This is the Fifth Home Page Feature Section.', 'designed4pixels' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));

	register_sidebar( array(
		'id'          => 'home-feature-section-6',
		'name'        => __( 'Home Page Feature Section (6)', 'designed4pixels' ),
		'description' => __( 'This is the Sixth Home Page Feature Section.', 'designed4pixels' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));

	register_sidebar( array(
		'id'          => 'home-feature-section-7',
		'name'        => __( 'Home Page Feature Section (7)', 'designed4pixels' ),
		'description' => __( 'This is the Seventh Home Page Feature Section.', 'designed4pixels' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));

	register_sidebar( array(
		'id'          => 'home-feature-section-8',
		'name'        => __( 'Home Page Feature Section (8)', 'designed4pixels' ),
		'description' => __( 'This is the Eigth Home Page Feature Section.', 'designed4pixels' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));

	register_sidebar( array(
		'id'          => 'footer-col-1',
		'name'        => __( 'Footer Col (1)', 'designed4pixels' ),
		'description' => __( 'This is the First Home Page Footer Column.', 'designed4pixels' ),
		'before_widget' => '<div class="footer-col">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar( array(
		'id'          => 'footer-col-2',
		'name'        => __( 'Footer Col (2)', 'designed4pixels' ),
		'description' => __( 'This is the Second Home Page Footer Column', 'designed4pixels' ),
		'before_widget' => '<div class="footer-col">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar( array(
		'id'          => 'footer-col-3',
		'name'        => __( 'Footer Col (3)', 'designed4pixels' ),
		'description' => __( 'This is the Third Home Page Footer Column', 'designed4pixels' ),
		'before_widget' => '<div class="footer-col">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar( array(
		'id'          => 'footer-col-4',
		'name'        => __( 'Footer Col (4)', 'designed4pixels' ),
		'description' => __( 'This is the Fourth Home Page Footer Column', 'designed4pixels' ),
		'before_widget' => '<div class="footer-col">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar( array(
		'id'          => 'footer-left',
		'name'        => __( 'Footer (Left)', 'designed4pixels' ),
		'description' => __( 'This is the Footer Left-Hand Widget.', 'designed4pixels' ),
		'before_widget' => '<div class="large-6 medium-6 columns"><div class="footer-left">',
		'after_widget' => '</div></div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar( array(
		'id'          => 'footer-right',
		'name'        => __( 'Footer (Right)', 'designed4pixels' ),
		'description' => __( 'This is the Footer Right-Hand Widget.', 'designed4pixels' ),
		'before_widget' => '<div class="large-6 medium-6 columns"><div class="footer-right">',
		'after_widget' => '</div></div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

		register_sidebar(array(
		'id' => 'archive-sidebar',
		'name' => __('Custom Archive Sidebar', 'designed4pixels'),
		'description' => __('Sidebar for Custom Archive Posts (Right-Hand).', 'designed4pixels'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	if ( class_exists( 'EDD_Download_Info' ) ) {

	register_sidebar( array(
		'id'          => 'edd-download-info',
		'name'        => __( 'EDD Download Info', 'designed4pixels' ),
		'description' => __( 'This is the EDD Download Info Widget.', 'designed4pixels' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	}

	if ( class_exists( 'WooCommerce' ) ) {

	register_sidebar( array(
		'id'          => 'shop',
		'name'        => __( 'WooCommerce Sidebar', 'designed4pixels' ),
		'description' => __( 'This is the Shop Sidebar Widget.', 'designed4pixels' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	}

}