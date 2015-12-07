<?php
/**
 * Template Name: Games
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
                  <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $project_id ), 'full' )[0]; ?>" alt="Pralie Dutzel participating in Ludum Dare 22">
               </div>
            </div>
         </div>
      </article>

      <section class="content-section content-section--alternate">
         <div class="container">
            <div class="grid">
               <div class="grid__half">
                  <?php echo apply_filters( 'the_content', get_field( 'delirium_content' ) ); ?>
               </div>
               <div class="grid__half">
                  <img src="<?php echo get_field( 'delirium_image' ); ?>" alt="Delirium XNA Game">
               </div>
            </div>
         </div>
      </section>

      <section class="content-section">
         <div class="container">
            <div class="grid">
               <div class="grid__half">
                  <?php echo apply_filters( 'the_content', get_field( 'rocket_solvers_content' ) ); ?>
               </div>
               <div class="grid__half">
                  <img src="<?php echo get_field( 'rocket_solvers_image' ); ?>" alt="Rocket Solvers iPad Game">
               </div>
            </div>
         </div>
      </section>

      <section class="content-section content-section--alternate">
         <div class="container">
            <div class="grid">
               <div class="grid__half">
                  <?php echo apply_filters( 'the_content', get_field( 'terraforming_content' ) ); ?>
               </div>
               <div class="grid__half">
                  <img src="<?php echo get_field( 'terraforming_image' ); ?>" alt="Terraforming Game">
               </div>
            </div>
         </div>
      </section>

      <section class="content-section">
         <div class="container">
            <div class="grid">
               <div class="grid__half">
                  <?php echo apply_filters( 'the_content', get_field( 'lonely_cupcake_content' ) ); ?>
               </div>
               <div class="grid__half">
                  <img src="<?php echo get_field( 'lonely_cupcake_image' ); ?>" alt="The Lonely Cupcake Game">
               </div>
            </div>
         </div>
      </section>

   <?php endwhile; ?>

<?php get_footer(); ?>