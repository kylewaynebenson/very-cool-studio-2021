<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  In this snippet the svg() helper is a great way to embed SVG
  code directly in your HTML. Pass the path to your SVG
  file to load it.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<h2 class="margin-s"><a name="trial-fonts">Font Trials</a></h2>
<p class="margin-l">A zip folder chock full of trial fonts for the entire catalog is available after subscribing to our marketing newsletter. To help you make an informed licensing decision, our trial fonts have all opentype features, kerning, and character sets included. Happy trials!
</p>
<form action="//verycoolstudio.us4.list-manage.com/subscribe/post?u=edc2737100be661c0fc9e2c5e&amp;id=1e6678ac80" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
  <div class="autogrid margin-s" style="--gutter: var(--margin-s); align-items: end;">
    <div>
      <label for="mce-FNAME"><h5 class="margin-s">First Name</h5></label>
      <input type="text" name="FNAME" id="mce-FNAME">
    </div>
    <div>
      <label for="mce-LNAME"><h5 class="margin-s">Last Name</h5></label>
      <input type="text" name="LNAME" id="mce-LNAME">
    </div>
  </div>
	<div>
		<label for="mce-EMAIL"><h5 class="margin-s">Email Address</h5></label>
		<input class="margin-s" type="email" name="EMAIL" id="mce-EMAIL" title="The domain portion of the email address is invalid (the portion after the @)." pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$" required>
	</div>
  <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_f2d244c0df42a0431bd08ddea_aeaa9dd034" tabindex="-1" value=""></div>
  <div class="terms terms-and-conditions flex margin-m" style="align-items: center;">
    <input class="margin-s input-checkbox" type="checkbox" name="terms" id="terms" style="margin-right: 10px;">
    <label class="checkbox" for="terms"><h6 class="margin-s">I accept the trial <a href="/trial-terms" class="link" target="_blank">terms &amp; conditions</a></h6></label>
    <input class="margin-s" type="hidden" name="terms-field" value="1">
  </div>
  <div class="margin-s">
    <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button" href="<?php echo kirby()->urls()->assets() . '/VeryCool_TrialFonts.zip' ?>" download="Very Cool Trial Fonts">
  </div>
  <div id="mce-success-response" class="mc-status"></div>
</form>

<?php echo js('assets/js/mailchimp-min.js?v='.time().'') ?>