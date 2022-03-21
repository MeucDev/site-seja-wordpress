<?php get_header(); ?>
<main id="content" role="main">
  <div class="title-cover mb-5">
    <div class="cover-image text-center">
      <div class="blur weak" style="background-image:url('<?=get_template_directory_uri();?>/images/background-search.jpg')"></div>
      <div id="over-title" class="container-md d-flex flex-column justify-content-center align-items-center">
        <h2>Resultados para pesquisa</h2>
        <h3><?=get_search_query();?></h3>
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
    <article id="post-0" class="post no-results not-found">
      <header class="header">
        <h1 class="entry-title" itemprop="name"><?php esc_html_e('Nothing Found', 'sejameuc'); ?></h1>
      </header>
      <div class="entry-content" itemprop="mainContentOfPage">
        <p><?php esc_html_e('Sorry, nothing matched your search. Please try again.', 'sejameuc'); ?></p>
        <?php get_search_form(); ?>
      </div>
    </article>
  <?php endif; ?>
  </div>
</main>
<?php get_footer(); ?>