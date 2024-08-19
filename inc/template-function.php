<?php


function techub_header_logo()
{
   $header_logo = get_theme_mod('header_logo', get_template_directory_uri() . '/assets/img/logo/logo.png');
   ?>
   <a href="<?php echo home_url('/'); ?>"><img src="<?php echo esc_url($header_logo); ?>"
         alt="<?php echo bloginfo(); ?>"></a>
   <?php
}
function techub_footer_copyright()
{
   $footer_copyright = get_theme_mod('footer_copyright', __('Full Copyright & Design By @ Theme pure – 2024', 'techub'));
   ?>
   <p class="tp-footer-copy-paragraph tp-footer-4-copy-paragraph"><?php echo techub_kses($footer_copyright); ?></p>
   <?php
}




// techub_header_social
function techub_header_social()
{
   $header_facebook_url = get_theme_mod('header_facebook_url', '#');
   $header_instagram_url = get_theme_mod('header_instagram_url', '#');
   $header_twitter_url = get_theme_mod('header_twitter_url', '#');
   $header_pinterest_url = get_theme_mod('header_pinterest_url', '#');
   ?>
   <?php if (!empty($header_facebook_url)): ?>
      <a href="<?php echo esc_url($header_facebook_url); ?>"><i class="fa-brands fa-facebook"></i></a>
   <?php endif; ?>
   <?php if (!empty($header_instagram_url)): ?>
      <a href="<?php echo esc_url($header_instagram_url); ?>"><i class="fa-brands fa-instagram"></i></a>
   <?php endif; ?>
   <?php if (!empty($header_twitter_url)): ?>
      <a href="<?php echo esc_url($header_twitter_url); ?>"><i class="fa-brands fa-twitter"></i></a>
   <?php endif; ?>
   <?php if (!empty($header_pinterest_url)): ?>
      <a href="<?php echo esc_url($header_pinterest_url); ?>"><i class="fa-brands fa-pinterest"></i></a>
   <?php endif; ?>

   <?php
}

// techub_menu
function techub_menu()
{
   wp_nav_menu(
      array(
         'theme_location' => 'main-menu',
         'menu_class' => '',
         'menu_id' => '',
         'container' => '',
         'fallback_cb' => 'Techub_Walker_Nav_Menu::fallback',
         'walker' => new Techub_Walker_Nav_Menu,
      )
   );
}




/**
 * Sanitize SVG markup for front-end display.
 *
 * @param  string $svg SVG markup to sanitize.
 * @return string 	  Sanitized markup.
 */
function techub_kses($allow_tags = '')
{
   $allowed_html = [
      'svg' => array(
         'class' => true,
         'aria-hidden' => true,
         'aria-labelledby' => true,
         'role' => true,
         'xmlns' => true,
         'width' => true,
         'height' => true,
         'viewbox' => true, // <= Must be lower case!
      ),
      'path' => array(
         'd' => true,
         'fill' => true,
         'stroke' => true,
         'stroke-width' => true,
         'stroke-linecap' => true,
         'stroke-linejoin' => true,
         'opacity' => true,
      ),
      'a' => [
         'class' => [],
         'href' => [],
         'title' => [],
         'target' => [],
         'rel' => [],
      ],
      'b' => [],
      'blockquote' => [
         'cite' => [],
      ],
      'cite' => [
         'title' => [],
      ],
      'code' => [],
      'del' => [
         'datetime' => [],
         'title' => [],
      ],
      'dd' => [],
      'div' => [
         'class' => [],
         'title' => [],
         'style' => [],
      ],
      'dl' => [],
      'dt' => [],
      'em' => [],
      'h1' => [],
      'h2' => [],
      'h3' => [],
      'h4' => [],
      'h5' => [],
      'h6' => [],
      'i' => [
         'class' => [],
      ],
      'img' => [
         'alt' => [],
         'class' => [],
         'height' => [],
         'src' => [],
         'width' => [],
      ],
      'li' => array(
         'class' => array(),
      ),
      'ol' => array(
         'class' => array(),
      ),
      'p' => array(
         'class' => array(),
      ),
      'q' => array(
         'cite' => array(),
         'title' => array(),
      ),
      'span' => array(
         'class' => array(),
         'title' => array(),
         'style' => array(),
      ),
      'iframe' => array(
         'width' => array(),
         'height' => array(),
         'scrolling' => array(),
         'frameborder' => array(),
         'allow' => array(),
         'src' => array(),
      ),
      'strike' => array(),
      'br' => array(),
      'strong' => array(),
   ];

   return wp_kses($allow_tags, $allowed_html);
}

// techub_navigation
function techub_navigation()
{
   $pages = paginate_links(array(
      'type' => 'array',
      'prev_text' => __('<i class="fa-solid fa-arrow-left-long"></i>', 'harry'),
      'next_text' => __('<i class="fa-solid fa-arrow-right-long"></i>', 'harry'),
   ));
   if ($pages) {
      echo '<div class="tp-postbox-pagination"><nav><ul>';
      foreach ($pages as $page) {
         echo "<li>$page</li>";
      }
      echo '</ul></nav></div>';
   }
}


/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 */
function techub_search_form($form)
{
   $form = ' <div class="sidebar__widget-theme-bg">
            <div class="sidebar__widget-content">
               <div class="sidebar__search">
                     <form role="search" method="get" action="' . home_url('/') . '">
                        <div class="sidebar__search-input-2">
                           <input type="text" value="' . get_search_query() . '" name="s" placeholder="Search here">
                           <button type="submit"><i class="far fa-search"></i></button>
                        </div>
                     </form>
               </div>
            </div>
         </div>';

   return $form;
}
add_filter('get_search_form', 'techub_search_form');




function techub_tags()
{

   $post_tags = get_the_tags();



   foreach ($post_tags as $post_tags) { ?>

      <a href="<?php echo get_tag_link($post_tags) ?>"><?php echo esc_html($post_tags->name); ?></a>

      <?php

   }

}




// Function for social Share 


function social_share()
{

   ?>

   <div class="tp-postbox-details-share text-lg-end">
      <span><?php esc_html__('Share:', 'techub') ?></span>

      <!-- Facebook Share -->
      <a href="https://www.facebook.com/sharer.php?u=<?php echo $post_url; ?>" target="_blank">
         <i class="fab fa-facebook-f"></i>
      </a>

      <!-- Instagram Share -->
      <a href="https://www.instagram.com/?url=<?php echo $post_url; ?>" target="_blank">
         <i class="fa-brands fa-instagram"></i>
      </a>

      <!-- Pinterest Share -->
      <a href="https://pinterest.com/pin/create/button/?url=<?php echo $post_url; ?>&description=<?php echo $post_title; ?>"
         target="_blank">
         <i class="fa-brands fa-pinterest-p"></i>
      </a>

      <!-- Twitter Share -->
      <a href="https://twitter.com/share?url=<?php echo $post_url; ?>&text=<?php echo $post_title; ?>" target="_blank">
         <i class="fab fa-twitter"></i>
      </a>
   </div>


   <?php
}