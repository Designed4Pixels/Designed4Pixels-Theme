<div id="sidebar1" class="sidebar large-4 medium-4 columns" role="complementary">

	<?php if ( is_active_sidebar( 'shop' ) ) : ?>

		<?php dynamic_sidebar( 'shop' ); ?>

	<?php else : ?>

	<!-- This content shows up if there are no widgets defined in the backend. -->
						
	<div class="alert help">
		<p><?php _e( 'Please activate some Widgets.', 'designed4pixels' );  ?></p>
	</div>

	<?php endif; ?>

</div>