<?php
/*-----------------------------------------------------------------------------------*/
/* Display featured blog article
/*-----------------------------------------------------------------------------------*/
global $templateDirectory;

   $args = array(
      'posts_per_page' => 1,
      'orderby'        => 'date',
      'order'          => 'DESC',
      'post_type'      => 'post',
      'post_status'    => 'publish',
      'tax_query'      => array(
         array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => 'featured'
         )
      )
   );
   $articles = get_posts( $args );

   for ( $i = 0; $i < count( $articles ); $i++ ) {
      $article_id = $articles[$i]->ID;
      $articleName = get_the_title( $article_id );
      $articleExcerpt = apply_filters( 'the_excerpt', get_post_field( 'post_excerpt', $article_id ) );

      $categories = get_the_category( $article_id );
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
      <div class="grid__half">
         <h3 class="h2"><?php echo $articleName; ?></h3>
         <?php echo $articleExcerpt; ?>
         <?php echo do_shortcode( '[button link="'.get_the_permalink( $article_id ).'"]View Article[/button]' ); ?>
      </div>
      <div class="grid__half">
         <div class="icon-wrapper icon-wrapper--featured">
            <svg class="icon">
               <use xlink:href="<?php echo $templateDirectory; ?>/img/spritemap.svg#<?php echo $articleIcon; ?>"></use>
            </svg>
         </div>
      </div>
<?php } ?>