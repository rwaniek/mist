<?php
$post_obj = get_post();

// Lead: only if a manual excerpt was written
$lead = has_excerpt() ? get_the_excerpt() : '';

$length = apply_filters('excerpt_length', 75);
if ($lead) {
    $length = 75; // shorter intro when a lead is present
}
$intro = wp_trim_words(excerpt_remove_blocks(strip_shortcodes($post_obj->post_content)), $length);

$thumb_id = get_post_thumbnail_id();
$alt_text = $thumb_id ? get_post_meta($thumb_id, '_wp_attachment_image_alt', true) : '';
?>
<article class="card excerpt rounded-0">

  <header>
    <?php if (has_post_thumbnail()) : ?>
      <?php the_post_thumbnail('medium', ['class' => 'card-img-top rounded-0']); ?>
    <?php else : ?>
      <svg class="svg-placeholder" width="100" height="100">
        <use xlink:href="<?php echo esc_url(get_template_directory_uri() . '/img/placeholder.svg#triskelion'); ?>"></use>
      </svg>
    <?php endif; ?>
  </header>

  <div class="card-body px-3 px-lg-4 pt-0 pb-1">
    <h3 class="my-3">
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h3>

    <?php if ($lead) : ?>
      <p class="lead"><?php echo esc_html($lead); ?></p>
    <?php endif; ?>

    <p><?php echo esc_html($intro); ?></p>

    <a href="<?php the_permalink(); ?>" class="btn btn-link text-accent mb-1 p-0 d-inline-flex justify-content-between align-items-center">
      <span class="me-2 small"><?php _e('Read further', 'mist'); ?></span>
      <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
        <path fill="currentColor" d="m600-200-57-56 184-184H80v-80h647L544-704l56-56 280 280-280 280Z"/>
      </svg>
    </a>
  </div>

</article>