<?php
/**
 * Template Name: Contact
 *
 */

   global $templateDirectory;
   $id = get_the_id();
   get_header();
?>

   <?php while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'template-parts/hero' ); ?>

      <article class="content-section">
         <div class="container">
            <div class="grid">
               <div class="grid__half">
                  <?php the_content(); ?>
               </div>
               <div class="grid__half">
                  <?php
                     if ( function_exists( 'ninja_forms_display_form' ) ) { ninja_forms_display_form( 1 ); }
                  ?>
               </div>
            </div>
         </div>
      </article>

   <?php endwhile; ?>

<?php get_footer(); ?>