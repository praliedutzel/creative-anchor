<?php
   global $templateDirectory;
   $id = get_the_id();
	get_header();
?>

   <?php while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'template-parts/hero' ); ?>

      <article class="content-section">
         <div class="container">
            <?php the_content(); ?>
         </div>
      </article>

   <?php endwhile; ?>

<?php get_footer(); ?>