<nav class="d-flex justify-content-between align-items-center px-5 py-3">
  <div class="menu">
  <?php
    wp_nav_menu(array(
      'menu' => 'footer-menu',
      'menu_class' => 'd-flex justify-content-start align-items-center mb-0',
      'container' => ''
    ));
  ?>
  </div>
  <?php get_search_form(); ?>
</nav>