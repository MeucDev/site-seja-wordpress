<?php
  get_header();

  $video = get_field('video');
  if (!empty($video)) :
?>
<div class="video-cover">
  <video muted autoplay loop poster="<?=get_template_directory_uri();?>/images/video-poster.jpg">
    <source src="<?=$video['url'];?>" type="<?=$video['mime_type'];?>">
  </video>
</div>
<?php endif; ?>
<main id="content" role="main" class="container-md">
  <div class="container-md narrow">
    <div class="row feature py-5">
      <h2 class="feature-heading text-center pb-5">Próximos Eventos</h2>
      <?php
        $args = array(
          'post_type'       => 'event',
          'posts_per_page'  => 3,
          'order'           => 'ASC',
          'meta_key'        => 'start_date',
          'meta_value'      => date( "Ymd" ),
          'meta_compare'    => '>=',
        );

        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) :
          while ($the_query->have_posts()) :
            $the_query->the_post();
            get_template_part('entry');
          endwhile; 
          wp_reset_postdata();
      ?>
      <nav class="pagination d-flex justify-content-center align-items-center">
        <a href="eventos" class="m-auto">Todos os eventos</a>
      </nav>
      <?php endif; ?>
    </div>
  </div>
  <?php $capacitacao = get_page_by_path('seja-capacitacao', OBJECT); ?>
  <div class="row feature py-5">
    <div class="col-lg d-flex flex-column justify-content-center">
      <h2 class="feature-heading mb-4">
      <?=$capacitacao->post_title;?>
      </h2>
      <p class="feature-description">
        <?=apply_filters('the_content', $capacitacao->post_content);?>
      </p>
    </div>
    <div v-if="image" class="col-lg-auto image alternate">
      <img src="<?=get_the_post_thumbnail_url($capacitacao, 'full');?>" />
    </div>
  </div>
  <?php $eventos = get_page_by_path('seja-eventos', OBJECT); ?>
  <div class="row feature py-5">
    <div class="col-lg d-flex flex-column justify-content-center">
      <h2 class="feature-heading mb-4">
        <?=$eventos->post_title;?>
      </h2>
      <p class="feature-description">
        <?=apply_filters('the_content', $eventos->post_content);?>
      </p>
    </div>
    <div v-if="image" class="col-lg-auto image">
      <img src="<?=get_the_post_thumbnail_url($eventos, 'full');?>" />
    </div>
  </div>
  <div class="container-md narrow">
    <div class="row feature py-5">
      <h2 class="feature-heading text-center pb-5">Blog</h2>
      <?php
        $args = array(
          'post_type'       => 'post',
          'posts_per_page'  => 3
        );

        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) :
          while ($the_query->have_posts()) :
            $the_query->the_post();
            get_template_part('entry');
          endwhile; 
          wp_reset_postdata();
      ?>
    </div>
    <nav class="pagination d-flex justify-content-center align-items-center">
      <a href="blog" class="m-auto">Todas as postagens</a>
    </nav>
    <?php endif; ?>
  </div>
</main>
<?php get_template_part('socials'); ?>
<?php get_footer(); ?>