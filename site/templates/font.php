<?php snippet('header') ?>

<header class="font_header--wrapper padding">
  <div class="font_header--info">
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
      <dd><h6><?= $page->styles() ?></h6></dd>
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
  <div class="font_header--overview">
    <div class="text">
      <?= $page->text() ?>
    </div>
    <?php if ($page->designinfo()->isNotEmpty()): ?>
      <div class="design-info">
        <a class="link" href="/<?= $page->designinfo() ?>">Read about <?= $page->title() ?>’s design process</a>
      </div>
    <?php endif ?>
  </div>
  <div class="font_header--license">
      <fontdue-buy-button 
        collection-slug="<?= $page->slug() ?>"
        collection-name="<?= $page->title() ?>"
        label="Buy <?= $page->title() ?>"
      ></fontdue-buy-button>
    <?php if ($page->futurefonts()->isNotEmpty()): ?>
      <a href="<?= $page->futurefonts() ?>" class="link">
          or buy on Future Fonts
      </a>
    <?php endif ?>
  </div>
</header>
<article>
    <fontdue-type-testers 
      collection-slug="<?= $page->slug() ?>"
      default-mode="local"
      autofit="true">
    </fontdue-type-testers>

    <?php if ($page->features()->isNotEmpty()): ?>
    <aside class="bt-blue bg-blue-gradient features">
      <div class="padding">
        <h2 id="features">Opentype features</h2>
        <div class="font_section--opentype-features-wrapper">
        <?php 
          // using the `toStructure()` method, we create a structure collection
          $items = $page->features()->toStructure();
          // we can then loop through the entries and render the individual fields
          foreach ($items as $item): ?>
            <div class="font_section--opentype-feature">
              <div class="flex align-center gap-s">
                <input class="tgl tgl-light" id="toggle-'<?= $item->feature() ?>'" onchange="featureOn(this, '<?= $item->feature() ?>');" type="checkbox" checked/>
                <label class="tgl-btn" for="toggle-'<?= $item->feature() ?>'"></label>
                <h5 class="color-grey no-mb"><?= $item->feature() ?></h5>
                <h6 class="color-grey column no-mb" style="--columns:10;"><?= $item->description() ?></h6>
              </div>
              
              <div contentEditable  class="h1 no-mb" style="font-family:'<?= $page->glyphs() ?>'; font-feature-settings: 'clig' 0, 'liga' 0; ">
                <span id="<?= $item->feature() ?>-sample" style="font-feature-settings: '<?= $item->feature() ?>' 1; ">
                  <?= $item->sample() ?>
                </span>
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
          <fontdue-character-viewer collection-slug="<?= $page->slug() ?>">
          </fontdue-character-viewer>
        </div>  
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
    <?php snippet('prevnext') ?>
</article>
<?php snippet('footer') ?>