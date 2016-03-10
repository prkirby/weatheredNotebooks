<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  STARTERKIT_preprocess_html($variables, $hook);
  STARTERKIT_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_html(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_page(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_node(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // Optionally, run node-type-specific preprocess functions, like
  // STARTERKIT_preprocess_node_page() or STARTERKIT_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
}
// */


/**
 * Implements theme_menu_link().
 *
 * This code adds an icon <I> tag for use with icon fonts when a menu item
 * contains a CSS class that starts with "icon-". You may add CSS classes to
 * your menu items through the Drupal admin UI with the menu_attributes contrib
 * module.
 *
 * Originally written by lacliniquemtl.
 * Refactored by jwilson3.
 * @see http://drupal.org/node/1689728
 */

 /**
  * Implements theme_link().
  *
  * This code adds an icon <i> tag for use with icon fonts when a menu item
  * contains a CSS class that starts with "fa-". You may add CSS classes to
  * your menu items through the Drupal admin UI with the menu_attributes contrib
  * module.
  *
  * Originally written by lacliniquemtl.
  * Refactored by jwilson3 > mroji28 > driesdelaey > O U T L A W.
  * @see http://drupal.org/node/1689728
  */

 function weathered_notebooks_link (array $variables) {
   $attributes = $variables['options']['attributes'];

   // If there is a CSS class on the link that starts with "fa-", create
   // additional HTML markup for the icon, and move that specific classname there.

   // Exclusion List for settings eg http://fontawesome.io/examples/
   $exclusion = array(
     'fa-lg','fa-2x','fa-3x','fa-4x','fa-5x',
     'fa-fw',
     'fa-ul', 'fa-li',
     'fa-border',
     'fa-spin',
     'fa-rotate-90', 'fa-rotate-180','fa-rotate-270','fa-flip-horizontal','fa-flip-vertical',
     'fa-stack', 'fa-stack-1x', 'fa-stack-2x',
     'fa-inverse'
   );

   if (isset($attributes['class'])) {
     foreach ($attributes['class'] as $key => $class) {
       if (substr($class, 0, 3) == 'fa-' && !in_array($class,$exclusion)) {

         // We're injecting custom HTML into the link text, so if the original
         // link text was not set to allow HTML (the usual case for menu items),
         // we MUST do our own filtering of the original text with check_plain(),
         // then specify that the link text has HTML content.
         if (!isset($variables['options']['html']) || empty($variables['options']['html'])) {
           $variables['text'] = check_plain($variables['text']);
           $variables['options']['html'] = TRUE;
         }

         // Add the default-FontAwesome-prefix so we don't need to add it manually in the menu attributes
         $class = 'fa ' . $class;

         // Create additional HTML markup for the link's icon element and wrap
         // the link text in a SPAN element, to easily turn it on or off via CSS.
         $variables['text'] = '<i class="' . $class . '"></i> <span>' . $variables['text'] . '</span>';

         // Finally, remove the icon class from link options, so it is not printed twice.
         unset($variables['options']['attributes']['class'][$key]);
       }
     }
   }

   return theme_link($variables);
 }

 function weathered_notebooks_commerce_cart_menu_link_title($vars) {

  $quantity = $vars['quantity'];
  if ($quantity > 0) {
    $title = format_plural($quantity, '(1)', '(@count)');
  } else {
    $title = 'My basket';
  }

  return $title;
}
?>
