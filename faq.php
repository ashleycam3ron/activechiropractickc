<?php
/*
Template Name: FAQ
*/
?>
<?php get_header(); ?>
<div id="primary">
  <div id="content" role="main">
  <?php
//list terms in a given taxonomy using wp_list_categories  (also useful as a widget)
$orderby = 'name';
$show_count = 0; // 1 for yes, 0 for no
$pad_counts = 0; // 1 for yes, 0 for no
$hierarchical = 1; // 1 for yes, 0 for no
$taxonomy = 'genre';
$title = '';

$args = array(
  'orderby' => $orderby,
  'show_count' => $show_count,
  'pad_counts' => $pad_counts,
  'hierarchical' => $hierarchical,
  'taxonomy' => $taxonomy,
  'title_li' => $title
);
?>
<ul>
<?php
wp_list_categories($args);
?>
</ul>
  <?php query_posts( array('post_type' => 'faq', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => -1 ) );
		  while (have_posts()) : the_post(); ?>
    <article class="post" id="post-<?php the_ID(); ?>">
      <header class="entry-header">
        <h1 class="entry-title faq">
          <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
        </h1>
      </header>
      <div class="entry-content">
       <?php the_post_thumbnail('large');?>
       <?php //the_content(); ?>
      </div>
      <footer class="entry-meta">
        <?php //edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
      </footer>
    </article>
    <?php endwhile; ?>
	<?php wp_reset_query(); ?>
  </div>
</div>
<?php get_sidebar('FAQ'); ?>
<?php get_footer(); ?>