<?php 
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  This header snippet is reused in all templates.
  It fetches information from the `site.txt` content file
  and contains the site navigation.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title><?= $site->title() ?> | <?= $page->title() ?></title>
  <meta name="description" content="Very Cool is a type foundry run by Kyle Benson in Oakland, California."/>
  <meta property="og:title" content="<?= $site->title() . ' | ' . $page->title() ?>">
  <?php
  $graphimage = $page->opengraphimage()->toFile()->url();
  if ($graphimage) {
  ?>
    <meta property="og:image" content="<?= $graphimage ?>">
    <meta name="twitter:image" content="<?= $graphimage ?>"/>
    <meta property="og:image:alt" content="<?php echo kirby()->urls()->assets() . '/images/share-image.png' ?>">
  <?php } else { ?>
    <meta property="og:image" content="<?php echo kirby()->urls()->assets() . '/images/share-image.png' ?>">
    <meta name="twitter:image" content="<?php echo kirby()->urls()->assets() . '/images/share-image.png' ?>"/>
  <?php } ?>
  <meta name="twitter:site" content="@verycoolstudio" />
  <meta name="twitter:title" content="<?= $site->title() . ' | ' . $page->title() ?>" />
  <meta name="twitter:description" content="Very Cool is a type foundry run by Kyle Benson in Oakland, California." />
  <meta name="twitter:card" content="summary_large_image" />
  <style>
    [data-theme="light"] {
      --color-black: #000;
      --color-bg-black: #000;
      --color-white: #fff;
      --color-grey: #7C8DA6;
      --color-yellow: #FFD138;
      --color-coral: #FF7B52;
      --color-soft-blue: #D7E7FF;
      --color-soft-blue-solid: #D7E7FFFF;
      --color-soft-blue-clear: #D7E7FF00;
      --color-tan: #F9F4F2;
    }
    [data-theme="dark"] {
      --color-black: #ffffff;
      --color-bg-black: #2b2b2b;
      --color-white: #000000;
      --color-grey: #999491;
      --color-coral: #2b2b2b;
      --color-soft-blue: #2b2b2b;
      --color-soft-blue-solid: #2b2b2bFF;
      --color-soft-blue-clear: #2b2b2b00;
      --color-yellow: #000000;
      --color-tan: #2b2b2b;
    }
    html {
      color: var(--color-black);
      background: var(--color-white);
    }
  </style>
<?php echo css('assets/css/index-min.css?v='.time().'') ?>
<?= css('@auto') ?>
  
  <style>
@font-face {
  font-family: 'VC Cardinal';
  font-weight: 600;
  src: url("<?= kirby()->urls()->assets() . '/webfonts/cardinal/VCCardinal-SemiBold.woff2' ?>") format("woff2"), url("<?= kirby()->urls()->assets() . '/webfonts/cardinal/VCCardinal-SemiBold.woff' ?>") format("woff"); 
}
@font-face {
  font-family: 'VC Cornbread';
  font-style: normal;
  font-weight: 400;
  src: url("<?= kirby()->urls()->assets() . '/webfonts/cornbread/VCCornbread-Regular.woff2' ?>") format("woff2"), url("<?= kirby()->urls()->assets() . '/webfonts/cornbread/VCCornbread-Regular.woff' ?>") format("woff");
}
@font-face {
  font-family: 'VC Cornbread';
  font-style: normal;
  font-weight: 600;
  src: url("<?= kirby()->urls()->assets() . '/webfonts/cornbread/VCCornbread-SemiBold.woff2' ?>") format("woff2"), url("<?= kirby()->urls()->assets() . '/webfonts/cornbread/VCCornbread-SemiBold.woff' ?>") format("woff");
}
@font-face {
  font-family: 'VC Cardinal Wide';
  font-weight: 600;
  src: url("<?= kirby()->urls()->assets() . '/webfonts/cardinal/VCCardinalWide-SemiBold.woff2' ?>") format("woff2"), url("<?= kirby()->urls()->assets() . '/webfonts/cardinal/VCCardinalWide-SemiBold.woff' ?>") format("woff"); 
}
@font-face {
  font-family: 'VC Gooper Text';
  font-style: normal;
  font-weight: 700;
  src: url("<?= kirby()->urls()->assets() . '/webfonts/gooper/VCGooperText-Bold.woff2' ?>") format("woff2"), url("<?= kirby()->urls()->assets() . '/webfonts/gooper/VCGooperText-Bold.woff' ?>") format("woff"); }
