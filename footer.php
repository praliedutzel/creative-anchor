<?php global $templateDirectory; ?>

   </main>

   <footer class="footer">
      <div class="grid">
         <p class="footer__meta grid__half">Creative Anchor &copy; <?php echo the_date('Y'); ?> Pralie Dutzel. All rights reserved.
            <?php
               wp_nav_menu( array(
                  'theme_location' => 'footer',
                  'menu'           => 'Footer Links',
                  'container'      => '',
                  'items_wrap'     => '%3$s',
                  'depth'          => 0,
                  'walker'         => new ca_simple_walker_nav_menu(),
               ) );
            ?>
         </p>


         <?php
            wp_nav_menu( array(
               'theme_location' => 'social',
               'menu'           => 'Social Links',
               'container'      => '',
               'items_wrap'     => '<ul class="social-icons grid__half">%3$s</ul>',
               'depth'          => 0,
               'walker'         => new ca_social_walker_nav_menu(),
            ) );
         ?>
      </div>
   </footer>

   <?php wp_footer(); ?>

   <script>svg4everybody();</script>

</body>
</html>