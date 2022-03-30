<?php
  $files = get_field('files');
  if (empty($files) || sizeof($files) == 0) return;

  function get_extension($filename) {
    $pos = strrpos($filename, '.');
    return strtoupper(substr($filename, $pos + 1));
  }
?>
<div class="container-md narrow mt-3">
  <h3>Anexos</h3>
  <div class="entry-files">
    <?php foreach ($files as $file) : ?>
    <a href="<?=$file['file']['url'];?>" target="_blank" class="file-item d-flex align-items-center justify-content-start mb-2">
      <div class="extension me-4"><?=get_extension($file['file']['url']);?></div>
      <div class="name"><?=$file['name'];?></div>
    </a>
    <?php endforeach; ?>
  </div>
</div>
