<?php

  $metaBoxes = array(
    'staff' => array(
      'title' => 'Staff Info',
      'applicableto' => 'staff',
      'location' => 'normal',
      'priority' => 'high',
      'fields' => array(
        'staffRole' => array(
          'title' => 'Staff Member Role',
          'type' => 'text'
        ),
        'yearStarted' => array(
          'title' => 'Year Staff Member Started',
          'type' => 'number'
        )
      )
    )
  );

  function add_custom_fields() {
    global $metaBoxes;

    if (!empty($metaBoxes)) {
      foreach ($metaBoxes as $id => $metaBox) {
        add_meta_box($id, $metaBox['title'], 'show_metaboxes', $metaBox['applicableto'], $metaBox['location'], $metaBox['priority'], $id);
      }
    }
  }

  add_action('admin_init', 'add_custom_fields');

  function show_metaboxes($post, $args) {
    global $metaBoxes;

    $fields = $metaBoxes[$args['id']]['fields'];

    $output = '<input type="hidden" name="post_format_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'">';

    if (!empty($fields)) {
      foreach ($fields as $id => $field) {
        switch ($field['type']) {
          case 'text':
            $output .= '<label for="'.$id.'">'.$field['title'].'</label>';
            $output .= '<input type="text" name="'.$id.'" class="customField">';
            break;
          case 'number':
            $output .= '<label for="'.$id.'">'.$field['title'].'</label>';
            $output .= '<input type="number" name="'.$id.'" class="customField">';
            break;
          default:
            $output .= '<label for="'.$id.'">'.$field['title'].'</label>';
            $output .= '<input type="text" name="'.$id.'" class="customField">';
            break;
        }
      }
    }
    echo $output;
  }

  function save_metaboxes($postID) {
    global $metaBoxes;

      
  }

  add_action('save_post', 'save_metaboxes');
