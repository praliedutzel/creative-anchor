<?php
/*-----------------------------------------------------------------------------------*/
/* Display pagination for blog articles
/*-----------------------------------------------------------------------------------*/

   $args = array(
      'posts_per_page' => -1,
      'orderby'        => 'date',
      'order'          => 'DESC',
      'post_type'      => 'post',
      'post_status'    => 'publish'
   );
   $articles = get_posts( $args );

   $postIDs = array();
   for ( $i = 0; $i < count( $articles ); $i++ ) {
      $postIDs[] = $articles[$i]->ID;
   }

   $current = array_search( $id, $postIDs );
   $prev = $postIDs[ $current - 1 ];
   $next = $postIDs[ $current + 1 ];

   if ( $current == 0 ) {
      $prev = $postIDs[ count( $postIDs ) - 1 ];
   } else {
      $prev = $postIDs[ $current - 1 ];
   }

   if ( $current == count( $postIDs ) - 1 ) {
      $next = $postIDs[ 0 ];
   } else{
      $next = $postIDs[ $current + 1 ];
   }
?>

<ul class="pagination grid container">
   <li class="grid__third"><a href="<?php echo get_the_permalink( $prev ); ?>" class="pagination__button">
      <span>Previous Article</span>
   </a></li>
   <li class="grid__third pagination__view-all"><a href="/writings/" class="pagination__button">
      <span>View All Articles</span>
   </a></li>
   <li class="grid__third"><a href="<?php echo get_the_permalink( $next ); ?>" class="pagination__button">
      <span>Next Article</span>
   </a></li>
</ul>