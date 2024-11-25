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

<article class="designer bg-blue grid bt-white">  
  <?php if($image = $page->image()): ?>
    <div class="designer-photo column" style="--columns: 4;">
    <?= $image->thumb(['format' => 'webp']) ?>
    </div>
  <?php endif ?>
  <header class="article-header column padding" style="--columns: 5">
      <?php if($name = $page->name()): ?>
        <h1 class="article-title margin-l"><?= $name->html() ?></h1>
      <?php endif ?>
      <dl>
      <?php if($bio = $page->bio()): ?>
        <dt><h5 class="color-grey">Bio</h5></dt>
        <dd><p><?= $bio->html() ?></p></dd>
      <?php endif ?>
      <?php if($link = $page->website()): ?>
        <dt><h5 class="color-grey">Website</h5></dt>
        <dd><h6><a href="<?= $link->html() ?>" target="_blank"><?= $link->html() ?></a></h6></dd>
      <?php endif ?>
    </dl>
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
<div class="blog-prevnext bg-white">
    <div class="padding">
        <h5 class="color-grey">Typefaces</h5>
        <div class="flex flex-wrap gap-xxs">
            <?php 
            // Get all fonts
            $fonts = page('typefaces')->children()->listed();

            // Filter fonts where this designer is listed
            $designerFonts = $fonts->filter(function($font) use ($page) {
                $fontDesigners = $font->designer()->toPages();
                return $fontDesigners->has($page);
            });

            // Show the fonts, shuffled 
            if ($designerFonts->count() > 0):
                foreach($designerFonts->shuffle() as $font): ?>
                    <?php snippet('article', ['article' => $font, 'excerpt' => false]) ?>
                <?php endforeach;
            endif ?>
        </div>
    </div>
</div>
<?php snippet('footer') ?>
