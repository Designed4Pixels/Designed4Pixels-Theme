<?php get_header(); ?>

<?php do_action( 'd4p_after_header' ); 

    // Retrieve the stored custom field data from the database
    $custom_field1 = get_post_meta( get_the_ID(), 'custom_field1', true );
    $custom_field2 = get_post_meta( get_the_ID(), 'custom_field2', true );
    $custom_field3 = get_post_meta( get_the_ID(), 'custom_field3', true );
    $custom_field4 = get_post_meta( get_the_ID(), 'custom_field4', true );
    $custom_field5 = get_post_meta( get_the_ID(), 'custom_field5', true );
    $custom_field6 = get_post_meta( get_the_ID(), 'custom_field6', true );  ?>
			
<div id="content">
	
		<div id="inner-content" class="row">

    <?php if (( get_post_type( get_the_ID() ) == get_option( 'd4p_content_type' )) && (( ! empty( $custom_field1 )) || ( ! empty( $custom_field3 )) || ( ! empty( $custom_field5 )) || ( is_active_sidebar( 'archive-sidebar' ) ))) { ?>

		        <main id="main" class="large-8 medium-8 columns" role="main">

    <?php } else { ?>

            <main id="main" class="large-10 medium-10 large-centered columns" role="main">

    <?php } ?>

		
		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		    	<?php get_template_part( 'template-parts/loop', 'single' ); ?>
		    	
		    <?php endwhile; else : ?>
		
		   		<?php get_template_part( 'template-parts/content', 'missing' ); ?>

		    <?php endif; ?>

		</main> <!-- end #main -->

    <?php

/* original custom fields position */

    ?>

		<?php if (( get_post_type( get_the_ID()) == get_option( 'd4p_content_type' )) && (( ! empty( $custom_field1 )) || ( ! empty( $custom_field3 )) || ( ! empty( $custom_field5 )))) { ?>

        <div id="custom-archive-sidebar" class="custom-archive-sidebar large-4 medium-4 columns" >

            <h4 class="widgettitle"><?php echo ucfirst( rtrim( get_option( 'd4p_content_type' ), "s")) ?> Details</h4>

            <div style="border-bottom: 1px solid #ccc; padding-bottom: 15px; ">
              <div style="display: table; width: 100%; ">

                <?php if( ! empty( $custom_field1 ) ) { ?>
                  <div style="display: table-row;">
                    <div style="display: table-cell; width: 30%;">
                      <?php echo $custom_field1 . ':'; ?>
                    </div>
                    <div style="display: table-cell; padding: 5px 5px 5px 20px; width: 70%;">
                      <?php if( ! empty( $custom_field2 ) ) { echo $custom_field2; } ?>    
                    </div>
                  </div>
                <?php } ?>

                <?php if( ! empty( $custom_field3 ) ) { ?>
                  <div style="display: table-row;">
                    <div style="display: table-cell; width: 30%;">
                      <?php echo $custom_field3 . ':'; ?>
                    </div>
                    <div style="display: table-cell; padding: 5px 5px 5px 20px; width: 70%;">
                      <?php if( ! empty( $custom_field4 ) ) { echo $custom_field4; } ?>    
                    </div>
                  </div>
                <?php } ?>

                <?php if( ! empty( $custom_field5 ) ) { ?>
                  <div style="display: table-row; ">
                    <div style="display: table-cell; width: 30%; ">
                      <?php echo $custom_field5 . ':'; ?>
                    </div>
                    <div style="display: table-cell; padding: 5px 5px 5px 20px; width: 70%;">
                      <?php if( ! empty( $custom_field6 ) ) { echo '<a href="'. $custom_field6 .'">'. $custom_field6 .'</a>'; } ?>   
                    </div>
                  </div>
                <?php } ?>

              </div>
            </div>

      </div>

		<?php } elseif ( is_active_sidebar( 'archive-sidebar' ) ) { ?>

        <div id="sidebar1" class="sidebar large-4 medium-4 columns" >

                <?php dynamic_sidebar( 'archive-sidebar' );?>

        </div>

    <?php } ?>

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>