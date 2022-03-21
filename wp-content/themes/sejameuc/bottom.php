<footer class="bottom container-md" role="contentinfo">
  <hr />
  <?php get_template_part('nav', 'below'); ?>
  <hr class="mb-5" />
  <div class="d-flex justify-content-start align-items-center p-5">
    <div>
      <a href="#">
        <img src="<?=get_template_directory_uri();?>/images/logo.svg" alt="SEJA" style="height:40px;width:auto;" />
      </a>
    </div>
    <div class="flex-fill mx-3">
      &copy; <?=esc_html(date_i18n(__('Y', 'sejameuc')));?> SEJA
      <!--&middot; <a href="#">Privacy</a>-->
    </div>
    <div class="to-the-top ml-auto mr-0">
      <?php if (is_front_page()) : ?>
      <a href="#">Voltar ao topo</a>
      <?php else : ?>
      <a href="/">Voltar para página inicial</a>
      <?php endif; ?>
    </div>
  </div>
</footer>