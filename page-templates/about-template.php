<?php
/**
 * Template Name: About
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
                  <?php
                     the_content();
                     wp_nav_menu( array(
                        'theme_location' => 'social',
                        'menu'           => 'Social Links',
                        'container'      => '',
                        'items_wrap'     => '<ul class="social-icons">%3$s</ul>',
                        'depth'          => 0,
                        'walker'         => new ca_social_walker_nav_menu(),
                     ) );
                  ?>
               </div>
               <div class="grid__half">
                  <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $project_id ), 'full' )[0]; ?>" alt="Pralie Dutzel">
               </div>
            </div>
         </div>
      </article>

      <section class="content-section content-section--alternate">
         <div class="container">
            <div class="grid">
               <div class="grid__half">
                  <?php echo apply_filters( 'the_content', get_field( 'workflow_content' ) ); ?>
               </div>
               <div class="grid__half">
                  <img src="<?php echo get_field( 'workflow_image' ); ?>">
               </div>
            </div>
         </div>
      </section>

      <section class="content-section">
         <div class="container">
            <div class="grid">
               <div class="grid__half">
                  <?php echo apply_filters( 'the_content', get_field( 'skillset_content' ) ); ?>
               </div>
               <div class="grid__half">
                  <?php
                     wp_nav_menu( array(
                        'theme_location' => 'skills',
                        'menu'           => 'Skillset',
                        'container'      => '',
                        'items_wrap'     => '<ul class="skillset-icons">%3$s</ul>',
                        'depth'          => 0,
                        'walker'         => new ca_skills_walker_nav_menu(),
                     ) );
                  ?>
               </div>
            </div>
         </div>
      </section>

   <?php endwhile; ?>

<?php get_footer(); ?>