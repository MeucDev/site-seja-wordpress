<?php
  $gallery = get_field('pictures');

  if (empty($gallery)) return;
?>
<div class="my-4">
  <div class="call-to-action mb-5 p-5 d-flex justify-content-center teal">
    <div class="cover-image gallery"></div>
    <a class="btn btn-lg enabled" href="<?=get_permalink();?>galeria/">Acesse a Galeria de Fotos</a>
  </div>
</div>
