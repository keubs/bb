<?php
/**
 * @file
 * The primary PHP file for this theme.
 */


/**
 * Implements hook_preprocess_field()
 */

function bloodbolts2_preprocess_field(&$vars) {
    /* Set shortcut variables. Hooray for less typing! */
    $name = $vars['element']['#field_name'];
    $bundle = $vars['element']['#bundle'];
    $mode = $vars['element']['#view_mode'];
    $classes = &$vars['classes_array'];
    $title_classes = &$vars['title_attributes_array']['class'];
    $content_classes = &$vars['content_attributes_array']['class'];
    $item_classes = array();
    
    /* Global field classes */
    $classes[] = 'field-wrapper';
    $title_classes[] = 'field-label';
    $content_classes[] = 'field-items';
    $item_classes[] = 'field-item';
    
    /* Uncomment the lines below to see variables you can use to target a field */
    // print '<strong>Name:</strong> ' . $name . '<br/>';
    // print '<strong>Bundle:</strong> ' . $bundle  . '<br/>';
    // print '<strong>Mode:</strong> ' . $mode .'<br/>';
    
    if($name == 'field_page_related_product') {
        foreach($vars['element']['#object']->field_page_related_product[LANGUAGE_NONE] as $delta => $item) {
            // dsm($item);
        }
    }
    /* Add specific classes to targeted fields */
    switch ($mode) {
      /* All teasers */
      case 'full':
        switch ($name) {
          /* Teaser read more links */
          case 'node_link':
            $item_classes[] = 'more-link';
            break;
          /* Teaser descriptions */
          case 'body':
          case 'field_description':
            $item_classes[] = 'description';
            break;
        }
        break;
    }
    
    switch ($name) {
      case 'field_authors':
        $title_classes[] = 'inline';
        $content_classes[] = 'authors';
        $item_classes[] = 'author';
        break;
    }
    
    // Apply odd or even classes along with our custom classes to each item */
    foreach ($vars['items'] as $delta => $item) {
      $vars['item_attributes_array'][$delta]['class'] = $item_classes;
      $vars['item_attributes_array'][$delta]['class'][] = $delta % 2 ? 'even' : 'odd';
    }
}

function bloodbolts2_views_pre_render(&$view) {
    switch($view->name) {
        case 'journal':
            switch($view->current_display) {
                case 'page':
                    foreach($view->result as $delta => $result) {
                        $style = 'node_list';
                        $field_value = $result->field_field_page_list_layout[0]['rendered']['#markup'];
                        $style .= strtolower($field_value) == 'default' ? '' : '_' . strtolower($field_value);
                        $view->result[$delta]->field_field_page_images[0]['rendered']['#image_style'] = $style;
                    }
                    break;
                default:
                    break;
            break;

        }
        case 'details_products_and_pictures':
            foreach($view->result as $delta => $result) {
                if(isset($result->node_field_data_field_page_related_product_type) && $result->node_field_data_field_page_related_product_type == 'imagery') {
                    if(!empty($result->field_field_image_list_layout)) {
                        
                        $field_value = $result->field_field_image_list_layout[0]['rendered']['#markup'];
                        $style = 'node_list';
                        $style .= strtolower($field_value) == 'default' ? '' : '_' . strtolower($field_value);
                        $view->result[$delta]->field_field_image_image[0]['rendered']['#image_style'] = $style;
                    }
                } else {

                }
            }
            break;
    }
}

function bloodbolts2_preprocess_node(&$vars) {
    switch($vars['type']) {
        case 'product':
            drupal_add_js(path_to_theme() . '/bootstrap/js/jquery.sldr.js');
            drupal_add_js(path_to_theme() . '/bootstrap/js/sldr.js', array('scope' => 'footer'));
            break;
        default: 

            break;
    }
}


/**
 * Implements theme_link().
 *
 * This code adds an icon  tag for use with icon fonts when a menu item
 * contains a CSS class that starts with "fa-". You may add CSS classes to
 * your menu items through the Drupal admin UI with the menu_attributes contrib
 * module.
 *
 * Originally written by lacliniquemtl.
 * Refactored by jwilson3 > mroji28 > driesdelaey > O U T L A W.
 * @see http://drupal.org/node/1689728
 */

function bloodbolts2_link (array $variables) {
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
        $variables['text'] = ' ' . $variables['text'] . '';

        // Finally, remove the icon class from link options, so it is not printed twice.
        unset($variables['options']['attributes']['class'][$key]);
      }
    }
  }

  return theme_link($variables);
}