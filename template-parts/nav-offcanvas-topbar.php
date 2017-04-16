<!-- By default, this menu will use off-canvas for small
	 and a topbar for medium-up -->

<div class="top-bar" id="top-bar-menu">
	<div class="row">
		<div class="top-bar-left float-left">
			<ul class="menu">
				<li class="menu-text"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></li>
			</ul>
		</div>
		<div class="top-bar-right show-for-medium">
			<?php d4p_top_nav(); ?>	
		</div>
		<div class="top-bar-right float-right show-for-small-only">
			<ul class="menu">
				<!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
				<li><a data-toggle="off-canvas"><?php _e( 'Menu', 'designed4pixels' ); ?></a></li>
			</ul>
		</div>
	</div>
</div>