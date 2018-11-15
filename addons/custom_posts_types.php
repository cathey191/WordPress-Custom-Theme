<?php

function add_staff_post_type() {

  $labels = array(
    'name' => _x('Staff', 'post type name', '18wdwu02customtheme'),
    'singular_name' => _x('Staff', 'post type name', '18wdwu02customtheme'),
    'add_new' => _x('Add Staff Member', 'adding new staff member', '18wdwu02customtheme'),
    'add_new_item' => _x('Add Staff Member', 'adding new staff member', '18wdwu02customtheme')
  );

  $args = array(
    'labels' => $labels,
    'description' => 'a post type for the staff members in the company',
    'public' => true,
    'hierarchical' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => false,
    'menu_position' => 4,
    'menu_icon' => 'dashicons-groups',
    'supports' => array( 'title', 'thumbnail' ),
    'query_var' => true
  );

  register_post_type('staff', $args);
}

add_action('init', 'add_staff_post_type');

function add_enquiries_post_type() {
  $labels = array(
    'name' => _x('Enquiries', 'post type name', '18wdwu02customtheme'),
    'singular_name' => _x('Enquiry', 'post type name', '18wdwu02customtheme')
  );

  $args = array(
    'labels' => $labels,
    'description' => 'Enquiries from website',
    'public' => false,
    'hierarchical' => true,
    'exclude_from_search' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => false,
    'menu_position' => 20,
    'menu_icon' => 'dashicons-format-chat',
    'supports' => array( 'title', 'editor' ),
    'query_var' => true
  );

  register_post_type('enquiry', $args);
}

add_action('init', 'add_enquiries_post_type');
