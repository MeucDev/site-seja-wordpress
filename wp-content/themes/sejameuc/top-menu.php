<header class="top-menu" role="banner">
  <nav class="navbar navbar-expand-md navbar-dark fixed-top">
    <div class="container-md justify-content-between">
      <a class="navbar-brand ms-2" href="/">
        <img src="<?=get_template_directory_uri();?>/images/logo.svg" alt="SEJA MEUC">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse me-2" id="navbar">
        <ul class="navbar-nav me-0 ms-auto text-center">
          <li class="nav-item d-md-none">
            <a class="nav-link" href="home">Página Inicial</a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link" href="eventos">Eventos</a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link" href="blog">Blog</a>
          </li>
          <li class="nav-item">
            <?php
              wp_nav_menu(array(
                'menu' => 'Redes Sociais',
                'menu_class' => 'socials small d-flex flex-wrap justify-content-center me-2 mb-0',
                'container' => ''
              ));
            ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>