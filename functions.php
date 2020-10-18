<?php

function init_template(){
  add_theme_support('post_thumbnails');
  add_theme_support('title-tag');
}

add_action('after_setup_theme','init_template');

// 880x660px screenshot
