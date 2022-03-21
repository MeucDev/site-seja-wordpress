<?php get_header(); ?>
<main id="content" role="main">
  <div class="title-cover mb-5">
    <div class="cover-image text-center">
      <div class="blur weak" style="background-image:url('<?=get_template_directory_uri();?>/images/background-blog.jpg')"></div>
      <div id="over-title" class="container-md d-flex flex-column justify-content-center align-items-center">
        <h2>Blog</h2>
        <h3>Notícias, Conteúdo e Edificação</h3>
      </div>
    </div>
  </div>
  <div class="container-md narrow">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part('entry'); ?>
    <?php endwhile; ?>
    <?php get_template_part('nav', 'pagination'); ?>
  <?php else : ?>
    <?php get_template_part('empty'); ?>
  <?php endif; ?>
  </div>
</main>
<?php get_footer(); ?>