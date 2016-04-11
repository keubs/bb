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
                // dsm($result);
                // dsm($result->node_field_data_field_page_related_product_title);
                // dsm($field_value);
                // if(isset($result->field_field_image_list_layout[0])) {
                //     $style = 'node_list';
                //     $field_value = $result->field_field_image_list_layout[0]['rendered']['#markup'];
                //     $result->field_field_image_list_layout[0];
                //     if(isset($view->result[$delta]->field_field_image_image[0])) {
                //         $view->result[$delta]->field_field_image_image[0]['rendered']['#image_style'];
                //     }
                // }
            }
            break;
    }
}