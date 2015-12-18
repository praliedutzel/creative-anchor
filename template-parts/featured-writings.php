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
      $articleIcon = get_category_icons( $article_id );
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