<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  The pagination snippet renders prev/next links in the
  blog, when articles spread across multiple pages

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<?php if ($pagination->hasPages()): ?>
<nav class="pagination autogrid" style="--gutter:2px;">
  <?php if ($pagination->hasPrevPage()): ?>
  <a class="pagination-prev" href="<?= $pagination->prevPageUrl() ?>">
    <?= svg('assets/icons/arrow-left.svg') ?>
  </a>
  <?php else: ?>
  <span class="pagination-prev">
    <?= svg('assets/icons/arrow-left.svg') ?>
  </span>
  <?php endif ?>
  <?php if ($pagination->hasNextPage()): ?>
  <a class="pagination-next" href="<?= $pagination->nextPageUrl() ?>">
    <?= svg('assets/icons/arrow-right.svg') ?>
  </a>
  <?php else: ?>
  <span class="pagination-next">
    <?= svg('assets/icons/arrow-right.svg') ?>
  </span>
  <?php endif ?>
</nav>
<?php endif ?>
