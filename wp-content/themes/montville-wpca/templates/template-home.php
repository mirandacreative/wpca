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

genesis();
