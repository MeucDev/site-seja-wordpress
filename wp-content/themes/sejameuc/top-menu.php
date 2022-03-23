<header class="top-menu" role="banner">
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-lg justify-content-between">
      <a class="navbar-brand ms-2" href="/">
        <img src="<?=get_template_directory_uri();?>/images/logo-icon.svg" alt="SEJA MEUC">
      </a>
      <div class="navbar-socials order-lg-last">
        <?php
          wp_nav_menu(array(
            'theme_location' => 'socials-menu',
            'menu_class' => 'socials small d-flex flex-wrap justify-content-center me-2 mb-0',
            'container' => ''
          ));
        ?>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" onclick="checkTopMenuOpacity()">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbar">
        <?php
          wp_nav_menu(array(
            'theme_location' => 'top-menu',
            'menu_class' => 'navbar-nav text-center justify-content-center align-items-center',
            'container' => ''
          ));
        ?>
      </div>
    </div>
  </nav>
</header>
<script type="text/javascript">
function checkTopMenuOpacity() {
  var scrollY = jQuery(this).scrollTop();
  var navbar = jQuery('nav.navbar');
  var button = jQuery('button.navbar-toggler');

  if (scrollY > 100 || button.attr('aria-expanded') == 'true') {
    navbar.addClass('solid');
  } else {
    navbar.removeClass('solid');
  }
}

jQuery(document).ready(function(){
  jQuery(document).scroll(checkTopMenuOpacity);
  checkTopMenuOpacity();
});
</script>