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

<?php if ($cover = $page->cover()): ?>
<a href="<?= $cover->url() ?>" data-lightbox class="img" style="--w:2; --h:1">
  <?= $cover->crop(1200, 600) ?>
</a>
<?php endif ?>

<article class="article grid container" style="--gutter: 2rem">
  <header class="article-header column" style="--columns: 5">
    <h1 class="article-title"><?= $page->title()->html() ?></h1>
    <dl class="grid">
      <dt class="column" style="--columns: 6"><h5>Published</h5></dt>
      <dd><h6><time class="article-date" datetime="<?= $page->date('c') ?>"><?= $page->date() ?></time></h6></dd>

      <dt class="column" style="--columns: 6"><h5>By</h5></dt>
      <dd><h6><?= $page->author() ?></h6></dd>
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
    <div class="article-intro bg-tan">
      <?= $page->intro()->html() ?>
    </div>
  </header>
  <div class="article-text column" style="--columns: 7">
    <?= $page->text()->toBlocks() ?>
    <footer class="article-footer bg-tan">
      <?= $page->footnotes()->toBlocks() ?>
    </footer>
  </div>
</article>
<?php snippet('prevnext') ?>

<?php snippet('footer') ?>
