<div class="col mb-3">
  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="list-entry-item">
    <article id="post-<?php the_ID(); ?>" <?php post_class('p-3 pb-1'); ?>>
      <?php if (has_post_thumbnail()) : ?>
      <?php the_post_thumbnail('cropped-thumbnail'); ?>
      <?php endif; ?>
      <div class="entry-content text-start">
        <h3 class="entry-title pt-2"><?php the_title(); ?></h3>
        <?php
          $type = get_post_type();
        ?>
        <h4 class="<?=$type;?> <?=(is_search() ? 'color' : '');?>">
        <?php
          if (is_search()) {
            switch ($type) {
              case 'post': echo 'Post'; break;
              case 'event': echo 'Evento'; break;
              case 'page': echo 'Página'; break;
            }
          } elseif ($type == 'event') {
            the_field('location');

            $dateStart = get_field('start_date');
            if ($dateStart) {
              echo ' - ' . $dateStart;
            }

            $dateEnd = get_field('end_date');
            if ($dateEnd) {
              echo ' - ' . $dateEnd;
            }
          } else {
            the_time(get_option('date_format'));
          }
        ?>
        </h4>
        <?php get_template_part('entry', 'summary'); ?>
      </div>
    </article>
  </a>
</div>