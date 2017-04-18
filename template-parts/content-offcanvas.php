
<div class="off-canvas position-top" id="off-canvas-top" data-off-canvas data-position="top" data-transition="overlap">

		<!-- Close button -->
    <button id="top-close-button" class="close-button" aria-label="Close menu" type="button" data-close>
         <span aria-hidden="true">[close]</span>
    </button>

    <div class="off-canvas-inner">
    	<div class="row">

    		<?php

    		//* Select Off Canvas Right content giving preference to Off Canvas (Right) Widget
			if ( is_active_sidebar( 'off-canvas-top' ) ) {
		
				dynamic_sidebar( 'off-canvas-top' ); 

			} ?>

		</div>
	</div>

</div>


<div class="off-canvas position-left" id="off-canvas-left" data-off-canvas data-position="left" data-transition="overlap">

    <!-- Close button -->
    <button class="close-button" aria-label="Close menu" type="button" data-close>
         <span aria-hidden="true">[close]</span>
    </button>

    <div class="off-canvas-inner">

	    <?php //* Select Off Canvas Left content giving preference to Off Canvas (Left) Widget
		if ( is_active_sidebar( 'off-canvas-left' ) ) {
		
			dynamic_sidebar( 'off-canvas-left' ); 

		} elseif ( is_nav_menu( 'Off Canvas Left' ) ) {

			d4p_off_canvas_left_nav();
		}  ?>

	</div>
	
</div>


<div class="off-canvas position-right" id="off-canvas-right" data-off-canvas data-position="right" data-transition="overlap">

    <!-- Close button -->
    <button class="close-button" aria-label="Close menu" type="button" data-close>
         <span aria-hidden="true">[close]</span>
    </button>

    <div class="off-canvas-inner">

    	<?php //* Select Off Canvas Right content giving preference to Off Canvas (Right) Widget
		if ( is_active_sidebar( 'off-canvas-right' ) ) {
		
			dynamic_sidebar( 'off-canvas-right' ); 

		} elseif ( is_nav_menu( 'Off Canvas Right' ) ) {

			d4p_off_canvas_right_nav();
		}  ?>

	</div>

</div>

<div class="off-canvas position-bottom" id="off-canvas-bottom" data-off-canvas data-position="bottom" data-transition="overlap">

    <!-- Close button -->
    <button class="close-button" aria-label="Close menu" type="button" data-close>
         <span aria-hidden="true">[close]</span>
    </button>

    <div class="off-canvas-inner">

	    <?php //* Select Off Canvas Left content giving preference to Off Canvas (Left) Widget
		if ( is_active_sidebar( 'off-canvas-bottom' ) ) {
		
			dynamic_sidebar( 'off-canvas-bottom' ); 

		} ?>

	</div>
	
</div>