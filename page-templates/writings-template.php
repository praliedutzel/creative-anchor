<?php
/**
 * Template Name: Writings
 *
 */

   global $templateDirectory;
   $id = get_the_id();
   get_header();
?>

   <?php while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'template-parts/hero' ); ?>

      <section class="content-section">
         <div class="container">
            <?php the_content(); ?>
            <?php get_template_part( 'template-parts/cards', 'writings' ); ?>
            <?php //echo do_shortcode( '[button link="/writings/"]More Work[/button]' ); ?>
         </div>
      </section>

   <?php endwhile; ?>

<?php get_footer(); ?>