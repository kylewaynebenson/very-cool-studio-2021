<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This template lists all the subpages of the `articles` page with
  their title date sorted by date and links to each subpage.

  This template receives additional variables like $tag and $articles
  from the `articles.php` controller in `/site/controllers/articles.php`

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>
<?php snippet('header') ?>
<div class="container">
  <div class="grid padding">
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
      <?php foreach ($articles as $article): ?>
      <li>
          <?php snippet('article', ['article' => $article]) ?>
      </li>
      <?php endforeach ?>
    </ul>
  </div>
</div>

<?php snippet('pagination', ['pagination' => $articles->pagination()]) ?>
<?php snippet('footer') ?>
