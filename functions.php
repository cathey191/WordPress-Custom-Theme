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

  require get_parent_theme_file_path('./addons/custom_posts_types.php');

  function addCustomLogo() {
    add_theme_support('custom-logo', array(
      'height' => 150,
      'width'=> 300
    ));
  }

  add_action('init', 'addCustomLogo');

  function addSideBar() {
    register_sidebar( array(
      'name' => 'Front Page Sidebar',
      'id' => 'front_page_sidebar',
      'description'   => 'This sidebar will be displayed on the front page', 'textdomain',
      'before_widget' => '<div id="%1$s" class="widget %2$s customWidget">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widgettitle">',
      'after_title'   => '</h3>'
    ));
  }

  add_action( 'widgets_init', 'addSideBar' );

  register_default_headers(array(
    'banner' => array(
      'url' => get_template_directory_uri() . '/assets/images/defaultninja.jpg',
      'thumbnail_url' => get_template_directory_uri() . '/assets/images/defaultninja.jpg',
      'description' => 'Two ninjas playing'
    )
  ));

  function addCustomHeader() {
    $defaults = array(
    	'default-image'          => get_template_directory_uri() . '/assets/images/defaultninja.jpg',
    	'width'                  => 1280,
    	'height'                 => 720,
    	'flex-height'            => false,
    	'flex-width'             => false,
    	'uploads'                => true,
    	'random-default'         => false,
    	'header-text'            => false
    );

    add_theme_support( 'custom-header', $defaults );
  }

  add_action('init', 'addCustomHeader');
