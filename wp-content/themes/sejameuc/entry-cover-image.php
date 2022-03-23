<div class="cover-image text-center">
  <div class="blur"></div>
  <?php
    if (has_post_thumbnail()) :
      $imageSource = get_the_post_thumbnail_url(null, 'cover');
  ?>
  <style media="screen">
    article > .title-cover > .cover-image > .blur {
      background-image: url('<?=$imageSource;?>');
    }
  </style>
  <?php the_post_thumbnail('cover'); endif; ?>
</div>
