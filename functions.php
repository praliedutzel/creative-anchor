<?php

// Define the version so we can easily replace it throughout the theme
define( 'ca_version', 1.0 );



/*-----------------------------------------------------------------------------------*/
/* Load jQuery from Google's CDN in the footer
/*-----------------------------------------------------------------------------------*/

function ca_init() {
   if ( !is_admin() ) {
      wp_deregister_script( 'jquery' );
      wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', false, '1.11.3', true );
      wp_enqueue_script( 'jquery' );
   }
}
add_action( 'init', 'ca_init' );



/*-----------------------------------------------------------------------------------*/
/* Remove emoji support
/*-----------------------------------------------------------------------------------*/

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );



/*-----------------------------------------------------------------------------------*/
/* Enable RSS feed support
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'automatic-feed-links' );



/*-----------------------------------------------------------------------------------*/
/* Enable thumbnail support
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'post-thumbnails' );


// Enable multiple thumbnail support
if ( class_exists( 'MultiPostThumbnails' ) ) {
   $postTypes = array( 'post', 'page', 'ca_portfolio' );

   foreach( $postTypes as $type ) {
      new MultiPostThumbnails(
         array (
            'label' => 'Hero Image',
            'id'    => 'hero-image',
            'post_type' => $type
         )
      );
      new MultiPostThumbnails(
         array (
            'label' => 'Mobile Hero Image',
            'id'    => 'mobile-hero-image',
            'post_type' => $type
         )
      );
      new MultiPostThumbnails(
         array (
            'label' => 'Medium Hero Image',
            'id'    => 'medium-hero-image',
            'post_type' => $type
         )
      );
   }

   new MultiPostThumbnails(
      array (
         'label' => 'Homepage Feature Image',
         'id'    => 'homepage-feature-image',
         'post_type' => 'ca_portfolio'
      )
   );
}



/*-----------------------------------------------------------------------------------*/
/* Register menus in WordPress
/*-----------------------------------------------------------------------------------*/

register_nav_menus( 
   array(
      'primary'   => __( 'Main Navigation', 'creative-anchor' ),
      'footer'    => __( 'Footer Links', 'creative-anchor' ),
      'social'    => __( 'Social Links', 'creative-anchor' ),
      'skills'    => __( 'Skillset', 'creative-anchor' ),
      'patterns'  => __( 'Patterns', 'creative-anchor' ),
   )
);


// Custom Walker to simplify the navigation output
class ca_simple_walker_nav_menu extends Walker_Nav_Menu {

   function start_lvl( &$output, $depth = 0, $args = array() ) {
      $output .= '';
   }

   function end_lvl( &$output, $depth = 0, $args = array() ) {
      $output .= '';
   }

   function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
      if ( in_array( 'current-menu-item', $object->classes ) || (is_singular( 'post' ) && $object->title == 'Writings' )  || (is_singular( 'ca_portfolio' ) && $object->title == 'Showcase' ) ) {
         $output .= '<a href="'.esc_attr( $object->url ).'" class="is-current">'.apply_filters( 'the_title', $object->title, $object->ID ).'</a>';
      } else {
         $output .= '<a href="'.esc_attr( $object->url ).'">'.apply_filters( 'the_title', $object->title, $object->ID ).'</a>';
      }
   }

   function end_el( &$output, $object, $depth = 0, $args = array() ) {
      $output .= '';
   }

}


// Custom Walker to display the social links
class ca_social_walker_nav_menu extends Walker_Nav_Menu {

   function start_lvl( &$output, $depth = 0, $args = array() ) {
      $output .= '';
   }

   function end_lvl( &$output, $depth = 0, $args = array() ) {
      $output .= '';
   }

   function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
      $output .= '<li><a href="'.esc_attr( $object->url ).'" target="_blank">
                  <svg class="icon">
                     <use xlink:href="'.get_template_directory_uri().'/img/spritemap.svg#'.strtolower( apply_filters( 'the_title', $object->title, $object->ID ) ).'"></use>
                  </svg>
                  <span class="screen-reader">'.apply_filters( 'the_title', $object->title, $object->ID ).'</span>
                  </a></li>';

   }

   function end_el( &$output, $object, $depth = 0, $args = array() ) {
      $output .= '';
   }

}


// Custom Walker to display the skillset icons
class ca_skills_walker_nav_menu extends Walker_Nav_Menu {

   function start_lvl( &$output, $depth = 0, $args = array() ) {
      $output .= '<ul class="skillset-icons">';
   }

