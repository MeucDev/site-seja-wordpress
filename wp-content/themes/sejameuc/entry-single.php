<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="title-cover">
    <?php get_template_part('entry', 'cover-image'); ?>
    <div class="container-md narrow py-5">
      <div class="back text-end"><a href="javascript:history.back()">Voltar</a></div>
      <div class="titles">
        <h1 class="entry-title" itemprop="headline">
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
        </h1>
        <?php edit_post_link(); ?>
      </div>
    </div>
  </div>
  <?php get_template_part('entry', 'content'); ?>
  <?php get_template_part('entry', 'files'); ?>
  <?php
    if (!is_page()) {
      get_template_part('entry', 'meta');
    }
  ?>
</article>
