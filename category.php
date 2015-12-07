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

                  $categories = get_the_category( $id );
                  foreach ($categories as $category) {
                     if ( $category->name != 'Featured' ) {
                        $articleIcon = $category->slug;
                        switch ( $category->name ) {
                           case 'Design & UX':
                              $articleIcon = 'web-design';
                              break;
                           case 'Front-End Development':
                              $articleIcon = 'front-end-dev';
                              break;
                           case 'Sass':
                              $articleIcon = 'sass';
                              break;
                           case 'Web Performance':
                              $articleIcon = 'ui-ux-design';
                              break;
                           case 'WordPress Development':
                              $articleIcon = 'wordpress';
                              break;
                           case 'Uncategorized':
                              $articleIcon = 'anchor';
                              break;
                           default:
                              $articleIcon = 'anchor';
                              break;
                        }
                     }
                  }
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