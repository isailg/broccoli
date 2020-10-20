<?php

function init_template(){
  add_theme_support('post_thumbnails');
  add_theme_support('title-tag');

  register_nav_menus(
    array(
      'top_menu' => 'Main Menu'
    )
  );
}

// After init page init template
add_action('after_setup_theme','init_template');
// 880x660px screenshot

// Register dependences and libraries

function assets(){
  // Stylesheet of bosstrap
  wp_register_style('bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css','','4.5.0','all');
  wp_register_style('montserrat','https://fonts.googleapis.com/css2?family=Montserrat&display=swap','','1.0','all');
  wp_enqueue_style('styles',get_stylesheet_uri(), array('bootstrap','montserrat'),'1.0','all');

  // Javascript of boostrap
  wp_register_script('popper','https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js','','1.16.0', true);
  wp_enqueue_script('boostraps', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array('jquery','popper'),'4.4.1', true);

  // Own javascript
  wp_enqueue_script('custom', get_template_directory_uri().'/assets/js/custom.js', '', '1.0', true);

}

add_action('wp_enqueue_scripts','assets');

// Add child theme function
// function child_theme_assets() {
//
//  wp_enqueue_style( 'estilos-padre', //handle para estilos de tema padre
//                     get_template_directory_uri() . '/style.css' //get_template_directory_uri() retornara la ubicación del tema padre
//                 );
//
//  wp_enqueue_style( 'estilos-hijos',
//                     get_stylesheet_directory_uri() . '/style.css', //get_stylesheet_directory_uri() retornara la ubicación de la hoja de estilos del child-theme
//                     array('estilos-padre'), //usa como depencia la hoja de estilos del tema padre.
//                     '1.0' //Versión de la hoja de estilos
//                     );
// }
// add_action( 'wp_enqueue_scripts', 'child_theme_assets' );


function sidebar(){
    register_sidebar(
        array(
            'name' => 'Pie de pagina',
            'id' => 'footer',
            'description' => 'Zona de Widgets para pie de pagina',
            'before_title' => '<p>',
            'after_title' => '</p>',
            'before_widget' => '<div id="%1$s" class= "%2$s">',
            'after_widget'  => '</div>',
        )
        );

}

add_action('widgets_init', 'sidebar');
