<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This about page example uses the content from our layout field
  to create most parts of the page and keeps it modular. Only the
  contact box at the bottom is pre-defined with a set of fields
  in the about.yml blueprint.

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>
<?php snippet('header') ?>
<?php snippet('layouts', ['field' => $page->layout()])  ?>
<aside class="contact bg-tan">
  <div class="padding container grid" style="--gutter: 1vw;">
    <h2 id="faqs" class="column" style="--columns:3;">Frequently Asked Questions</h2>
      <div class="grid column" style="--gutter: 1vw;--columns:9;">
        <?php 
        // using the `toStructure()` method, we create a structure collection
        $items = $page->faqs()->toStructure();
        // we can then loop through the entries and render the individual fields
        foreach ($items as $item): ?>
          <h6 class="column" style="--columns:3;"><?= $item->question() ?></h6>
          <div class="column" style="--columns:1;"></div>
          <div class="column" style="--columns:8;"><?= $item->answer()->toBlocks() ?></div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</aside>

</div>

<?php snippet('footer') ?>
