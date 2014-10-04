<?php
require_once('include/wp_bootstrap_navwalker.php');

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
			'title'     => 'Display Options',
			'priority'  => 200
		)
	);
	
    // first control start
	$wp_customize->add_setting(
		'blueronald_display_bottom_menu',
		array(
			'default'    =>  'true',
			'transport'  =>  'postMessage'
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
	// first control end    
			
			
	// second control start	
	$wp_customize->add_setting(
		'blueronald_display_sidebar',
		array(
			'default'    =>  'true',
			'transport'  =>  'postMessage'
		)
	);

	$wp_customize->add_control(
		'blueronald_display_sidebar',
		array(
			'section'   => 'blueronald_display_options',
			'label'     => 'Display Side Bar?',
			'type'      => 'checkbox'
		)
	);
	// second control end
}

add_action( 'wp_head', 'blueronald_customizer_bottom_menu' );
function blueronald_customizer_bottom_menu() {
    ?>
	 <style type="text/css">
	     <?php if( false === get_theme_mod( 'blueronald_display_bottom_menu' ) ) { ?>
	     	.navbar-inverse { display: none; }
	     <?php } // end if ?>
	     
    
	     <?php if( false === get_theme_mod( 'blueronald_display_sidebar' ) ) { ?>
	     	#right-sidebar { display: none; }
	     <?php } // end if ?>
	     
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


// Setup path to Spanish .mo. and .po files
add_action('after_setup_theme', 'blueronald_lang_setup');

function blueronald_lang_setup(){
    load_theme_textdomain('blueronald', get_template_directory() . '/languages');
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