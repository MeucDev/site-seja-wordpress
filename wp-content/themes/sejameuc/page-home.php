<?php get_header(); ?>
<main id="content" role="main" class="container">
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
</main>
<?php get_template_part('socials'); ?>
<?php get_footer(); ?>