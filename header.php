<?php
   global $templateDirectory;
   $templateDirectory = get_template_directory_uri();
?>
<!DOCTYPE html <?php language_attributes(); ?>>
<html lang="en" class="no-js">
<head>
   <meta charset="<?php bloginfo( 'charset' ); ?>">
   <meta http-equiv="X-UA-Compatible" content="IE=egde">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php is_front_page() ? bloginfo('description') : wp_title(''); ?> | <?php bloginfo('name'); ?></title>

   <link rel="profile" href="http://gmpg.org/xfn/11">
   <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

   <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
   <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
   <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
   <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
   <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
   <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
   <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
   <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
   <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
   <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
   <link rel="icon" type="image/png" href="/favicon-194x194.png" sizes="194x194">
   <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
   <link rel="icon" type="image/png" href="/android-chrome-192x192.png" sizes="192x192">
   <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
   <link rel="manifest" href="/manifest.json">
   <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#6ddce5">
   <meta name="apple-mobile-web-app-title" content="Creative Anchor">
   <meta name="application-name" content="Creative Anchor">
   <meta name="msapplication-TileColor" content="#232429">
   <meta name="msapplication-TileImage" content="/mstile-144x144.png">
   <meta name="theme-color" content="#6ddce5">

   <!--[if IE]>
     <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
   <![endif]-->

   <?php wp_head(); ?>

   <?php
      if ( get_field( 'social_image' ) != '' ) {
         echo '<meta name="twitter:image" content="'.get_field( 'social_image' ).'" />';
      }
   ?>
</head>

<body <?php body_class(); ?>>

   <header class="header">
      <a href="<?php echo get_home_url(); ?>" class="header__logo">
         <svg class="icon">
             <use xlink:href="<?php echo $templateDirectory; ?>/img/spritemap.svg#anchor"></use>
         </svg>
         <span>Creative Anchor</span>
      </a>
      <button class="menu-button">
         <div class="menu-bar"></div>
         <div class="menu-bar"></div>
         <div class="menu-bar"></div>
         <span class="screen-reader">Menu</span>
      </button>
   </header>

   <nav class="main-menu">
      <?php
         wp_nav_menu( array(
            'theme_location' => is_page( 'patterns' ) ? 'patterns' : 'primary',
            'menu'           => is_page( 'patterns' ) ? 'Patterns' : 'Main Navigation',
            'container'      => '',
            'items_wrap'     => '%3$s',
            'depth'          => 0,
            'walker'         => new ca_simple_walker_nav_menu(),
         ) );
      ?>
   </nav>

   <main class="main-content">