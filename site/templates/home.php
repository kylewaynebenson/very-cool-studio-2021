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
  <?php if ($typePage = page('type')): ?>
  <ul>
    <?php foreach ($typePage->children()->listed() as $font): ?>
    <div class="type-preview bb-tan padding">
      <a href="<?= $font->url() ?>">
        <div class="full-width-text" style="font-family: <?= $font->title() ?>" contenteditable="true">
          <?= $font->subheadline() ?>
        </div>
        <div class="autogrid">
          <h6 class="color-grey"><?= $font->title() ?></h6>
          <h6 class="color-grey">115px</h6>
          <h6 class="color-grey">From $50</h6>
        </div>
      </a>
    </div>
    <?php endforeach ?>
  </ul>
  <?php endif ?>
<?php snippet('footer') ?>
