<div class="entry-meta container narrow mt-5">
  <span class="author vcard" itemprop="author" itemscope itemtype="https://schema.org/Person">
    <span itemprop="name">
      <?php the_author_posts_link(); ?>
    </span>
  </span>
  <time class="entry-date" datetime="<?=esc_attr(get_the_date());?>" title="<?=esc_attr(get_the_date());?>" itemprop="datePublished" pubdate>
    <?php the_time(get_option('date_format')); ?>
  </time>
  <span class="categories mt-2"><span>Categorias:</span> <?php the_category(', '); ?></span>
  <span class="tags"><?php the_tags('<span>Tags:</span> ', ', '); ?></span>
</div>