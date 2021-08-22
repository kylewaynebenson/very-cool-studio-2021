<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  This gallery snippet is used in the gallery plugin (`/site/plugins/gallery`)

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<section class="gallery">
  <?php foreach ($gallery->images() as $image): ?>
  <figure>
    <?php if ($image->link()->isNotEmpty()): ?>
      <a href="<?= $image->link() ?>">
        <?= $image ?>
      </a>
    <?php else: ?>
    <?= $image ?>
    <?php endif ?>
  </figure>
  <?php endforeach ?>
</section>
