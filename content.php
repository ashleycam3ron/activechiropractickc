
<article class="post" id="post-<?php the_ID(); ?>">
  <header class="entry-header">
    <h1 class="entry-title">
      <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
    </h1>
    <h4>Date posted: <?php the_date(); ?></h4>
  </header>
  <div class="entry-content">
   <?php the_post_thumbnail('large');?>
   <?php the_content(); ?>
  </div>
  <footer class="entry-meta">
    <?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
  </footer>
</article>
