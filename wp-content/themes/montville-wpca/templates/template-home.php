<?php
/**
 * Template Name: Home page
 */

if(is_front_page()){
}

remove_action('genesis_entry_content', 'genesis_do_post_content');
remove_action('genesis_entry_header', 'genesis_do_post_format_image', 4);
remove_action('genesis_entry_header', 'genesis_entry_header_markup_open', 5);
remove_action('genesis_entry_header', 'genesis_entry_header_markup_close', 15);
remove_action('genesis_entry_header', 'genesis_do_post_title');
remove_action('genesis_entry_header', 'genesis_post_info', 12);
remove_action('genesis_entry_content', 'genesis_do_post_image', 8);
remove_action('genesis_entry_content', 'genesis_do_post_content');
remove_action('genesis_entry_content', 'genesis_do_post_content_nav', 12);
remove_action('genesis_entry_content', 'genesis_do_post_permalink', 14);
remove_action('genesis_entry_footer', 'genesis_entry_footer_markup_open', 5);
remove_action('genesis_entry_footer', 'genesis_entry_footer_markup_close', 15);
remove_action('genesis_entry_footer', 'genesis_post_meta');
remove_action('genesis_after_entry', 'genesis_do_author_box_single', 8);
remove_action('genesis_after_entry', 'genesis_adjacent_entry_nav');
remove_action('genesis_after_entry', 'genesis_get_comments_template');
remove_action('genesis_before_post_title', 'genesis_do_post_format_image');
remove_action('genesis_post_title', 'genesis_do_post_title');
remove_action('genesis_post_content', 'genesis_do_post_image');
remove_action('genesis_post_content', 'genesis_do_post_content');
remove_action('genesis_post_content', 'genesis_do_post_permalink');
remove_action('genesis_post_content', 'genesis_do_post_content_nav');
remove_action('genesis_before_post_content', 'genesis_post_info');
remove_action('genesis_after_post_content', 'genesis_post_meta');
remove_action('genesis_after_post', 'genesis_do_author_box_single');

// Other.
remove_action('genesis_loop_else', 'genesis_do_noposts');
remove_action('genesis_after_endwhile', 'genesis_posts_nav');
add_action('genesis_after_header', 'custom_google_map', 15);
function custom_google_map(){
	$filter_options = get_categories(['taxonomy' => 'filter_options']); ?>
	<div class="google-map-container">
		<div class="container">
			<div class="search">
				<input type="text" placeholder="" id="map_serach">
				<label for="map_serach" class="placeholder"><?php _e('Enter an <span>Address</span> to get details', 'wpca'); ?></label>
			</div>
			<div class="controls">
				<ul class="types">
					<li><?php display_svg(get_stylesheet_directory_uri().'/images/sewer.svg'); ?><?php _e('Sewer', 'wpca'); ?></li>
					<li><?php display_svg(get_stylesheet_directory_uri().'/images/water.svg'); ?><?php _e('Water', 'wpca'); ?></li>
					<li><?php display_svg(get_stylesheet_directory_uri().'/images/community_wells.svg'); ?><?php _e('Community Wells', 'wpca'); ?></li>
				</ul>
				<span class="filters-title"><?php _e('Filter Options', 'wpca'); ?></span>
				<?php if(!empty($filter_options)){ ?>
					<ul class="filters">
						<?php foreach($filter_options as $key => $option){ ?>
							<li class="filter" data-id="<?php echo $option->slug; ?>"><?php display_svg(get_field('pin_icon', $option)); ?><?php echo $option->name; ?></li>
						<?php } ?>
					</ul>
				<?php } ?>
			</div>
			<?php
			$map = get_field('map');
			if(!empty($map)){ ?>
				<div class="acf-map">
					<div class="marker" data-lat="<?php echo $map['lat']; ?>" data-lng="<?php echo $map['lng']; ?>"></div>
				</div>
			<?php } ?>
		</div>
	</div>
<?php }
genesis();
