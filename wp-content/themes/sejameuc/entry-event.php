<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="title-cover">
    <?php get_template_part('entry', 'cover-image-or-video'); ?>
    <div class="container-md narrow py-5">
      <div class="back text-end"><a href="javascript:history.back()">Voltar</a></div>
      <div class="titles">
        <h1 class="entry-title">
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
        </h1>
        <h2 class="subtitle mb-3"><?php the_field('subtitle'); ?></h2>
        <h3 class="entry-title"><?php the_field('location'); ?> - <?php the_field('start_date'); ?> a <?php the_field('end_date'); ?></h3>
      </div>
    </div>
  </div>
  <?php get_template_part('entry', 'event-signup'); ?>
  <?php get_template_part('entry', 'content'); ?>
  <?php get_template_part('entry', 'event-gallery-link'); ?>
  <?php get_template_part('entry', 'files'); ?>
  <div class="entry-meta container-md narrow mt-5">
    <?php
      $categories = get_the_terms(null, 'event-category');
      if (!empty($categories)) :
    ?>
    <span class="categories mt-2"><span>Categorias:</span>
      <?php foreach ($categories as $key => $value) : ?>
      <a href="<?=get_site_url();?>/categoria-de-evento/<?=$value->slug;?>/" rel="category tag"><?=$value->name;?></a>
      <?php endforeach; ?>
    </span>
  </div>
  <?php endif; ?>
</article>
