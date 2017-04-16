				<?php if ( is_active_sidebar( 'footer-col-1' ) | is_active_sidebar( 'footer-col-2' ) | is_active_sidebar( 'footer-col-3' ) | is_active_sidebar( 'footer-col-4' )) { ?>	

					<div class="footer-cols" role="contentinfo">

						<div class="row footer-columns">

							<div class="large-3 columns">

								<?php if ( is_active_sidebar( 'footer-col-1' ) ) { ?>
									<?php dynamic_sidebar( 'footer-col-1' ); ?>
								<?php } ?>

							</div>

							<div class="large-3 columns">

								<?php if ( is_active_sidebar( 'footer-col-2' ) ) { ?>
									<?php dynamic_sidebar( 'footer-col-2' ); ?>
								<?php } ?>

							</div>

							<div class="large-3 columns">

								<?php if ( is_active_sidebar( 'footer-col-3' ) ) { ?>
									<?php dynamic_sidebar( 'footer-col-3' ); ?>
								<?php } ?>

							</div>

							<div class="large-3 columns">

								<?php if ( is_active_sidebar( 'footer-col-4' ) ) { ?>
									<?php dynamic_sidebar( 'footer-col-4' ); ?>
								<?php } ?>

							</div>

						</div><!-- .row -->

					</div>

				<?php } ?>

					<footer class="footer" role="contentinfo">
						<div id="inner-footer" class="row">

							<?php do_action( 'd4p_footer' ); ?>

						</div> <!-- end #inner-footer -->
					</footer> <!-- end .footer -->
				</div>  <!-- end .main-content -->
			<!-- </div> end .off-canvas-wrapper-inner --> 
		<!-- </div> end .off-canvas-wrapper -->

		<?php wp_footer(); ?>
		
	</body>
</html> <!-- end page -->