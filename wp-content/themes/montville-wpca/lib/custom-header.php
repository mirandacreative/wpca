<?php
// Reposition the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
remove_action( 'genesis_after_header', 'genesis_do_nav' );

remove_action( 'genesis_header', 'genesis_do_header');

add_action( 'genesis_header', 'custom_header', 5 );
add_action( 'custom_logo', 'show_custom_logo', 5 );
add_action( 'main_nav', 'genesis_do_nav', 5);

function custom_header(){
	echo '<a href="#" class="main-menu-button">main menu <span class="icon"><span></span><span></span><span></span><span></span></span></a>';
	genesis_markup( array(
		'open'    => '<div %s>',
		'context' => 'container',
	) );

		genesis_markup( array(
			'open'    => '<div %s>',
			'context' => 'header-wrap',
		) );

			do_action( 'custom_logo' );

			genesis_nav_menu( array(
				'theme_location' => 'primary',
				'menu_class'     => 'menu genesis-nav-menu menu-primary row',
				'walker'         => new Custom_Navigation()
			) );

			do_action( 'custom_header_bottom' );

		genesis_markup( array(
			'close'   => '</div>',
			'context' => 'header-wrap',
		) );

	genesis_markup( array(
		'close'   => '</div>',
		'context' => 'container',
	) );
}

add_action( 'custom_header_bottom', 'header_bottom_markup_open', 5 );
function header_bottom_markup_open(){
	genesis_markup( array(
		'open'    => '<div %s>',
		'context' => 'header-bottom',
	) );
}
add_action( 'custom_header_bottom', 'header_bottom_markup_close', 20 );
function header_bottom_markup_close(){
	genesis_markup( array(
		'close'   => '</div>',
		'context' => 'header_bottom',
	) );
}
add_action( 'custom_header_bottom', 'genesis_do_subnav', 10 );
// Header address
add_action( 'custom_header_bottom', 'header_address', 15);
function header_address(){
	$address = get_field('address', 'option');
	genesis_markup( array(
		'open'    => '<div %s>',
		'context' => 'address',
	) );
	echo $address;
	genesis_markup( array(
		'close'   => '</div>',
		'context' => 'address',
	) );
}

// Header gradient overlay
add_action( 'genesis_header', 'header_overlay', 10);
function header_overlay(){
	genesis_markup( array(
		'open'    => '<div %s>',
		'context' => 'header-overlay',
	) );
	genesis_markup( array(
		'close'   => '</div>',
		'context' => 'header-overlay',
	) );
}

// Featured image
add_action( 'genesis_header', 'featured_img_overlay', 10);
function featured_img_overlay(){?>
	<svg height="0" width="0" class="svg-clip">
		<defs>
			<clipPath id="hero-clip" clipPathUnits="objectBoundingBox">
				<path fill="#FBB217" d="M0 0V.97Q.35 .74 .65 .94 Q.85 1.075, 1 .85V0z"/>
			</clipPath>
		</defs>
	</svg>
	<?php
	$background = get_field('header_background');
	if($background['type'] == 'video'){
		?>
		<div class="video-button"><span class="icon"></span><?php echo $background['video_button_text']; ?></div>
		<?php
		$video = $background[$background['video_source'].'_link'];
		genesis_markup( array(
			'open'    => '<div %s>',
			'context' => 'video-header-overlay',
		) );
			if($background['video_source'] == 'external'){
				echo $video;
				?>
				<script type="text/javascript">
					if(!players) var players = new Array();
					players[999999] = {
						id: document.querySelector('.video-header-overlay iframe').getAttribute('id'),
						settings: {
							events: {
								'onReady': onHeaderPlayerReady
							}
						}
					};
					function onHeaderPlayerReady(event){
						event.target.playVideo();
						jQuery('.site-header .video-button').addClass('playing');
						event.target.mute();
						jQuery('.site-header .video-button').on('click', function(e){
							if(jQuery(this).hasClass('playing')){
								event.target.pauseVideo();
								jQuery(this).removeClass('playing');
							}else{
								event.target.playVideo();
								jQuery(this).addClass('playing');
							}
						});
					}
				</script>
				<?php
			}else{ ?>
				<video src="<?php echo $video ?>" muted autoplay loop></video>
				<script type="text/javascript">
					jQuery('.site-header .video-button').addClass('playing').on('click', function(e){
						if(jQuery(this).hasClass('playing')){
							jQuery('video')[0].pause();
							jQuery(this).removeClass('playing');
						}else{
							jQuery('video')[0].play();
							jQuery(this).addClass('playing');
						}
					});
				</script>
			<?php }
		genesis_markup( array(
			'close'   => '</div>',
			'context' => 'video-header-overlay',
		) );
	}else{
		if($background['image_source'] == 'custom'){
			$image = $background['image'];
		}else{
			$image = get_attached_img_url(get_the_ID());
		}
		genesis_markup( array(
			'open'    => '<div %s style="background-image: url('.$image.')">',
			'context' => 'featured-header-overlay',
		) );
		?>
		<?php
		genesis_markup( array(
			'close'   => '</div>',
			'context' => 'featured-header-overlay',
		) );
	}
	// }else{
	// 	$image = get_attached_img_url(get_the_ID());
	// 	genesis_markup( array(
	// 		'open'    => '<div %s style="background-image: url('.$image.')">',
	// 		'context' => 'featured-header-overlay',
	// 	) );
	// 	genesis_markup( array(
	// 		'close'   => '</div>',
	// 		'context' => 'featured-header-overlay',
	// 	) );
	// }
	// global $colors;
	genesis_markup( array(
		'open'    => '<div %s style="background-color: #77777;">',
		'context' => 'hero-overlay',
	) );
	genesis_markup( array(
		'close'   => '</div>',
		'context' => 'hero-overlay',
	) );
}

// Reduce the secondary navigation menu to one level depth.
add_filter( 'wp_nav_menu_args', 'genesis_sample_secondary_menu_args' );
function genesis_sample_secondary_menu_args($args){
	if('secondary' != $args['theme_location']){
		return $args;
	}
	$args['depth'] = 1;
	return $args;
}
