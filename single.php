<?php get_header(); ?>

    <div class="container">
      <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post();?>
          <?php get_template_part('content', get_post_format()); ?>
          <div class="container">
            <div class="col">
              <?php
                $comments_args = array(
                  'comment_field' => '<div class="form-group">
                                        <label for="comment">Enter your comment</label>
                                        <textarea name="comment" class="form-control" aria-required="true"></textarea>
                                      </div>'
                );
                comment_form($comments_args, get_the_Id());

                $comments = get_comments(array(
                  'post_id' => get_the_Id(),
                  'status' => 'approve'
                ));
                wp_list_comments('', $comments);
              ?>
            </div>
          </div>
        <?php endwhile; ?>

      <?php endif; ?>
    </div>

<?php get_footer(); ?>
