<div class="card">
    <?php if( has_post_thumbnail() ): ?>
        <?php the_post_thumbnail('thumbnail', ['class'=>'card-img-top img-fluid', 'alt'=>'Card image cap']); ?>
    <?php endif; ?>
    <div class="card-body">
        <h5 class="card-title"><?php the_title(); ?></h5>
        <a class="btn btn-secondary" href="<?= esc_url(get_permalink()); ?>">Go to image</a>
    </div>
</div>
