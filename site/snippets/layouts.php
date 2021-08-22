<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  This layouts snippet renders the content of a layout
  field with our custom grid system.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<?php foreach ($field->toLayouts() as $layout): ?>
<section id="<?= $layout->id() ?>">
  <div class="container padding grid" style="--gutter: 1.5rem">
  <?php foreach ($layout->columns() as $column): ?>
  <div class="column" style="--columns:<?= $column->span() ?>">
    <div class="text">
      <?php foreach ($column->blocks() as $block): ?>
        <?php if ($block->type() == "gallery"): ?>
          <figure>
          <ul>
            <?php foreach ($block->images()->toFiles() as $image): ?>
            <li>
              <?php if ($image->link()->isNotEmpty()): ?>
                <a href="<?= $image->link() ?>">
                  <?= $image ?>
                </a>
              <?php else: ?>
              <?= $image ?>
              <?php endif ?>
            </li>
            <?php endforeach ?>
          </ul>
        </figure>
        <?php elseif ($image = $block->type() == "image"): ?>
          <figure>
            <?php foreach ($block->image()->toFiles() as $image): ?>
              <?php if ($image->link()->isNotEmpty()): ?>
                <a href="<?= $image->link() ?>">
                  <?= $image ?>
                </a>
              <?php else: ?>
              <?= $image ?>
              <?php endif ?>
            <?php endforeach ?>
        </figure>
        <?php else: ?>
          <?= $block ?>
        <?php endif ?>
      <?php endforeach ?>
    </div>
  </div>
  <?php endforeach ?>
  </div>
</section>
<?php endforeach ?>
