<?php get_header(); ?>
<main id="content" role="main">
  <?php
    if (have_posts()) :
      while (have_posts()) :
        the_post();
        get_template_part('entry', 'single');

        if (comments_open() && !post_password_required()) {
          comments_template('', true);
        }
      endwhile;
    endif;
  ?>
</main>
<?php get_template_part('socials'); ?>
<?php get_footer(); ?>