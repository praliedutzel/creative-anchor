<?php
   global $templateDirectory;
   $id = get_the_id();

   $categories = get_the_category();
   foreach ($categories as $category) {
      $catName = $category->name;
      $catLink = $category->slug;
   }

   get_header();
?>

   <?php while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'template-parts/hero' ); ?>

      <article class="content-section">
         <?php the_content(); ?>
      </article>

      <section class="content-section article-meta">
         <div class="container container--small">
            <?php
               if ( is_singular( 'ca_portfolio' ) && ( get_field( 'project_disclaimer' ) != '' ) ) {
                  echo apply_filters( 'the_content', get_field( 'project_disclaimer' ) );
               } else if ( is_singular( 'post' ) ) {
                  echo '<p>If you have comments or questions, you can always reach me via <a href="https://twitter.com/praliedutzel" target="_blank">Twitter</a>. Thanks for reading!<br>Posted on '.get_the_date( 'F j, Y' ).' in <a href="'.get_home_url().'/category/'.$catLink.'">'.$catName.'</a>.</p>';
               }

               if ( get_field( 'footnotes' ) != '' ) {
                  echo apply_filters( 'the_content', get_field( 'footnotes' ) );
               }
            ?>
         </div>

         <?php
            if ( is_singular( 'ca_portfolio' ) ) {
               get_template_part( 'template-parts/pagination', 'showcase' );
            } else {
               get_template_part( 'template-parts/pagination', 'writings' );
            }
         ?>

      </section>

   <?php endwhile; ?>

<?php get_footer(); ?>