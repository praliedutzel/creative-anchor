<?php
/**
 * Template Name: Homepage
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
                  <h3 class="mobile">Skill Set</h3>
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
      </article>

      <section class="content-section content-section--alternate">
         <div class="container">
            <div class="grid">
               <?php get_template_part( 'template-parts/featured', 'showcase' ); ?>
            </div>
         </div>
      </section>

      <section class="content-section">
         <div class="container">
            <h2>Showcase</h2>
            <p><?php echo get_field( 'showcase_text' ); ?></p>
            <?php get_template_part( 'template-parts/cards', 'showcase' ); ?>
            <?php echo do_shortcode( '[button link="/showcase/"]More Work[/button]' ); ?>
         </div>
      </section>

      <section class="content-section content-section--alternate">
         <div class="container">
            <div class="grid">
               <?php get_template_part( 'template-parts/featured', 'writings' ); ?>
            </div>
         </div>
      </section>

      <section class="content-section">
         <div class="container">
            <h2>Writings</h2>
            <p><?php echo get_field( 'writings_text' ); ?></p>
            <?php get_template_part( 'template-parts/cards', 'writings' ); ?>
            <?php echo do_shortcode( '[button link="/writings/"]More Articles[/button]' ); ?>
         </div>
      </section>

   <?php endwhile; ?>

<?php get_footer(); ?>