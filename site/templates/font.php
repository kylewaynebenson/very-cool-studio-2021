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
<?php snippet('header') ?>
<?php
  $path  = './assets/webfonts/' . $page->slug();
  $files = glob($path . '/*.{woff}', GLOB_BRACE);
  $fontlist = array();
  $count = 0;
  foreach ($files as $file):    
    $filename = basename($file);
    # adding url
    $fontlist[$count]['files'][0] = '../../assets/webfonts/' . $page->slug() . '/' . $filename;
    # create a fake nice name
    $fontname = str_replace("-", "", $filename);
    $fontname = str_replace("VC", " ", $fontname);
    $fontname = str_replace(".woff", " ", $fontname);
    $fontname = implode(' ',preg_split('/(?=[A-Z])/', $fontname));
    $fontname = trim($fontname);
    # adding name
    $fontlist[$count]['name'] = $fontname;
    $count++;
  endforeach;
?>
<?= js([
  'assets/js/fontsampler.js',
  'assets/js/fontsampler-skin.js',
  'assets/js/fonts.js'
]) ?>
<header class="grid padding" style="--gutter: 3vw;">
  <div class="column" style="--columns: 4">
    <h1 class="margin-l">
      <?= $page->title() ?>
    </h1>
    <?php if ($page->version()->isNotEmpty()): ?>
      <dl>
        <dt><h5 class="color-grey">Version</h5></dt>
        <dd><h6><?= $page->version() ?></h6></dd>
      </dl>
    <?php endif ?>
    <?php if ($page->charset()->isNotEmpty()): ?>
      <a href="#glyphs"><dl>
        <dt><h5 class="color-grey">Char set</h5></dt>
        <dd><h6><?= $page->charset() ?></h6></dd>
      </dl></a>
    <?php endif ?>
    <?php if ($page->released()->isNotEmpty()): ?>
    <dl>
      <dt><h5 class="color-grey">Released</h5></dt>
      <dd><h6><?= $page->released() ?></h6></dd>
    </dl>
    <?php endif ?>
    <?php if ($page->designer()->isNotEmpty()): ?>
      <dl>
        <dt><h5 class="color-grey">Designer</h5></dt>
        <dd><h6><?= $page->designer() ?></h6></dd>
      </dl>
    <?php endif ?>
    <dl class="margin-l">
      <dt><h5 class="color-grey">Styles</h5></dt>
      <dd><h6><?php echo $count; ?></h6></dd>
    </dl>
    <?php if ($page->shopify()->isNotEmpty() || $page->futurefonts()->isNotEmpty()): ?>
      <div class="grid-locked margin-l" style="--gutter: 1vw;">
        <a class="block text-center" href="#trial-fonts" style="max-width:140px;">
          <div class="margin-s">  
            <?= svg('assets/icons/trialfonts.svg') ?>
          </div>
          <div class="bg-blue rounded-corners-full padding-xxs">
            <h6 class="no-mb">TrialFonts.otf</h6>
          </div>
        </a>
        <?php if ($specimen = $page->specimen()->filelink()->toFile()): ?>
          <a class="block text-center" href="<?= $specimen->url() ?>" style="max-width:140px;" download="<?= $page->specimen()->itemtitle() ?>">
            <div class="margin-s">  
              <?= svg('assets/icons/specimen.svg') ?>
            </div>
            <div class="bg-blue rounded-corners-full padding-xxs">
              <h6 class="no-mb">Specimen.pdf</h6>
            </div>
          </a>
        <?php endif ?>
      </div>
    <?php endif ?>
  </div>
  <div class="column" style="--columns: 4">
    <div class="text">
      <?= $page->text() ?>
    </div>
    <?php if ($page->designinfo()->isNotEmpty()): ?>
      <div class="design-info">
        <a class="link" href="/<?= $page->designinfo() ?>">Read about <?= $page->title() ?>’s design process</a>
      </div>
    <?php endif ?>
  </div>
  <div class="column" style="--columns: 1">
  </div>
  <div class="column license-button" style="--columns: 3">
    <?php if ($page->shopify()->isNotEmpty()): ?>
      <div id="product-component-<?= $page->shopify() ?>" class="shopify-placeholder"></div>
      <a href="<?= $pages->find('About')->url() ?>#license" class="link">
        Trouble picking a license?
      </a>
    <?php endif ?>
    <?php if ($page->futurefonts()->isNotEmpty()): ?>
      <a href="<?= $page->futurefonts() ?>" class="block button">
        <h5 class="no-mb">
          License on Future Fonts
        </h5>
      </a>
    <?php endif ?>
  </div>
