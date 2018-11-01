<?php
/* Template Name: Staff Page template */
?>
<?php get_header(); ?>

  <div class="container">
    <?php if (have_posts()): ?>
      <?php while(have_posts()): the_post(); ?>
        <div class="row">
          <div class="col">
            <h1><?php the_title(); ?></h1>
            <div>
              <?php the_content(); ?>
            </div>
          </div>
          <div class="row">
            <?php
              // $allStaffMembers = new WP_Query('post_type=staff&order=ASC&orderby=title');
              $args = array(
                'post_type' => 'staff',
                'order' => 'ASC',
                'orderby' => 'title'
              );
              $allStaffMembers = new WP_Query($args);
            ?>
            <?php if ($allStaffMembers->have_posts()): ?>
              <?php while($allStaffMembers->have_posts()): $allStaffMembers->the_post(); ?>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title"><?php the_title(); ?></h5>
                  </div>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>

<?php get_footer(); ?>
