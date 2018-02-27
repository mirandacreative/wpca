<?php
/**
 * Montville Water Polution Control Authority.
 *
 * This file adds functions to the Genesis Sample Theme.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0+
* @link    http://www.studiopress.com/
 */

// const COLORS = array(
// 	'white'			=> '#fff',
// 	'black'			=> '#000',
// 	'navy'			=> '#212664',
// 	'blue'			=> '#1993CA',
// 	'dark_blue'		=> '#1634BB',
// 	'deep_blue'		=> '#182A7D',
// 	'mint'			=> '#3DD8AF',
// 	'green'			=> '#579E0C',
// 	'yellow'		=> '#FFBC20',
// 	'orange'		=> '#FE9E19',
// 	'purple'		=> '#351071',
// 	'light_purple'	=> '#6510F4',
// 	'gray'			=> '#9E9E9E'
// );

// Start the engine.
include_once( get_template_directory() . '/lib/init.php' );

// Setup Theme.
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

// Set Localization (do not remove).
add_action( 'after_setup_theme', 'genesis_sample_localization_setup' );
function genesis_sample_localization_setup(){
	load_child_theme_textdomain( 'genesis-sample', get_stylesheet_directory() . '/languages' );
}

// Add the helper functions.
include_once( get_stylesheet_directory() . '/lib/helper-functions.php' );

// Add Image upload and Color select to WordPress Theme Customizer.
require_once( get_stylesheet_directory() . '/lib/customize.php' );

// Include Customizer CSS.
include_once( get_stylesheet_directory() . '/lib/output.php' );

// Add WooCommerce support.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php' );

// Add the required WooCommerce styles and Customizer CSS.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php' );

// Add the Genesis Connect WooCommerce notice.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php' );

// SVG Support.
include_once( get_stylesheet_directory() . '/lib/svg-support.php' );

// Walker modification
include_once( get_stylesheet_directory() . '/lib/class-custom-navigation.php' );

// Custom header modifications
include_once( get_stylesheet_directory() . '/lib/custom-header.php' );

// Custom header modifications
include_once( get_stylesheet_directory() . '/lib/class-widget.php' );

// Child theme (do not remove).
define( 'CHILD_THEME_NAME', 'Genesis Sample' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.3.0' );

function get_attached_img_url( $id, $size = "full" ) {
    $img = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), $size );

    return $img[0];
}

// Enqueue Scripts and Styles.
add_action( 'wp_enqueue_scripts', 'genesis_sample_enqueue_scripts_styles' );
function genesis_sample_enqueue_scripts_styles() {

	$folder = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? 'source' : 'min';
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Bungee|Passion+One|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'genesis-sample-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'custom', get_stylesheet_directory_uri() . "/css/{$folder}/custom.css", array(), CHILD_THEME_VERSION );

	wp_enqueue_script( 'genesis-sample-responsive-menu', get_stylesheet_directory_uri() . "/js/{$folder}/responsive-menus.js", array( 'jquery' ), CHILD_THEME_VERSION, true );
	wp_enqueue_script( 'global', get_stylesheet_directory_uri() . "/js/{$folder}/global.js", array( 'jquery' ), CHILD_THEME_VERSION, true );
	// js libraries
	wp_enqueue_script( 'yt-player-api', 'https://www.youtube.com/player_api', array(), false, true );

	wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . "/node_modules/bootstrap/dist/js/bootstrap.min.js", array( 'jquery' ), CHILD_THEME_VERSION, true );
	wp_enqueue_script( 'matchHeight', get_stylesheet_directory_uri() . "/js/lib/jquery.matchHeight.min.js", array( 'jquery' ), CHILD_THEME_VERSION, true );
	wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . "/js/lib/slick.min.js", array( 'jquery' ), CHILD_THEME_VERSION, true );
	wp_enqueue_script( 'google.maps.api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAs19C89zcw7bQ12hJEKgtPGK9Q8iuLkQ4&libraries=places&v=3.exp', null, null, true );

	wp_localize_script(
		'genesis-sample-responsive-menu',
		'genesis_responsive_menu',
		genesis_sample_responsive_menu_settings()
	);

}

