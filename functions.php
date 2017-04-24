<?php

//* Add Theme Support Selection
require_once( get_template_directory() . '/assets/functions/theme-support.php' );

//* Add in the Settings Sanitization Utilities
require_once( get_template_directory() . '/assets/functions/sanitize.php' );

//* Add WP Head and Cleanup Functions
require_once( get_template_directory() . '/assets/functions/cleanup.php' ); 

//* Register Scripts and Stylesheets
require_once( get_template_directory() . '/assets/functions/enqueue-scripts.php' ); 

//* Register Custom Menus
require_once( get_template_directory() . '/assets/functions/menu.php' );

//* Register Custom Menu Walkers
require_once( get_template_directory() . '/assets/functions/menu-walkers.php' ); 

//* Register Sidebars/Widget Areas
require_once( get_template_directory() . '/assets/functions/sidebar.php' ); 

//* Improve WordPress Comments
require_once( get_template_directory() . '/assets/functions/comments.php' ); 

//* Replace 'Older/Newer' Post Links with Numbered Navigation
require_once( get_template_directory() . '/assets/functions/page-navi.php' );  

//* Add in Theme Customizer support
require_once( get_template_directory() . '/inc/customizer.php' );

// Adds site styles to the WordPress editor
// require_once(get_template_directory().'/assets/functions/editor-styles.php'); 

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/assets/functions/related-posts.php'); 

// Use this as a template for custom post types
require_once( get_template_directory() . '/assets/functions/custom-post-type.php' );

// Use this as a template for custom post types
require_once( get_template_directory() . '/assets/functions/meta-boxes.php' );

//* Adds support for multiple languages
require_once( get_template_directory() . '/translation/translation.php' );

// Widget Support
require_once( get_template_directory() . '/assets/functions/widgets.php' );

// Plugin Support
require_once( get_template_directory() . '/assets/functions/woocommerce-functions.php' );

//* Add in Multisite Support (if Theme is installed in WordPress Multisite)
if ( is_multisite() ) {
    require_once( get_template_directory() . '/assets/functions/multisite.php' );
}


//* Set-up the Default Content Width
if ( !isset( $content_width ) ) $content_width = 1200;


//* Add Support for Changing Theme Accent Color Settings
function d4p_color_scheme_classes( $classes ) {

	//* Read in the Color Theme Mod Settings
	$d4p_color_scheme = get_theme_mod( 'd4p_color_scheme', 'light' );
	$d4p_accent_color = get_theme_mod( 'd4p_accent_color', 'pastelblue' );	

	//* Set-up the Theme Color Scheme Class       
    if ( $d4p_color_scheme == 'light' ) :     
        $classes[] = 'light-color-scheme';       
    elseif ( $d4p_color_scheme == 'dark' ) :     
        $classes[] = 'dark-color-scheme';               
    elseif ( $d4p_color_scheme == 'custom' ) :     
        $classes[] = 'custom-color-scheme';               
    endif;

	//* Set-up the Accent Color Class
    if ( $d4p_accent_color == 'pastelblue' ) :     
        $classes[] = 'color-one';       
    elseif ( $d4p_accent_color == 'darkblue' ) :     
        $classes[] = 'color-two';
    elseif ( $d4p_accent_color == 'red' ) :     
        $classes[] = 'color-three';
    elseif ( $d4p_accent_color == 'green' ) :     
        $classes[] = 'color-four';
    elseif ( $d4p_accent_color == 'violet' ) :     
        $classes[] = 'color-five';               
    elseif ( $d4p_accent_color == 'gold' ) :     
        $classes[] = 'color-six';
    elseif ( $d4p_accent_color == 'custom' ) :     
        $classes[] = 'custom-color';              
    endif;
        
    return $classes;
}
add_filter( 'body_class', 'd4p_color_scheme_classes');


/**
 * Display custom color CSS.
 */
function d4p_create_accent_color_css() {

    if ( 'custom' !== get_theme_mod( 'd4p_accent_color' ) && ! is_customize_preview() ) {
        return;
    }

    require_once( get_parent_theme_file_path( '/inc/accent-color-css.php' ) );
    $accent_color = get_theme_mod( 'd4p_custom_accent_color' );
    $accent_color_light = hex2rgba( $accent_color, 0.5 ); 

	?>
    <style type="text/css" id="custom-accent-color" <?php if ( is_customize_preview() ) { echo 'data-accent-color="' . $accent_color . '" data-accent-color-light="' . $accent_color_light . '"'; } ?>>
        <?php echo d4p_accent_color_css(); ?>
    </style>
	<?php
}
add_action( 'wp_head', 'd4p_create_accent_color_css' );