</header>
<article>
  <?php 
  // using the `toStructure()` method, we create a structure collection
  $items = $page->samples()->toStructure();
  //gathering features in a list
  $features = '"' . implode('","', $page->features()->toStructure()->pluck('feature')) . '"';
  
  $i = 0;
  // we can then loop through the entries and render the individual fields
  foreach ($items as $item):
    $i = $i + 1; 
    $demo = "demo" . $i;
  
    // Headline or text sample
    if (strlen($item->sample()) < 50) {
      $fontSize = 11.75;
      $lineHeight = 100;
      $class = "headline";
      $alignment = "center";
      $letterSpacing = "0em";
    } else {
      $fontSize = 1.75;
      $lineHeight = 135;
      $class = "text";
      $alignment = "left";
      $letterSpacing = "0.02em";
    }
    ?>
    <div id="<?= $demo ?>" class="<?= $class ?>"><?= $item->sample() ?></div>
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
                unit: "vw",
                init: "<?= $fontSize ?>",
                min: .5,
                max: 20,
                step: .25,
                // The text label to render for the element, set to false to disabled 
                // rendering a label
                label: "Size"
            },
            // The line-height slider
            lineheight: {
                unit: "%",
                init: "<?= $lineHeight ?>",
                min: 90,
                max: 160,
                step: 5,
                label: "Leading"
            },
            // The letter-spacing slider
            letterspacing: {
                unit: "em",
                init: "<?= $letterSpacing ?>",
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
                init: "<?= $item->font() ?>"
            },
            // The set of buttons controlling alignment
            alignment: {
                // Choices can an Array of strings used both as value and display label
                // or the strings are separated by | to use as value|Display label
                choices: ["left|L", "center|C", "right|R"],
                // Has to be one of the above choices
                init: "<?= $alignment ?>",
                label: ""
            },
            // A set of checkboxes; NOTE: No validation whatsoever if the font
            // supports these opentype features
            opentype: {
                choices: ["liga|Ligatures"],
                init: ["liga"],
                label: "Features",
                class: "dropdown",
            }
          }
        }
      if (<?= $features ?>.length > 1) {
        // A set of checkboxes; NOTE: No validation whatsoever if the font
        // supports these opentype features
        options.ui.opentype =  {
                choices: [<?= $features ?>],
                init: ["liga"],
                label: "Features",
            } 
        }    
      var <?= $demo ?> = new Fontsampler(document.getElementById("<?= $demo ?>"), fonts, options)
      FontsamplerSkin(<?= $demo ?>)
      <?= $demo ?>.init()
      </script>
    <?php endforeach ?>
    <?php if ($page->features()->isNotEmpty()): ?>
    <aside class="bt-blue bg-blue-gradient features">
      <div class="padding">
        <h2 id="features">Opentype features</h2>
        <div class="grid" style="--gutter:1vw;">
        <?php 
          // using the `toStructure()` method, we create a structure collection
          $items = $page->features()->toStructure();
          // we can then loop through the entries and render the individual fields
          foreach ($items as $item): ?>
            <div class="column margin-m" style="--columns:4;">
              <div class="grid-locked margin-s" style="--gutter:1vw;--columns:12; align-items: center;">
                <input class="tgl tgl-light" id="toggle-'<?= $item->feature() ?>'" onchange="featureOn(this, '<?= $item->feature() ?>');" type="checkbox" checked/>
                <label class="tgl-btn" for="toggle-'<?= $item->feature() ?>'"></label>
                <h5 class="color-grey no-mb"><?= $item->feature() ?></h5>
                <h6 class="color-grey column no-mb" style="--columns:10;"><?= $item->description() ?></h6>
              </div>
              <div class="margin-s">
                <h1 class="no-mb" contenteditable style="font-weight: inherit; font-family:'<?= $item->font() ?>'; max-width: 100%; font-feature-settings: 'clig' 0, 'liga' 0;">
                <span id="<?= $item->feature() ?>-sample" style="font-feature-settings: '<?= $item->feature() ?>' 1; "><?= $item->sample() ?></span>
                </h1>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </aside>
    <?php endif ?>
    <?php if ($page->glyphs()->isNotEmpty()): ?>
    <aside class="bt-blue bg-blue-gradient glyphs">
      <div class="padding">
        <h2>Glyphs</h2>
        <div class="preview-glyphs flex">
          <div id="enlarged-character-container" class="preview">
            <h5 id="enlarged-character-name" class="name inline-block bg-blue color-grey rounded-corners-full padding-xxs">A</h5>
            <h5 id="enlarged-unicode-point" class="unicode inline-block bg-blue color-grey rounded-corners-full padding-xxs">U+0041</h5>
            <div id="enlarged-character" class="letter" style="font-family:'<?= $item->font() ?>';">A</div>
          </div>
          <div id="glyphs" class="grid glyphs-grid margin-s flex-grow" style="font-family:'<?= $item->font() ?>';"></div>
          <!-- Include OpenType.js library -->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/opentype.js/0.6.5/opentype.min.js"></script>
          <script>
            // Initialize OpenType.js when the font is loaded
            opentype.load('../../assets/webfonts/<?= $page->slug() ?>/<?= $page->glyphs() ?>.woff', function (err, font) {
              if (err) {
                console.error('Error loading font:', err);
                return;
              }

              // Get the character set from the font
              var characterSet = getCharacterSet(font);

              // Create the grid elements
              var gridContainer = document.getElementById('glyphs');

              for (var i = 0; i < characterSet.length; i++) {
                var character = characterSet[i];
                var glyph = font.charToGlyph(character);

                // Create a grid item for each character
                var gridItem = document.createElement('div');
                gridItem.className = 'grid-item color-black';
                gridItem.style = '--aspect-ratio: 1 / 1';

                // Create a <span> element to wrap the character
                var characterSpan = document.createElement('span');
                characterSpan.textContent = character;

                // Append the <span> to the grid item
                gridItem.appendChild(characterSpan);

                // Store the glyph data in a data attribute
                gridItem.setAttribute('data-glyph', JSON.stringify(glyph));
                // Store the character name in a data attribute
                gridItem.setAttribute('data-character-name', glyph.name);
                // Store the Unicode point in a data attribute
                gridItem.setAttribute('data-unicode-point', glyph.unicode);

                gridContainer.appendChild(gridItem);
                    // Add click event listener to the grid item
                gridItem.addEventListener('click', function () {
                  var glyphData = JSON.parse(this.getAttribute('data-glyph'));
                  var character = String.fromCharCode(glyphData.unicode);
                  var characterName = this.getAttribute('data-character-name');
                  var unicodePoint = this.getAttribute('data-unicode-point');

                  showEnlargedCharacter(character, characterName, unicodePoint);
                });
              }
            });
          </script>
      </div>
    </aside>
    <?php endif ?>
    <?php if ($gallery->count() > 1): ?>
    <aside class="bt-blue bg-blue-gradient in-use">
      <div>
        <h2 id="in-use" class="padding no-mb"><?= $page->title() ?> in use</h2>
        <div class="gallery-container">
        <?php foreach ($gallery as $image): ?>
          <?php if ($image->link()->isNotEmpty()): ?>
            <a class="inline-block column margin-m" style="max-height: 100%;" href="<?= $image->link() ?>" target="_blank">
              <figure>
                <?= $image ?>
                <figcaption>
                <?= $image->caption() ?>
                </figcaption>
              </figure>
            </a>
          <?php endif ?>
        </a>
        <?php endforeach ?>
        </div>
      </div>
    </aside>
    <?php endif ?>
</article>
<?php snippet('footer') ?>