</style>


<link rel="shortcut icon" type="image/x-icon" href="<?= kirby()->urls()->assets() .'/images/favicon.png' ?>">
</head>
<?php if ($page->parents()->count()): ?>
  <body class="page-<?= $page->uid(); ?> page-<?= $page->parent()->uid(); ?>">
<?php else: ?>
  <body class="page-<?= $page->uid(); ?>">
<?php endif; ?>

  <nav class="nav">
    <div class="logo">
      <a href="<?= $site->url() ?>">
        <div class="mobile-only">
          <?= svg('assets/icons/c-logo.svg') ?>
        </div>
        <div class="desktop-only">
          <?= svg('assets/icons/verycool.svg') ?>
        </div>
      </a>
    </div>
    <div class="menu">
      <?php
      /*
        In the menu, we only fetch listed pages,
        i.e. the pages that have a prepended number
        in their foldername.

        We do not want to display links to unlisted
        `error`, `home`, or `sandbox` pages.

        More about page status:
        https://getkirby.com/docs/reference/panel/blueprints/page#statuses
      */
      ?>
      <div class="link desktop-only">
          <?php if ($page->isHomePage()): ?>
            <a aria-current href="<?= $site->url() ?>">
          <?php else: ?>
            <a href="<?= $site->url() ?>">
          <?php endif ?>
            <h4 class="no-mb">
              Typefaces
            </h4>
          </a>
        </div>
      <?php foreach ($site->children()->listed()->not("typefaces") as $item): ?>
        <div class="link">
          <a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>">
            <h4 class="no-mb">
              <?= $item->title()->html() ?>
            </h4>
          </a>
        </div>
      <?php endforeach ?>
      <div id="shopify-cart-toggle" class="shopify-cart-toggle">
        <svg width="29" height="34" viewBox="0 0 29 34" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path class="fill-black" fill-rule="evenodd" clip-rule="evenodd" d="M14.5 0C10.3579 0 7 3.35786 7 7.5V10H5C2.23858 10 0 12.2386 0 15V29C0 31.7614 2.23858 34 5 34H24C26.7614 34 29 31.7614 29 29V15C29 12.2386 26.7614 10 24 10H22V7.5C22 3.35786 18.6421 0 14.5 0ZM20 12V15H22V12H24C25.6569 12 27 13.3431 27 15V29C27 30.6569 25.6569 32 24 32H5C3.34315 32 2 30.6569 2 29V15C2 13.3431 3.34315 12 5 12H7V15H9V12H20ZM20 10V7.5C20 4.46243 17.5376 2 14.5 2C11.4624 2 9 4.46243 9 7.5V10H20Z" fill="black"/>
        </svg>
      </div>
      <div class="theme-switch-wrapper">
          <label class="theme-switch" for="checkbox">
              <input type="checkbox" id="checkbox" />
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="fill-black" fill-rule="evenodd" clip-rule="evenodd" d="M10.3539 28.8148C12.0809 29.5769 13.991 30 16 30C23.732 30 30 23.732 30 16C30 10.472 26.796 5.69227 22.1438 3.41657C16.4383 5.27122 9.93788 9.82723 9.66432 12.789C9.5386 13.8654 10.9211 14.224 15.2773 14.1841C15.3647 14.1831 15.4526 14.1821 15.5409 14.181C18.9183 14.14 22.8108 14.0928 22.5658 16.6956C22.272 20.0508 16.8133 25.1973 10.3539 28.8148ZM0 16C0 7.16344 7.16344 0 16 0C24.8366 0 32 7.16344 32 16C32 24.8366 24.8366 32 16 32C7.16344 32 0 24.8366 0 16Z" fill="black"/>
              </svg>
        </label>
      </div>
    </div>
  </nav>
  <?= js([
    'assets/js/theme-min.js',
  ]) ?>
  <main class="main">
