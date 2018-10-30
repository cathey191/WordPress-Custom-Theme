<?php

  function addCustomThemeStyles () {
    // style
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.1.3', 'all');
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/theme-style.css', array(), '0.0.1', 'all');

    // scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '4.1.3', true);
  }

  add_action('wp_enqueue_scripts', 'addCustomThemeStyles');

  // function register_my_menu() {
  //   register_nav_menu('header_menu',_('Header Menu'));
  // }
  //
  // add_action('init', 'register_my_menu');

  function addCustomMenus() {
    add_theme_support('menus');
    register_nav_menu('header_nav', 'This is the navigation at the top of the page');
    register_nav_menu('footer_nav', 'This is the navigation at the bottom of the page');
  }

  add_action('init', 'addCustomMenus');

  add_theme_support( 'post-thumbnails' );

  add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );
