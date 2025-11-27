<footer style="background-color: #232526;">
  <div class="text-center py-4">

  <?php
    wp_nav_menu(array(
      'theme_location' => 'secondary',
      'container' => 'nav',
      'container_class' => 'd-flex justify-content-center',
      'menu_class' => 'footer-menu ps-0',
      'menu_id' => 'secondary-menu'
    ));
  ?>

    <p class="mt-0 px-3 small">© <?php echo get_bloginfo('name')?></p>
  </div>
</footer>
<?php wp_footer(); ?>

</body>
</html>