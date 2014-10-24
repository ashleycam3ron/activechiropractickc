<?php get_header(); ?>
<div id="primary">
  <div id="content" role="main">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<article class="post" id="post-<?php the_ID(); ?>">
		<div class="entry">
			<?php the_content(); ?>
			<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
		</div>
	</article>
    <?php endwhile; endif; ?>
  </div>
</div>
<?php get_sidebar(); ?>
    <ul id="circles">
      <li><a class="circle" id="spine" href="/spine-diagram"></a></li>
      <li><a class="circle" id="whatis" href="/what-is-chiropractic"></a></li>
      <li><a class="circle" id="tips" href="/tips"></a></li>
    </ul>
<?php get_footer(); ?>