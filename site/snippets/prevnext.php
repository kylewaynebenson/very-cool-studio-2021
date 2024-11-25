<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  The prevnext snippet renders the nice "keep on reading"
  section below each article in the blog, to jump between
  articles. It reuses the article snippet to render a full
  excerpt of the article.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>

<nav class="blog-prevnext bg-white bt-tan">
  <div class="padding">
    <h5 class="color-grey">See also</h5>
    <div class="flex flex-wrap gap-xxs">
        <?php if ($page->intendedTemplate() == 'font'): ?>
            <?php 
            // Get current font's tags
            $currentTags = $page->tags()->split();
            
            // Find related fonts that share tags
            $related = $page->siblings(false)
                           ->filter(function($font) use ($currentTags) {
                                return count(array_intersect($font->tags()->split(), $currentTags)) > 0;
                            })
                           ->not($page)
                           ->shuffle()
                           ->limit(2);

            // If we found related fonts, show them
            if ($related->count() > 0):
                foreach($related as $font): ?>
                    <?php snippet('article', ['article' => $font, 'excerpt' => false]) ?>
                <?php endforeach;
            
            // Otherwise, fall back to prev/next logic
            else: ?>
                <?php if ($prev = $page->prevListed()): ?>
                    <?php snippet('article', ['article' => $prev, 'excerpt' => false]) ?>
                <?php else: ?>
                    <?php snippet('article', ['article' => $page->siblings(false)->last(), 'excerpt' => false]) ?>
                <?php endif ?>

                <?php if ($next = $page->nextListed()): ?>
                    <?php snippet('article', ['article' => $next, 'excerpt' => false]) ?>
                <?php endif ?>
            <?php endif ?>
            
        <?php else: ?>
            <?php if ($prev = $page->prevListed()): ?>
                <?php snippet('article', ['article' => $prev, 'excerpt' => false]) ?>
            <?php else: ?>
                <?php snippet('article', ['article' => $page->siblings(false)->last(), 'excerpt' => false]) ?>
            <?php endif ?>

            <?php if ($next = $page->nextListed()): ?>
                <?php snippet('article', ['article' => $next, 'excerpt' => false]) ?>
            <?php endif ?>
        <?php endif ?>
    </div>
  </div>
</nav>