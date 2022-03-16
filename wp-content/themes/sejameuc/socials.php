<?php
  function print_social($name, $link) {
?>
<div class="social-link">
  <a href="<?=$link;?>" target="_blank" title="<?=$name;?>">
    <span class="bg d-flex justify-content-center <?=strtolower($name);?>">
      <img src="<?=get_template_directory_uri();?>/images/icon-<?=strtolower($name);?>.svg" />
    </span>
  </a>
</div>
<?php
  }
?>
<div class="container py-5 socials d-flex flex-wrap justify-content-center">
  <h2 class="text-center my-4">Redes Sociais</h2>
  <?php
    print_social('Instagram', 'https://www.instagram.com/sejameuc/');
    print_social('Facebook', 'https://www.facebook.com/sejameuc/');
    print_social('YouTube', 'https://www.youtube.com/sejameuc/');
    print_social('WhatsApp', 'https://wa.me/55047999337491');
  ?>
</div>
