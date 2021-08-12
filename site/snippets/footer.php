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

  <footer class="footer">
    <div class="grid">
      <div class="column bg-tan" style="--columns: 4">
        <?= svg('assets/icons/c-logo.svg') ?>
      </div>
      <div class="column bg-tan" style="--columns: 5">
        <?php snippet('trials') ?>
      </div>
      <div class="column bg-yellow " style="--columns: 3; display: flex; flex-direction: column;">
        <ul style="flex-grow: 1;">
          <?php foreach ($site->children()->listed() as $example): ?>
          <li><h4><a href="<?= $example->url() ?>"><?= $example->title()->html() ?></a></h4></li>
          <?php endforeach ?>
        </ul>
        <?php snippet('social') ?>
      </div>
    </div>
    <div class="column bt-white bg-blue" style="--columns: 12">
      <h5>© 2021 Very Cool Studio</h5>
    </div>
  </footer>

  <?= js([
    'assets/js/prism.js',
    'assets/js/lightbox.js',
    'assets/js/index.js',
    '@auto'
  ]) ?>

</body>
</html>
