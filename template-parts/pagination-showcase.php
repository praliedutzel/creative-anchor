<?php
/*-----------------------------------------------------------------------------------*/
/* Display pagination for portfolio projets
/*-----------------------------------------------------------------------------------*/

   $args = array(
      'posts_per_page' => -1,
      'orderby'        => 'date',
      'order'          => 'DESC',
      'post_type'      => 'ca_portfolio',
      'post_status'    => 'publish'
   );
   $projects = get_posts( $args );

   $postIDs = array();
   for ( $i = 0; $i < count( $projects ); $i++ ) {
      $postIDs[] = $projects[$i]->ID;
   }

   $current = array_search( $id, $postIDs );

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
      <?php 
         // Get the featured image if it exists
         if ( has_post_thumbnail( $prev ) ) {
            echo '<img src="'.wp_get_attachment_image_src( get_post_thumbnail_id( $prev ), 'full' )[0].'">';
         }
      ?>
      <span>Previous Project</span>
   </a></li>
   <li class="grid__third pagination__view-all"><a href="/showcase/" class="pagination__button">
      <span>View All Work</span>
   </a></li>
   <li class="grid__third"><a href="<?php echo get_the_permalink( $next ); ?>" class="pagination__button">
      <?php 
         // Get the featured image if it exists
         if ( has_post_thumbnail( $next ) ) {
            echo '<img src="'.wp_get_attachment_image_src( get_post_thumbnail_id( $next ), 'full' )[0].'">';
         }
      ?>
      <span>Next Project</span>
   </a></li>
</ul>