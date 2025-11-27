<nav class="navbar navbar-expand-lg fixed-top">
  <div style="max-width: var(--app-width)" class="px-3 mx-auto w-100">
    <div class="container-fluid px-0 d-flex align-items-center justify-content-between">
      <a class="d-flex align-items-center navbar-brand" href="<?php echo get_home_url(); ?>"><?php echo get_bloginfo('name')?>
        <!-- <svg width="90" height="20">
          <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/brand_logo.svg#logo"></use>
        </svg> -->
      </a>

      <button class="ms-auto navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="var(--accent-color)" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path>
        </svg>
      </button>
      
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <a href="<?php echo get_home_url(); ?>">
            <!-- <svg width="72" height="16">
              <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/brand_logo.svg#logo"></use>
            </svg> -->
          </a>
          <button type="button" class="btn-close px-4" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
          <div class="offcanvas-body align-items-center">
            <!-- The WordPress Menu goes here -->
            <?php
            wp_nav_menu(
              array(
                'theme_location'  => 'primary',
                'container_class' => 'flex-grow-1',
                'container_id'    => '',
                'menu_class'      => 'navbar-nav mt-0 justify-content-end flex-grow-1 pe-3 gap-3',
                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                'menu_id'         => 'main-menu',
                'depth'           => 2,
                'walker'          => new WP_Bootstrap_Navwalker(),
              )
            );
            ?>
            
            
          </div>
      </div>
      <button title="Toggle Color Mode" type="button" class="btn light-switch">
        <svg viewBox="0 0 100 100">
          <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/theme_toggle.svg#nightDay"></use>
        </svg>
        <span class="visually-hidden"">Toggle Theme Color Mode</span>
      </button>
    </div>
  </div>
</nav>