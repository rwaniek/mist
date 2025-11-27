<?php
/**
 * The template for displaying all single posts and pages
 *
 * @package Mist
 * @since 1.0
 * @version 0.0.1
 */
 
get_header(); ?>
<div style="max-width:1400px" class="layout--sidebar mx-auto justify-content">

  <main role="main">
    <?php
    // Start the loop.
    while ( have_posts() ) : the_post();

    if ( is_single() ) {
      
      get_template_part( 'template-parts/content', 'post' );
      
      // If comments are open or we have at least one comment, load up the comment template.
      // if ( comments_open() || get_comments_number() ) :
      //     comments_template();
      // endif;

      // Previous/next post navigation.
      the_post_navigation( array(
        'next_text' => 
            '<span class="screen-reader-text">' . __( 'Next post:', 'mist' ) . '</span> ' .
            '<div class="post-nav py-2 d-flex align-items-center"><svg class="me-2" height="24" viewBox="0 -960 960 960" width="24"><path d="M526.978-264.935q-13.435-13.435-12.935-32.706.5-19.272 13.935-32.707L632.13-434.5H198.804q-19.152 0-32.326-13.174T153.304-480q0-19.152 13.174-32.326t32.326-13.174H632.13L526.978-630.652q-13.435-13.435-13.435-32.207 0-18.771 13.435-32.206 13.435-13.435 32.326-13.435 18.892 0 32.326 13.435l183 183.239q6.718 6.717 9.696 14.793 2.978 8.076 2.978 17.033t-2.978 17.033q-2.978 8.076-9.696 14.793l-184 184.239q-12.673 12.674-31.445 12.555-18.772-.12-32.207-13.555Z"/></svg><span class="post-title fw-bold">%title</span></div>',
        'prev_text' => 
            '<span class="screen-reader-text">' . __( 'Previous post:', 'mist' ) . '</span> ' .
            '<div class="post-nav d-flex align-items-center"><svg class="me-2" height="24" width="24" viewBox="0 0 24 24" xml:space="preserve">
            <path d="M10.6,6.6c0.2,0.2,0.3,0.5,0.3,0.8c0,0.3-0.1,0.6-0.3,0.8L8,10.9h10.8c0.3,0,0.6,0.1,0.8,0.3c0.2,0.2,0.3,0.5,0.3,0.8
              c0,0.3-0.1,0.6-0.3,0.8c-0.2,0.2-0.5,0.3-0.8,0.3H8l2.6,2.6c0.2,0.2,0.3,0.5,0.3,0.8c0,0.3-0.1,0.6-0.3,0.8
              c-0.2,0.2-0.5,0.3-0.8,0.3c-0.3,0-0.6-0.1-0.8-0.3l-4.6-4.6c-0.1-0.1-0.2-0.2-0.2-0.4c0-0.1-0.1-0.3-0.1-0.4c0-0.1,0-0.3,0.1-0.4
              c0-0.1,0.1-0.3,0.2-0.4L9,6.6c0.2-0.2,0.5-0.3,0.8-0.3C10.1,6.3,10.4,6.4,10.6,6.6z"/>
            </svg><span class="post-title fw-bold">%title</span></div>',
      ) );
    }
    
    else if ( is_page() ) {
      get_template_part( 'template-parts/content', 'page' );
    }
    // End the loop.
    endwhile;
    ?>
  </main><!-- .site-main -->
  <?php get_sidebar(); ?>
</div>
 
<?php get_footer(); ?>