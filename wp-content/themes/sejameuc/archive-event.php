<?php get_header(); ?>
<main id="content" role="main">
  <div class="title-cover mb-5">
    <div class="cover-image text-center">
      <div class="blur weak" style="background-image:url('<?=get_template_directory_uri();?>/images/background-events.jpg')"></div>
      <div id="over-title" class="container-md d-flex flex-column justify-content-center align-items-center">
        <h2>Eventos</h2>
        <h3>Jovens e Adolescentes</h3>
      </div>
    </div>
  </div>
  <div class="container-md">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4">
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('entry'); ?>
      <?php endwhile; ?>
      <?php get_template_part('nav', 'pagination'); ?>
    <?php else : ?>
      <?php get_template_part('empty'); ?>
    <?php endif; ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>