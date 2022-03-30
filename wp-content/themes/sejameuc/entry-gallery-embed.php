<?php
  $galleryItems = get_field('pictures');

  if (empty($galleryItems) || sizeof($galleryItems) == 0) return;
?>
<div class="container-md narrow">
  <h3>Galeria</h3>
  <ul class="gallery d-flex flex-wrap align-content-center align-items-center text-center" data-pswp-uid="gallery">
    <?php foreach($galleryItems as $image): ?>
    <li>
      <a href="<?=esc_url($image['url']);?>" data-size="<?=$image['width'];?>x<?=$image['height'];?>">
        <img src="<?=esc_url($image['sizes']['thumbnail']);?>" alt="<?=esc_attr($image['alt']);?>" />
      </a>
    </li>
    <?php endforeach; ?>
  </ul>
</div>
<?php
  if (!empty($galleryItems)) {
    get_template_part('entry', 'gallery-focus-plugin');
  }
?>
