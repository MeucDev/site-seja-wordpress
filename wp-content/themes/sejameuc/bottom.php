<footer class="bottom container-lg" role="contentinfo">
  <hr />
  <?php get_template_part('nav', 'below'); ?>
  <hr class="mb-3 mb-md-5" />
  <div class="d-flex flex-column flex-md-row justify-content-start align-items-center p-3 p-md-5">
    <div class="mt-3 mt-md-0">
      <a href="#" class="custom">
        <img src="<?=get_template_directory_uri();?>/images/logo.svg" alt="SEJA" style="height:40px;width:auto;" />
      </a>
    </div>
    <div class="flex-fill d-none d-md-block mx-3">
      &copy; <?=esc_html(date_i18n(__('Y', 'sejameuc')));?> SEJA
      <!--&middot; <a href="#">Privacy</a>-->
    </div>
    <div class="to-the-top order-first order-md-0 m-auto mr-md-0">
      <?php if (is_front_page()) : ?>
      <a href="#" class="p-2 p-md-0">Voltar ao topo</a>
      <?php else : ?>
      <a href="/" class="p-2 p-md-0">Voltar para página inicial</a>
      <?php endif; ?>
    </div>
  </div>
</footer>