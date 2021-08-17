<?php

/**
 * Page models extend Kirby's default page object.
 *
 * In page models you can define methods that are then available
 * everywhere in Kirby where you call a page of the extended type.
 *
 * In this example, we define the cover method that either returns
 * an image selected in the cover field or the first image in the folder.
 *
 * You can see the method in use in the `home.php` and `photography.php` templates
 * and in the `site/blueprints/sections/albums.yml` image query
 *
 * More about merx orderpage models: https://merx.wagnerwagner.de/docs/getting-started/set-up#order-page-model
 */
class OrderPage extends OrderPageAbstract {};

