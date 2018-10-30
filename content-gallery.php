<?php if ( is_singular() ): ?>
  <div class="row">
    <div class="col">
      <h1><?= the_title(); ?></h1>
      <hr>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-md-4">
      <div>
        <?php the_content(); ?>
      </div>
    </div>
  </div>
<?php else: ?>
  <div class="card">
      <?php if( has_post_thumbnail() ): ?>
          <?php the_post_thumbnail('thumbnail', ['class'=>'card-img-top img-fluid', 'alt'=>'Card image cap']); ?>
      <?php endif; ?>
      <div class="card-body">
          <div class="">
              <?php the_content(); ?>
          </div>
          <h5 class="card-title"><?php the_title(); ?></h5>
          <a class="btn btn-primary" href="<?= esc_url(get_permalink()); ?>">Go to post</a>
      </div>
  </div>
<?php endif; ?>
