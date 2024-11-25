<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  The article snippet renders an excerpt of a blog article.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<article class="article-excerpt flex-grow">
  <a class="bg-blue block padding-sm" href="<?= $article->url() ?>">
    <div class="flex flex-column gap-md">
      <?php if ($article->font()->isNotEmpty()): ?>
        <h1 class="article-excerpt-sample mb-0" style="font-family: <?= $article->font() ?>">Aa</h1>
      <?php endif ?>
      <header class="flex-grow">
        <h2 class="article-excerpt-title mb-0"><?= $article->title() ?></h2>
        <?php if ($article->metaDescription()->isNotEmpty()): ?>
          <h6 class="article-excerpt-excerpt h6 color-grey mb-0"><?= $article->metaDescription() ?></h6>
        <?php else: ?>
          <h6 class="article-excerpt-excerpt h6 color-grey mb-0"><?= $article->date('M d, Y') ?></h6>
        <?php endif ?>
      </header>
      <div class="hover-show" style="align-self:center;" >
        <?= svg('assets/icons/arrow-right.svg') ?>
      </div>
    </div>
  </a>
</article>
