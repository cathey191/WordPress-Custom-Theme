<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php wp_head(); ?>
  </head>
  <body>

    <?php if ( have_posts() ): ?>
      <!-- Gets the current post we are on: -->
      <?php while ( have_posts()): the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <div>
          <?php the_content(); ?>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>

    <p>Content</p>
    <?php wp_footer(); ?>
  </body>
</html>
