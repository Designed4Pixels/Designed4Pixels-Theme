jQuery(document).foundation();
/* 
These functions make sure WordPress 
and Foundation play nice together.
*/

jQuery(document).ready(function() {
    
    // Remove empty P tags created by WP inside of Accordion and Orbit
    jQuery('.accordion p:empty, .orbit p:empty').remove();
    
	 // Makes sure last grid item floats left
	jQuery('.archive-grid .columns').last().addClass( 'end' );
	
	// Adds Flex Video to YouTube and Vimeo Embeds
	jQuery('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').wrap("<div class='flex-video'/>");

	var index = jQuery( ".upper-nav-bar" ).height();

	jQuery( "#inner-content" ).css( "padding-top", "+=" + index );

	if ( init_settings.show_admin_bar ) {
		index = index + 32;
	}

	// Applies additional top margin for WordPress Admin & top info bar
    jQuery( "#off-canvas-left .off-canvas-inner, #off-canvas-right .off-canvas-inner" ).css( "margin-top", "+=" + index );

	jQuery( "#off-canvas-top button.close-button" ).css( "top", "+=" + index );

	jQuery( "#home-feature-section-1 .image-feature .narrow-container" ).css( "margin-top", "+=" + index );

    index = index + jQuery( ".lower-nav-bar" ).height();

    jQuery( ".image-mask" ).css( "height", "+=" + index);

    jQuery( "#off-canvas-top .off-canvas-inner" ).css( "margin-top", "+=" + index );


});

