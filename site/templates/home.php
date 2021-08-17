<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This home template renders content from others pages, the children of
  the `photography` page to display a nice gallery grid.

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>
<?php snippet('header') ?>
  <?php
  /*
    We always use an if-statement to check if a page exists to
    prevent errors in case the page was deleted or renamed before
    we call a method like `children()` in this case
  */
  ?>
  <?php if ($typePage = page('typefaces')): ?>
  <ul>
    <?php foreach ($typePage->children()->listed() as $font): ?>
    <a class="hover-blue type-preview bb-soft-blue padding" href="<?= $font->url() ?>" style="display:block;">
      <style>
      @font-face {
        font-family: '<?= $font->font() ?> Home';
        font-weight: 100;
        src: url("<?= kirby()->urls()->assets() . '/webfonts/' . $font->title()->lower() . '/VC' . $font->font() . '.woff2' ?>") format("woff2"), url("<?= kirby()->urls()->assets() . '/webfonts/' . $font->title()->lower() . '/VC' . $font->font() . '.woff' ?>") format("woff"); 
      }
      </style>
        <div class="full-width-text" style="font-family: <?= $font->font() ?> Home; font-weight: 100; line-height: .9; letter-spacing: 0px; margin-top: -1.25vw; margin-bottom: 1.25vw;">
          <?= $font->sample() ?>
        </div>
        <div class="autogrid">
          <?php 
            $fontname = str_replace("-", "", $font->font());
            $fontname = implode(' ',preg_split('/(?=[A-Z])/', $fontname));
            $fontname = trim($fontname);
          ?>
          <h6 class="color-grey no-mb"><?= $fontname ?></h6>
          <h6 class="color-grey no-mb text-right">From $50</h6>
        </div>
      </a>
    <?php endforeach ?>
  </ul>
  <?php endif ?>
<?php snippet('footer') ?>
