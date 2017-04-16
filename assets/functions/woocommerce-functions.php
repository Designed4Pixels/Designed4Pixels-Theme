<?php
/* Woocommerce Functions */


// This indicates that the theme supports WooCommerce
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'woocommerce_support' );


add_filter( 'woocommerce_enqueue_styles', 'd4p_dequeue_styles' );
function d4p_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	return $enqueue_styles;
}


?>