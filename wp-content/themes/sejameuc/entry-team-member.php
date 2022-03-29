<?php
  if (empty($args)) return;
?>
<li class="member d-flex mb-3">
  <?php if ($args['picture']) : ?>
  <div class="picture mb-3 mb-md-0 me-0 me-md-3 d-flex flex-column justify-content-center">
    <img src="<?=$args['picture']['sizes']['medium'];?>" />
  </div>
  <?php endif; ?>
  <div class="content d-flex flex-column justify-content-center">
    <h4 class="name"><?=$args['name'];?></h4>
    <ul class="socials small d-flex justify-content-start">
      <?php if (!empty($args['instagram'])) : ?>
      <li class="instagram"><a href="<?=$args['instagram'];?>" target="_blank" itemprop="url">Instagram</a></li>
      <?php endif; if (!empty($args['email'])) : ?>
      <li class="email"><a href="mailto:<?=$args['email'];?>" target="_blank" itemprop="url">E-mail</a></li>
      <?php endif; ?>
    </ul>
  </div>
</li>
