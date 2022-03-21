<?php
  $video = get_field('video', $home->id);
  if ($blockCoverVideo && !empty($video)) :
?>
<div class="video-cover">
  <video muted autoplay loop poster="<?=get_template_directory_uri();?>/images/video-poster.jpg">
    <source src="<?=$video['url'];?>" type="<?=$video['mime_type'];?>">
  </video>
</div>
<?php else : ?>
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
<?php endif; ?>
