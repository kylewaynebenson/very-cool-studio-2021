<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  The prevnext snippet renders the nice "keep on reading"
  section below each article in the blog, to jump between
  articles. It reuses the article snippet to render a full
  excerpt of the article.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>

<nav class="blog-prevnext bg-white bt-tan">
  <div class="container padding">
    <h5 class="color-grey">See also</h5>
    <div class="autogrid" style="--gutter:2px;">
        <?php if ($prev = $page->prevListed()): ?>
        <?php snippet('article', ['article' => $prev, 'excerpt' => false])  ?>
        <?php endif ?>

        <?php if ($next = $page->nextListed()): ?>
        <?php snippet('article', ['article' => $next, 'excerpt' => false])  ?>
        <?php endif ?>
    </div>
  </div>
</nav>