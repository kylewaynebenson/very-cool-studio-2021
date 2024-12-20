<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This template lists all the subpages of the `typefaces` page with
  their title date sorted by date and links to each subpage.

  This template receives additional variables like $tag and $typefaces
  from the `typefaces.php` controller in `/site/controllers/typefaces.php`

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>
<?php snippet('header') ?>
<div class="container padding">
  <div class="grid " style="--gutter: 1.5vw">
    <?php if (empty($tag) === false): ?>
    <header class="column" style="--columns: 4">
      <h1>
        <small>Tag:</small> <?= html($tag) ?>
        <a href="<?= $page->url() ?>">&times;</a>
      </h1>
    </header>
    <?php else: ?>
      <header class="column" style="--columns: 4">
        <?php snippet('intro') ?>
      </header>
    <?php endif ?>

    <ul class="column" style="--columns: 8">
      <?php foreach ($typefaces as $font): ?>
      <li>
          <?php snippet('font', ['font' => $font]) ?>
      </li>
      <?php endforeach ?>
      <?php snippet('pagination', ['pagination' => $typefaces->pagination()]) ?>
    </ul>
  </div>
</div>

<?php snippet('footer') ?>
