<?php
/**
 * The template for the homepage
 *
 * @package Mist
 * @since 1.0
 * @version 1.0.0
 */

get_header(); ?>

<main class="position-relative overflow-hidden" role="main">
  <section class="jumbo py-5 px-3 px-lg-0">
    <div class="mx-auto" style="max-width: max(992px, 90vw)">
      <h1 class="mb-2 fw-bold">Short and spicy BDSM stories</h1>
      <h2>Join our community - enjoy erotic stories created by our users. Read for pleasure on <?php echo get_bloginfo('name')?>.</h2>
    </div>
  </section>
  <section class="pt-2">
    <div class="d-grid mx-auto pb-5">
      
        <?php

          $args = array(
          'posts_per_page'  => -1,
          'orderby'           => 'date',
          'order'             => 'DESC'
          // 'category_name' => 'featured'
          );

        $homepage_news_query = new WP_Query($args); 
        if ($homepage_news_query->have_posts() ):
          while ( $homepage_news_query->have_posts() ): $homepage_news_query->the_post(); 
        ?>
        
        <?php get_template_part( 'template-parts/post-excerpt' ); ?>
        
                  
        <?php 
          endwhile; 
        endif; 
        wp_reset_postdata(); //ending homepage_news_query ?>
        
      
    </div>
  </section> 
  
</main>
<?php get_footer(); 