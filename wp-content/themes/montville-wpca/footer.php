<?php
/**
 * Genesis Framework.
 */
// Remove default genesis footer and widgets
remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );
remove_action( 'genesis_footer', 'genesis_do_footer' );

add_action('genesis_before_footer', 'contact_us', 20);
function contact_us() { ?>
	<?php $contact_us = get_field('contact_us', 'option'); ?>
	<div class="contact-us-section">
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-12">
						<?php if ($contact_us['title']): ?>
							<h4><?php echo $contact_us['title']; ?></h4>
						<?php endif ?>
						<?php if ($contact_us['subtitle']): ?>
							<div class="subtitle"><?php echo $contact_us['subtitle']; ?></div>
						<?php endif ?>
						<?php if ($contact_us['description']): ?>
							<div class="description"><?php echo $contact_us['description']; ?></div>
						<?php endif ?>
					</div>
					<?php if ($contact_us['image']): ?>
						<div class="col-lg-6 col-md-12">
							<div class="image">
								<img src="<?php echo $contact_us['image']['sizes']['medium_large']; ?>" alt="<?php echo $contact_us['image']['alt']; ?>">
							</div>
						</div>
					<?php endif ?>
				</div>
				<div class="row">
					<div class="col">
						<?php
						$form_object = $contact_us['form'];
						gravity_form_enqueue_scripts($form_object['id'], true);
						gravity_form($form_object['id'], false, false, false, '', true, 1);
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php }

add_action('genesis_footer', 'do_custom_footer', 10);
function do_custom_footer() { ?>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="custom-footer-widget-area left text-md-left text-center">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Left') ) : ?>
						<h4><?php _e("Footer Left Widget", 'genesis'); ?></h4>
						<p><?php _e("This is an example of a widgeted area. You can add content to this area by visiting your Widgets Panel and adding new widgets to this area.", 'genesis'); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="custom-footer-widget-area right text-md-right text-center">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Right') ) : ?>
						<h4><?php _e("Footer Right Widget", 'genesis'); ?></h4>
						<p><?php _e("This is an example of a widgeted area. You can add content to this area by visiting your Widgets Panel and adding new widgets to this area.", 'genesis'); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-md-6 text-md-left text-center">
				<div class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></div>
			</div>
			<div class="col-md-6 text-md-right text-center">
				<a href="http://mirandacreative.com/" target="_blank" class="studio">Miranda Creative</a>
			</div>
		</div>
	</div>
<?php }

genesis_structural_wrap( 'site-inner', 'close' );
genesis_markup( array(
	'close'   => '</div>',
	'context' => 'site-inner',
) );

do_action( 'genesis_before_footer' );
do_action( 'genesis_footer' );
do_action( 'genesis_after_footer' );

genesis_markup( array(
	'close'   => '</div>',
	'context' => 'site-container',
) );

do_action( 'genesis_after' );
wp_footer(); // We need this for plugins.

genesis_markup( array(
	'close'   => '</body>',
	'context' => 'body',
) );

?>
</html>
