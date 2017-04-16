<?php
// Adjust the breakpoint of the title-bar by adjusting this variable
$breakpoint = "medium"; ?>

<div class="title-bar align-right" data-responsive-toggle="top-bar-menu" data-hide-for="<?php echo $breakpoint ?>">
  <button class="menu-icon" type="button" data-toggle></button>
  <div class="title-bar-title"><?php _e( 'Menu', 'designed4pixels' ); ?></div>
</div>

<div class="top-bar" id="top-bar-menu">
<div class="row">
	<div class="top-bar-left show-for-<?php echo $breakpoint ?>">
		<ul class="menu">
			<li class="menu-text"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></li>
		</ul>
	</div>
	<div class="top-bar-right">
		<?php d4p_top_nav(); ?>
	</div>
</div>

</div>