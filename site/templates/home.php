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
        <div class="full-width-text" style="font-family: '<?= $font->font() ?>'; line-height: .9; letter-spacing: 0px;">
          <?= $font->sample() ?>
        </div>
        <div class="flex font-details" style="justify-content: space-between; align-items: baseline;">
          <?php 
            $fontname = str_replace("-", "", $font->font());
            $fontname = implode(' ',preg_split('/(?=[A-Z])/', $fontname));
            $fontname = trim($fontname);
          ?>
          <h6 class="no-mb"><?= $fontname ?></h6>
          <?php if ($font->widths()->isNotEmpty()): ?>
            <h5 class="no-mb"><?= $font->widths() ?> Widths</h5>
          <?php endif ?>
          <?php if ($font->optical()->isNotEmpty()): ?>
            <h5 class="no-mb"><?= $font->optical() ?> Optical sizes</h5>
          <?php endif ?>
          <h5 class="no-mb"><?= $font->styles() ?> Styles</h5>
        </div>
      </a>
    <?php endforeach ?>
  </ul>
  <?php endif ?>
<?php snippet('footer') ?>
