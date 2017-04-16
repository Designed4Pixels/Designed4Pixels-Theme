<div id="sidebar2" class="sidebar large-4 medium-4 columns" role="complementary">

	<?php if ( is_active_sidebar( 'sidebar2' ) ) : ?>

		<?php dynamic_sidebar( 'sidebar2' ); ?>

	<?php else : ?>

	<!-- This content shows up if there are no widgets defined in the backend. -->
						
	<div class="alert help">
		<p><?php _e( 'Please activate some Widgets.', 'designed4pixels' );  ?></p>
	</div>

	<?php endif; ?>

</div>