<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<div style="position: relative">
    <?php if (isset($row->field_field_image_list_layout[0])) : ?>
        <?php $style = 'node_list'; $field_value = $row->field_field_image_list_layout[0]['rendered']['#markup']?>
        <?php $style .= strtolower($field_value) == 'default' ? '' : '_' . strtolower($field_value); ?>
            <?php if(isset($row->field_field_image_image[0])) : ?>
                <?php print theme('image_style', array('style_name' => $style, 'path' => $row->field_field_image_image[0]['raw']['uri'])); ?>
            <?php else: ?>
                <a href="<?php print base_path() . drupal_get_path_alias("node/".$row->node_field_data_field_page_related_product_nid) ?>"><?php print theme('image_style', array('style_name' => $style, 'path' => $row->field_uc_product_image[0]['raw']['uri'])); ?>
            <?php endif; ?>
    <?php else: ?>
        <?php
            $variables = array(
                'path' => $row->field_field_image_image[0]['raw']['uri'],
                'attributes' => array(),
            );
        ?>
        <?php print theme_image($variables) ?>
    <?php endif; ?>
    <div class="content-wrapper" style="">
        <?php foreach ($fields as $id => $field): ?>
          <?php if (!empty($field->separator)): ?>
            <?php print $field->separator; ?>
          <?php endif; ?>

          <?php print $field->wrapper_prefix; ?>
            <?php print $field->label_html; ?>
            <?php print $field->content; ?>
          <?php print $field->wrapper_suffix; ?>
        <?php endforeach; ?>
      <div class="opaque" style=""></div>
    </div>
</div>