/**
 * Display custom color CSS.
 */
function d4p_create_color_scheme_css() {

    if ( 'custom' !== get_theme_mod( 'd4p_color_scheme' ) && ! is_customize_preview() ) {
        return;
    }

    $color_settings_array = (array) get_theme_mod( 'd4p_default_color_settings_array' );

  	foreach ( $color_settings_array as $key => $value ) {
      	$colors[ $key ] = get_theme_mod( $key, $value );
  	}?>

    <style type="text/css" id="custom-color-scheme" >
        <?php echo d4p_get_color_scheme_css( $colors ); ?>
    </style>
    <?php }
add_action( 'wp_head', 'd4p_create_color_scheme_css' );



//* Add Support for Post Thumbnails on Posts and Pages.
add_theme_support( 'post-thumbnails' );
add_image_size( 'side-bar', 335, 200, true );      						// Side Bar Images
add_image_size( 'post-index', 768, 350, array( 'left', 'top' ) );   	// Blog Page Images
add_image_size( 'single-post', 768, 350, array( 'left', 'top' ) );   	// Single Page & Post Images
add_image_size( 'row-width', 970, 550, array( 'center', 'top' ) );     	// Row Width
add_image_size( 'full-content', 1200, 800, array( 'left', 'top' ) );    // Full Content Width
add_image_size( 'full-width', 1600, 800, true );   						// Full Size (Parallax, etc)
add_image_size( 'orbit-custom', 1600, 800, true );   					// WP-Orbit Slider
add_image_size( 'designed4pixels-featured-image', 2000, 1200, true );	// Home Page Featured Image


// Add Support for Scroll-to-Top Button
function d4p_to_top() {
     echo '<a href="#0" class="to-top" title="Back To Top">Top</a>';
}
add_action( 'd4p_after_header', 'd4p_to_top');


//* Add Support for Custom Post Tags
function d4p_single_post_tags() {
	
	?> <p class="tags-title"><span><?php if (has_category()):?> Categories: <?php the_category(', ') ?> <br> <?php endif; the_tags('' . __( 'Tags: ', 'designed4pixels' ) . '', ', ', '');
		?></span></p><?php
}
add_action( 'd4p_article_footer', 'd4p_single_post_tags' );



//* Create the Info Bar (integrate Widgets and Social Icons)
function d4p_info_bar_widget() {

	if ( is_active_sidebar( 'top-info-bar-left' ) |  is_active_sidebar( 'top-info-bar-right' ) | is_nav_menu( 'Header Social Icons' ) ) { ?>

		<div class="info-bar">
			<div class="row">
				<div class="info-bar-left">

					<?php		

					// Select the Footer (Right) Widget or the Footer Social Links Menu
					if ( is_active_sidebar( 'top-info-bar-left' ) ) {
		
						dynamic_sidebar( 'top-info-bar-left' ); 

					} elseif ( is_nav_menu( 'Header Social Icons' ) ) {

						?>

						<div class="infobar-icons" id="infobar-icons">

						<?php d4p_header_social_icons(); ?>

						</div>

					<?php }	?>

				</div>

  				<div class="info-bar-right">

  					<?php if ( is_active_sidebar( 'top-info-bar-right' ) ) {
		
						dynamic_sidebar( 'top-info-bar-right' ); 

					} ?>

  				</div>
  			</div>
		</div>

	<?php 

	}
}
add_action( 'd4p_header_info_bar', 'd4p_info_bar_widget' );



//* Add Header Logo Bar Functionality
function d4p_header_logo_bar_style() {

		$header_logo = get_theme_mod( 'd4p_header_logo_image' );
		

		if ( !empty( $header_logo )) {
			$logo_class = 'class="logo-bar-left show-for-large logo-img"';
		} else {
			$logo_class = 'class="logo-bar-left show-for-large"';
		} ?>

		<div class="logo-bar" id="logo-bar" >
			<div class="row">

				<div id="title-area" <?php echo $logo_class; ?>  >

					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'name' ) ); ?></a></h1>

					<p class="site-description"><?php echo esc_attr( get_bloginfo( 'description' ) ); ?></p>

				</div>

				<div class="logo-bar-right">
					<div id="nav-menu"><?php d4p_top_nav(); ?></div>
				</div>
			</div>
		</div>

		<?php

}
add_action( 'd4p_header_logo_bar', 'd4p_header_logo_bar_style' );



