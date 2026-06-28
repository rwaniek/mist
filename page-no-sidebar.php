<?php
/**
 * Template Name: No Sidebar
 *
 * @package Mist
 * @since 1.0
 * @version 0.0.1
 */
 
the_post();
get_header(); ?>
<div style="max-width:1400px" class="mx-auto">
  <main class="pb-4" role="main">
    <?php get_template_part( 'template-parts/content', 'page' );?>
  </main><!-- .site-main -->
</div>
 
<?php get_footer(); ?>