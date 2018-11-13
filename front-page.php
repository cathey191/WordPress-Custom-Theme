<?php get_header('front'); ?>

        <div class="container">
            <div class="row">
              <div class="card col-6">
                <h3>Post Title</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <button type="button" name="button">Go to Post</button>
              </div>
              <div class="card col-6">
                <h3>Post Title</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <button type="button" name="button">Go to Post</button>
              </div>
            </div>
            <div class="row">
              <div class="col">
                    <h1>Home Page</h1>
                    <?php
                      $custom_logo = get_theme_mod('custom_logo');
                      $logo_url = wp_get_attachment_image_url($custom_logo, 'thumbnail');
                    ?>
                    <?php if ($custom_logo): ?>
                      <img src="<?= $logo_url ?>" alt="">
                    <?php endif; ?>
                </div>
              </div>
              <div class="row">
                <?php if( is_active_sidebar('front_page_sidebar') ): ?>
                  <div class="col-2">
                    <div id="frontPageSidebar" =>
                      <?php dynamic_sidebar('front_page_sidebar'); ?>
                    </div>
                  </div>
                <?php endif; ?>
                <div class="col-10">
                  <?php if(have_posts()): ?>
                      <div class="card-columns">
                          <?php while(have_posts()): the_post();?>
                            <?php get_template_part('content', get_post_format()); ?>
                          <?php endwhile; ?>
                      </div>
                  <?php endif; ?>
                </div>
            </div>
        </div>

<?php get_footer(); ?>