//* Add Header Title Bar Functionality for Mobile Devices 
function d4p_header_title_bar_style() {

		$header_logo = get_theme_mod( 'd4p_header_logo_image' );
		$breakpoint = "large"; ?>

		<div class="title-bar" data-responsive-toggle="nav-menu" data-hide-for="<?php echo $breakpoint ?>" >

		<?php if ( !empty( $header_logo )) { ?>

					<div id="title-logo" class="title-bar-left">
  						<a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
  					</div>

		<?php } else { ?>

				<div class="title-bar-left">

					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'name' ) ); ?></a></h1>

					<p class="site-description"><?php echo esc_attr( get_bloginfo( 'description' ) ); ?></p>

				</div>

		<?php } ?>

				<div class="title-bar-right">
					<button class="menu-icon" type="button" data-toggle></button>
				</div>
		</div>

		<?php

}
add_action( 'd4p_header_title_bar', 'd4p_header_title_bar_style' );



//* Add Custom Footer
function d4p_custom_footer() {
	
		?>

		<div class="large-6 medium-6 columns">
			<div class="footer-left">
				<?php echo get_theme_mod('d4p_footer_text', '<p><a href="http://wordpress.org/">Proudly powered by WordPress</a></p>'); ?>
			</div>
		</div>

		<?php

		//* Select the Footer (Right) Widget or the Footer Social Links Menu
		if ( is_active_sidebar( 'footer-right' ) ) {
		
			dynamic_sidebar( 'footer-right' ); 

		} elseif ( is_nav_menu( 'Footer Social Icons' ) ) {

			?> 	<div class="large-6 medium-6 columns"><div class="footer-right" id="footer-right">

					<?php d4p_footer_social_icons(); ?>

				</div></div>

			<?php

		}	
}
add_action( 'd4p_footer', 'd4p_custom_footer' );



//* Add Homepage Widgets to the Front Page
function d4p_front_page_widgets() {

	?>

	<div id="home-page-sections">

		<?php

		//* Home Page: Home Feature Section 1
		if ( is_active_sidebar( 'home-feature-section-1' ) ) { ?> 
			<div id="home-feature-section-1">
			 	<?php dynamic_sidebar( 'home-feature-section-1' ); ?>
			</div>
		<?php }

		//* Home Page: Home Feature Section 2
		if ( is_active_sidebar( 'home-feature-section-2' ) ) { ?> 
			<div id="home-feature-section-2">
			 	<?php dynamic_sidebar( 'home-feature-section-2' ); ?>
			</div>
		<?php }

		//* Home Page: Home Feature Section 3
		if ( is_active_sidebar( 'home-feature-section-3' ) ) { ?> 
			<div id="home-feature-section-3">
			 	<?php dynamic_sidebar( 'home-feature-section-3' ); ?>
			</div>
		<?php }

		//* Home Page: Home Feature Section 4
		if ( is_active_sidebar( 'home-feature-section-4' ) ) { ?> 
			<div id="home-feature-section-4">
			 	<?php dynamic_sidebar( 'home-feature-section-4' ); ?>
			</div>
		<?php }

		//* Home Page: Home Feature Section 5
		if ( is_active_sidebar( 'home-feature-section-5' ) ) { ?> 
			<div id="home-feature-section-5">
			 	<?php dynamic_sidebar( 'home-feature-section-5' ); ?>
			</div>
		<?php }

		//* Home Page: Home Feature Section 6
		if ( is_active_sidebar( 'home-feature-section-6' ) ) { ?> 
			<div id="home-feature-section-6">
			 	<?php dynamic_sidebar( 'home-feature-section-6' ); ?>
			</div>
		<?php }

		//* Home Page: Home Feature Section 7
		if ( is_active_sidebar( 'home-feature-section-7' ) ) { ?> 
			<div id="home-feature-section-7">
			 	<?php dynamic_sidebar( 'home-feature-section-7' ); ?>
			</div>
		<?php }

		//* Home Page: Home Feature Section 8
		if ( is_active_sidebar( 'home-feature-section-8' ) ) { ?> 
			<div id="home-feature-section-8">
			 	<?php dynamic_sidebar( 'home-feature-section-8' ); ?>
			</div>
		<?php }
		
		?>
			
	</div>

	<?php
}
add_action( 'd4p_front_page', 'd4p_front_page_widgets' );


/* Convert hexdec color string to rgb(a) string */
 
function hex2rgba( $color, $opacity = false ) {
 
	$default = 'rgb(0,0,0)';
 
	//Return default if no color provided
	if(empty($color))
          return $default; 
 
	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
}


/***************************************************************************/
/* DO NOT REMOVE - Automatic Theme Updater (via the EDD Updates Extension) */


require_once('wp-updates-theme.php');
new WPUpdatesThemeUpdater_1947( 'http://wp-updates.com/api/2/theme', basename( get_template_directory() ) );
