<nav class="d-flex flex-column flex-lg-row justify-content-start justify-content-lg-between align-items-center px-lg-5 py-3">
  <div class="menu">
  <?php
    wp_nav_menu(array(
      'menu' => 'Rodapé',
      'menu_class' => 'd-flex flex-column flex-md-row justify-content-start align-items-center mb-3 mb-lg-0',
      'container' => ''
    ));
  ?>
  </div>
  <?php get_search_form(); ?>
</nav>
