<?php
/**
 * Index
 *
 *  404 page
 */


remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'genesis_404');

function genesis_404() {

?>


<!-- BEGIN of 404 page -->
	<div class="container">
		<div class="row text-center not-found">
			<div class="col">
				<h1><?php _e('404: Page Not Found', 'foundation'); ?></h1>
				<h3><?php _e('Keep on looking...', 'foundation'); ?></h3>
				<p><?php printf(__('Double check the URL or head back to the <a class="label" href="%1s">HOMEPAGE</a>', 'foundation'), get_bloginfo('url')); ?></p>
			</div>
		</div>
	</div>
<!-- END of 404 page -->

<?php



}
genesis();