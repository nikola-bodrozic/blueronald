<?php
require_once('wp_bootstrap_navwalker.php');

register_nav_menus( array(
    'primary' => __( 'Menu 1', 'blueronald' ),
    'secondary' => __( 'Menu 2', 'blueronald' ),    
) );


add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup(){
    load_theme_textdomain('blueronald', get_template_directory() . '/languages');
}

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
add_action( 'widgets_init', 'theme_slug_widgets_init' );
?>