// Define our responsive menu settings.
function genesis_sample_responsive_menu_settings() {

	$settings = array(
		'mainMenu'          => __( 'Menu', 'genesis-sample' ),
		'menuIconClass'     => 'dashicons-before dashicons-menu',
		'subMenu'           => __( 'Submenu', 'genesis-sample' ),
		'subMenuIconsClass' => 'dashicons-before dashicons-arrow-down-alt2',
		'menuClasses'       => array(
			'combine' => array(
				'.nav-primary',
				'.nav-header',
			),
			'others'  => array(),
		),
	);

	return $settings;

}

// Add HTML5 markup structure.
add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

// Add Accessibility support.
add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ) );

// Add viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Add support for custom header.
add_theme_support( 'custom-header', array(
	'width'           => 600,
	'height'          => 160,
	'header-selector' => '.site-title a',
	'header-text'     => false,
	'flex-height'     => true,
) );

// Add support for custom background.
add_theme_support( 'custom-background' );

// Add support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );

// Add support for 3-column footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );

// Add Image Sizes.
add_image_size( 'featured-image', 720, 400, TRUE );

// Rename primary and secondary navigation menus.
add_theme_support( 'genesis-menus', array(
	'primary' => __( 'Main menu', 'genesis-sample' ),
	'secondary' => __( 'After Header Menu', 'genesis-sample' ),
	'footer' => __( 'Footer Menu', 'genesis-sample' )
) );

// Modify size of the Gravatar in the author box.
add_filter( 'genesis_author_box_gravatar_size', 'genesis_sample_author_box_gravatar' );
function genesis_sample_author_box_gravatar( $size ) {
	return 90;
}

// Modify size of the Gravatar in the entry comments.
add_filter( 'genesis_comment_list_args', 'genesis_sample_comments_gravatar' );
function genesis_sample_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;

	return $args;

}
// Custom Logo
add_theme_support( 'custom-logo', array(
	'height'      => '150',
	'flex-height' => true,
	'flex-width'  => true,
) );

function show_custom_logo() {
	$wrap = '<div class="logo-wrap">%s</div>';
	if ( $custom_logo_id = get_theme_mod( 'custom_logo' ) ) {
		$attachment_array = wp_get_attachment_image_src( $custom_logo_id, 'medium' );
		$logo_url         = $attachment_array[0];
	} else {
		$logo_url = get_stylesheet_directory_uri() . '/images/custom-logo.png';
	}
	if(is_front_page()){
		$description = '<h1 class="description">'.preg_replace("/\s/", "<br/>", get_bloginfo('description'), 1).'</h1>';
	}else{
		$description = '<span class="description">'.preg_replace("/\s/", "<br/>", get_bloginfo('description'), 1).'</span>';
	}
	$logo_image = return_svg($logo_url, 'custom-logo');
	$html       = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home" title="%2$s" itemscope>%3$s'.$description.'</a>', esc_url( home_url( '/' ) ), get_bloginfo( 'name' ), $logo_image );
	$html = sprintf($wrap, $html);
	echo apply_filters( 'get_custom_logo', $html );
}


// Customize Login Screen
function wordpress_login_styling() {
	if ( $custom_logo_id = get_theme_mod( 'custom_logo' ) ) {
		$custom_logo_img = wp_get_attachment_image_src( $custom_logo_id, 'medium' );
		$custom_logo_src = $custom_logo_img[0];
	} else {
		$custom_logo_src = 'wp-admin/images/wordpress-logo.svg?ver=20131107';
	}
	?>

	<style type="text/css">
		.login #login h1 a {
			background-image: url('<?php echo $custom_logo_src; ?>');
			background-size: contain;
			background-position: 50% 50%;
			width: auto;
			height: 250px;
		}

		body.login {
			background-color: #1993CA;
			<?php if ($bg_image = get_background_image()) {?>
			background-image: url('<?php echo $bg_image; ?>') !important;
			<?php } ?>
			background-repeat: repeat;
			background-position: center center;
		}
		body.login #nav a{
			color: #fff;
		}
		body.login #backtoblog a {
			color: #fff;
		}
	</style>
<?php }

add_action( 'login_enqueue_scripts', 'wordpress_login_styling' );


// Custom footer
genesis_register_sidebar(array(
    'name'=>'Footer Left',
    'description' => 'This is the first column of the footer section.',
    'before_title'=>'<h4 class="widgettitle">','after_title'=>'</h4>'
));
genesis_register_sidebar(array(
    'name'=>'Footer Right',
    'description' => 'This is the last column of the footer section.',
    'before_title'=>'<h4 class="widgettitle">','after_title'=>'</h4>'
));

