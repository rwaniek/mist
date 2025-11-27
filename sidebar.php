<aside class="ps-4 pe-3 pt-5">
  <div class="position-sticky" style="top: calc(var(--navbar-height) + 1.5rem)">
    <h4><?php printf( esc_html__( 'What %s is about?', 'mist' ), get_bloginfo('name') ); ?></h4>
    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
      <?php dynamic_sidebar( 'sidebar-1' ); ?>
    <?php endif; ?>
  </div>
</aside>
