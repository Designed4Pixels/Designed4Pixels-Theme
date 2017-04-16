<?php
	
//* Function to add formatting before Multisite Signup Form
function d4p_before_mu_signup_form() {

	do_action( 'd4p_after_header' );
	
	?>	<div id="content">
	
			<div id="mu-signup-form" class="row"><?php
}

//* Add Custom Post Tags
add_action( 'before_signup_form', 'd4p_before_mu_signup_form' );


//* Function to add formatting after Multisite Signup Form
function d4p_after_mu_signup_form() {
	
	?> 		</div>

		</div><?php
}

//* Add Custom Post Tags
add_action( 'after_signup_form', 'd4p_after_mu_signup_form' );

/* end multisite support */