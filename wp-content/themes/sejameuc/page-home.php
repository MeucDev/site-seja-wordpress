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
<main id="content" role="main">
  <div class="container-md narrow">
    <div id="home-content" class="entry-content text-center py-5">
      <?php the_content(); ?>
    </div>
  </div>
  <div class="features d-flex flex-column flex-lg-row">
    <?php $capacitacao = get_page_by_path('seja-capacitacao', OBJECT); ?>
    <a href="<?=get_permalink($capacitacao);?>" class="feature flex-fill">
      <div class="image single">
        <div class="content" style="background-image:url('<?=get_the_post_thumbnail_url($capacitacao, 'large');?>')"></div>
        <h2 class="feature-title"><?=$capacitacao->post_title;?></h2>
      </div>
    </a>
    <?php $eventos = get_page_by_path('seja-eventos', OBJECT); ?>
    <a href="/eventos" class="feature flex-fill">
      <div class="image single">
        <div class="content" style="background-image:url('<?=get_the_post_thumbnail_url($eventos, 'large');?>')"></div>
        <h2 class="feature-title"><?=$eventos->post_title;?></h2>
      </div>
    </a>
  </div>
  <div class="features d-flex flex-column flex-lg-row">
    <div class="feature flex-fill">
      <div class="image">
        <div class="content" style="background-image:url('<?=get_template_directory_uri();?>/images/background-events.jpg')"></div>
        <h2 class="feature-title">Próximos Eventos</h2>
      </div>
      <div class="feature-content pt-4">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-2 row-cols-xl-3">
        <?php
          $args = array(
            'post_type'       => 'event',
            'posts_per_page'  => 3,
            'order'           => 'ASC',
            'meta_key'        => 'start_date',
            'meta_value'      => date('Ymd'),
            'meta_compare'    => '>=',
          );

          $the_query = new WP_Query($args);
          while ($the_query->have_posts()) :
            $the_query->the_post();
            get_template_part('entry');
          endwhile; 
          wp_reset_postdata();
        ?>
        </div>
      </div>
      <div class="feature-footer">
        <a href="/eventos" class="p-3">Todos os eventos</a>
      </div>
    </div>
    <div class="feature flex-fill">
      <div class="image">
        <div class="content" style="background-image:url('<?=get_template_directory_uri();?>/images/background-blog.jpg')"></div>
        <h2 class="feature-title">Blog</h2>
      </div>
      <div class="feature-content pt-4">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-2 row-cols-xl-3">
        <?php
          $args = array(
            'post_type'       => 'post',
            'posts_per_page'  => 3
          );

          $the_query = new WP_Query($args);
          while ($the_query->have_posts()) :
            $the_query->the_post();
            get_template_part('entry');
          endwhile; 
          wp_reset_postdata();
        ?>
        </div>
      </div>
      <div class="feature-footer">
        <a href="/blog" class="p-3">Todas as postagens</a>
      </div>
    </div>
  </div>
  <div class="features d-flex flex-column flex-lg-row">
    <?php $voluntario = get_page_by_path('seja-voluntario', OBJECT); ?>
    <a href="<?=get_permalink($voluntario);?>" class="feature flex-fill">
      <div class="image single">
        <div class="content" style="background-image:url('<?=get_the_post_thumbnail_url($voluntario, 'large');?>')"></div>
        <h2 class="feature-title"><?=$voluntario->post_title;?></h2>
      </div>
    </a>
    <?php $colaborador = get_page_by_path('seja-colaborador', OBJECT); ?>
    <a href="<?=get_permalink($colaborador);?>" class="feature flex-fill">
      <div class="image single">
        <div class="content" style="background-image:url('<?=get_the_post_thumbnail_url($colaborador, 'large');?>')"></div>
        <h2 class="feature-title"><?=$colaborador->post_title;?></h2>
      </div>
    </a>
  </div>
</main>
<?php get_template_part('socials'); ?>
<?php get_footer(); ?>
