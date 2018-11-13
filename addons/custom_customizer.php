<?php

  function custom_theme_customizer( $wp_customize ) {
    // Header Colouring
    $wp_customize->add_section('custom_theme_header_info', array(
      'title' => __('Header Styles', '18wdwu02customtheme'),
      'priority' => 20
    ));

    $wp_customize->add_setting('header_background_colour_setting', array(
      'default' => '#333',
      'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_background_colour_control', array(
      'label' => __('Background Colour', '18wdwu02customtheme'),
      'section' => 'custom_theme_header_info',
      'settings' => 'header_background_colour_setting'
    )));

    $wp_customize->add_setting('header_colour_setting', array(
      'default' => '#ffffff',
      'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_colour_control', array(
      'label' => __('Colour', '18wdwu02customtheme'),
      'section' => 'custom_theme_header_info',
      'settings' => 'header_colour_setting'
    )));

    // Footer
    $wp_customize->add_section('custom_theme_footer_section', array(
      'title' => __('Footer', '18wdwu02customtheme'),
      'priority' => 20
    ));

    $wp_customize->add_setting('footer_text_setting', array(
      'default' => '',
      'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer_text_control', array(
      'label' => __('Footer Text', '18wdwu02customtheme'),
      'section' => 'custom_theme_footer_section',
      'settings' => 'footer_text_setting'
    )));

    // Featured Pages
    $wp_customize->add_panel('Featured_Pages_Panel', array(
      'title' => __('Featured Pages', '18wdwu02customtheme'),
      'priority' => 30,
      'description' => 'This panel will hold the featured pages section'
    ));

    for ($i=1; $i <= 2 ; $i++) {
      $wp_customize->add_section('custom_theme_featured_page_'.$i, array(
        'title' => __('Featured Page '.$i, '18wdwu02customtheme'),
        'priority' => 21,
        'panel' => 'Featured_Pages_Panel'
      ));

      $wp_customize->add_setting('featured_page_'.$i.'_setting', array(
        'default' => '',
        'transport' => 'refresh'
      ));

      $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'featured_page_'.$i.'_control', array(
        'label' => __('Featured Page '.$i.' Text', '18wdwu02customtheme'),
        'section' => 'custom_theme_featured_page_'.$i,
        'settings' => 'featured_page_'.$i.'_setting'
      )));
    }

  }

  add_action('customize_register', 'custom_theme_customizer');

  function custom_theme_customizer_styles() {
    ?>
      <style type="text/css">
        .header-colour {
          background-color: <?= get_theme_mod('header_background_colour_setting', '#333'); ?>!important;
        }

        #header_nav li a {
          color: <?= get_theme_mod('header_colour_setting', '#ffffff'); ?>!important;
        }
      </style>
    <?php
  }

  add_action('wp_head', 'custom_theme_customizer_styles');
