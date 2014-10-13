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
	) ) );
	// logo control end	
	
    // 2. control start
	$wp_customize->add_setting(
		'blueronald_display_bottom_menu',
		array(
		'default'        => true,
		'transport'  =>  'postMessage',
		)
	);

	$wp_customize->add_control(
		'blueronald_display_bottom_menu',
		array(
			'section'   => 'blueronald_display_options',
			'label'     => 'Display Bottom Menu?',
			'type'      => 'checkbox'
		)
	);
	// 2. control end    
}

add_action( 'wp_head', 'blueronald_customizer_bottom_menu' );
function blueronald_customizer_bottom_menu() {
    ?>
	 <style type="text/css">
	 	     <?php 
	   echo '/* ';	
        var_dump(get_theme_mod( 'blueronald_display_bottom_menu', TRUE ));  	        
        echo ' */';
       if( TRUE === get_theme_mod( 'blueronald_display_bottom_menu', TRUE )) 
          echo ".navbar-inverse { display: block; }";
        else
           echo ".navbar-inverse { display: none; }";         
        ?>  
	 </style>
    <?php
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
Register Custom Post Type Taxonomies
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
add_action('admin_notices', 'example_admin_notice');

function example_admin_notice() {
  global $current_user ;
        $user_id = $current_user->ID;
        /* Check that the user hasn't already clicked to ignore the message */
  if ( ! get_user_meta($user_id, 'blueronald_thanks_notice_closed') ) {
        echo '<div class="updated"><p>'; 
        printf(__('Thank You for installing the theme | <a href="%1$s">Hide Notice</a>'), '?blueronald_txh_message=0');
        echo "</p></div>";
  }
}

add_action('admin_init', 'blueronald_txh_message');

function blueronald_txh_message() {
  global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset($_GET['blueronald_txh_message']) && '0' == $_GET['blueronald_txh_message'] ) {
             add_user_meta($user_id, 'blueronald_thanks_notice_closed', 'true', true);
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