<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  The article snippet renders an excerpt of a blog article.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<article class="article-excerpt">
  <a class="bg-blue block padding-sm" href="<?= $article->url() ?>">
    <div class="grid grid-locked">
      <header class="column" style="--columns: 11">
        <h2 class="article-excerpt-title"><?= $article->title() ?></h2>
        <h6 class="article-excerpt-date"><time class="color-grey" datetime="<?= $article->published('c') ?>"><?= $article->published() ?></time></h6>
      </header>
      <div class="hover-show column" style="--columns: 1; align-self:center;" >
        <?= svg('assets/icons/arrow-right.svg') ?>
      </div>
    </div>
  </a>
</article>
