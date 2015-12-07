<?php
   global $templateDirectory;
   $id = get_the_id();
   get_header();
?>
   <?php get_template_part( 'template-parts/hero' ); ?>

   <section class="content-section">
      <div class="container">
         <ul class="grid">
            <?php
               while ( have_posts() ) : the_post();
                  $projectName = get_the_title( $id );

                  // Get the featured image to display on the card
                  if ( has_post_thumbnail( $project_id ) ) {
                     $projectImage = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full' )[0];
                  }
            ?>
               <li class="grid__fourth"><a href="<?php echo get_the_permalink( $id ); ?>" class="work-card">
                  <figure>
                     <img src="<?php echo $projectImage; ?>" alt="<?php echo $projectName; ?>">
                     <figcaption class="work-card__rollover">
                        <div class="work-card__title">
                           <h3><?php echo $projectName; ?></h3>
                        </div>
                     </figcaption>
                  </figure>
               </a></li>
            <?php endwhile; ?>
         </ul>
         <?php echo do_shortcode( '[button link="/showcase/"]More Work[/button]' ); ?>
      </div>
   </section>

<?php get_footer(); ?>