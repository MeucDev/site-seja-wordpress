<?php
  $signupLink = get_field('signup_link');
  $signupOpen = get_field('signup_open');

  if (empty($signupLink)) return;
?>
<div class="call-to-action mb-5 p-5 d-flex justify-content-center">
  <div class="cover-image signup"></div>
  <?php if ($signupOpen) : ?>
  <a class="btn btn-lg enabled" href="<?=$signupLink;?>" target="_blank">Inscreva-se</a>
  <?php else : ?>
  <span class="btn btn-lg disabled">Inscrições em Breve</span>
  <?php endif; ?>
</div>
