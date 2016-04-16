<?php
/**
 * Template Name: Patterns
 *
 */

   global $templateDirectory;
   $id = get_the_id();
   get_header();
?>

   <?php while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'template-parts/hero' ); ?>

      <article class="content-section patterns">
         <div class="container container--small">
            <?php the_content(); ?>

            <h2 id="typography">Typography</h2>
            <?php echo apply_filters( 'the_content', get_field( 'typography' ) ); ?>

            <p class="h1">Heading 1</p>
            <p class="h2">Heading 2</p>
            <p class="h3">Heading 3</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim <a href="javascript:void(0)">veniam</a>, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

            <h2 id="colors">Color Palette</h2>
            <?php echo apply_filters( 'the_content', get_field( 'color_palette' ) ); ?>
         </div>

         <div class="container container--small">
            <ul class="grid">
               <li class="grid__fourth center-text">
                  <div class="color-swatch color-swatch--cyan"></div>
                  <p class="color-identity">$cyan<br>#6ddce5</p>
               </li>
               <li class="grid__fourth center-text">
                  <div class="color-swatch color-swatch--red"></div>
                  <p class="color-identity">$red<br>#f26a6c</p>
               </li>
               <li class="grid__fourth center-text">
                  <div class="color-swatch color-swatch--dkgrey"></div>
                  <p class="color-identity">$dk-grey<br>#232429</p>
               </li>
               <li class="grid__fourth center-text">
                  <div class="color-swatch color-swatch--ltgrey"></div>
                  <p class="color-identity">$lt-grey<br>#f9f9f9</p>
               </li>
            </ul>
         </div>

         <div class="container container--small">
            <h2 id="icons">Icons</h2>
            <?php echo apply_filters( 'the_content', get_field( 'icons' ) ); ?>

            <h3>Skill Set &amp; Category Icons</h3>
            <?php
               wp_nav_menu( array(
                  'theme_location' => 'skills',
                  'menu'           => 'Skillset',
                  'container'      => '',
                  'items_wrap'     => '<ul class="skillset-icons">%3$s</ul>',
                  'depth'          => 0,
                  'walker'         => new ca_skills_walker_nav_menu(),
               ) );
            ?>

            <h3>Social Icons</h3>
            <?php
               wp_nav_menu( array(
                  'theme_location' => 'social',
                  'menu'           => 'Social Links',
                  'container'      => '',
                  'items_wrap'     => '<ul class="social-icons">%3$s</ul>',
                  'depth'          => 0,
                  'walker'         => new ca_social_walker_nav_menu(),
               ) );
            ?>

            <h2 id="buttons">Buttons</h2>
            <?php echo apply_filters( 'the_content', get_field( 'buttons' ) ); ?>

            <h3>Primary Buttons</h3>
            <?php echo apply_filters( 'the_content', get_field( 'primary_buttons' ) ); ?>
            <?php echo do_shortcode( '[button link="javascript:void(0)"]Link Button[/button]' ); ?>

            <h3>Pagination Buttons</h3>
            <?php echo apply_filters( 'the_content', get_field( 'pagination_buttons' ) ); ?>
         </div>

         <div class="container">
            <ul class="pagination grid container">
               <li class="grid__third"><a href="javascript:void(0)" class="pagination__button">
                  <span>Previous</span>
               </a></li>
               <li class="grid__third pagination__view-all"><a href="javascript:void(0)" class="pagination__button">
                  <span>View All</span>
               </a></li>
               <li class="grid__third"><a href="javascript:void(0)" class="pagination__button">
                  <span>Next</span>
               </a></li>
            </ul>
         </div>

         <div class="container container--small">
            <h2 id="forms">Forms</h2>
            <?php echo apply_filters( 'the_content', get_field( 'forms' ) ); ?>

            <form>
               <label for="input">Input Field</label>
               <input type="text" id="input">
               <label for="textarea">Textarea</label>
               <textarea id="textarea"></textarea>
               <input type="submit" value="Submit">
            </form>

            <h2 id="cards">Cards</h2>
            <?php echo apply_filters( 'the_content', get_field( 'cards' ) ); ?>

            <h3>Project Cards</h3>
            <?php echo apply_filters( 'the_content', get_field( 'project_cards' ) ); ?>
         </div>

         <div class="container">
            <ul class="grid">
               <li class="grid__fourth"><a href="javascript:void(0)" class="work-card">
                  <figure>
                     <img src="<?php echo $templateDirectory; ?>/img/card-placeholder.jpg" alt="">
                     <figcaption class="work-card__rollover">
                        <div class="work-card__title">
                           <h3>Lorem Ipsum Dolor</h3>
                        </div>
                     </figcaption>
                  </figure>
               </a></li>
               <li class="grid__fourth"><a href="javascript:void(0)" class="work-card">
                  <figure>
                     <img src="<?php echo $templateDirectory; ?>/img/card-placeholder.jpg" alt="">
                     <figcaption class="work-card__rollover">
                        <div class="work-card__title">
                           <h3>Lorem Ipsum Dolor</h3>
                        </div>
                     </figcaption>
                  </figure>
               </a></li>
               <li class="grid__fourth"><a href="javascript:void(0)" class="work-card">
                  <figure>
                     <img src="<?php echo $templateDirectory; ?>/img/card-placeholder.jpg" alt="">
                     <figcaption class="work-card__rollover">
                        <div class="work-card__title">
                           <h3>Lorem Ipsum Dolor</h3>
                        </div>
                     </figcaption>
                  </figure>
               </a></li>
               <li class="grid__fourth"><a href="javascript:void(0)" class="work-card">
                  <figure>
                     <img src="<?php echo $templateDirectory; ?>/img/card-placeholder.jpg" alt="">
                     <figcaption class="work-card__rollover">
                        <div class="work-card__title">
                           <h3>Lorem Ipsum Dolor</h3>
                        </div>
                     </figcaption>
                  </figure>
               </a></li>
            </ul>
         </div>

         <div class="container container--small">
            <h3>Article Cards</h3>
            <?php echo apply_filters( 'the_content', get_field( 'article_cards' ) ); ?>
         </div>

         <div class="container">
            <ul class="grid">
               <li class="grid__half card">
                  <a href="javascript:void(0)" class="card__teaser">
                     <div class="icon-wrapper">
                        <svg class="icon">
                           <use xlink:href="<?php echo $templateDirectory; ?>/img/spritemap.svg#sass"></use>
                        </svg>
                     </div>
                  </a>
                  <div class="card__content">
                     <h3 class="card__title"><a href="javascript:void(0)">Lorem Ipsum</a></h3>
                     <p class="desktop">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  </div>
               </a></li>
               <li class="grid__half card">
                  <a href="javascript:void(0)" class="card__teaser">
                     <div class="icon-wrapper">
                        <svg class="icon">
                           <use xlink:href="<?php echo $templateDirectory; ?>/img/spritemap.svg#sass"></use>
                        </svg>
                     </div>
                  </a>
                  <div class="card__content">
                     <h3 class="card__title"><a href="javascript:void(0)">Lorem Ipsum</a></h3>
                     <p class="desktop">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  </div>
               </a></li>
            </ul>
         </div>

         <div class="container container--small">
            <h2 id="layout">Layout</h2>
            <?php echo apply_filters( 'the_content', get_field( 'layout' ) ); ?>

            <h3>Grid System</h3>
            <?php echo apply_filters( 'the_content', get_field( 'grid_system' ) ); ?>
         </div>

         <div class="container container--small grid-example">
            <div>Single Column</div>
         </div>

         <div class="container">
            <div class="grid grid-example">
               <div class="grid__half">Two Column</div>
               <div class="grid__half">Two Column</div>
               <div class="grid__fourth">Four Column</div>
               <div class="grid__fourth">Four Column</div>
               <div class="grid__fourth">Four Column</div>
               <div class="grid__fourth">Four Column</div>
            </div>
         </div>            

         <div class="container container--small">
            <h3>Header &amp; Navigation</h3>
            <?php echo apply_filters( 'the_content', get_field( 'header_navigation' ) ); ?>
            
            <h3>Footer</h3>
            <?php echo apply_filters( 'the_content', get_field( 'footer' ) ); ?>
            
            <h3>Hero Area</h3>
            <?php echo apply_filters( 'the_content', get_field( 'hero_area' ) ); ?>
         </div>
      </article>

   <?php endwhile; ?>

<?php get_footer(); ?>