<?php get_header(); ?>
<main id="content" role="main">
  <?php
    if (have_posts()) :
      while (have_posts()) :
        the_post();
        get_template_part('entry', 'single');

        $teamMembers = get_field('team');
        if (!empty($teamMembers) && sizeof($teamMembers) > 0) : ?>
        <div class="container-md narrow mt-5">
          <h3>Nosso time</h3>
          <ul class="team-members">
            <?php
              foreach ($teamMembers as $member) :
                get_template_part('entry', 'team-member', $member);
              endforeach;
            ?>
          </ul>
        </div>
        <?php endif;
      endwhile;
    endif;
  ?>
</main>
<?php get_template_part('socials'); ?>
<?php get_footer(); ?>