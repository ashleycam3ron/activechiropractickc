<?php //wp_cycle(); ?>
<div id="sidebar">

  <h2><a class="cavi-lipo" href="http://activechiropractickc.com/2013/10/cavi-lipo-kansas-city/">Cavi-Lipo</a></h2>
  <h2><a class="massage" href="/blog">Coupon Promotion</a></h2>
  <?php if (!(is_page('special'))){ ?>
  	<h2><a class="coupon" href="/special">Coupon Promotion</a></h2>
  <?php } ?>
  <?php dynamic_sidebar('Sidebar Widgets'); ?>
</div>
