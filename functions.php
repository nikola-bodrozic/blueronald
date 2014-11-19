<?php
// walker for bootstrap menu items
require_once('include/wp_bootstrap_navwalker.php');

// add support for featured mages
add_theme_support( 'post-thumbnails' ); 

if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)
}

// Register menus
register_nav_menus( array(
    'top-menu' => __( 'Top Menu', 'blueronald' ),
    'bottom-menu' => __( 'Bottom Menu', 'blueronald' ),    
) );

// Register widgets
add_action( 'widgets_init', 'blueronald_slug_widgets_init' );

function blueronald_slug_widgets_init() {
    // Sidebar widget area, located in the sidebar. Empty by default.
    register_sidebar( array(
        'name' => 'Right Sidebar',
        'id' => 'sidebar-widget-area',
        'description' => 'The sidebar on the right',
        'before_widget' => '<div class="widget-container %2$s" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
		
    // In header widget area , located to the right hand side of the header, next to the site title and description. Empty by default.
    register_sidebar( array(
        'name' => 'Footer Widgets Area',
        'id' => 'in-footer-widget-area',
        'description' => 'A widget area located on right side of the footer.',
        'before_widget' => '<div class="widget-container %2$s" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}

// How many posts per page
add_action( 'pre_get_posts', 'blueronald_posts_per_pare_setup' );

function blueronald_posts_per_pare_setup(){
    global $wp_query;
	$wp_query->set('posts_per_page', 5);
}


////////////////// Add theme option page START
add_action('admin_menu', 'blueronald_create_menu');
function blueronald_create_menu() {
	//create new top-level menu
	//$icon = get_template_directory_uri() . '/images/icon.png';
	add_menu_page(__('Theme Settings', 'blueronald'), __('Blue Ronald Theme', 'blueronald'), 'administrator', 'blueronald-theme-settings', 'blueronald_settings_page');
}

function blueronald_settings_page (){
?>
<div class="wrap">
        <h2>Global Custom Options</h2>
        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options') ?>
            <p><strong>Twitter ID:</strong><br />
                <input type="text" name="twitterid" size="45" value="<?php echo get_option('twitterid'); ?>" />
            </p>
			<p><strong>Facebook Page Links:</strong><br />
			    <input type="text" name="fb_link" size="45" value="<?php echo get_option('fb_link'); ?>" />
			</p>            
            <p><input type="submit" name="Submit" value="Store Options" /></p>
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="twitterid,fb_link" />
        </form>
    </div>
<?php
}
////////////////////// Add theme option page END

///////////////////// customize theme API start
add_action( 'customize_register', 'blueronald_customize_register' );
function blueronald_customize_register( $wp_customize ) {
	
	/*-----------------------------------------------------------*
	 * Defining our own section
	 *-----------------------------------------------------------*/

	$wp_customize->add_section(
		'blueronald_display_options',
		array(
			'title'     => 'Theme Options',
			'priority'  => 200
		)
	);

	// logo control start	
	$wp_customize->add_setting('blueronald_logo');

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'blueronald_logo', array(
	    'label'    => __( 'Logo', 'blueronald' ),
	    'section'  => 'blueronald_display_options',
	    'settings' => 'blueronald_logo',
	    'sanitize_callback' => 'esc_url_raw'
	) ) );
	// logo control end	
				
	// 2. control text start	
	$wp_customize->add_setting(
		'blueronald_display_cpm',
		array(
			'default'    =>  'Copyright &copy; by ',
			'transport'  =>  'postMessage',	
			'sanitize_callback' => 'blueronald_sanitize_text',		
		)
	);

	$wp_customize->add_control(
		'blueronald_display_cpm',
		array(
			'section'   => 'blueronald_display_options',
			'label'     => 'Set Copyright message',
			'type'      => 'text'
		)
	);
	// 2. control text end
}

function blueronald_sanitize_text($input){
	return wp_kses_post( force_balance_tags( $input ) );
}

// Live preview
add_action( 'customize_preview_init', 'blueronald_customizer_live_preview' );
function blueronald_customizer_live_preview() {

	wp_enqueue_script(
		'blueronald-theme-customizer',
		get_template_directory_uri() . '/js/theme-customizer.js',
		array( 'jquery', 'customize-preview' ),
		rand(), // 0.4.0
		true
	);

}
//////////////// end theme customize API

/////////////// start custom post type and it`s taxonomy
add_action( 'init', 'create_portfolio_post_type' ); 
function create_portfolio_post_type() {
    $args = array(
                  'description' => 'Portfolio',
                  'show_ui' => true,
                  'menu_position' => 4,
                  'exclude_from_search' => true,
                  'labels' => array(
                                    'name'=> 'Portfolios',
                                    'singular_name' => 'Portfolios',
                                    'add_new' => 'Add New Portfolio',
                                    'add_new_item' => 'Add New Portfolio',
                                    'edit' => 'Edit Portfolios',
                                    'edit_item' => 'Edit Portfolio',
                                    'new-item' => 'New Portfolio',
                                    'view' => 'View Portfolios',
                                    'view_item' => 'View Portfolio',
                                    'search_items' => 'Search Portfolios',
                                    'not_found' => 'No Portfolios Found',
                                    'not_found_in_trash' => 'No Portfolios Found in Trash',
                                    'parent' => 'Parent Portfolio'
                                   ),
                 'public' => true,
                 'menu_icon' => 'dashicons-portfolio',
                 'capability_type' => 'post',
                 'hierarchical' => false,
                 'rewrite' => true,
                 'supports' => array('title', 'editor', 'thumbnail', 'custom-fields')
                 );
    register_post_type( 'portfolio' , $args );
}

/*====================================================
Register Custom Post Taxonomies
======================================================*/
 
add_action('init', 'register_portfolio_taxonomy');
 
function register_portfolio_taxonomy() {
  register_taxonomy('portfolio_category',
                    'portfolio',
                     array (
                           'labels' => array (
                                              'name' => 'Portfolio Categories',
                                              'singular_name' => 'Portfolio Categories',
                                              'search_items' => 'Search Portfolio Categories',
                                              'popular_items' => 'Popular Portfolio Categories',
                                              'all_items' => 'All Portfolio Categories',
                                              'parent_item' => 'Parent Portfolio Category',
                                              'parent_item_colon' => 'Parent Portfolio Category:',
                                              'edit_item' => 'Edit Portfolio Category',
                                              'update_item' => 'Update Portfolio Category',
                                              'add_new_item' => 'Add New Portfolio Category',
                                              'new_item_name' => 'New Portfolio Category',
                                            ),
                            'hierarchical' =>true,
                            'rewrite' => array( 'slug' => 'portfolio','with_front' => FALSE),
                            'show_ui' => true,
                            'show_tagcloud' => true,
                            'rewrite' => false,
                            'public'=>true
                            )
                     );
}
////////////// end custom post type and it`s taxonomy

// Setup path to Spanish .mo. and .po files
add_action('after_setup_theme', 'blueronald_lang_setup');

function blueronald_lang_setup(){
    load_theme_textdomain('blueronald', get_template_directory() . '/languages');
}

// admin messages
/* Display a notice that can be dismissed */

add_action('admin_notices', 'blueronald_admin_notice');

function blueronald_admin_notice() {
	global $current_user ;
        $user_id = $current_user->ID;
        /* Check that the user hasn't already clicked to ignore the message */
	if ( ! get_user_meta($user_id, 'example_ignore_notice') ) {
        echo '<div class="updated"><p>'; 
        printf(__('Thank You for installing this theme | <a href="%1$s">Hide Notice</a>'), '?example_nag_ignore=0');
        echo "</p></div>";
	}
}

add_action('admin_init', 'blueronald_nag_ignore');

function blueronald_nag_ignore() {
	global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset($_GET['example_nag_ignore']) && '0' == $_GET['example_nag_ignore'] ) {
             add_user_meta($user_id, 'example_ignore_notice', 'true', true);
	}
}


// Pagination on Search.php
function blueronald_paging_navigation() {
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
		<div class="navigation">
			<?php if ( get_next_posts_link() ) : ?>
			<div class="alignleft" style="display: inline;"> <?php next_posts_link('<button type="button" class="btn btn-default">' . __('&laquo; Older Posts &amp; Pages  ', 'blueronald') . '</button>'); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="alignright" style="display: inline;"><?php previous_posts_link('<button type="button" class="btn btn-default">' . __(' Newer Posts &amp; Pages &raquo;', 'blueronald') . '</button>'); ?> </div>
			<?php endif; ?>
		</div><!-- .nav-links -->
	<?php
	}
?>