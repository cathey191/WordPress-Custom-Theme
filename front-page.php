<?php get_header('front'); ?>

        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>Home Page</h1>
                    <?php
                      if ( function_exists('the_custom_logo') ) {
                        the_custom_logo();
                      }
                    ?>
                    <br>
                    <?php
                      $custom_logo = get_theme_mod('custom_logo');
                      $logo_url = wp_get_attachment_image_url($custom_logo, 'thumbnail');
                    ?>
                    <?php if ($custom_logo): ?>
                      <img src="<?= $logo_url ?>" alt="">
                    <?php endif; ?>
                </div>
                <div class="col">
                  <?php if(have_posts()): ?>
                      <div class="card-columns">
                          <?php while(have_posts()): the_post();?>
                            <?php get_template_part('content', get_post_format()); ?>
                          <?php endwhile; ?>
                      </div>
                  <?php endif; ?>
                </div>
                <?php if( is_active_sidebar('front_page_sidebar') ): ?>
                  <div class="col-4">
                    <div id="frontPageSidebar" =>
                      <?php dynamic_sidebar('front_page_sidebar'); ?>
                    </div>
                  </div>
                <?php endif; ?>
            </div>
        </div>

<?php get_footer(); ?>
