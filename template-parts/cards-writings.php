<?php
/*-----------------------------------------------------------------------------------*/
/* Display cards for blog articles
/*-----------------------------------------------------------------------------------*/
global $templateDirectory;
?>
   <ul class="grid">
      <?php
         $args = array(
            'posts_per_page' => is_front_page() ? 4 : 12,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'tax_query'      => array(
               array(
                  'taxonomy' => 'category',
                  'field'    => 'slug',
                  'terms'    => 'featured',
                  'operator' => is_front_page() ? 'NOT IN' : 'EXISTS'
               )
            )
         );
         $articles = get_posts( $args );

         for ( $i = 0; $i < count( $articles ); $i++ ) {
            $article_id = $articles[$i]->ID;
            $articleName = get_the_title( $article_id );
            $articleIcon = get_category_icons( $article_id );
      ?>
            <li class="grid__half card">
               <a href="<?php echo get_the_permalink( $article_id ); ?>" class="card__teaser">
                  <div class="icon-wrapper">
                     <svg class="icon">
                        <use xlink:href="<?php echo $templateDirectory; ?>/img/spritemap.svg#<?php echo $articleIcon; ?>"></use>
                     </svg>
                  </div>
               </a>
               <div class="card__content">
                  <h3 class="card__title"><a href="<?php echo get_the_permalink( $article_id ); ?>">
                     <?php echo $articleName; ?>
                  </a></h3>
                  <p class="desktop"><?php echo $articles[$i]->post_excerpt; ?></p>
               </div>
            </li>
      <?php } ?>
   </ul>