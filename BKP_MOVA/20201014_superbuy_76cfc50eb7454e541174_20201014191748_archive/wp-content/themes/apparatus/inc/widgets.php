<?php
/**
 * Register our sidebars and widgetized areas.
 *
 */
function apparatus_widgets_init() {
		register_sidebar( array(
		'name' => esc_html__( 'Blog Sidebar Widgets', 'apparatus'),
		'id' => 'apparatus_sidebar_widgets',
		'before_widget' => '<div id="%1$s" class="bg2-right-col-item-holder %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="uppercase bg2-right-col-item-title">',
		'after_title' => '</h5>',
		) );
}
add_action( 'widgets_init', 'apparatus_widgets_init' );