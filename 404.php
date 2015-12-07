<?php
   global $templateDirectory;
   $id = get_the_id();
	get_header();
?>

   <section class="hero">
      <div class="hero__content">
         <h1>Page Not Found</h1>
         <p class="hero__subtitle">This isn't the page you're looking for.</p>
      </div>
   </section>

<?php get_footer(); ?>