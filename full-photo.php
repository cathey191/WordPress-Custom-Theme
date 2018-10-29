<?php
  /*
    Template Name: Full Photo
    Template Post Type: page, post
   */
?>
<?php get_header(); ?>

    <div class="container-fluid">
      <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post();?>
          <div class="row">
            <div class="col">
              <h1><?= the_title(); ?></h1>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div>
                <?= the_content(); ?>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>

<?php get_footer(); ?>
