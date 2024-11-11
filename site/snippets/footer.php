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
      <div class="column bg-yellow" style="--columns: 4; display: flex; flex-direction: column;">
        <ul style="flex-grow: 1;">
          <li><h5 class="mb-md">Site</h5></li>
          <?php foreach ($site->children()->listed()->not("typefaces") as $example): ?>
          <li><h4><a href="<?= $example->url() ?>"><?= $example->title()->html() ?></a></h4></li>
          <?php endforeach ?>
        </ul>
        <ul>
          <li><h5 class="mb-md">Shop</h5></li>
          <li><h4><a href="<?= $site->url() ?>">Typefaces</a></h4></li>
          <li><h4><fontdue-cart-button label="Cart"></fontdue-cart-button></h4></li>
          <li name="login">
            <label class="h4" for="toggle-login">Login</label>
            <input type="checkbox" id="toggle-login" class="toggle-input">
            <div class="toggle-content">
              <fontdue-customer-login-form></fontdue-customer-login-form>
            </div>
          </li>
        </ul>
      </div>
      <div class="column" style="--columns: 8;">
        <?php snippet('trials') ?>
      </div>
    </div>
    <div class="flex bt-white bg-tan color-grey padding-sm gap-md">
      <h5 class="no-mb">©2025 Very Cool Studio</h5>
      <div class="flex gap-md">
        <h5 class="no-mb"><a href="<?= $site->find('Terms')->url() ?>">Commercial License Terms</a></h5>
        <h5 class="no-mb"><a href="<?= $site->find('trial-terms')->url() ?>">Trial Terms</a></h5>
      </div>
    </div>
  </footer>
  <?php echo js('assets/js/index-min.js?v='.time().'') ?>
  <?= js('@auto') ?>

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
