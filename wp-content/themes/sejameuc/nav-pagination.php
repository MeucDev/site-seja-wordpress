<?php
  $next_link = get_previous_posts_link('Mais recentes');
  $prev_link = get_next_posts_link('Mais antigos');

  if (empty($next_link) && empty($prev_link)) return;
?>
<nav class="pagination d-flex justify-content-between align-items-center px-5 py-3 mt-4">
  <div class="prev me-auto"><?=$next_link;?></div>
  <div class="next ms-auto"><?=$prev_link;?></div>
</nav>