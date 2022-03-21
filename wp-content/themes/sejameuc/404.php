<?php get_header(); ?>
<main id="content" role="main">
  <div class="title-cover mb-5">
    <div class="cover-image text-center">
      <div class="blur weak" style="background-image:url('<?=get_template_directory_uri();?>/images/background-404.jpg')"></div>
      <div id="over-title" class="container-md d-flex flex-column justify-content-center align-items-center">
        <h2>404</h2>
        <h3>Ops, acho que você se perdeu...</h3>
      </div>
    </div>
  </div>
  <div class="container-md narrow">
    <?php get_template_part('empty'); ?>
  </div>
  <?php get_template_part('socials'); ?>
</main>
<?php get_footer(); ?>