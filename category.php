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
            ?>
               <li class="grid__fourth"><a href="<?php echo get_the_permalink( $id ); ?>" class="card">
                  <div class="card__header">
                     <div class="icon-wrapper">
                        <svg class="icon">
                           <use xlink:href="<?php echo $templateDirectory; ?>/img/spritemap.svg#<?php echo $articleIcon; ?>"></use>
                        </svg>
                     </div>
                  </div>
                  <div class="card__title">
                     <h3><?php echo $articleName; ?></h3>
                  </div>
               </a></li>
            <?php endwhile; ?>
         </ul>
         <?php echo do_shortcode( '[button link="/writings/"]More Articles[/button]' ); ?>
      </div>
   </section>

<?php get_footer(); ?>