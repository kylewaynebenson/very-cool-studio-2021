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

<article class="article grid container padding" style="--gutter: 3vw">
  <header class="article-header column" style="--columns: 5">
    <h1 class="article-title margin-l"><?= $page->title()->html() ?></h1>
    <dl>
      <dt><h5 class="no-mb color-grey">Published</h5></dt>
      <dd><h6><time class="article-date" datetime="<?= $page->date() ?>"><?= $page->date() ?></time></h6></dd>
    </dl>
      <?php if($author = $page->author()->toUser()): ?>
        <dl>
          <dt><h5 class="color-grey">By</h5></dt>
          <dd><h6><?= $author->name() ?></h6></dd>
      </dl>
      <?php endif ?>
    </dl>
    <?php if ($page->subheading()->isarticlempty()): ?>
    <p class="article-subheading"><small><?= $page->subheading()->html() ?></small></p>
    <?php endif ?>
    <?php if (!empty($tags)): ?>
      <ul class="article-tags margin-m">
        <?php foreach ($tags as $tag): ?>
        <li class="inline-block">
          <a class="bg-blue" href="<?= $page->parent()->url(['params' => ['tag' => $tag]]) ?>">
            <?= html($tag) ?>
            <div class="hover-show inline-block" style="align-self:center; margin-left: 3px; margin-right: -3px;" >
              <?= svg('assets/icons/tiny-arrow-right.svg') ?>
            </div>
          </a>
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
<?php if ($page->footnotes()->isNotEmpty()): ?>
<footer class="article-footer bg-white bt-tan" >
  <div class="grid container padding" style="--gutter: 3vw">
    <h5 class="column color-grey" style="--columns: 5">Footnotes</h5>
    <div class="article-footnotes column color-grey" style="--columns: 7">
      <?= $page->footnotes()->toBlocks() ?>
    </div>
  </div>
</footer>
<?php endif ?>
<?php snippet('prevnext') ?>

<?php snippet('footer') ?>