   function end_lvl( &$output, $depth = 0, $args = array() ) {
      $output .= '</ul>';
   }

   function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
      $output .= '<li><div class="icon-wrapper">
                  <svg class="icon">
                     <use xlink:href="'.get_template_directory_uri().'/img/spritemap.svg'.esc_attr( $object->url ).'"></use>
                  </svg></div>
                  <span class="icon-caption">'.apply_filters( 'the_title', $object->title, $object->ID ).'</span>
                  </li>';

   }

   function end_el( &$output, $object, $depth = 0, $args = array() ) {
      $output .= '';
   }

}



/*-----------------------------------------------------------------------------------*/
/* Create shortcodes for easier content control
/*-----------------------------------------------------------------------------------*/

// Wraps the content in a container
function ca_container( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'size' => '',
   ), $atts ));

   if ( $size != '' ) {
      return '<div class="container container--'.$size.'">'.do_shortcode( $content ).'</div>';
   } else {
      return '<div class="container">'.do_shortcode( $content ).'</div>';
   }
}
add_shortcode( 'container', 'ca_container' );


// Wraps the content in a grid
function ca_grid( $atts, $content = null ) {
   return '<div class="grid">'.do_shortcode( $content ).'</div>';
}
add_shortcode( 'grid', 'ca_grid' );


// Displays a button in place of a standard link
function ca_button( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'link'   => '',
      'target' => '',
   ), $atts ));

   if ( $target != '' ) {
      return '<a href="'.$link.'" target="_'.$target.'" class="button"><span></span><span>'.do_shortcode( $content ).'</span><span></span></a>';
   } else {
      return '<a href="'.$link.'" class="button"><span></span><span>'.do_shortcode( $content ).'</span><span></span></a>';
   }
}
add_shortcode( 'button', 'ca_button' );


// Customizes the image caption shortcode
function ca_img_caption_shortcode( $empty, $attr, $content ){
   $attr = shortcode_atts( array(
      'id'      => '',
      'align'   => 'alignnone',
      'width'   => '',
      'caption' => ''
   ), $attr );

   if ( $attr['width'] != '' ) {
      return '<figure class="content-media grid__'.esc_attr( $attr['width'] ).'">'.do_shortcode( $content ).'<figcaption class="content-media__caption">'.$attr['caption'].'</figcaption>'.'</figure>';
   } else {
      return '<figure class="content-media">'.do_shortcode( $content ).'<figcaption class="content-media__caption">'.$attr['caption'].'</figcaption>'.'</figure>';
   }
}
add_filter( 'img_caption_shortcode', 'ca_img_caption_shortcode', 10, 3 );



/*-----------------------------------------------------------------------------------*/
/* Set the icons for each article category
/*-----------------------------------------------------------------------------------*/

function get_category_icons( $article_id ) {
   $categories = get_the_category( $article_id );
   foreach ($categories as $category) {
      if ( $category->name != 'Featured' ) {
         $articleIcon = $category->slug;
         switch ( $category->name ) {
            case 'Design & UX':
               $articleIcon = 'web-design';
               break;
            case 'Design Considerations':
               $articleIcon = 'web-design';
               break;
            case 'Front-End Development':
               $articleIcon = 'front-end-dev';
               break;
            case 'Sass':
               $articleIcon = 'sass';
               break;
            case 'Web Performance':
               $articleIcon = 'ui-ux-design';
               break;
            case 'WordPress Development':
               $articleIcon = 'wordpress';
               break;
            case 'Email Development':
               $articleIcon = 'email';
               break;
            case 'Uncategorized':
               $articleIcon = 'anchor';
               break;
            default:
               $articleIcon = 'anchor';
               break;
         }
      }
   }
   return $articleIcon;
}



/*-----------------------------------------------------------------------------------*/
/* Enqueue styles and scripts
/*-----------------------------------------------------------------------------------*/

function ca_scripts()  { 

   wp_enqueue_style( 'styles', get_stylesheet_directory_uri().'/css/global.css' );
   wp_enqueue_style( 'fonts', '//fonts.googleapis.com/css?family=Open+Sans:300|Lato:400,300' );
   if ( is_page('Pattern Library') ) {
      wp_enqueue_style( 'patterns', get_stylesheet_directory_uri().'/css/patterns.css' );
   }

   wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.min.js', array(), ca_version, true );
   wp_enqueue_script( 'svg', get_template_directory_uri() . '/js/svg4everybody.min.js', array(), ca_version, true );
   wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/script-min.js', array(), ca_version, true );

}
add_action( 'wp_enqueue_scripts', 'ca_scripts' );
