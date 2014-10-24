<?php get_header(); ?>
<div id="primary">
  <div id="content" role="main">
    <?php the_post(); ?>
    <?php the_post_thumbnail('large');?>
    <?php get_template_part( 'content', 'page' ); ?>
  </div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>