<?php

function init_template(){
  add_theme_support('post_thumbnails');
  add_theme_support('title-tag');
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
