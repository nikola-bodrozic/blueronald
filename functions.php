<?php
require_once('wp_bootstrap_navwalker.php');

// Register menus
register_nav_menus( array(
    'primary' => __( 'TopMenu', 'blueronald' ),
    'secondary' => __( 'BottomMenu', 'blueronald' ),    
) );

// How many posts per page
add_action( 'pre_get_posts', 'blueronald_posts_per_pare_setup' );

function blueronald_posts_per_pare_setup(){
    global $wp_query;
	$wp_query->set('posts_per_page', 5);
}

// Setup path to Spanish .mo. and .po files
add_action('after_setup_theme', 'blueronald_lang_setup');

function blueronald_lang_setup(){
    load_theme_textdomain('blueronald', get_template_directory() . '/languages');
}

// Register widgets
add_action( 'widgets_init', 'theme_slug_widgets_init' );

function theme_slug_widgets_init() {
    // In header widget area , located to the right hand side of the header, next to the site title and description. Empty by default.
    register_sidebar( array(
        'name' => 'In Header Widget Area',
        'id' => 'in-header-widget-area',
        'description' => 'A widget area located to the right hand side of the header, next to the site title and description.',
        'before_widget' => '<div class="widget-container %2$s" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
 
    // Sidebar widget area, located in the sidebar. Empty by default.
    register_sidebar( array(
        'name' => 'Sidebar Widget Area',
        'id' => 'sidebar-widget-area',
        'description' => 'The sidebar widget area',
        'before_widget' => '<div class="widget-container %2$s" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}

// Pagination on Search.php
function blueronald_paging_navigation() {
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
		<div class="navigation">
			<?php if ( get_next_posts_link() ) : ?>
			<div class="alignleft" style="display: inline;"> <?php next_posts_link('<button type="button" class="btn btn-default">'.__('&laquo; Older Posts &amp; Pages  ','blueronald').'</button>'); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="alignright" style="display: inline;"><?php previous_posts_link('<button type="button" class="btn btn-default">'.__(' Newer Posts &amp; Pages &raquo;','blueronald').'</button>'); ?> </div>
			<?php endif; ?>
		</div><!-- .nav-links -->
	<?php
}
?>