// ACF Pro Options Page

if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( array(
		'page_title' => 'Theme General Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'   => false
	) );
}

// Youtube oEmbed
function remove_youtube_suggestion($value, $post_id, $field){
	if(strpos($value,'youtube') != -1){
		if ($field['key'] == 'field_5a86922fb4aad'){
			$value = preg_replace('/src="(.+?embed\/)(.*)\?/', 'src="$1$2?enablejsapi=1&playlist=$2&loop=1&showinfo=0&controls=0" ', $value);
		}else{
			$value = preg_replace('/src="(.+?embed\/)(.*)\?/', 'src="$1$2?enablejsapi=1" ', $value);
		}
		$value = str_replace('<iframe', '<iframe id="youtube-video-'.$field['name'].'" ', $value);
	}
	return $value;
}

add_filter( "acf/format_value/type=oembed", 'remove_youtube_suggestion', 999, 3 );


add_action('genesis_before_footer', 'custom_content', 10);
function custom_content(){
	$modules = get_field('module');
	if(!empty($modules)){
		genesis_markup( array(
			'open'    => '<div %s>',
			'context' => 'modules',
		) );
		foreach($modules as $key => $module){
			$module['module_key'] = $key;
			// var_dump($module);
			show_template('module-'.$module['acf_fc_layout'], $module, 'template-parts');
		}
		genesis_markup( array(
			'close'   => '</div>',
			'context' => 'modules',
		) );
	}
}
// add_action('wp_head', 'header_colors', 10);
// function header_colors(){
// 	$header_colors = get_field('header_colors', 'option');
// 	echo '<style>';
// 	foreach ($header_colors as $key => $color){
// 		echo str_replace('eader_', '', $key).' { color: '.COLORS[$color].'; }';
// 	}
// 	echo '</style>';

// }
add_action('genesis_after_footer', 'alert_popup');
function alert_popup(){
	?>
<!-- 	<div class="container">
		<div class="row">
			<div class="col text-center">
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#alertModal">Open alert modal</button>
			</div>
		</div>
	</div> -->
	<?php
	if($content = get_field('alert_popup', 'option')){?>
		<div class="modal alert-modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="alertModalLabel">
							<span class="icon"><?php display_svg(get_stylesheet_directory_uri().'/images/alert.svg'); ?></span>
							<?php echo $content['title'] ?>
						</h5>
						<a href="#" class="close" data-dismiss="modal" aria-label="Close"></a>
					</div>
					<div class="modal-body">
						<?php echo $content['content'] ?>
					</div>
					<div class="modal-footer">
						<?php if ($link = $content['more_info_link']): ?>
							<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	<?php }
}

// pass variables into js
function localize_js() {
	$args = array(
		'admin_ajax'   => admin_url( 'admin-ajax.php' ),
	);
	if(is_front_page()){
		$pins = new WP_Query(array(
			'post_type' => array('sewer', 'water', 'community_wells')
		));
		if($pins->have_posts()){
			$args['markers'] = array();
			while($pins->have_posts()){ $pins->the_post();
				// wp_get_post_categories
				$pin_categories = get_the_terms(get_the_ID(), 'filter_options');
				foreach($pin_categories as &$value){
					$value = $value->slug;
				}
				$location = get_field('location');
				$args['markers'][] = array(
					'name'		=> get_the_title(),
					'lat'		=> $location['lat'],
					'lng'		=> $location['lng'],
					'group'		=> get_post_type(get_the_ID()),
					'iconFile'	=> get_stylesheet_directory_uri().'/images/'.get_post_type(get_the_ID()).'_pin.png',
					'categories'=> $pin_categories,
					'label'		=> get_the_title(),
				);
			}
		}
		wp_reset_postdata();
	}
	wp_localize_script( 'global', 'php_vars', $args );
}
add_action( 'wp_enqueue_scripts', 'localize_js' );



//* Remove content/sidebar/sidebar layout
genesis_unregister_layout( 'content-sidebar-sidebar' );

//* Remove sidebar/sidebar/content layout
genesis_unregister_layout( 'sidebar-sidebar-content' );

//* Remove sidebar/content/sidebar layout
genesis_unregister_layout( 'sidebar-content-sidebar' );
