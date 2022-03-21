<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="title-cover">
    <?php
      $blockCoverVideo = true;
      get_template_part('entry', 'cover-image');
    ?>
    <div class="container-md narrow py-5">
      <div class="back text-end"><a href="javascript:history.back()">Voltar</a></div>
      <div class="titles">
        <h1 class="entry-title">
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
        </h1>
        <h2 class="subtitle mb-3"><?php the_field('subtitle'); ?></h2>
        <h3>Galeria de Fotos</h3>
      </div>
    </div>
  </div>
  <?php
    $galleryItems = get_field('pictures');
  ?>
  <div class="container-md">
    <ul class="gallery d-flex align-content-start align-items-start">
      <?php foreach($galleryItems as $image): ?>
      <li>
        <a href="<?=esc_url($image['url']);?>">
          <img src="<?=esc_url($image['sizes']['thumbnail']);?>" alt="<?=esc_attr($image['alt']);?>" />
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</article>
