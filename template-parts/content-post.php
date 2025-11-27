<?php 
$alt_text = get_post(get_post_thumbnail_id())->post_title;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header>  
    <?php if (has_post_thumbnail()) : ?>
      <?php echo get_the_post_thumbnail($post->ID, 'full', ['class' => 'card-img-top rounded-0', 'alt' => $alt_text]); ?>
    <?php else : ?>
      <div style="height:200px" class="d-flex align-items-center justify-content-center">
        <svg class="svg-placeholder" width="100" height="100">
            <use xlink:href="<?php echo get_template_directory_uri() . '/img/placeholder.svg' . '#triskelion';?>"></use>
        </svg>
      </div>
    <?php endif; ?>
    <p class="smaller ps-3"><?php the_date(); ?></p>
    <h1 class="mb-4"><?php echo esc_html( get_the_title());?></h1>
  </header>
    
  <div class="entry-content">
    <?php the_content(); ?>
  </div><!-- .entry-content -->

  <?php edit_post_link( __( 'Edit', 'mist' ), '<div class="container-xxl"><span class="edit-link">', '</span></div>' ); ?>
</article>