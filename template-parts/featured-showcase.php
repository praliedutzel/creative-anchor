<?php
/*-----------------------------------------------------------------------------------*/
/* Display featured portfolio project
/*-----------------------------------------------------------------------------------*/

   $args = array(
      'posts_per_page' => 1,
      'orderby'        => 'date',
      'order'          => 'DESC',
      'post_type'      => 'ca_portfolio',
      'post_status'    => 'publish',
      'tax_query'      => array(
         array(
            'taxonomy' => 'ca_categories',
            'field'    => 'slug',
            'terms'    => 'featured'
         )
      )
   );
   $projects = get_posts( $args );

   for ( $i = 0; $i < count( $projects ); $i++ ) {
      $project_id = $projects[$i]->ID;
      $projectName = get_the_title( $project_id );
      $projectExcerpt = apply_filters( 'the_excerpt', get_post_field( 'post_excerpt', $project_id ) );

      // Get the featured image to display on the card
      if ( class_exists( 'MultiPostThumbnails' ) && MultiPostThumbnails::has_post_thumbnail( 'ca_portfolio', 'homepage-feature-image', $project_id ) ) {
         $projectImage = MultiPostThumbnails::get_post_thumbnail_url( 'ca_portfolio', 'homepage-feature-image', $project_id );
      }
   ?>
      <div class="grid__half">
         <h3 class="h2"><?php echo $projectName; ?></h3>
         <?php echo $projectExcerpt; ?>
         <?php echo do_shortcode( '[button link="'.get_the_permalink( $project_id ).'"]View Project[/button]' ); ?>
      </div>
      <div class="grid__half">
         <img src="<?php echo $projectImage; ?>" alt="<?php echo $projectName; ?>">
      </div>
<?php } ?>