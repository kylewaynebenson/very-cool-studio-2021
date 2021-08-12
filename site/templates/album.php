<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This example template makes use of the `$gallery` variable defined
  in the `album.php` controller (/site/controllers/album.php)

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/

?>
  <?php
    $path  = './assets/webfonts/' . $page->title();
    $files = glob($path . '/*.{woff}', GLOB_BRACE);
    $fontlist = array();
    $count = 0;
    foreach ($files as $file):    
      $filename = basename($file);
      # adding url
      $fontlist[$count]['files'][0] = '../../assets/webfonts/' . $page->title() . '/' . $filename;
      # create a fake nice name
      $fontname = str_replace("-", " ", $filename);
      $fontname = str_replace("VC", " ", $fontname);
      $fontname = str_replace(".woff", " ", $fontname);
      $fontname = implode(' ',preg_split('/(?=[A-Z])/', $fontname));
      # adding name
      $fontlist[$count]['name'] = $fontname;
      $count++;
    endforeach;
  ?>
  <?= js([
    'assets/js/fontsampler.js',
    'assets/js/fontsampler-skin.js'
  ]) ?>
<?php snippet('header') ?>
<header class="grid padding" style="--gutter: 6vw;">
  <div class="column" style="--columns: 4">
    <h1><?= $page->title() ?></h1>
    <dl class="grid">
      <dt class="column" style="--columns: 5"><h5>Char set</h5></dt>
      <dd class="column" style="--columns: 7"><h6><?= $page->charset() ?></h6></dd>

      <dt class="column" style="--columns: 5"><h5>Released</h5></dt>
      <dd class="column" style="--columns: 7"><h6><?= $page->released() ?></h6></dd>

      <dt class="column" style="--columns: 5"><h5>Designer</h5></dt>
      <dd class="column" style="--columns: 7"><h6><?= $page->designer() ?></h6></dd>
      
      <dt class="column" style="--columns: 5"><h5>Styles</h5></dt>
      <dd class="column" style="--columns: 7"><h6><?php echo $count; ?></h6></dd>
    </dl>
  </div>
  <div class="column" style="--columns: 5">
    <div class="text">
      <?= $page->text() ?>
    </div>
  </div>

  <div class="column" style="--columns: 3">
    <ul class="album-gallery">
      <?php foreach ($gallery as $image): ?>
      <li>
        <a href="<?= $image->url() ?>" data-lightbox>
          <figure class="img" style="--w:<?= $image->width() ?>;--h:<?= $image->height() ?>">
            <?= $image->resize(800) ?>
          </figure>
        </a>
      </li>
      <?php endforeach ?>
    </ul>
</header>
<article>
  <div id="demo"><?= $page->subheadline() ?></div>
  <script>
  var fonts = <?php echo json_encode($fontlist); ?>;
  var options = {
      lazyload: true,
      order: [
          ["fontfamily", "fontsize", "lineheight", "letterspacing", "alignment", "opentype"],
          "tester",
      ],
      ui: {
      // The actual input element for testing the webfonts
      tester: {
          // Set’s the contenteditable attribute
          editable: true,
          // The tester has it’s label disabled by default
          label: false
      },
      // The font-size slider
      fontsize: {
          // Any CSS unit is valid (e.g. px, em, %, etc.)
          unit: "px",
          init: 145,
          min: 16,
          max: 200,
          step: 6,
          // The text label to render for the element, set to false to disabled 
          // rendering a label
          label: "Size"
      },
      // The line-height slider
      lineheight: {
          unit: "%",
          init: 100,
          min: 90,
          max: 160,
          step: 5,
          label: "Leading"
      },
      // The letter-spacing slider
      letterspacing: {
          unit: "em",
          init: 0,
          min: -.05,
          max: .05,
          step: 0.01,
          label: "Letterspacing"
      },

      // The drop-down for picking fonts
      fontfamily: {
          label: "",
          // Supply the exact name of the Font (fontname, not file!) to be selected
          // and loaded first, by default the first font passed in
          init: "" 
      },
      // The set of buttons controlling alignment
      alignment: {
          // Choices can an Array of strings used both as value and display label
          // or the strings are separated by | to use as value|Display label
          choices: ["left|L", "center|C", "right|R"],
          // Has to be one of the above choices
          init: "center",
          label: ""
      },
      // A set of checkboxes; NOTE: No validation whatsoever if the font
      // supports these opentype features
      opentype: {
          choices: ["liga|fi", "frac|½"],
          init: ["liga"],
          label: ""
      }
    }
  }      
  var demo = new Fontsampler(document.getElementById("demo"), fonts, options)
  FontsamplerSkin(demo)
  demo.init()
  </script>
</article>
<?php snippet('footer') ?>
