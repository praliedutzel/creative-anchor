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
                  $articleName = get_the_title( $id );
                  $articleIcon = get_category_icons( $id );
                  $isExternalPost = get_field( 'external_post', $id );
            ?>
               <li class="grid__half flex">
                  <?php if ( $isExternalPost == 'yes' ) : ?>
                  <a href="<?php echo get_field( 'external_link', $id ); ?>" target="_blank" class="card">
                  <?php else : ?>
                  <a href="<?php echo get_the_permalink( $id ); ?>" class="card">
                  <?php endif; ?>
                     <div class="card__teaser">
                        <div class="icon-wrapper">
                           <svg class="icon">
                              <use xlink:href="<?php echo $templateDirectory; ?>/img/spritemap.svg#<?php echo $articleIcon; ?>"></use>
                           </svg>
                        </div>
                     </div>
                     <div class="card__content">
                        <h3 class="card__title"><?php echo $articleName; ?></h3>
                        <p class="desktop"><?php echo get_the_excerpt( $id ); ?></p>

                        <?php if ( $isExternalPost == 'yes' ) : ?>
                           <svg class="icon card__external-link">
                               <use xlink:href="<?php echo $templateDirectory; ?>/img/spritemap.svg#external-link"></use>
                           </svg>
                        <?php endif; ?>
                     </div>
                  </a>
               </li>
            <?php endwhile; ?>
         </ul>
         <?php echo do_shortcode( '[button link="/writings/"]More Articles[/button]' ); ?>
      </div>
   </section>

<?php get_footer(); ?>