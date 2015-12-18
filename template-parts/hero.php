<?php
/*-----------------------------------------------------------------------------------*/
/* Display hero images
/*-----------------------------------------------------------------------------------*/
?>
<section class="hero">
   <?php
      if ( is_front_page() ) {
         echo '<div class="hero__gradient"></div>';
      }

      $postType = get_post_type( $id );
      if ( class_exists( 'MultiPostThumbnails' ) && MultiPostThumbnails::has_post_thumbnail( $postType, 'hero-image', $id ) && ( !is_archive() ) ) :
         $hero = MultiPostThumbnails::get_post_thumbnail_url( $postType, 'hero-image', $id );

         if ( MultiPostThumbnails::has_post_thumbnail( $postType, 'mobile-hero-image', $id ) ) {
            $mobileHero = MultiPostThumbnails::get_post_thumbnail_url( $postType, 'mobile-hero-image', $id );
         }

         if ( MultiPostThumbnails::has_post_thumbnail( $postType, 'medium-hero-image', $id ) ) {
            $mediumHero = MultiPostThumbnails::get_post_thumbnail_url( $postType, 'medium-hero-image', $id );
         }
   ?>
      <picture>
         <source media="(min-width: 80em)" srcset="<?php echo $hero; ?>">
         <source media="(min-width: 64em)" srcset="<?php echo $mediumHero; ?>">
         <source media="(max-width: 64em)" srcset="<?php echo $mobileHero; ?>">
         <img src="<?php echo $mediumHero; ?>" alt="<?php the_title(); ?>" class="hero__media">
      </picture>
   <?php endif; ?>

   <div class="hero__content">
      <?php if ( is_front_page() ) : ?>
         <h1><?php bloginfo('name'); ?></h1>
         <p class="hero__subtitle"><?php bloginfo('description'); ?></p>
      <?php elseif ( is_archive() ) : ?>
         <h1><?php single_cat_title(); ?> Archives</h1>
      <?php else : ?>
         <h1><?php the_title(); ?></h1>
      <?php endif; ?>
   </div>
</section>