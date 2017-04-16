<?php
// Adjust the breakpoint of the title-bar by adjusting this variable
$breakpoint = "medium"; ?>

<div class="title-bar" data-responsive-toggle="top-bar-left" data-hide-for="<?php echo $breakpoint ?>">
  <button class="menu-icon" type="button" data-toggle></button>
  <div class="title-bar-title"><?php _e( 'Menu', 'designed4pixels' ); ?></div>
</div>

<div class="header-bar" show-for-<?php echo $breakpoint ?>>
	<div class="info-bar" id="info-bar-menu"  show-for-<?php echo $breakpoint ?>>
	<div class="row">
		<div class="info-bar-left show-for-<?php echo $breakpoint ?>"></div>
		<div class="info-bar-right">

			<?php 

				do_action( 'd4p_top_info_bar' );

				/*	
				<div class="nav-icon-menu">
      				<ul class="alignright">
        				<li>
             				<a class="more-link"  href="http://designedforpixels.com/my-account/"  target="_blank">
								<i class="fa fa-user"></i> My Account
              				</a>
        				</li>
      				</ul>
				</div> 
				*/
			?>

		</div>
	</div>
	</div>

	<div class="logo-bar" id="logo-bar">
	<div class="row">
		<div id="logo" class="logo-bar-left show-for-<?php echo $breakpoint ?>">
				<a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></li>
		</div>
		<div class="logo-bar-right hide-not-fixed">
			<?php d4p_top_nav(); ?>
		</div>
	</div>
	</div>

	<div class="top-bar" id="top-bar-menu">
		<div class="row">
			<div class="top-bar-left">
				<?php d4p_top_nav(); ?>
			</div>
			<div class="top-bar-right">
		
			</div>
		</div>

	</div>
</div>