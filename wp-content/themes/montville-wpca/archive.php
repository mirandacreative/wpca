<?php
/**
 * Index
 *
 * Standard loop for the blog page
 */


remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'custom_do_loop' );
/**
 * Outputs a custom loop.
 *
 * @global mixed $paged current page number if paginated.
 * @return void
 */
function custom_do_loop() {
	// create an array variable with specific post types in your desired order.
	echo '<div class="search-container"><div class="row">'; ?>

	<?php if(have_posts()){ ?>
		<div class="col-lg-4 col-md-12 search-header">
			<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
		</div>
		<div class="col-lg-6 col-md-12 search-content">
		<?php
		// remove post info.
		remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
		// remove post image (from theme settings).
		remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
		// remove entry content.
		// remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
		// remove post content nav.
		remove_action( 'genesis_entry_content', 'genesis_do_post_content_nav', 12 );
		remove_action( 'genesis_entry_content', 'genesis_do_post_permalink', 14 );
		// force excerpts.
		add_filter( 'genesis_pre_get_option_content_archive', 'sk_show_excerpts' );
		// modify the Excerpt read more link.
		add_filter( 'excerpt_more', 'new_excerpt_more' );
		// modify the length of post excerpts.
		add_filter( 'excerpt_length', 'sp_excerpt_length' );
		// remove entry footer.
		remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
		remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );
		add_action('genesis_entry_footer', 'custom_post_meta', 20);
		function custom_post_meta() {
			?>
				<div class="post-meta">
					<p class="post-meta-date">
						<?php
							echo esc_html__('DATE:', 'wpca') . "&nbsp;" . get_the_time(get_option('date_format'));
						?>
					</p>
					<p class="post-meta-categories">
						<?php
							echo esc_html__('CATEGORY:') . "&nbsp;";
							the_category( ', ');
						?>
					</p>
				</div>
			<?php
		}
		remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
		// remove archive pagination.
		//remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );
		// custom genesis loop with the above query parameters and hooks.
		genesis_standard_loop();
	}
	echo '</div></div></div>'; // .search-content
}



function sk_show_excerpts() {
	return 'excerpts';
}
function new_excerpt_more( $more ) {
    return '';
}
function sp_excerpt_length( $length ) {
	return 55; // pull first 50 words.
}
//* Customize search form input box text
add_filter( 'genesis_search_text', 'sp_search_text' );
function sp_search_text( $text ) {
	return esc_attr( 'Search' );
}

add_filter( 'genesis_search_button_text', 'sp_search_button_text' );
function sp_search_button_text( $text ) {
	return esc_attr( '' );
}




genesis();


