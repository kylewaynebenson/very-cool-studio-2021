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
  <nav class="nav-filter">
      <!-- search -->
      <input type="text" placeholder="Search" class="small">
      <!-- filter by language -->
      <label for="language" class="h5 no-mb color-grey">Languages</label>
      <select name="language" id="language" class="input-select small">
        <option value="latin">Basic Latin</option>
        <option value="latin-ext">Extended Latin</option>
        <option value="cyrillic">Cyrillic</option>
        <option value="greek">Greek</option>
      </select>
      <!-- change layout -->
      <label for="grid-view" class="h5 no-mb color-grey">Layout</label>
      <div class="button-group button-toggle">
        <button id="grid-view" class="button-toggle-item">
          <span class="button-label">Grid</span>
          <span class="icon">
            <svg width="100%" height="100%" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M3 8C3 5.23858 5.23858 3 8 3H12C14.7614 3 17 5.23858 17 8V12C17 14.7614 14.7614 17 12 17H8C5.23858 17 3 14.7614 3 12V8Z" fill="currentColor" />
              <path d="M17 8C17 5.23858 19.2386 3 22 3H26C28.7614 3 31 5.23858 31 8V12C31 14.7614 28.7614 17 26 17H22C19.2386 17 17 14.7614 17 12V8Z" fill="currentColor" />
              <path d="M3 22C3 19.2386 5.23858 17 8 17H12C14.7614 17 17 19.2386 17 22V26C17 28.7614 14.7614 31 12 31H8C5.23858 31 3 28.7614 3 26V22Z" fill="currentColor" />
              <path d="M17 22C17 19.2386 19.2386 17 22 17H26C28.7614 17 31 19.2386 31 22V26C31 28.7614 28.7614 31 26 31H22C19.2386 31 17 28.7614 17 26V22Z" fill="currentColor" />
            </svg>
          </span>
        </button>
        <button id="list-view" class="button-toggle-item active">
          <span class="button-label">List</span>
          <span class="icon">
            <svg width="100%" height="100%" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M3 8C3 5.23858 5.23858 3 8 3H26C28.7614 3 31 5.23858 31 8V12C31 14.7614 28.7614 17 26 17H8C5.23858 17 3 14.7614 3 12V8Z" fill="currentColor" />
              <path d="M3 22C3 19.2386 5.23858 17 8 17H26C28.7614 17 31 19.2386 31 22V26C31 28.7614 28.7614 31 26 31H8C5.23858 31 3 28.7614 3 26V22Z" fill="currentColor" />
            </svg>
          </span>
        </button>
      </div>
  </nav>
  <ul class="type-list list-view">
    <?php foreach ($typePage->children()->listed() as $font): ?>
    <a class="hover-blue type-preview padding block" href="<?= $font->url() ?>">
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
        <div class="hide" id="language-support">
          <!-- comma seperated list of tags -->
          <?= implode(', ', $font->charset()->split(', ')) ?>
        </div>

      </a>
    <?php endforeach ?>
  </ul>
  <?php endif ?>
  <script src="<?= url('assets/js/filter.js') ?>"></script>
<?php snippet('footer') ?>
