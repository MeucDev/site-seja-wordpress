<?php
  get_header();
  $current_sub_event_page = get_query_var('subeventpage');

  $entry_part = 'event';
  if (!empty($current_sub_event_page)) {
    $entry_part .= '-' . $current_sub_event_page;
  }
?>
<main id="content" role="main">
  <?php
    if (have_posts()) :
      while (have_posts()) :
        the_post();
        get_template_part('entry', $entry_part);

        if (comments_open() && !post_password_required()) {
          comments_template('', true);
        }
      endwhile;
    endif;
  ?>
</main>
<?php get_template_part('socials'); ?>
<?php get_footer(); ?>