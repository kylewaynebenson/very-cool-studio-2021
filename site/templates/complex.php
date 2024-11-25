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

<article class="article grid padding" style="--gutter: 1.5vw">
  <header class="article-header column" style="--columns: 5">
    <h1 class="article-title margin-l"><?= $page->title()->html() ?></h1>
    <dl>
      <dt class="color-grey no-mb"><h5>Published</h5></dt>
      <dd><h6><time class="article-date" datetime="<?= $page->date() ?>"><?= $page->date() ?></time></h6></dd>
    </dl>
    <?php if($page->version()->isNotEmpty()): ?>
    <dl>
      <dt class="color-grey no-mb"><h5>Version</h5></dt>
      <dd><h6><?= $page->version() ?></time></dd>
    </dl>
    <?php endif ?>
      <?php if($author = $page->author()->toUser()): ?>
        <dl>
          <dt><h5>By</h5></dt>
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
<?php if ($download = $page->pdf()->filelink()->toFile()): ?>
    <aside class="bg-white bt-tan">
        <div class="grid container padding" style="--gutter: 1.5vw">
            <h5 class="column color-grey" style="--columns: 5">Downloads</h5>
            <div class="article-footnotes column" style="--columns: 7">
            <a class="btn" href="<?= $download->url() ?>" download="<?= $page->download()->itemtitle() ?>">
                <span class="icon">
                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M32 29.875H2" stroke="currentColor" stroke-width="2"/>
                <path d="M27.499 14.9817L16.8924 25.5883L6.28577 14.9817" stroke="currentColor" fill="none" stroke-width="2"/>
                <path d="M17 1L17 26" stroke="currentColor" stroke-width="2"/>
                </svg>
                </span> 
                <span class="no-mb"><?php echo $page->title() ?> </span>
            </a>
        </div>
    </aside>
<?php endif ?>
<?php if ($page->footnotes()->isNotEmpty()): ?>
<footer class="article-footer bg-white bt-tan" >
  <div class="grid container padding" style="--gutter: 1.5vw">
    <h5 class="column color-grey" style="--columns: 5">Footnotes</h5>
    <div class="article-footnotes column color-grey" style="--columns: 7">
      <?= $page->footnotes()->toBlocks() ?>
    </div>
  </div>
</footer>
<?php endif ?>

<?php snippet('footer') ?>
