<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  This footer snippet is reused in all templates.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
  </main>

  <footer class="footer bt-white">
    <div class="grid bg-tan" style="--gutter: 2px">
      <div class="column desktop-only" style="--columns: 4">
        <?= svg('assets/icons/c-logo.svg') ?>
      </div>
      <div class="column" style="--columns: 5">
        <?php snippet('trials') ?>
      </div>
      <div class="column bg-yellow" style="--columns: 3; display: flex; flex-direction: column;">
        <ul style="flex-grow: 1;">
          <li><h4><a href="<?= $site->url() ?>">Typefaces</a></h4></li>
          <?php foreach ($site->children()->listed()->not("typefaces") as $example): ?>
          <li><h4><a href="<?= $example->url() ?>"><?= $example->title()->html() ?></a></h4></li>
          <?php endforeach ?>
          <li><h4><a href="<?= $site->find('Terms')->url() ?>">Terms</a></h4></li>
        </ul>
        <?php snippet('social') ?>
      </div>
    </div>
    <div class="column bt-white bg-black" style="--columns: 12">
      <h5 class="no-mb"><span class="color-white">©</span> <span class="color-soft-blue">2021</span> <span class="color-coral">Very</span> <span class="color-yellow">Cool</span> <span class="color-soft-blue">Studio</span></h5>
    </div>
  </footer>
  <?= js([
    'assets/js/index-min.js',
    '@auto'
  ]) ?>
  <?php if ($page->shopify()->isNotEmpty()): ?>
    <script type="text/javascript">
      ShopifyInit(<?= $page->shopify() ?>);
    </script>
  <?php else: ?>
    <script type="text/javascript">
      ShopifyInit();
    </script>
  <?php endif; ?>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-96409329-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-96409329-1');
  </script>

</body>
</html>
