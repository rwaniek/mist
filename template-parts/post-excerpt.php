<?php 
$excerpt = get_the_excerpt();
$alt_text = get_post(get_post_thumbnail_id())->post_title;

?>
<article class="card excerpt rounded-0">

  <header>
    <?php if (has_post_thumbnail()) : ?>
      <?php echo get_the_post_thumbnail(null, 'medium', ['class' => 'card-img-top rounded-0', 'alt' => $alt_text]); ?>
    <?php else : ?>
      <svg class="svg-placeholder" width="100" height="100">
          <use xlink:href="<?php echo get_template_directory_uri() . '/img/placeholder.svg' . '#triskelion';?>"></use>
      </svg>
    <?php endif; ?>
  </header>

  <div class="card-body px-3 px-lg-4 pt-0 pb-1">
    <h3 class="my-3">
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h3>
    <p><?php echo esc_html($excerpt); ?></p>
    <a href="<?php the_permalink(); ?>" class="btn btn-link text-accent mb-1 p-0 d-inline-flex justify-content-between align-items-center">
      <span class="me-2 small"><?php _e('Read further', 'mist'); ?></span> 
      <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
        <path fill="currentColor" d="m600-200-57-56 184-184H80v-80h647L544-704l56-56 280 280-280 280Z"/>
      </svg>
    </a>
  </div>

</article>