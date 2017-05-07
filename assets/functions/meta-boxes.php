<?php
/* This section adds a meta-box to the theme. */


function d4p_custom_meta_box() {

    $d4p_archive_page = get_option( 'd4p_content_type', 'portfolio' );

    $archive_title = ucfirst( rtrim( $d4p_archive_page, "s"));

    add_meta_box( 'd4p_meta', __( $archive_title . ' Details', 'designed4pixels' ), 'd4p_meta_callback', $d4p_archive_page );
}
add_action( 'add_meta_boxes', 'd4p_custom_meta_box' );


/**
 * Outputs the content of the meta box
 */
function d4p_meta_callback( $post ) {
       wp_nonce_field( basename( __FILE__ ), 'd4p_nonce' );
    $d4p_stored_meta = get_post_meta( $post->ID );
    ?>
 
    <p>
        <label for="custom_field1" class="d4p-row-title"><?php _e( 'Label 1', 'designed4pixels' )?></label>
        <input type="text" name="custom_field1" id="custom_field1" value="<?php if ( isset ( $d4p_stored_meta['custom_field1'] ) ) echo $d4p_stored_meta['custom_field1'][0]; ?>" /> : 
    
        <label for="custom_field2" class="d4p-row-title"><?php _e( 'Text', 'designed4pixels' )?></label>
        <input type="text" name="custom_field2" id="custom_field2" value="<?php if ( isset ( $d4p_stored_meta['custom_field2'] ) ) echo $d4p_stored_meta['custom_field2'][0]; ?>" />
    </p>

    <p>
        <label for="custom_field3" class="d4p-row-title"><?php _e( 'Label 2', 'designed4pixels' )?></label>
        <input type="text" name="custom_field3" id="custom_field3" value="<?php if ( isset ( $d4p_stored_meta['custom_field3'] ) ) echo $d4p_stored_meta['custom_field3'][0]; ?>" /> :
    
        <label for="custom_field4" class="d4p-row-title"><?php _e( 'Text', 'designed4pixels' )?></label>
        <input type="text" name="custom_field4" id="custom_field4" value="<?php if ( isset ( $d4p_stored_meta['custom_field4'] ) ) echo $d4p_stored_meta['custom_field4'][0]; ?>" />
    </p>

    <p>
        <label for="custom_field5" class="d4p-row-title"><?php _e( 'Label 3', 'designed4pixels' )?></label>
        <input type="text" name="custom_field5" id="custom_field5" value="<?php if ( isset ( $d4p_stored_meta['custom_field5'] ) ) echo $d4p_stored_meta['custom_field5'][0]; ?>" /> : 
    
        <label for="custom_field6" class="d4p-row-title"><?php _e( 'URL Link', 'designed4pixels' )?></label>
        <input type="text" name="custom_field6" id="custom_field6" value="<?php if ( isset ( $d4p_stored_meta['custom_field6'] ) ) echo $d4p_stored_meta['custom_field6'][0]; ?>" />
    </p>
 
    <?php  
}


/**
 * Saves the custom meta input
 */
function d4p_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'd4p_nonce' ] ) && wp_verify_nonce( $_POST[ 'd4p_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'custom_field1' ] ) ) {
        update_post_meta( $post_id, 'custom_field1', sanitize_text_field( $_POST[ 'custom_field1' ] ) );
    }

    if( isset( $_POST[ 'custom_field2' ] ) ) {
        update_post_meta( $post_id, 'custom_field2', sanitize_text_field( $_POST[ 'custom_field2' ] ) );
    }

    if( isset( $_POST[ 'custom_field3' ] ) ) {
        update_post_meta( $post_id, 'custom_field3', sanitize_text_field( $_POST[ 'custom_field3' ] ) );
    }

    if( isset( $_POST[ 'custom_field4' ] ) ) {
        update_post_meta( $post_id, 'custom_field4', sanitize_text_field( $_POST[ 'custom_field4' ] ) );
    }

    if( isset( $_POST[ 'custom_field5' ] ) ) {
        update_post_meta( $post_id, 'custom_field5', sanitize_text_field( $_POST[ 'custom_field5' ] ) );
    }

    if( isset( $_POST[ 'custom_field6' ] ) ) {
        update_post_meta( $post_id, 'custom_field6', esc_url( $_POST[ 'custom_field6' ] ) );
    }
 
}
add_action( 'save_post', 'd4p_meta_save' );