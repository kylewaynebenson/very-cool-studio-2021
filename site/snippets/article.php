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
  <a class="hover-blue padding-sm" href="<?= $article->url() ?>">
    <div class="grid grid-locked">
      <header class="column" style="--columns: 11">
        <h2 class="article-excerpt-title"><?= $article->title() ?></h2>
        <h6 class=""><time class="article-excerpt-date color-grey" datetime="<?= $article->published('c') ?>"><?= $article->published() ?></time></h6>
      </header>
      <div class="hover-show column" style="--columns: 1; align-self:center;" >
        <svg width="37" height="26" viewBox="0 0 37 26" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 12.9511H35M23.7559 1.29285L35.7072 13.2441M22.3417 25.1953L34.2929 13.244" stroke="black" stroke-width="2"/>
        </svg>
      </div>
    </div>
  </a>
</article>
