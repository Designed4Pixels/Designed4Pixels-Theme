<?php
// Register menus
register_nav_menus(
	array(
		'main-nav' => __( 'The Main Menu', 'designed4pixels' ),                                                       // Main Menu in Header
		'footer-links' => __( 'Footer Links', 'designed4pixels' ),                                                    // Footer Navigation
        'footer-social-icons' => __( 'Footer Social Icons', 'designed4pixels' ),                                      // Footer Social Icons
        'header-social-icons' => __( 'Header Social Icons', 'designed4pixels' ),
        'offcanvas-left-nav' => __( 'Off Canvas Left Menu', 'designed4pixels' ),                                               // Header Social Icons
        'offcanvas-right-nav' => __( 'Off Canvas Right Menu', 'designed4pixels' ),       
	)
);

// The Top Menu
function d4p_top_nav() {
	 wp_nav_menu(array(
        'container' => false,                                                                                        // Remove nav container
        'menu_class' => 'vertical medium-horizontal menu',                                                           // Adding custom nav class
        'items_wrap' => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion medium-dropdown">%3$s</ul>',     // Adding Menu Wrapper
        'theme_location' => 'main-nav',        			                                                             // Where it's located in the theme
        'depth' => 5,                                                                                                // Limit the depth of the nav
        'fallback_cb' => false,                                                                                      // Fallback function (see below)
        'walker' => new Off_Canvas_Menu_Walker()
    ));
} /* End Top Menu */

// The Footer Menu
function d4p_footer_links() {
    wp_nav_menu(array(
    	'container' => 'false',                                                                                     // Remove nav container
    	'menu' => __( 'Footer Links', 'designed4pixels' ),   	                                                    // Nav name
    	'menu_class' => 'menu',      					                                                            // Adding custom nav class
    	'theme_location' => 'footer-links',                                                                         // Where it's located in the theme
        'depth' => 0,                                                                                               // Limit the depth of the nav
    	'fallback_cb' => ''  							                                                            // Fallback function
	));
} /* End Footer Menu */

// The Footer Social Icons
function d4p_footer_social_icons() {
    wp_nav_menu(array(
        'container' => 'false',                                                                                     // Remove nav container
        'menu' => __( 'Footer Social Icons', 'designed4pixels' ),                                                   // Nav name
        'menu_class' => 'social-menu',                                                                              // Adding custom nav class
        'theme_location' => 'footer-social-icons',                                                                  // Where it's located in the theme
        'depth' => 0,                                                                                               // Limit the depth of the nav
        'link_before' => '<span style="display: none;">',                                                           // Before each link
        'link_after' => '</span>',                                                                                  // After each link
        'fallback_cb' => ''                                                                                         // Fallback function
    ));
} /* End Footer Social Icons */

// The Header Social Icons
function d4p_header_social_icons() {
    wp_nav_menu(array(
        'container' => 'false',                                                                                     // Remove nav container
        'menu' => __( 'Header Social Icons', 'designed4pixels' ),                                                   // Nav name
        'menu_class' => 'social-menu',                                                                              // Adding custom nav class
        'theme_location' => 'header-social-icons',                                                                  // Where it's located in the theme
        'depth' => 0,                                                                                               // Limit the depth of the nav
        'link_before' => '<span style="display: none;">',                                                           // Before each link
        'link_after' => '</span>',                                                                                  // After each link
        'fallback_cb' => ''                                                                                         // Fallback function
    ));
} /* End Header Social Icons */

// The Off Canvas Left-Hand Menu
function d4p_off_canvas_left_nav() {
     wp_nav_menu(array(
        'container' => false,                                                                                       // Remove nav container
        'menu_class' => 'vertical menu',                                                                            // Adding custom nav class
        'items_wrap' => '<ul id="%1$s" class="%2$s" data-accordion-menu>%3$s</ul>',
        'theme_location' => 'offcanvas-left-nav',                                                                             // Where it's located in the theme
        'depth' => 5,                                                                                               // Limit the depth of the nav
        'fallback_cb' => false,                                                                                     // Fallback function (see below)
        'walker' => new Off_Canvas_Menu_Walker()
    ));
} /* End Off Canvas Menu */

// The Off Canvas Right-Hand Menu
function d4p_off_canvas_right_nav() {
     wp_nav_menu(array(
        'container' => false,                                                                                       // Remove nav container
        'menu_class' => 'vertical menu',                                                                            // Adding custom nav class
        'items_wrap' => '<ul id="%1$s" class="%2$s" data-accordion-menu>%3$s</ul>',
        'theme_location' => 'offcanvas-right-nav',                                                                             // Where it's located in the theme
        'depth' => 5,                                                                                               // Limit the depth of the nav
        'fallback_cb' => false,                                                                                     // Fallback function (see below)
        'walker' => new Off_Canvas_Menu_Walker()
    ));
} /* End Off Canvas Menu */