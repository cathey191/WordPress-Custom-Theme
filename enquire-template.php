<?php
  /* Template Name: Enquires */

  if ($_POST) {
    $errors = array();

    if (!wp_verify_nonce($_POST['_wpnonce'], 'wp_enquiery_form')) {
      echo "Cannot save the data, sorry";
      return;
    }

    // validation

    if (empty($errors)) {
      $args = array(
        'post_title' => $_POST['enquiryName'],
        'post_content' => $_POST['enquiryMessage'],
        'post_type' => 'enquiry',
        'meta_input' => array(
          'enquiryemail' => $_POST['enquiryEmail'],
          'enquirycourse' => $_POST['enquiryCourse']
        )
      );

      wp_insert_post($args);
      echo "Your enquiry has been set";
    }
  }

?>

<?php get_header(); ?>

<?php if(have_posts()): ?>
  <?php while(have_posts()): the_post();?>
    <div class="container">
      <div class="row">
        <div class="col">
          <h1><?= the_title(); ?></h1>
          <?php the_content(); ?>
        </div>
      </div>
      <form action="<?= get_permalink(); ?>" method="post">
        <?php wp_nonce_field('wp_enquiery_form'); ?>
        <div class="form-group row">
          <label for="enquiryName" class="col-2 col-form-label">Name</label>
          <div class="col-10">
            <input class="form-control" type="text" name="enquiryName" placeholder="Name">
          </div>
        </div>

        <div class="form-group">
          <label for="enquiryMessage" >Message</label>
          <?php wp_editor($content, 'enquiryMessage', array('textarea_rows' => 10)); ?>
        </div>

        <div class="form-group row">
          <label for="enquiryEmail" class="col-2 col-form-label">Email</label>
          <div class="col-10">
            <input class="form-control" type="email" name="enquiryEmail" placeholder="Email">
          </div>
        </div>

        <div class="form-group row">
          <label for="enquiryCourse" class="col-2 col-form-label">What Course are you interested in?</label>
          <div class="col-10">
            <select class="form-control" name="enquiryCourse">
              <option value="">Choose a Course</option>
              <option value="course1">Course 1</option>
              <option value="course2">Course 2</option>
              <option value="course3">Course 3</option>
            </select>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

      </form>
    </div>
  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
