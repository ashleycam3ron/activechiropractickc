<!DOCTYPE html>
<html lang="en-US">
<?php  if (eregi("MSIE", getenv( "HTTP_USER_AGENT" )) || eregi("Internet Explorer", getenv("HTTP_USER_AGENT" ))){ ?>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]>  <html class="no-js" <?php language_attributes(); ?>> <![endif]-->
<!-- the "no-js" class is for Modernizr. -->
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<?php } ?>
<?php if (is_search()) { ?><meta name="robots" content="noindex, nofollow" /><?php } ?>
<title>
<?php if (function_exists('is_tag') && is_tag()) {single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
  elseif (is_archive()) {wp_title(''); echo ' Archive - '; }
  elseif (is_search()) {echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
  elseif (!(is_404()) && (is_single()) || (is_page()) && !(is_home() || is_front_page())) { wp_title(''); echo ' - '; }
  elseif (is_404()) {echo 'Not Found - '; }
  if (is_home() || is_front_page()) {bloginfo('name'); }
  else {bloginfo('name'); }
  if ($paged>1) {echo ' - page '. $paged; }?>
</title>
    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
	<meta name="dcterms.title" content="<?php if (function_exists('is_tag') && is_tag()) {single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
	  elseif (is_archive()) {wp_title(''); echo ' Archive - '; }
	  elseif (is_search()) {echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
	  elseif (!(is_404()) && (is_single()) || (is_page())) {wp_title(''); echo ' | ';}
	  elseif (is_404()) {echo 'Not Found - ';}
	  if (is_home()) {bloginfo('name'); echo ' | '; bloginfo('description'); }
	  else {bloginfo('name'); }
	  if ($paged>1) {echo ' - page '. $paged; }?>">
    <meta property=og:image content="<?php bloginfo('stylesheet_directory'); ?>/images/thumb1.png"/>
    <link rel="image_src" href="<?php bloginfo('stylesheet_directory'); ?>/images/thumb1.png" />
	<meta name="author" content="Ashley N. Cameron">
    <meta name="msvalidate.01" content="C63D79317205566295A744B701FB078E" />
	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico">
	<link rel="apple-touch-icon" href="<?php //bloginfo('template_directory'); ?>/_/img/apple-touch-icon.png">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style1.css">
    <!--[if lt IE 9]><link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie.css"><![endif]-->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
    <meta name="google-site-verification" content="u52Ec91DF6zc8K-5EQay9EvM7wZzpXG4r2-90znZ-U4" />
</head>
<body <?php body_class(); ?>>
  <div id="top"></div>
  <div id="page-wrap">
    <header id="head">
      <div id="st"></div>
      <hgroup>
        <h1><a class="home" href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo1.png" alt="home" /></a></h1>
        <h2 class="description"><?php bloginfo('description'); ?></h2>
      </hgroup>
      <div id="hours">
        <h2>Hours</h2><ul><li>9AM - 1PM</li><li>3PM - 6PM</li><li>9AM - 1PM</li><li>3PM - 6PM</li><li>9AM - 1PM</li><li>3PM - 6PM</li><li>10AM - 1PM</li><li>3PM - 6PM</li><li>9AM - 11AM</li></ul><ul id="day"><li>mon</li><li><br></li><li>tue</li><li><br></li><li>wed</li><li><br></li><li>thur</li><li><br></li><li>fri</li></ul>
        <a id="map" href="/map">map + directions <img src="<?php bloginfo('stylesheet_directory'); ?>/images/map.png" alt="map"/></a>
      </div>
    <div id="sb"></div>
    </header>
    <div id="header">
        <form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
          <fieldset><input type="text" value="search" name="s" id="s" onblur="if (this.value == ''){this.value = 'search';}" onfocus="if (this.value == 'search'){this.value = '';}" /><input type="image" id="searchsubmit" alt="Search" src="<?php bloginfo('stylesheet_directory'); ?>/images/search.png" tabindex="2"/>
          </fieldset>
        </form>
        <ul id="social">
          <li><a id="contact" href="/contact"></a></li>
          <li><a id="rss" href="/feed" target="_blank"></a></li>
          <li><a id="linkedin" href="http://www.linkedin.com/in/drsteveanderson" target="_blank"></a></li>
          <li><a id="facebook" href="http://www.facebook.com/pages/Active-Chiropractic/204771594255" target="_blank"></a></li>
          <li><a id="twitter" href="http://twitter.com/drsteveanderson" target="_blank"></a></li>
          <li><a class="nofancybox" id="youtube" href="http://youtube.com/user/drsteveanderson" target="_blank"></a></li>
        </ul>
        <img id="dr" src="<?php bloginfo('stylesheet_directory'); ?>/images/dr.png" alt="Dr. Steve Anderson"/>
    <nav id="tabs"><h2>Primary Navigation</h2><?php wp_nav_menu( array('menu' => 'tabs' )); ?></nav>
    <nav id="main"><h2>Primary Navigation</h2><?php wp_nav_menu( array('menu' => 'main' )); ?></nav>
    </div>