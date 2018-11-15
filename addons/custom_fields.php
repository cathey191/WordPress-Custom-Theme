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
    ),
    'enquiry' => array(
      'title' => 'Enquiry Info',
      'applicableto' => 'enquiry',
      'location' => 'normal',
      'priority' => 'high',
      'fields' => array(
        'enquiryemail' => array(
          'title' => 'Email Address',
          'type' => 'email',
          'description' => 'The persons email address',
        ),
        'enquirycourse' => array(
          'title' => 'Course',
          'type' => 'select',
          'description' => 'Course interested in',
          'options' => array('Course1', 'Course2', 'Course3')
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
    $customValues = get_post_custom($post->ID);

    $output = '<input type="hidden" name="post_format_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'">';

    if (!empty($fields)) {
      foreach ($fields as $id => $field) {
        switch ($field['type']) {
          case 'text':
            $output .= '<label for="'.$id.'">'.$field['title'].'</label>';
            $output .= '<input type="text" name="'.$id.'" class="customField" value="'.$customValues[$id][0].'">';
            break;
          case 'number':
            $output .= '<label for="'.$id.'">'.$field['title'].'</label>';
            $output .= '<input type="number" name="'.$id.'" class="customField" value="'.$customValues[$id][0].'">';
            break;
          case 'email':
            $output .= '<label for="'.$id.'">'.$field['title'].'</label>';
            $output .= '<input type="email" name="'.$id.'" class="customField" value="'.$customValues[$id][0].'">';
            break;
          case 'select':
            $output .= '<label for="'.$id.'">'.$field['title'].'</label>';
            $output .= '<select name="'.$id.'" class="customField" ><option>Choose an Option</option>';
            $options = $field['options'];
            foreach ($options as $option) {
              $output .= '<option value="'.$option.'">'.$option.'</option>';
            }
            $output .= '</select>';
            break;
          default:
            $output .= '<label for="'.$id.'">'.$field['title'].'</label>';
            $output .= '<input type="text" name="'.$id.'" class="customField" value="'.$customValues[$id][0].'">';
            break;
        }
      }
    }
    echo $output;
  }

  function save_metaboxes($postID) {
    global $metaBoxes;

    if (!wp_verify_nonce( $_POST['post_format_meta_box_nonce'], basename(__FILE__) )) {
      return $postID;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
      return $postID;
    }

    if ($_POST['post_type'] == 'page') {
      if (! current_user_can('edit_page', $postID)) {
        return $postID;
      }
    } elseif (! current_user_can('edit_page', $postID)) {
      return $postID;
    }

    $post_type = get_post_type();

    foreach ($metaBoxes as $id => $metaBox) {
      if ($metaBox['applicableto'] == $post_type) {
        $fields = $metaBoxes[$id]['fields'];

        foreach ($fields as $id => $field) {
          $oldValue = get_post_meta($postID, $id, true);
          $newValue = $_POST[$id];

          if ($newValue && $newValue != $oldValue) {
            // This saves and updates
            update_post_meta($postID, $id, $newValue);
          } elseif ($newValue == '' && $oldValue || !isset($_POST[$id])) {
            delete_post_meta($postID, $id, $oldValue);
          }
        }
      }
    }
  }

  add_action('save_post', 'save_metaboxes');
