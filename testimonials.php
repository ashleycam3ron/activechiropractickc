<?php
/*
Template Name: Testimonials
*/
?>
<?php get_header(); ?>
<div id="primary">
  <div id="content" role="main">
  <?php query_posts( array('post_type' => 'testimonials') );
		  while (have_posts()) : the_post(); ?>
        <article class="post" id="post-<?php the_ID(); ?>">
          <div class="entry-content">
          	<blockquote>
              <?php the_content(); ?>
            </blockquote>
          </div>
          <footer class="entry-meta">
            <?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
          </footer>
        </article>
    <?php endwhile; ?>
	<?php wp_reset_query(); ?>
  </div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>