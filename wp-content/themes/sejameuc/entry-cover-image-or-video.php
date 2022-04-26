<?php
  $video = get_field('video', $home->id);
  if (!empty($video)) :
?>
<div class="video-cover">
  <video muted autoplay loop playsinline poster="<?=get_template_directory_uri();?>/images/video-poster.jpg">
    <source src="<?=$video['url'];?>" type="<?=$video['mime_type'];?>">
  </video>
</div>
<?php
  else :
    get_template_part('entry', 'cover-image');
  endif;
?>
