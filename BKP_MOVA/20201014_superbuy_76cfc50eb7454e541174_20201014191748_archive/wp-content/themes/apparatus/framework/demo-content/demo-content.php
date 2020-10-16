<?php
// **********************************************************************// 
// ! One Click Demo Content Import
// **********************************************************************// 
function apparatus_oneclick_import_files() {
  return array(
    array(
      'import_file_name'             => 'App Demo One',
      'categories'                   => array( 'App' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo1/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo1/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo1/customizer.dat',
      'import_preview_image_url'     => 'https://fluentthemes.com/wp/appeasy-demo-content/preview/1.jpg',
      'import_notice'                => esc_html__( 'After you import this demo, you will have to import theme-options data separately. Get the Theme-Options Data ', 'apparatus'). '<a style="font-weight:bold;" target="_blank" href="https://fluentthemes.com/wp/appeasy-demo-content/theme-options/theme-options-demo1.html">'.esc_html__('From Here', 'apparatus').'</a>' . esc_html__( '. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'apparatus'),
      'preview_url'                  => 'https://fluentthemes.com/wp/appeasy/app-demo-one',
    ),
	array(
      'import_file_name'             => 'Software Demo One',
      'categories'                   => array( 'Software' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo2/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo2/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo2/customizer.dat',
      'import_preview_image_url'     => 'https://fluentthemes.com/wp/appeasy-demo-content/preview/11.jpg',
      'import_notice'                => esc_html__( 'After you import this demo, you will have to import theme-options data separately. Get the Theme-Options Data ', 'apparatus'). '<a style="font-weight:bold;" target="_blank" href="https://fluentthemes.com/wp/appeasy-demo-content/theme-options/theme-options-demo2.html">'.esc_html__('From Here', 'apparatus').'</a>' . esc_html__( '. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'apparatus'),
      'preview_url'                  => 'https://fluentthemes.com/wp/appeasy/software-demo-one',
    ),
	array(
      'import_file_name'             => 'App Demo Two',
      'categories'                   => array( 'App' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo3/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo3/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo3/customizer.dat',
      'import_preview_image_url'     => 'https://fluentthemes.com/wp/appeasy-demo-content/preview/2.jpg',
      'import_notice'                => esc_html__( 'After you import this demo, you will have to import theme-options data separately. Get the Theme-Options Data ', 'apparatus'). '<a style="font-weight:bold;" target="_blank" href="https://fluentthemes.com/wp/appeasy-demo-content/theme-options/theme-options-demo3.html">'.esc_html__('From Here', 'apparatus').'</a>' . esc_html__( '. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'apparatus'),
      'preview_url'                  => 'https://fluentthemes.com/wp/appeasy/app-demo-two',
    ),
	array(
      'import_file_name'             => 'Software Demo Two',
      'categories'                   => array( 'Software' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo4/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo4/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo4/customizer.dat',
      'import_preview_image_url'     => 'https://fluentthemes.com/wp/appeasy-demo-content/preview/22.jpg',
      'import_notice'                => esc_html__( 'After you import this demo, you will have to import theme-options data separately. Get the Theme-Options Data ', 'apparatus'). '<a style="font-weight:bold;" target="_blank" href="https://fluentthemes.com/wp/appeasy-demo-content/theme-options/theme-options-demo4.html">'.esc_html__('From Here', 'apparatus').'</a>' . esc_html__( '. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'apparatus'),
      'preview_url'                  => 'https://fluentthemes.com/wp/appeasy/software-demo-two',
    ),
	array(
      'import_file_name'             => 'App Demo Three',
      'categories'                   => array( 'App' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo5/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo5/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo5/customizer.dat',
      'import_preview_image_url'     => 'https://fluentthemes.com/wp/appeasy-demo-content/preview/3.jpg',
      'import_notice'                => esc_html__( 'After you import this demo, you will have to import theme-options data separately. Get the Theme-Options Data ', 'apparatus'). '<a style="font-weight:bold;" target="_blank" href="https://fluentthemes.com/wp/appeasy-demo-content/theme-options/theme-options-demo5.html">'.esc_html__('From Here', 'apparatus').'</a>' . esc_html__( '. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'apparatus'),
      'preview_url'                  => 'https://fluentthemes.com/wp/appeasy/app-demo-three',
    ),
	array(
      'import_file_name'             => 'Software Demo Three',
      'categories'                   => array( 'Software' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo6/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo6/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo6/customizer.dat',
      'import_preview_image_url'     => 'https://fluentthemes.com/wp/appeasy-demo-content/preview/33.jpg',
      'import_notice'                => esc_html__( 'After you import this demo, you will have to import theme-options data separately. Get the Theme-Options Data ', 'apparatus'). '<a style="font-weight:bold;" target="_blank" href="https://fluentthemes.com/wp/appeasy-demo-content/theme-options/theme-options-demo6.html">'.esc_html__('From Here', 'apparatus').'</a>' . esc_html__( '. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'apparatus'),
      'preview_url'                  => 'https://fluentthemes.com/wp/appeasy/software-demo-three',
    ),
	array(
      'import_file_name'             => 'App Demo Four',
      'categories'                   => array( 'App' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo7/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo7/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo7/customizer.dat',
      'import_preview_image_url'     => 'https://fluentthemes.com/wp/appeasy-demo-content/preview/4.jpg',
      'import_notice'                => esc_html__( 'After you import this demo, you will have to import theme-options data separately. Get the Theme-Options Data ', 'apparatus'). '<a style="font-weight:bold;" target="_blank" href="https://fluentthemes.com/wp/appeasy-demo-content/theme-options/theme-options-demo7.html">'.esc_html__('From Here', 'apparatus').'</a>' . esc_html__( '. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'apparatus'),
      'preview_url'                  => 'https://fluentthemes.com/wp/appeasy/app-demo-four',
    ),
	array(
      'import_file_name'             => 'Software Demo Four',
      'categories'                   => array( 'Software' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo8/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo8/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo8/customizer.dat',
      'import_preview_image_url'     => 'https://fluentthemes.com/wp/appeasy-demo-content/preview/44.jpg',
      'import_notice'                => esc_html__( 'After you import this demo, you will have to import theme-options data separately. Get the Theme-Options Data ', 'apparatus'). '<a style="font-weight:bold;" target="_blank" href="https://fluentthemes.com/wp/appeasy-demo-content/theme-options/theme-options-demo8.html">'.esc_html__('From Here', 'apparatus').'</a>' . esc_html__( '. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'apparatus'),
      'preview_url'                  => 'https://fluentthemes.com/wp/appeasy/software-demo-four',
    ),
	array(
      'import_file_name'             => 'App Demo Five',
      'categories'                   => array( 'App' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo9/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo9/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo9/customizer.dat',
      'import_preview_image_url'     => 'https://fluentthemes.com/wp/appeasy-demo-content/preview/5.jpg',
      'import_notice'                => esc_html__( 'After you import this demo, you will have to import theme-options data separately. Get the Theme-Options Data ', 'apparatus'). '<a style="font-weight:bold;" target="_blank" href="https://fluentthemes.com/wp/appeasy-demo-content/theme-options/theme-options-demo9.html">'.esc_html__('From Here', 'apparatus').'</a>' . esc_html__( '. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'apparatus'),
      'preview_url'                  => 'https://fluentthemes.com/wp/appeasy/app-demo-five',
    ),
	array(
      'import_file_name'             => 'Software Demo Five',
      'categories'                   => array( 'Software' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo10/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo10/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'framework/demo-content/demo10/customizer.dat',
      'import_preview_image_url'     => 'https://fluentthemes.com/wp/appeasy-demo-content/preview/55.jpg',
      'import_notice'                => esc_html__( 'After you import this demo, you will have to import theme-options data separately. Get the Theme-Options Data ', 'apparatus'). '<a style="font-weight:bold;" target="_blank" href="https://fluentthemes.com/wp/appeasy-demo-content/theme-options/theme-options-demo10.html">'.esc_html__('From Here', 'apparatus').'</a>' . esc_html__( '. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'apparatus'),
      'preview_url'                  => 'https://fluentthemes.com/wp/appeasy/software-demo-five',
    ),
  );
}
add_filter( 'pt-ocdc/import_files', 'apparatus_oneclick_import_files' );

function apparatus_oneclick_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'apparatus_primary_menu' => $main_menu->term_id
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdc/after_import', 'apparatus_oneclick_after_import_setup' );