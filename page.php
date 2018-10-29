<?php get_header(); ?>

    <div class="container">
      <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post();?>
          <div class="row">
            <div class="col">
              <h1><?= the_title(); ?></h1>
              <hr>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div>
                <?php the_content(); ?>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>

<?php get_footer(); ?>
