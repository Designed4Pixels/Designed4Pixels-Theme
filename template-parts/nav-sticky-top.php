<?php
// This template uses the Foundation 6 Navigation Elements to Set-up a Horizontal, Mobile Responsive, Fixed Navigation Bar.

// Adjust the breakpoint of the title-bar by adjusting this variable
$breakpoint = "medium"; 

$fixed = true; ?>

<div class="class-sticky-container" data-sticky-container <?php if ($fixed) { echo ' style="width: 100%; z-index: 100;" ';} ?>>
	<div class="sticky" data-sticky data-sticky-on="small" data-options="marginTop:0;" style="width: 100%;">
		<div class="upper-nav-bar">
			<?php do_action( 'd4p_header_info_bar' ); ?>
		</div>
		<div class="lower-nav-bar">
			<?php do_action( 'd4p_header_title_bar' ); ?>

			<?php do_action( 'd4p_header_logo_bar' ); ?>
		</div>	
	</div>
</div>