<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header>  
    <h1 class="pt-2 mb-4"><?php echo esc_html( get_the_title());?></h1>
  </header>
    
  <div class="entry-content">
    <?php the_content(); ?>
  </div><!-- .entry-content -->

  <?php edit_post_link( __( 'Edit', 'mist' ), '<div class="container-xxl"><span class="edit-link">', '</span></div>' ); ?>
</article>