<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This article template renders a blog article. It uses the `$page->cover()`
  method from the `article.php` page model (/site/models/page.php)

  It also receives the `$tag` variable from its controller
  (/site/controllers/article.php) if a tag filter is activated.

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>
<?php snippet('header') ?>

<article class="article grid container padding" style="--gutter: 1.5vw">
  <header class="article-header column" style="--columns: 5">
    <h1 class="article-title"><?= $page->title()->html() ?></h1>
    <dl class="grid">
      <dt class="column" style="--columns: 5"><h5>Published</h5></dt>
      <dd class="column" style="--columns: 7"><h6><time class="article-date" datetime="<?= $page->date() ?>"><?= $page->date() ?></time></h6></dd>
      <?php if($author = $page->author()->toUser()): ?>
        <dt class="column" style="--columns: 5"><h5>By</h5></dt>
        <dd class="column" style="--columns: 7"><h6><?= $author->name() ?></h6></dd>
      <?php endif ?>
    </dl>
    <?php if ($page->subheading()->isarticlempty()): ?>
    <p class="article-subheading"><small><?= $page->subheading()->html() ?></small></p>
    <?php endif ?>
    <?php if (!empty($tags)): ?>
      <ul class="article-tags">
        <?php foreach ($tags as $tag): ?>
        <li>
          <a href="<?= $page->parent()->url(['params' => ['tag' => $tag]]) ?>"><?= html($tag) ?></a>
        </li>
        <?php endforeach ?>
      </ul>
    <?php endif ?>
    <?php if ($page->intro()->html()->isNotEmpty()): ?>
      <div class="article-intro bg-tan">
        <?= $page->intro()->html() ?>
      </div>
    <?php endif ?>
  </header>
  <div class="article-text column" style="--columns: 7">
    <?= $page->text()->toBlocks() ?>
  </div>
</article>
<?php if (!empty($page->footnotes())): ?>
<footer class="article-footer bg-white bt-tan" >
  <div class="grid container padding" style="--gutter: 1.5vw">
    <h5 class="column color-grey" style="--columns: 5">Footnotes</h5>
    <div class="article-footnotes column color-grey" style="--columns: 7">
      <?= $page->footnotes()->toBlocks() ?>
    </div>
  </div>
</footer>
<?php endif ?>
<?php snippet('prevnext') ?>

<?php snippet('footer') ?>
