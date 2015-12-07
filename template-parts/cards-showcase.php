<?php
/*-----------------------------------------------------------------------------------*/
/* Display cards for portfolio projects
/*-----------------------------------------------------------------------------------*/
?>
   <ul class="grid">
   <?php
      $args = array(
         'posts_per_page' => is_front_page() ? 4 : 12,
         'orderby'        => 'date',
         'order'          => 'DESC',
         'post_type'      => 'ca_portfolio',
         'post_status'    => 'publish',
         'tax_query'      => array(
            array(
               'taxonomy' => 'ca_categories',
               'field'    => 'slug',
               'terms'    => 'featured',
               'operator' => is_front_page() ? 'NOT IN' : 'EXISTS'
            )
         )
      );
      $projects = get_posts( $args );

      for ( $i = 0; $i < count( $projects ); $i++ ) {
         $project_id = $projects[$i]->ID;
         $projectName = get_the_title( $project_id );

         // Get the featured image to display on the card
         if ( has_post_thumbnail( $project_id ) ) {
            $projectImage = wp_get_attachment_image_src( get_post_thumbnail_id( $project_id ), 'full' )[0];
         }
      ?>
         <li class="grid__fourth"><a href="<?php echo get_the_permalink( $project_id ); ?>" class="work-card">
            <figure>
               <img src="<?php echo $projectImage; ?>" alt="<?php echo $projectName; ?>">
               <figcaption class="work-card__rollover">
                  <div class="work-card__title">
                     <h3><?php echo $projectName; ?></h3>
                  </div>
               </figcaption>
            </figure>
         </a></li>
      <?php } ?>
   </ul>